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
    static function GetUser($id)
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
            return new LUser($result["idUser"], $result["username"]);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    static function InsertUser($username, $password)
    {
        static $ps = null;
        $sql = "INSERT INTO users VALUES(username, password) (:USERNAME, :PASSWORD)";

        try {
            if ($ps == null) {
                $ps = EDatabase::getInstance()->prepare($sql);
            }

            $ps->bindParam(":ID", $id, PDO::PARAM_INT);
            $ps->execute();

            $result = $ps->fetch(PDO::FETCH_ASSOC);
            return new LUser($result["idUser"], $result["username"]);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
