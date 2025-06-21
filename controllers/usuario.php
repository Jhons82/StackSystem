<?php
require_once('../config/session.php');
require_once('../config/conexion.php');
require_once('../models/Usuario.php');
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/functions.php';

$usuario = new Usuario();

switch ($_GET["op"]) {
    case 'login':
        $email = $_POST["email"] ?? '';
        $password = $_POST["password"] ?? '';

        $datos = $usuario->login($email, $password);
        /* var_dump($datos); exit; */

        if (!is_array($datos) && !isset($datos["status"])) {
            echo json_encode([
                "status" => "error",
                "message" => "Ocurrió un error interno"
            ]);
            break;
        }

        switch ($datos["status"]) {
            case 'success':
                $user = $datos["data"]; // Esto ya está seguro
                $_SESSION["id"] = $user["id"];
                $_SESSION["username"] = $user["username"];
                $_SESSION["email"] = $user["email"];
                $_SESSION["image"] = $user["image"];
                
                echo json_encode(["status" => "success", "message" => "Inicio de sesión exitoso."]);
                break;

            case 'deleted':
            case 'not_found':
                echo json_encode(["status" => "deleted", "message" => "El usuario no existe"]);
                break;

            case 'wrong_password':
                echo json_encode(["status" => "wrong_password", "message" => "La contraseña es incorrecta"]);
                break;
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
        $id = getSessionUserId();

        if (!$id) {
            echo json_encode(["status" => "error", "message" => "Sesión no válida"]);
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

    case 'update_user':
        $id = getSessionUserId();
        if (!$id) {
            echo json_encode(["status" => "error", "message" => "Sesión no válida"]);
        }
        $username    = trim($_POST["usernameprofile"] ?? '');
        $country     = trim($_POST["country"] ?? '');
        $description = trim($_POST["description"] ?? '');
        $website     = trim($_POST["website"] ?? '');
        $twitter     = trim($_POST["twitter"] ?? '');
        $facebook    = trim($_POST["facebook"] ?? '');
        $instagram   = trim($_POST["instagram"] ?? '');
        $youtube     = trim($_POST["youtube"] ?? '');
        $vimeo       = trim($_POST["vimeo"] ?? '');
        $github      = trim($_POST["github"] ?? '');
        // Validar que los campos obligatorios
        if (empty($username)) {
            echo json_encode([
                "status" => "error",
                "message" => "El nombre de usuario no puede estar vacío"
            ]);
            break;
        }

        //Proceso de imagen si se sube una nueva
        $image_path = ''; // Ruta final de la imagen que se guardará en la base de datos
        if (!empty($_FILES['image']['name'])) {
            // Si el usuario ha subido una nueva imagen, se procede con la validación y carga
            $file = $_FILES['image'];
            // Tipos de imagen permitidos
            $allowed_types = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
            // Validación de tipo y tamaño del archivo (máximo 2MB)
            if (in_array($file['type'], $allowed_types) && $file['size'] <= 2 * 1024 * 1024 /* 2MB */) {
                // Obtener la extensión del archivo (jpg, png, etc.)
                $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
                // Generar un nombre único para evitar colisiones y mantener orden
                $new_name = uniqid('img_') . '.' . $extension;
                // Carpeta destino relativa desde el controlador (ajustado para tu estructura)
                $upload_dir = '../assets/images/uploads/';
                // Crear la carpeta si no existe
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }
                // Ruta final completa para guardar la imagen en el servidor
                $upload_path = $upload_dir . $new_name;
                // Mover el archivo temporal al destino final
                if (move_uploaded_file(($file['tmp_name']), $upload_path)) {
                    // Construir la ruta pública (URL completa) para guardar en la base de datos
                    $image_path = 'assets/images/uploads/' . $new_name;
                } else {
                    // Error al subir el archivo
                    echo json_encode([
                        "status" => "error",
                        "message" => "Error al subir la imagen"
                    ]);
                    break; // Detener el proceso si hubo error
                }
            } else {
                // Imagen inválida por tipo o tamaño
                echo json_encode([
                    "status" => "error",
                    "message" => "Tipo o tamaño de imagen no permitido"
                ]);
                break; // Detener el proceso
            }
        } else {
            // Si no se sube una nueva imagen, usar la actual
            $current = $usuario->get_user($id);
            $image_path = $current['image'];
        }
        $datos = $usuario->updateuser($id, $username, $image_path, $country, $description, $website, $twitter, $facebook, $instagram, $youtube, $vimeo, $github);
        if ($datos) {
            $_SESSION["username"] = $username; // Actualizar el nombre de usuario en la sesión
            $_SESSION["image"] = $image_path; // Actualizar la imagen en la sesión
            // Retornar respuesta exitosa
            echo json_encode([
                "status" => "success",
                "message" => "Usuario actualizado exitosamente"
            ]);
        } else {
            echo json_encode([
                "status" => "info",
                "message" => "No se realizaron cambios."
            ]);
        }

        break;

    case 'update_email':
        $id = getSessionUserId();

        if (!$id) {
            echo json_encode(["status" => "error", "message" => "Sesión no válida"]);
        }

        $email = trim($_POST["emailprofile"] ?? '');
        // Validar que el campo email no este vacío
        if (empty($email)) {
            echo json_encode([
                "status" => "error",
                "message" => "El correo electrónico no puede estar vacío",
            ]);
            break;
        }

        $datos = $usuario->updateEmail($id, $email);

        if ($datos === true) {
            $_SESSION["email"] = $email; // Actualizar el email en la sesión
            echo json_encode([
                "status" => "success",
                "message" => "Correo electrónico actualizado exitosamente",
                "email" => $email
            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "El correo ya está en uso por otro usuario o no se pudo actualizar"
            ]);
        }

        break;

    case 'update_password':
        $id = getSessionUserId();
        $current_password = $_POST["current_password"] ?? '';
        $new_password = $_POST["new_password"] ?? '';

        if (!$id) {
            echo json_encode(["status" => "error", "message" => "Sesión no válida"]);
        }

        if (empty($current_password) || empty($new_password)) {
            echo json_encode([
                "status" => "error",
                "message" => "Todos los campos son obligatorios"
            ]);
            exit;
        }

        $user = $usuario->get_user($id); // Metodo que devuelve datos del usuario logeado

        if (!$user || !password_verify($current_password, $user["password"])) {
            echo json_encode(["status" => "error", "message" => "La contraseña actual es incorrecta"]);
            exit;
        }

        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $usuario->updatePassword($id, $hashed_password);

        echo json_encode(["status" => "success", "message" => "Contraseña actualizada exitosamente"]);
        break;

    case 'delete_user':

        $id = getSessionUserId();

        if (!$id) {
            echo json_encode(["status" => "error", "message" => "Sesión no válida"]);
        }

        $datos = $usuario->deleteUser($id);

        if ($datos === true) {
            session_unset();
            session_destroy();
            echo json_encode(["status" => "success", "message" => "Usuario eliminado exitosamente", "redirect" => BASE_URL . "index.php"]);
        } else {
            echo json_encode(["status" => "error", "message" => "No se pudo eliminar el usuario"]);
        }
        break;
}
