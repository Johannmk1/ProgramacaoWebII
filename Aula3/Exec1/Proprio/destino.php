<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Resposta - Envio para destino.php</title>

<style>

body{
    font-family: Arial, sans-serif;
    background:#e8f4ff;
    margin:40px;
    display:flex;
    flex-direction:column;
    align-items:center;
}

h1{
    margin-bottom:20px;
    color:#1b4f72;
}

.container{
    background:#ffffff;
    padding:25px;
    width:420px;
    border:1px solid #cfe6ff;
    border-radius:20px;
    box-shadow:0 0 10px rgba(0,0,0,0.08);
}

p{
    margin:8px 0;
}

h2{
    margin-top:30px;
    color:#1b4f72;
}

.table-wrapper{
    width:520px;
    display:flex;
    justify-content:center;
}

table{
    border-collapse:collapse;
    width:100%;
    background:#ffffff;
    border-radius:10px;
    overflow:hidden;
}

th, td{
    border:1px solid #d6eaff;
    padding:6px 8px;
    text-align:left;
    font-size:13px;
}

th{
    background:#dff1ff;
    color:#0d3c61;
}

tr:nth-child(even){
    background:#f3f9ff;
}

.back-link{
    margin-top:20px;
    display:inline-block;
    text-decoration:none;
    background:#dff1ff;
    padding:8px 14px;
    border:1px solid #b8dcff;
    border-radius:10px;
    color:#0d3c61;
}

.back-link:hover{
    background:#cfe6ff;
}

</style>

</head>

<body>

<h1>Resposta do Formulário</h1>

<?php
$nome = $_REQUEST['nome'];
$telefone = $_REQUEST['telefone'];
$email = $_REQUEST['email'];
$mensagem = $_REQUEST['mensagem'];
$headers = apache_request_headers();

echo "<div class='container'>";
echo "<p><strong>Método:</strong> " . $_SERVER['REQUEST_METHOD'] . "</p>";
echo "<p><strong>Nome:</strong> " . htmlspecialchars($nome) . "</p>";
echo "<p><strong>Telefone:</strong> " . htmlspecialchars($telefone) . "</p>";
echo "<p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>";
echo "<p><strong>Mensagem:</strong> " . htmlspecialchars($mensagem) . "</p>";
echo "</div>";

echo "<h2>Headers HTTP Recebidos</h2>";

echo "<div class='table-wrapper'>";
echo "<table>";
echo "<tr><th>Header</th><th>Valor</th></tr>";

foreach ($headers as $header => $value) {
    echo "<tr><td><strong>" . htmlspecialchars($header) . "</strong></td><td>" . htmlspecialchars($value) . "</td></tr>";
}

echo "</table>";
echo "</div>";
?>

<a href="index.html" class="back-link">← Voltar ao formulário</a>

</body>
</html>