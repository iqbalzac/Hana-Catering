<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        view()->share(['nav' => 'beranda']);

        $randomMenu = Menu::inRandomOrder()->limit(3)->get();

        return view('home', compact('randomMenu'));
    }

    public function store(Request $request)
    {
        $cariMakanan = Menu::where('nama_menu', 'like', '%' . $request->keyword . '%')->orderBy('created_at', 'desc')->first();

        if (!$cariMakanan) return redirect()->back()->withErrors(['Maaf, makanan yang Anda cari tidak ditemukan']);

        $url = ($cariMakanan->jenis == 'satuan') ? 'menu-satuan' : 'menu-paketan'; 

        return redirect()->to($url . '?keyword=' . $request->keyword);
    }
}
