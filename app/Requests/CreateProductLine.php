<?php

namespace App\Requests;


use jamesvweston\Utilities\ArrayUtil AS AU;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class CreateProductLine
{

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
    }

    public function validate ()
    {
        if (is_null($this->name))
            throw new BadRequestHttpException('name is required');
        if (is_null($this->description))
            throw new BadRequestHttpException('description is required');
        if (is_null($this->logo))
            throw new BadRequestHttpException('logo is required');
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

}