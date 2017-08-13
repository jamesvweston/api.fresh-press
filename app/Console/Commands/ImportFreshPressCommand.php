<?php

namespace App\Console\Commands;


use App\Models\CMS\Advertiser;
use App\Models\CMS\Influencer;
use App\Models\Locations\Address;
use App\Models\Locations\Country;
use App\Models\Market\AffiliateLink;
use App\Models\Market\AgeRange;
use App\Models\Market\Campaign;
use App\Models\Market\CommissionCompensation;
use App\Models\Market\PlacementCompensation;
use App\Models\Market\Portfolio;
use App\Models\Market\ProductCompensation;
use App\Models\Market\ProductLine;
use App\Models\Market\Sphere;
use App\Models\Networks\FavoriteMerchant;
use App\Models\Networks\NetworkConnection;
use App\Repositories\CMS\AdvertiserRepository;
use App\Repositories\CMS\InfluencerRepository;
use App\Repositories\CMS\RoleRepository;
use App\Repositories\Locations\CountryRepository;
use App\Repositories\Market\AgeRangeRepository;
use App\Repositories\Market\OpportunityRepository;
use App\Repositories\Market\PlatformRepository;
use App\Repositories\Market\PortfolioTypeRepository;
use App\Repositories\Market\ProductLineRepository;
use App\Repositories\Market\SphereCategoryRepository;
use App\Repositories\Market\SphereRepository;
use Illuminate\Console\Command;
use DB;
use EntityManager;

class ImportFreshPressCommand extends Command
{

    /**
     * @var int
     */
    private $FRESH_PRESS_USER_ID        = 7;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fp:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Fresh Press';

    /**
     * @var AdvertiserRepository
     */
    private $advertiser_repo;

    /**
     * @var CountryRepository
     */
    private $country_repo;

    /**
     * @var InfluencerRepository
     */
    private $influencer_repo;

    /**
     * @var RoleRepository
     */
    private $role_repo;

    /**
     * @var OpportunityRepository
     */
    private $opportunity_repo;

    /**
     * @var PortfolioTypeRepository
     */
    private $portfolio_type_repo;

    /**
     * @var string
     */
    private $ignored_advertiser_ids = '192';



    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(AdvertiserRepository $advertiser_repo, CountryRepository $country_repo, InfluencerRepository $influencer_repo, RoleRepository $role_repo,
                           OpportunityRepository $opportunity_repo, PortfolioTypeRepository $portfolio_type_repo)
    {
        $this->advertiser_repo          = $advertiser_repo;
        $this->country_repo             = $country_repo;
        $this->influencer_repo          = $influencer_repo;
        $this->role_repo                = $role_repo;
        $this->opportunity_repo         = $opportunity_repo;
        $this->portfolio_type_repo      = $portfolio_type_repo;

        $this->call('migrate:refresh', [
            '--seed' => 1
        ]);
        $this->handleInitialActions();
        $this->importUsers();
        $this->importUsersAdminRole();
        $this->importAdvertisers();
        $this->importInfluencers();
        $this->importInfluencerBilling();
        $this->importInfluencerFavorites();
        $this->importCampaigns();
        $this->importSpheres();
        $this->importSphereCategories();
        $this->importPortfolios();
        $this->importProductLines();
        $this->insertProductLinePlatforms();
        $this->importOpportunities();
        $this->importOpportunityCompensationModels();
        $this->importNetworkConnections();
    }

    private function handleInitialActions ()
    {
        //   If the fresh press user does not have the influencer role give it to them
        $fp_user_roles = $fp_users_group_result = DB::connection('fresh_press')->select('select * from users_groups where user_group_id = 1 AND user_id = ' . $this->FRESH_PRESS_USER_ID);
        if (empty($fp_user_roles))
        {
            $this->info('The fresh press user does not have the influencer group. Giving it to them');
            $now                = new \Carbon\Carbon();
            $now->format('Y-m-d h:m:s');
            DB::connection('fresh_press')->table('users_groups')->insert(
                [
                    'user_id'           => $this->FRESH_PRESS_USER_ID,
                    'user_group_id'     => 1,
                    'created_at'        => $now,
                    'updated_at'        => $now,
                ]
            );
        }
        else
        {
            $this->info('The fresh press user already has the influencer role.');
        }
    }

