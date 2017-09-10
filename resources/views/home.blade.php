@extends('layouts.master')

@section('content')
<!-- banner part starts -->
<section class="hero bg-image" data-image-src="{{asset('images/home.jpg')}}">
    <div class="hero-inner">
        <div class="container text-center hero-text font-white">
            <h1>a Wonderful Course by Hana Catering</h1>
            <h5 class="font-white space-xs">Temukan Kelezatan Disetiap Masakan</h5>
            <div class="banner-form">
                <form class="form-inline" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputAmount">Saya ingin makan....</label>
                        <div class="form-group">
                            <input type="text" name="keyword" class="form-control form-control-lg" id="exampleInputAmount" placeholder="Saya ingin makan...."> </div>
                    </div>
                    <button type="submit" class="btn theme-btn btn-lg">Cari</button>
                    @if($errors->any())
                    <h5 style="color:white;margin-top:10px;">{{$errors->first()}}</h5>
                    @endif
                </form>
            </div>
            <div class="steps">
                <div class="step-item step1">
                    <img src="{{ asset('images/chicken.svg') }}" width="34" height="34">
                    <h4><span>1. </span>Pilih menunya</h4> </div>
                <!-- end:Step -->
                <div class="step-item step2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewbox="0 0 380.721 380.721">
                        <g fill="#FFF">
                            <path d="M58.727 281.236c.32-5.217.657-10.457 1.319-15.709 1.261-12.525 3.974-25.05 6.733-37.296a543.51 543.51 0 0 1 5.449-17.997c2.463-5.729 4.868-11.433 7.25-17.01 5.438-10.898 11.491-21.07 18.724-29.593 1.737-2.19 3.427-4.328 5.095-6.46 1.912-1.894 3.805-3.747 5.676-5.588 3.863-3.509 7.221-7.273 11.107-10.091 7.686-5.711 14.529-11.137 21.477-14.506 6.698-3.724 12.455-6.982 17.631-8.812 10.125-4.084 15.883-6.141 15.883-6.141s-4.915 3.893-13.502 10.207c-4.449 2.917-9.114 7.488-14.721 12.147-5.803 4.461-11.107 10.84-17.358 16.992-3.149 3.114-5.588 7.064-8.551 10.684-1.452 1.83-2.928 3.712-4.427 5.6a1225.858 1225.858 0 0 1-3.84 6.286c-5.537 8.208-9.673 17.858-13.995 27.664-1.748 5.1-3.566 10.283-5.391 15.534a371.593 371.593 0 0 1-4.16 16.476c-2.266 11.271-4.502 22.761-5.438 34.612-.68 4.287-1.022 8.633-1.383 12.979 94 .023 166.775.069 268.589.069.337-4.462.534-8.97.534-13.536 0-85.746-62.509-156.352-142.875-165.705 5.17-4.869 8.436-11.758 8.436-19.433-.023-14.692-11.921-26.612-26.631-26.612-14.715 0-26.652 11.92-26.652 26.642 0 7.668 3.265 14.558 8.464 19.426-80.396 9.353-142.869 79.96-142.869 165.706 0 4.543.168 9.027.5 13.467 9.935-.002 19.526-.002 28.926-.002zM0 291.135h380.721v33.59H0z" /> </g>
                    </svg>
                    <h4><span>2. </span>Pesan makanannya</h4> </div>
                <!-- end:Step -->
                <div class="step-item step3">
                    <img src="{{ asset('images/restaurant-menu.svg') }}" width="34" height="34">
                    <h4><span>3. </span>Pesanan kami proses</h4> </div>
                <!-- end:Step -->
            </div>
            <!-- end:Steps -->
        </div>
    </div>
    <!--end:Hero inner -->
</section>
<!-- banner part ends -->
<!-- location match part starts -->
<div class="location-match text-xs-center">
    <div class="container"> <span>Ada <span class="primary-color">{{ $totalMenu }}</span> menu makanan tersedia di <span class="primary-color">{{ config('app.name') }}</span></span>
    </div>
