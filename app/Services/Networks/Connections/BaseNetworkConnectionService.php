<?php

namespace App\Services\Networks\Connections;


use App\Models\Networks\Network;
use App\Models\Networks\NetworkField;

abstract class BaseNetworkConnectionService
{

    /**
     * @var Network
     */
    protected $network;

    /**
     * @var NetworkField[]
     */
    protected $fields;

    public function __construct()
    {
        $this->network                      = Network::find($this->getNetworkId());
        $this->fields                       = $this->network->fields;
    }

    /**
     * @return bool
     */
    public function syncable ()
    {
        return $this->network->syncable;
    }

    /**
     * @return bool
     */
    public function reportable ()
    {
        return $this->network->reportable;
    }

    /**
     * @return Network
     */
    public function getNetwork()
    {
        return $this->network;
    }

    /**
     * @return NetworkField[]
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * @return int
     */
    abstract function getNetworkId ();

    /**
     * @return string
     */
    abstract function getHelpLink ();

    /**
     * @return string
     */
    abstract function getAffiliateIdRegex ();

}