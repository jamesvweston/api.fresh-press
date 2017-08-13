<?php

use Illuminate\Database\Seeder;

class OutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('outlets')->insert(
            $this->getOutlets()
        );
    }

    private function getOutlets ()
    {
        return [
            [
                'id'                => 1,
                'name'              => 'Blog',
            ],
            [
                'id'                => 2,
                'name'              => 'Twitter',
            ],
            [
                'id'                => 3,
                'name'              => 'Instagram',
            ],
            [
                'id'                => 4,
                'name'              => 'Pinterest',
            ],
        ];
    }
}
