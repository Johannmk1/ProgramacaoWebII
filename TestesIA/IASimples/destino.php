<?php
// ============================================================
//  receber.php — PROCESSA E EXIBE OS DADOS DO FORMULÁRIO
// ============================================================
//
//  Este arquivo é chamado automaticamente quando o usuário
//  clica em "Enviar" no formulario.php.
//
//  O PHP disponibiliza os dados enviados em duas "caixas":
//    $_POST  → dados enviados pelo método POST
//    $_GET   → dados enviados pelo método GET
//    $_SERVER['REQUEST_METHOD'] → diz qual método foi usado
//
// ============================================================


// ----- 1. DESCOBRIR QUAL MÉTODO FOI USADO ------------------

$metodo = $_SERVER['REQUEST_METHOD'];
// $_SERVER é um array com informações do servidor e da requisição.
// REQUEST_METHOD retorna "POST" ou "GET".


// ----- 2. PEGAR OS DADOS ENVIADOS --------------------------

if ($metodo === 'POST') {

    // Dados chegaram via POST → usamos $_POST
    $nome     = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email    = $_POST['email'];
    $mensagem = $_POST['mensagem'];

} else {

    // Dados chegaram via GET → usamos $_GET
    $nome     = $_GET['nome'];
    $telefone = $_GET['telefone'];
    $email    = $_GET['email'];
    $mensagem = $_GET['mensagem'];

}


// ----- 3. SEGURANÇA BÁSICA ---------------------------------
// htmlspecialchars() converte caracteres especiais (< > & " ')
// para evitar que código malicioso seja executado na página.
// Sempre use isso antes de exibir dados do usuário no HTML!

$nome     = htmlspecialchars($nome);
$telefone = htmlspecialchars($telefone);
$email    = htmlspecialchars($email);
$mensagem = htmlspecialchars($mensagem);


// ----- 4. CAPTURAR OS CABEÇALHOS HTTP ----------------------
// $_SERVER contém várias informações da requisição.
// Os cabeçalhos HTTP ficam nas chaves que começam com "HTTP_".

$cabecalhos = [];

foreach ($_SERVER as $chave => $valor) {
    // Se a chave começa com "HTTP_", é um cabeçalho HTTP
    if (str_starts_with($chave, 'HTTP_')) {
        // Transforma "HTTP_USER_AGENT" em "User-Agent"
        $nome_bonito = str_replace('_', '-', substr($chave, 5));
        $nome_bonito = ucwords(strtolower($nome_bonito), '-');
        $cabecalhos[$nome_bonito] = $valor;
    }
}

