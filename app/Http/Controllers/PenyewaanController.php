<?php

namespace App\Http\Controllers;

use App\Penyewaan;
use Illuminate\Http\Request;

class PenyewaanController extends Controller
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
        $penyewaans = Penyewaan::all();

        return response()->json(
            [
                "message" => "Load Data Berhasil",
                "response" => $penyewaans
            ]
            );
    }

    /**
     * Show the form for creating a new resource.
    * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $penyewaan = new penyewaan;
        // $penyewaan->id_mobil = $request->id_mobil;
        $penyewaan->nama_penyewa = $request->nama_penyewa;
        $penyewaan->alamat_penyewa = $request->alamat_penyewa;
        $penyewaan->nohp_penyewa = $request->nohp_penyewa;
        $penyewaan->umur_penyewa = $request->umur_penyewa;
        $penyewaan->jaminan = $request->jaminan;

        $penyewaan->save();

        return response()->json(
            [
                "message" => "Data Penyewa berhasil ditambahkan",
                "response" => $penyewaan
            ]
            );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Penyewaan  $penyewaan
     * @return \Illuminate\Http\Response
     */
    public function show(Penyewaan $penyewaan,$id)
    {
        $penyewaan = Penyewaan::findOrFail($id);

        return response()->json(
            [
                "message" => "Load data berhasil",
                "response" => $penyewaan
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Penyewaan  $penyewaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penyewaan $penyewaan, $id)
    {
        $penyewaan = Penyewaan::where("id", $id)->first();

        if($penyewaan){
            $penyewaan->nama_penyewa = $request->nama_penyewa ? $request->nama_penyewa : $penyewaan->nama_penyewa;
            $penyewaan->alamat_penyewa = $request->alamat_penyewa ? $request->alamat_penyewa : $penyewaan->alamat_penyewa;
            $penyewaan->nohp_penyewa = $request->nohp_penyewa ? $request->nohp_penyewa : $penyewaan->nohp_penyewa;
            $penyewaan->umur_penyewa = $request->umur_penyewa ? $request->umur_penyewa : $penyewaan->umur_penyewa;
            $penyewaan->jaminan = $request->jaminan ? $request->jaminan : $penyewaan->jaminan;

            $penyewaan->save();
        }

        return response()->json(
            [
                "message" => "Update Data Penyewa berhasil",
                "response" => $penyewaan
            ]
            );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Penyewaan  $penyewaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penyewaan $penyewaan, $id)
    {
        $penyewaan = Penyewaan::findOrFail($id);

        $penyewaan->delete();

        return response()->json(
            [
                "message" => "Hapus Data Berhasil",
            ]
            );
    }
}
