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
     * @return int
     */
    abstract function getNetworkId ();

}