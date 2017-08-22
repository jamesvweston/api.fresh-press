<?php

namespace App\Utilities;

use App\Services\Networks\Connections\AffiliateFutureService;
use App\Services\Networks\Connections\AffiliateFutureUkService;
use App\Services\Networks\Connections\AffiliateWindowService;
use App\Services\Networks\Connections\AmazonService;
use App\Services\Networks\Connections\AsiaPacificDigitalService;
use App\Services\Networks\Connections\AvantLinkAUService;
use App\Services\Networks\Connections\AvantLinkCAService;
use App\Services\Networks\Connections\AvantLinkService;
use App\Services\Networks\Connections\BaseNetworkConnectionService;
use App\Services\Networks\Connections\ClixGaloreService;
use App\Services\Networks\Connections\CommissionJunctionService;
use App\Services\Networks\Connections\EbayPartnerNetworkService;
use App\Services\Networks\Connections\FreshPressService;
use App\Services\Networks\Connections\GrouponService;
use App\Services\Networks\Connections\ImpactRadiusService;
use App\Services\Networks\Connections\LinkConnectorService;
use App\Services\Networks\Connections\LinkShareService;
use App\Services\Networks\Connections\LsLeadAdvantageService;
use App\Services\Networks\Connections\OmnyverseService;
use App\Services\Networks\Connections\OneNetworkService;
use App\Services\Networks\Connections\PepperjamService;
use App\Services\Networks\Connections\PerformanceHorizonService;
use App\Services\Networks\Connections\RakutenService;
use App\Services\Networks\Connections\ShareASaleService;
use App\Services\Networks\Connections\SheIsMediaService;
use App\Services\Networks\Connections\ShopHerMediaService;
use App\Services\Networks\Connections\SkimlinksService;
use App\Services\Networks\Connections\TradeDoublerService;
use App\Services\Networks\Connections\WebgainsService;

class NetworkConnectionFactory
{

    /**
     * @param   int $network_id
     * @return  BaseNetworkConnectionService
     */
    public static function get ($network_id)
    {
        switch ($network_id)
        {
            case NetworkUtility::COMMISSION_JUNCTION:
                return new CommissionJunctionService();
                break;
            case NetworkUtility::RAKUTEN_LINKSHARE:
                return new LinkShareService();
                break;
            case NetworkUtility::SHARE_A_SALE:
                return new ShareASaleService();
                break;
            case NetworkUtility::PEPPER_JAM:
                return new PepperjamService();
                break;
            case NetworkUtility::IMPACT_RADIUS:
                return new ImpactRadiusService();
                break;
            case NetworkUtility::AVANT_LINK:
                return new AvantLinkService();
                break;
            case NetworkUtility::AVANT_LINK_CA:
                return new AvantLinkCAService();
                break;
            case NetworkUtility::AVANT_LINK_AU:
                return new AvantLinkAUService();
                break;
            case NetworkUtility::LINK_CONNECTOR:
                return new LinkConnectorService();
                break;
            case NetworkUtility::AFFILIATE_WINDOW:
                return new AffiliateWindowService();
                break;
            case NetworkUtility::AMAZON:
                return new AmazonService();
                break;
            case NetworkUtility::TRADE_DOUBLER:
                return new TradeDoublerService();
                break;
            case NetworkUtility::ONE_NETWORK:
                return new OneNetworkService();
                break;
            case NetworkUtility::AFFILIATE_FUTURE:
                return new AffiliateFutureService();
                break;
            case NetworkUtility::EBAY_PARTNER_NETWORK:
                return new EbayPartnerNetworkService();
                break;
            case NetworkUtility::SHOP_HER_MEDIA:
                return new ShopHerMediaService();
                break;
            case NetworkUtility::LS_LEAD_ADVANTAGE:
                return new LsLeadAdvantageService();
                break;
            case NetworkUtility::CLIX_GALORE:
                return new ClixGaloreService();
                break;
            case NetworkUtility::PERFORMANCE_HORIZON:
                return new PerformanceHorizonService();
                break;
            case NetworkUtility::GROUPON:
                return new GrouponService();
                break;
            case NetworkUtility::ASIA_PACIFIC_DIGITAL:
                return new AsiaPacificDigitalService();
                break;
            case NetworkUtility::SHE_IS_MEDIA:
                return new SheIsMediaService();
                break;
            case NetworkUtility::OMNYVERSE:
                return new OmnyverseService();
                break;
            case NetworkUtility::AFFILIATE_FUTURE_UK:
                return new AffiliateFutureUkService();
                break;
            case NetworkUtility::WEBGAINS:
                return new WebgainsService();
                break;
            case NetworkUtility::RAKUTEN:
                return new RakutenService();
                break;
            case NetworkUtility::FRESH_PRESS:
                return new FreshPressService();
                break;
            case NetworkUtility::SKIMLINKS:
                return new SkimlinksService();
                break;
        }
    }
}