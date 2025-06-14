<?php
require_once __DIR__ . '/../../config/session.php'; // Asegura que la sesión esté iniciada
require_once __DIR__ . '/../../includes/config.php'; // Asegura que BASE_URL esté disponible

session_unset();         // Limpia las variables de sesión
session_destroy();       // Destruye la sesión actual

// Redirige al index
header("Location: " . BASE_URL . "index.php");
exit;
