<?php

namespace App\Http\Controllers;

use App\Detail;
use App\Http\Requests\PesananRequest;
use App\Menu;
use App\Order;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        view()->share(['nav' => 'pesanan']);
        // session()->forget('pesanan');
        $pesanan = session('pesanan');

        $menuLain = Menu::inRandomOrder()->limit(4);

        if ($pesanan) {
            $pesananIds = $pesanan->detailPesanan->pluck('menu_id');
            
            $menuLain = $menuLain->whereNotIn('id', $pesananIds);
        }

        $menuLain = $menuLain->get();

        return view('pesanan', compact('pesanan', 'menuLain'));
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
    public function store(PesananRequest $request)
    {
        return redirect()->to('ringkasan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pesan = Menu::find($id);
        $sessionPesanan = session('pesanan');

        if ($sessionPesanan) {
            $pesananSama = $sessionPesanan->detailPesanan->where('menu_id', '=', $id)->first();

            $detail = ($pesananSama) ? $pesananSama : new Detail;
            
            if ($pesananSama) {
                $detail->jumlah = $detail->jumlah + 1;
                $detail->tota_hrg = $detail->tota_hrg + $pesan->harga;
            } else {
                $detail->id_psn = $sessionPesanan->id_psn;
                $detail->menu_id = $pesan->id;
                $detail->jumlah = 1;
                $detail->tota_hrg = $pesan->harga;
            }

            $detail->save();
            
            $updatePesanan = Order::with('detailPesanan')->find($sessionPesanan->id_psn);
            $updatePesanan->total_psn = $updatePesanan->total_psn + $detail->tota_hrg;

            if ($updatePesanan->save()) session(['pesanan' => $updatePesanan]);
            
        
        } else {
            $pesanan = new Order;
            $pesanan->total_psn = 0;
            $pesanan->id_plg = 0;
            
            if ($pesanan->save()) {
                
                $detail = new Detail;
                $detail->id_psn = $pesanan->id_psn;
                $detail->menu_id = $pesan->id;
                $detail->jumlah = 1;
                $detail->tota_hrg = $pesan->harga;
                
                if ($detail->save()) {
                    $pesanan->total_psn = $detail->tota_hrg;
                    $pesanan->save();
                    session(['pesanan' => $pesanan]);
                }
            }
        }

        return redirect()->to('/pesanan');
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

    public function cancel($id)
    {
        $detail = Detail::find($id);

        if (isset($detail) && $detail->delete()) {
            $pesanan = Order::find($detail->id_psn);
            $pesanan->total_psn = $pesanan->total_psn - $detail->tota_hrg;

            if($pesanan->save()) {
                session()->forget('pesanan');
                $pesanan->detailPesanan;

                if (!session()->has('pesanan')) {
                    session()->put('pesanan', $pesanan);

                    return redirect()->to('pesanan');
                }
            }
        }

        return redirect()->back()->withErrors(['Maaf, pesanan Anda tidak ditemukan, silahkan melakukan pemesanan ulang']);
    }
}
