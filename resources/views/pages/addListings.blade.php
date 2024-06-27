<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="UniStay">

  
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}">
 
     <link rel="stylesheet" type="text/css" href ="{{asset('front/css/style.css')}}">
     <link rel="stylesheet" type="text/css" href ="{{asset('contact/css/style.css')}}">
 
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
        <li><a href="{{ route('home')}}">Home</a></li>
        <li><a href="{{ route('about')}}">About Us</a></li>
        <li><a href="{{route('contact')}}">Contact Us</a></li>
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


<section class="ftco-section img bg-hero" style="background-image: url({{ asset('front/img/p2.png')}});">
		<div class="container">
			<div class="row justify-content-center">
            <div class="card" style=" background-color: rgba(0, 0, 0, 0.5); padding: 20px; color: white; border-radius: 10px; border-radius: 20px; ">
							<div class="card-body">
								<h4 class="card-title" style="color: white;">Add Listing</h4>
                                <form action="{{ route('properties.store') }}" method="POST" enctype="multipart/form-data" style="width: 700px;">
									<div class="mb-3">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="title" name="title" style="border-radius: 10px;" required>
									</div>
									
                                    <div class="mb-3">
                                    <label for="description">Description</label>
                                     <textarea class="form-control" id="description" name="description" rows="4" style="border-radius: 10px;" required></textarea>
									</div>
                                    
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="country">Country</label>
                                            <input type="text" class="form-control" id="country" name="country" style="border-radius: 10px;" required>
                                        </div>

                                        <div class="col-sm-6">
                                            <label for="county">County</label>
                                            <input type="text" class="form-control" id="county" name="county" style="border-radius: 10px;" required>
                                        </div>
                                    </div>


                                   <div class="row">
                                        <div class="col-sm-6">
                                            <label for="city">City</label>
                                            <input type="text" class="form-control" id="city" name="city" style="border-radius: 10px;" required>
                                        </div>
                                        
                                        <div class="col-sm-6">
                                            <label for="street">Street</label>
                                            <input type="text" class="form-control" id="street" name="street" style="border-radius: 10px;" required>
                                        </div>
                                   </div>


                                   <div class="row">
                                        <div class="col-sm-6">
                                            <label for="area_name">Area Name</label>
                                            <input type="text" class="form-control" id="area_name" style="border-radius: 10px;" name="area_name">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="price">Price</label>
                                            <input type="number" class="form-control" id="price" name="price" step="0.01" style="border-radius: 10px;" required>
                                        </div>
                                   </div>

                                   <div class="row">
                                    <div class="col-sm-6">
                                        <label for="category_id">Category</label>
                                        <select class="form-control" id="category_id" name="category_id"  style="border-radius: 10px; " required>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="property_type_id">Property Type</label>
                                        <select class="form-control" id="property_type_id" name="property_type_id" style="border-radius: 10px;" required>
                                            @foreach($propertyTypes as $propertyType)
                                                <option value="{{ $propertyType->id }}">{{ $propertyType->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                   </div>

                                   <div class="row">
                                    <div class="col-sm-6">
                                         <label for="features">Features</label>
                                        <select multiple class="form-control" id="features" name="features[]"  style="border-radius: 10px; ">
                                            @foreach($features as $feature)
                                                <option value="{{ $feature->id }}">{{ $feature->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="amenities">Amenities</label>
                                        <select multiple class="form-control" id="amenities" name="amenities[]"  style="border-radius: 10px; ">
                                            @foreach($amenities as $amenity)
                                                <option value="{{ $amenity->id }}">{{ $amenity->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                   </div>

                                   <div class="mb-3">
                                        <label for="availability_status">Availability Status</label>
                                        <select class="form-control" id="availability_status" name="availability_status"  style="border-radius: 10px; " required>
                                            <option value="available">Available</option>
                                            <option value="booked">Booked</option>
                                            <option value="unavailable">Unavailable</option>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="photos">Photos</label>
                                            <input type="file" class="form-control-file" id="photos" name="photos[]" multiple>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="videos">Videos</label>
                                            <input type="file" class="form-control-file" id="videos" name="videos[]" multiple>
                                        </div>
                                    </div>
                                   <br>
									<input class="btn btn-primary" type="submit" value="Add">
								</form>
							</div>
						</div>
               
			</div>
		</div>
	</section>

<!--js file-->
<script  src="{{asset('front/js/script.js')}}"></script>
<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/main.js"></script>

<script>
    function logout() {
        document.getElementById('logout-form').submit();
    }
</script>
</body>
</html>