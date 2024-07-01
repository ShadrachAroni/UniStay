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

<style>
    .file-item {
        margin-bottom: 10px;
        border: 1px solid #ccc;
        padding: 5px;
    }

    .file-item img,
    .file-item video {
        max-width: 100%;
        height: auto;
    }

    .file-item button {
        margin-top: 5px;
        background-color: #ff6347;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
    }

    #map {
        height: 500px;
        width: 100%;
        margin-top: 20px;
    }
</style>
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
                            <div class="col-sm-6">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" id="country" name="country" style="border-radius: 10px;" required>
                            </div>

                            <div class="col-sm-6">
                                <label for="county">County</label>
                                <input type="text" class="form-control" id="county" name="county" style="border-radius: 10px;">
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

                        <div class="mb-3">
                            <label for="property_type_id">Property Type</label>
                            <select class="form-control" id="property_type_id" name="property_type_id" style="border-radius: 10px;" required>
                                @foreach($propertyTypes as $propertyType)
                                    <option value="{{ $propertyType->id }}">{{ $propertyType->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <label for="features">Features</label>
                                <div style="height: 200px; overflow-y: auto;">
                                    <div id="features" style="border-radius: 10px;">
                                        @foreach($features as $feature)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="features[]" value="{{ $feature->id }}" id="feature_{{ $feature->id }}">
                                                <label class="form-check-label" for="feature_{{ $feature->id }}">
                                                    {{ $feature->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="amenities">Amenities</label>
                                <div style="height: 200px; overflow-y: auto;">
                                    <div id="amenities" style="border-radius: 10px;">
                                        @foreach($amenities as $amenity)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="amenities[]" value="{{ $amenity->id }}" id="amenity_{{ $amenity->id }}">
                                                <label class="form-check-label" for="amenity_{{ $amenity->id }}">
                                                    {{ $amenity->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <label for="categories">Categories</label>
                                <div style="height: 200px; overflow-y: auto;">
                                    <div id="categories" style="border-radius: 10px;">
                                        @foreach($categories as $category)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $category->id }}" id="category_{{ $category->id }}">
                                                <label class="form-check-label" for="category_{{ $category->id }}">
                                                    {{ $category->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="surroundings">Surrounding Area Availabilities</label>
                                <div style="height: 200px; overflow-y: auto;">
                                    <div id="surroundings" style="border-radius: 10px;">
                                        @foreach($surroundings as $surrounding)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="surroundings[]" value="{{ $surrounding->id }}" id="surrounding_{{ $surrounding->id }}">
                                                <label class="form-check-label" for="surrounding_{{ $surrounding->id }}">
                                                    {{ $surrounding->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
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

                        <div class="row">
                            <div class="col-sm-6">
                                <label for="photos">Photos</label>
                                <input type="file" class="form-control-file" id="photos" name="photos[]" multiple onchange="showSelectedFiles(event, 'photoPreview')">
                                <br>
                                <div id="photoPreview" class="file-preview"></div>
                            </div>
                            <div class="col-sm-6">
                                <label for="videos">Videos</label>
                                <input type="file" class="form-control-file" id="videos" name="videos[]" multiple onchange="showSelectedFiles(event, 'videoPreview')">
                                <br>
                                <div id="videoPreview" class="file-preview"></div>
                            </div>
                        </div>

                        <div id="map"></div>
                        <input type="hidden" id="latitude" name="latitude">
                        <input type="hidden" id="longitude" name="longitude">

                        <br>
                        <input class="btn btn-primary" type="submit" value="Add">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Google Maps API -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGI83diAumDCTbY-AwEXMPmOR6fj6qIis&callback=initMap" async defer></script>

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>


<script>
    function logout() {
        document.getElementById('logout-form').submit();
    }

    function showSelectedFiles(event, previewId) {
        const input = event.target;
        const preview = document.getElementById(previewId);
        preview.innerHTML = ''; // Clear previous previews

        if (input.files) {
            const files = input.files;
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();

                reader.onload = function (e) {
                    const fileType = file.type.split('/')[0]; // 'image' or 'video'
                    const fileContainer = document.createElement('div');
                    fileContainer.classList.add('file-item');

                    if (fileType === 'image') {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.maxWidth = '100%';
                        img.style.height = 'auto';
                        fileContainer.appendChild(img);
                    } else if (fileType === 'video') {
                        const video = document.createElement('video');
                        video.src = e.target.result;
                        video.controls = true;
                        video.style.maxWidth = '100%';
                        video.style.height = 'auto';
                        fileContainer.appendChild(video);
                    }

                    // Add file name and remove button
                    const fileName = document.createElement('p');
                    fileName.textContent = file.name;
                    fileContainer.appendChild(fileName);

                    const removeBtn = document.createElement('button');
                    removeBtn.textContent = 'Remove';
                    removeBtn.addEventListener('click', function() {
                        fileContainer.remove();
                    });
                    fileContainer.appendChild(removeBtn);

                    preview.appendChild(fileContainer);
                };

                reader.readAsDataURL(file);
            }
        }
    }

    let map;
    let marker;

    function initMap() {
        const initialLocation = { lat: -34.397, lng: 150.644 };
        map = new google.maps.Map(document.getElementById('map'), {
            center: initialLocation,
            zoom: 8
        });

        marker = new google.maps.Marker({
            position: initialLocation,
            map: map,
            draggable: true
        });

        google.maps.event.addListener(marker, 'dragend', function() {
            const position = marker.getPosition();
            document.getElementById('latitude').value = position.lat();
            document.getElementById('longitude').value = position.lng();
        });
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
</script>

</body>
</html>
