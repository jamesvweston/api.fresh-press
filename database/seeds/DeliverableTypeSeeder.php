<?php

use Illuminate\Database\Seeder;

class DeliverableTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('deliverable_types')->insert(
            $this->getDeliverableTypes()
        );
    }

    private function getDeliverableTypes ()
    {
        return [
            [
                'id'                => 1,
                'name'              => 'Blog Post w/ Social Shares',
            ],
            [
                'id'                => 2,
                'name'              => 'Pin',
            ],
            [
                'id'                => 3,
                'name'              => 'Tweet',
            ],
            [
                'id'                => 4,
                'name'              => 'Instagram',
            ],
            [
                'id'                => 5,
                'name'              => 'Marketing Content',
            ],
        ];
    }
}
