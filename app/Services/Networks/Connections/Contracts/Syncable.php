<?php

namespace App\Services\Networks\Connections\Contracts;


use App\Models\Networks\NetworkConnection;

interface Syncable
{

    /**
     * @param   NetworkConnection   $network_connection
     */
    function syncRelations ($network_connection);

}