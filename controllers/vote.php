<?php
require_once('../config/session.php');
require_once('../config/conexion.php');
require_once('../models/Vote.php');
require_once __DIR__ . '../includes/config.php';
require_once __DIR__ . '../includes/functions.php';

$vote = new Vote();

switch ($_GET['op']) {
    case 'vote':
        $user_id = $_POST['user_id'];
        $post_id = $_POST['post_id'];
        $post_type = $_POST['post_type'];
        $vote_type = $_POST['vote_type'];

        $vote->insertOrUpdateVote($user_id, $post_id, $post_type, $vote_type);
        echo json_encode(["status" => "success"]);
        break;
    
    case 'get_votes':
        $user_id = $_POST['user_id'];
        $post_type = $_POST['post_type'];
        $data = $vote->getVoteCount($post_id, $post_type);
        echo json_encode($data);
        break;

    case 'get_user_vote':
        $user_id = $_POST['user_id'];
        $post_id = $_POST['post_id'];
        $post_type = $_POST['post_type'];
        $data = $vote->getUserVote($user_id, $post_id, $post_type);
        echo json_encode(["vote_type" => $data]);
        break;
}