    private function importUsers ()
    {
        $this->info('Importing users...');

        $user_data                      = [];
        $fp_users_result                = DB::connection('fresh_press')->select('select * from users order by id asc');
        foreach ($fp_users_result AS $fp_user)
        {
            $user_data[]                = [
                'id'                    => $fp_user->id,
                'email'                 => $fp_user->email,
                'first_name'            => $fp_user->first_name,
                'last_name'             => $fp_user->last_name,
                'password'              => $fp_user->password,
                'email_is_verified'     => $fp_user->verified,
                'created_at'            => $fp_user->created_at,
                'updated_at'            => $fp_user->updated_at,
                'deleted_at'            => $fp_user->deleted_at,
            ];
        }

        DB::table('users')->insert($user_data);

        $this->info('Finished importing users...');
    }

    private function importUsersAdminRole ()
    {
        $this->info('Importing user admin role...');

        $admin_role_data                = [];
        $fp_admin_users_result          = DB::connection('fresh_press')->select('select user_id from users_groups where user_group_id = 3 GROUP BY user_id');
        foreach ($fp_admin_users_result AS $fp_admin_user)
        {
            $admin_role_data[]          = [
                'user_id'               => $fp_admin_user->user_id,
                'role_id'               => 1,
            ];
        }
        DB::table('user_roles')->insert($admin_role_data);

        $this->info('Finished importing user admin role...');
    }

    private function importAdvertisers ()
    {
        $this->info('Importing advertisers...');

        $advertiser_data                = [];
        $fp_advertisers                 = DB::connection('fresh_press')->select('select * from advertisers where id NOT IN (' . $this->ignored_advertiser_ids . ') order by id asc');
        foreach ($fp_advertisers AS $fp_advertiser)
        {

            $fp_advertiser_users        = DB::connection('fresh_press')->select('select * from advertisers_users where advertiser_id = ' . $fp_advertiser->id);

            if (sizeof($fp_advertiser_users) != 1)
            {
                dd($fp_advertiser_users);
            }
            $fp_advertiser_users        = $fp_advertiser_users[0];
            $fp_user                    = DB::connection('fresh_press')->select('select * from users where id = ' . $fp_advertiser_users->user_id);
            if (empty($fp_user))
            {
                $this->info('advertisers_users.user_id of ' . $fp_advertiser_users->user_id . ' does not exist in users table');
                continue;
            }
            $fp_user                    = $fp_user[0];

            $advertiser_data[]          = [
                'id'                    => $fp_advertiser->id,
                'name'                  => trim($fp_advertiser->name) == '' ? null : $fp_advertiser->name,
                'user_id'               => $fp_user->id,
                'created_at'            => $fp_advertiser->created_at,
                'updated_at'            => $fp_advertiser->updated_at,
                'deleted_at'            => $fp_advertiser->deleted_at,
            ];
        }
        DB::table('advertisers')->insert($advertiser_data);

        $this->info('Finished Importing Advertisers...');
    }

    private function importInfluencers ()
    {
        $this->info('Importing influencers...');

        $influencer_data                = [];
        $fp_influencers                 = DB::connection('fresh_press')->select('select u.* from users u JOIN users_groups ug ON ug.user_id = u.id WHERE ug.user_group_id = 1 order by u.id asc');
        foreach ($fp_influencers AS $fp_user)
        {
            $influencer_data[]          = [
                'id'                    => $fp_user->id,
                'user_id'               => $fp_user->id,
                'created_at'            => $fp_user->created_at,
                'updated_at'            => $fp_user->updated_at,
                'deleted_at'            => $fp_user->deleted_at,
            ];
        }
        DB::table('influencers')->insert($influencer_data);

        $this->info('Finished importing influencers...');
    }

