<?php

namespace App\Models\Networks;


class NetworkField implements \JsonSerializable
{

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $label;

    /**
     * @var string
     */
    protected $field;

    /**
     * @var Network
     */
    protected $network;


    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object['id']                   = $this->getId();
        $object['label']                = $this->getLabel();
        $object['field']                = $this->getField();

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
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @return string
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * @return Network
     */
    public function getNetwork()
    {
        return $this->network;
    }

}