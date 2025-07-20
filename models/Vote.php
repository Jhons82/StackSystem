<?php
class Vote extends Conectar 
{
    // Metodo
    public function insertOrUpdateVote($user_id, $post_id, $post_type, $vote_type) {
        $conectar = parent::conexion();
        $stmt = $conectar->prepare("SELECT vote_type FROM tbl_voted WHERE user_id = ? AND post_id = ? and post_type = ?");
        $stmt->execute([$user_id, $post_id, $post_type]);

        if ($stmt->rowCount() > 0) {
            $existing_vote = $stmt->fetch(PDO::FETCH_ASSOC)['vote_type'];
            if ($existing_vote === $vote_type) {
                //si el voto es el mismo, eiminar el voto
                $sql = "DELETE FROM tbl_voted WHERE user_id = ? AND post_id = ? AND post_type = ?";
                $stmt = $conectar->prepare($sql);
                $stmt->execute([$user_id, $post_id, $post_type]);
                return ["status" => "deleted", "message" => "Voto eliminado"];
            } else {
                // Si el voto es diferente, actualiza el voto
                $sql = "UPDATE tbl_voted SET vote_type = ?, created_at = now() WHERE user_id = ? AND post_id = ? AND post_type = ?";
                $stmt = $conectar->prepare($sql);
                $stmt->execute([$vote_type, $user_id, $post_id, $post_type]);

                return ["status" => "updated", "message" => "Voto actualizado"];
            }
        } else {
            // Si no votó antes, inserta nuevo voto
            $sql = "INSERT INTO tbl_voted (user_id, post_id, post_type, vote_type, created_at) VALUES (?, ?, ?, ?, NOW())";
            $stmt = $conectar->prepare($sql);
            $stmt->execute([$user_id, $post_id, $post_type, $vote_type]);

            return ["status" => "inserted", "message" => "Voto insertado"];
        }
    }

    public function getVoteCount($post_id, $post_type) {
        $conectar =parent::conexion();
        $stmt = $conectar->prepare("SELECT 
                SUM(vote_type = 'up') - SUM(vote_type = 'down') AS total
            FROM tbl_voted
            WHERE post_id = ? AND post_type = ?");
        $stmt->execute([$post_id, $post_type]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result && isset($result["total"]) ? (int)$result["total"] : 0; // Devuelve el total de votos
    }

    public function getUserVote($user_id, $post_id, $post_type) {
        $conectar = parent::conexion();
        $stmt = $conectar->prepare("SELECT vote_type FROM tbl_voted WHERE user_id = ? AND post_id = ? AND post_type = ?");
        $stmt->execute([$user_id, $post_id, $post_type]);
        return $stmt->fetchColumn(); // Devuelve 'up', 'down' o false
    }
}