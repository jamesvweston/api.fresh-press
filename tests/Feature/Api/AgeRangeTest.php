<?php

namespace Tests\Feature\Api;

use App\Models\Market\AgeRange;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AgeRangeTest extends TestCase
{

    use WithoutMiddleware;


    public function testResource ()
    {
        $this->get('/age_ranges')->assertStatus(200);
        $this->get('/age_ranges/1')->assertStatus(200);
        $this->get('/age_ranges/100000')->assertStatus(404);
    }
}
