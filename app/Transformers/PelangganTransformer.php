<?php

namespace App\Transformers;

use App\Pelanggan;
use League\Fractal\TransformerAbstract;

class PelangganTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Pelanggan $pelanggan)
    {
        return [
            'id' => $pelanggan->id,
            'nama' => $pelanggan->nama,
            'no_hp' => $pelanggan->no_hp,
            'alamat' => $pelanggan->alamat,
            'email' => $pelanggan->email,
            'action' => '---'
        ];
    }
}
