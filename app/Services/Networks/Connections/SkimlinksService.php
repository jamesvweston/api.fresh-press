<?php

namespace App\Services\Networks\Connections;


use App\Utilities\NetworkUtility;

class SkimlinksService extends BaseNetworkConnectionService
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
        return NetworkUtility::SKIMLINKS;
    }

    /**
     * @return string
     */
    public function getHelpLink()
    {
        return 'https://support.fmtc.co/solution/articles/221573-how-do-i-find-my-skimlinks-site-id-';
    }

    /**
     * @return string
     */
    public function getAffiliateIdRegex ()
    {
        return '/.+/';
    }



}