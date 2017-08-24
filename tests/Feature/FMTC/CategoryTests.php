<?php

namespace Tests\Feature\FMTC;

use App\Models\FMTC\Category;
use App\Models\FMTC\Deal;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoryTests extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $results                    = Deal::query()->first();
        dd($results->toArray());
    }
}
