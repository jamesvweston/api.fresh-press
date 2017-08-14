<?php

namespace App\Models\Outlets;


use App\Models\CMS\Influencer;
use App\Models\Traits\Deletable;
use App\Models\Traits\TimeStamps;
use jamesvweston\Utilities\ArrayUtil AS AU;

class OutletConnection implements \JsonSerializable
{

    use TimeStamps, Deletable;


    /**
     * @var int
     */
    protected $id;

    /**
     * @var string|null
     */
    protected $url;

    /**
     * @var Outlet
     */
    protected $outlet;

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
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->url                      = AU::get($data['url']);
        $this->outlet                   = AU::get($data['outlet']);
        $this->influencer               = AU::get($data['influencer']);
        $this->sync_failed_at           = AU::get($data['sync_failed_at']);
        $this->sync_failed_message      = AU::get($data['sync_failed_message']);
    }

    /**
     * @return array
     */
    public function jsonSerialize ()
    {
        $object['id']                   = $this->getId();
        $object['url']                  = $this->getUrl();
        $object['outlet']               = $this->getOutlet()->jsonSerialize();
        $object['sync_failed_at']       = $this->getSyncFailedAt();
        $object['sync_failed_message']  = $this->getSyncFailedMessage();

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
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param null|string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return Outlet
     */
    public function getOutlet()
    {
        return $this->outlet;
    }

    /**
     * @param Outlet $outlet
     */
    public function setOutlet($outlet)
    {
        $this->outlet = $outlet;
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

}