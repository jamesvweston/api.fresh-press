<?php

namespace App\Models\Market;


class AgeRange implements \JsonSerializable
{

    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $min;

    /**
     * @var int|null
     */
    protected $max;


    /**
     * @return array
     */
    public function jsonSerialize ()
    {
        $object['id']                   = $this->getId();
        $object['min']                  = $this->getMin();
        $object['max']                  = $this->getMax();

        return $object;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * @return int|null
     */
    public function getMax()
    {
        return $this->max;
    }

}