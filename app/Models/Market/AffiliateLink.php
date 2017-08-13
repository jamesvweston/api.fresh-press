<?php

namespace App\Models\Market;


use jamesvweston\Utilities\ArrayUtil AS AU;

class AffiliateLink implements \JsonSerializable
{

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $landing_page;

    /**
     * @var string|null
     */
    protected $affiliate_link;

    /**
     * @var CommissionCompensation
     */
    protected $commission_compensation;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->landing_page             = AU::get($data['landing_page']);
        $this->affiliate_link           = AU::get($data['affiliate_link']);
        $this->commission_compensation  = AU::get($data['commission_compensation']);
    }

    /**
     * @return array
     */
    public function jsonSerialize ()
    {
        $object['id']                   = $this->getId();
        $object['landing_page']         = $this->getLandingPage();
        $object['affiliate_link']       = $this->getAffiliateLink();

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
    public function getLandingPage()
    {
        return $this->landing_page;
    }

    /**
     * @param string $landing_page
     */
    public function setLandingPage($landing_page)
    {
        $this->landing_page = $landing_page;
    }

    /**
     * @return null|string
     */
    public function getAffiliateLink()
    {
        return $this->affiliate_link;
    }

    /**
     * @param null|string $affiliate_link
     */
    public function setAffiliateLink($affiliate_link)
    {
        $this->affiliate_link = $affiliate_link;
    }

    /**
     * @return CommissionCompensation
     */
    public function getCommissionCompensation()
    {
        return $this->commission_compensation;
    }

    /**
     * @param CommissionCompensation $commission_compensation
     */
    public function setCommissionCompensation($commission_compensation)
    {
        $this->commission_compensation = $commission_compensation;
    }

}