</div>
<!-- location match part ends -->
<!-- Popular block starts -->
<section class="popular">
    <div class="container">
        <div class="title text-xs-center m-b-30">
            <h2>Banyak Menu Menarik yang Tersedia</h2>
            <p class="lead">Cara Mudah Untuk Mendapatkan Makanan Favorit Anda</p>
        </div>
        <div class="row">
            <!-- Each popular food item starts -->
            @foreach ($randomMenu as $makanan)
            <div class="col-xs-12 col-sm-6 col-md-4 food-item">
                <div class="food-item-wrap">
                    <div class="figure-wrap bg-image" data-image-src="{{ asset('contents/' . $makanan->gambar) }}">
                        
                    </div>
                    <div class="content">
                        <h5><a href="#">{{ ucwords($makanan->nama_menu) }}</a></h5>
                        <div class="product-name">{{ ucwords($makanan->jenis) }}</div>
                        <div class="price-btn-block"> <span class="price">
                            Rp. {{ number_format($makanan->harga, 0, ',', '.') }}</span>
                            <a href="{{ url('pesanan/' . $makanan->id) }}" class="btn theme-btn-dash pull-right">Pesan</a> </div>
                    </div>
                    
                </div>
            </div>
            @endforeach
            <!-- Each popular food item starts -->
        </div>
    </div>
</section>
<!-- Popular block ends -->
<!-- How it works block starts -->
<section class="how-it-works">
    <div class="container">
        <div class="text-xs-center">
            <h2>3 Langkah Mudah Melakukan Pemesanan</h2>
            <!-- 3 block sections starts -->
            <div class="row how-it-works-solution">
                <div class="col-xs-12 col-sm-12 col-md-4 how-it-works-steps white-txt col1">
                    <div class="how-it-works-wrap">
                        <div class="step step-1">
                            <div class="icon" data-step="1">
                                <img src="{{ asset('images/chicken.svg') }}" width="34" height="34">
                            </div>
                            <h3>Pilih menunya</h3>
                            <p>Temukan menu favorit anda disini</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 how-it-works-steps white-txt col2">
                    <div class="step step-2">
                        <div class="icon" data-step="2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewbox="0 0 380.721 380.721">
                                <g fill="#FFF">
                                    <path d="M58.727 281.236c.32-5.217.657-10.457 1.319-15.709 1.261-12.525 3.974-25.05 6.733-37.296a543.51 543.51 0 0 1 5.449-17.997c2.463-5.729 4.868-11.433 7.25-17.01 5.438-10.898 11.491-21.07 18.724-29.593 1.737-2.19 3.427-4.328 5.095-6.46 1.912-1.894 3.805-3.747 5.676-5.588 3.863-3.509 7.221-7.273 11.107-10.091 7.686-5.711 14.529-11.137 21.477-14.506 6.698-3.724 12.455-6.982 17.631-8.812 10.125-4.084 15.883-6.141 15.883-6.141s-4.915 3.893-13.502 10.207c-4.449 2.917-9.114 7.488-14.721 12.147-5.803 4.461-11.107 10.84-17.358 16.992-3.149 3.114-5.588 7.064-8.551 10.684-1.452 1.83-2.928 3.712-4.427 5.6a1225.858 1225.858 0 0 1-3.84 6.286c-5.537 8.208-9.673 17.858-13.995 27.664-1.748 5.1-3.566 10.283-5.391 15.534a371.593 371.593 0 0 1-4.16 16.476c-2.266 11.271-4.502 22.761-5.438 34.612-.68 4.287-1.022 8.633-1.383 12.979 94 .023 166.775.069 268.589.069.337-4.462.534-8.97.534-13.536 0-85.746-62.509-156.352-142.875-165.705 5.17-4.869 8.436-11.758 8.436-19.433-.023-14.692-11.921-26.612-26.631-26.612-14.715 0-26.652 11.92-26.652 26.642 0 7.668 3.265 14.558 8.464 19.426-80.396 9.353-142.869 79.96-142.869 165.706 0 4.543.168 9.027.5 13.467 9.935-.002 19.526-.002 28.926-.002zM0 291.135h380.721v33.59H0z" /> </g>
                            </svg>
                        </div>
                        <h3>Pesan makanannya</h3>
                        <p>Dengan mudah makanan yang dipesan akan segera anda temukan</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 how-it-works-steps white-txt col3">
                    <div class="step step-3">
                            <img src="{{ asset('images/restaurant-menu.svg') }}" width="34" height="34">
                        </div>
                        <h3>Pesanan kami proses</h3>
                        <p>Pesanan anda akan kami antar sesuai waktu yang ditentukan</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- 3 block sections ends -->
        <div class="row">
            <div class="col-sm-12 text-center">
                <p class="pay-info">Kontak kami untuk melakukan proses pembayaran</p>
            </div>
        </div>
    </div>
</section>
<!-- How it works block ends -->
<!-- Featured restaurants starts -->

@endsection
