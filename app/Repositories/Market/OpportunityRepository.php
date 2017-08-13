<?php

namespace App\Repositories\Market;


use App\Models\Market\Opportunity;
use App\Repositories\Doctrine\BaseRepository;

class OpportunityRepository extends BaseRepository
{

    /**
     * @param   int $id
     * @param   null $lockMode
     * @param   null $lockVersion
     * @return  Opportunity|null
     */
    public function find($id, $lockMode = null, $lockVersion = null)
    {
        return parent::find($id, $lockMode, $lockVersion);
    }

}