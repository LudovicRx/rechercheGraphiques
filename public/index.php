<?php
// Desc.     :   Page d'index
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