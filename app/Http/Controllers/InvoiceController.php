<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceRequest;
use App\Order;
use App\Pelanggan;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessionPesanan = session('pesanan');

        if (isset($sessionPesanan) == false || count($sessionPesanan->detailPesanan) == 0)
            return redirect()->back()->withErrors(['Maaf, pesanan Anda tidak ditemukan, silahkan melakukan pemesanan ulang']);

        $pesanan = Order::with('detailPesanan')->find($sessionPesanan->id_psn);
        
        return view('invoice', compact('pesanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvoiceRequest $request)
    {
        $sessionPesanan = session('pesanan');

        if (isset($sessionPesanan) == false || count($sessionPesanan->detailPesanan) == 0)
            return redirect()->back()->withErrors(['Maaf, pesanan Anda tidak ditemukan, silahkan melakukan pemesanan ulang']);

        $dataPelanggan = new Pelanggan;
        $dataPelanggan->nama = $request->nama;
        $dataPelanggan->no_hp = $request->handphone;
        $dataPelanggan->alamat = $request->alamat . ', ' . $request->kota . ', ' . $request->kode_pos;
        $dataPelanggan->email = $request->email;

        if (!$dataPelanggan->save())
            return redirect()->back()->withErrors(['Maaf, terjadi kesalahan sistem, silahkan coba melakukan pemesanan kembali']);
        
        $updatePesanan = Order::with('detailPesanan.menu')->find($sessionPesanan->id_psn);
        $updatePesanan->id_plg = $dataPelanggan->id;

        if (!$updatePesanan->save())
            return redirect()->back()->withErrors(['Maaf, terjadi kesalahan sistem, silahkan coba melakukan pemesanan kembali']);
        
        $updatePesanan->pelanggan;
        event(new \App\Events\Pesanan($updatePesanan));

        session()->forget('pesanan');

        return redirect()->to('beranda');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
