<?php

namespace Tests\Feature;

use App\Models\Networks\NetworkConnection;
use App\Utilities\NetworkConnectionFactory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NetworkConnectionTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testConnections ()
    {
        return;
        $network_connections                = NetworkConnection::all();

        foreach ($network_connections AS $connection)
        {
            $connection_service             = NetworkConnectionFactory::get($connection->network->id);
            try
            {
                $connection_service->testConnection($connection);
            }
            catch (\Exception $exception)
            {

            }
        }
    }

    public function testProgramIds ()
    {
        return;
        $network_connections                = NetworkConnection::all();

        foreach ($network_connections AS $connection)
        {
            $connection_service             = NetworkConnectionFactory::get($connection->network->id);
            try
            {
                $programIds                 = $connection_service->syncRelations($connection);
                if (!is_null($programIds))
                    dd($programIds);
            }
            catch (\Exception $exception)
            {

            }
        }
    }
}
