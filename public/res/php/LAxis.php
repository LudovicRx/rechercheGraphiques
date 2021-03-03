<?php
/**
 * Class that contains an axis
 */
class LAxis {
    /**
     * Constructor that create an object of type LAxis
     *
     * @param string $InName name of the chart
     * @param string $InType type of the axis
     */
    public function __construct($InName = "", $InType = "", $InData = array()) {
        $this->Name = $InName;
        $this->Type = $InType;
    }

    /**
     * Name of the axis
     *
     * @var string
     */
    public $Name;
    /**
     * Type of the axis
     *
     * @var string
     */
    public $Type;
} 
