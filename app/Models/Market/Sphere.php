<?php

namespace App\Models\Market;


use App\Models\CMS\Influencer;
use App\Models\Locations\Country;
use App\Models\Outlets\OutletConnection;
use App\Models\Traits\Deletable;
use App\Models\Traits\TimeStamps;
use Doctrine\Common\Collections\ArrayCollection;
use jamesvweston\Utilities\ArrayUtil AS AU;

/**
 * @SWG\Definition()
 */
class Sphere implements \JsonSerializable
{

    use TimeStamps, Deletable;


    /**
     * @SWG\Property()
     * @var int
     */
    protected $id;

    /**
     * @SWG\Property()
     * @var string
     */
    protected $title;

    /**
     * @SWG\Property()
     * @var string
     */
    protected $description;

    /**
     * @SWG\Property()
     * @var int
     */
    protected $percent_male;

    /**
     * @SWG\Property()
     * @var int
     */
    protected $percent_female;

    /**
     * @SWG\Property()
     * @var string|null
     */
    protected $logo;

    /**
     * @var Influencer
     */
    protected $influencer;

    /**
     * @SWG\Property()
     * @var AgeRange|null
     */
    protected $age_range;

    /**
     * @SWG\Property()
     * @var Country|null
     */
    protected $country;

    /**
     * @var ArrayCollection
     */
    protected $categories;

    /**
     * @var ArrayCollection
     */
    protected $outlet_connections;

    /**
     * @var ArrayCollection
     */
    protected $portfolios;

    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->title                    = AU::get($data['title']);
        $this->description              = AU::get($data['description']);
        $this->percent_male             = AU::get($data['percent_male']);
        $this->percent_female           = AU::get($data['percent_female']);
        $this->logo                     = AU::get($data['logo']);
        $this->influencer               = AU::get($data['influencer']);
        $this->age_range                = AU::get($data['age_range']);
        $this->country                  = AU::get($data['country']);
        $this->categories               = AU::get($data['categories'], new ArrayCollection());
        $this->outlet_connections       = AU::get($data['outlet_connections'], new ArrayCollection());
        $this->portfolios               = AU::get($data['portfolios'], new ArrayCollection());
    }

    public function validate()
    {

    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object['id']                   = $this->getId();
        $object['title']                = $this->getTitle();
        $object['description']          = $this->getDescription();
        $object['percent_male']         = $this->getPercentMale();
        $object['percent_female']       = $this->getPercentFemale();
        $object['logo']                 = $this->getLogo();
        $object['age_range']            = is_null($this->getAgeRange()) ? null : $this->getAgeRange()->jsonSerialize();
        $object['country']              = is_null($this->getCountry()) ? null : $this->getCountry()->jsonSerialize();

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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
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
     * @return int
     */
    public function getPercentMale()
    {
        return $this->percent_male;
    }

    /**
     * @param int $percent_male
     */
    public function setPercentMale($percent_male)
    {
        $this->percent_male = $percent_male;
    }

    /**
     * @return int
     */
    public function getPercentFemale()
    {
        return $this->percent_female;
    }

    /**
     * @param int $percent_female
     */
    public function setPercentFemale($percent_female)
    {
        $this->percent_female = $percent_female;
    }

    /**
     * @return null|string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param null|string $logo
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    /**
     * @return Influencer
     */
    public function getInfluencer()
    {
        return $this->influencer;
    }

    /**
     * @param Influencer $influencer
     */
    public function setInfluencer($influencer)
    {
        $this->influencer = $influencer;
    }

    /**
     * @return AgeRange|null
     */
    public function getAgeRange()
    {
        return $this->age_range;
    }

    /**
     * @param AgeRange|null $age_range
     */
    public function setAgeRange($age_range)
    {
        $this->age_range = $age_range;
    }

    /**
     * @return Country|null
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param Country|null $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return SphereCategory[]
     */
    public function getCategories ()
    {
        return $this->categories->toArray();
    }

    /**
     * @param   SphereCategory $sphere_category
     * @return  bool
     */
    public function hasCategory (SphereCategory $sphere_category)
    {
        foreach ($this->getCategories() AS $category)
        {
            if ($category->getId() == $sphere_category->getId())
                return true;
        }
        return false;
    }

    /**
     * @param SphereCategory $category
     */
    public function addCategory (SphereCategory $category)
    {
        $this->categories->add($category);
    }

    /**
     * @param SphereCategory $category
     */
    public function removeCategory (SphereCategory $category)
    {
        $this->categories->removeElement($category);
    }

    /**
     * @return OutletConnection[]
     */
    public function getOutletConnections ()
    {
        return $this->outlet_connections->toArray();
    }

    /**
     * @param OutletConnection $outlet_connection
     */
    public function addOutletConnection (OutletConnection $outlet_connection)
    {
        $outlet_connection->setSphere($this);
        $this->outlet_connections->add($outlet_connection);
    }

    /**
     * @return Portfolio[]
     */
    public function getPortfolios ()
    {
        return $this->portfolios->toArray();
    }

    /**
     * @param Portfolio $portfolio
     */
    public function addPortfolio (Portfolio $portfolio)
    {
        $portfolio->setSphere($this);
        $this->portfolios->add($portfolio);
    }

}