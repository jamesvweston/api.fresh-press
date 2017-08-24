<?php

namespace Tests\Feature\Api;

use App\Models\CMS\Influencer;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InfluencersTest extends TestCase
{

    use WithoutMiddleware;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testResource ()
    {
        $influencer                 = Influencer::first();
        $this->get('/influencers')->assertStatus(200);

        $this->get('/influencers/' . $influencer->id)->assertStatus(200);
        $this->get('/influencers/50000000000')->assertStatus(404);
        $this->get('/influencers/' . $influencer->id . '/billing_address')->assertStatus(200);
        $influencers_response                = Influencer::all();

    }
}
