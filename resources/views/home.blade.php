<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="UniStay">

  
    <link rel="icon" type="image/png" href="{{ asset('img/icons8-accomodation-lineal-color-96.png') }}">
    <link rel="shortcut icon" href="{{ asset('img/icons8-accomodation-lineal-color-96.png') }}">
 
     <link rel="stylesheet" type="text/css" href ="{{asset('front/css/style.css')}}">
 
     <!--box-icon link-->
     <link rel="stylesheet"
     href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
 
 
     <!--google fons link-->
     <link rel="preconnect"
     href="https://fonts.googleapis.com">
     <link rel="preconnect"
     href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700;800;900&display=swap"  rel="stylesheet">
 
     <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
 
</head>
<body>

<!--header-->
<header class="sticky">
    <a href="#" class="logo">
        <img src="{{asset('../front/img/logo.png')}}">
    </a>
    <ul class="navbar open">
        <li><a href="#">Home</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Contact Us</a></li>
        <li><a href="#">View listings</a></li>
        <li><a href="#">Add Listing</a></li>
    </ul>

    <div class="h-btn">
        @if (Route::has('login'))
            <nav class="-mx-3 flex flex-1 justify-end">
                @auth
                    <a href="#" class="h-btn1" onclick="logout()" onclick="event.preventDefault();" onclick="event.preventDefault();">
                        Logout
                    </a>           
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
 
                    <a href="{{ url('/dashboard') }}" class="h-btn2">
                        Dashboard
                    </a>                
                @else
                    <a href="{{ route('login') }}" class="h-btn1">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="h-btn2">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
        <div class="bx bx-menu" id="menu-icon"></div> 
    </div>  
</header>

<!--home section-->
<section class="home">
    <div class="home-text" data-aos="zoom-in-up">
        <h1>Find Your Perfect Haven, Effortlessly</h1>
        <p>Discovering suitable student accommodation is now simpler than ever with our innovative application. Designed with students in mind, our platform streamlines the search process, offering a comprehensive database of verified properties tailored to your needs and preferences. </p>

        <div class="h-search">
            <form>
                <input type="search" placeholder="Search by location..." class="search-input">
                <input type="submit" value="Search">
            </form>
        </div>
    </div>

    <div class="home-img" data-aos="zoom-in-up">
        <img src="{{asset('front/img/hero.png')}}">
    </div>
</section>

<!--features section-->
<section class="feature" data-aos="zoom-in-up">
    <div class="center-left">
        <h2>Featured In</h2>
    </div>
    <div class="feature-content">

        <div class="f-img">
            <img src="{{asset('front/img/f1.png')}}">
        </div>

        <div class="f-img">
            <img src="{{asset('front/img/f2.png')}}">
        </div>

        <div class="f-img">
            <img src="{{asset('front/img/f3.png')}}">
        </div>

        <div class="f-img">
            <img src="{{asset('front/img/f4.png')}}">
        </div>

        <div class="f-img">
            <img src="{{asset('front/img/f5.png')}}">
        </div>
    </div>
</section>

<!--property section-->
<section class="property" data-aos="zoom-in-up">
    <div class="center-left">
        <h2>Featured listings</h2>
    </div>

    <div class="property-content">
        <div class="row">
            <img src="{{asset('front/img/p1.png')}}">
            <h5>Property</h5>
            <p>Somewhere,Kenya 10th street</p>
            <div class="list">
                <a href="#" class="residence-list">
                    <i class='bx bx-bed'></i>
                    4 Bed
                </a>
                <a href="#" class="residence-list">
                    <i class='bx bx-bath' ></i>
                2 Bath
                </a>
                <a href="#" class="residence-list">
                    <i class='bx bx-shape-square' ></i>
                    1203 sqft
                </a>
            </div>
        </div>

        <div class="row">
            <img src="{{asset('front/img/p2.png')}}">
            <h5>Property</h5>
            <p>Somewhere,Kenya 10th street</p>
            <div class="list">
                <a href="#" class="residence-list">
                    <i class='bx bx-bed'></i>
                    4 Bed
                </a>
                <a href="#" class="residence-list">
                    <i class='bx bx-bath' ></i>
                2 Bath
                </a>
                <a href="#" class="residence-list">
                    <i class='bx bx-shape-square' ></i>
                    1203 sqft
                </a>
            </div>
        </div>

        <div class="row">
            <img src="{{asset('front/img/p3.png')}}">
            <h5>Property</h5>
            <p>Somewhere,Kenya 10th street</p>
            <div class="list">
                <a href="#" class="residence-list">
                    <i class='bx bx-bed'></i>
                    4 Bed
                </a>
                <a href="#" class="residence-list">
                    <i class='bx bx-bath' ></i>
                2 Bath
                </a>
                <a href="#" class="residence-list">
                    <i class='bx bx-shape-square' ></i>
                    1203 sqft
                </a>
            </div>
        </div>
    </div>

    <div class="center-btn">
        <a href="#" class="btn">View all properties</a>
    </div>
</section>

<!--about section-->
<section class="about">
    <div class="about-img" data-aos="zoom-in-up">
        <img src="{{asset('front/img/Group 1.png')}}">
    </div>
    <div class="about-text" data-aos="zoom-in-up">
        <h2>We help Students find suitable accomodations</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum.Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum.</p>
        <a href="#" class="btn">Get In touch</a>
    </div>
</section>

<!--Subscribe section-->
<section class="Subscribe" data-aos="zoom-in-up">
    <div class="Subscribe-content">
        <h2>Let's simplify life with UniStay</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum.</p>
        <a href="#" class="btn">Get Started</a>
    </div>
</section>

<!--Contact Section-->
<section class="contact" data-aos="zoom-in-up">
    <div class="contact-content">
        <img src="{{asset('front/img/logo.png')}}">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,molestiae.</p>
        <div class="icons">
            <a href="#"><i class='bx bxl-facebook' ></i></a>
            <a href="#"><i class='bx bxl-instagram' ></i></a>
            <a href="#"><i class='bx bxl-twitter' ></i></a>
            <a href="#"><i class='bx bxl-youtube' ></i></a>
        </div>
    </div>

    <div class="contact-content">
        <h4>Listings</h4>
        <li><a href="#">Houses</a></li>
        <li><a href="#">Rooms</a></li>
        <li><a href="#">Appartment</a></li>
        <li><a href="#">Hostels</a></li>
    </div>

    <div class="contact-content">
        <h4>Listings</h4>
        <li><a href="#">Houses</a></li>
        <li><a href="#">Rooms</a></li>
        <li><a href="#">Appartment</a></li>
        <li><a href="#">Hostels</a></li>
    </div>

    <div class="contact-content">
        <h4>Listings</h4>
        <li><a href="#">Houses</a></li>
        <li><a href="#">Rooms</a></li>
        <li><a href="#">Appartment</a></li>
        <li><a href="#">Hostels</a></li>
    </div>
    
    <div class="contact-content">
        <h4>Listings</h4>
        <li><a href="#">Houses</a></li>
        <li><a href="#">Rooms</a></li>
        <li><a href="#">Appartment</a></li>
        <li><a href="#">Hostels</a></li>
    </div>
</section>
</div>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>


<!--js file-->
<script  src="{{asset('front/js/script.js')}}"></script>
<script>
    function logout() {
        document.getElementById('logout-form').submit();
    }
</script>
</body>
</html>