<?php
// Problema 197: Mensaje Interceptado
// Repositorio: problemanum197


// Paso 1: X'' -> X'   (Miembro A)
// Las letras en posiciones pares van al principio.
// Las de posiciones impares se ponen detrás, empezando por la última.
function deshacerIntercalado($texto) {
    $izquierda = "";
    $derecha = "";

    for ($i = 0; $i < mb_strlen($texto); $i++) {
        $letra = mb_substr($texto, $i, 1);

        if ($i % 2 == 0) {
            $izquierda = $izquierda . $letra;
        } else {
            $derecha = $letra . $derecha;
        }
    }

    return $izquierda . $derecha;
}


// Paso 2: X' -> X   (Miembro B)
// Se le da la vuelta a cada bloque seguido de letras que no son vocales.
function deshacerInversionConsonantes($texto) {
    $vocales = "aeiouAEIOU";
    $resultado = "";
    $bloque = "";

    for ($i = 0; $i < mb_strlen($texto); $i++) {
        $letra = mb_substr($texto, $i, 1);

        if (strpos($vocales, $letra) !== false) {
            // Es vocal: añadimos el bloque al revés y luego la vocal
            $resultado = $resultado . strrev($bloque) . $letra;
            $bloque = "";
        } else {
            // No es vocal: la guardamos en el bloque
            $bloque = $bloque . $letra;
        }
    }

    // Por si el texto termina con un bloque sin vocal detrás
    return $resultado . strrev($bloque);
}


// Proceso completo: X'' -> X   (Miembro A + Miembro B)
function descodificarMensaje($mensaje) {
    $xPrime = deshacerIntercalado($mensaje);
    $xOriginal = deshacerInversionConsonantes($xPrime);

    return [
        'xDoublePrime'  => $mensaje,
        'xPrime'        => $xPrime,
        'xOriginal'     => $xOriginal,
        'formatoSalida' => $mensaje . " => " . $xOriginal
    ];
}
