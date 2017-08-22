<?php

namespace App\Requests;


use jamesvweston\Utilities\ArrayUtil AS AU;

/**
 * @SWG\Definition()
 */

class UpdateCampaign
{

    /**
     * @SWG\Property()
     * @var string
     */
    protected $name;

    /**
     * @SWG\Property()
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