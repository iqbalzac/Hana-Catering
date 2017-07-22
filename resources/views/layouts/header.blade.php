<header id="header" class="header-scroll top-header headrom">
	<!-- .navbar -->
	<nav class="navbar navbar-dark">
	    <div class="container">
	        <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
	        <a class="navbar-brand" href="{{ url('/beranda') }}"> <img class="img-rounded" src="images/food-picky-logo.png" alt=""> </a>
	        <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
	            <ul class="nav navbar-nav">
	                <li class="nav-item">
	                	<a class="nav-link {{ ($nav == 'beranda') ? 'active' : '' }}" href="{{ url('/beranda') }}">Beranda <span class="sr-only">(current)</span></a> 
	                </li>
	                <li class="nav-item dropdown">
	                	<a class="nav-link dropdown-toggle {{ ($nav == 'menu-satuan' or $nav == 'menu-paketan') ? 'active' : '' }}" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Makanan</a>
	                    <div class="dropdown-menu">
	                    	<a class="dropdown-item {{ ($nav == 'menu-satuan') ? 'active' : '' }}" href="{{ url('menu-satuan') }}">Menu Satuan</a>
	                    	<a class="dropdown-item {{ ($nav == 'menu-paketan') ? 'active' : '' }}" href="{{ url('menu-paketan') }}">Menu Paket</a>
	                    </div>
	                </li>
	                <li class="nav-item">
	                	<a class="nav-link {{ ($nav == 'keranjang-belanja') ? 'active' : '' }}" href="{{ url('/keranjang-belanja') }}"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a> 
	                </li>
	            </ul>
	        </div>
	    </div>
	</nav>
	<!-- /.navbar -->
</header>