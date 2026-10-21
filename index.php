<?php
require_once 'decodificador.php';

// Recogemos lo que escribió la persona en el formulario
$mensaje = $_POST['mensaje'] ?? '';
$resultado = null;

if ($mensaje != '') {
    $resultado = descodificarMensaje($mensaje);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado - Descodificador PHP</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&family=IM+Fell+English&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <header class="cabecera">
        <div class="contenedor">
            <div class="triangulo"></div>
            <span class="etiqueta">Acepta el Reto 197</span>
            <h1>Mensaje Descifrado</h1>
            <p>Procesado con <code>decodificador.php</code></p>
        </div>
    </header>

    <main class="contenedor">
        <section class="tarjeta">
            <h2>Paso a paso</h2>

            <?php if ($resultado): ?>
                <div class="caja-resultado">
                    <p><strong>Entrada (X″):</strong> <code><?= htmlspecialchars($resultado['xDoublePrime']) ?></code></p>
                    <p><strong>Paso 1 (X″ → X′):</strong> <code><?= htmlspecialchars($resultado['xPrime']) ?></code></p>
                    <p><strong>Paso 2 (X′ → X):</strong> <code><?= htmlspecialchars($resultado['xOriginal']) ?></code></p>
                    <hr>
                    <p>Salida final:</p>
                    <p class="salida"><code><?= htmlspecialchars($resultado['formatoSalida']) ?></code></p>
                </div>
            <?php else: ?>
                <p>No escribiste ningún mensaje. Vuelve al formulario y prueba otra vez.</p>
            <?php endif; ?>

            <p style="margin-top: 20px;">
                <a href="index.html" class="boton">Volver al formulario</a>
            </p>
        </section>
    </main>

</body>
</html>
