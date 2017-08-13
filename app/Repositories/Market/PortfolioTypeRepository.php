<?php

namespace App\Repositories\Market;


use App\Models\Market\PortfolioType;
use App\Repositories\Doctrine\BaseRepository;

class PortfolioTypeRepository extends BaseRepository
{

    /**
     * @param   string  $name
     * @return  PortfolioType|null
     */
    public function getOneByName ($name)
    {
        return $this->findOneBy(['name' => $name]);
    }

}