    private function importInfluencerBilling ()
    {
        $this->info('Importing influencer billing data...');

        $fp_influencers                 = DB::connection('fresh_press')->select('select u.* from users u JOIN users_groups ug ON ug.user_id = u.id WHERE ug.user_group_id = 1 order by u.id asc');
        foreach ($fp_influencers AS $fp_user)
        {
            $influencer                 = $this->influencer_repo->find($fp_user->id);

            if (is_null($fp_user->billing_address))
            {
                //  This means the entire address is null. Leave it as null.
                //  Printing this line proves that if billing_address is null the entire address is null
                //  echo $fp_user->billing_address . ' ' . $fp_user->billing_address_line_2 . ' ' . $fp_user->billing_city . ' ' . $fp_user->billing_state . ' ' . $fp_user->billing_zip . ' ' . $fp_user->billing_country . PHP_EOL;
            }
            else
            {
                $billing_address            = new Address();
                $billing_address->setStreet1($fp_user->billing_address);
                if (trim($fp_user->billing_address_line_2) == '')
                    $billing_address->setStreet2(null);
                else
                    $billing_address->setStreet2($fp_user->billing_address_line_2);

                $billing_address->setCity($fp_user->billing_city);
                $billing_address->setStateProvince($fp_user->billing_state);
                $billing_address->setPostalCode($fp_user->billing_zip);

                $country                    = $this->country_repo->getOneByCode($fp_user->billing_country);
                if (is_null($country))
                    $country                = $this->country_repo->getUS();
                $billing_address->setCountry($country);
                $influencer->setBillingAddress($billing_address);
            }

            $this->influencer_repo->save($influencer);
        }
        $this->influencer_repo->commit();

        $this->info('Finished importing influencer billing data...');
    }

    private function importInfluencerFavorites ()
    {
        //   TODO: Find out if influencers should be the only ones that have favorite_merchants
        $this->info('Importing favorite_merchants...');

        $favorite_merchant_data     = [];
        $fp_favorites_result        = DB::connection('fresh_press')->select('select f.* from favorites f JOIN users_groups ug ON ug.user_id = f.user_id WHERE ug.user_group_id = 1 order by f.id asc');
        foreach ($fp_favorites_result AS $fp_favorite)
        {
            $favorite_merchant_data[]   = [
                'id'                => $fp_favorite->id,
                'fmtc_master_merchant_id'   => $fp_favorite->fmtc_master_merchant_id,
                'influencer_id'     => $fp_favorite->user_id,
            ];
        }
        DB::table('favorite_merchants')->insert($favorite_merchant_data);

        $this->info('Finished importing favorite_merchants...');
    }

    private function importNetworkConnections ()
    {
        $this->info('Importing network_connections...');
        $network_connection_data        = [];
        $fp_network_connections_result  = DB::connection('fresh_press')->select('select * from network_connections');
        foreach ($fp_network_connections_result AS $fp_network_connection)
        {
            $network_connection_data[]  = [
                'id'                    => $fp_network_connection->id,
                'affiliate_id'          => trim($fp_network_connection->affiliate_id) == null ? null : $fp_network_connection->affiliate_id,
                'publisher_id'          => $fp_network_connection->publisher_id,
                'is_sync'               => $fp_network_connection->is_sync,
                'network_id'            => $fp_network_connection->network_id,
                'influencer_id'         => $fp_network_connection->user_id,
                'sync_failed_at'        => $fp_network_connection->sync_failed_at,
                'sync_failed_message'   => trim($fp_network_connection->sync_failed_message) == '' ? null : $fp_network_connection->sync_failed_message,
                'created_at'            => $fp_network_connection->created_at,
                'updated_at'            => $fp_network_connection->updated_at,
            ];
        }
        DB::table('network_connections')->insert($network_connection_data);

        $this->info('Finished importing network_connections...');
    }

    private function importSpheres ()
    {
        $this->info('Importing spheres....');

        $sphere_data                            = [];
        $fp_spheres_result                      = DB::connection('fresh_press')->select('select * from spheres order by id asc');
        foreach ($fp_spheres_result AS $fp_sphere)
        {
            $fp_sphere_owner_result             = DB::connection('fresh_press')->select('select DISTINCT user_id from spheres_users where sphere_id = ' . $fp_sphere->id)[0];
            $country_id                         = null;
            if ($fp_sphere->country_id != null)
            {
                $country                        = $this->getCountry($fp_sphere->country_id);
                $country_id                     = $country->getId();
            }
            $sphere_data[]                      = [
                'id'                            => $fp_sphere->id,
                'title'                         => $fp_sphere->title,
                'description'                   => $fp_sphere->description,
                'percent_male'                  => $fp_sphere->percent_male,
                'percent_female'                => $fp_sphere->percent_female,
                'logo'                          => $fp_sphere->logo,
                'influencer_id'                 => $fp_sphere_owner_result->user_id,
                'age_range_id'                  => $fp_sphere->age_range_id == 0 ? null : $fp_sphere->age_range_id,
                'country_id'                    => $country_id,
                'created_at'                    => $fp_sphere->created_at,
                'updated_at'                    => $fp_sphere->updated_at,
                'deleted_at'                    => $fp_sphere->deleted_at,
            ];
        }

        DB::table('spheres')->insert($sphere_data);

        $this->info('Finished importing spheres....');
    }

