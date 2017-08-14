<?php
/**
 * Created by IntelliJ IDEA.
 * User: jamesweston
 * Date: 8/14/17
 * Time: 5:25 PM
 */

namespace App\Requests;

/**
 * @SWG\Definition(required={"name", "description", "logo", "subdivisionId"})
 */
class CreateProductLine
{

    /**
     * @SWG\Property()
     * @var string
     */
    protected $name;

    /**
     * @SWG\Property()
     * @var string|null
     */
    protected $alias;

    /**
     * @SWG\Property()
     * @var string
     */
    protected $description;

    /**
     * @SWG\Property()
     * @var string
     */
    protected $logo;

    /**
     * @SWG\Property()
     * @var string|null
     */
    protected $website;

    /**
     * @SWG\Property()
     * @var string|null
     */
    protected $facebook;

    /**
     * @SWG\Property()
     * @var string|null
     */
    protected $twitter;

    /**
     * @SWG\Property()
     * @var string|null
     */
    protected $instagram;

    /**
     * @SWG\Property()
     * @var string|null
     */
    protected $news_url;

    /**
     * @SWG\Property()
     * @var string|null
     */
    protected $keywords;

}