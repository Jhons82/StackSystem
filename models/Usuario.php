<?php
class Usuario extends Conectar
{
    // Metodo Login
    public function login($email, $password)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM tbl_user WHERE email=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $email);
        $sql->execute();

        $usuario = $sql->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            if (password_verify($password, $usuario["password"])) {
                return [$usuario];
            } else {
                // Contraseña incorrecta
                return [];
            }
        } else {
            // Usuario no encontrado
            return [];
        }
    }
    // Metodo para insertar nuevo usuario
    public function insertUser($username, $email, $password)
    {
        $conectar = parent::conexion();
        parent::set_names();

        // valor adicional para la imagen por defecto
        $defaultImage = 'assets/images/user_1.png';
        // Valor por defecto para el estado del usuario (activo = 1)
        $defaultStatus = 1;

        $sql = "INSERT INTO tbl_user (username, email, password, image, status) VALUES (?, ?, ?, ?, ?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $username);
        $sql->bindValue(2, $email);
        $sql->bindValue(3, $password);
        $sql->bindValue(4, $defaultImage);
        $sql->bindValue(5, $defaultStatus, PDO::PARAM_INT); // Asegurar que sea un entero
        // Ejecutar la consulta
        $sql->execute();
        return $sql->rowCount() > 0;
    }
    // Metodo para email existente
    public function emailExists($email)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql =  "SELECT * FROM tbl_user WHERE email = ?";
        $stmt = $conectar->prepare($sql);
        $stmt->bindValue(1, $email, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result !== false;
    }

    // Metodo para recuperar los datos del usuario especifico (email)
    public function getUserByEmail($email)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM tbl_user WHERE email = :email LIMIT 1";
        $stmt = $conectar->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
