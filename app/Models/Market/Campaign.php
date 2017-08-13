<?php

namespace App\Models\Market;


use App\Models\CMS\Advertiser;
use App\Models\Traits\Deletable;
use App\Models\Traits\TimeStamps;
use jamesvweston\Utilities\ArrayUtil AS AU;

class Campaign implements \JsonSerializable
{

    use TimeStamps, Deletable;


    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $description;

    /**
     * @var Advertiser
     */
    protected $advertiser;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->name                     = AU::get($data['name']);
        $this->description              = AU::get($data['description']);
        $this->advertiser               = AU::get($data['advertiser']);
    }

    /**
     * @return array
     */
    public function jsonSerialize ()
    {
        $object['id']                   = $this->getId();
        $object['name']                 = $this->getName();
        $object['description']          = $this->getDescription();

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
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return null|string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param null|string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return Advertiser
     */
    public function getAdvertiser()
    {
        return $this->advertiser;
    }

    /**
     * @param Advertiser $advertiser
     */
    public function setAdvertiser($advertiser)
    {
        $this->advertiser = $advertiser;
    }

}