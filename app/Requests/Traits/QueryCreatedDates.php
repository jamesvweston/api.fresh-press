<?php

namespace App\Requests\Traits;


trait QueryCreatedDates
{

    use RequestValidation;


    /**
     * @var string|null
     */
    protected $created_from;

    /**
     * @var string|null
     */
    protected $created_to;


    protected function validateCreatedDates ()
    {
        if (!is_null($this->created_from))
            $this->validateDate($this->created_from, 'created_from');

        if (!is_null($this->created_to))
            $this->validateDate($this->created_to, 'created_to');
    }

    /**
     * @return null|string
     */
    public function getCreatedFrom()
    {
        return $this->created_from;
    }

    /**
     * @param null|string $created_from
     */
    public function setCreatedFrom($created_from)
    {
        $this->created_from = $created_from;
    }

    /**
     * @return null|string
     */
    public function getCreatedTo()
    {
        return $this->created_to;
    }

    /**
     * @param null|string $created_to
     */
    public function setCreatedTo($created_to)
    {
        $this->created_to = $created_to;
    }

}