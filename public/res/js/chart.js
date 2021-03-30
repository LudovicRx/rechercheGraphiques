/** Chart 
 *  -------
 *  @copyright Copyright (c) 2020 Recherche Graphique, MIT License, See the LICENSE file for copying permissions.
 *  @brief File that handle charts in js
 *  @author ludovic.rx@eduge.ch
 */

// Constantes
/**
 * Different type of charts
 */
const TYPE_CHARTS = Object.freeze({
    PIE_CHART: "PieChart",
    AREA_CHART: "AreaChart",
    LINE_CHART: "LineChart",
    BAR_CHART: "BarChart"
});

/**
 * Name of the chart div
 */
const PIE_CHART_DIV = "pie_chart";
/**
 * Name of the area chart
 */
const AREA_CHART_DIV = "area_chart";
/**
 * Name of the line chart
 */
const LINE_CHART_DIV = "line_chart";

// Variables
/**
 * Rows for pie chart
 */
var rowsPieChart = [
    ['Mushrooms', 3],
    ['Onions', 1],
    ['Olives', 1],
    ['Zucchini', 1],
    ['Pepperoni', 2]
];
/**
 * Columns for pie chart
 */
var columnsPieChart = [
    ["string", "Topping"],
    ["number", "Slices"]
];
/**
 * Options for pie chart
 */
var optionsPieChart = {
    title: "How much I ate last night",
    is3D: true
};

/**
 * Rows for area chart
 */
var rowsAreaChart = [
    ["string", "Year"],
    ["number", "Sales"],
    ["number", "Expenses"]
];
/**
 * Columns for area chart
 */
var columnsAreaChart = [
    ['2013', 1000, 400],
    ['2014', 1170, 460],
    ['2015', 660, 1120],
    ['2016', 1030, 540]
];
/**
 * Options for area chart
 */
var optionsAreaChart = {
    title: 'Company Performance',
    curveType: 'function',
    legend: { position: 'bottom' },
    areaOpacity: 0.8
};

/**
 *  Rows for line chart
 */
var rowsLineChart = [
    ["string", "Year"],
    ["number", "Français"],
    ["number", "Mathématiques"],
    ["number", "Physique"],
    { type: 'string', role: 'annotation' }
];
/**
 * Columns for line chart
 */
var columnsLineChart = [
    ["2013", 5, 4, 5, "oui"],
    ["2014", 5.5, 3, 6, "oui"],
    ["2015", 6, 4.5, 4, "oui"],
    ["2016", 6, 4.5, 4, "oui"],
    ["2017", 6, 4.5, 4, "oui"],
];
/**
 * Options for line chart
 */
var optionsLineChart = {
    title: "Notes obtenues cette année",
    hAxis: {
        title: 'Matières'
    },
    vAxis: {
        title: 'Notes',
        maxValue: 6,
        minValue: 0
    },
    // ne fonctionne pas avec les min et max
    // curveType: "function", 
    legend: { position: 'bottom' }
    // colors: ["red", "green", "yellow"]
}


// Load the Visualization API and the corechart package.
//google.charts.load('upcoming', {packages: ['corechart']}); prendra la version à venir de google charts
google.charts.load('current', { 'packages': ['corechart'] });

// Set a callback to run when the Google Visualization API is loaded.
google.charts.setOnLoadCallback(function () { drawPieChart(PIE_CHART_DIV, columnsPieChart, rowsPieChart, optionsPieChart) });
google.charts.setOnLoadCallback(function () { drawChart(TYPE_CHARTS.AREA_CHART, AREA_CHART_DIV, rowsAreaChart, columnsAreaChart, optionsAreaChart) });
google.charts.setOnLoadCallback(function () { drawChart(TYPE_CHARTS.LINE_CHART, LINE_CHART_DIV, rowsLineChart, columnsLineChart, optionsLineChart) });
google.charts.setOnLoadCallback(drawBarChart);

function drawCharts() {
    drawPieChart(PIE_CHART_DIV, columnsPieChart, rowsPieChart, optionsPieChart);
    drawChart(TYPE_CHARTS.AREA_CHART, AREA_CHART_DIV, rowsAreaChart, columnsAreaChart, optionsAreaChart);
    drawChart(TYPE_CHARTS.LINE_CHART, LINE_CHART_DIV, rowsLineChart, columnsLineChart, optionsLineChart);
    drawBarChart();
}

