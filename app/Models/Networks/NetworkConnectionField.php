<?php

namespace App\Models\Networks;


use jamesvweston\Utilities\ArrayUtil AS AU;

class NetworkConnectionField implements \JsonSerializable
{

    /**
     * @var int
     */
    protected $id;

    /**
     * @var NetworkConnection
     */
    protected $network_connection;

    /**
     * @var NetworkConnectionField
     */
    protected $network_field;

    /**
     * @var string
     */
    protected $value;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->network_connection       = AU::get($data['network_connection']);
        $this->network_field            = AU::get($data['network_field']);
        $this->value                    = AU::get($data['value']);
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object['id']                   = $this->getId();
        $object['network_field']        = $this->getNetworkField()->jsonSerialize();
        $object['value']                = $this->getValue();

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
     * @return NetworkConnection
     */
    public function getNetworkConnection()
    {
        return $this->network_connection;
    }

    /**
     * @param NetworkConnection $network_connection
     */
    public function setNetworkConnection($network_connection)
    {
        $this->network_connection = $network_connection;
    }

    /**
     * @return NetworkConnectionField
     */
    public function getNetworkField()
    {
        return $this->network_field;
    }

    /**
     * @param NetworkConnectionField $network_field
     */
    public function setNetworkField($network_field)
    {
        $this->network_field = $network_field;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

}