<?php

namespace App\Models\Market;


use App\Models\CMS\Influencer;
use App\Models\Traits\Deletable;
use App\Models\Traits\TimeStamps;
use jamesvweston\Utilities\ArrayUtil AS AU;

class Bid implements \JsonSerializable
{

    use TimeStamps, Deletable;


    /**
     * @var int
     */
    protected $id;

    /**
     * @var float
     */
    protected $amount;

    /**
     * @var string|null
     */
    protected $message;

    /**
     * @var string|null
     */
    protected $product_address;

    /**
     * @var string|null
     */
    protected $product_choices;

    /**
     * @var string|null
     */
    protected $reject_reason;

    /**
     * @var float
     */
    protected $freshpress_cut;

    /**
     * @var Influencer
     */
    protected $influencer;

    /**
     * @var Opportunity
     */
    protected $opportunity;

    /**
     * @var \DateTime|null
     */
    protected $accepted_at;

    /**
     * @var \DateTime|null
     */
    protected $rejected_at;


    public function __construct($data = [])
    {
        $this->amount                   = AU::get($data['amount']);
        $this->message                  = AU::get($data['message']);
        $this->product_address          = AU::get($data['product_address']);
        $this->product_choices          = AU::get($data['product_choices']);
        $this->reject_reason            = AU::get($data['reject_reason']);
        $this->freshpress_cut           = AU::get($data['freshpress_cut']);
        $this->influencer               = AU::get($data['influencer']);
        $this->opportunity              = AU::get($data['opportunity']);
        $this->accepted_at              = AU::get($data['accepted_at']);
        $this->rejected_at              = AU::get($data['rejected_at']);
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object['id']                   = $this->getId();
        $object['amount']               = $this->getAmount();
        $object['message']              = $this->getMessage();
        $object['product_address']      = $this->getProductAddress();
        $object['product_choices']      = $this->getProductChoices();
        $object['reject_reason']        = $this->getRejectReason();
        $object['influencer']           = $this->getInfluencer()->jsonSerialize();
        $object['accepted_at']          = $this->getAcceptedAt();
        $object['rejected_at']          = $this->getRejectedAt();

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
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return null|string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param null|string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return null|string
     */
    public function getProductAddress()
    {
        return $this->product_address;
    }

    /**
     * @param null|string $product_address
     */
    public function setProductAddress($product_address)
    {
        $this->product_address = $product_address;
    }

    /**
     * @return null|string
     */
    public function getProductChoices()
    {
        return $this->product_choices;
    }

    /**
     * @param null|string $product_choices
     */
    public function setProductChoices($product_choices)
    {
        $this->product_choices = $product_choices;
    }

    /**
     * @return null|string
     */
    public function getRejectReason()
    {
        return $this->reject_reason;
    }

    /**
     * @param null|string $reject_reason
     */
    public function setRejectReason($reject_reason)
    {
        $this->reject_reason = $reject_reason;
    }

    /**
     * @return float
     */
    public function getFreshpressCut()
    {
        return $this->freshpress_cut;
    }

    /**
     * @param float $freshpress_cut
     */
    public function setFreshpressCut($freshpress_cut)
    {
        $this->freshpress_cut = $freshpress_cut;
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

    /**
     * @return \DateTime|null
     */
    public function getAcceptedAt()
    {
        return $this->accepted_at;
    }

    /**
     * @param \DateTime|null $accepted_at
     */
    public function setAcceptedAt($accepted_at)
    {
        $this->accepted_at = $accepted_at;
    }

    /**
     * @return \DateTime|null
     */
    public function getRejectedAt()
    {
        return $this->rejected_at;
    }

    /**
     * @param \DateTime|null $rejected_at
     */
    public function setRejectedAt($rejected_at)
    {
        $this->rejected_at = $rejected_at;
    }

}