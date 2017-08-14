<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(
            $this->getRoles()
        );
    }

    private function getRoles ()
    {
        return [
            [
                'id'            => 1,
                'name'          => 'Admin',
            ],
            [
                'id'            => 2,
                'name'          => 'Developer',
            ]
        ];
    }
}
