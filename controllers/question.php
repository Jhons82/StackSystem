<?php
require_once('../config/session.php');
require_once('../config/conexion.php');
require_once('../models/Question.php');
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/functions.php';

$question = new Question();

switch ($_GET['op']) {
    case 'insert_question':
        $id = getSessionUserId();
        
        $title = trim($_POST["title"]) ?? '';
        $category_id = trim($_POST["category_id"]) ?? '';
        $content = trim($_POST["content"]) ?? '';

        if (empty($title) || empty($category_id) || empty($content)) {
            echo json_encode(["status" => "info", "message" => "Por favor, asegúrate de llenar todos los campos requeridos antes de enviar."]);
            exit;
        }

        if (strlen($title) < 20) {
            echo json_encode(["status" => "info", "message" => "La pregunta debe tener al menos 20 caracteres."]);
            exit;
        }

        try {
            $datos = $question->insertQuestion($id, $category_id, $title, $content);
            echo json_encode(["status" => "success", "message" => "Tu pregunta fue publicada correctamente."]);
        } catch (Exception $e) {
            echo json_encode(["status" => "error", "message" => "Ocurrió un error al guardar la pregunta."]);
        }
        break;
}