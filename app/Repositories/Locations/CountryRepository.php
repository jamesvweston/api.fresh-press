<?php

namespace App\Repositories\Locations;


use App\Models\Locations\Country;
use App\Repositories\Doctrine\BaseRepository;

class CountryRepository extends BaseRepository
{

    /**
     * @param   string  $code
     * @return  Country|null
     */
    public function getOneByCode ($code)
    {
        return $this->findOneBy(['code' => $code]);
    }

    /**
     * @return  Country
     */
    public function getUS ()
    {
        return $this->find(233);
    }

}