<?php

namespace App\Services\Networks\Connections;


class ClixGaloreService extends BaseNetworkConnectionService
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return int
     */
    public function getNetworkId ()
    {
        return 19;
    }

}