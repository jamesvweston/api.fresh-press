<?php

namespace App\Models\Networks;


use App\Models\CMS\Influencer;
use jamesvweston\Utilities\ArrayUtil AS AU;

/**
 * @SWG\Definition()
 */
class FavoriteMerchant implements \JsonSerializable
{

    /**
     * @SWG\Property(example="1")
     * @var int
     */
    protected $id;

    /**
     * @var Influencer
     */
    protected $influencer;

    /**
     * @SWG\Property(example="100")
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