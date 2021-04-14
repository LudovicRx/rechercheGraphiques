<?php

/** LChart
 *  -------
 *  @file
 *  @copyright Copyright (c) 2021 Recherche Graphique, MIT License, See the LICENSE file for copying permissions.
 *  @brief Class LChart
 *  @author ludovic.rx@eduge.ch
 */

/**
 * @brief Class that is a container for charts
 */
class LChart
{
    /**> Containes all different types of chart */
    const TYPE_CHART = array(
        "BAR_CHART" => "BarChart",
        "PIE_CHART" => "PieChart",
        "LINE_CHART" => "LineChart",
        "BARH_CHART" => "BarChart"
    );

    /**
     * Create an object of type LChart
     *
     * @param integer $InId id of the chart
     * @param string $InName name of the chart
     * @param string $InNameAxisX name of x axis
     * @param string $InTypeAxisX type of x axis
     * @param string $InNameAxisY name of y axis
     * @param string $InTypeAxisY type of y axis
     * @param string $InChartType chart type
     */
    public function __construct(int $InId = 0, string $InName = "", string $InNameAxisX = "", string $InTypeAxisX = "", string  $InNameAxisY = "", string  $InTypeAxisY = "", string $InChartType = "")
    {
        $this->Id = $InId;
        $this->Name = $InName;
        $this->AxisX = new LAxis($InNameAxisX, $InTypeAxisX);
        $this->AxisY = new LAxis($InNameAxisY, $InTypeAxisY);
        $this->ChartType = $InChartType;
    }

    /**> Id of the chart */
    public $Id;

    /**> Name of the Chart */
    public $Name;

    /**> Axis X */
    public $AxisX;

    /**> Axis Y */
    public $AxisY;

    /**> Type of the chart */
    public $InChartType;
}