/**
 * Set the dataas for a graph
 * @param {string[][]} columns bidimensional table with type of column and name
 * @param {array} rows bidimensionnal table with name of rows and quantity
 */
function setData(columns, rows) {
    // Create the data table.
    var data = new google.visualization.DataTable();
    for (let i = 0; i < columns.length; i++) {
        if (Array.isArray(columns[i])) {
            data.addColumn(columns[i][0], columns[i][1]);
        } else {
            data.addColumn(columns[i]);
        }
    }

    data.addRows(rows);
    return data;
}

/**
 * Return the function that correspond to the graph
 * @param {string} type type op graph
 */
function selectType(type) {
    switch (type) {
        case TYPE_CHARTS.PIE_CHART:
            // Peu sécurisé
            // return eval(google.visualization.name);
            return google.visualization.PieChart;
        case TYPE_CHARTS.AREA_CHART:
            return google.visualization.AreaChart;
        case TYPE_CHARTS.LINE_CHART:
            return google.visualization.LineChart;
        case TYPE_CHARTS.BAR_CHART:
            return google.visualization.BarChart;
    }
}

/**
 * Draw a chart
 * @param {string} chartType type of the chart
 * @param {string} nameDiv name of the div that contains graph
 * @param {string[][]} columns columns with type and name
 * @param {array} rows datas for the rows
 * @param {array} options options for the graph
 */
function drawChart(chartType, nameDiv, columns, rows, options) {
    let func = selectType(chartType);
    let divChart = document.getElementById(nameDiv);
    var chart = new func(divChart);

    google.visualization.events.addListener(chart, 'ready', function () { createSaveButton(divChart) });

    chart.draw(setData(columns, rows), options);
}

/**
 * Create a save button
 * @param {HTMLElement} divChart name of the div where the chart is
 */
function createSaveButton(divChart) {
    var a = document.createElement("a");
    a.href = getSvg(divChart);
    a.classList.add("btn", "btn-light");
    a.innerHTML = `<i class="bi bi-three-dots-vertical"></i>`;
    a.download = "graph.svg";
    divChart.parentElement.getElementsByClassName("options")[0].innerHTML = a.outerHTML;
}

/**
 * Get the svg href
 * @param {HTMLElement} divChart div of the chart
 * @returns the svg href
 */
function getSvg(divChart) {
    // https://stackoverflow.com/questions/12628968/how-can-i-save-svg-code-as-a-svg-image
    // https://stackoverflow.com/questions/38477972/javascript-save-svg-element-to-file-on-disk
    // https://code-boxx.com/create-save-files-javascript/
    // https://stackoverflow.com/questions/23218174/how-do-i-save-export-an-svg-file-after-creating-an-svg-with-d3-js-ie-safari-an
    // https://css-tricks.com/lodge/svg/09-svg-data-uris/ 

    var svg = divChart.getElementsByTagName("svg")[0];
    svg.setAttribute("xmlns", "http://www.w3.org/2000/svg");
    return "data:image/svg+xml;charset=utf-8," + encodeURIComponent(svg.outerHTML);
}

/**
 * Draw a pie chart
 * @param {string} nameDiv name of the div that contains graph
 * @param {string[][]} columns columns with type and name
 * @param {array} rows datas for the rows
 * @param {array} options options for the graph
 */
function drawPieChart(nameDiv, columns, rows, options) {
    drawChart(TYPE_CHARTS.PIE_CHART, nameDiv, columns, rows, options);
}

/**
 * Draw a area chart
 * @param {string} nameDiv name of the div that contains graph
 * @param {string[][]} columns columns with type and name
 * @param {array} rows datas for the rows
 * @param {array} options options for the graph
 */
function drawAreaChart(nameDiv, columns, rows, options) {
    drawChart(TYPE_CHARTS.AREA_CHART, nameDiv, columns, rows, options);
}

/**
 * Draw a bar chart
 */
function drawBarChart() {
    var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" }],
        ["Copper", 8.94, "#b87333"],
        ["Silver", 10.49, "silver"],
        ["Gold", 19.30, "gold"],
        ["Platinum", 21.45, "color: #e5e4e2"]
    ]);

    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1,
        {
            calc: "stringify",
            sourceColumn: 1,
            type: "string",
            role: "annotation"
        },
        2]);

    var options = {
        title: "Density of Precious Metals, in g/cm^3",
        bar: { groupWidth: "95%" },
        legend: { position: "none" },
    };
    var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
    chart.draw(view, options);
}