<?php

namespace App\Services\Networks\Connections;


use App\Models\Networks\Network;
use App\Repositories\Networks\NetworkRepository;
use EntityManager;

abstract class BaseNetworkConnectionService
{

    /**
     * @var NetworkRepository
     */
    protected $network_repo;

    /**
     * @var Network
     */
    protected $network;


    public function __construct()
    {
        $this->network_repo                 = EntityManager::getRepository('App\Models\Networks\Network');
        $this->network                      = $this->network_repo->find($this->getNetworkId());
    }


    /**
     * @return int
     */
    abstract function getNetworkId ();

}