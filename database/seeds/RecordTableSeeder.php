<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RecordTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Models\Record');
        DB::table('records')->insert([

        ]);
    }
}
