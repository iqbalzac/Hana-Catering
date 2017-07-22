<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

class SemuaMakananController extends Controller
{

    public function __construct()
    {
        $this->perPage = intval((\Request::get('per_page')) ?:6);
        $this->sortBy = \Request::get('sort_by') ?: 'created_at';
        $this->orderBy = (\Request::get('order_by') == 'asc') ? 'asc' : 'desc';
        $this->paginateParams = array('per_page' => $this->perPage, 'sort_by' => $this->sortBy, 'order_by' => $this->orderBy);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sortOrder = \Request::get('sort_order_by');
        
        if ($sortOrder) {
            $sortOrder = explode('~', $sortOrder);
            $this->sortBy = $sortOrder[0];
            $this->orderBy = $sortOrder[1];
            $this->paginateParams = array('per_page' => $this->perPage, 'sort_by' => $this->sortBy, 'order_by' => $this->orderBy);
        }        

        view()->share(['nav' => 'menu-satuan', 'sort_by' => $this->sortBy, 'order_by' => $this->orderBy]);

        $makananList = Menu::whereJenis('satuan')
                        ->orderBy($this->sortBy, $this->orderBy)
                        ->paginate($this->perPage)
                        ->appends($this->paginateParams);
        
        return view('makanan', compact('makananList'));
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
    public function store(Request $request)
    {
        //
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
