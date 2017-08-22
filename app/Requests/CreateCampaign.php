<?php

namespace App\Requests;


use jamesvweston\Utilities\ArrayUtil AS AU;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;


class CreateCampaign
{

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;


    public function __construct($data = [])
    {
        $this->name                     = AU::get($data['name']);
        $this->description              = AU::get($data['description']);
    }

    public function validate ()
    {
        if (is_null($this->name))
            throw new BadRequestHttpException('name is required');
        if (is_null($this->description))
            throw new BadRequestHttpException('description is required');
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

}