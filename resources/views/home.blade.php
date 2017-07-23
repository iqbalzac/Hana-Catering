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
            <h2>Popular This Month In Your City</h2>
            <p class="lead">The easiest way to your favourite food</p>
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
                        <div class="price-btn-block"> <span class="price">Rp. {{ number_format($makanan->harga, 0, ',', '.') }}</span> <a href="#" class="btn theme-btn-dash pull-right">Pesan</a> </div>
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
            <h2>Easy 3 Step Order</h2>
            <!-- 3 block sections starts -->
            <div class="row how-it-works-solution">
                <div class="col-xs-12 col-sm-12 col-md-4 how-it-works-steps white-txt col1">
                    <div class="how-it-works-wrap">
                        <div class="step step-1">
                            <div class="icon" data-step="1">
                                <img src="{{ asset('images/chicken.svg') }}" width="34" height="34">
                            </div>
                            <h3>Pilih menunya</h3>
                            <p>We"ve got your covered with menus from over 345 delivery restaurants online.</p>
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
                        <p>We"ve got your covered with menus from over 345 delivery restaurants online.</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 how-it-works-steps white-txt col3">
                    <div class="step step-3">
                        <div class="icon" data-step="3">
                            <img src="{{ asset('images/restaurant-menu.svg') }}" width="34" height="34">
                        </div>
                        <h3>Pesanan kami proses</h3>
                        <p>Get your food delivered! And enjoy your meal! Pay online on pickup or delivery</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- 3 block sections ends -->
        <div class="row">
            <div class="col-sm-12 text-center">
                <p class="pay-info">Pay by Cash on delivery , Card or Paypal</p>
            </div>
        </div>
    </div>
