<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CountrySeeder::class);
        $this->call(NetworkSeeder::class);
        $this->call(NetworkFieldSeeder::class);
        $this->call(DeliverableTypeSeeder::class);
        $this->call(AgeRangeSeeder::class);
        $this->call(SphereCategorySeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PlatformSeeder::class);
        $this->call(PortfolioTypeSeeder::class);
        $this->call(OutletSeeder::class);
    }
}
