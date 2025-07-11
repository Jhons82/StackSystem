<?php
class Tag extends Conectar {
    // Obtener lista de tags
    public function getAllTags() {
        $conectar = parent::conexion();
        parent::set_names();
        $stmt = $conectar->prepare('SELECT id, name, description FROM tbl_tag WHERE status = 1 ORDER BY name ASC');
        $stmt->execute();
        $tags =  $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Simular conteos
        foreach ($tags as &$tag) {
            $tag['question_count'] = rand(1000, 500000);
            $tag['today_count'] = rand(0, 500);
            $tag['week_count'] = rand(50, 5000);
        }

        return $tags;
    }
    // Metodo para obtener top de tags más usados en preguntas
    public function getMostUsedTags() {
        $conectar = parent::conexion();
        parent::set_names();
        $stmt = $conectar->prepare("
            SELECT 
                t.name,
                COUNT(t.name) AS total_tag 
            FROM tbl_question_tag qt
            INNER JOIN
                tbl_tag t ON t.id = qt.tag_id
            GROUP BY t.name
            ORDER BY total_tag DESC
            LIMIT 15;");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}