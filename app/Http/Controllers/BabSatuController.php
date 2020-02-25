<?php

namespace App\Http\Controllers;

use App\KategoriArtikel;
use App\KategoriBerita;
use App\Berita;
use App\Pengumuman;
use App\User;
use Illuminate\Http\Request;

class BabSatuController extends Controller
{
   
    public function a1()
    {
        //soal1
        //Tampilkan kategori berita dengan id=40 dan dibuat oleh orang dengan email ntarihoran@siregar.org

        $kategoriBeritas=KategoriBerita::where('id',40)->whereHas('user',function($query){
             $query->where('email','ntarihoran@siregar.org');
        })->get();

        return $kategoriBeritas;
    }
    public function a2()
    {
        $kategoriBeritas=KategoriBerita::whereHas('beritas',function($query){
             $query->whereHas('user',function($query){
             $query->where('email','like','%@wulandari.in');
             });
        })->get();

        return $kategoriBeritas;
    }
//Soal3
//Tampilkan Pengumuman yang ditulis oleh orang yang membuat kategori artikel id = 5 atau membuat kategori artikel id = 20 , sertakan user pembuat pengumumannya

public function a3(){

    $pengumumans=Pengumuman::whereHas('user', function($query){
         $query->whereHas('kategoriArtikels', function($query){
             $query->where('id', 5)->orWhere('id', 20);
            
         });
         })->with('user.kategoriArtikels')->get();

    return $pengumumans;
}
}