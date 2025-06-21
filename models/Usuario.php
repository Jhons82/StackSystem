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
            if ($usuario["status"] === 0) {
                // Usuario eliminado
                return ["status" => "deleted"];
            }

            if (password_verify($password, $usuario["password"])) {
                return ["status" => "success", "data" => $usuario];
            } else {
                // Contraseña incorrecta
                return ["status" => "wrong_password"];
            }
        } else {
            // Usuario no encontrado
            return ["status" => "not_found"];
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

    // Metodo para obtener datos de usuario segun id
    public function get_user($id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM tbl_user WHERE id = ?";
        $stmt = $conectar->prepare($sql);
        $stmt->bindValue(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //Metodo actualizar datos de usuario (No email, No password)
    public function updateuser($id, $username, $image, $country, $description, $website, $twitter, $facebook, $instagram, $youtube, $vimeo, $github)
    {
        $conectar = parent::conexion();
        parent::set_names();

        // Obtener los datos actuales del usuario
        $sql = "SELECT * FROM tbl_user WHERE id = ?";
        $stmt = $conectar->prepare($sql);
        $stmt->bindValue(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $current = $stmt->fetch(PDO::FETCH_ASSOC);

        // Si no se encuentra el usuario, retornar false
        if (!$current) return false;

        // Si no hay imagen nueva, usar la actual
        $finalImage = !empty($image) ? $image : $current['image'];

        $nochanges =
            $current['username'] === $username &&
            $current['image'] === $finalImage &&
            $current['country'] === $country &&
            $current['description'] === $description &&
            $current['website'] === $website &&
            $current['twitter'] === $twitter &&
            $current['facebook'] === $facebook &&
            $current['instagram'] === $instagram &&
            $current['youtube'] === $youtube &&
            $current['vimeo'] === $vimeo &&
            $current['github'] === $github;

        if ($nochanges) {
            return false; // No hay actualizar sin no hay cambio    
        }

        // Realizar la actualización si al menos existe un cambio
        $sql = "UPDATE tbl_user SET username = ?, image = ?, country = ?, description = ?, website = ?, twitter = ?, facebook = ?, instagram = ?, youtube = ?, vimeo = ?, github = ? WHERE id = ?";
        $stmt = $conectar->prepare($sql);
        $stmt->bindValue(1, $username);
        $stmt->bindValue(2, $image);
        $stmt->bindValue(3, $country);
        $stmt->bindValue(4, $description);
        $stmt->bindValue(5, $website);
        $stmt->bindValue(6, $twitter);
        $stmt->bindValue(7, $facebook);
        $stmt->bindValue(8, $instagram);
        $stmt->bindValue(9, $youtube);
        $stmt->bindValue(10, $vimeo);
        $stmt->bindValue(11, $github);
        $stmt->bindValue(12, $id, PDO::PARAM_INT);

        $stmt->execute();
        return $stmt->rowCount() > 0; // Retornar true si se actualizó al menos un campo
    }

    //Metodo actualizar email
    public function updateEmail($id, $email)
    {
        $conectar = parent::conexion();
        parent::set_names();
        // Verificar si el nuevo email ya existe
        $sql = "SELECT * FROM tbl_user WHERE email = ? AND id != ?";
        $stmt = $conectar->prepare($sql);
        $stmt->bindValue(1, $email, PDO::PARAM_STR);
        $stmt->bindValue(2, $id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->fetch(PDO::FETCH_ASSOC)) {
            return false; // El email está en uso por otro usuario
        }
        // Verificar si el nuevo email es igual al actual
        $sql = "SELECT email FROM tbl_user WHERE id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id, PDO::PARAM_INT);
        $sql->execute();
        $current = $sql->fetch(PDO::FETCH_ASSOC);

        if ($current && $current['email'] === $email) return false;

        // Actualizar el email nuevo
        $sql = "UPDATE tbl_user SET email = ? WHERE id = ?";
        $stmt = $conectar->prepare($sql);
        $stmt->bindValue(1, $email, PDO::PARAM_STR);
        $stmt->bindValue(2, $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount() > 0; // Retornar true si se actualizó el email
    }
    // Metodo para actualizar password
    public function updatePassword($id, $hashed_password)
    {
        $conectar = parent::conexion();
        parent::Set_names();
        $sql = "UPDATE tbl_user SET password = ? WHERE id = ?";
        $stmt = $conectar->prepare($sql);
        $stmt->bindValue(1, $hashed_password, PDO::PARAM_STR);
        $stmt->bindValue(2, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Metodo para elimiar el usuario
    public function deleteUser($id) {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE tbl_user SET status = 0 WHERE id = :id AND status = 1";
        $stmt=$conectar->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
