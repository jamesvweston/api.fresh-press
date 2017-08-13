<?php

use Illuminate\Database\Seeder;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('platforms')->insert(
            $this->getPlatforms()
        );
    }

    private function getPlatforms ()
    {
        return [
            [
                'id'            => 1,
                'name'          => 'Our website / shopping cart'
            ],
            [
                'id'            => 2,
                'name'          => 'Our stores /showrooms /offices / properties'
            ],
            [
                'id'            => 3,
                'name'          => 'Our app'
            ],
            [
                'id'            => 4,
                'name'          => 'In-home sales'
            ],
            [
                'id'            => 5,
                'name'          => 'Conferences / events'
            ],
            [
                'id'            => 6,
                'name'          => 'Retail websites'
            ],
            [
                'id'            => 7,
                'name'          => 'Third party apps'
            ],
            [
                'id'            => 8,
                'name'          => 'Retail stores'
            ],
            [
                'id'            => 9,
                'name'          => 'Authorized / certified agents'
            ],
            [
                'id'            => 10,
                'name'          => 'Health professionals'
            ],
            [
                'id'            => 11,
                'name'          => 'Direct mail'
            ],
            [
                'id'            => 12,
                'name'          => 'Phone orders'
            ],
            [
                'id'            => 13,
                'name'          => 'Other'
            ],
        ];
    }
}
