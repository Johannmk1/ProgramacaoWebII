
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Resposta - Envio para destino.php</title>
</head>
<body>
<h1>Resposta do Formulário</h1>
<p></p>
   <?php
    echo "<p>Os dados foram enviados com sucesso pelo metodo " . $_SERVER['REQUEST_METHOD'] . "</p>";
    $nome = $_REQUEST['nome'];
    $telefone = $_REQUEST['telefone'];
    $email = $_REQUEST['email'];
    $mensagem = $_REQUEST['mensagem'];

    echo "<p>O nome enviado foi: " . htmlspecialchars($nome) . "</p>";
    echo "<p>O telefone enviado foi: " . htmlspecialchars($telefone) . "</p>";
    echo "<p>O email enviado foi: " . htmlspecialchars($email) . "</p>";
    echo "<p>A mensagem enviada foi: " . htmlspecialchars($mensagem) . "</p>";
    $headers = apache_request_headers();
    echo "<h2>Headers HTTP Recebidos:</h2>";
    echo "<table border='1' cellpadding='5'><tr><th>Header</th><th>Valor</th></tr>";
    foreach ($headers as $header => $value) {
        echo "<tr><td><strong>" . htmlspecialchars($header) . "</strong></td><td>" . htmlspecialchars($value) . "</td></tr>";
    }
    echo "</table>";
    ?>

</form>
</body>
</html>
