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
<link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

<!--google fonts link-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.27/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

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
        <li><a href="{{route('view.listings')}}">All listings</a></li>
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

<section class="ftco-section img bg-hero" style="background-color: gray;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="card" style=" background-color: rgba(0, 0, 0, 0.5); padding: 20px; color: white; border-radius: 10px; border-radius: 20px; ">
                <div class="card-body">
                    <h4 class="card-title" style="color: white;">Add new Listing</h4>
                    <form action="{{ route('properties.store') }}" id="listingForm" method="POST" enctype="multipart/form-data" style="width: 700px;">
                        @csrf

                        <div class="mb-3">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" style="border-radius: 10px;" required>
                        </div>

                        <div class="mb-3">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" style="border-radius: 10px;"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="policies">Policies</label>
                            <textarea class="form-control" id="policies" name="policies" rows="4" style="border-radius: 10px;"></textarea>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-sm-6">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" id="country" name="country" style="border-radius: 10px;" required>
                            </div>

                            <div class="mb-3 col-sm-6">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" name="city" style="border-radius: 10px;" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-sm-6">
                                <label for="street">Street</label>
                                <input type="text" class="form-control" id="street" name="street" style="border-radius: 10px;" required>
                            </div>

                            <div class="mb-3 col-sm-6">
                                <label for="area_name">Area Name  (Optional)</label>
                                <input type="text" class="form-control" id="area_name" style="border-radius: 10px;" name="area_name">
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-sm-6">
                                <label for="beds">Range of number of beds</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="beds_start" name="beds_start" placeholder="Min" style="border-top-left-radius: 10px; border-bottom-left-radius: 10px;" required>
                                    <span class="input-group-text">to</span>
                                    <input type="number" class="form-control" id="beds_end" name="beds_end" placeholder="Max" style="border-top-right-radius: 10px; border-bottom-right-radius: 10px;" required>
                                </div>
                            </div>

                            <div class="mb-3 col-sm-6">
                                <label for="baths">Number of Bathrooms</label>
                                <input type="number" class="form-control" id="baths" name="baths" step="0" style="border-radius: 10px;" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-sm-6">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" name="price" step="0.01" style="border-radius: 10px;" required>
                            </div>


                            <div class="mb-3 col-sm-6">
                                <label for="property_type_id">Type</label>
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
                                <div style="max-height: 200px; overflow-y: auto;">
                                    @foreach($features as $feature)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="feature{{ $feature->id }}" name="features[]" value="{{ $feature->id }}">
                                            <label class="form-check-label" for="feature{{ $feature->id }}">
                                                {{ $feature->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="amenities">Amenities</label>
                                <div style="max-height: 200px; overflow-y: auto;">
                                    @foreach($amenities as $amenity)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="amenity{{ $amenity->id }}" name="amenities[]" value="{{ $amenity->id }}">
                                            <label class="form-check-label" for="amenity{{ $amenity->id }}">
                                                {{ $amenity->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <label for="categories">Categories</label>
                                <div style="max-height: 200px; overflow-y: auto;">
                                    @foreach($categories as $category)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="category{{ $category->id }}" name="categories[]" value="{{ $category->id }}">
                                            <label class="form-check-label" for="category{{ $category->id }}">
                                                {{ $category->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="surroundings">Surrounding Area Availabilities</label>
                                <div style="max-height: 200px; overflow-y: auto;">
                                    @foreach($surroundings as $surrounding)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="surrounding{{ $surrounding->id }}" name="surroundings[]" value="{{ $surrounding->id }}">
                                            <label class="form-check-label" for="surrounding{{ $surrounding->id }}">
                                                {{ $surrounding->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="availability_status">Availability Status</label>
                            <select class="form-control" id="availability_status" name="availability_status" style="border-radius: 10px;" required>
                                <option value="available">Available</option>
                                <option value="booked">Booked</option>
                                <option value="unavailable">Unavailable</option>
                            </select>
                        </div>

                        <br>
                        <label for="location">Drag pointer to select location</label>

                        <div id="map" style="height: 400px; width: 100%;"></div>
        
                        <input type="hidden" id="latitude" name="latitude">
                        <input type="hidden" id="longitude" name="longitude">

                        <br>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="photos">Photos</label>
                                <input type="file" class="form-control-file" id="photos" name="photos[]" multiple>
                            </div>
                            <div class="col-sm-6">
                                <label for="videos">Choose a Descriptive Video</label>
                                <input type="file" id="videoInput" class="form-control-file" name="video" accept="video/*" required>
                            </div>
                        </div>

                       

                        <br>
                        <input class="btn btn-primary" type="submit" value="Add Listing">
                    <form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Google Maps API -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGI83diAumDCTbY-AwEXMPmOR6fj6qIis&callback=initMap" async defer></script>

<script>
    function logout() {
        document.getElementById('logout-form').submit();
    }
    @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif

    @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch(type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;

            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;

            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break; 
        }
    @endif

        // Initialize map
        function initMap() {
        var initialLocation = { lat: -1.286389, lng: 36.817223 };
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 8,
            center: initialLocation
        });

        var marker = new google.maps.Marker({
            position: initialLocation,
            map: map,
            draggable: true
        });

        google.maps.event.addListener(marker, 'dragend', function(event) {
            document.getElementById('latitude').value = event.latLng.lat();
            document.getElementById('longitude').value = event.latLng.lng();
        });

        // Update input fields on marker drag
        document.getElementById('latitude').value = initialLocation.lat;
        document.getElementById('longitude').value = initialLocation.lng;
    }

        document.getElementById('videoInput').addEventListener('change', function(event) {
            if (this.files.length > 1) {
                alert('You can only upload one video.');
                this.value = ''; // Clear the input
            }
        });
</script>
</body>
</html>