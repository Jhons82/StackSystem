<?php
class Vote extends Conectar 
{
    // Metodo
    public function insertOrUpdateVote($user_id, $post_id, $post_type, $vote_type) {
        $conectar = parent::conexion();
        $stmt = $conectar->prepare("SELECT * FROM tbl_voted WHERE user_id = ? AND post_id = ? and post_type = ?");
        $stmt->execute([$user_id, $post_id, $post_type]);

        if ($stmt->rowCount() > 0) {
            // si voto, actualiza el voto
            $sql = "UPDATE tbl_voted SET vote_type = ?, created_at = now() WHERE user_id = ? AND post_id = ? AND post_type = ?";
            $stmt = $conectar->prepare($sql);
            $stmt->execute([$vote_type, $user_id, $post_id, $post_type]);
        } else {
            // Nuevo voto
            $sql = "INSERT INTO tbl_voted (user_id, post_id, post_type, vote_type, created_at) VALUES (?, ?, ?, ?, NOW())";
        }
    }

    public function getVoteCount($post_id, $post_type) {
        $conectar =parent::conexion();
        $stmt = $conectar->prepare("SELECT 
                                    SUM(vote_type = 'up') AS upvotes,
                                    SUM(vote_type = 'down') AS downvotes
                                FROM tbl_voted
                                WHERE post_id = ? AND post_type = ?");
        $stmt->execute([$post_id, $post_type]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserVote($user_id, $post_id, $post_type) {
        $conectar = parent::conexion();
        $stmt = $conectar->prepare("SELECT vote_type FROM tbl_voted WHERE user_id = ? AND post_id = ? AND post_type = ?");
        $stmt->execute([$user_id, $post_id, $post_type]);
        return $stmt->fetchColumn(); // Devuelve 'up', 'down' o false
    }
}