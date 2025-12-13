<?php
// src/datos.php

/**
 * DATOS MAESTROS DE LA APLICACIÓN
 * Estructura robusta para simular una BBDD real.
 */

// 1. Listado completo de Provincias Españolas
$provincias = [
    '01' => 'Álava', '02' => 'Albacete', '03' => 'Alicante', '04' => 'Almería', '05' => 'Ávila', 
    '06' => 'Badajoz', '07' => 'Illes Balears', '08' => 'Barcelona', '09' => 'Burgos', '10' => 'Cáceres',
    '11' => 'Cádiz', '12' => 'Castellón', '13' => 'Ciudad Real', '14' => 'Córdoba', '15' => 'A Coruña',
    '16' => 'Cuenca', '17' => 'Girona', '18' => 'Granada', '19' => 'Guadalajara', '20' => 'Guipúzcoa',
    '21' => 'Huelva', '22' => 'Huesca', '23' => 'Jaén', '24' => 'León', '25' => 'Lleida',
    '26' => 'La Rioja', '27' => 'Lugo', '28' => 'Madrid', '29' => 'Málaga', '30' => 'Murcia',
    '31' => 'Navarra', '32' => 'Ourense', '33' => 'Asturias', '34' => 'Palencia', '35' => 'Las Palmas',
    '36' => 'Pontevedra', '37' => 'Salamanca', '38' => 'S.C. Tenerife', '39' => 'Cantabria', '40' => 'Segovia',
    '41' => 'Sevilla', '42' => 'Soria', '43' => 'Tarragona', '44' => 'Teruel', '45' => 'Toledo',
    '46' => 'Valencia', '47' => 'Valladolid', '48' => 'Vizcaya', '49' => 'Zamora', '50' => 'Zaragoza',
    '51' => 'Ceuta', '52' => 'Melilla'
];

// 2. Sedes Corporativas (Estratégicas)
// Simulamos sedes en puntos clave logísticos
$sedes = [
    'MAD-HQ'  => ['nombre' => 'Sede Central', 'provincia' => '28'],
    'MAD-LOG' => ['nombre' => 'Centro Logístico Barajas', 'provincia' => '28'],
    'BCN-TEC' => ['nombre' => 'Hub Tecnológico ', 'provincia' => '08'],
    'BCN-PRT' => ['nombre' => 'Centro Distribución Puerto BCN', 'provincia' => '08'],
    'VAL-MED' => ['nombre' => 'Delegación Levante ', 'provincia' => '46'],
    'SEV-SUR' => ['nombre' => 'Centro Operaciones Sur ', 'provincia' => '41'],
    'MAL-INN' => ['nombre' => 'Málaga TechPark Innovation ', 'provincia' => '29'],
    'BIL-NOR' => ['nombre' => 'Delegación Norte ', 'provincia' => '48'],
    'GAL-VIG' => ['nombre' => 'Centro Logístico ', 'provincia' => '36'],
    'ZAR-PLZ' => ['nombre' => 'Plataforma Logística ', 'provincia' => '50']
];

// 3. Departamentos (Estructura empresarial completa)
$departamentos = [
    'DIR' => 'Dirección General',
    'RRHH' => 'Recursos Humanos & Talent',
    'IT-DEV' => 'IT - Desarrollo de Software',
    'IT-SYS' => 'IT - Sistemas y Ciberseguridad',
    'MKT' => 'Marketing y Comunicación',
    'COM' => 'Ventas y Desarrollo de Negocio',
    'LOG' => 'Logística y Operaciones',
    'FIN' => 'Finanzas y Contabilidad',
    'LEG' => 'Legal y Compliance',
    'I+D' => 'Investigación y Desarrollo'
];