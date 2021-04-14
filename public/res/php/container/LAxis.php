<?php

/** LAxis
 *  -------
 *  @file
 *  @copyright Copyright (c) 2021 Recherche Graphique, MIT License, See the LICENSE file for copying permissions.
 *  @brief Class LAxis
 *  @author ludovic.rx@eduge.ch
 */

/**
 * @brief Class that contains an axis
 */
class LAxis
{
    /**
     * Constructor that create an object of type LAxis
     *
     * @param string $InName name of the chart
     * @param string $InType type of the axis
     * @param array $InData array of the datas
     */
    public function __construct(string $InName = "", string $InType = "", array $InData = array())
    {
        $this->Name = $InName;
        $this->Type = $InType;
    }

    /**> Name of the axis */
    public $Name;

    /**> Type of the axis */
    public $Type;
}
