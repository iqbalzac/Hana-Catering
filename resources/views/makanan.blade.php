@extends('layouts.master')

@section('content')
<div class="page-wrapper">
   
    <!-- end:Top links -->
    <!-- start: Inner page hero -->
    <div class="inner-page-hero bg-image" data-image-src="http://placehold.it/1670x480">
        <div class="container"> </div>
        <!-- end:Container -->
    </div>
    <div class="result-show">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <p><span class="primary-color"><strong>124</strong></span> Results so far </div>
            </p>
            <div class="col-sm-9">
                <select class="custom-select pull-right">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
        </div>
    </div>
</div>
<!-- //results show -->
<section class="restaurants-page">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-5 col-md-4 col-lg-3">
                
                <div class="widget clearfix">
                    <!-- /widget heading -->
                    <div class="widget-heading">
                        <h3 class="widget-title text-dark">
                     Price range
                  </h3>
                        <div class="clearfix"></div>
                    </div>
                    <div class="widget-body">
                        <div class="range-slider m-b-10"> <span id="ex2CurrentSliderValLabel"> Filter by price:<span id="ex2SliderVal"><strong>35</strong></span>€</span>
                            <br>
                            <input id="ex2" type="text" data-slider-min="1" data-slider-max="100" data-slider-step="1" data-slider-value="35" /> </div>
                    </div>
                </div>
                <!-- end:Pricing widget -->
                <div class="widget clearfix">
                    <!-- /widget heading -->
                    <div class="widget-heading">
                        <h3 class="widget-title text-dark">
                     Popular tags
                  </h3>
                        <div class="clearfix"></div>
                    </div>
                    <div class="widget-body">
                        <ul class="tags">
                            <li> <a href="#" class="tag">
                        Pizza
                        </a> </li>
                            <li> <a href="#" class="tag">
                        Sendwich
                        </a> </li>
                            <li> <a href="#" class="tag">
                        Sendwich
                        </a> </li>
                            <li> <a href="#" class="tag">
                        Fish 
                        </a> </li>
                            <li> <a href="#" class="tag">
                        Desert
                        </a> </li>
                            <li> <a href="#" class="tag">
                        Salad
                        </a> </li>
                        </ul>
                    </div>
                </div>
                <!-- end:Widget -->
            </div>
            <div class="col-xs-12 col-sm-7 col-md-8 col-lg-9">
                <div class="row">
                    <!-- Each popular food item starts -->
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 food-item">
                        <div class="food-item-wrap">
                            <div class="figure-wrap bg-image" data-image-src="http://placehold.it/380x210">
                                <div class="distance"><i class="fa fa-pin"></i>1240m</div>
                                <div class="rating pull-left"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>
                                <div class="review pull-right"><a href="#">198 reviews</a> </div>
                            </div>
                            <div class="content">
                                <h5><a href="#">The South"s Best Fried Chicken</a></h5>
                                <div class="product-name">Fried Chicken with cheese</div>
                                <div class="price-btn-block"> <span class="price">$ 15,99</span> <a href="profile.html" class="btn theme-btn-dash pull-right">Order Now</a> </div>
                            </div>
                            
                        </div>
                    </div>
                    <!-- Each popular food item starts -->
                    <!-- Each popular food item starts -->
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 food-item">
                        <div class="food-item-wrap">
                            <div class="figure-wrap bg-image" data-image-src="http://placehold.it/380x210">
                                <div class="distance"><i class="fa fa-pin"></i>1240m</div>
                                <div class="rating pull-left"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>
                                <div class="review pull-right"><a href="#">198 reviews</a> </div>
                            </div>
                            <div class="content">
                                <h5><a href="#">The South"s Best Fried Chicken</a></h5>
                                <div class="product-name">Fried Chicken with cheese</div>
                                <div class="price-btn-block"> <span class="price">$ 18,49</span> <a href="profile.html" class="btn theme-btn-dash pull-right">Order Now</a> </div>
                            </div>
                            
                        </div>
                    </div>
                    <!-- Each popular food item starts -->
                    <!-- Each popular food item starts -->
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 food-item">
                        <div class="food-item-wrap">
                            <div class="figure-wrap bg-image" data-image-src="http://placehold.it/380x210">
                                <div class="distance"><i class="fa fa-pin"></i>1240m</div>
                                <div class="rating pull-left"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>
                                <div class="review pull-right"><a href="#">198 reviews</a> </div>
                            </div>
                            <div class="content">
                                <h5><a href="#">The South"s Best Fried Chicken</a></h5>
                                <div class="product-name">Fried Chicken with cheese</div>
                                <div class="price-btn-block"> <span class="price">$ 21,19</span> <a href="profile.html" class="btn theme-btn-dash pull-right">Order Now</a> </div>
                            </div>
                            
                        </div>
                    </div>
                    <!-- Each popular food item starts -->
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 food-item">
                        <div class="food-item-wrap">
                            <div class="figure-wrap bg-image" data-image-src="http://placehold.it/380x210">
                                <div class="distance"><i class="fa fa-pin"></i>1240m</div>
                                <div class="rating pull-left"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>
                                <div class="review pull-right"><a href="#">198 reviews</a> </div>
                            </div>
                            <div class="content">
                                <h5><a href="#">The South"s Best Fried Chicken</a></h5>
                                <div class="product-name">Fried Chicken with cheese</div>
                                <div class="price-btn-block"> <span class="price">$ 21,19</span> <a href="profile.html" class="btn theme-btn-dash pull-right">Order Now</a> </div>
                            </div>
                            
                        </div>
                    </div>
                    <!-- Each popular food item starts -->
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 food-item">
                        <div class="food-item-wrap">
                            <div class="figure-wrap bg-image" data-image-src="http://placehold.it/380x210">
                                <div class="distance"><i class="fa fa-pin"></i>1240m</div>
                                <div class="rating pull-left"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>
                                <div class="review pull-right"><a href="#">198 reviews</a> </div>
                            </div>
                            <div class="content">
                                <h5><a href="#">The South"s Best Fried Chicken</a></h5>
                                <div class="product-name">Fried Chicken with cheese</div>
                                <div class="price-btn-block"> <span class="price">$ 21,19</span> <a href="profile.html" class="btn theme-btn-dash pull-right">Order Now</a> </div>
                            </div>
                            
                        </div>
                    </div>
                    <!-- Each popular food item starts -->
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 food-item">
                        <div class="food-item-wrap">
                            <div class="figure-wrap bg-image" data-image-src="http://placehold.it/380x210">
                                <div class="distance"><i class="fa fa-pin"></i>1240m</div>
                                <div class="rating pull-left"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>
                                <div class="review pull-right"><a href="#">198 reviews</a> </div>
                            </div>
                            <div class="content">
                                <h5><a href="#">The South"s Best Fried Chicken</a></h5>
                                <div class="product-name">Fried Chicken with cheese</div>
                                <div class="price-btn-block"> <span class="price">$ 21,19</span> <a href="profile.html" class="btn theme-btn-dash pull-right">Order Now</a> </div>
                            </div>
                            
                        </div>
                    </div>
                    <!-- Each popular food item starts -->
                    <div class="col-xs-12">
                        <nav aria-label="...">
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-label="Previous"> <span aria-hidden="true">«</span> <span class="sr-only">Previous</span> </a>
                                </li>
                                <li class="page-item active"> <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a> </li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next"> <span aria-hidden="true">»</span> <span class="sr-only">Next</span> </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- end:right row -->
            </div>
        </div>
    </div>
</section>
@endsection