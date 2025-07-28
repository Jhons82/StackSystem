<?php
class Comment extends Conectar {
    // Metodo para traer todos los comentarios correspondientes, según pregunta y respuesta
    public function getComments($target_id, $target_type) {
        $conectar = parent::conexion();
        parent::set_names();
        // Ejecutar primero el SET por separado
        $conectar->query("SET lc_time_names = 'es_ES';");
        // Preparamos y ejecutamos la consulta principal
        $stmt = $conectar->prepare("SELECT 
                c.id AS comment_id,
                c.user_id, 
                c.content, 
                u.username,
                u.slug,
                DATE_FORMAT(c.created_at, '%d de %M de %Y a las %h:%i %p') AS comment_date,
                c.created_at AS created_at_raw
            FROM tbl_comments c
            INNER JOIN tbl_user u ON c.user_id = u.id
            WHERE c.target_id = :target_id AND c.target_type = :target_type
            ");
        $stmt->execute([
            ':target_id' => $target_id, 
            ':target_type' => $target_type
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Devolver los datos como arrat asociativo
    }

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

    // Metodo para actualizar comentario
    public function updateComment($id, $content, $user_id) {
        $conectar = parent::conexion();
        parent::set_names();
        $stmt = $conectar->prepare("UPDATE
                tbl_comments
            SET content = :content
            WHERE id = :id
            AND user_id = :user_id
            AND TIMESTAMPDIFF(MINUTE, created_at, now()) < 5
        ");
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        $stmt->execute();

        // Verificar si realmente se actualizó
        return $stmt->rowCount() > 0;
    }
}