    private function importSphereCategories ()
    {
        $this->info('Importing spheres_categories....');

        $sphere_categories              = [];
        $fp_sphere_categories           = DB::connection('fresh_press')->select('select * from spheres_categories');
        foreach ($fp_sphere_categories AS $fp_sphere_category)
        {
            $sphere_categories[]        = [
                'sphere_id'             => $fp_sphere_category->sphere_id,
                'sphere_category_id'    => $fp_sphere_category->category_id,
            ];
        }
        DB::table('spheres_categories')->insert($sphere_categories);

        $this->info('Finished importing spheres_categories....');
    }

    private function importPortfolios ()
    {
        $this->info('Importing portfolios....');

        $portfolios                     = [];
        $fp_portfolio_items_result      = DB::connection('fresh_press')->select('select * from portfolio_items');
        foreach ($fp_portfolio_items_result AS $fp_portfolio_item)
        {
            $type                       = $fp_portfolio_item->type;
            if ($type == 'Youtube channel')
                $type = 'Youtube Channel';
            $portfolio_type             = $this->portfolio_type_repo->getOneByName($type);

            $portfolios[]               = [
                'id'                    => $fp_portfolio_item->id,
                'description'           => $fp_portfolio_item->description,
                'url'                   => $fp_portfolio_item->url,
                'is_unverified_outlet'  => $fp_portfolio_item->is_unverified_outlet,
                'created_at'            => $fp_portfolio_item->created_at,
                'updated_at'            => $fp_portfolio_item->updated_at,
                'portfolio_type_id'     => $portfolio_type->getId(),
                'sphere_id'             => $fp_portfolio_item->sphere_id,
            ];
        }
        DB::table('portfolios')->insert($portfolios);

        $this->info('Finished importing portfolios....');
    }


    private function importCampaigns ()
    {
        $this->info('Importing campaigns....');

        $campaign_data                      = [];
        $fp_campaigns_result                = DB::connection('fresh_press')->select('select * from campaigns order by id asc');
        foreach ($fp_campaigns_result AS $fp_campaign)
        {
            $fp_advertiser_id               = DB::connection('fresh_press')->select('select advertiser_id from product_lines where id = ' . $fp_campaign->product_line_id);
            $fp_advertiser_id               = $fp_advertiser_id[0]->advertiser_id;

            $campaign_data[]                = [
                'id'                        => $fp_campaign->id,
                'name'                      => $fp_campaign->name,
                'description'               => $fp_campaign->description == '' || $fp_campaign->description == null ? null : $fp_campaign->description,
                'advertiser_id'             => $fp_advertiser_id,
                'created_at'                => $fp_campaign->created_at,
                'updated_at'                => $fp_campaign->updated_at,
                'deleted_at'                => $fp_campaign->deleted_at,
            ];
        }
        DB::table('campaigns')->insert($campaign_data);

        $this->info('Finished importing campaigns....');
    }

