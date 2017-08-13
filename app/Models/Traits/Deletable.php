<?php

namespace App\Models\Traits;


trait Deletable
{

    /**
     * @var \DateTime|null
     */
    protected $deleted_at;

    /**
     * @return \DateTime|null
     */
    public function getDeletedAt()
    {
        return $this->deleted_at;
    }

    /**
     * @param \DateTime|null $deleted_at
     */
    public function setDeletedAt($deleted_at)
    {
        $this->deleted_at = $deleted_at;
    }

}