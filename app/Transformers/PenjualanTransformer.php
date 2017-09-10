<?php

namespace App\Transformers;

use App\Order;
use League\Fractal\TransformerAbstract;

class PenjualanTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Order $penjualan)
    {
        $detailPesanan = $penjualan->detailPesanan;
        $formatPesanan = "";

        foreach ($detailPesanan as $key => $pesanan) {
            $formatPesanan .= '- '.ucwords($pesanan->menu->nama_menu);
            $formatPesanan .= ' ('.$pesanan->jumlah.' porsi x @Rp. '.number_format($pesanan->menu->harga, 0, ',', '.').')';
            $formatPesanan .= ' = Rp. '.number_format($pesanan->tota_hrg, 0, ',', '.').'<br>';
        }


        return [
            'id_psn' => $penjualan->id_psn,
            'detail_pesanan' => $formatPesanan,
            'total_harga' => 'Rp. '.number_format($penjualan->total_psn, 0, ',', '.'),
            'pemesan' => isset($penjualan->pelanggan->nama) ? $penjualan->pelanggan->nama .'<br>('. $penjualan->pelanggan->email.')'  : 'Unknown',
            'action' => '---'
        ];
    }
}
