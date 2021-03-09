<?php

/** Index
 *  -------
 *  @file
 *  @copyright Copyright (c) 2020 Recherche Graphique, MIT License, See the LICENSE file for copying permissions.
 *  @brief Main page
 *  @author ludovic.rx@eduge.ch
 */

session_start();
require_once(__DIR__ . DIRECTORY_SEPARATOR . "res" . DIRECTORY_SEPARATOR . "php" . DIRECTORY_SEPARATOR . "all.inc.php");


$user = new LUser(3, "salut@salut.cm", "Oui monsieur");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Graphiques</title>
    <!-- A ajouter pour pouvoir utiliser google chart -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="res/js/chart.js"></script>
    <link rel="stylesheet" href="res/css/main.css">
</head>

<body>
    <script>
        // Récupérer le code svg
        // https://stackoverflow.com/questions/23218174/how-do-i-save-export-an-svg-file-after-creating-an-svg-with-d3-js-ie-safari-an
        var url = "data:image/svg+xml;charset=utf-8," + encodeURIComponent(source);
    </script>
    <a href="data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22970%22%20height%3D%22649%22%20aria-label%3D%22A%20chart.%22%20style%3D%22overflow%3A%20hidden%3B%22%3E%3Cdefs%20id%3D%22_ABSTRACT_RENDERER_ID_1%22%3E%3CclipPath%20id%3D%22_ABSTRACT_RENDERER_ID_2%22%3E%3Crect%20x%3D%22185%22%20y%3D%22124%22%20width%3D%22600%22%20height%3D%22401%22%2F%3E%3C%2FclipPath%3E%3C%2Fdefs%3E%3Crect%20x%3D%220%22%20y%3D%220%22%20width%3D%22970%22%20height%3D%22649%22%20stroke%3D%22none%22%20stroke-width%3D%220%22%20fill%3D%22%23ffffff%22%2F%3E%3Cg%3E%3Ctext%20text-anchor%3D%22start%22%20x%3D%22185%22%20y%3D%2297.75%22%20font-family%3D%22Arial%22%20font-size%3D%2215%22%20font-weight%3D%22bold%22%20stroke%3D%22none%22%20stroke-width%3D%220%22%20fill%3D%22%23000000%22%3ECompany%20Performance%3C%2Ftext%3E%3Crect%20x%3D%22185%22%20y%3D%2285%22%20width%3D%22600%22%20height%3D%2215%22%20stroke%3D%22none%22%20stroke-width%3D%220%22%20fill-opacity%3D%220%22%20fill%3D%22%23ffffff%22%2F%3E%3C%2Fg%3E%3Cg%3E%3Crect%20x%3D%22385%22%20y%3D%22592%22%20width%3D%22200%22%20height%3D%2215%22%20stroke%3D%22none%22%20stroke-width%3D%220%22%20fill-opacity%3D%220%22%20fill%3D%22%23ffffff%22%2F%3E%3Cg%3E%3Crect%20x%3D%22385%22%20y%3D%22592%22%20width%3D%2274%22%20height%3D%2215%22%20stroke%3D%22none%22%20stroke-width%3D%220%22%20fill-opacity%3D%220%22%20fill%3D%22%23ffffff%22%2F%3E%3Cg%3E%3Ctext%20text-anchor%3D%22start%22%20x%3D%22421%22%20y%3D%22604.75%22%20font-family%3D%22Arial%22%20font-size%3D%2215%22%20stroke%3D%22none%22%20stroke-width%3D%220%22%20fill%3D%22%23222222%22%3ESales%3C%2Ftext%3E%3C%2Fg%3E%3Crect%20x%3D%22385%22%20y%3D%22599.5%22%20width%3D%2230%22%20height%3D%227.5%22%20stroke%3D%22none%22%20stroke-width%3D%220%22%20fill-opacity%3D%220.3%22%20fill%3D%22%233366cc%22%2F%3E%3Cpath%20d%3D%22M385%2C599.5L415%2C599.5%22%20stroke%3D%22%233366cc%22%20stroke-width%3D%222%22%20fill-opacity%3D%221%22%20fill%3D%22none%22%2F%3E%3C%2Fg%3E%3Cg%3E%3Crect%20x%3D%22483%22%20y%3D%22592%22%20width%3D%22102%22%20height%3D%2215%22%20stroke%3D%22none%22%20stroke-width%3D%220%22%20fill-opacity%3D%220%22%20fill%3D%22%23ffffff%22%2F%3E%3Cg%3E%3Ctext%20text-anchor%3D%22start%22%20x%3D%22519%22%20y%3D%22604.75%22%20font-family%3D%22Arial%22%20font-size%3D%2215%22%20stroke%3D%22none%22%20stroke-width%3D%220%22%20fill%3D%22%23222222%22%3EExpenses%3C%2Ftext%3E%3C%2Fg%3E%3Crect%20x%3D%22483%22%20y%3D%22599.5%22%20width%3D%2230%22%20height%3D%227.5%22%20stroke%3D%22none%22%20stroke-width%3D%220%22%20fill-opacity%3D%220.3%22%20fill%3D%22%23dc3912%22%2F%3E%3Cpath%20d%3D%22M483%2C599.5L513%2C599.5%22%20stroke%3D%22%23dc3912%22%20stroke-width%3D%222%22%20fill-opacity%3D%221%22%20fill%3D%22none%22%2F%3E%3C%2Fg%3E%3C%2Fg%3E%3Cg%3E%3Crect%20x%3D%22185%22%20y%3D%22124%22%20width%3D%22600%22%20height%3D%22401%22%20stroke%3D%22none%22%20stroke-width%3D%220%22%20fill-opacity%3D%220%22%20fill%3D%22%23ffffff%22%2F%3E%3Cg%20clip-path%3D%22url(http%3A%2F%2Flocalhost%2Fmenu%2FrechercheGraphiques%2Fpublic%2F%23_ABSTRACT_RENDERER_ID_2)%22%3E%3Cg%3E%3Crect%20x%3D%22185%22%20y%3D%22524%22%20width%3D%22600%22%20height%3D%221%22%20stroke%3D%22none%22%20stroke-width%3D%220%22%20fill%3D%22%23cccccc%22%2F%3E%3Crect%20x%3D%22185%22%20y%3D%22457%22%20width%3D%22600%22%20height%3D%221%22%20stroke%3D%22none%22%20stroke-width%3D%220%22%20fill%3D%22%23cccccc%22%2F%3E%3Crect%20x%3D%22185%22%20y%3D%22391%22%20width%3D%22600%22%20height%3D%221%22%20stroke%3D%22none%22%20stroke-width%3D%220%22%20fill%3D%22%23cccccc%22%2F%3E%3Crect%20x%3D%22185%22%20y%3D%22324%22%20width%3D%22600%22%20height%3D%221%22%20stroke%3D%22none%22%20stroke-width%3D%220%22%20fill%3D%22%23cccccc%22%2F%3E%3Crect%20x%3D%22185%22%20y%3D%22257%22%20width%3D%22600%22%20height%3D%221%22%20stroke%3D%22none%22%20stroke-width%3D%220%22%20fill%3D%22%23cccccc%22%2F%3E%3Crect%20x%3D%22185%22%20y%3D%22191%22%20width%3D%22600%22%20height%3D%221%22%20stroke%3D%22none%22%20stroke-width%3D%220%22%20fill%3D%22%23cccccc%22%2F%3E%3Crect%20x%3D%22185%22%20y%3D%22124%22%20width%3D%22600%22%20height%3D%221%22%20stroke%3D%22none%22%20stroke-width%3D%220%22%20fill%3D%22%23cccccc%22%2F%3E%3Crect%20x%3D%22185%22%20y%3D%22491%22%20width%3D%22600%22%20height%3D%221%22%20stroke%3D%22none%22%20stroke-width%3D%220%22%20fill%3D%22%23ebebeb%22%2F%3E%3Crect%20x%3D%22185%22%20y%3D%22424%22%20width%3D%22600%22%20height%3D%221%22%20stroke%3D%22none%22%20stroke-width%3D%220%22%20fill%3D%22%23ebebeb%22%2F%3E%3Crect%20x%3D%22185%22%20y%3D%22357%22%20width%3D%22600%22%20height%3D%221%22%20stroke%3D%22none%22%20stroke-width%3D%220%22%20fill%3D%22%23ebebeb%22%2F%3E%3Crect%20x%3D%22185%22%20y%3D%22291%22%20width%3D%22600%22%20height%3D%221%22%20stroke%3D%22none%22%20stroke-width%3D%220%22%20fill%3D%22%23ebebeb%22%2F%3E%3Crect%20x%3D%22185%22%20y%3D%22224%22%20width%3D%22600%22%20height%3D%221%22%20stroke%3D%22none%22%20stroke-width%3D%220%22%20fill%3D%22%23ebebeb%22%2F%3E%3Crect%20x%3D%22185%22%20y%3D%22157%22%20width%3D%22600%22%20height%3D%221%22%20stroke%3D%22none%22%20stroke-width%3D%220%22%20fill%3D%22%23ebebeb%22%2F%3E%3C%2Fg%3E%3Cg%3E%3Cg%3E%3Cpath%20d%3D%22M185.5%2C524.5L185.5%2C524.5L185.5%2C191.16666666666669L385.16666666666663%2C134.5L584.8333333333333%2C304.5L784.5%2C181.16666666666669L784.5%2C524.5L784.5%2C524.5Z%22%20stroke%3D%22none%22%20stroke-width%3D%220%22%20fill-opacity%3D%220.3%22%20fill%3D%22%233366cc%22%2F%3E%3C%2Fg%3E%3Cg%3E%3Cpath%20d%3D%22M185.5%2C524.5L185.5%2C524.5L185.5%2C391.1666666666667L385.16666666666663%2C371.1666666666667L584.8333333333333%2C151.16666666666669L784.5%2C344.5L784.5%2C524.5L784.5%2C524.5Z%22%20stroke%3D%22none%22%20stroke-width%3D%220%22%20fill-opacity%3D%220.3%22%20fill%3D%22%23dc3912%22%2F%3E%3C%2Fg%3E%3C%2Fg%3E%3Cg%3E%3Crect%20x%3D%22185%22%20y%3D%22524%22%20width%3D%22600%22%20height%3D%221%22%20stroke%3D%22none%22%20stroke-width%3D%220%22%20fill%3D%22%23333333%22%2F%3E%3C%2Fg%3E%3Cg%3E%3Cpath%20d%3D%22M185.5%2C191.16666666666669L385.16666666666663%2C134.5L584.8333333333333%2C304.5L784.5%2C181.16666666666669%22%20stroke%3D%22%233366cc%22%20stroke-width%3D%222%22%20fill-opacity%3D%221%22%20fill%3D%22none%22%2F%3E%3Cpath%20d%3D%22M185.5%2C391.1666666666667L385.16666666666663%2C371.1666666666667L584.8333333333333%2C151.16666666666669L784.5%2C344.5%22%20stroke%3D%22%23dc3912%22%20stroke-width%3D%222%22%20fill-opacity%3D%221%22%20fill%3D%22none%22%2F%3E%3C%2Fg%3E%3C%2Fg%3E%3Cg%2F%3E%3Cg%3E%3Cg%3E%3Ctext%20text-anchor%3D%22middle%22%20x%3D%22185.5%22%20y%3D%22546.75%22%20font-family%3D%22Arial%22%20font-size%3D%2215%22%20stroke%3D%22none%22%20stroke-width%3D%220%22%20fill%3D%22%23222222%22%3E2013%3C%2Ftext%3E%3C%2Fg%3E%3Cg%3E%3Ctext%20text-anchor%3D%22middle%22%20x%3D%22385.16666666666663%22%20y%3D%22546.75%22%20font-family%3D%22Arial%22%20font-size%3D%2215%22%20stroke%3D%22none%22%20stroke-width%3D%220%22%20fill%3D%22%23222222%22%3E2014%3C%2Ftext%3E%3C%2Fg%3E%3Cg%3E%3Ctext%20text-anchor%3D%22middle%22%20x%3D%22584.8333333333333%22%20y%3D%22546.75%22%20font-family%3D%22Arial%22%20font-size%3D%2215%22%20stroke%3D%22none%22%20stroke-width%3D%220%22%20fill%3D%22%23222222%22%3E2015%3C%2Ftext%3E%3C%2Fg%3E%3Cg%3E%3Ctext%20text-anchor%3D%22middle%22%20x%3D%22784.5%22%20y%3D%22546.75%22%20font-family%3D%22Arial%22%20font-size%3D%2215%22%20stroke%3D%22none%22%20stroke-width%3D%220%22%20fill%3D%22%23222222%22%3E2016%3C%2Ftext%3E%3C%2Fg%3E%3Cg%3E%3Ctext%20text-anchor%3D%22end%22%20x%3D%22170%22%20y%3D%22529.75%22%20font-family%3D%22Arial%22%20font-size%3D%2215%22%20stroke%3D%22none%22%20stroke-width%3D%220%22%20fill%3D%22%23444444%22%3E0%3C%2Ftext%3E%3C%2Fg%3E%3Cg%3E%3Ctext%20text-anchor%3D%22end%22%20x%3D%22170%22%20y%3D%22463.0833%22%20font-family%3D%22Arial%22%20font-size%3D%2215%22%20stroke%3D%22none%22%20stroke-width%3D%220%22%20fill%3D%22%23444444%22%3E200%3C%2Ftext%3E%3C%2Fg%3E%3Cg%3E%3Ctext%20text-anchor%3D%22end%22%20x%3D%22170%22%20y%3D%22396.4167%22%20font-family%3D%22Arial%22%20font-size%3D%2215%22%20stroke%3D%22none%22%20stroke-width%3D%220%22%20fill%3D%22%23444444%22%3E400%3C%2Ftext%3E%3C%2Fg%3E%3Cg%3E%3Ctext%20text-anchor%3D%22end%22%20x%3D%22170%22%20y%3D%22329.75%22%20font-family%3D%22Arial%22%20font-size%3D%2215%22%20stroke%3D%22none%22%20stroke-width%3D%220%22%20fill%3D%22%23444444%22%3E600%3C%2Ftext%3E%3C%2Fg%3E%3Cg%3E%3Ctext%20text-anchor%3D%22end%22%20x%3D%22170%22%20y%3D%22263.0833%22%20font-family%3D%22Arial%22%20font-size%3D%2215%22%20stroke%3D%22none%22%20stroke-width%3D%220%22%20fill%3D%22%23444444%22%3E800%3C%2Ftext%3E%3C%2Fg%3E%3Cg%3E%3Ctext%20text-anchor%3D%22end%22%20x%3D%22170%22%20y%3D%22196.4167%22%20font-family%3D%22Arial%22%20font-size%3D%2215%22%20stroke%3D%22none%22%20stroke-width%3D%220%22%20fill%3D%22%23444444%22%3E1%2C000%3C%2Ftext%3E%3C%2Fg%3E%3Cg%3E%3Ctext%20text-anchor%3D%22end%22%20x%3D%22170%22%20y%3D%22129.75%22%20font-family%3D%22Arial%22%20font-size%3D%2215%22%20stroke%3D%22none%22%20stroke-width%3D%220%22%20fill%3D%22%23444444%22%3E1%2C200%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fg%3E%3Cg%2F%3E%3C%2Fsvg%3E" download="graph.svg">Save</a>

    <!--Div that contains the chart-->
    <div class="graphContainer">
        <div id="area_chart"></div>
        <div id="pie_chart"></div>
    </div>
    <div class="graphContainer">
        <div id="line_chart"></div>
        <div id="barchart_values"></div>
    </div>
    <div id=" ">

    </div>

</body>
<script type="text/javascript" src="res/js/main.js"></script>

</html>