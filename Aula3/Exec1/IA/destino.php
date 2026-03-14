<?php
// Captura método HTTP utilizado
$method = $_SERVER['REQUEST_METHOD'];

// Captura dados conforme o método
if ($method === 'POST') {
    $nome      = $_POST['nome']      ?? '';
    $telefone  = $_POST['telefone']  ?? '';
    $email     = $_POST['email']     ?? '';
    $mensagem  = $_POST['mensagem']  ?? '';
} else {
    $nome      = $_GET['nome']      ?? '';
    $telefone  = $_GET['telefone']  ?? '';
    $email     = $_GET['email']     ?? '';
    $mensagem  = $_GET['mensagem']  ?? '';
}

// Sanitização básica para exibição
function safe(string $v): string {
    return htmlspecialchars($v, ENT_QUOTES, 'UTF-8');
}

// Captura todos os cabeçalhos HTTP da requisição
$headers = [];
foreach ($_SERVER as $key => $value) {
    if (str_starts_with($key, 'HTTP_')) {
        $name = ucwords(strtolower(str_replace('_', '-', substr($key, 5))), '-');
        $headers[$name] = $value;
    }
}
// Adiciona alguns campos extras relevantes
$extra_keys = ['REQUEST_METHOD','REQUEST_URI','SERVER_PROTOCOL','CONTENT_TYPE','CONTENT_LENGTH','QUERY_STRING','REMOTE_ADDR','SERVER_NAME','SERVER_PORT'];
foreach ($extra_keys as $k) {
    if (!empty($_SERVER[$k])) {
        $headers[$k] = $_SERVER[$k];
    }
}
ksort($headers);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Destino — Dados Recebidos</title>
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --bg: #0d0d0f;
      --surface: #141417;
      --surface2: #1a1a1f;
      --border: #2a2a30;
      --accent: #e8ff47;
      --accent-dim: rgba(232, 255, 71, 0.12);
      --text: #f0f0f2;
      --muted: #6b6b78;
      --green: #47ffb8;
      --green-dim: rgba(71,255,184,0.1);
      --blue: #47b8ff;
      --blue-dim: rgba(71,184,255,0.1);
      --orange: #ffb847;
      --orange-dim: rgba(255,184,71,0.1);
      --post-color: #ff6b6b;
      --get-color: #47ffb8;
    }

    body {
      background: var(--bg);
      color: var(--text);
      font-family: 'DM Sans', sans-serif;
      min-height: 100vh;
      padding: 2rem;
      position: relative;
    }

    body::before {
      content: '';
      position: fixed;
      inset: 0;
      background-image:
        linear-gradient(rgba(232,255,71,0.025) 1px, transparent 1px),
        linear-gradient(90deg, rgba(232,255,71,0.025) 1px, transparent 1px);
      background-size: 48px 48px;
      pointer-events: none;
      z-index: 0;
    }

    .page {
      position: relative;
      z-index: 1;
      max-width: 860px;
      margin: 0 auto;
    }

    /* ── Header ── */
    .page-header {
      display: flex;
      align-items: flex-start;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 1rem;
      margin-bottom: 2.5rem;
    }

    .back-link {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      color: var(--muted);
      text-decoration: none;
      font-family: 'Syne', sans-serif;
      font-size: 0.75rem;
      font-weight: 600;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      transition: color 0.2s;
      margin-bottom: 1rem;
    }

    .back-link:hover { color: var(--accent); }

    h1 {
      font-family: 'Syne', sans-serif;
      font-size: clamp(1.8rem, 4vw, 2.8rem);
      font-weight: 800;
      letter-spacing: -0.03em;
      line-height: 1.05;
    }

    h1 span { color: var(--accent); }

    .method-badge {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 6px 16px;
      border-radius: 8px;
      font-family: 'JetBrains Mono', monospace;
      font-size: 0.85rem;
      font-weight: 500;
      letter-spacing: 0.05em;
    }

    .method-POST {
      background: rgba(255,107,107,0.12);
      border: 1px solid rgba(255,107,107,0.3);
      color: var(--post-color);
    }

    .method-GET {
      background: rgba(71,255,184,0.1);
      border: 1px solid rgba(71,255,184,0.3);
      color: var(--get-color);
    }

    .method-badge .dot {
      width: 7px; height: 7px;
      border-radius: 50%;
      background: currentColor;
    }

    /* ── Sections ── */
    section { margin-bottom: 2rem; }

    .section-label {
      font-family: 'Syne', sans-serif;
      font-size: 0.7rem;
      font-weight: 700;
      letter-spacing: 0.15em;
      text-transform: uppercase;
      color: var(--muted);
      margin-bottom: 1rem;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .section-label::after {
      content: '';
      flex: 1;
      height: 1px;
      background: var(--border);
    }

    /* ── Form data cards ── */
    .data-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
      gap: 1rem;
    }

    .data-card {
      background: var(--surface);
      border: 1px solid var(--border);
      border-radius: 14px;
      padding: 1.2rem 1.4rem;
      position: relative;
      overflow: hidden;
      transition: border-color 0.2s;
    }

    .data-card:hover { border-color: rgba(232,255,71,0.2); }

    .data-card.full { grid-column: 1 / -1; }

    .data-card::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0;
      height: 2px;
      background: linear-gradient(90deg, var(--accent), transparent);
      opacity: 0.5;
    }

    .data-card .field-name {
      font-family: 'Syne', sans-serif;
      font-size: 0.65rem;
      font-weight: 700;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      color: var(--accent);
      margin-bottom: 0.4rem;
    }

    .data-card .field-value {
      font-size: 1rem;
      font-weight: 400;
      color: var(--text);
      word-break: break-word;
      white-space: pre-wrap;
    }

    .data-card .field-value.empty {
      color: var(--muted);
      font-style: italic;
      font-size: 0.85rem;
    }

    /* ── URL / Query string ── */
    .url-box {
      background: var(--surface);
      border: 1px solid var(--border);
      border-radius: 14px;
      padding: 1.2rem 1.4rem;
    }

    .url-box code {
      font-family: 'JetBrains Mono', monospace;
      font-size: 0.8rem;
      color: var(--blue);
      word-break: break-all;
      line-height: 1.7;
    }

    /* ── Headers table ── */
    .headers-table {
      width: 100%;
      border-collapse: collapse;
      font-size: 0.88rem;
    }

    .headers-table tr {
      border-bottom: 1px solid var(--border);
      transition: background 0.15s;
    }

    .headers-table tr:last-child { border-bottom: none; }
    .headers-table tr:hover { background: rgba(255,255,255,0.02); }

    .headers-table td {
      padding: 0.75rem 1rem;
      vertical-align: top;
    }

    .headers-table td:first-child {
      font-family: 'JetBrains Mono', monospace;
      font-size: 0.78rem;
      font-weight: 500;
      color: var(--orange);
      white-space: nowrap;
      width: 38%;
    }

    .headers-table td:last-child {
      color: var(--muted);
      word-break: break-all;
      line-height: 1.5;
    }

    .headers-wrapper {
      background: var(--surface);
      border: 1px solid var(--border);
      border-radius: 14px;
      overflow: hidden;
    }

    /* ── Footer ── */
    .footer {
      margin-top: 3rem;
      padding-top: 1.5rem;
      border-top: 1px solid var(--border);
      text-align: center;
      color: var(--muted);
      font-size: 0.8rem;
    }

    @media (max-width: 500px) {
      body { padding: 1rem; }
      .data-grid { grid-template-columns: 1fr; }
    }
  </style>
