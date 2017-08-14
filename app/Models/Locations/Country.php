<?php

namespace App\Models\Locations;


/**
 * @SWG\Definition()
 */
class Country implements \JsonSerializable
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
     * @SWG\Property()
     * @var string
     */
    protected $code;


    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object['id']                   = $this->getId();
        $object['name']                 = $this->getName();
        $object['code']                 = $this->getCode();

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

}