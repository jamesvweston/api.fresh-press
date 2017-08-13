<?php

namespace App\Models\Market;


use jamesvweston\Utilities\ArrayUtil AS AU;

class ProductCompensation extends CompensationModel implements \JsonSerializable
{

    /**
     * @var string
     */
    protected $description;

    /**
     * @var float
     */
    protected $value;


    public function __construct($data = [])
    {
        parent::__construct($data);

        $this->description              = AU::get($data['description']);
        $this->value                    = AU::get($data['value']);
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object                         = parent::jsonSerialize();
        $object['description']          = $this->getDescription();
        $object['value']                = $this->getValue();

        return $object;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param float $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

}