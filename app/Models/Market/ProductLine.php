<?php

namespace App\Models\Market;


use App\Models\CMS\Advertiser;
use App\Models\Traits\Deletable;
use App\Models\Traits\TimeStamps;
use Doctrine\Common\Collections\ArrayCollection;
use jamesvweston\Utilities\ArrayUtil AS AU;

class ProductLine implements \JsonSerializable
{

    use TimeStamps, Deletable;


    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $alias;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $logo;

    /**
     * @var string|null
     */
    protected $website;

    /**
     * @var string|null
     */
    protected $facebook;

    /**
     * @var string|null
     */
    protected $twitter;

    /**
     * @var string|null
     */
    protected $instagram;

    /**
     * @var string|null
     */
    protected $news_url;

    /**
     * @var string|null
     */
    protected $keywords;

    /**
     * @var Advertiser
     */
    protected $advertiser;

    /**
     * @var ArrayCollection
     */
    protected $platforms;

    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->name                     = AU::get($data['name']);
        $this->alias                    = AU::get($data['alias']);
        $this->description              = AU::get($data['description']);
        $this->logo                     = AU::get($data['logo']);
        $this->website                  = AU::get($data['website']);
        $this->facebook                 = AU::get($data['facebook']);
        $this->twitter                  = AU::get($data['twitter']);
        $this->instagram                = AU::get($data['instagram']);
        $this->news_url                 = AU::get($data['news_url']);
        $this->keywords                 = AU::get($data['keywords']);
        $this->advertiser               = AU::get($data['advertiser']);
        $this->platforms                = AU::get($data['platforms'], new ArrayCollection());
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
        $object['name']                 = $this->getName();
        $object['alias']                = $this->getAlias();
        $object['description']          = $this->getDescription();
        $object['logo']                 = $this->getLogo();
        $object['website']              = $this->getWebsite();
        $object['facebook']             = $this->getFacebook();
        $object['twitter']              = $this->getTwitter();
        $object['instagram']            = $this->getInstagram();
        $object['news_url']             = $this->getNewsUrl();
        $object['keywords']             = $this->getKeywords();

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
     * @return null|string
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * @param null|string $alias
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;
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
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param string $logo
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    /**
     * @return null|string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * @param null|string $website
     */
    public function setWebsite($website)
    {
        $this->website = $website;
    }

    /**
     * @return null|string
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * @param null|string $facebook
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;
    }

    /**
     * @return null|string
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * @param null|string $twitter
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;
    }

    /**
     * @return null|string
     */
    public function getInstagram()
    {
        return $this->instagram;
    }

    /**
     * @param null|string $instagram
     */
    public function setInstagram($instagram)
    {
        $this->instagram = $instagram;
    }

    /**
     * @return null|string
     */
    public function getNewsUrl()
    {
        return $this->news_url;
    }

    /**
     * @param null|string $news_url
     */
    public function setNewsUrl($news_url)
    {
        $this->news_url = $news_url;
    }

    /**
     * @return null|string
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @param null|string $keywords
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;
    }

    /**
     * @return Advertiser
     */
    public function getAdvertiser()
    {
        return $this->advertiser;
    }

    /**
     * @param Advertiser $advertiser
     */
    public function setAdvertiser($advertiser)
    {
        $this->advertiser = $advertiser;
    }

    /**
     * @return Platform[]
     */
    public function getPlatforms ()
    {
        return $this->platforms->toArray();
    }

    /**
     * @param Platform $platform
     */
    public function addPlatform (Platform $platform)
    {
        $this->platforms->add($platform);
    }

}