<?php

namespace App\Models\Networks;


use App\Models\CMS\Influencer;
use App\Models\Traits\DBTransactions;
use Illuminate\Database\Eloquent\Model;
use jamesvweston\Utilities\ArrayUtil AS AU;


class FavoriteMerchant extends Model
{

    use DBTransactions;


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
    public function toArray()
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