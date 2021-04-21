<?php

/** LSession
 *  -------
 *  @file
 *  @copyright Copyright (c) 2021 Recherche Graphique, MIT License, See the LICENSE file for copying permissions.
 *  @brief Class for session
 *  @author ludovic.rx@eduge.ch
 */

/**
 * Class that handles the session 
 */
class LSession
{
    /**> Index of the user */
    private const INDEX_USER = "user";

    /**
     * Create an instance of LSession
     */
    public function __construct()
    {
        if (session_id() === "") {
            session_start();
        }
        if ($this->getUserSession() == null) {
            $this->setUserSession(null);
        }
    }

    /**
      * Set a user in the session
      *
      * @param LUser $user user to set
      * @return LUser user that has been just addedd
      */
    public function setUserSession($user)
    {
        $this->setValueSession(self::INDEX_USER, $user);
        return $user;
    }

    /**
     * Get user in the session
     *
     * @return null|LUser null if failed, else LUser
     */
    public function getUserSession()
    {
        return $this->getValueSession(self::INDEX_USER);
    }

    /**
     * Destroy the session
     *
     * @return void
     */
    public function destroySession()
    {
        $_SESSION = null;
        session_destroy();        
    }

    /**
     * Get a value from the session thanks the key
     *
     * @param string $key key in the session
     * @return null|mixed null if failed, elsevc   result that is stored in the session
     */
    private function getValueSession(string $key)
    {
        $result = null;
        if (isset($_SESSION[$key])) {
            $result = $_SESSION[$key];
        }
        return $result;
    }

    /**
     * Set a value in the session
     *
     * @param string $key key in the session
     * @param mixed $value value that is associated to the key
     * @return void
     */
    private function setValueSession(string $key, $value)
    {
        $_SESSION[$key] = $value;
    }
}
