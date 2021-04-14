<?php

/** LUserDB
 *  -------
 *  @file
 *  @copyright Copyright (c) 2021 Recherche graphiques, MIT License, See the LICENSE file for copying permissions.
 *  @brief Class LUserDB
 *  @author ludovic.rx@eduge.ch
 */

require_once __DIR__ . DIRECTORY_SEPARATOR . 'const.inc.php';

/**
 * @brief Class that makes query on DB for users
 */
class LUserDB
{
    /**>Prepare statement for get user by id */
    private $psUserById = null;
    /**>Sql for det user by id */
    private $sqlUserById = "";

    /**>Prepare statement for user by email */
    private $psUserByEmail = null;
    /**>Sql for user by email */
    private $sqlUserByEmail = "";

    /**>Prepare statement for insert user */
    private $psInsertUser = null;
    /**>Sql for insert user */
    private $sqlInsertUser = "";

    /**>Preapre statement for update password */
    private $psUpdatePassword = null;
    /**>Sql for update password */
    private $sqlUpdatePassword = "";

    /**>Prepare for verify password */
    private $psVerifyPassword = null;
    /**>Sql for verify password */
    private $sqlVerifyPassword =  "";

    /**>Prepare for update user */
    private $psUpdateUser = null;
    /**>Sql for update user */
    private $sqlUpdateUser = "";

    /**
     * Create an instance of LUserDB that can make queries on the database
     */
    public function __construct()
    {
        // Sets all the sql queries
        $this->sqlUserById = "SELECT id, email, username, password FROM users WHERE id = :ID;";
        $this->sqlUserByEmail = "SELECT id, email, username, password FROM users WHERE email LIKE :EMAIL;";
        $this->sqlInsertUser = "INSERT INTO users (email, username, password) VALUES(:EMAIL, :USERNAME, :PASSWORD)";
        $this->sqlUpdatePassword = "UPDATE users SET password = :PASSWORD WHERE id LIKE :ID";
        $this->sqlVerifyPassword =  "SELECT password FROM users WHERE id = :ID";
        $this->sqlUpdateUser = "UPDATE users SET username = :USERNAME WHERE id LIKE :ID";

        // Prepare all the queries
        try {
            $this->psUserById =  EDatabase::getInstance()->prepare($this->sqlUserById);
            $this->psUserByEmail =  EDatabase::getInstance()->prepare($this->sqlUserByEmail);
            $this->psInsertUser =  EDatabase::getInstance()->prepare($this->sqlInsertUser);
            $this->psUpdatePassword =  EDatabase::getInstance() ->prepare($this->sqlUpdatePassword);
            $this->psVerifyPassword =  EDatabase::getInstance()->prepare($this->sqlVerifyPassword);
            $this->psUpdateUser =  EDatabase::getInstance()->prepare($this->sqlUpdateUser);
        } catch (PDOException $e) {
            echo $e->getMessage();
            error_log($e->getMessage());
        }
    }

    /**
     * Get a specific user thanks his id
     *
     * @param int $id id of the user
     * @return LUser if succeed, else false if failure
     */
    public function getUserById(int $id)
    {
        $returnResult = false;
        try {
            $this->psUserById->bindParam(":ID", $id, PDO::PARAM_INT);
            $this->psUserById->execute();

            if ($result = $this->psUserById->fetch(PDO::FETCH_ASSOC)) {
                $returnResult = new LUser(intval($result["id"]), $result["email"], $result["username"]);
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $returnResult;
    }

    /**
     * Get a specific user thanks to the email
     *
     * @param string $email email of the user
     * @return LUSer if succeed, else false
     */
    public function getUserByEmail(string $email)
    {
        $returnResult = false;
        try {
            $this->psUserByEmail->bindParam(":EMAIL", $email, PDO::PARAM_STR);
            $this->psUserByEmail->execute();

            if ($result =  $this->psUserByEmail->fetch(PDO::FETCH_ASSOC)) {
                $returnResult = new LUser(intval($result["id"]), $result["email"], $result["username"]);
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $returnResult;
    }

    /**
     * Verify if an email exists
     *
     * @param string $email email tht we verify
     * @return bool true if the emai exists, else false
     */
    public function emailExists(string $email)
    {
        return $this->getUserByEmail($email);
    }

    /**
     * Insert a user in the database
     *
     * @param string $email email of the user
     * @param string $username username of the user
     * @param string $password password of the user
     * @return bool true if succeed, else false
     */
    public function insertUser(string $email, string $username, string $password)
    {
        $returnResult = false;
        try {
            $hashPassword = self::hashPassword($password);
            $this->psInsertUser->bindParam(":EMAIL", $email, PDO::PARAM_STR);
            $this->psInsertUser->bindParam(":USERNAME", $username, PDO::PARAM_STR);
            $this->psInsertUser->bindParam(":PASSWORD", $hashPassword, PDO::PARAM_STR);
            $returnResult = $this->psInsertUser->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $returnResult;
    }

    /**
     * Update the password from a user
     *
     * @param int $id id of the user
     * @param string $newPassword new password for the user
     * @return bool true if succeed, else false
     */
    public function updatePassword(int $id, string $newPassword)
    {
        $returnResult = false;
        try {
            $this->psUpdatePassword->bindParam(":ID", $id, PDO::PARAM_INT);
            $this->psUpdatePassword->bindParam(":PASSWORD", self::hashPassword($newPassword), PDO::PARAM_STR);
            $returnResult = $this->psUpdatePassword->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $returnResult;
    }

    /**
     * Verify that the password is the same as before
     *
     * @param int $id id of the user
     * @param string $password password that the user has entered
     * @return bool true if the same password, else false
     */
    public function verifyPassword(int $id, string $password)
    {
        $returnResult = false;
        try {
            $this->psVerifyPassword->bindParam(":ID", $id, PDO::PARAM_INT);
            $this->psVerifyPassword->execute();
            $result = $this->psVerifyPassword->fetchAll(PDO::FETCH_ASSOC);
            // If there is only one result
            if (count($result) === 1) {
                $returnResult = password_verify($password, $result[0]["password"]);
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $returnResult;
    }

    /**
     * Update the user
     *
     * @param int $id id of the user
     * @param string $newUsername new username for the user
     * @return bool true if succeed, else false
     */
    public function updateUser(int $id, string $newUsername)
    {
        $returnResult = false;
        try {
            $this->psUpdateUser->bindParam(":ID", $id, PDO::PARAM_INT);
            $this->psUpdateUser->bindParam(":USERNAME", $newUsername, PDO::PARAM_STR);
            $returnResult = $this->psUpdateUser->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $returnResult;
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
}
