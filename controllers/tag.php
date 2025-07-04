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
        $datos = $tags->getAllTags();
        echo json_encode($datos);
        break;
}