<?php

namespace App\Requests\Traits;


trait QueryNames
{

    /**
     * @var string|null
     */
    protected $names;

    /**
     * @return null|string
     */
    public function getNames()
    {
        return $this->names;
    }

    /**
     * @param null|string $names
     */
    public function setNames($names)
    {
        $this->names = $names;
    }

}