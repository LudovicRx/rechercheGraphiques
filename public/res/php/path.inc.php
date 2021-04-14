<?php

/** All Inc
 *  -------
 *  @copyright Copyright (c) 2021 Recherche Graphique, MIT License, See the LICENSE file for copying permissions.
 *  @brief File that contains all the path to specific pages/scripts
 *  @author ludovic.rx@eduge.ch
 */

/**>Path to the folder content */
define("CONTENT_PATH",  __DIR__ . DIRECTORY_SEPARATOR . "content" . DIRECTORY_SEPARATOR);
/**>Path to the folder of the database scripts */
define("DB_PATH", __DIR__ . DIRECTORY_SEPARATOR . "database" . DIRECTORY_SEPARATOR);
/**>Path to the folder that contains class container */
define("CONTAINER_PATH", __DIR__ . DIRECTORY_SEPARATOR . "container" . DIRECTORY_SEPARATOR);

/**>Path to get the header */
define("HEADER_PATH", CONTENT_PATH . "header.inc.php");
/**>Path to get the dropup buttons for char settings */
define("CHART_SETTINGS_PATH", CONTENT_PATH . "chartSettings.inc.php");
