@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="container m-t-30">
        <div class="widget clearfix">
            <!-- /widget heading -->
            <div class="widget-heading">
                <h3 class="widget-title text-dark">
                    Formulir Pemesanan
                </h3>
                <div class="clearfix"></div>
            </div>
            <div class="widget-body">
                <form method="post" action="#">
                    <div class="row">
                        <div class="col-sm-6 margin-b-30">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Nama Lengkap*</label>
                                        <input type="text" class="form-control" name="nama" placeholder="Nama Pemesan"> </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Alamat Lengkap*</label>
                                        <input type="text" class="form-control" name="alamat" placeholder="Alamat Pemesan"> </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Kota*</label>
                                        <input type="text" class="form-control" name="kota" placeholder="Kota"> </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Kode Pos*</label>
                                        <input type="text" class="form-control" name="kode_pos" placeholder="Kode Pos"> </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Alamat Email*</label>
                                        <input type="email" class="form-control" name="email" placeholder="xxx@xxx.com"> </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>No. Telepon/HP*</label>
                                        <input type="text" class="form-control" name="handphone" placeholder="628xxxxxxx"> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="cart-totals margin-b-20">
                                <div class="cart-totals-title">
                                    <h4>Rincian Pesanan</h4> </div>
                                <div class="cart-totals-fields">
                                    <table class="table">
                                        <tbody>
                                            @foreach ($pesanan->detailPesanan as $order)
                                            <tr>
                                                <td>{{ ucwords($order->menu->nama_menu) }}</td>
                                                <td>({{ $order->jumlah }})</td>
                                                <td>Rp. {{ number_format($order->tota_hrg, 0, ',', '.') }}</td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td class="text-color"><strong>Total yang harus dibayar</strong></td>
                                                <td class="text-color"></td>
                                                <td class="text-color"><strong>Rp. {{ number_format($pesanan->total_psn, 0, ',', '.') }}</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--cart summary-->
                            <div class="payment-option">
                                <p class="text-xs-center"> <a href="#" class="btn btn-outline-success btn-block">Proses Pemesanan</a> </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection