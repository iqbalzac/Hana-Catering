<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $primaryKey = 'id_menu_detail';

    public function menu()
    {
    	return $this->belongsTo(Menu::class, 'menu_id');
    }
}
