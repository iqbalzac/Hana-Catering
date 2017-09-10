<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Requests;
use App\Order;
use App\Transformers\PenjualanTransformer;
use Illuminate\Http\Request;

class PenjualanController extends AdminController
{
    public function __construct(Order $model)
    {
        parent::__construct();

        $this->model = $model;  
        $this->url = admin_url('penjualan');
        $this->columns = [
            'id_psn', 'detail_pesanan', 'total_harga', 'pemesan'
        ];

        $this->actionAllowed = ['create', 'edit', 'delete'];

        //fieldType|required|label|data
        $this->editableFields = [];

        view()->share([
            'actionAllowed' => $this->actionAllowed
        ]);        
    }

    public function getData()
    {
        $admin = $this->admin;
        $query = $this->model
            ->with('detailPesanan.menu', 'pelanggan');

        return \Datatables::eloquent($query)
            ->setTransformer(new PenjualanTransformer)
            ->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return parent::getTable($this->columns, $this->url, 'table', 'Data Penjualan');
    }

}
