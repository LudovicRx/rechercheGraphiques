<?php
/** Index
 *  -------
 *  @file
 *  @copyright Copyright (c) 2020 Recherche Graphique, MIT License, See the LICENSE file for copying permissions.
 *  @brief Functions about session
 *  @author ludovic.rx@eduge.ch
 */
session_start();

/**
 * Get a value from the session thanks the key
 *
 * @param string $key key in the session
 * @return null|mixed null if failed, elsevc   result that is stored in the session
 */
function getValueSession(string $key) {
    $result = null;
    if(isset($_SESSION[$key])) {
        $result = $_SESSION[$key];
    }
    return $result;
}

/**
 * Get user in the session
 *
 * @return null|LUser null if failed, else LUser
 */
function getUserSession() {
    return getValueSession("user");
}
