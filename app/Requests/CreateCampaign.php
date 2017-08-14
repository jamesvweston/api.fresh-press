<?php
/**
 * Created by IntelliJ IDEA.
 * User: jamesweston
 * Date: 8/14/17
 * Time: 5:31 PM
 */

namespace App\Requests;

/**
 * @SWG\Definition(required={"name", "description"})
 */
class CreateCampaign
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

}