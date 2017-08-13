<?php

namespace App\Repositories\Doctrine;


use App\Repositories\Doctrine\Contracts\RepositoryInterface;
use Doctrine\ORM\EntityRepository;

class BaseRepository extends EntityRepository implements RepositoryInterface
{

    public function commit ()
    {
        $this->_em->flush();
    }

    public function create ($obj)
    {
        $this->_em->persist($obj);
    }

    public function save ($obj)
    {
        $this->_em->persist($obj);
    }

    public function update ($obj)
    {
        $this->_em->merge($obj);
    }

    public function saveAndCommit ($obj)
    {
        $this->save($obj);
        $this->commit();
        return $obj;
    }

    public function delete ($obj)
    {
        $this->_em->remove($obj);
    }

}