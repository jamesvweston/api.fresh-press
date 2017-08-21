<?php

namespace App\Models\Market;


use jamesvweston\Utilities\ArrayUtil AS AU;

class PlacementCompensation extends CompensationModel
{

    /**
     * @var bool|null
     */
    protected $is_negotiable;

    /**
     * @var float|null
     */
    protected $suggested_rate;


    public function __construct($data = [])
    {
        parent::__construct($data);

        $this->is_negotiable            = AU::get($data['is_negotiable']);
        $this->suggested_rate           = AU::get($data['suggested_rate']);
    }

    /**
     * @return array
     */
    public function toArray ()
    {
        $object                         = parent::toArray();
        $object['is_negotiable']        = $this->getIsNegotiable();
        $object['suggested_rate']       = $this->getSuggestedRate();

        return $object;
    }

    /**
     * @return bool|null
     */
    public function getIsNegotiable()
    {
        return $this->is_negotiable;
    }

    /**
     * @param bool|null $is_negotiable
     */
    public function setIsNegotiable($is_negotiable)
    {
        $this->is_negotiable = $is_negotiable;
    }

    /**
     * @return float|null
     */
    public function getSuggestedRate()
    {
        return $this->suggested_rate;
    }

    /**
     * @param float|null $suggested_rate
     */
    public function setSuggestedRate($suggested_rate)
    {
        $this->suggested_rate = $suggested_rate;
    }

    /**
     * @return string
     */
    public function getType ()
    {
        return 'PlacementCompensation';
    }

}