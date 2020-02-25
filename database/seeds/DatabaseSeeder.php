<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeed::class);
        $this->call(KategoriArtikelSeed::class);
        $this->call(KategoriGaleriSeed::class);
        $this->call(KategoriBeritaSeed::class);
        $this->call(KategoriPengumumanSeed::class);
        $this->call(ArtikelSeed::class);
        $this->call(BeritaSeed::class);
        $this->call(PengumumanSeed::class);
        $this->call(GaleriSeed::class);
    }
}
