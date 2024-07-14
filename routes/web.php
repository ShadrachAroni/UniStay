<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PropertyCategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\PropertyAmenityController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PropertyFeatureController;
use App\Http\Controllers\PropertyTypeController;
use App\Http\Controllers\SurroundingAreaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VerifyController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsAgent;
use App\Http\Middleware\IsUser;
use App\Models\Property;
use App\Models\PropertyAmenity;
use App\Models\PropertyCategory;
use App\Models\PropertyFeature;
use App\Models\PropertyType;
use App\Models\SurroundingArea;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    $property = Property::with('photos')->get();
    $properties = Property::with('photos')->get();
    $categories = PropertyCategory::all();
    $propertyTypes = PropertyType::all();
    $features = PropertyFeature::all();
    $amenities = PropertyAmenity::all();
    $surroundings = SurroundingArea::all();
    return view('home', compact('categories', 'propertyTypes', 'features', 'amenities', 'surroundings','properties','property'));
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/home', function () {
        $property = Property::with('photos')->get();
        $properties = Property::with('photos')->get();
        $categories = PropertyCategory::all();
        $propertyTypes = PropertyType::all();
        $features = PropertyFeature::all();
        $amenities = PropertyAmenity::all();
        $surroundings = SurroundingArea::all();
        return view('home', compact('categories', 'propertyTypes', 'features', 'amenities', 'surroundings','properties','property'));
    })->name('home');

Route::resource('details', \App\Http\Controllers\DetailsController::class);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/booking/requests', [PropertyController::class, 'requests'])->name('requests');
Route::post('/properties/{id}/book', [PropertyController::class, 'book'])->name('book');

});

Route::get('/pages/About', [DashboardController::class, 'about'])->name('about');
Route::get('/pages/Contact', [DashboardController::class, 'contact'])->name('contact');
Route::get('/register/Agent', [DashboardController::class, 'AgentRegister'])->name('register.agent');


//Route::get('policy', [DashboardController::class, 'showPolicy'])->name('policy.show');
//Route::get('terms', [DashboardController::class, 'showTerms'])->name('terms.show');

Route::resource('properties', \App\Http\Controllers\PropertyController::class);
Route::resource('verify', \App\Http\Controllers\VerifyController::class);
Route::resource('booking', \App\Http\Controllers\BookingController::class);

Route::post('/booking/cancel', [BookingController::class, 'cancel'])->name('booking.cancel');
Route::post('/booking/confirm', [BookingController::class, 'confirm'])->name('booking.confirm');
Route::post('/property/statis', [BookingController::class, 'status'])->name('status.change');

Route::get('/Listings', [PropertyController::class, 'view'])->name('view.listings');
Route::get('/pages/add', [PropertyController::class, 'add'])->name('pages.add');
Route::get('/pages/show/{id}', [PropertyController::class, 'show'])->name('pages.show');
Route::get('/pages/Listings', [PropertyController::class, 'search'])->name('properties.search');
Route::get('/pages/Listings', [PropertyController::class, 'search2'])->name('properties.search2');



Route::middleware(['auth', IsAdmin::class])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('users', \App\Http\Controllers\UsersController::class);
    Route::get('/Users/Admins', [AdminController::class, 'data'])->name('users.Admins');
    Route::get('/Users/Students', [UserController::class, 'data'])->name('users.Students');
    Route::get('/Users/Agents', [AgentController::class, 'data'])->name('users.Agents');
    Route::get('/Users/verification', [UsersController::class, 'verification'])->name('users.verification');
    Route::put('/users/approve/{id}', [UsersController::class, 'approve'])->name('users.approve');
    Route::put('/property/feature/{id}', [PropertyController::class, 'feature'])->name('property.feature');
    Route::put('/property/Unfeature/{id}', [PropertyController::class, 'Unfeature'])->name('property.Unfeature');


    Route::put('/users/reject/{id}', [UsersController::class, 'reject'])->name('users.reject');

    Route::get('/listings/types', [PropertyTypeController::class, 'types'])->name('listings.types');
    Route::resource('types', \App\Http\Controllers\PropertyTypeController::class);
    Route::get('/listings/features', [PropertyFeatureController::class, 'features'])->name('listings.features');
    Route::resource('features', \App\Http\Controllers\PropertyFeatureController::class);
    Route::get('/listings/amenities', [PropertyAmenityController::class, 'amenities'])->name('listings.amenities');
    Route::resource('surroundings', \App\Http\Controllers\SurroundingAreaController::class);
    Route::get('/listings/surroundings', [SurroundingAreaController::class, 'surroundings'])->name('listings.surroundings');
    Route::resource('amenities', \App\Http\Controllers\PropertyAmenityController::class);
    Route::get('/listings/categories', [PropertyCategoryController::class, 'categories'])->name('listings.categories');
    Route::resource('categories', \App\Http\Controllers\PropertyCategoryController::class);
    Route::get('/All/Listings', [AdminController::class, 'All'])->name('all');
    Route::get('/admin/Listings', [AdminController::class, 'MyListings'])->name('admin.MyListings');
    Route::get('/admin/Analytics', [AdminController::class, 'Analytics'])->name('Analytics');
    Route::get('/admin/Messages', [AdminController::class, 'messages'])->name('messages');
});

Route::middleware(['auth', IsAgent::class])->group(function () {
    Route::get('/agent/dashboard', [AgentController::class, 'index'])->name('agent.dashboard');
    Route::get('/agent/Listings', [AgentController::class, 'MyListings'])->name('agent.MyListings');
});

Route::middleware(['auth', IsUser::class])->group(function () {
    Route::get('user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('user/Booked/Listings', [UserController::class, 'booked'])->name('booked');
});







