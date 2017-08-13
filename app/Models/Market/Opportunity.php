<?php

namespace App\Models\Market;


use App\Models\CMS\Advertiser;
use App\Models\Traits\Deletable;
use App\Models\Traits\TimeStamps;
use Doctrine\Common\Collections\ArrayCollection;
use jamesvweston\Utilities\ArrayUtil AS AU;

class Opportunity implements \JsonSerializable
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
    protected $cover_photo;

    /**
     * @var string|null
     */
    protected $keywords;

    /**
     * @var string|null
     */
    protected $notes;

    /**
     * @var string|null
     */
    protected $pitch;

    /**
     * @var string|null
     */
    protected $rejected_reason;

    /**
     * @var int
     */
    protected $deliverable_deadline_days;

    /**
     * @var \DateTime|null
     */
    protected $apply_by;

    /**
     * @var \DateTime|null
     */
    protected $published_at;

    /**
     * @var \DateTime|null
     */
    protected $closed_at;

    /**
     * @var \DateTime|null
     */
    protected $paused_at;

    /**
     * @var \DateTime|null
     */
    protected $submitted_at;

    /**
     * @var \DateTime|null
     */
    protected $rejected_at;

    /**
     * @var Advertiser
     */
    protected $advertiser;

    /**
     * @var Campaign
     */
    protected $campaign;

    /**
     * @var ProductLine
     */
    protected $product_line;

    /**
     * @var DeliverableType
     */
    protected $deliverable_type;

    /**
     * @var ArrayCollection
     */
    protected $compensation_models;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->name                     = AU::get($data['name']);
        $this->cover_photo              = AU::get($data['cover_photo']);
        $this->keywords                 = AU::get($data['keywords']);
        $this->notes                    = AU::get($data['notes']);
        $this->pitch                    = AU::get($data['pitch']);
        $this->rejected_reason          = AU::get($data['rejected_reason']);
        $this->deliverable_deadline_days= AU::get($data['deliverable_deadline_days']);
        $this->apply_by                 = AU::get($data['apply_by']);
        $this->published_at             = AU::get($data['published_at']);
        $this->closed_at                = AU::get($data['closed_at']);
        $this->paused_at                = AU::get($data['paused_at']);
        $this->submitted_at             = AU::get($data['submitted_at']);
        $this->rejected_at              = AU::get($data['rejected_at']);
        $this->advertiser               = AU::get($data['advertiser']);
        $this->campaign                 = AU::get($data['campaign']);
        $this->product_line             = AU::get($data['product_line']);
        $this->deliverable_type         = AU::get($data['deliverable_type']);
        $this->compensation_models      = AU::get($data['compensation_models'], new ArrayCollection());
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object['id']                   = $this->getId();
        $object['name']                 = $this->getName();
        $object['cover_photo']          = $this->getCoverPhoto();
        $object['keywords']             = $this->getKeywords();
        $object['notes']                = $this->getPitch();
        $object['pitch']                = $this->getPitch();
        $object['rejected_reason']      = $this->getRejectedReason();
        $object['deliverable_deadline_days']    = $this->getDeliverableDeadlineDays();
        $object['apply_by']             = $this->getApplyBy();
        $object['published_at']         = $this->getPublishedAt();
        $object['closed_at']            = $this->getClosedAt();
        $object['paused_at']            = $this->getPausedAt();
        $object['submitted_at']         = $this->getSubmittedAt();
        $object['rejected_at']          = $this->getRejectedAt();
        $object['advertiser']           = $this->getAdvertiser()->jsonSerialize();
        $object['campaign']             = $this->getCampaign()->jsonSerialize();
        $object['product_line']         = $this->getProductLine()->jsonSerialize();
        $object['deliverable_type']     = $this->getDeliverableType()->jsonSerialize();

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
    public function getCoverPhoto()
    {
        return $this->cover_photo;
    }

    /**
     * @param null|string $cover_photo
     */
    public function setCoverPhoto($cover_photo)
    {
        $this->cover_photo = $cover_photo;
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
     * @return null|string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param null|string $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * @return null|string
     */
    public function getPitch()
    {
        return $this->pitch;
    }

    /**
     * @param null|string $pitch
     */
    public function setPitch($pitch)
    {
        $this->pitch = $pitch;
    }

    /**
     * @return null|string
     */
    public function getRejectedReason()
    {
        return $this->rejected_reason;
    }

    /**
     * @param null|string $rejected_reason
     */
    public function setRejectedReason($rejected_reason)
    {
        $this->rejected_reason = $rejected_reason;
    }

    /**
     * @return int
     */
    public function getDeliverableDeadlineDays()
    {
        return $this->deliverable_deadline_days;
    }

    /**
     * @param int $deliverable_deadline_days
     */
    public function setDeliverableDeadlineDays($deliverable_deadline_days)
    {
        $this->deliverable_deadline_days = $deliverable_deadline_days;
    }

    /**
     * @return \DateTime|null
     */
    public function getApplyBy()
    {
        return $this->apply_by;
    }

    /**
     * @param \DateTime|null $apply_by
     */
    public function setApplyBy($apply_by)
    {
        $this->apply_by = $apply_by;
    }

    /**
     * @return \DateTime|null
     */
    public function getPublishedAt()
    {
        return $this->published_at;
    }

    /**
     * @param \DateTime|null $published_at
     */
    public function setPublishedAt($published_at)
    {
        $this->published_at = $published_at;
    }

    /**
     * @return \DateTime|null
     */
    public function getClosedAt()
    {
        return $this->closed_at;
    }

    /**
     * @param \DateTime|null $closed_at
     */
    public function setClosedAt($closed_at)
    {
        $this->closed_at = $closed_at;
    }

    /**
     * @return \DateTime|null
     */
    public function getPausedAt()
    {
        return $this->paused_at;
    }

    /**
     * @param \DateTime|null $paused_at
     */
    public function setPausedAt($paused_at)
    {
        $this->paused_at = $paused_at;
    }

    /**
     * @return \DateTime|null
     */
    public function getSubmittedAt()
    {
        return $this->submitted_at;
    }

    /**
     * @param \DateTime|null $submitted_at
     */
    public function setSubmittedAt($submitted_at)
    {
        $this->submitted_at = $submitted_at;
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
     * @return Campaign
     */
    public function getCampaign()
    {
        return $this->campaign;
    }

    /**
     * @param Campaign $campaign
     */
    public function setCampaign($campaign)
    {
        $this->campaign = $campaign;
    }

    /**
     * @return ProductLine
     */
    public function getProductLine()
    {
        return $this->product_line;
    }

    /**
     * @param ProductLine $product_line
     */
    public function setProductLine($product_line)
    {
        $this->product_line = $product_line;
    }

    /**
     * @return DeliverableType
     */
    public function getDeliverableType()
    {
        return $this->deliverable_type;
    }

    /**
     * @param DeliverableType $deliverable_type
     */
    public function setDeliverableType($deliverable_type)
    {
        $this->deliverable_type = $deliverable_type;
    }

    /**
     * @return CompensationModel[]
     */
    public function getCompensationModels ()
    {
        return $this->compensation_models->toArray();
    }

    /**
     * @param CompensationModel $compensation_model
     */
    public function addCompensationModel (CompensationModel $compensation_model)
    {
        $compensation_model->setOpportunity($this);
        $this->compensation_models->add($compensation_model);
    }

}