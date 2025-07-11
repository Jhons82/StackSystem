<?php

require_once('../config/session.php');
require_once('../config/conexion.php');
require_once('../models/Tag.php');
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/functions.php';

$tag = new Tag();

switch ($_GET['op']) {
    case 'get_all_tags':
        $id = getSessionUserId();
        $datos = $tag->getAllTags();
        echo json_encode($datos);
        break;

    case 'top_tags':
        $data = $tag->getMostUsedTags();
        echo json_encode(['status' => 'success', 'data' => $data]);
        break;
}