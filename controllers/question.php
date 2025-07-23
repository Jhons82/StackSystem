<?php
require_once('../config/session.php');
require_once('../config/conexion.php');
require_once('../models/Question.php');
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/functions.php';

$question = new Question();

switch ($_GET['op']) {
    case 'search':
        $term = $_GET['term'] ?? '';
        $tags = $question->searchTags($term);
        echo json_encode($tags);
        break;

    case 'insert_question':
        $id = getSessionUserId();
        
        $title = trim($_POST["title"]) ?? '';
        $category_id = trim($_POST["category_id"]) ?? '';
        $content = trim($_POST["content"]) ?? '';
        $excerpt = $_POST['excerpt'] ?? '';
        $excerpt = htmlspecialchars(trim($excerpt), ENT_QUOTES);
        // Notificaciones de respuesta a pregunta (Activo: 1, No activo: 0)
        $notifications_enabled = isset($_POST['notifications_enabled']) ? 1 : 0;
        // Proceso de tag
        $tags_raw = $_POST["tags"] ?? '[]';
        $tags_decoded = json_decode($tags_raw, true);

        $tags = [];

        if (is_array($tags_decoded)) {
            foreach ($tags_decoded as $tag) {
                if (is_string($tag)) {
                    $tags[] = $tag;
                }
                elseif (is_array($tag) && isset($tag['value'])) {
                    $tags[] = $tag['value'];
                }
            }
        }

        function isContentEmpty($html) {
            $text = strip_tags($html);
            $text = trim($text);
            return empty($text);
        }

        if (empty($title) || empty($category_id) || empty($content) || isContentEmpty($content)) {
            echo json_encode(["status" => "info", "message" => "Por favor, asegúrate de llenar todos los campos requeridos antes de enviar."]);
            exit;
        }

        if (strlen($title) < 20) {
            echo json_encode(["status" => "info", "message" => "La pregunta debe tener al menos 20 caracteres."]);
            exit;
        }

        try {
            $question_id = $question->insertQuestion($id, $category_id, $title, $excerpt, $content, $notifications_enabled);

            foreach ($tags as $tag_name) {
                $tag_id = $question->getTagId($tag_name);
                $question->insertQuestionTag($question_id, $tag_id);

            }
            echo json_encode(["status" => "success", "message" => "Tu pregunta fue publicada correctamente."]);
        } catch (Exception $e) {
            echo json_encode(["status" => "error", "message" => "Ocurrió un error al guardar la pregunta."]);
        }
        break;

    case 'register_view':
        $user_id = getSessionUserId();
        $question_id = $_POST['question_id'] ?? 0;
        if ($user_id > 0 && $question_id > 0) {
            $question->registerView($question_id, $user_id);
            echo json_encode(["status" => "success", "message" => "Vista registrada correctamente."]);
        } else {
            echo json_encode(["status" => "error", "message" => "Error al registrar la vista."]);
        }
        break;

    case 'get_total_views':
        

        if (!isset($_POST['question_id']) || empty($_POST['question_id'])) {
            echo json_encode([
                "status" => "error",
                "message" => "question_id no recibido"
            ]);
            exit;
        }
        $question_id = $_POST['question_id'];
        $total = $question->getViewsByQuestion($question_id);

        echo json_encode([
            "status" => "success",
            "total_views" => $total
        ]);
        break;
}