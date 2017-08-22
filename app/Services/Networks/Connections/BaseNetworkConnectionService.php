<?php

namespace App\Services\Networks\Connections;


use App\Models\Networks\Network;

abstract class BaseNetworkConnectionService
{

    /**
     * @var Network
     */
    protected $network;


    public function __construct()
    {
        $this->network                      = Network::find($this->getNetworkId());
    }


    /**
     * @return int
     */
    abstract function getNetworkId ();

}