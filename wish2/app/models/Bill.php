<?php

class Bill extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $bid;

    /**
     *
     * @var string
     */
    public $bname;

    /**
     *
     * @var integer
     */
    public $gid;

    /**
     *
     * @var integer
     */
    public $cost;

    /**
     *
     * @var integer
     */
    public $uid;

    /**
     *
     * @var integer
     */
    public $create_time;

    /**
     *
     * @var integer
     */
    public $finish_time;

    /**
     *
     * @var integer
     */
    public $status;

    /**
     *
     * @var string
     */
    public $place;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource('t_bill');
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'bid' => 'bid', 
            'bname' => 'bname', 
            'gid' => 'gid', 
            'cost' => 'cost', 
            'uid' => 'uid', 
            'create_time' => 'create_time', 
            'finish_time' => 'finish_time', 
            'status' => 'status', 
            'place' => 'place'
        );
    }

}
