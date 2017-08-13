<?php

use Illuminate\Database\Seeder;

class PortfolioTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('portfolio_types')->insert(
            $this->getPortfolioTypes()
        );
    }

    private function getPortfolioTypes ()
    {
        return [
            [
                'id'            => 1,
                'name'          => 'Facebook Group',
            ],
            [
                'id'            => 2,
                'name'          => 'Twitter Chat',
            ],
            [
                'id'            => 3,
                'name'          => 'Podcast',
            ],
            [
                'id'            => 4,
                'name'          => 'Newsletter',
            ],
            [
                'id'            => 5,
                'name'          => 'Sponsored Blog Post',
            ],
            [
                'id'            => 6,
                'name'          => 'Sponsored Social Share',
            ],
            [
                'id'            => 7,
                'name'          => 'Facebook Page',
            ],
            [
                'id'            => 8,
                'name'          => 'Youtube Channel',
            ],
        ];
    }
}