    private function importProductLines ()
    {
        $this->info('Importing product_lines....');

        $productLinesWithNoAdvertiser       = $this->getProductLinesWithNoAdvertiser();
        $this->info('product_lines ids ' . $productLinesWithNoAdvertiser . ' have no advertiser');

        $product_line_data                  = [];
        $fp_product_lines_result            = DB::connection('fresh_press')->select('select * from product_lines where id NOT IN (' . $productLinesWithNoAdvertiser . ') order by id asc');
        foreach ($fp_product_lines_result AS $fp_product_line)
        {
            $product_line_data[]            = [
                'id'                        => $fp_product_line->id,
                'name'                      => $fp_product_line->name,
                'description'               => is_null($fp_product_line->about) || trim($fp_product_line->about) == '' ? null : $fp_product_line->about,
                'alias'                     => is_null($fp_product_line->aka) || trim($fp_product_line->aka) == '' ? null : $fp_product_line->aka,
                'logo'                      => $fp_product_line->logo,
                'website'                   => is_null($fp_product_line->website) || trim($fp_product_line->website) == '' ? null : $fp_product_line->website,
                'facebook'                  => is_null($fp_product_line->facebook) || trim($fp_product_line->facebook) == '' ? null : $fp_product_line->facebook,
                'twitter'                   => is_null($fp_product_line->twitter) || trim($fp_product_line->twitter) == '' ? null : $fp_product_line->twitter,
                'instagram'                 => is_null($fp_product_line->instagram) || trim($fp_product_line->instagram) == '' ? null : $fp_product_line->instagram,
                'news_url'                  => is_null($fp_product_line->news_url) || trim($fp_product_line->news_url) == '' ? null : $fp_product_line->news_url,
                'keywords'                  => is_null($fp_product_line->keywords) || trim($fp_product_line->keywords) == '' ? null : $fp_product_line->keywords,
                'advertiser_id'             => $fp_product_line->advertiser_id,
                'created_at'                => $fp_product_line->created_at,
                'updated_at'                => $fp_product_line->updated_at,
                'deleted_at'                => $fp_product_line->deleted_at,
            ];

        }
        DB::table('product_lines')->insert($product_line_data);
        $this->info('Finished importing product_lines....');
    }

    private function insertProductLinePlatforms ()
    {
        $this->info('Importing product_lines_platforms....');

        $product_line_platforms             = [];
        $fp_product_line_platforms_result   = DB::connection('fresh_press')->select('select * from product_lines_platforms');
        foreach ($fp_product_line_platforms_result AS $fp_product_line_platform)
        {
            $product_line_platforms[]       = [
                'product_line_id'   => $fp_product_line_platform->product_line_id,
                'platform_id'       => $fp_product_line_platform->platform_id,
            ];
        }
        DB::table('product_line_platforms')->insert($product_line_platforms);

        $this->info('Finished importing product_lines_platforms....');
    }

    private function importOpportunities ()
    {
        $this->info('Importing opportunities....');

        $opportunity_data               = [];
        $fp_opportunities_result        = DB::connection('fresh_press')->select('select * from opportunities');
        foreach ($fp_opportunities_result AS $fp_opportunity)
        {
            $fp_campaign                = DB::connection('fresh_press')->select('select * from campaigns where id = ' . $fp_opportunity->campaign_id)[0];
            $fp_product_line            = DB::connection('fresh_press')->select('select * from product_lines where id = ' . $fp_campaign->product_line_id)[0];


            $opportunity_data[]         = [
                'id'                    => $fp_opportunity->id,
                'name'                  => $fp_opportunity->title,
                'cover_photo'           => trim($fp_opportunity->cover_photo) == '' ? null : $fp_opportunity->cover_photo,
                'keywords'              => trim($fp_opportunity->keywords) == '' ? null : $fp_opportunity->keywords,
                'notes'                 => trim($fp_opportunity->notes) == '' ? null : $fp_opportunity->notes,
                'pitch'                 => trim($fp_opportunity->pitch) == '' ? null : $fp_opportunity->pitch,
                'rejected_reason'       => trim($fp_opportunity->rejected_reason) == '' ? null : $fp_opportunity->rejected_reason,
                'deliverable_deadline_days' => $fp_opportunity->deliverable_deadline_days,
                'apply_by'              => $fp_opportunity->apply_by == '0000-00-00' ? null : $fp_opportunity->apply_by . ' 00:00:00',
                'published_at'          => $fp_opportunity->published_at,
                'created_at'            => $fp_opportunity->created_at,
                'deleted_at'            => $fp_opportunity->deleted_at,
                'updated_at'            => $fp_opportunity->updated_at,
                'closed_at'             => $fp_opportunity->closed_at,
                'paused_at'             => $fp_opportunity->paused_at,
                'submitted_at'          => $fp_opportunity->submitted_at == null ? null : $fp_opportunity->submitted_at . ' 00:00:00',
                'rejected_at'           => $fp_opportunity->rejected_at == null ? null : $fp_opportunity->rejected_at . ' 00:00:00',
                'advertiser_id'         => $fp_product_line->advertiser_id,
                'campaign_id'           => $fp_campaign->id,
                'product_line_id'       => $fp_product_line->id,
                'deliverable_type_id'   => $fp_opportunity->deliverable_type_id,
            ];
        }
        DB::table('opportunities')->insert($opportunity_data);

        $this->info('Finished importing opportunities....');
    }

