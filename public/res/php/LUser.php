<?php
/**
 * Class that is a container for user
 */
class LUser {
    /**
     * Constructor that create a user
     *
     * @param integer $InId
     * @param string $InUsername
     */
    public function __construct($InId = 0, $InUsername = "") {
        $this->Id = $InId;
        $this->Username = $InUsername;
    }

    /**
     * Id of the user
     *
     * @var int
     */
    public $Id;

    /**
     * Username of the user
     *
     * @var string
     */
    public $Username;
} 
