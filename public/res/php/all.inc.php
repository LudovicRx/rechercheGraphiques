<?php

/** All Inc
 *  -------
 *  @copyright Copyright (c) 2021 Recherche Graphique, MIT License, See the LICENSE file for copying permissions.
 *  @brief File taht include all the files needed
 *  @author ludovic.rx@eduge.ch
 */

require_once(__DIR__ . DIRECTORY_SEPARATOR . "path.inc.php");

require_once(DB_PATH . "EDatabase.php");
require_once(DB_PATH . "LUserDB.php");

require_once(CONTAINER_PATH . "LAxis.php");
require_once(CONTAINER_PATH . "LChart.php");
require_once(CONTAINER_PATH . "LUser.php");

require_once(__DIR__ . DIRECTORY_SEPARATOR . "LTools.php");
require_once(__DIR__ . DIRECTORY_SEPARATOR . "LSession.php");

