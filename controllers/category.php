<?php

require_once('../config/session.php');
require_once('../config/conexion.php');
require_once('../models/category.php');
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/functions.php';

$categoria = new Category();

switch ($_GET['op']) {
    case 'get_category':
        $datos = $categoria->getCategory();
        $html="";
        $html.="<option selected='' value=''>Seleccionar Categoría</option>";
        if (is_array($datos) === true and count($datos)>0) {
            foreach ($datos as $row) {
                $html.="<option value='".$row["id"]."'>".$row["name"]."</option>";
            }
            echo json_encode(["status"=> "success", "message"=>"Categorias encontradas", "html" => $html]);
        } else {
            echo json_encode(["status"=> "error", "message"=>"Categorias no encontradas",]);
        }
        break;
}