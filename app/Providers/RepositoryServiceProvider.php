<?php

namespace App\Providers;


use App\Models\CMS\Advertiser;
use App\Models\CMS\Influencer;
use App\Models\CMS\Role;
use App\Models\CMS\User;
use App\Models\Locations\Country;
use App\Models\Market\AgeRange;
use App\Models\Market\Campaign;
use App\Models\Market\DeliverableType;
use App\Models\Market\Opportunity;
use App\Models\Market\Platform;
use App\Models\Market\PortfolioType;
use App\Models\Market\ProductLine;
use App\Models\Market\Sphere;
use App\Models\Market\SphereCategory;
use App\Models\Networks\Network;
use App\Models\Networks\NetworkConnection;
use App\Repositories\CMS\AdvertiserRepository;
use App\Repositories\CMS\InfluencerRepository;
use App\Repositories\CMS\RoleRepository;
use App\Repositories\CMS\UserRepository;
use App\Repositories\Doctrine\Networks\NetworkConnectionRepository;
use App\Repositories\Doctrine\Networks\NetworkRepository;
use App\Repositories\Locations\CountryRepository;
use App\Repositories\Market\AgeRangeRepository;
use App\Repositories\Market\CampaignRepository;
use App\Repositories\Market\DeliverableTypeRepository;
use App\Repositories\Market\OpportunityRepository;
use App\Repositories\Market\PlatformRepository;
use App\Repositories\Market\PortfolioTypeRepository;
use App\Repositories\Market\ProductLineRepository;
use App\Repositories\Market\SphereCategoryRepository;
use App\Repositories\Market\SphereRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register ()
    {
        $this->app->bind(AdvertiserRepository::class, function($app)
        {
            return new AdvertiserRepository(
                $app['em'],
                new ClassMetadata(Advertiser::class));
        });

        $this->app->bind(AgeRangeRepository::class, function($app)
        {
            return new AgeRangeRepository(
                $app['em'],
                new ClassMetadata(AgeRange::class));
        });

        $this->app->bind(CampaignRepository::class, function($app)
        {
            return new CampaignRepository(
                $app['em'],
                new ClassMetadata(Campaign::class));
        });

        $this->app->bind(CountryRepository::class, function($app)
        {
            return new CountryRepository(
                $app['em'],
                new ClassMetadata(Country::class));
        });

        $this->app->bind(DeliverableTypeRepository::class, function($app)
        {
            return new DeliverableTypeRepository(
                $app['em'],
                new ClassMetadata(DeliverableType::class));
        });

        $this->app->bind(InfluencerRepository::class, function($app)
        {
            return new InfluencerRepository(
                $app['em'],
                new ClassMetadata(Influencer::class));
        });

        $this->app->bind(NetworkConnectionRepository::class, function($app)
        {
            return new NetworkConnectionRepository(
                $app['em'],
                new ClassMetadata(NetworkConnection::class));
        });

        $this->app->bind(NetworkRepository::class, function($app)
        {
            return new NetworkRepository(
                $app['em'],
                new ClassMetadata(Network::class));
        });

        $this->app->bind(OpportunityRepository::class, function($app)
        {
            return new OpportunityRepository(
                $app['em'],
                new ClassMetadata(Opportunity::class));
        });

        $this->app->bind(PlatformRepository::class, function($app)
        {
            return new PlatformRepository(
                $app['em'],
                new ClassMetadata(Platform::class));
        });

        $this->app->bind(PortfolioTypeRepository::class, function($app)
        {
            return new PortfolioTypeRepository(
                $app['em'],
                new ClassMetadata(PortfolioType::class));
        });

        $this->app->bind(ProductLineRepository::class, function($app)
        {
            return new ProductLineRepository(
                $app['em'],
                new ClassMetadata(ProductLine::class));
        });

        $this->app->bind(RoleRepository::class, function($app)
        {
            return new RoleRepository(
                $app['em'],
                new ClassMetadata(Role::class));
        });

        $this->app->bind(SphereCategoryRepository::class, function($app)
        {
            return new SphereCategoryRepository(
                $app['em'],
                new ClassMetadata(SphereCategory::class));
        });

        $this->app->bind(SphereRepository::class, function($app)
        {
            return new SphereRepository(
                $app['em'],
                new ClassMetadata(Sphere::class));
        });

        $this->app->bind(UserRepository::class, function($app)
        {
            return new UserRepository(
                $app['em'],
                new ClassMetadata(User::class));
        });
    }
}