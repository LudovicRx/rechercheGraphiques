<?php
/** LAxis
 *  -------
 *  @file
 *  @copyright Copyright (c) 2020 Recherche Graphique, MIT License, See the LICENSE file for copying permissions.
 *  @brief Class LAxis
 *  @author Ludovic Roux
 */

/**
 * @brief Class that contains an axis
 */
class LAxis {
    /**
     * Constructor that create an object of type LAxis
     *
     * @param string $InName name of the chart
     * @param string $InType type of the axis
     * @param array $InData array of the datas
     */
    public function __construct($InName = "", $InType = "", $InData = array()) {
        $this->Name = $InName;
        $this->Type = $InType;
    }

    /**> Name of the axis */
    public $Name;

    /**> Type of the axis */
    public $Type;
} 
