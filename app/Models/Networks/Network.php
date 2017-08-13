<?php

namespace App\Models\Networks;


use Doctrine\Common\Collections\ArrayCollection;

class Network implements \JsonSerializable
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
    protected $shorthand;

    /**
     * @var string
     */
    protected $logo;

    /**
     * @var string|null
     */
    protected $sub_id_key;

    /**
     * @var int|null
     */
    protected $fmtc_network_id;

    /**
     * @var ArrayCollection
     */
    protected $fields;

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object['id']                   = $this->getId();
        $object['label']                = $this->getLabel();
        $object['shorthand']            = $this->getShorthand();
        $object['logo']                 = $this->getLogo();

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
    public function getShorthand()
    {
        return $this->shorthand;
    }

    /**
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @return null|string
     */
    public function getSubIdKey()
    {
        return $this->sub_id_key;
    }

    /**
     * @return int|null
     */
    public function getFmtcNetworkId()
    {
        return $this->fmtc_network_id;
    }

    /**
     * @return NetworkField[]
     */
    public function getFields ()
    {
        return $this->fields->toArray();
    }

}