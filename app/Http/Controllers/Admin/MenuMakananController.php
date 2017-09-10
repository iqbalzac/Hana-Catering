<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Requests;
use App\Menu;
use App\User;
use Illuminate\Http\Request;

class MenuMakananController extends AdminController
{
    public function __construct(Menu $model)
    {
        parent::__construct();

        $this->model = $model;  
        $this->url = admin_url('menu-makanan');
        $this->columns = [
            'id', 'nama_menu', 'jenis', 'harga'
        ];

        $this->actionAllowed = ['create', 'edit', 'delete'];

        //fieldType|required|label|data
        $this->editableFields = [
            'nama_menu' => 'text|required',
            'harga' => 'text|required',
            'jenis' => 'select|required|jenis|jenisMakanan',
        ];

        view()->share([
            'actionAllowed' => $this->actionAllowed
        ]);        
    }

    public function getData()
    {
        $admin = $this->admin;
        $query = $this->model
            ->where('id', '<>', $admin->id)
            ->select($this->columns);

        return \Datatables::of($query)
            ->addColumn('action', function ($query) use ($admin) {
                $actionUrl = $this->url.'/'.$query->id;
                $editBtn = admin_edit_button($actionUrl.'/edit', $admin);
                $deleteBtn = admin_delete_button($actionUrl, $admin);
                
                return $editBtn.$deleteBtn;
            })->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return parent::getTable($this->columns, $this->url, 'table', 'Menu Makanan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'jenisMakanan' => ['satuan' => 'Satuan', 'paketan' => 'Paketan']
        ];

        $this->editableFields['gambar'] = 'file|required';

        $formAttr = [
            'url' => $this->url,
            'method' => 'post',
            'fields' => $this->editableFields,
            'pageTitle' => 'add new subscribe'
        ];

        return parent::getForm(null, $formAttr, $data);
    }

    public function store(Request $request)
    {
        $data = $this->model;
        $data->nama_menu = $request->nama_menu;
        $data->harga = $request->harga;
        $data->jenis = $request->jenis;
        
        // upload image
        $file = $request->file('gambar');
        $destinationPath = 'contents';
        $filename = str_slug($request->nama_menu).'_'.time().'_'.$file->getClientOriginalExtension();
        $file->move($destinationPath, $filename);

        $data->gambar = $filename;

        if ($data->save()) {
            return redirect($this->url);
        }
        
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = $this->model->find($id);

        $data = [
            'jenisMakanan' => ['satuan' => 'Satuan', 'paketan' => 'Paketan']
        ];

        $this->editableFields['gambar'] = 'file|required';

        $formAttr = [
            'url' => $this->url. '/' . $id,
            'method' => 'put',
            'fields' => $this->editableFields,
            'pageTitle' => 'edit <i>'.$model->event_name.'</i> event'
        ];

        
        $model->gambar = ($model->gambar) ? $model->gambar : '';

        return parent::getForm($model, $formAttr, $data);
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
        $data = $this->model->find($id);
        $data->nama_menu = $request->nama_menu;
        $data->harga = $request->harga;
        $data->jenis = $request->jenis;
        
        // upload image
        if ($request->file('gambar')) {
            $file = $request->file('gambar');
            $destinationPath = 'contents';
            $filename = str_slug($request->nama_menu).'_'.time().'_'.$file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);

            $data->gambar = $filename;
        }

        if ($data->save()) {

            return redirect($this->url);
        }
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $query = $this->model->find($id);

        if (!$query->delete()) {
            return redirect()->back()->withErrors('Ouch! Delete failed.');
        }
        
        return redirect()->back()->with('status', 'Data has been deleted!');
    }
}
