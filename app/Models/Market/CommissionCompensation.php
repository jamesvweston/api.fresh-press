<?php

namespace App\Models\Market;


use Doctrine\Common\Collections\ArrayCollection;
use jamesvweston\Utilities\ArrayUtil AS AU;

class CommissionCompensation extends CompensationModel implements \JsonSerializable
{

    /**
     * @var float
     */
    protected $rate;

    /**
     * One of: percent, dollars
     * @var string
     */
    protected $rate_type;

    /**
     * One of: sale, sign up
     * @var string
     */
    protected $conversion_type;

    /**
     * @var float
     */
    protected $average_order_value;

    /**
     * @var string
     */
    protected $affiliate_network;

    /**
     * @var string
     */
    protected $affiliate_program_name;

    /**
     * @var ArrayCollection
     */
    protected $affiliate_links;


    public function __construct($data = [])
    {
        parent::__construct($data);

        $this->rate                     = AU::get($data['rate']);
        $this->rate_type                = AU::get($data['rate_type']);
        $this->conversion_type          = AU::get($data['conversion_type']);
        $this->average_order_value      = AU::get($data['average_order_value']);
        $this->affiliate_network        = AU::get($data['affiliate_network']);
        $this->affiliate_program_name   = AU::get($data['affiliate_program_name']);
        $this->affiliate_links          = AU::get($data['affiliate_links'], new ArrayCollection());
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object                         = parent::jsonSerialize();
        $object['rate']                 = $this->getRate();
        $object['rate_type']            = $this->getRateType();
        $object['conversion_type']      = $this->getConversionType();
        $object['average_order_value']  = $this->getAverageOrderValue();
        $object['affiliate_network']    = $this->getAffiliateNetwork();
        $object['affiliate_program_name']=$this->getAffiliateProgramName();

        $object['affiliate_links']      = [];
        foreach ($this->getAffiliateLinks() AS $affiliate_link)
        {
            $object['affiliate_links'][] = $affiliate_link->jsonSerialize();
        }

        return $object;
    }

    /**
     * @return float
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * @param float $rate
     */
    public function setRate($rate)
    {
        $this->rate = $rate;
    }

    /**
     * @return string
     */
    public function getRateType()
    {
        return $this->rate_type;
    }

    /**
     * @param string $rate_type
     */
    public function setRateType($rate_type)
    {
        $this->rate_type = $rate_type;
    }

    /**
     * @return string
     */
    public function getConversionType()
    {
        return $this->conversion_type;
    }

    /**
     * @param string $conversion_type
     */
    public function setConversionType($conversion_type)
    {
        $this->conversion_type = $conversion_type;
    }

    /**
     * @return float
     */
    public function getAverageOrderValue()
    {
        return $this->average_order_value;
    }

    /**
     * @param float $average_order_value
     */
    public function setAverageOrderValue($average_order_value)
    {
        $this->average_order_value = $average_order_value;
    }

    /**
     * @return string
     */
    public function getAffiliateNetwork()
    {
        return $this->affiliate_network;
    }

    /**
     * @param string $affiliate_network
     */
    public function setAffiliateNetwork($affiliate_network)
    {
        $this->affiliate_network = $affiliate_network;
    }

    /**
     * @return string
     */
    public function getAffiliateProgramName()
    {
        return $this->affiliate_program_name;
    }

    /**
     * @param string $affiliate_program_name
     */
    public function setAffiliateProgramName($affiliate_program_name)
    {
        $this->affiliate_program_name = $affiliate_program_name;
    }

    /**
     * @return AffiliateLink[]
     */
    public function getAffiliateLinks()
    {
        return $this->affiliate_links->toArray();
    }

    /**
     * @param AffiliateLink $affiliate_link
     */
    public function addAffiliateLink(AffiliateLink $affiliate_link)
    {
        $affiliate_link->setCommissionCompensation($this);
        $this->affiliate_links->add($affiliate_link);
    }

}