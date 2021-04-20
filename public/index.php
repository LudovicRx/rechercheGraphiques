<?php

/** Index
 *  -------
 *  @file
 *  @copyright Copyright (c) 2021 Recherche Graphique, MIT License, See the LICENSE file for copying permissions.
 *  @brief Main page
 *  @author ludovic.rx@eduge.ch
 */

require_once(__DIR__ . DIRECTORY_SEPARATOR . "res" . DIRECTORY_SEPARATOR . "php" . DIRECTORY_SEPARATOR . "all.inc.php");

$session = new LSession();
/**> User (null if not connected)) */
$user = $session->getUserSession();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Graphiques</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="res/css/main.css">
</head>

<body>

    <?php include_once(HEADER_PATH); ?>


    <input type="file">
    <div class="container-xl overflow-auto mt-5 max-vh-75">
        <div class="row">
            <div class="col">
                <div class="w-100 vh-50">
                    <div id="area_chart" class="w-100 h-75 graphContainer"></div>
                    <?php include(CHART_SETTINGS_PATH); ?>
                </div>
                <div class="w-100 vh-50">
                    <div id="pie_chart" class="w-100 h-75 graphContainer"></div>
                    <?php include(CHART_SETTINGS_PATH); ?>
                </div>
                <div class="w-100 vh-50">
                    <div id="line_chart" class="w-100 h-75 graphContainer"></div>
                    <?php include(CHART_SETTINGS_PATH); ?>
                </div>
                <div class="w-100 vh-50">
                    <div id="barchart_values" class="w-100 h-75 graphContainer"></div>
                    <?php include(CHART_SETTINGS_PATH); ?>
                </div>
            </div>
        </div>
    </div>



    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#optionsGraph" aria-controls="optionsGraph">
        Button with data-bs-target
    </button>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="optionsGraph" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offCanvasTitle">Options of the Graph</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div>
                Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
            </div>
            <div class="dropdown mt-3">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                    Dropdown button
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <!-- A ajouter pour pouvoir utiliser google chart -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="res/js/chart.js"></script>
    <script type="text/javascript" src="res/js/main.js"></script>
</body>

</html>