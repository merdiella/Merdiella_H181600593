<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class ArtikelSeed extends Seeder
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
        $kategoriArtikels = \App\KategoriArtikel::all()->pluck('id')->toArray();

        for($i=0;$i<=400;$i++) {
            \App\Artikel::create([
                'judul'=>$faker->sentence(5),
                'isi'=>$faker->text,
                'users_id'=>$faker->randomElement($users),
                'kategori_artikel_id'=>$faker->randomElement($kategoriArtikels)
            ]);
        }
    }
}
