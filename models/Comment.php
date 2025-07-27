<?php
class Comment extends Conectar {
    // Metodo para insertar comentario, según sea comentario para pregunta o respuesta
    public function insertComment($user_id, $content, $target_type, $target_id) {
        $conectar = parent::conexion();
        parent::set_names();

        // Validación del tipo
        if (!in_array($target_type, ['question', 'answer'])) {
            return['status' => 'error', 'message' => 'Tipo inválido'];
        }
        // Validación de existencia de target_id
        $tabla = $target_type === 'question' ? 'tbl_question' : 'tbl_answer';
        $stmt = $conectar->prepare("SELECT id FROM $tabla WHERE id = ?");
        $stmt->execute([$target_id]);
        if (!$stmt->fetch()) {
            return ['status' => 'error', 'message' => 'El ID especificado no existe en $tabla'];
        }

        // Insertar comentario
        $sql = "INSERT INTO tbl_comments (user_id, content, target_type, target_id) VALUES (?, ?, ?, ?)";
        $stmt = $conectar->prepare($sql);
        $stmt->execute([$user_id, $content, $target_type, $target_id]);

        return ["status" => "success"];
    }
}