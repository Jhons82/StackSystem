<?php
    class Usuario extends Conectar{
        // Metodo Login
        public function login($email, $password){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM tbl_user WHERE email=?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $email);
            $sql->execute();
            
            $usuario = $sql->fetch(PDO::FETCH_ASSOC);

            if ($usuario && password_verify($password, $usuario["password"])) {
                return [$usuario]; //Permite tener el mismo formato de respuesta
            } else {
                return []; //Login incorrecto
            }
            
        }
    }
?>