</head>
<body>
<div class="page">

  <!-- ── Back ── -->
  <a href="formulario.php" class="back-link">← Voltar ao formulário</a>

  <!-- ── Header ── -->
  <div class="page-header">
    <div>
      <h1>Dados<br><span>Recebidos</span></h1>
    </div>
    <div class="method-badge method-<?= safe($method) ?>">
      <span class="dot"></span>
      <?= safe($method) ?>
    </div>
  </div>

  <!-- ── Form data ── -->
  <section>
    <div class="section-label">Campos do Formulário</div>
    <div class="data-grid">
      <div class="data-card">
        <div class="field-name">Nome</div>
        <div class="field-value <?= $nome === '' ? 'empty' : '' ?>">
          <?= $nome !== '' ? safe($nome) : '(não informado)' ?>
        </div>
      </div>
      <div class="data-card">
        <div class="field-name">Telefone</div>
        <div class="field-value <?= $telefone === '' ? 'empty' : '' ?>">
          <?= $telefone !== '' ? safe($telefone) : '(não informado)' ?>
        </div>
      </div>
      <div class="data-card">
        <div class="field-name">E-mail</div>
        <div class="field-value <?= $email === '' ? 'empty' : '' ?>">
          <?= $email !== '' ? safe($email) : '(não informado)' ?>
        </div>
      </div>
      <div class="data-card full">
        <div class="field-name">Mensagem</div>
        <div class="field-value <?= $mensagem === '' ? 'empty' : '' ?>">
          <?= $mensagem !== '' ? safe($mensagem) : '(não informado)' ?>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Request info ── -->
  <section>
    <div class="section-label">Método &amp; URI</div>
    <div class="url-box">
      <code>
        <strong style="color:var(--accent)"><?= safe($method) ?></strong>
        <?= safe($_SERVER['REQUEST_URI'] ?? '') ?>
        &nbsp;<?= safe($_SERVER['SERVER_PROTOCOL'] ?? '') ?>
      </code>
    </div>
  </section>

  <!-- ── GET query string (if GET) ── -->
  <?php if ($method === 'GET' && !empty($_SERVER['QUERY_STRING'])): ?>
  <section>
    <div class="section-label">Query String (GET)</div>
    <div class="url-box">
      <code><?= safe($_SERVER['QUERY_STRING']) ?></code>
    </div>
  </section>
  <?php endif; ?>

  <!-- ── POST raw body info ── -->
  <?php if ($method === 'POST'): ?>
  <section>
    <div class="section-label">Corpo POST (pares chave=valor)</div>
    <div class="url-box">
      <code>
        <?php
        $pairs = [];
        foreach ($_POST as $k => $v) {
            $pairs[] = safe($k) . '=<span style="color:var(--text)">' . safe($v) . '</span>';
        }
        echo implode('&amp;<br>', $pairs) ?: '(vazio)';
        ?>
      </code>
    </div>
  </section>
  <?php endif; ?>

  <!-- ── HTTP Headers ── -->
  <section>
    <div class="section-label">Cabeçalhos da Requisição HTTP</div>
    <div class="headers-wrapper">
      <table class="headers-table">
        <tbody>
          <?php foreach ($headers as $name => $value): ?>
          <tr>
            <td><?= safe($name) ?></td>
            <td><?= safe($value) ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </section>

  <div class="footer">
    Requisição processada em <?= date('d/m/Y \à\s H:i:s') ?> &mdash; PHP <?= phpversion() ?>
  </div>

</div>
</body>
</html>