<?php

use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('options')->insert([
            'men_month_metal_price' => 100,
            'men_month_walk_price' => 30,
            'men_month_both_price' => 130,
            'men_day_metal_price' => 7,
            'men_day_walk_price' => 10,
            'men_day_both_price' => 17,
            'men_days' => 'all',
            'women_month_metal_price' => 100,
            'women_month_walk_price' => 30,
            'women_month_both_price' => 130,
            'women_day_metal_price' => 10,
            'women_day_walk_price' => 10,
            'women_day_both_price' => 20,
            'women_days' => 'all',
        ]);
    }
}
