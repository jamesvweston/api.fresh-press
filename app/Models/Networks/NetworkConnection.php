<?php

namespace App\Models\Networks;


use App\Models\CMS\Influencer;
use App\Models\Traits\TimeStamps;
use Doctrine\Common\Collections\ArrayCollection;
use jamesvweston\Utilities\ArrayUtil AS AU;

class NetworkConnection implements \JsonSerializable
{

    use TimeStamps;


    /**
     * @var int
     */
    protected $id;

    /**
     * @var string|null
     */
    protected $affiliate_id;

    /**
     * @var int|null
     */
    protected $publisher_id;

    /**
     * @var bool
     */
    protected $is_sync;

    /**
     * @var Network
     */
    protected $network;

    /**
     * @var Influencer
     */
    protected $influencer;

    /**
     * @var \DateTime|null
     */
    protected $sync_failed_at;

    /**
     * @var string|null
     */
    protected $sync_failed_message;

    /**
     * @var ArrayCollection
     */
    protected $fields;

    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->affiliate_id             = AU::get($data['affiliate_id']);
        $this->publisher_id             = AU::get($data['publisher_id']);
        $this->is_sync                  = AU::get($data['is_sync'], false);
        $this->network                  = AU::get($data['network']);
        $this->influencer               = AU::get($data['influencer']);
        $this->sync_failed_at           = AU::get($data['sync_failed_at']);
        $this->sync_failed_message      = AU::get($data['sync_failed_message']);
        $this->fields                   = AU::get($data['fields'], new ArrayCollection());
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object['id']                   = $this->getId();
        $object['affiliate_id']         = $this->getAffiliateId();
        $object['publisher_id']         = $this->getPublisherId();
        $object['is_sync']              = $this->getIsSync();
        $object['network']              = $this->getNetwork()->jsonSerialize();
        $object['influencer']           = $this->getInfluencer()->jsonSerialize();

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
     * @return null|string
     */
    public function getAffiliateId()
    {
        return $this->affiliate_id;
    }

    /**
     * @param null|string $affiliate_id
     */
    public function setAffiliateId($affiliate_id)
    {
        $this->affiliate_id = $affiliate_id;
    }

    /**
     * @return int|null
     */
    public function getPublisherId()
    {
        return $this->publisher_id;
    }

    /**
     * @param int|null $publisher_id
     */
    public function setPublisherId($publisher_id)
    {
        $this->publisher_id = $publisher_id;
    }

    /**
     * @return bool
     */
    public function getIsSync()
    {
        return $this->is_sync;
    }

    /**
     * @param bool $is_sync
     */
    public function setIsSync($is_sync)
    {
        $this->is_sync = $is_sync;
    }

    /**
     * @return Network
     */
    public function getNetwork()
    {
        return $this->network;
    }

    /**
     * @param Network $network
     */
    public function setNetwork($network)
    {
        $this->network = $network;
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
     * @return \DateTime|null
     */
    public function getSyncFailedAt()
    {
        return $this->sync_failed_at;
    }

    /**
     * @param \DateTime|null $sync_failed_at
     */
    public function setSyncFailedAt($sync_failed_at)
    {
        $this->sync_failed_at = $sync_failed_at;
    }

    /**
     * @return null|string
     */
    public function getSyncFailedMessage()
    {
        return $this->sync_failed_message;
    }

    /**
     * @param null|string $sync_failed_message
     */
    public function setSyncFailedMessage($sync_failed_message)
    {
        $this->sync_failed_message = $sync_failed_message;
    }

    /**
     * @return NetworkConnectionField[]
     */
    public function getFields()
    {
        return $this->fields->toArray();
    }

    /**
     * @param NetworkConnectionField $field
     */
    public function addField ($field)
    {
        $field->setNetworkConnection($this);
        $this->fields->add($field);
    }

}