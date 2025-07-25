<?php
class Question extends Conectar {
    public function insertQuestion($user_id, $category_id, $title, $excerpt, $content, $notifications_enabled) {
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

        $sql = "INSERT INTO tbl_question (user_id, category_id, title, excerpt, content, slug, notifications_enabled, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conectar->prepare($sql);
        $stmt->bindValue(1, $user_id, PDO::PARAM_INT);
        $stmt->bindValue(2, $category_id, PDO::PARAM_INT);
        $stmt->bindValue(3, $title);
        $stmt->bindValue(4, $excerpt);
        $stmt->bindValue(5, $content);
        $stmt->bindValue(6, $slug);
        $stmt->bindValue(7, $notifications_enabled, PDO::PARAM_INT);
        $stmt->bindValue(8, $defaultStatus, PDO::PARAM_INT);
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
        $stmt = $conectar->prepare("SELECT
            q.id,
            q.user_id,
            q.title,
            q.content,
            q.slug,
            q.excerpt,
            q.notifications_enabled,
            
            IFNULL(qv.question_views, 0) AS question_views,
            IFNULL(ans.question_answers, 0) AS question_answers,
            IFNULL(v.question_votes, 0) AS question_votes,
            
            u.username,
            u.email,
            u.image,
            u.slug AS slugUser,
            
            tg.tags,
            
            CASE
                WHEN TIMESTAMPDIFF(MINUTE, q.created_at, NOW()) < 60 THEN
                    CONCAT('preguntado hace ', TIMESTAMPDIFF(MINUTE, q.created_at, NOW()), ' minutos')
                    
                WHEN TIMESTAMPDIFF(HOUR, q.created_at, NOW()) < 24 THEN
                    CONCAT('preguntado hace ', TIMESTAMPDIFF(HOUR, q.created_at, NOW()), ' horas y ', MOD(TIMESTAMPDIFF(MINUTE, q.created_at, NOW()), 60), ' minutos')
                    
                WHEN TIMESTAMPDIFF(DAY, q.created_at, NOW()) < 30 THEN
                    CONCAT('preguntado hace ', TIMESTAMPDIFF(DAY, q.created_at, NOW()), ' días y ', MOD(TIMESTAMPDIFF(HOUR, q.created_at, NOW()), 24), ' horas')
                    
                WHEN TIMESTAMPDIFF(MONTH, q.created_at, NOW()) < 12 THEN
                    CONCAT('preguntado hace ', TIMESTAMPDIFF(MONTH, q.created_at, NOW()), ' meses y ', MOD(TIMESTAMPDIFF(DAY, q.created_at, NOW()), 30), ' días')
                ELSE
                    CONCAT('preguntado hace ', TIMESTAMPDIFF(YEAR, q.created_at, NOW()), ' años y ', MOD(TIMESTAMPDIFF(MONTH, q.created_at, NOW()), 12), ' meses')
            END AS question_date
            
        FROM tbl_question q

        INNER JOIN tbl_user u ON q.user_id = u.id

        LEFT JOIN (
            SELECT
                qt.question_id,
                GROUP_CONCAT(t.name ORDER BY t.name SEPARATOR ', ') AS tags
            FROM tbl_question_tag qt
            INNER JOIN tbl_tag t ON t.id = qt.tag_id
            GROUP BY qt.question_id
            ) AS tg ON tg.question_id = q.id
            
        LEFT JOIN (
            SELECT
                question_id,
                COUNT(*) AS question_views
            FROM tbl_question_views
            GROUP BY question_id
        ) AS qv ON qv.question_id = q.id

        LEFT JOIN (
            SELECT
                question_id,
                COUNT(*) AS question_answers
            FROM tbl_answer
            GROUP BY question_id
        ) AS ans ON ans.question_id = q.id

        LEFT JOIN (
            SELECT 
                post_id,
                COUNT(*) AS question_votes
            FROM tbl_voted
            WHERE post_type = 'question'
            GROUP BY post_id
        ) AS v ON v.post_id =q.id

        ORDER BY q.created_at DESC
        LIMIT :start, :paginatedQuestions;");
        $stmt->bindParam(':start', $start, PDO::PARAM_INT);
        $stmt->bindParam(':paginatedQuestions', $paginatedQuestions, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Metodo para obtener conteo de busqueda de preguntas según el contenido
    public function countSearchQuestions($search) {
        $conectar = parent::conexion();
        parent::set_names();

        /* Busqueda con palabras claves */
        $keywords = explode(" ", $search);
        $searchConditions = [];
        foreach ($keywords as $i => $keyword) {
            $searchConditions[] = "(title LIKE :keyword$i OR excerpt LIKE :keyword$i)";
        }
        $searchQuery = implode(" OR ", $searchConditions);

        /* Construir la consulta SQL de manera dinamica */
        $stmt = $conectar->prepare("SELECT COUNT(*) AS totalQuestionsFound FROM tbl_question WHERE $searchQuery");
        
        /* Vincular cada palabra clave a la consulta SQL */
        foreach ($keywords as $i => $keyword) {
            $searchParam = "%$keyword%";
            $stmt->bindValue(":keyword$i", $searchParam, PDO::PARAM_STR);
        }
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    // Metodo para búsqueda de pregunta según palabra clave
    public function searchQuestionsWithUserAndTags($start, $paginatedQuestions, $search) {
        $conectar = parent::conexion();
        parent::set_names();

        /* Busqueda con palabras claves */
        $keywords = explode(" ", $search);
        $searchConditions = [];
        foreach ($keywords as $i => $keyword) {
            $searchConditions[] = "(q.title LIKE :keyword$i OR q.excerpt LIKE :keyword$i)";
        }
        $searchQuery = implode(" OR ", $searchConditions);

        $stmt = $conectar->prepare("SELECT 
            q.id,
            q.user_id,
            q.title,
            q.content,
            q.slug,
            q.excerpt,
            q.notifications_enabled,
            IFNULL(qv.question_views, 0) AS question_views,
            IFNULL(ans.question_answers, 0) AS question_answers,
            IFNULL(v.question_votes, 0) AS question_votes,
            u.username,
            u.email,
            u.image,
            u.slug AS slugUser,
            tg.tags,
            CASE
                WHEN TIMESTAMPDIFF(MINUTE, q.created_at, NOW()) < 60 THEN 
                    CONCAT('preguntado hace ', TIMESTAMPDIFF(MINUTE , q.created_at, NOW()), ' minutos')
                WHEN TIMESTAMPDIFF(HOUR, q.created_at, NOW()) < 24 THEN 
                    CONCAT('preguntado hace ', TIMESTAMPDIFF(HOUR, q.created_at, NOW()), ' horas y ', MOD(TIMESTAMPDIFF(MINUTE, q.created_at, NOW()), 60), ' minutos')
                WHEN TIMESTAMPDIFF(DAY, q.created_at, NOW()) < 30 THEN 
                    CONCAT('preguntado hace ', TIMESTAMPDIFF(DAY, q.created_at, NOW()), ' días y ', MOD(TIMESTAMPDIFF(HOUR, q.created_at, NOW()), 24), ' horas')
                WHEN TIMESTAMPDIFF(MONTH, q.created_at, NOW()) < 12 THEN 
                    CONCAT('preguntado hace ', TIMESTAMPDIFF(MONTH, q.created_at, NOW()), ' meses y ', MOD(TIMESTAMPDIFF(DAY, q.created_at, NOW()), 30), ' días')
                ELSE 
                    CONCAT('preguntado hace ', TIMESTAMPDIFF(YEAR, q.created_at, NOW()), ' años y ', MOD(TIMESTAMPDIFF(MONTH, q.created_at, NOW()), 12), ' meses')
            END AS question_date
        FROM tbl_question q
        INNER JOIN tbl_user u ON q.user_id = u.id
        LEFT JOIN (
            SELECT
                qt.question_id,
                GROUP_CONCAT(t.name ORDER BY t.name SEPARATOR ', ') AS tags
            FROM tbl_question_tag qt
            INNER JOIN tbl_tag t ON t.id = qt.tag_id
            GROUP BY qt.question_id
            ) AS tg ON tg.question_id = q.id
        LEFT JOIN (
            SELECT question_id, COUNT(*) AS question_views
            FROM tbl_question_views
            GROUP BY question_id
        ) qv ON q.id = qv.question_id
        LEFT JOIN (
            SELECT question_id, COUNT(*) AS question_answers
            FROM tbl_answer
            GROUP BY question_id
        ) ans ON q.id = ans.question_id
        LEFT JOIN (
            SELECT post_id, COUNT(*) AS question_votes
            FROM tbl_voted
            WHERE post_type = 'question'
            GROUP BY post_id
        ) v ON q.id = v.post_id
        LEFT JOIN tbl_question_tag qt ON qt.question_id = q.id
        LEFT JOIN tbl_tag t ON t.id = qt.tag_id
        WHERE $searchQuery
        GROUP BY q.id
        ORDER BY q.id DESC
        LIMIT :start, :paginatedQuestions;");
        $stmt->bindParam(':start', $start, PDO::PARAM_INT);
        $stmt->bindParam(':paginatedQuestions', $paginatedQuestions, PDO::PARAM_INT);

        /* Vincular cada palabra clave a la consulta SQL */
        foreach ($keywords as $i => $keyword) {
            $searchParam = "%$keyword%";
            $stmt->bindValue(":keyword$i", $searchParam, PDO::PARAM_STR);
        }
        
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Metodo para obtener detalles de una pregunta por ID
    public function getQuestionDetails($id) {
        $conectar = parent::conexion();
        parent:: set_names();
        $stmt = $conectar->prepare("
                SELECT q.id AS question_id, 
                u.id AS user_id, 
                u.slug AS slugUser,
                u.username AS question_author, 
                u.image AS image_author,
                q.title, 
                q.excerpt, 
                q.content, 
                q.slug AS slug,
                GROUP_CONCAT(DISTINCT t.name ORDER BY t.name SEPARATOR ', ') AS tags,
                CASE
                    WHEN TIMESTAMPDIFF(MINUTE, q.created_at, NOW()) < 60 THEN 
                        CONCAT('preguntado hace ', TIMESTAMPDIFF(MINUTE, q.created_at, NOW()), ' minutos')
                    WHEN TIMESTAMPDIFF(HOUR, q.created_at, NOW()) < 24 THEN 
                        CONCAT('preguntado hace ', TIMESTAMPDIFF(HOUR, q.created_at, NOW()), ' horas y ', 
                            MOD(TIMESTAMPDIFF(MINUTE, q.created_at, NOW()), 60), ' minutos')
                    WHEN TIMESTAMPDIFF(DAY, q.created_at, NOW()) < 30 THEN 
                        CONCAT('preguntado hace ', TIMESTAMPDIFF(DAY, q.created_at, NOW()), ' días y ', 
                            MOD(TIMESTAMPDIFF(HOUR, q.created_at, NOW()), 24), ' horas')
                    WHEN TIMESTAMPDIFF(MONTH, q.created_at, NOW()) < 12 THEN 
                        CONCAT('preguntado hace ', TIMESTAMPDIFF(MONTH, q.created_at, NOW()), ' meses y ', 
                            MOD(TIMESTAMPDIFF(DAY, q.created_at, NOW()), 30), ' días')
                    ELSE 
                        CONCAT('preguntado hace ', TIMESTAMPDIFF(YEAR, q.created_at, NOW()), ' años y ', 
                            MOD(TIMESTAMPDIFF(MONTH, q.created_at, NOW()), 12), ' meses')
                END AS question_relative_date
        FROM tbl_question q
        INNER JOIN tbl_user u ON q.user_id = u.id
        INNER JOIN tbl_question_tag qt ON qt.question_id = q.id
        INNER JOIN tbl_tag t ON t.id = qt.tag_id
        WHERE q.id = :id
        GROUP BY q.id;"
        );
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Metodo para obtener respuestas de una pregunta por ID
    public function getAnswersByQuestionId($id) {
        $conectar = parent::conexion();
        parent::set_names();
        $stmt = $conectar->prepare("
            SELECT a.id AS answer_id, 
            a.user_id AS answer_user_id, 
            a.question_id, 
            a.body, 
            a.score, 
            u.username AS answer_author, 
            u.image AS image_author,
            u.slug AS slugUser,
            CASE
                WHEN TIMESTAMPDIFF(MINUTE, a.created_at, NOW()) < 60 THEN 
                    CONCAT('respondido hace ', TIMESTAMPDIFF(MINUTE, a.created_at, NOW()), ' minutos')
                WHEN TIMESTAMPDIFF(HOUR, a.created_at, NOW()) < 24 THEN 
                    CONCAT('respondido hace ', TIMESTAMPDIFF(HOUR, a.created_at, NOW()), ' horas y ', MOD(TIMESTAMPDIFF(MINUTE, a.created_at, NOW()), 60), ' minutos')
                WHEN TIMESTAMPDIFF(DAY, a.created_at, NOW()) < 30 THEN 
                    CONCAT('respondido hace ', TIMESTAMPDIFF(DAY, a.created_at, NOW()), ' días y ', MOD(TIMESTAMPDIFF(HOUR, a.created_at, NOW()), 24), ' horas')
                WHEN TIMESTAMPDIFF(MONTH, a.created_at, NOW()) < 12 THEN 
                    CONCAT('respondido hace ', TIMESTAMPDIFF(MONTH, a.created_at, NOW()), ' meses y ', MOD(TIMESTAMPDIFF(DAY, a.created_at, NOW()), 30), ' días')
                ELSE 
                    CONCAT('respondido hace ', TIMESTAMPDIFF(YEAR, a.created_at, NOW()), ' años y ', MOD(TIMESTAMPDIFF(MONTH, a.created_at, NOW()), 12), ' meses')
            END AS answer_relative_date
    FROM tbl_answer a
    INNER JOIN tbl_user u ON a.user_id = u.id
    WHERE a.question_id = :id
    ORDER BY a.score DESC;");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Metodo para registrar views
    public function registerView($question_id, $user_id) {
        $conectar = parent::conexion();
        parent::set_names();
        // Verificar si ya existe la vista para esa pregunta y usuario
        $stmt = $conectar->prepare("SELECT 1 FROM  tbl_question_views WHERE question_id = ? AND user_id = ?");
        $stmt->execute([$question_id, $user_id]);

        if (!$stmt->fetch()) {
            // Si no existe inserta la vista
            $insert = $conectar->prepare("INSERT INTO tbl_question_views (question_id, user_id) VALUES (?, ?)");
            $insert->execute([$question_id, $user_id]);
        }
    }

    // Metodo para obtener total de vistas segun id de pregunta
    public function getViewsByQuestion($question_id) {
        $conectar = parent::conexion();
        parent::set_names();
        $stmt = $conectar->prepare("SELECT COUNT(*) as total FROM tbl_question_views WHERE question_id = ?");
        $stmt->execute([$question_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ? $result['total'] : 0;
    }
}