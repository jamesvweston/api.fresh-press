<?php

namespace App\Models\Locations;


use App\Models\Contracts\Validatable;
use App\Models\Traits\TimeStamps;
use jamesvweston\Utilities\ArrayUtil AS AU;

/**
 * @SWG\Definition()
 */
class Address implements \JsonSerializable, Validatable
{

    use TimeStamps;


    /**
     * @SWG\Property()
     * @var int
     */
    protected $id;

    /**
     * @SWG\Property()
     * @var string
     */
    protected $street1;

    /**
     * @SWG\Property()
     * @var string|null
     */
    protected $street2;

    /**
     * @SWG\Property()
     * @var string
     */
    protected $city;

    /**
     * @SWG\Property()
     * @var string
     */
    protected $postal_code;

    /**
     * @SWG\Property()
     * @var string|null
     */
    protected $phone;

    /**
     * @SWG\Property()
     * @var string
     */
    protected $state_province;

    /**
     * @SWG\Property()
     * @var Country
     */
    protected $country;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->created_at               = new \DateTime();
        $this->updated_at               = new \DateTime();
        $this->street1                  = AU::get($data['street1']);
        $this->street2                  = AU::get($data['street2']);
        $this->city                     = AU::get($data['city']);
        $this->postal_code              = AU::get($data['postal_code']);
        $this->phone                    = AU::get($data['phone']);
        $this->state_province           = AU::get($data['state_province']);
        $this->country                  = AU::get($data['country']);
    }

    public function validate()
    {

    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object['id']                   = $this->getId();
        $object['street1']              = $this->getStreet1();
        $object['street2']              = $this->getStreet2();
        $object['city']                 = $this->getCity();
        $object['postal_code']          = $this->getPostalCode();
        $object['phone']                = $this->getPhone();
        $object['state_province']       = $this->getStateProvince();
        $object['country']              = $this->getCountry()->jsonSerialize();

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
    public function getStreet1()
    {
        return $this->street1;
    }

    /**
     * @param string $street1
     */
    public function setStreet1($street1)
    {
        $this->street1 = $street1;
    }

    /**
     * @return null|string
     */
    public function getStreet2()
    {
        return $this->street2;
    }

    /**
     * @param null|string $street2
     */
    public function setStreet2($street2)
    {
        $this->street2 = $street2;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postal_code;
    }

    /**
     * @param string $postal_code
     */
    public function setPostalCode($postal_code)
    {
        $this->postal_code = $postal_code;
    }

    /**
     * @return null|string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param null|string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getStateProvince()
    {
        return $this->state_province;
    }

    /**
     * @param string $state_province
     */
    public function setStateProvince($state_province)
    {
        $this->state_province = $state_province;
    }

    /**
     * @return Country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param Country $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

}