<?php

use Illuminate\Database\Seeder;

class GigStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gig_statuses')->insert(
            $this->getGigStatuses()
        );
    }

    private function getGigStatuses ()
    {
        return [
            [
                'id'                => 1,
                'name'              => 'Pending',
            ],
            [
                'id'                => 2,
                'name'              => 'Approved',
            ],
            [
                'id'                => 3,
                'name'              => 'Denied',
            ],
        ];
    }
}
