<?php

require __DIR__ . '/vendor/autoload.php';

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

$imagemResultado = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['imagem'])) {
    $manager = new ImageManager(new Driver());
    $image   = $manager->read($_FILES['imagem']['tmp_name']);

    if ($_POST['modo'] === 'pixel') {
        $image->resize((int) $_POST['largura'], (int) $_POST['altura']);
    } else {
        $escala = (float) $_POST['escala'] / 100;
        $image->scale(
            (int) ($image->width()  * $escala),
            (int) ($image->height() * $escala)
        );
    }

    $arquivo = 'images/resultado.png';
    $image->toPng()->save(__DIR__ . '/' . $arquivo);
    $imagemResultado = $arquivo;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Redimensionador</title>
    <style>
        body  { font-family: sans-serif; max-width: 480px; margin: 60px auto; padding: 0 20px; }
        label { display: block; margin: 12px 0 4px; font-weight: bold; }
        input { width: 100%; padding: 6px; box-sizing: border-box; }
        .modos { display: flex; gap: 20px; margin: 10px 0; }
        .modos label { font-weight: normal; display: flex; align-items: center; gap: 6px; }
        #grupo-pixel, #grupo-pct { display: none; }
        button { margin-top: 16px; padding: 10px 24px; background: #333;
                 color: #fff; border: none; cursor: pointer; font-size: 1rem; }
        img    { max-width: 100%; margin-top: 24px; border: 1px solid #ddd; }
    </style>
</head>
<body>

<h2>Redimensionador de Imagem</h2>

<form method="post" enctype="multipart/form-data">

    <label>Imagem:</label>
    <input type="file" name="imagem" accept="image/*" required>

    <label>Modo:</label>
    <div class="modos">
        <label><input type="radio" name="modo" value="pixel" onchange="trocar(this.value)" required> Pixels</label>
        <label><input type="radio" name="modo" value="porcentagem" onchange="trocar(this.value)"> Porcentagem</label>
    </div>

    <div id="grupo-pixel">
        <label>Largura (px):</label>
        <input type="number" name="largura" min="1">
        <label>Altura (px):</label>
        <input type="number" name="altura" min="1">
    </div>

    <div id="grupo-pct">
        <label>Escala (%):</label>
        <input type="number" name="escala" min="1" max="500" placeholder="ex: 50">
    </div>

    <button type="submit">Redimensionar</button>
</form>

<?php if ($imagemResultado): ?>
    <img src="<?= $imagemResultado ?>" alt="Resultado">
    <label>Salvo em: <?= realpath(__DIR__ . '/' . $arquivo) ?></label>
<?php endif; ?>

<script>
function trocar(valor) {
    document.getElementById('grupo-pixel').style.display = valor === 'pixel'       ? 'block' : 'none';
    document.getElementById('grupo-pct').style.display   = valor === 'porcentagem' ? 'block' : 'none';
}
</script>

</body>
</html>