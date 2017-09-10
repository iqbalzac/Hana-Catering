<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use App\Menu;
use App\Order;
use App\Pelanggan;
 
class DashboardController extends AdminController
{
	public function __construct()
	{
		parent::__construct();
	}

    public function index()
    {
    	$totalMenu = Menu::count();
    	$totalPelanggan = Pelanggan::count();
    	$totalPenjualan = Order::count();

        return view('admin-view::index', compact('totalMenu', 'totalPelanggan', 'totalPenjualan'));
    }
 
}