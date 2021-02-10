
const NAME_CHART_DIV = "chart_div";
const PIE_CHART_DIV = "pie_chart"
var chart;
var data;


// Load the Visualization API and the corechart package.
//google.charts.load('upcoming', {packages: ['corechart']}); prendra la version à venir de google charts
google.charts.load('current', { 'packages': ['corechart'] });

// Set a callback to run when the Google Visualization API is loaded.
google.charts.setOnLoadCallback(function () { drawPieChart(PIE_CHART_DIV, setData({ "string": "Topping", "number": "Slices" }), setOptions("How much I ate last night")) });
google.charts.setOnLoadCallback(drawAreaChart);
google.charts.setOnLoadCallback(drawLineChart);
google.charts.setOnLoadCallback(drawBarChart);

function setData(columns, rows) {
    // Create the data table.
    var data = new google.visualization.DataTable();
    // for (let index = 0; index < array.length; index++) {
    //     const element = array[index];
        
    // }
    // columns.forEach(function (element, index) {
    //     data.addColumn(index, element);
    //     data.addColumn(index, element);
    // });
    data.addColumn("string", "Topping");
    data.addColumn("number", "Slices");

    data.addRows([
        ['Mushrooms', 3],
        ['Onions', 1],
        ['Olives', 1],
        ['Zucchini', 1],
        ['Pepperoni', 2]
    ]);
    return data;
}

/**
 * Set the options of the chart
 * @param {string} title Title of the chart
 */
function setOptions(title) {
    // Set chart options
    return {
        'title': title,
        // 'width': 100,
        // 'height': 500
    };
}

// Callback that creates and populates a data table,
// instantiates the pie chart, passes in the data and
// draws it.
function drawPieChart(nameDiv, data, options) {
    // Instantiate and draw our chart, passing in some options.
    var chart = new google.visualization.PieChart(document.getElementById(nameDiv));
    chart.draw(data, options);
}



function drawAreaChart() {
    var data = google.visualization.arrayToDataTable([
        ['Year', 'Sales', 'Expenses'],
        ['2013', 1000, 400],
        ['2014', 1170, 460],
        ['2015', 660, 1120],
        ['2016', 1030, 540]
    ]);

    var options = {
        title: 'Company Performance',
        hAxis: { title: 'Year', titleTextStyle: { color: '#333' } },
        vAxis: { minValue: 0 }
    };

    var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
    chart.draw(data, options);
}

function drawLineChart() {
    var data = google.visualization.arrayToDataTable([
        ['Year', 'Sales', 'Expenses'],
        ['2004', 1000, 400],
        ['2005', 1170, 460],
        ['2006', 660, 1120],
        ['2007', 1030, 540]
    ]);

    var options = {
        title: 'Company Performance',
        curveType: 'function',
        legend: { position: 'bottom' }
    };

    var chart = new google.visualization.LineChart(document.getElementById('chart_div_3'));

    chart.draw(data, options);
}


function drawBarChart() {
    var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" }],
        ["Copper", 8.94, "#b87333"],
        ["Silver", 10.49, "silver"],
        ["Gold", 19.30, "gold"],
        ["Platinum", 21.45, "color: #e5e4e2"]
    ]);

    var data = google.visualization.arrayToDataTable([
        ['Element', 'proportion', { role: 'style' }, { role: 'annotation' }],
        ["Oxygen", 20, "green", "O2"],
        ["Azote", 80, "blue", "N"]
    ])

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
        width: 600,
        height: 400,
        bar: { groupWidth: "95%" },
        legend: { position: "none" },
    };
    var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
    chart.draw(view, options);
}

// google.visualization.events.addListener(document.getElementById(NAME_CHART_DIV), 'ready', function () {
//     document.getElementById(NAME_CHART_DIV).innerHTML = '<img src="' + chart.getImageURI() + '">';
// });