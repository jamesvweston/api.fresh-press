<?php

namespace App\Models\Market;


use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use jamesvweston\Utilities\ArrayUtil AS AU;

class Portfolio extends Model
{

    use HasTimestamps;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var bool
     */
    protected $is_unverified_outlet;

    /**
     * @var Sphere
     */
    protected $sphere;

    /**
     * @var PortfolioType
     */
    protected $portfolio_type;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->description              = AU::get($data['description']);
        $this->url                      = AU::get($data['url']);
        $this->is_unverified_outlet     = AU::get($data['is_unverified_outlet']);
        $this->sphere                   = AU::get($data['sphere']);
        $this->portfolio_type           = AU::get($data['portfolio_type']);
    }

    /**
     * @return array
     */
    public function toArray ()
    {
        $object['id']                   = $this->getId();
        $object['description']          = $this->getDescription();
        $object['is_unverified_outlet'] = $this->getIsUnverifiedOutlet();
        $object['portfolio_type']       = $this->getPortfolioType()->toArray();

        return $object;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
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

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return bool
     */
    public function getIsUnverifiedOutlet()
    {
        return $this->is_unverified_outlet;
    }

    /**
     * @param bool $is_unverified_outlet
     */
    public function setIsUnverifiedOutlet($is_unverified_outlet)
    {
        $this->is_unverified_outlet = $is_unverified_outlet;
    }

    /**
     * @return Sphere
     */
    public function getSphere()
    {
        return $this->sphere;
    }

    /**
     * @param Sphere $sphere
     */
    public function setSphere($sphere)
    {
        $this->sphere = $sphere;
    }

    /**
     * @return PortfolioType
     */
    public function getPortfolioType()
    {
        return $this->portfolio_type;
    }

    /**
     * @param PortfolioType $portfolio_type
     */
    public function setPortfolioType($portfolio_type)
    {
        $this->portfolio_type = $portfolio_type;
    }

}