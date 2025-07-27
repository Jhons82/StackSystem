<?php
require_once('../config/session.php');
require_once('../config/conexion.php');
require_once('../models/Comment.php');
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/functions.php';

$comment = new Comment();

switch ($_GET["op"]) {
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
}