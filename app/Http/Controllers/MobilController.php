<?php

namespace App\Http\Controllers;

use App\Mobil;
use Illuminate\Http\Request;

class MobilController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mobils = Mobil::all();

        return response()->json(
            [
                "message" => "Load Data Berhasil",
                "response" => $mobils
            ]
            );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mobil = new Mobil;
        $mobil->nama_mobil = $request->nama_mobil;
        $mobil->warna_mobil = $request->warna_mobil;
        $mobil->nomor_polisi = $request->nomor_polisi;
        $mobil->kapasitas_penumpang = $request->kapasitas_penumpang;
        $mobil->harga_sewa = $request->harga_sewa;

        $mobil->save();

        return response()->json(
            [
                "message" => "Data Mobil berhasil ditambahkan",
                "response" => $mobil
            ]
            );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mobil = Mobil::findOrFail($id);

        return response()->json(
            [
                "message" => "Load data berhasil",
                "response" => $mobil
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mobil = Mobil::where("id", $id)->first();

        if($mobil){
            $mobil->nama_mobil = $request->nama_mobil ? $request->nama_mobil : $mobil->nama_mobil;
            $mobil->warna_mobil = $request->warna_mobil ? $request->warna_mobil : $mobil->warna_mobil;
            $mobil->nomor_polisi = $request->nomor_polisi ? $request->nomor_polisi : $mobil->nomor_polisi;
            $mobil->kapasitas_penumpang = $request->kapasitas_penumpang ? $request->kapasitas_penumpang : $mobil->kapasitas_penumpang;
            $mobil->harga_sewa = $request->harga_sewa ? $request->harga_sewa : $mobil->harga_sewa;

            $mobil->save();
        }

        return response()->json(
            [
                "message" => "Update Data Mobil berhasil",
                "response" => $mobil
            ]
            );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mobil = Mobil::findOrFail($id);

        $mobil->delete();

        return response()->json(
            [
                "message" => "Hapus Data Berhasil",
            ]
            );
    }
}
