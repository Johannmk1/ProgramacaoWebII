<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulário de Contato</title>
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --bg: #0d0d0f;
      --surface: #141417;
      --border: #2a2a30;
      --accent: #e8ff47;
      --accent-dim: rgba(232, 255, 71, 0.12);
      --text: #f0f0f2;
      --muted: #6b6b78;
      --input-bg: #1a1a1f;
    }

    body {
      background: var(--bg);
      color: var(--text);
      font-family: 'DM Sans', sans-serif;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 2rem;
      position: relative;
      overflow-x: hidden;
    }

    /* Decorative background grid */
    body::before {
      content: '';
      position: fixed;
      inset: 0;
      background-image:
        linear-gradient(rgba(232,255,71,0.03) 1px, transparent 1px),
        linear-gradient(90deg, rgba(232,255,71,0.03) 1px, transparent 1px);
      background-size: 48px 48px;
      pointer-events: none;
      z-index: 0;
    }

    /* Glowing blob */
    body::after {
      content: '';
      position: fixed;
      top: -20%;
      right: -10%;
      width: 600px;
      height: 600px;
      background: radial-gradient(circle, rgba(232,255,71,0.07) 0%, transparent 65%);
      pointer-events: none;
      z-index: 0;
    }

    .wrapper {
      position: relative;
      z-index: 1;
      width: 100%;
      max-width: 620px;
    }

    .badge {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background: var(--accent-dim);
      border: 1px solid rgba(232,255,71,0.25);
      color: var(--accent);
      font-family: 'Syne', sans-serif;
      font-size: 0.7rem;
      font-weight: 600;
      letter-spacing: 0.15em;
      text-transform: uppercase;
      padding: 5px 12px;
      border-radius: 100px;
      margin-bottom: 1.5rem;
    }

    .badge::before {
      content: '';
      width: 6px;
      height: 6px;
      background: var(--accent);
      border-radius: 50%;
      animation: pulse 2s ease-in-out infinite;
    }

    @keyframes pulse {
      0%, 100% { opacity: 1; transform: scale(1); }
      50% { opacity: 0.4; transform: scale(0.8); }
    }

    h1 {
      font-family: 'Syne', sans-serif;
      font-size: clamp(2rem, 5vw, 3rem);
      font-weight: 800;
      line-height: 1.05;
      margin-bottom: 0.5rem;
      letter-spacing: -0.03em;
    }

    h1 span {
      color: var(--accent);
    }

    .subtitle {
      color: var(--muted);
      font-size: 0.95rem;
      margin-bottom: 2.5rem;
      font-weight: 300;
    }

    .card {
      background: var(--surface);
      border: 1px solid var(--border);
      border-radius: 20px;
      padding: 2.5rem;
      position: relative;
      overflow: hidden;
    }

    .card::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0;
      height: 1px;
      background: linear-gradient(90deg, transparent, var(--accent), transparent);
      opacity: 0.6;
    }

    .field {
      margin-bottom: 1.4rem;
    }

    label {
      display: block;
      font-family: 'Syne', sans-serif;
      font-size: 0.75rem;
      font-weight: 600;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      color: var(--muted);
      margin-bottom: 0.5rem;
      transition: color 0.2s;
    }

    .field:focus-within label {
      color: var(--accent);
    }

    input, textarea {
      width: 100%;
      background: var(--input-bg);
      border: 1px solid var(--border);
      border-radius: 10px;
      padding: 0.85rem 1rem;
      color: var(--text);
      font-family: 'DM Sans', sans-serif;
      font-size: 0.95rem;
      font-weight: 400;
      outline: none;
      transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
      appearance: none;
      -webkit-appearance: none;
    }

    input:focus, textarea:focus {
      border-color: var(--accent);
      background: #1e1e24;
      box-shadow: 0 0 0 3px rgba(232,255,71,0.08);
    }

    textarea {
      resize: vertical;
      min-height: 120px;
    }

    input::placeholder, textarea::placeholder {
      color: #3a3a44;
    }

    /* Chrome autofill fix */
    input:-webkit-autofill {
      -webkit-box-shadow: 0 0 0 1000px var(--input-bg) inset;
      -webkit-text-fill-color: var(--text);
    }

    .row {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 1rem;
    }

    @media (max-width: 500px) {
      .row { grid-template-columns: 1fr; }
      .card { padding: 1.5rem; }
    }

    .actions {
      margin-top: 2rem;
      display: flex;
      flex-direction: column;
      gap: 0.75rem;
    }

    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      padding: 0.9rem 1.5rem;
      border-radius: 10px;
      font-family: 'Syne', sans-serif;
      font-size: 0.85rem;
      font-weight: 700;
      letter-spacing: 0.05em;
      text-transform: uppercase;
      cursor: pointer;
      border: none;
      text-decoration: none;
      transition: all 0.2s ease;
    }

    .btn-primary {
      background: var(--accent);
      color: #0d0d0f;
    }

    .btn-primary:hover {
      background: #f5ff7a;
      transform: translateY(-1px);
      box-shadow: 0 8px 24px rgba(232,255,71,0.25);
    }

    .btn-primary:active {
      transform: translateY(0);
    }

    .btn-ghost {
      background: transparent;
      color: var(--muted);
      border: 1px solid var(--border);
      font-size: 0.8rem;
    }

    .btn-ghost:hover {
      border-color: rgba(232,255,71,0.35);
      color: var(--accent);
    }

    .divider {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      margin: 0.25rem 0;
      color: var(--muted);
      font-size: 0.75rem;
    }

    .divider::before, .divider::after {
      content: '';
      flex: 1;
      height: 1px;
      background: var(--border);
    }

    .get-url {
      margin-top: 2rem;
      padding: 1rem 1.25rem;
      background: rgba(232,255,71,0.04);
      border: 1px dashed rgba(232,255,71,0.2);
      border-radius: 10px;
    }

    .get-url p {
      font-family: 'Syne', sans-serif;
      font-size: 0.7rem;
      font-weight: 600;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      color: var(--accent);
      margin-bottom: 0.6rem;
    }

    .get-url code {
      font-family: 'Courier New', monospace;
      font-size: 0.78rem;
      color: var(--muted);
      word-break: break-all;
      line-height: 1.6;
    }

    .arrow {
      font-size: 1rem;
    }
  </style>
