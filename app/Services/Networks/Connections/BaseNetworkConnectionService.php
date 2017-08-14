<?php

namespace App\Services\Networks\Connections;


use App\Repositories\Networks\NetworkRepository;
use EntityManager;

abstract class BaseNetworkConnectionService
{

    /**
     * @var NetworkRepository
     */
    protected $network_repo;

    public function __construct()
    {
        $this->network_repo                 = EntityManager::getRepository('App\Models\Networks\Network');
    }


    /**
     * @return int
     */
    abstract function getNetworkId ();

}