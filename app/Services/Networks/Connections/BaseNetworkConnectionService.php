<?php

namespace App\Services\Networks\Connections;


use App\Models\Networks\Network;
use App\Models\Networks\NetworkConnection;
use App\Models\Networks\NetworkField;
use App\Services\Networks\Connections\Contracts\Reportable;
use App\Services\Networks\Connections\Contracts\Syncable;
use FMTCco\Integrations\Exceptions\InvalidNetworkCredentialsException;

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
     * @param   NetworkConnection   $network_connection
     * @throws  InvalidNetworkCredentialsException
     * @return  NetworkConnection
     */
    public function testConnection ($network_connection)
    {
        try
        {
            $this->testConnectionCredentials($network_connection);
            if (!is_null($network_connection->sync_failed_at) || !is_null($network_connection->sync_failed_message))
            {
                $network_connection->clearSyncFailures();
                $network_connection->save();
                return $network_connection;
            }
        }
        catch (InvalidNetworkCredentialsException $exception)
        {
            $network_connection->recordSyncFailure($exception->getMessage());
            $network_connection->save();
            throw $exception;
        }
    }

    /**
     * @param   NetworkConnection   $network_connection
     */
    public function syncRelations($network_connection)
    {
        if ($this instanceof Syncable)
        {
            return $this->getProgramIds($network_connection);
        }
    }

    /**
     * @param   NetworkConnection   $network_connection
     * @param   string  $from_date
     * @param   string  $to_date
     */
    public function handleImports($network_connection, $from_date = 'now', $to_date = 'now')
    {
        if ($this instanceof Reportable)
            $this->handleImports($network_connection, $from_date, $to_date);
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
    protected abstract function getNetworkId ();

    /**
     * @param   NetworkConnection   $network_connection
     * @return  bool
     */
    abstract protected function testConnectionCredentials ($network_connection);

}