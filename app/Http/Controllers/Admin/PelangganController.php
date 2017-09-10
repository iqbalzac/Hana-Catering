<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Requests;
use App\Pelanggan;
use App\Transformers\PelangganTransformer;
use Illuminate\Http\Request;

class PelangganController extends AdminController
{
    public function __construct(Pelanggan $model)
    {
        parent::__construct();

        $this->model = $model;  
        $this->url = admin_url('pelanggan');
        $this->columns = [
            'id', 'nama', 'no_hp', 'alamat', 'email'
        ];

        $this->actionAllowed = [];

        //fieldType|required|label|data
        $this->editableFields = [
            'nama' => 'text|required',
            'no_hp' => 'text|required',
            'alamat' => 'text|required',
            'email' => 'text|required',
        ];

        view()->share([
            'actionAllowed' => $this->actionAllowed
        ]);        
    }

    public function getData()
    {
        $admin = $this->admin;
        $query = $this->model
            ->select($this->columns);

        return \Datatables::of($query)
            ->setTransformer(new PelangganTransformer)
            ->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return parent::getTable($this->columns, $this->url, 'table', 'Data Pelanggan');
    }

}