// Adiciona mais alguns campos úteis do $_SERVER
$cabecalhos['Método']        = $_SERVER['REQUEST_METHOD'];
$cabecalhos['URI Solicitada']= $_SERVER['REQUEST_URI'];
$cabecalhos['Protocolo']     = $_SERVER['SERVER_PROTOCOL'];
$cabecalhos['IP do Cliente'] = $_SERVER['REMOTE_ADDR'];

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Dados Recebidos - PHP Didático</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f0f4f8;
      padding: 30px;
    }

    h1, h2 { color: #333; }
    h2 { margin-top: 35px; border-bottom: 2px solid #ddd; padding-bottom: 6px; }

    /* Caixinhas coloridas de explicação */
    .dica {
      background: #fff8dc;
      border-left: 5px solid #f0a500;
      padding: 12px 16px;
      margin: 15px 0;
      border-radius: 4px;
      font-size: 14px;
      color: #555;
    }

    /* Badge do método (POST = verde, GET = azul) */
    .badge {
      display: inline-block;
      padding: 5px 14px;
      border-radius: 20px;
      font-weight: bold;
      font-size: 15px;
      color: white;
      margin-left: 10px;
    }
    .badge-POST { background: #4CAF50; }
    .badge-GET  { background: #2196F3; }

    /* Tabela de dados */
    table {
      width: 100%;
      max-width: 600px;
      border-collapse: collapse;
      background: white;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 2px 6px rgba(0,0,0,0.08);
    }

    th, td {
      padding: 12px 16px;
      text-align: left;
      border-bottom: 1px solid #eee;
    }

    th {
      background: #f5f5f5;
      color: #666;
      font-size: 13px;
      text-transform: uppercase;
      width: 35%;
    }

    td { color: #222; word-break: break-word; }

    tr:last-child th,
    tr:last-child td { border-bottom: none; }

    /* Tabela de cabeçalhos HTTP */
    .cabecalho-chave {
      font-family: monospace;
      color: #c0392b;
      font-size: 13px;
    }

    .cabecalho-valor {
      font-family: monospace;
      color: #555;
      font-size: 13px;
    }

    /* URL box */
    .url-box {
      background: #1e1e2e;
      color: #7ec8e3;
      font-family: monospace;
      font-size: 14px;
      padding: 14px 18px;
      border-radius: 8px;
      word-break: break-all;
      max-width: 700px;
      line-height: 1.6;
    }

    /* Botão de voltar */
    .btn-voltar {
      display: inline-block;
      margin-top: 30px;
      padding: 10px 20px;
      background: #555;
      color: white;
      text-decoration: none;
      border-radius: 6px;
      font-size: 15px;
    }
    .btn-voltar:hover { background: #333; }

    .vazio { color: #aaa; font-style: italic; }
  </style>
</head>
<body>

  <h1>
    ✅ Dados Recebidos!
    <span class="badge badge-<?= $metodo ?>"><?= $metodo ?></span>
  </h1>

  <div class="dica">
    💡 O formulário foi enviado usando o método <strong><?= $metodo ?></strong>.
    <?php if ($metodo === 'POST'): ?>
      Os dados viajaram <strong>no corpo</strong> da requisição (não aparecem na URL).
    <?php else: ?>
      Os dados viajaram <strong>na URL</strong> — dê uma olhada na barra de endereço do navegador!
    <?php endif; ?>
  </div>


  <!-- ======================================================
       SEÇÃO 1 — DADOS DO FORMULÁRIO
  ====================================================== -->
  <h2>📝 1. Dados digitados no formulário</h2>

  <div class="dica">
    Em PHP, usamos <code>$_POST['nome_do_campo']</code> ou
    <code>$_GET['nome_do_campo']</code> para pegar cada valor.
    O "nome_do_campo" é o atributo <code>name=""</code> do HTML.
  </div>

  <table>
    <tr>
      <th>Campo</th>
      <th>Valor recebido</th>
    </tr>
    <tr>
      <td><strong>Nome</strong><br><small>$_<?= $metodo ?>['nome']</small></td>
      <td><?= $nome !== '' ? $nome : '<span class="vazio">(não preenchido)</span>' ?></td>
    </tr>
    <tr>
      <td><strong>Telefone</strong><br><small>$_<?= $metodo ?>['telefone']</small></td>
      <td><?= $telefone !== '' ? $telefone : '<span class="vazio">(não preenchido)</span>' ?></td>
    </tr>
    <tr>
      <td><strong>E-mail</strong><br><small>$_<?= $metodo ?>['email']</small></td>
      <td><?= $email !== '' ? $email : '<span class="vazio">(não preenchido)</span>' ?></td>
    </tr>
    <tr>
      <td><strong>Mensagem</strong><br><small>$_<?= $metodo ?>['mensagem']</small></td>
      <td><?= $mensagem !== '' ? nl2br($mensagem) : '<span class="vazio">(não preenchido)</span>' ?></td>
    </tr>
  </table>


  <!-- ======================================================
       SEÇÃO 2 — URL (só aparece quando o método é GET)
  ====================================================== -->
  <?php if ($metodo === 'GET'): ?>

  <h2>🔗 2. Como ficou a URL (método GET)</h2>

  <div class="dica">
    Com GET, os dados são adicionados na URL após o <code>?</code>.
    Cada campo vira um par <code>chave=valor</code>, separados por <code>&amp;</code>.
  </div>

  <div class="url-box">
    <?= htmlspecialchars('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']) ?>
  </div>

  <?php endif; ?>


  <!-- ======================================================
       SEÇÃO 3 — CABEÇALHOS HTTP
  ====================================================== -->
  <h2>🌐 <?= $metodo === 'GET' ? '3' : '2' ?>. Cabeçalhos da Requisição HTTP</h2>

  <div class="dica">
    Toda vez que o navegador faz uma requisição, ele manda
    <strong>cabeçalhos HTTP</strong> com informações extras
    (tipo de navegador, idioma, etc.).
    Em PHP, esses dados ficam dentro de <code>$_SERVER</code>.
  </div>

  <table>
    <tr>
      <th>Cabeçalho</th>
      <th>Valor</th>
    </tr>
    <?php foreach ($cabecalhos as $chave => $valor): ?>
    <tr>
      <td class="cabecalho-chave"><?= htmlspecialchars($chave) ?></td>
      <td class="cabecalho-valor"><?= htmlspecialchars($valor) ?></td>
    </tr>
    <?php endforeach; ?>
  </table>


  <!-- Botão para voltar ao formulário -->
  <a href="formulario.php" class="btn-voltar">← Voltar ao formulário</a>

</body>
</html>