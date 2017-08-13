<?php

namespace App\Models\CMS;


use App\Models\Contracts\Validatable;
use App\Models\Locations\Address;
use App\Models\Market\Sphere;
use App\Models\Networks\FavoriteMerchant;
use App\Models\Networks\NetworkConnection;
use Doctrine\Common\Collections\ArrayCollection;
use jamesvweston\Utilities\ArrayUtil AS AU;

class Influencer extends User implements \JsonSerializable, Validatable
{

    /**
     * @var Address|null
     */
    protected $billing_address;

    /**
     * @var ArrayCollection
     */
    protected $network_connections;

    /**
     * @var ArrayCollection
     */
    protected $spheres;

    /**
     * @var ArrayCollection
     */
    protected $favorite_merchants;

    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        parent::__construct($data);

        $this->billing_address          = AU::get($data['billing_address']);
        $this->favorite_merchants       = AU::get($data['favorite_merchants'], new ArrayCollection());
        $this->network_connections      = AU::get($data['network_connections'], new ArrayCollection());
        $this->spheres                  = AU::get($data['spheres'], new ArrayCollection());
    }

    public function validate()
    {
        parent::validate();
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object                         = parent::jsonSerialize();

        return $object;
    }

    /**
     * @return Address|null
     */
    public function getBillingAddress()
    {
        return $this->billing_address;
    }

    /**
     * @param Address|null $billing_address
     */
    public function setBillingAddress($billing_address)
    {
        $this->billing_address = $billing_address;
    }

    /**
     * @return FavoriteMerchant[]
     */
    public function getFavoriteMerchants ()
    {
        return $this->favorite_merchants->toArray();
    }

    /**
     * @param FavoriteMerchant $favorite_merchant
     */
    public function addFavoriteMerchant (FavoriteMerchant $favorite_merchant)
    {
        $favorite_merchant->setInfluencer($this);
        $this->favorite_merchants->add($favorite_merchant);
    }

    /**
     * @return NetworkConnection[]
     */
    public function getNetworkConnections()
    {
        return $this->network_connections->toArray();
    }

    /**
     * @param NetworkConnection $network_connection
     */
    public function addNetworkConnections($network_connection)
    {
        $network_connection->setInfluencer($this);
        $this->network_connections->add($network_connection);
    }

    /**
     * @return Sphere[]
     */
    public function getSpheres ()
    {
        return $this->spheres->toArray();
    }

    /**
     * @param Sphere $sphere
     */
    public function addSphere (Sphere $sphere)
    {
        $sphere->setInfluencer($this);
        $this->spheres->add($sphere);
    }

}