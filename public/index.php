<?php
// public/index.php

require_once __DIR__ . '/../src/datos.php';
require_once __DIR__ . '/../src/funciones.php';

// Inicialización
$errores = [];
$datos = [];
$mostrarResumen = false;

// ---------------------------------------------------------
// PREPARACIÓN DE DATOS PARA LA VISTA
// ---------------------------------------------------------

// Creamos un array especial para el desplegable que cumpla: "Nombre Sede - Provincia"
$sedesParaDesplegable = [];
foreach ($sedes as $id => $infoSede) {
    // Buscamos el nombre de la provincia usando el ID guardado en la sede
    $idProvincia = $infoSede['provincia'];
    $nombreProvincia = $provincias[$idProvincia] ?? 'Provincia Desconocida';
    
    // Formateamos la cadena final
    $sedesParaDesplegable[$id] = "{$infoSede['nombre']} - {$nombreProvincia}";
}

// ---------------------------------------------------------
// PROCESAMIENTO DEL FORMULARIO
// ---------------------------------------------------------
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = sanitizar($_POST['nombre'] ?? '');
    $apellidos = sanitizar($_POST['apellidos'] ?? '');
    $dni = sanitizar($_POST['dni'] ?? '');
    $email = sanitizar($_POST['email'] ?? '');
    $sede = $_POST['sede'] ?? '';
    $departamento = $_POST['departamento'] ?? '';

    // Validaciones básicas
    if (empty($nombre)) $errores['nombre'] = "El nombre es requerido.";
    if (empty($apellidos)) $errores['apellidos'] = "Los apellidos son requeridos.";
    if (empty($dni) || !validarDni($dni)) $errores['dni'] = "El DNI no es válido.";
    if (empty($email) || !validarEmail($email)) $errores['email'] = "El correo no es válido.";
    if (empty($sede)) $errores['sede'] = "Selecciona una sede.";
    if (empty($departamento)) $errores['departamento'] = "Selecciona un departamento.";

    if (empty($errores)) {
        $mostrarResumen = true;
        // Obtenemos los textos bonitos para el resumen
        $txtSede = $sedesParaDesplegable[$sede] ?? 'Desconocida';
        $txtDepto = $departamentos[$departamento] ?? 'Desconocido';
        
        $datos = compact('nombre', 'apellidos', 'dni', 'email', 'txtSede', 'txtDepto');
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Empleado | Alta</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

    <div class="main-card">
        
        <div class="card-header">
            <h2>Alta de Empleado</h2>
            <div style="color: var(--text-muted); font-size: 0.9rem;">
                Sistema de Gestión de Talento
            </div>
        </div>

        <div class="card-body">

            <?php if ($mostrarResumen): ?>
                <div class="success-card">
                    <h3 style="color: #166534; margin-top: 0;">¡Alta Confirmada!</h3>
                    <p style="color: #15803d;">Los datos han sido registrados en el sistema.</p>
                    
                    <ul class="data-list">
                        <li class="data-item">
                            <span class="data-label">Empleado</span>
                            <span class="data-value"><?= $datos['nombre'] ?> <?= $datos['apellidos'] ?></span>
                        </li>
                        <li class="data-item">
                            <span class="data-label">DNI</span>
                            <span class="data-value"><?= $datos['dni'] ?></span>
                        </li>
                        <li class="data-item">
                            <span class="data-label">Email</span>
                            <span class="data-value"><?= $datos['email'] ?></span>
                        </li>
                        <li class="data-item">
                            <span class="data-label">Destino</span>
                            <span class="data-value"><?= $datos['txtSede'] ?></span>
                        </li>
                        <li class="data-item">
                            <span class="data-label">Departamento</span>
                            <span class="data-value"><?= $datos['txtDepto'] ?></span>
                        </li>
                    </ul>

                    <a href="index.php" class="btn-primary" style="text-decoration: none; display: inline-block; width: auto; padding: 0.8rem 2rem;">
                        Nuevo Registro
                    </a>
                </div>

            <?php else: ?>
                <form action="index.php" method="POST" autocomplete="off">
                    
                    <div class="row">
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control <?= isset($errores['nombre']) ? 'is-invalid' : '' ?>" 
                                   id="nombre" name="nombre" value="<?= $nombre ?? '' ?>" placeholder="Tu nombre">
                            <div class="invalid-feedback"><?= $errores['nombre'] ?? '' ?></div>
                        </div>
                        <div class="col-md-6">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control <?= isset($errores['apellidos']) ? 'is-invalid' : '' ?>" 
                                   id="apellidos" name="apellidos" value="<?= $apellidos ?? '' ?>" placeholder="Tus apellidos">
                            <div class="invalid-feedback"><?= $errores['apellidos'] ?? '' ?></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="dni" class="form-label">DNI</label>
                            <input type="text" class="form-control <?= isset($errores['dni']) ? 'is-invalid' : '' ?>" 
                                   id="dni" name="dni" value="<?= $dni ?? '' ?>" placeholder="12345678X">
                            <div class="invalid-feedback"><?= $errores['dni'] ?? '' ?></div>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email Corporativo</label>
                            <input type="email" class="form-control <?= isset($errores['email']) ? 'is-invalid' : '' ?>" 
                                   id="email" name="email" value="<?= $email ?? '' ?>" placeholder="usuario@empresa.com">
                            <div class="invalid-feedback"><?= $errores['email'] ?? '' ?></div>
                        </div>
                    </div>

                    <div class="divider"></div>

                    <div class="row">
                        <div class="col-12">
                            <label for="sede" class="form-label">Sede de Asignación</label>
                            <select class="form-select <?= isset($errores['sede']) ? 'is-invalid' : '' ?>" id="sede" name="sede">
                                <?= pintarSelect($sedesParaDesplegable, $sede ?? null) ?>
                            </select>
                            <div class="invalid-feedback"><?= $errores['sede'] ?? '' ?></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <label for="departamento" class="form-label">Departamento</label>
                            <select class="form-select <?= isset($errores['departamento']) ? 'is-invalid' : '' ?>" id="departamento" name="departamento">
                                <?= pintarSelect($departamentos, $departamento ?? null) ?>
                            </select>
                            <div class="invalid-feedback"><?= $errores['departamento'] ?? '' ?></div>
                        </div>
                    </div>

                    <div style="margin-top: 2.5rem;">
                        <button type="submit" class="btn-primary">Registrar Empleado</button>
                    </div>

                </form>
            <?php endif; ?>

        </div>
    </div>

</body>
</html>