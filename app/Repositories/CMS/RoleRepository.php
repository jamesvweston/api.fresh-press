<?php

namespace App\Repositories\CMS;


use App\Models\CMS\Role;
use App\Repositories\Doctrine\BaseRepository;

class RoleRepository extends BaseRepository
{

    /**
     * @return Role
     */
    public function getAdmin ()
    {
        return $this->find(1);
    }

}