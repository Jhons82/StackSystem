<?php
require_once('../config/session.php');
require_once('../config/conexion.php');
require_once('../models/Comment.php');
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/functions.php';

$comment = new Comment();

switch ($_GET["op"]) {
    case 'get_comments':
        $target_id = $_POST["target_id"];
        $target_type = $_POST["target_type"];
        
        $datos = $comment->getComments($target_id, $target_type);

        echo json_encode([
            "status" => "success", "data" => $datos
        ]);
        break;

    case 'insertComment':
        $content = trim($_POST["content"] ?? "");
        $target_type = $_POST["target_type"] ?? "";
        $target_id = $_POST["target_id"] ?? "";

        if (empty($content) || empty($target_type) || empty($target_id)) {
            echo json_encode(["status" => "error", "message" => "Faltan datos obligatorios"]);
            exit;
        }

        // ID User
        $user_id = getSessionUserId();

        if (!$user_id) {
            echo json_encode(["status" => "error", "message" => "Sesión Inactiva"]);
            exit;
        }

        $resp = $comment->insertComment($user_id, $content, $target_type, $target_id);

        echo json_encode($resp);
        break;

    case 'update_comment':
        $user_id = getSessionUserId();

        if (!isset($user_id)) {
            echo json_encode(["status" => "No Autorizado", "message" => "Debes iniciar sesión para actualizar un comentario"]);
        }

        $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
        $content = isset($_POST['content']) ? trim($_POST['content']) : '';

        if ($user_id <= 0 || empty($content)) {
            echo json_encode([
                "status" => "error",
                "message" => "ID o contenido inválido"
            ]);
            exit;
        }

        $updated = $comment->updateComment($id, $content, $user_id);

        if ($updated) {
            echo json_encode([
                "status" => "success", 
                "message" => "Comentario actualizado correctamente"
            ]);
        } else {
            echo json_encode([
                "status" => "blocked", 
                "message" => "No puedes editar este comentario. Tal vez no eres el autor o han pasado más de 5 minutos"
            ]);
        }
        break;
}