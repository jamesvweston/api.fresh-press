<?php

namespace App\Models\Networks;


use App\Models\CMS\Influencer;
use jamesvweston\Utilities\ArrayUtil AS AU;

class FavoriteMerchant implements \JsonSerializable
{

    /**
     * @var int
     */
    protected $id;

    /**
     * @var Influencer
     */
    protected $influencer;

    /**
     * @var int
     */
    protected $fmtc_master_merchant_id;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->influencer               = AU::get($data['influencer']);
        $this->fmtc_master_merchant_id  = AU::get($data['fmtc_master_merchant_id']);
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object['id']                   = $this->getId();
        $object['fmtc_master_merchant_id']  = $this->getFmtcMasterMerchantId();

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
     * @return int
     */
    public function getFmtcMasterMerchantId()
    {
        return $this->fmtc_master_merchant_id;
    }

    /**
     * @param int $fmtc_master_merchant_id
     */
    public function setFmtcMasterMerchantId($fmtc_master_merchant_id)
    {
        $this->fmtc_master_merchant_id = $fmtc_master_merchant_id;
    }

}