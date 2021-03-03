<?php
/**
 * Class that is a container for chart 
 * 
 * @author Ludovic Roux
 * 
 */
class LChart
{
    /**
     * Containes all different types of chart
     */
    const TYPE_CHART = array(
        "BAR_CHART" => "BarChart",
        "PIE_CHART" => "PieChart",
        "LINE_CHART" => "LineChart",
        "BARH_CHART" => "BarChart"
    );

    /**
     * Create an object of type LChart
     *
     * @param integer $InId
     * @param string $InName
     * @param string $InNameAxisX
     * @param string $InTypeAxisX
     * @param string $InNameAxisY
     * @param string $InTypeAxisY
     */
    public function __construct($InId = 0, $InName = "", $InNameAxisX = "", $InTypeAxisX = "", $InNameAxisY = "", $InTypeAxisY = "", $InChartType = "")
    {
        $this->Id = $InId;
        $this->Name = $InName;
        $this->AxisX = new LAxis($InNameAxisX, $InTypeAxisX);
        $this->AxisY = new LAxis($InNameAxisY, $InTypeAxisY);
        $this->ChartType = $InChartType;
    }

    /**
     * Id of the chart
     *
     * @var int
     */
    public $Id;

    /**
     * Name of the Chart
     *
     * @var string
     */
    public $Name;

    /**
     * Axis X
     *
     * @var LAxis
     */
    public $AxisX;

    /**
     * Axis Y
     *
     * @var LAxis
     */
    public $AxisY;

    /**
     * Type of the chart
     *
     * @var string
     */
    public $InChartType;
}