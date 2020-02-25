<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class GaleriSeed extends Seeder
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
        $kategoriGaleris = \App\KategoriGaleri::all()->pluck('id')->toArray();

        for($i=0;$i<=400;$i++) {
            \App\Galeri::create([
                'nama'=>$faker->sentence(3),
                'keterangan'=>$faker->text,
                'path'=>$faker->imageUrl(),
                'users_id'=>$faker->randomElement($users),
                'kategori_galeri_id'=>$faker->randomElement($kategoriGaleris)
            ]);
        }
    }
}
