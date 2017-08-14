<?php

namespace App\Requests;

/**
 * @SWG\Definition(required={"name", "description"})
 */
class CreateOpportunity
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
    protected $cover_photo;


}