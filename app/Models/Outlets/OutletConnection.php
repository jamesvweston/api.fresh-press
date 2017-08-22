<?php

namespace App\Models\Outlets;


use App\Models\Market\Sphere;
use App\Models\Traits\DBTransactions;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use jamesvweston\Utilities\ArrayUtil AS AU;

class OutletConnection extends Model
{

    use HasTimestamps, SoftDeletes, DBTransactions;


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
     * @var Sphere
     */
    protected $sphere;

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
        $this->sphere                   = AU::get($data['sphere']);
        $this->sync_failed_at           = AU::get($data['sync_failed_at']);
        $this->sync_failed_message      = AU::get($data['sync_failed_message']);
    }

    /**
     * @return array
     */
    public function toArray ()
    {
        $object['id']                   = $this->getId();
        $object['url']                  = $this->getUrl();
        $object['outlet']               = $this->getOutlet()->toArray();
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
     * @return Sphere
     */
    public function getSphere()
    {
        return $this->sphere;
    }

    /**
     * @param Sphere $sphere
     */
    public function setSphere($sphere)
    {
        $this->sphere = $sphere;
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