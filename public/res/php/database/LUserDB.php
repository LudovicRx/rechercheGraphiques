<?php

/** LUserDB
 *  -------
 *  @file
 *  @copyright Copyright (c) 2020 Recherche graphiques, MIT License, See the LICENSE file for copying permissions.
 *  @brief Class LUserDB
 *  @author ludovic.rx@eduge.ch
 */

/**
 * @brief Class that makes query on DB for users
 */
class LUserDB
{
    /**
     * Set the constructor as private so we can not create an instance of LUserDB
     */
    private function __construct()
    {
    }
    /**
     * Set the clone to private so we can't clone an LUserDB object
     */
    private function __clone()
    {
    }

    /**
     * Get a specific user thanks his id
     *
     * @param int $id id of the user
     * @return LUser if succeed, else false if failure
     */
    public static function getUserById(int $id)
    {
        static $ps = null;
        $sql = "SELECT id, email, username, password FROM users WHERE id = :ID;";

        try {
            if ($ps == null) {
                $ps = EDatabase::getInstance()->prepare($sql);
            }

            $ps->bindParam(":ID", $id, PDO::PARAM_INT);
            $ps->execute();

            $result = $ps->fetch(PDO::FETCH_ASSOC);
            return new LUser(intval($result["id"]), $result["email"], $result["username"]);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    /**
     * Get a specific user thanks to the email
     *
     * @param string $email email of the user
     * @return LUSer if succeed, else false
     */
    public static function getUserByEmail(string $email)
    {
        static $ps = null;
        $sql = "SELECT id, email, username, password FROM users WHERE email LIKE :EMAIL;";

        try {
            if ($ps == null) {
                $ps = EDatabase::getInstance()->prepare($sql);
            }

            $ps->bindParam(":EMAIL", $email, PDO::PARAM_STR);
            $ps->execute();

            if ($result = $ps->fetch(PDO::FETCH_ASSOC)) {
                return new LUser(intval($result["id"]), $result["email"], $result["username"]);
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return false;
    }

    /**
     * Verify if an email exists
     *
     * @param string $email email tht we verify
     * @return bool true if the emai exists, else false
     */
    public static function emailExists(string $email)
    {
        return self::getUserByEmail($email);
    }

    /**
     * Insert a user in the database
     *
     * @param string $email email of the user
     * @param string $username username of the user
     * @param string $password password of the user
     * @return bool true if succeed, else false
     */
    public static function insertUser(string $email, string $username, string $password)
    {
        static $ps = null;
        $sql = "INSERT INTO users (email, username, password) VALUES(:EMAIL, :USERNAME, :PASSWORD)";

        try {
            if ($ps == null) {
                $ps = EDatabase::getInstance()->prepare($sql);
            }

            $hashPassword = self::hashPassword($password);
            $ps->bindParam(":EMAIL", $email, PDO::PARAM_STR);
            $ps->bindParam(":USERNAME", $username, PDO::PARAM_STR);
            $ps->bindParam(":PASSWORD", $hashPassword, PDO::PARAM_STR);
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
    public static function updatePassword(int $id, string $newPassword)
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
     * @param string $password password that the user has entered
     * @return bool true if the same password, else false
     */
    public static function verifyPassword(int $id, string $password)
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
                return password_verify($password, $result[0]["password"]);
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
    private static function hashPassword(string $password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    /**
     * Update the user
     *
     * @param int $id id of the user
     * @param string $newUsername new username for the user
     * @return bool true if succeed, else false
     */
    public static function updateUser(int $id, string $newUsername)
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
