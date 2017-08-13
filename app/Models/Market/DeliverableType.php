<?php

namespace App\Models\Market;


class DeliverableType implements \JsonSerializable
{

    /**
     * @var int
     */
    protected $id;

    /**
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