@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <!-- start: Inner page hero -->
    <div class="inner-page-hero bg-image" data-image-src="{{ asset('images/profile-banner.jpg') }}">
        <div class="container"> </div>
        <!-- end:Container -->
    </div>
    <div class="result-show">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <p>Tersedia total <span class="primary-color"><strong>{{ $makananList->total() }}</strong></span> menu makanan</div>
            </p>
            <div class="col-sm-9">
                <form id="sortOrder" method="get" action="">
                    <select onChange="document.forms['sortOrder'].submit();" class="custom-select pull-right" name="sort_order_by">
                        <option value="harga~asc" {{ ($sort_by == 'harga' && $order_by == 'asc') ? 'selected' : '' }}>Harga (murah - mahal)</option>
                        <option value="harga~desc" {{ ($sort_by == 'harga' && $order_by == 'desc') ? 'selected' : '' }}>Harga (mahal - murah)</option>
                        <option value="nama_menu~asc" {{ ($sort_by == 'nama_menu' && $order_by == 'asc') ? 'selected' : '' }}>Nama Menu (A - Z)</option>
                        <option value="nama_menu~desc" {{ ($sort_by == 'nama_menu' && $order_by == 'desc') ? 'selected' : '' }}>Nama Menu (Z - A)</option>
                        <option value="created_at~desc" {{ ($sort_by == 'created_at' && $order_by == 'desc') ? 'selected' : '' }}>Menu Baru</option>
                        <option value="created_at~asc" {{ ($sort_by == 'created_at' && $order_by == 'asc') ? 'selected' : '' }}>Menu Lama</option>
                    </select>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- //results show -->
<section class="restaurants-page">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <!-- Each popular food item starts -->
                    @forelse($makananList as $makanan)
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 food-item">
                        <div class="food-item-wrap">
                            <div class="figure-wrap bg-image" data-image-src="{{ asset('contents/'.$makanan->gambar) }}">
                                
                            </div>
                            <div class="content">
                                <h5><a href="#">{{ ucwords($makanan->nama_menu) }}</a></h5>
                                <div class="product-name">{{ ucwords($makanan->jenis) }}</div>
                                <div class="price-btn-block"> <span class="price">Rp. {{ number_format($makanan->harga, 0, ',', '.') }}</span> <a href="{{ url('pesanan/'.$makanan->id) }}" class="btn theme-btn-dash pull-right">Pesan</a> </div>
                            </div>
                            
                        </div>
                    </div>
                    @empty
                    <h1 style="text-align: center;margin:30px 0;">Maaf, menu makanan belum tersedia</h1>
                    @endforelse
                    <!-- Each popular food item starts -->
                    
                    <div class="col-xs-12">
                        <nav aria-label="...">
                            {!! $makananList->links() !!}
                        </nav>
                    </div>
                </div>
                <!-- end:right row -->
            </div>
        </div>
    </div>
</section>
@endsection