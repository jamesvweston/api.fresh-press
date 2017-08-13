<?php

namespace App\Models\Market;


use jamesvweston\Utilities\ArrayUtil AS AU;

abstract class CompensationModel implements \JsonSerializable
{

    /**
     * @var int
     */
    protected $id;

    /**
     * @var Opportunity
     */
    protected $opportunity;

    public function __construct($data = [])
    {
        $this->opportunity              = AU::get($data['opportunity']);
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object['id']                   = $this->getId();
        $object['type']                 = $this->getType();

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
     * @return Opportunity
     */
    public function getOpportunity()
    {
        return $this->opportunity;
    }

    /**
     * @param Opportunity $opportunity
     */
    public function setOpportunity($opportunity)
    {
        $this->opportunity = $opportunity;
    }

    /**
     * @return string
     */
    abstract function getType ();

}