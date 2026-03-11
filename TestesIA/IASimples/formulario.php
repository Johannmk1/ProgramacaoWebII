<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Formulário PHP - Didático</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f0f4f8;
      padding: 30px;
    }

    h1 { color: #333; }

    /* Caixinha amarela de dica */
    .dica {
      background: #fff8dc;
      border-left: 5px solid #f0a500;
      padding: 12px 16px;
      margin-bottom: 20px;
      border-radius: 4px;
      font-size: 14px;
      color: #555;
    }

    form {
      background: white;
      padding: 25px;
      border-radius: 8px;
      max-width: 500px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    label {
      display: block;
      margin-top: 16px;
      margin-bottom: 4px;
      font-weight: bold;
      color: #333;
    }

    input[type="text"],
    input[type="number"],
    input[type="email"],
    textarea {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 15px;
    }

    textarea { height: 100px; resize: vertical; }

    .botoes {
      margin-top: 20px;
      display: flex;
      gap: 10px;
    }

    button {
      padding: 10px 20px;
      font-size: 15px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .btn-post { background: #4CAF50; color: white; }
    .btn-get  { background: #2196F3; color: white; }
    button:hover { opacity: 0.85; }

    .legenda {
      margin-top: 8px;
      font-size: 13px;
      color: #888;
    }
  </style>
</head>
<body>

  <h1>📋 Formulário de Contato</h1>

  <!--
    ╔══════════════════════════════════════════════════════╗
    ║  ENTENDENDO O FORMULÁRIO                             ║
    ║                                                      ║
    ║  Este arquivo só EXIBE o formulário.                 ║
    ║  Quando o usuário clicar em Enviar, os dados vão    ║
    ║  para "receber.php" que irá processá-los.           ║
    ╚══════════════════════════════════════════════════════╝
  -->

  <div class="dica">
    💡 <strong>O que vai acontecer?</strong><br>
    Preencha e clique em Enviar. Os dados irão para <code>receber.php</code>.<br>
    <strong>POST</strong> = dados viajam escondidos &nbsp;|&nbsp;
    <strong>GET</strong> = dados aparecem na URL do navegador.
  </div>

  <!--
    action="receber.php" → para onde os dados serão enviados
    method="POST"        → método de envio padrão deste form
  -->
  <form action="receber.php" method="POST">

    <!-- name="nome" é o "apelido" que o PHP usa para pegar o valor -->
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" placeholder="Ex: João Silva">

    <!-- type="number" faz o navegador aceitar só números -->
    <label for="telefone">Telefone:</label>
    <input type="number" id="telefone" name="telefone" placeholder="Ex: 47999990000">

    <!-- type="email" valida o formato automaticamente -->
    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email" placeholder="Ex: joao@email.com">

    <!-- textarea = caixa de texto maior, para mensagens -->
    <label for="mensagem">Mensagem:</label>
    <textarea id="mensagem" name="mensagem" placeholder="Escreva aqui..."></textarea>

    <div class="botoes">
      <!-- Envia normalmente via POST -->
      <button type="submit" class="btn-post">🟢 Enviar via POST</button>

      <!-- Muda o method para GET antes de submeter -->
      <button type="submit" class="btn-get"
              onclick="this.form.method='GET'">🔵 Enviar via GET</button>
    </div>

    <div class="legenda">
      POST → dados ocultos &nbsp;|&nbsp; GET → dados aparecem na URL
    </div>

  </form>

</body>
</html>