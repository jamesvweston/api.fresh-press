<?php

use Illuminate\Database\Seeder;

class AgeRangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('age_ranges')->insert(
            $this->getAgeRanges()
        );
    }

    private function getAgeRanges ()
    {
        return [
            [
                'id'            => 1,
                'min'           => 13,
                'max'           => 17
            ],
            [
                'id'            => 2,
                'min'           => 18,
                'max'           => 24
            ],
            [
                'id'            => 3,
                'min'           => 25,
                'max'           => 34
            ],
            [
                'id'            => 4,
                'min'           => 35,
                'max'           => 44
            ],
            [
                'id'            => 5,
                'min'           => 45,
                'max'           => 54
            ],
            [
                'id'            => 6,
                'min'           => 55,
                'max'           => 64
            ],
            [
                'id'            => 7,
                'min'           => 65,
                'max'           => null
            ],
        ];
    }
}