    private function importOpportunityCompensationModels ()
    {
        $fp_opportunities_result        = DB::connection('fresh_press')->select('select * from opportunities');
        foreach ($fp_opportunities_result AS $fp_opportunity)
        {
            $opportunity                = $this->opportunity_repo->find($fp_opportunity->id);
            if ($fp_opportunity->is_fee)
            {
                $placement_compensation = new PlacementCompensation();
                if ($fp_opportunity->is_fee_suggested)
                {
                    $placement_compensation->setIsNegotiable(false);
                    $placement_compensation->setSuggestedRate($fp_opportunity->is_fee_suggested_rate);
                }
                else
                {
                    $placement_compensation->setIsNegotiable(true);
                }
                $opportunity->addCompensationModel($placement_compensation);
            }
            if ($fp_opportunity->is_hybrid)
            {
                //  These are bad records with meaningless data
                if (is_null($fp_opportunity->is_hybrid_rate) && is_null($fp_opportunity->is_hybrid_rate_type) && is_null($fp_opportunity->is_hybrid_conversion_type) && is_null($fp_opportunity->is_hybrid_avg_value) && is_null($fp_opportunity->is_hybrid_network) && is_null($fp_opportunity->is_hybrid_program))
                    continue;
                $commission_compensation    = new CommissionCompensation();
                $commission_compensation->setRate($fp_opportunity->is_hybrid_rate);
                $commission_compensation->setRateType($fp_opportunity->is_hybrid_rate_type);
                $commission_compensation->setConversionType($fp_opportunity->is_hybrid_conversion_type);
                $commission_compensation->setAverageOrderValue($fp_opportunity->is_hybrid_avg_value);
                $commission_compensation->setAffiliateNetwork($fp_opportunity->is_hybrid_network);
                $commission_compensation->setAffiliateProgramName($fp_opportunity->is_hybrid_program);

                $fp_affiliate_links_result  = DB::connection('fresh_press')->select('select * from opportunity_affiliate_links where opportunity_id = ' . $fp_opportunity->id);
                foreach ($fp_affiliate_links_result AS $fp_affiliate_link)
                {
                    $affiliate_link         = new AffiliateLink();
                    $affiliate_link->setLandingPage($fp_affiliate_link->landing_page);
                    $affiliate_link->setAffiliateLink($fp_affiliate_link->affiliate_link);
                    $commission_compensation->addAffiliateLink($affiliate_link);
                }

                $opportunity->addCompensationModel($commission_compensation);
            }
            //   select is_product, is_product_value, is_product_description from opportunities;
            if (!is_null($fp_opportunity->is_product))
            {
                if ($fp_opportunity->is_product == 0)
                    continue;
                $product_compensation       = new ProductCompensation();
                $product_compensation->setDescription($fp_opportunity->is_product_description);
                $product_compensation->setValue($fp_opportunity->is_product_value);

                $opportunity->addCompensationModel($product_compensation);
            }
            $this->opportunity_repo->save($opportunity);
        }
        $this->opportunity_repo->commit();
    }

    /**
     * @return string|null
     */
    private function getProductLinesWithNoAdvertiser ()
    {
        $bad_product_lines              = DB::connection('fresh_press')->select('select GROUP_CONCAT(id) AS ids from product_lines where advertiser_id NOT IN (select id from advertisers)');
        $bad_product_lines              = $bad_product_lines[0];

        return $bad_product_lines == '' ? null : $bad_product_lines->ids;
    }

    /**
     * @param   int     $fp_country_id
     * @return  Country
     */
    private function getCountry ($fp_country_id)
    {
        $fp_country_code            = DB::connection('fresh_press')->select('select code from countries where id = ' . $fp_country_id);
        $country                    = $this->country_repo->getOneByCode($fp_country_code[0]->code);
        if (is_null($country))
            dd('oh shit country is null with code of ' . $fp_country_code[0]->code);
        return $country;
    }
}
