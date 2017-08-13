<?php

namespace App\Repositories\Networks;


use App\Models\Networks\Network;
use App\Repositories\Doctrine\BaseRepository;

class NetworkRepository extends BaseRepository
{

    /**
     * @param   int $id
     * @param   null $lockMode
     * @param   null $lockVersion
     * @return  Network|null
     */
    public function find($id, $lockMode = null, $lockVersion = null)
    {
        return parent::find($id, $lockMode, $lockVersion);
    }

}