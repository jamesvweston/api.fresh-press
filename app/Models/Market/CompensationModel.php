<?php

namespace App\Models\Market;


use jamesvweston\Utilities\ArrayUtil AS AU;

abstract class CompensationModel implements \JsonSerializable
{

    /**
     * @var int
     */
    protected $id;


    public function __construct($data = [])
    {

    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object['id']                   = $this->getId();

        return $object;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

}