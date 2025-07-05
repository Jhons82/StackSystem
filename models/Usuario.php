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

        // Generar slug en base al username de usuario
        // Convertir a minúsculas
        $slug = strtolower($username);
        // Reemplazar caracteres acentuados o especiales
        $slug = iconv('UTF-8', 'ASCII//TRANSLIT', $slug);
        // Reemplazar todo lo que no sea letras, números o guiones con espacio
        $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);
        // Reemplazar espacios y guiones múltiples por un solo guion
        $slug = preg_replace('/[\s-]+/', '-', $slug);
        // Eliminar guiones la principo o al final
        $slug = trim($slug, '-');
        // Asegura validez de url
        $slug = urlencode($slug);

        // valor adicional para la imagen por defecto
        $defaultImage = 'assets/images/user_1.png';
        // Valor por defecto para el estado del usuario (activo = 1)
        $defaultStatus = 1;

        $sql = "INSERT INTO tbl_user (username, email, password, image, slug, status) VALUES (?, ?, ?, ?, ?, ?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $username);
        $sql->bindValue(2, $email);
        $sql->bindValue(3, $password);
        $sql->bindValue(4, $defaultImage);
        $sql->bindValue(5, $slug);
        $sql->bindValue(6, $defaultStatus, PDO::PARAM_INT); // Asegurar que sea un entero
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
        $sql = "SELECT *,
                    CASE
                        WHEN  TIMESTAMPDIFF(MINUTE, created_at, NOW()) < 60 THEN 
                            CONCAT('miembro desde hace ', TIMESTAMPDIFF(MINUTE , created_at, NOW()), ' minutos')

                        WHEN TIMESTAMPDIFF(HOUR, created_at, NOW()) < 24 THEN 
                            CONCAT('miembro desde hace ', TIMESTAMPDIFF(HOUR, created_at, NOW()), ' horas y ', MOD(TIMESTAMPDIFF(MINUTE, created_at, NOW()), 60), ' minutos')

                        WHEN TIMESTAMPDIFF(DAY, created_at, NOW()) < 30 THEN 
                            CONCAT('miembro desde hace ', 
                                TIMESTAMPDIFF(DAY, created_at, NOW()), ' días y ', 
                                MOD(TIMESTAMPDIFF(HOUR, created_at, NOW()), 24), ' horas')

                        WHEN TIMESTAMPDIFF(MONTH, created_at, NOW()) < 12 THEN 
                            CONCAT('miembro desde hace ', 
                                TIMESTAMPDIFF(MONTH, created_at, NOW()), ' meses y ', 
                                MOD(TIMESTAMPDIFF(DAY, created_at, NOW()), 30), ' días')

                        ELSE 
                            CONCAT('miembro desde hace ', 
                                TIMESTAMPDIFF(YEAR, created_at, NOW()), ' años y ', 
                                MOD(TIMESTAMPDIFF(MONTH, created_at, NOW()), 12), ' meses')
                    END AS member
                FROM tbl_user
                WHERE id = ?";
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

        // Generar slug en base al username de usuario
        // Convertir a minúsculas
        $slug = strtolower($username);
        // Reemplazar caracteres acentuados o especiales
        $slug = iconv('UTF-8', 'ASCII//TRANSLIT', $slug);
        // Reemplazar todo lo que no sea letras, números o guiones con espacio
        $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);
        // Reemplazar espacios y guiones múltiples por un solo guion
        $slug = preg_replace('/[\s-]+/', '-', $slug);
        // Eliminar guiones la principo o al final
        $slug = trim($slug, '-');
        // Asegura validez de url
        $slug = urlencode($slug);

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
        $sql = "UPDATE tbl_user SET username = ?, image = ?, country = ?, description = ?, website = ?, twitter = ?, facebook = ?, instagram = ?, youtube = ?, vimeo = ?, github = ?, slug = ?, updated_at = now() WHERE id = ?";
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
        $stmt->bindValue(12, $slug);
        $stmt->bindValue(13, $id, PDO::PARAM_INT);

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
        $sql = "UPDATE tbl_user SET email = ?, updated_at = now() WHERE id = ?";
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
        $sql = "UPDATE tbl_user SET password = ?, updated_at = now() WHERE id = ?";
        $stmt = $conectar->prepare($sql);
        $stmt->bindValue(1, $hashed_password, PDO::PARAM_STR);
        $stmt->bindValue(2, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Metodo para elimiar el usuario
    public function deleteUser($id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE tbl_user SET status = 0, deleted_at = now() WHERE id = :id AND status = 1";
        $stmt = $conectar->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Obtener lista de usuarios
    public function getAllUsers() {
        $conectar = parent::conexion();
        parent::set_names();
        $stmt = $conectar->prepare('SELECT id, username, email, image, country, description, website, slug FROM tbl_user WHERE status = 1 ORDER BY username ASC');
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($users as &$user) {
            $user['reputation'] = rand(1, 1000);
        }

        return $users;
    }
}
