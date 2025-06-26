<?php
class Question extends Conectar {
    public function insertQuestion($user_id, $title, $content) {
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

        $sql = "INSERT INTO tbl_question (user_id, title, content, slug, status) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conectar->prepare($sql);
        $stmt->bindValue(1, $user_id, PDO::PARAM_INT);
        $stmt->bindValue(2, $title);
        $stmt->bindValue(3, $content);
        $stmt->bindValue(4, $slug);
        $stmt->bindValue(5, $defaultStatus, PDO::PARAM_INT);
        return $stmt->execute();
    }
}