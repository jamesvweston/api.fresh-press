<?php

namespace App\Services\Networks\Connections\Contracts;

use App\Models\Networks\NetworkConnection;

interface Reportable
{

    /**
     * @param   NetworkConnection   $network_connection
     * @param   string  $from_date
     * @param   string  $to_date
     */
    function handleImports($network_connection, $from_date = 'now', $to_date = 'now');

}