</head>
<body>

<div class="wrapper">
  <div class="badge">Formulário HTTP</div>
  <h1>Entre em<br><span>Contato</span></h1>
  <p class="subtitle">Preencha os dados abaixo e envie via POST ou GET.</p>

  <div class="card">
    <!-- POST Form -->
    <form action="destino.php" method="POST">

      <div class="row">
        <div class="field">
          <label for="nome">Nome</label>
          <input type="text" id="nome" name="nome" placeholder="Seu nome completo" required>
        </div>
        <div class="field">
          <label for="telefone">Telefone</label>
          <input type="tel" id="telefone" name="telefone" placeholder="(47) 99999-0000"
                 pattern="[0-9\s\(\)\+\-]*" title="Apenas números e símbolos de telefone">
        </div>
      </div>

      <div class="field">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" placeholder="voce@email.com" required>
      </div>

      <div class="field">
        <label for="mensagem">Mensagem</label>
        <textarea id="mensagem" name="mensagem" placeholder="Escreva sua mensagem aqui..."></textarea>
      </div>

      <div class="actions">
        <button type="submit" class="btn btn-primary">
          Enviar via POST <span class="arrow">→</span>
        </button>
      </div>
    </form>

    <div class="divider">ou</div>

    <!-- GET Form -->
    <form action="destino.php" method="GET" id="form-get">
      <input type="hidden" name="nome" id="get-nome">
      <input type="hidden" name="telefone" id="get-telefone">
      <input type="hidden" name="email" id="get-email">
      <input type="hidden" name="mensagem" id="get-mensagem">
      <button type="submit" class="btn btn-ghost" onclick="copyFromPost()">
        Enviar via GET (dados acima)
      </button>
    </form>

    <div class="get-url">
      <p>↳ Exemplo de URL GET direta</p>
      <code>destino.php?nome=João+Silva&amp;telefone=47999990000&amp;email=joao@email.com&amp;mensagem=Olá%2C+gostaria+de+mais+informações.</code>
    </div>
  </div>
</div>

<script>
  function copyFromPost() {
    document.getElementById('get-nome').value      = document.getElementById('nome').value;
    document.getElementById('get-telefone').value  = document.getElementById('telefone').value;
    document.getElementById('get-email').value     = document.getElementById('email').value;
    document.getElementById('get-mensagem').value  = document.getElementById('mensagem').value;
  }
</script>

</body>
</html>