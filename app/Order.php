<?php

namespace App;

use App\Detail;
use App\Pelanggan;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $primaryKey = 'id_psn';
	
    public function detailPesanan()
    {
    	return $this->hasMany(Detail::class, 'id_psn', 'id_psn');
    }

    public function pelanggan()
    {
    	return $this->belongsTo(Pelanggan::class, 'id_plg');
    }
}
