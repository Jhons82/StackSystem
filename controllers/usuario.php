<?php
require_once('../config/session.php');
require_once('../config/conexion.php');
require_once('../models/Usuario.php');
require_once __DIR__ . '/../includes/config.php';

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

    case 'insertUser':
        $username = $_POST["username"] ?? '';
        $email = $_POST["emailRegister"] ?? '';
        $password = $_POST["passwordRegister"] ?? '';
        //Validar que los campos no esten vacíos
        if (empty($username) || empty($email) || empty($password)) {
            echo json_encode([
                "status" => "error",
                "message" => "Todos los campos son obligatorios"
            ]);
            break;
        }
        // Validar si email es existente
        if ($usuario->emailExists($email)) {
            echo json_encode([
                "status" => "error",
                "message" => "El correo electrónico ya está registrado"
            ]);
            break;
        }
        // Encriptar contraseña
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        // Insertar usuario
        $datos = $usuario->insertUser($username, $email, $passwordHash);

        if ($datos) {
            // Buscar el usuario recién registrado para iniciar sesión
            $user = $usuario->getUserByEmail($email);

            if ($user) {
                $_SESSION["id"] = $user["id"];
                $_SESSION["username"] = $user["username"];
                $_SESSION["email"] = $user["email"];
                $_SESSION["image"] = $user["image"];

                echo json_encode([
                    "status" => "success",
                    "message" => "Usuario registrado e iniciado sesión exitosamente",
                    "redirect" => BASE_URL . "views/html/home.php" // Redirigir a la página Home
                ]);
            } else {
                echo json_encode([
                    "status" => "error",
                    "message" => "Error al obtener datos del usuario"
                ]);
            }
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Error al registrar el usuario"
            ]);
        }
        break;

    case 'show_user':
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $id = $_SESSION["id"] ?? '';
        if (empty($id)) {
            echo json_encode([
                "status" => "error",
                "message" => "ID de usuario no proporcionado"
            ]);
            exit; // Detener la ejecución si falta ID
        }
        $datos = $usuario->get_user($id);
        // Concatenar la URL completa
        if (!empty($datos['image']) && strpos($datos['image'], 'http') !== 0) {
            $datos['image'] = BASE_URL . ltrim($datos['image'], '/');
        }
        if (is_array($datos) && !empty($datos)) {
            echo json_encode([
                "status" => "success",
                "data" => $datos
            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Usuario no encontrado"
            ]);
        }
        break;
}
