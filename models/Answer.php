<?php
class Answer extends Conectar{
    public function insertAnswer($question_id, $user_id, $body) {
        $conectar = parent::conexion();
        parent::set_names();
        $stmt = $conectar->prepare("INSERT INTO tbl_answer (question_id, user_id, body, status, created_at)
            VALUES (:question_id, :user_id, :body, 0, now())");
        $stmt->bindValue(':question_id', $question_id, PDO::PARAM_INT);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindValue(':body', $body, PDO::PARAM_STR);
        $stmt->execute();
        return $conectar->lastInsertId();
    }
}