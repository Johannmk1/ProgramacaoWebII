<?php
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Formulário - Envio para destino.php</title>
    <style>
        :root{font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial; color:#222}
        body{background:#f4f6f8;padding:40px}
        .card{max-width:720px;margin:0 auto;background:#fff;border-radius:8px;padding:24px;box-shadow:0 6px 24px rgba(16,24,40,0.08)}
        h1{margin-top:0;font-size:20px}
        form{display:grid;gap:12px}
        label{font-weight:600;font-size:13px}
        input[type=text], input[type=tel], input[type=email], textarea{width:100%;padding:10px;border:1px solid #d6d9dd;border-radius:6px;font-size:14px}
        textarea{min-height:120px;resize:vertical}
        .row{display:grid;grid-template-columns:1fr 1fr;gap:12px}
        .actions{display:flex;gap:12px;align-items:center}
        button{background:#0b5fff;color:#fff;border:0;padding:10px 16px;border-radius:6px;cursor:pointer}
        a.button-like{background:#e6eefc;color:#0b5fff;padding:8px 12px;border-radius:6px;text-decoration:none;border:1px solid #cfe0ff}
        p.small{color:#6b7280;font-size:13px}
        pre{background:#0b1220;color:#f8fafc;padding:12px;border-radius:6px;overflow:auto}
    </style>
</head>
<body>
<div class="card">
    <h1>Formulário de Contato</h1>
    <p class="small">Envie os dados via POST para <code>destino.php</code>.</p>
    <form action="destino.php" method="post" novalidate>
        <div class="row">
            <div>
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" required placeholder="Seu nome completo">
            </div>
            <div>
                <label for="telefone">Telefone</label>
                <input type="tel" id="telefone" name="telefone" required pattern="[0-9]{7,15}" inputmode="numeric" title="Apenas dígitos, entre 7 e 15 caracteres" placeholder="11912345678">
            </div>
        </div>

        <div>
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" required placeholder="seu@email.com">
        </div>

        <div>
            <label for="mensagem">Mensagem</label>
            <textarea id="mensagem" name="mensagem" required placeholder="Escreva sua mensagem aqui..."></textarea>
        </div>

        <div class="actions">
            <button type="submit">Enviar (POST)</button>
            <a class="button-like" href="destino.php?nome=Jo%C3%A3o&telefone=551199999999&email=joao%40exemplo.com&mensagem=Mensagem+de+teste">Enviar exemplo (GET)</a>
        </div>
    </form>

    <hr style="margin:18px 0;border:0;border-top:1px solid #eef2f6">
    <p class="small">Ou monte sua própria URL GET substituindo os parâmetros. Exemplo:</p>
    <pre>destino.php?nome=Seu+Nome&telefone=551199999999&email=seu%40email.com&mensagem=Olá+via+GET</pre>
</div>
</body>
</html>