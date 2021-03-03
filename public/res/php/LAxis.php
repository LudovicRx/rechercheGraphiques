<?php
// Desc.     :   Classe conteneur pour un axe

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
    public function __construct($InName = "", $InType = "") {
        $this->Name = $InName;
        $this->Type = $InType;
    }

    public $Name;
    public $Type;
} 
