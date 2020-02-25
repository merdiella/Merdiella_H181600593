<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class KategoriPengumumanSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= Faker::create('id_ID');

        $users = \App\User::all()->pluck('id')->toArray();

        for($i=0;$i<=200;$i++) {
            \App\KategoriPengumuman::create([
                'nama'=>$faker->sentence(1) ,
                'users_id'=>$faker->randomElement($users)
            ]);
        }
    }
}
