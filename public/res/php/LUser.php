<?php

/** LUser
 *  -------
 *  @file
 *  @copyright Copyright (c) 2020 Recherche Graphique, MIT License, See the LICENSE file for copying permissions.
 *  @brief Class LUser
 *  @author Ludovic Roux
 */

/**
 * @brief This class is a container for a user
 */
class LUser
{
    /**
     * Constructor that create a user
     *
     * @param integer $InId id of the user
     * @param string $InEmail email of the user
     * @param string $InUsername username of the user
     */
    public function __construct($InId = 0, $InEmail = "", $InUsername = "")
    {
        $this->Id = $InId;
        $this->Email = $InEmail;
        $this->Username = $InUsername;
    }

    /**> Id of the user */
    public $Id;

    /**> Email of the user */
    public $Email;

    /**> Username of the user */
    public $Username;
}
