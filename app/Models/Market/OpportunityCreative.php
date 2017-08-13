<?php

namespace App\Models\Market;


use jamesvweston\Utilities\ArrayUtil AS AU;

class OpportunityCreative implements \JsonSerializable
{

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var Opportunity
     */
    protected $opportunity;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->url                      = AU::get($data['url']);
        $this->opportunity              = AU::get($data['opportunity']);
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object['id']                   = $this->getId();
        $object['url']                  = $this->getUrl();

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
     * @return Opportunity
     */
    public function getOpportunity()
    {
        return $this->opportunity;
    }

    /**
     * @param Opportunity $opportunity
     */
    public function setOpportunity($opportunity)
    {
        $this->opportunity = $opportunity;
    }

}