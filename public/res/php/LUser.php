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
class LUser {
    /**
     * Constructor that create a user
     *
     * @param integer $InId
     * @param string $InUsername
     */
    public function __construct($InId = 0, $InUsername = "") {
        $this->Id = $InId;
        $this->Username = $InUsername;
    }

    /**> Id of the user */
    public $Id;

    /**> Username of the user */
    public $Username;
} 