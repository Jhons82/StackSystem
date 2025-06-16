<?php
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'];

// Ruta al script actual (por ejemplo: /mi-proyecto/views/html/home.php)
$scriptName = $_SERVER['SCRIPT_NAME'];

// Quitamos el nombre del archivo para obtener el path base
$scriptDir = rtrim(str_replace(basename($scriptName), '', $scriptName), '/');

// Extraemos solo el subdirectorio raíz del proyecto (por ejemplo: /mi-proyecto/)
$parts = explode('/', trim($scriptDir, '/'));
$projectBase = isset($parts[0]) ? '/' . $parts[0] . '/' : '/';

// Base URL completa
define('BASE_URL', $protocol . $host . $projectBase);
