<?php

use Illuminate\Database\Seeder;

class SphereCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sphere_categories')->insert($this->getData());
    }

    private function getData ()
    {
        return [
            [
                'id'    => 1,
                'name'  => 'Apparel'
            ],
            [
                'id'    => 2,
                'name'  => 'Automotive'
            ],
            [
                'id'    => 3,
                'name'  => 'B2B'
            ],
            [
                'id'    => 4,
                'name'  => 'Beauty'
            ],
            [
                'id'    => 5,
                'name'  => 'Books & Magazines'
            ],
            [
                'id'    => 6,
                'name'  => 'Classifieds'
            ],
            [
                'id'    => 7,
                'name'  => 'Coupons'
            ],
            [
                'id'    => 8,
                'name'  => 'Decor / Design'
            ],
            [
                'id'    => 9,
                'name'  => 'DIY & Crafts'
            ],
            [
                'id'    => 10,
                'name'  => 'Education'
            ],
            [
                'id'    => 11,
                'name'  => 'Electronics'
            ],
            [
                'id'    => 12,
                'name'  => 'Event Tickets'
            ],
            [
                'id'    => 13,
                'name'  => 'Financial'
            ],
            [
                'id'    => 14,
                'name'  => 'Fitness & Exercise'
            ],
            [
                'id'    => 15,
                'name'  => 'Food & Gourmet'
            ],
            [
                'id'    => 16,
                'name'  => 'Gift Certificates'
            ],
            [
                'id'    => 17,
                'name'  => 'Green Living'
            ],
            [
                'id'    => 18,
                'name'  => 'Health'
            ],
            [
                'id'    => 19,
                'name'  => 'Holidays'
            ],
            [
                'id'    => 20,
                'name'  => 'Home & Garden'
            ],
            [
                'id'    => 21,
                'name'  => 'Local Deals'
            ],
            [
                'id'    => 22,
                'name'  => 'Media'
            ],
            [
                'id'    => 23,
                'name'  => 'Midlife'
            ],
            [
                'id'    => 24,
                'name'  => 'Office '
            ],
            [
                'id'    => 25,
                'name'  => 'Organization'
            ],
            [
                'id'    => 26,
                'name'  => 'Outdoors'
            ],
            [
                'id'    => 27,
                'name'  => 'Parenting'
            ],
            [
                'id'    => 28,
                'name'  => 'Party & Event Planning'
            ],
            [
                'id'    => 29,
                'name'  => 'Pets'
            ],
            [
                'id'    => 30,
                'name'  => 'Photography'
            ],
            [
                'id'    => 31,
                'name'  => 'Relationships'
            ],
            [
                'id'    => 32,
                'name'  => 'Religion / Spirituality'
            ],
            [
                'id'    => 33,
                'name'  => 'Sewing & Quilting'
            ],
            [
                'id'    => 34,
                'name'  => 'Sports'
            ],
            [
                'id'    => 35,
                'name'  => 'Technology'
            ],
            [
                'id'    => 36,
                'name'  => 'Travel'
            ],
            [
                'id'    => 37,
                'name'  => 'Weddings'
            ],
            [
                'id'    => 38,
                'name'  => 'Weightloss'
            ],
        ];
    }
}