</section>
<!-- How it works block ends -->
<!-- Featured restaurants starts -->
<section class="featured-restaurants">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="title-block pull-left">
                    <h4>Featured restaurants</h4> </div>
            </div>
            <div class="col-sm-8">
                <!-- restaurants filter nav starts -->
                <div class="restaurants-filter pull-right">
                    <nav class="primary pull-left">
                        <ul>
                            <li><a href="#" class="selected" data-filter="*">Grill</a> </li>
                            <li><a href="#" data-filter=".pizza">Pizza</a> </li>
                            <li><a href="#" data-filter=".pasta">Pasta</a> </li>
                            <li><a href="#" data-filter=".thaifood">thai food</a> </li>
                            <li><a href="#" data-filter=".fish">fish</a> </li>
                        </ul>
                    </nav>
                </div>
                <!-- restaurants filter nav ends -->
            </div>
        </div>
        <!-- restaurants listing starts -->
        <div class="row">
            <div class="restaurant-listing">
                <div class="col-xs-12 col-sm-12 col-md-6 single-restaurant grill fish thaifood pizza">
                    <div class="restaurant-wrap">
                        <div class="row">
                            <div class="col-xs-12 col-sm-3 col-md-12 col-lg-3 text-xs-center">
                                <a class="restaurant-logo" href="#"> <img src="http://placehold.it/95x95" alt="Restaurant logo"> </a>
                            </div>
                            <!--end:col -->
                            <div class="col-xs-12 col-sm-9 col-md-12 col-lg-9">
                                <h5><a href="profile.html">Maenaam Thai Restaurant</a></h5> <span>Burgers, American, Sandwiches, Fast Food, BBQ</span>
                                <div class="bottom-part">
                                    <div class="cost"><i class="fa fa-check"></i> Min $ 10,00</div>
                                    <div class="mins"><i class="fa fa-motorcycle"></i> 30 min</div>
                                    <div class="ratings"> <span>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </span> (122) </div>
                                </div>
                            </div>
                            <!-- end:col -->
                        </div>
                        <!-- end:row -->
                    </div>
                    <!--end:Restaurant wrap -->
                </div>
                <!--end: col -->
                <div class="col-xs-12 col-sm-12 col-md-6 single-restaurant grill fish pasta thaifood">
                    <div class="restaurant-wrap">
                        <div class="row">
                            <div class="col-xs-12 col-sm-3 col-md-12 col-lg-3 text-xs-center">
                                <a class="restaurant-logo" href="#"> <img src="http://placehold.it/95x95" alt="Restaurant logo"> </a>
                            </div>
                            <!--end:col -->
                            <div class="col-xs-12 col-sm-9 col-md-12 col-lg-9">
                                <h5><a href="profile.html">Maenaam Thai Restaurant</a></h5> <span>Burgers, American, Sandwiches, Fast Food, BBQ</span>
                                <div class="bottom-part">
                                    <div class="cost"><i class="fa fa-check"></i> Min $ 10,00</div>
                                    <div class="mins"><i class="fa fa-motorcycle"></i> 30 min</div>
                                    <div class="ratings"> <span>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </span> (122) </div>
                                </div>
                            </div>
                            <!-- end:col -->
                        </div>
                        <!-- end:row -->
                    </div>
                    <!--end:Restaurant wrap -->
                </div>
                <!--end: col -->
                <div class="col-xs-12 col-sm-12 col-md-6 single-restaurant grill thaifood pasta pizza">
                    <div class="restaurant-wrap">
                        <div class="row">
                            <div class="col-xs-12 col-sm-3 col-md-12 col-lg-3 text-xs-center">
                                <a class="restaurant-logo" href="#"> <img src="http://placehold.it/95x95" alt="Restaurant logo"> </a>
                            </div>
                            <!--end:col -->
                            <div class="col-xs-12 col-sm-9 col-md-12 col-lg-9">
                                <h5><a href="profile.html">Maenaam Thai Restaurant</a></h5> <span>Burgers, American, Sandwiches, Fast Food, BBQ</span>
                                <div class="bottom-part">
                                    <div class="cost"><i class="fa fa-check"></i> Min $ 10,00</div>
                                    <div class="mins"><i class="fa fa-motorcycle"></i> 30 min</div>
                                    <div class="ratings"> <span>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </span> (122) </div>
                                </div>
                            </div>
                            <!-- end:col -->
                        </div>
                        <!-- end:row -->
                    </div>
                    <!--end:Restaurant wrap -->
                </div>
                <!--end: col -->
                <div class="col-xs-12 col-sm-12 col-md-6 single-restaurant thaifood fish pasta">
                    <div class="restaurant-wrap">
                        <div class="row">
                            <div class="col-xs-12 col-sm-3 col-md-12 col-lg-3 text-xs-center">
                                <a class="restaurant-logo" href="#"> <img src="http://placehold.it/95x95" alt="Restaurant logo"> </a>
                            </div>
                            <!--end:col -->
                            <div class="col-xs-12 col-sm-9 col-md-12 col-lg-9">
                                <h5><a href="profile.html">Maenaam Thai Restaurant</a></h5> <span>Burgers, American, Sandwiches, Fast Food, BBQ</span>
                                <div class="bottom-part">
                                    <div class="cost"><i class="fa fa-check"></i> Min $ 10,00</div>
                                    <div class="mins"><i class="fa fa-motorcycle"></i> 30 min</div>
                                    <div class="ratings"> <span>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </span> (122) </div>
                                </div>
                            </div>
                            <!-- end:col -->
                        </div>
                        <!-- end:row -->
                    </div>
                    <!--end:Restaurant wrap -->
                </div>
                <!--end: col -->
                <div class="col-xs-12 col-sm-12 col-md-6 single-restaurant grill fish thaifood pasta pizza">
                    <div class="restaurant-wrap">
                        <div class="row">
                            <div class="col-xs-12 col-sm-3 col-md-12 col-lg-3 text-xs-center">
                                <a class="restaurant-logo" href="#"> <img src="http://placehold.it/95x95" alt="Restaurant logo"> </a>
                            </div>
                            <!--end:col -->
                            <div class="col-xs-12 col-sm-9 col-md-12 col-lg-9">
                                <h5><a href="profile.html">Maenaam Thai Restaurant</a></h5> <span>Burgers, American, Sandwiches, Fast Food, BBQ</span>
                                <div class="bottom-part">
                                    <div class="cost"><i class="fa fa-check"></i> Min $ 10,00</div>
                                    <div class="mins"><i class="fa fa-motorcycle"></i> 30 min</div>
                                    <div class="ratings"> <span>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </span> (122) </div>
                                </div>
                            </div>
                            <!-- end:col -->
                        </div>
                        <!-- end:row -->
                    </div>
                    <!--end:Restaurant wrap -->
                </div>
                <!--end: col -->
                <div class="col-xs-12 col-sm-12 col-md-6 single-restaurant grill pasta pizza">
                    <div class="restaurant-wrap">
                        <div class="row">
                            <div class="col-xs-12 col-sm-3 col-md-12 col-lg-3 text-xs-center">
                                <a class="restaurant-logo" href="#"> <img src="http://placehold.it/95x95" alt="Restaurant logo"> </a>
                            </div>
                            <!--end:col -->
                            <div class="col-xs-12 col-sm-9 col-md-12 col-lg-9">
                                <h5><a href="profile.html">Maenaam Thai Restaurant</a></h5> <span>Burgers, American, Sandwiches, Fast Food, BBQ</span>
                                <div class="bottom-part">
                                    <div class="cost"><i class="fa fa-check"></i> Min $ 10,00</div>
                                    <div class="mins"><i class="fa fa-motorcycle"></i> 30 min</div>
                                    <div class="ratings"> <span>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </span> (122) </div>
                                </div>
                            </div>
                            <!-- end:col -->
                        </div>
                        <!-- end:row -->
                    </div>
                    <!--end:Restaurant wrap -->
                </div>
                <!--end: col -->
            </div>
        </div>
        <!-- restaurants listing ends -->
        <!-- add restaurant starts -->
        <section class="add-restaurants">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-3 add-title">
                        <h4>Add Your Restaurant</h4> </div>
                    <div class="col-xs-12 col-sm-5 join-text">
                        <p>Join the thousands of other restaurants who benefit from having their menus on <a href="#"><strong> FoodPicky directory</strong></a> </p>
                    </div>
                    <div class="col-xs-12 col-sm-4 join-btn text-xs-right"><a href="#" class="btn theme-btn btn-lg">I‘m restaurant</a> </div>
                </div>
            </div>
        </section>
        <!-- add restaurant ends -->
    </div>
</section>
<!-- Featured restaurants ends -->
<section class="app-section">
    <div class="app-wrap">
        <div class="container">
            <div class="row text-img-block text-xs-left">
                <div class="container">
                    <div class="col-xs-12 col-sm-5 right-image text-center">
                        <figure> <img src="images/app.png" alt="Right Image" class="img-fluid"> </figure>
                    </div>
                    <div class="col-xs-12 col-sm-7 left-text">
                        <h3>The Best Food Delivery App</h3>
                        <p>Now you can make food happen pretty much wherever you are thanks to the free easy-to-use Food Delivery &amp; Takeout App.</p>
                        <div class="social-btns">
                            <a href="#" class="app-btn apple-button clearfix">
                                <div class="pull-left"><i class="fa fa-apple"></i> </div>
                                <div class="pull-right"> <span class="text">Available on the</span> <span class="text-2">App Store</span> </div>
                            </a>
                            <a href="#" class="app-btn android-button clearfix">
                                <div class="pull-left"><i class="fa fa-android"></i> </div>
                                <div class="pull-right"> <span class="text">Available on the</span> <span class="text-2">Play store</span> </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
