<?php

namespace App\Models\Market;


/**
 * @SWG\Definition()
 */
class PortfolioType implements \JsonSerializable
{

    /**
     * @SWG\Property()
     * @var int
     */
    protected $id;

    /**
     * @SWG\Property()
     * @var string
     */
    protected $name;


    /**
     * @return array
     */
    public function jsonSerialize ()
    {
        $object['id']                   = $this->getId();
        $object['name']                 = $this->getName();

        return $object;
    }

    /**
     * @return int
     */
    public function getId ()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName ()
    {
        return $this->name;
    }

}