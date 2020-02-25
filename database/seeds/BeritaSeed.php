<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class BeritaSeed extends Seeder
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
        $kategoriBeritas = \App\KategoriBerita::all()->pluck('id')->toArray();

        for($i=0;$i<=400;$i++) {
            \App\Berita::create([
                'judul'=>$faker->sentence(7),
                'isi'=>$faker->text,
                'users_id'=>$faker->randomElement($users),
                'kategori_berita_id'=>$faker->randomElement($kategoriBeritas)
            ]);
        }
    }
}
