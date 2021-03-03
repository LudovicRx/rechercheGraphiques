<?php

/**
 * Class that makes query on the database for a user
 * 
 * @author Ludovic Roux
 * 
 */
class LUserDB
{
    /**
     * Get a specific user thanks his id
     *
     * @param int $id id of the user
     * @return array if succeed or false if failure
     */
    public static function getUser($id)
    {
        static $ps = null;
        $sql = "SELECT id, username FROM users WHERE id = :ID;";

        try {
            if ($ps == null) {
                $ps = EDatabase::getInstance()->prepare($sql);
            }

            $ps->bindParam(":ID", $id, PDO::PARAM_INT);
            $ps->execute();

            $result = $ps->fetch(PDO::FETCH_ASSOC);
            return new LUser(intval($result["idUser"]), $result["username"]);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    /**
     * Insert a user in the database
     *
     * @param string $username username of the user
     * @param string $password password of the user
     * @return bool true if succeed, else false
     */
    public static function insertUser($username, $password)
    {
        static $ps = null;
        $sql = "INSERT INTO users (username, password) VALUES(:USERNAME, :PASSWORD)";

        try {
            if ($ps == null) {
                $ps = EDatabase::getInstance()->prepare($sql);
            }

            $ps->bindParam(":USERNAME", $username, PDO::PARAM_STR);
            $ps->bindParam(":PASSWORD", self::hashPassword($password), PDO::PARAM_STR);
            return $ps->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    /**
     * Update the password from a user
     *
     * @param int $id id of the user
     * @param string $newPassword new password for the user
     * @return bool true if succeed, else false
     */
    public static function updatePassword($id, $newPassword)
    {
        static $ps = null;
        $sql = "UPDATE users SET password = :PASSWORD WHERE id LIKE :ID";

        try {
            if ($ps == null) {
                $ps = EDatabase::getInstance()->prepare($sql);
            }

            $ps->bindParam(":ID", $id, PDO::PARAM_INT);
            $ps->bindParam(":PASSWORD", self::hashPassword($newPassword), PDO::PARAM_STR);
            return $ps->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    /**
     * Verify that the password is the same as before
     *
     * @param int $id id of the user
     * @param string $oldPassword old password of the user
     * @return bool true if the same password, else false
     */
    public static function verifyPassword($id, $oldPassword)
    {
        static $ps = null;
        $sql = "SELECT password FROM users WHERE id = :ID";

        try {
            if ($ps == null) {
                $ps = EDatabase::getInstance()->prepare($sql);
            }

            $ps->bindParam(":ID", $id, PDO::PARAM_INT);
            $ps->execute();
            $result = $ps->fetchAll(PDO::FETCH_ASSOC);
            // If there is only one result
            if (count($result) === 1) {
                return $result[0]["password"] == self::hashPassword($oldPassword);
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return false;
    }

    /**
     * Hash the password
     *
     * @param string $password password to hash
     * @return string password that is hashed
     */
    private static function hashPassword($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    /**
     * Update the usr
     *
     * @param int $id id of the user
     * @param string $newUsername new username for the user
     * @return bool true if succeed, else false
     */
    public static function updateUser($id, $newUsername)
    {
        static $ps = null;
        $sql = "UPDATE users SET username = :USERNAME WHERE id LIKE :ID";

        try {
            if ($ps == null) {
                $ps = EDatabase::getInstance()->prepare($sql);
            }

            $ps->bindParam(":ID", $id, PDO::PARAM_INT);
            $ps->bindParam(":USERNAME", $newUsername, PDO::PARAM_STR);
            return $ps->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
