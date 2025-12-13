<?php
// src/funciones.php

/**
 * Limpia los datos de entrada para evitar inyección de código
 */
function sanitizar($dato) {
    return htmlspecialchars(stripslashes(trim($dato)));
}

/**
 * Valida un DNI español (básico: 8 números y 1 letra)
 * Nota: Se podría mejorar calculando la letra real.
 */
function validarDni($dni) {
    // Regex: 8 dígitos seguidos de una letra mayúscula o minúscula
    return preg_match('/^[0-9]{8}[A-Za-z]$/', $dni);
}

/**
 * Valida formato de email
 */
function validarEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

/**
 * Genera las opciones de un Select HTML a partir de un array
 */
function pintarSelect($arrayDatos, $seleccionado = null) {
    $html = '<option value="" disabled selected>-- Selecciona una opción --</option>';
    foreach ($arrayDatos as $clave => $valor) {
        // Manejo diferente si el valor es un array (caso sedes) o string
        $texto = is_array($valor) ? $valor['nombre'] : $valor;
        
        $selectedAttr = ($clave == $seleccionado) ? 'selected' : '';
        $html .= "<option value='$clave' $selectedAttr>$texto</option>";
    }
    return $html;
}