<?php
require_once('../config/session.php');
require_once('../config/conexion.php');
require_once('../models/Answer.php');
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/functions.php';

$answer = new Answer();

switch ($_GET['op']) {
    case 'insert_answer':
        $user_id = getSessionUserId();

        $question_id = $_POST["question_id"] ?? '0';
        $body = $_POST["body"] ?? '';

        if (empty($body)) {
            echo(["status" => "info", "message" => "Por favor, asegúrate de realizar tu respuesta antes de enviar."]);
        }

        try {
            $answer->insertAnswer($question_id, $user_id, $body);
            echo json_encode(["status" => "success", "message" => "Se registro correctamente su respuesta a está pregunta."]);
        } catch (Exception $e) {
            echo json_encode(["status" => "error", "message" => "No se pudo registrar su respuesta."]);
        }
        break;
}