<?php
$scriptName = $_SERVER['SCRIPT_NAME'];           // /StackSystem/views/html/home.php
$scriptDir  = dirname($scriptName);              // /StackSystem/views/html
$baseUrl    = str_replace('/views/html', '', $scriptDir) . '/';  // /StackSystem/
define('BASE_URL', $baseUrl);