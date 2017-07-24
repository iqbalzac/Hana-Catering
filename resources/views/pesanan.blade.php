@extends('layouts.master')

@section('content')
        <div class="page-wrapper">
            
            <!-- start: Inner page hero -->
            <section class="inner-page-hero bg-image" data-image-src="{{ asset('images/profile-banner.jpg') }}">
                
            </section>
            <!-- end:Inner page hero -->
            <div class="breadcrumb">
                <div class="container">
                    <ul>
                        <li><a href="#" class="active"><h4>Pesanan</h4></a></li>
                    </ul>
                </div>
            </div>
            <div class="container m-t-30">
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
                        <div class="menu-widget m-b-30">
                            <div class="widget-heading">
                                <h3 class="widget-title text-dark">
                              Mau tambah menu makanan di bawah ini?
                              
                              </a>
                           </h3>
                                <div class="clearfix"></div>
                            </div>
                            <div class="collapse in" id="1">
                                @foreach($menuLain as $menu)
                                <div class="food-item white">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-lg-8">
                                            <div class="rest-logo pull-left">
                                                <a class="restaurant-logo pull-left" href="#">
                                                    <img src="{{ asset('contents/'. $menu->gambar) }}" alt="Food logo">
                                                </a>
                                            </div>
                                            <!-- end:Logo -->
                                            <div class="rest-descr">
                                                <h6><a href="#">{{ ucwords($menu->nama_menu) }}</a></h6>
                                                <p>{{ ucwords($menu->jenis) }}</p>
                                            </div>
                                            <!-- end:Description -->
                                        </div>
                                        <!-- end:col -->
                                        <div class="col-xs-12 col-sm-12 col-lg-4 pull-right item-cart-info">
                                            <span class="price pull-left">Rp. {{ number_format($menu->harga, 0, ',', '.') }}</span>
                                            <a href="{{ url('pesanan/' . $menu->id) }}" class="btn btn-small btn btn-secondary pull-right">&#43;</a>
                                        </div>
                                    </div>
                                    <!-- end:row -->
                                </div>
                                @endforeach
                                <!-- end:Food item -->
                            </div>
                            <!-- end:Collapse -->
                        </div>
                        <!-- end:Widget menu -->
                    </div>
                    <!-- end:Bar -->
                    <div class="col-xs-12 col-md-12 col-lg-6">
                        <div class="sidebar-wrap">
                            <div class="widget widget-cart">
                                <div class="widget-heading">
                                    <h3 class="widget-title text-dark">
                                        Detail Pesanan Anda saat ini:
                                    </h3>
                                    <div class="clearfix"></div>
                                </div>

                                <form method="post" action="{{ url('pesanan') }}">
                                {{ csrf_field() }}
                                @if(isset($pesanan))
                                    @forelse ($pesanan->detailPesanan as $order)
                                    <div class="order-row bg-white">
                                        <div class="widget-body">
                                            <div class="form-group row no-gutter">
                                                <div class="col-xs-5">
                                                    {{ ucwords($order->menu->nama_menu) }}
                                                </div>
                                                <div class="col-xs-2">
                                                    <input class="form-control" type="number" value="{{ $order->jumlah }}" id="example-number-input">
                                                </div>
                                                <div class="col-xs-4">
                                                    <input class="form-control" type="text" value="Rp. {{ number_format($order->tota_hrg, 0, ',', '.') }}" disabled="disabled" style="text-align: right;">
                                                </div>
                                                <div class="col-xs-1" style="padding:10px">
                                                <a href="{{ url('pesanan/' . $order->id_menu_detail . '/batal') }}"><i class="fa fa-trash pull-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="order-row bg-white">
                                        <div class="widget-body">
                                            <div class="form-group row no-gutter">
                                                <div class="col-xs-12 primary-color">
                                                    Belum ada pesanan
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforelse
                                @else
                                    <div class="order-row bg-white">
                                        <div class="widget-body">
                                            <div class="form-group row no-gutter">
                                                <div class="col-xs-12 primary-color">
                                                    Belum ada pesanan
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if(isset($pesanan))
                                <div class="widget-body">
                                    <div class="price-wrap text-xs-center">
                                        <p>TOTAL</p>
                                        <h3 class="value"><strong>Rp. {{ number_format($pesanan->total_psn, 0, ',', '.') }}</strong></h3>
                                        <button type="submit" class="btn theme-btn btn-lg">Pesan</button>
                                    </div>
                                </div>
                                @endif
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end:Right Sidebar -->
                </div>
                <!-- end:row -->
            </div>
            <!-- end:Container -->
            @endsection