<?php
class Category extends Conectar
{
    // Obtener todas las categorias de tbl_category
    public function getCategory()
    {
        try {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT id, name FROM tbl_category ORDER BY name ASC";
            $stmt = $conectar->prepare($sql);
            $stmt->execute();
            $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $categories ?: [];
        } catch (PDOException $e) {
            return ['error' => 'Error al obtener categorías: ' . $e->getMessage()];
        }
    }
}
