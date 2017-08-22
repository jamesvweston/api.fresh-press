<?php

namespace App\Services\Networks\Connections;


use App\Utilities\NetworkUtility;

class ClixGaloreService extends BaseNetworkConnectionService
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
        return NetworkUtility::CLIX_GALORE;
    }

    /**
     * @return string
     */
    public function getHelpLink()
    {
        return 'http://support.fmtc.co/solution/articles/221675-network-setup-clixgalore';
    }

    /**
     * @return string
     */
    public function getAffiliateIdRegex ()
    {
        return '/^[\w\@\.]+$/';
    }



}