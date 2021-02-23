
// Constantes
const TYPE_CHARTS = Object.freeze({
    PIE_CHART: "PieChart",
    AREA_CHART: "AreaChart",
    LINE_CHART: "LineChart",
    BAR_CHART: "BarChart"
});

const PIE_CHART_DIV = "pie_chart";
const AREA_CHART_DIV = "area_chart";
const LINE_CHART_DIV = "line_chart";

// Variables
var rowsPieChart = [
    ['Mushrooms', 3],
    ['Onions', 1],
    ['Olives', 1],
    ['Zucchini', 1],
    ['Pepperoni', 2]
];
var columnsPieChart = [
    ["string", "Topping"],
    ["number", "Slices"]
];
var optionsPieChart = {
    title: "How much I ate last night",
    is3D: true
};

var rowsAreaChart = [
    ["string", "Year"],
    ["number", "Sales"],
    ["number", "Expenses"]
];
var columnsAreaChart = [
    ['2013', 1000, 400],
    ['2014', 1170, 460],
    ['2015', 660, 1120],
    ['2016', 1030, 540]
];
var optionsAreaChart = {
    title: 'Company Performance',
    curveType: 'function',
    legend: { position: 'bottom' }
};

var rowsLineChart = [
    ["string", "Year"],
    ["number", "Français"],
    ["number", "Mathématiques"],
    ["number", "Physique"]
];
var columnsLineChart = [
    ["2013", 5, 4, 5],
    ["2014", 5.5, 3, 6],
    ["2015", 6, 4.5, 4],
    ["2016", 6, 4.5, 4],
    ["2017", 6, 4.5, 4],
];
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
    // curveType: "function",
    legend: { position: 'bottom' },
    colors: ["red", "green", "yellow"]
}


// Load the Visualization API and the corechart package.
//google.charts.load('upcoming', {packages: ['corechart']}); prendra la version à venir de google charts
google.charts.load('current', { 'packages': ['corechart'] });

// Set a callback to run when the Google Visualization API is loaded.
google.charts.setOnLoadCallback(function () { drawPieChart(PIE_CHART_DIV, columnsPieChart, rowsPieChart, optionsPieChart) });
google.charts.setOnLoadCallback(function () { drawChart(TYPE_CHARTS.AREA_CHART, AREA_CHART_DIV, rowsAreaChart, columnsAreaChart, optionsAreaChart) });
google.charts.setOnLoadCallback(function () { drawChart(TYPE_CHARTS.LINE_CHART, LINE_CHART_DIV, rowsLineChart, columnsLineChart, optionsLineChart) });
google.charts.setOnLoadCallback(drawBarChart);

/**
 * Set the dataas for a graph
 * @param {string[][]} columns bidimensional table with type of column and name
 * @param {array} rows bidimensionnal table with name of rows and quantity
 */
function setData(columns, rows) {
    // Create the data table.
    var data = new google.visualization.DataTable();
    for (let i = 0; i < columns.length; i++) {
        data.addColumn(columns[i][0], columns[i][1]);
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
    var chart = new func(document.getElementById(nameDiv));

    google.visualization.events.addListener(chart, 'ready', function () {
        img.innerHTML = '<img src="' + chart.getImageURI() + '">';
        console.log(img.innerHTML);
    });

    chart.draw(setData(columns, rows), options);
}

function drawPieChart(nameDiv, columns, rows, options) {
    drawChart(TYPE_CHARTS.PIE_CHART, nameDiv, columns, rows, options);
}

function drawAreaChart(nameDiv, columns, rows, options) {
    drawChart(TYPE_CHARTS.AREA_CHART, nameDiv, columns, rows, options);
}

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