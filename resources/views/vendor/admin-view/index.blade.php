@extends('admin-view::layouts.master')

@push('custom_js')
    <script src="{{ admin_elixir('js/admin-page-index.js') }}"></script>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>DASHBOARD</h2>
        </div>

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="info-box bg-pink hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">local_dining</i>
                    </div>
                    <div class="content">
                        <div class="text">TOTAL MENU MAKANAN</div>
                        <div class="number count-to" data-from="0" data-to="{{$totalMenu}}" data-speed="15" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="info-box bg-cyan hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">face</i>
                    </div>
                    <div class="content">
                        <div class="text">TOTAL PELANGGAN</div>
                        <div class="number count-to" data-from="0" data-to="{{$totalPelanggan}}" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="info-box bg-light-green hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">shopping_basket</i>
                    </div>
                    <div class="content">
                        <div class="text">TOTAL PENJUALAN</div>
                        <div class="number count-to" data-from="0" data-to="{{$totalPenjualan}}" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Widgets -->
    </div>
@endsection