<?php

namespace App;

use App\Detail;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $primaryKey = 'id_psn';
	
    public function detailPesanan()
    {
    	return $this->hasMany(Detail::class, 'id_psn', 'id_psn');
    }
}
