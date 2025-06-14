<?php
require_once('../config/session.php');
require_once('../config/conexion.php');
require_once('../models/Usuario.php');

$usuario = new Usuario();

switch ($_GET["op"]) {
    case 'login':
        $email = $_POST["email"] ?? '';
        $password = $_POST["password"] ?? '';

        $datos = $usuario->login($email, $password);
        /* var_dump($datos); exit; */

        if (is_array($datos) && !empty($datos)) {
            $user = $datos[0]; // Esto ya está seguro
            $_SESSION["id"] = $user["id"];
            $_SESSION["username"] = $user["username"];
            $_SESSION["email"] = $user["email"];
            $_SESSION["image"] = $user["image"];

            echo json_encode([
                "status" => "success",
                "message" => "Login exitoso"
            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Correo o contraseña incorrectos"
            ]);
        }
        break;
}
