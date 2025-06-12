<?php
    require_once('../config/conexion.php');
    require_once('../models/Usuario.php');

    $usuario = new Usuario();

    switch ($_GET["op"]) {
        case 'login':
            $datos = $usuario->login($_POST["email"], $_POST["password"]);
            if (is_array($datos) && count($datos)>0) {
                $_SESSION["id"] = $datos[0]["id"];
                $_SESSION["username"] = $datos[0]["username"];
                $_SESSION["email"] = $datos[0]["email"];
                $_SESSION["image"] = $datos[0]["image"];

                echo "1";
            } else {
                echo "0";
            }
            break;
        
        default:
            # code...
            break;
    }
?>