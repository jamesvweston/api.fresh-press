<?php

namespace App\Services\Networks\Connections;


use App\Utilities\NetworkUtility;

class RakutenService extends BaseNetworkConnectionService
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return int
     */
    public function getNetworkId ()
    {
        return NetworkUtility::RAKUTEN;
    }

    /**
     * @return string
     */
    public function getHelpLink()
    {
        return '';
    }

    /**
     * @return string
     */
    public function getAffiliateIdRegex ()
    {
        return '/^\d+$/';
    }



}