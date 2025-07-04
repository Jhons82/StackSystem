<?php
class Tag extends Conectar {
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
}