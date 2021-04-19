<?php
/**
 * EDatabase
 * -------
 * @file
 * @brief	Class EDatabase
 */

require_once __DIR__ . DIRECTORY_SEPARATOR . 'const.inc.php';

/**
 * @brief	Helper class encapsulating
 * 			the PDO object
 * @author 	dominique.aigroz@kadeo.net
 */
class EDatabase
{
    private static $objInstance;
    /**
     * @brief	Class Constructor - Create a new database connection if one doesn't exist
	 * 			Set to private so no-one can create a new instance via ' = new EDatabase();'
	 */
    private function __construct()
    {
    }
    /**
     * @brief	Like the constructor, we make __clone private so nobody can clone the instance
	 */
    private function __clone()
    {
    }
    /**
     * @brief	Returns DB instance or create initial connection
     * @return $objInstance;
     */
    public static function getInstance()
    {
        if (!self::$objInstance) {
            try {

                $dsn = DB_TYPE . ':host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME;
                self::$objInstance = new PDO($dsn, DB_USER, DB_PASS, array('charset' => DB_CHARSET));
                self::$objInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "EDatabase Error: " . $e;
                error_log($e->getMessage());
                exit();
            }
        }
        return self::$objInstance;
    } # end method
}
