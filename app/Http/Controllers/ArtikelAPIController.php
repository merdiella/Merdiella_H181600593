<?php

namespace App\Http\Controllers;

use App\Artikel;
use App\User;
use Illuminate\Http\Request;

class ArtikelAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$artikels=Artikel::with(['kategoriArtikel','user'])->get();

        return $artikels;*/

        $artikel=User::find(2)->artikels;

        return $artikel;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=$request->all();

        $artikel=Artikel::create($input);

        return $artikel;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artikel=Artikel::find($id);

        return $artikel;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input=$request->all();

        $artikel=Artikel::find($id);

        if(empty($artikel)){
            return response()->json(['message'=>'data tidak ditemukan'],404);
        }

        $artikel->update($input);

        return response()->json($artikel);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikel=Artikel::find($id);

        if(empty($artikel)){
            return response()->json(['message'=>'data tidak ditemukan'],404);
        }

        $artikel->delete();

        return response()->json(['message'=>'data telah dihapus']);
    }

    //Soal 1.
    //Tampilkan Artikel yang dibuat oleh User dengan id 20
    // dan Kategori artikel id 12
    public function artikelUjiFunction(){
        $artikels=Artikel::where('users_id',20)->where('kategori_artikel_id',16)->get();
        return $artikels;
    }

    //Tampilkan Artikel yang di tulisa oleh orang yang membuat berita dengan id=10
    public function artikelSoal2(){
        $artikels=Artikel::whereHas('user',function ($query){
            $query->whereHas('beritas',function ($query){
                $query->where('id',10);
            });
        })->with('user','user.beritas')->get();

        return $artikels;
    }
}
