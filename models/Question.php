<?php
class Question extends Conectar {
    public function insertQuestion($user_id, $category_id, $title, $content, $notifications_enabled) {
        $conectar = parent::conexion();
        parent::set_names();

        // Generar slug en base al username de usuario
        // Convertir a minúsculas
        $slug = strtolower($title);
        // Reemplazar caracteres acentuados o especiales
        $slug = iconv('UTF-8', 'ASCII//TRANSLIT', $slug);
        // Reemplazar todo lo que no sea letras, números o guiones con espacio
        $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);
        // Reemplazar espacios y guiones múltiples por un solo guion
        $slug = preg_replace('/[\s-]+/', '-', $slug);
        // Eliminar guiones la principo o al final
        $slug = trim($slug, '-');
        // Asegura validez de url
        $slug = urlencode($slug);

        // Status
        $defaultStatus = 1;

        $sql = "INSERT INTO tbl_question (user_id, category_id, title, content, slug, notifications_enabled, status) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conectar->prepare($sql);
        $stmt->bindValue(1, $user_id, PDO::PARAM_INT);
        $stmt->bindValue(2, $category_id, PDO::PARAM_INT);
        $stmt->bindValue(3, $title);
        $stmt->bindValue(4, $content);
        $stmt->bindValue(5, $slug);
        $stmt->bindValue(6, $notifications_enabled, PDO::PARAM_INT);
        $stmt->bindValue(7, $defaultStatus, PDO::PARAM_INT);
        $stmt->execute();
        return $conectar->lastInsertId();
    }

    // Metodo para obtener de DB los tags activos
    public function getTagId($name) {
        $conectar = parent::conexion();
        parent::set_names();
        $stmt = $conectar->prepare("SELECT id FROM tbl_tag WHERE name = ?");
        $stmt->execute([$name]);
        $id = $stmt->fetchColumn();

        if (!$id) {
            // No existe, lo inserta
            $stmt = $conectar->prepare("INSERT INTO tbl_tag (name) VALUES (?)");
            $stmt->execute([$name]);
            return $conectar->lastInsertId();
        }
        return $id;
    }

    // Metodo para insertar en tbl_question_tag los datos correspondientes a question y tag
    public function insertQuestionTag($question_id, $tag_id) {
        $conectar = parent::conexion();
        $stmt = $conectar->prepare("INSERT IGNORE INTO tbl_question_tag (question_id, tag_id) VALUES (?, ?)");
        $stmt->execute([$question_id, $tag_id]);
    }

    // Metodo para buscar tags
    public function searchTags($term) {
        $conectar = parent::conexion();
        parent::set_names();

        $stmt = $conectar->prepare("SELECT name FROM tbl_tag WHERE name LIKE ? ORDER BY name ASC LIMIT 10");
        $stmt->execute(["%" . $term . "%"]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    // Metodo para conteo de preguntas
    public function countAllQuestions() {
        $conectar = parent::conexion();
        parent::set_names();
        $stmt = $conectar->prepare("SELECT COUNT(*) AS total FROM tbl_question");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'] ?? 0;
    }

    // Metodo para obtener datos con relación a preguntas de las tablas (tbl_question, tbl_user, tbl_tag, tbl_question_tag)
    public function getAllQuestionsWithUserAndTag($start, $paginatedQuestions) {
        $conectar = parent::conexion();
        parent::set_names();
        $stmt = $conectar->prepare("
            SELECT q.id, 
                    q.user_id, 
                    q.title, 
                    q.content, 
                    q.slug, 
                    q.notifications_enabled,
                    u.username,
                    u.email,
                    u.image,
                    u.slug AS slugUser,
                    GROUP_CONCAT(t.name ORDER BY t.name SEPARATOR ', ') AS tags,
                CASE
                WHEN  TIMESTAMPDIFF(MINUTE, q.created_at, NOW()) < 60 THEN 
                    CONCAT('preguntado hace ', TIMESTAMPDIFF(MINUTE , q.created_at, NOW()), ' minutos')

                WHEN TIMESTAMPDIFF(HOUR, q.created_at, NOW()) < 24 THEN 
                    CONCAT('preguntado hace ', TIMESTAMPDIFF(HOUR, q.created_at, NOW()), ' horas y ', MOD(TIMESTAMPDIFF(MINUTE, q.created_at, NOW()), 60), ' minutos')

                WHEN TIMESTAMPDIFF(DAY, q.created_at, NOW()) < 30 THEN 
                    CONCAT('preguntado hace ', 
                        TIMESTAMPDIFF(DAY, q.created_at, NOW()), ' días y ', 
                        MOD(TIMESTAMPDIFF(HOUR, q.created_at, NOW()), 24), ' horas')

                WHEN TIMESTAMPDIFF(MONTH, q.created_at, NOW()) < 12 THEN 
                    CONCAT('preguntado hace ', 
                        TIMESTAMPDIFF(MONTH, q.created_at, NOW()), ' meses y ', 
                        MOD(TIMESTAMPDIFF(DAY, q.created_at, NOW()), 30), ' días')

                ELSE 
                    CONCAT('preguntado hace ', 
                        TIMESTAMPDIFF(YEAR, q.created_at, NOW()), ' años y ', 
                        MOD(TIMESTAMPDIFF(MONTH, q.created_at, NOW()), 12), ' meses')
            END AS question_date
            FROM tbl_question q 
            INNER JOIN tbl_user u ON q.user_id = u.id
            INNER JOIN tbl_question_tag qt ON qt.question_id = q.id
            INNER JOIN tbl_tag t ON t.id = qt.tag_id
            GROUP BY
                q.id
            LIMIT
                :start, :paginatedQuestions;");
        $stmt->bindParam(':start', $start, PDO::PARAM_INT);
        $stmt->bindParam(':paginatedQuestions', $paginatedQuestions, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}