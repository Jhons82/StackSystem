<?php
class Question extends Conectar {
    public function insertQuestion($user_id, $category_id, $title, $content) {
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

        $sql = "INSERT INTO tbl_question (user_id, category_id, title, content, slug, status) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conectar->prepare($sql);
        $stmt->bindValue(1, $user_id, PDO::PARAM_INT);
        $stmt->bindValue(2, $category_id, PDO::PARAM_INT);
        $stmt->bindValue(3, $title);
        $stmt->bindValue(4, $content);
        $stmt->bindValue(5, $slug);
        $stmt->bindValue(6, $defaultStatus, PDO::PARAM_INT);
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
}