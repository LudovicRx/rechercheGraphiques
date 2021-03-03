<?php

/**
 * Class that is a container for chart 
 */
class LChart
{

    /**
     * Create an object of type LChart
     *
     * @param integer $InId
     * @param string $InName
     * @param string $InNameAxisX
     * @param string $InTypeAxisX
     * @param string $InNameAxisY
     * @param string $InTypeAxisY
     * @param array $InData
     */
    public function __construct($InId = 0, $InName = "", $InNameAxisX = "", $InTypeAxisX = "", $InNameAxisY = "", $InTypeAxisY = "", $InData = array())
    {
        $this->Id = $InId;
        $this->Name = $InName;
        $this->AxisX = new LAxis($InNameAxisX, $InTypeAxisX);
        $this->AxisY = new LAxis($InNameAxisY, $InTypeAxisY);
        $this->Data = $InData;
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
     * Data of the chart
     *
     * @var array
     */
    public $Data;
}
