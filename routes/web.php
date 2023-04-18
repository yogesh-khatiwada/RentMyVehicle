<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/about', function () {
    return view('about');
});
Route::get('/team', function () {
    return view('team');
});
Route::get('/regis', function () {
    return view('regis');
});
Route::get('/testimonial', function () {
    return view('testimonial');
});
Route::get('/index', function () {
    return view('index');
});
// Route::get('/mybooking', function () {
//     return view('mybooking');
// });
//payment
// Route::get('/adminpayment', [PaymentController::class, 'adminpayment']);
Route::post('/khalti/payment/verify',[PaymentController::class,'verifyPayment'])->name('khalti.verifyPayment');

Route::post('/khalti/payment/store',[PaymentController::class,'storePayment'])->name('khalti.storePayment');

Route::get('/Car', [FrontendController::class, 'Car']);
Route::get('/mybooking', [FrontendController::class, 'mybooking'])->middleware('auth', 'verified');
Route::get('/offer', [FrontendController::class, 'offer']);
Route::get('/detail/{id}', [FrontendController::class, 'detail'])->name('detail')->middleware('auth');
Route::get('/Bike', [FrontendController::class, 'Bike']);
// Route::post('/detail/{id}', [BookingController::class,'store'])->name('detail.store')->middleware('auth');
// Route::get('/detail/finish/{id}', [FrontendController::class,'detailFinish'])->name('detail.finish')->middleware('auth');

Route::get('/car/{id}', [App\Http\Controllers\FrontendController::class, 'cardetail'])->name('car.detail');
Route::get('/car/rent/{id}', [App\Http\Controllers\FrontendController::class, 'rentdetail'])->name('rent.detail');
Route::get('/offer/{id}', [App\Http\Controllers\FrontendController::class, 'offerdetail'])->name('offer.detail');
Route::post('/offer/{id}', [App\Http\Controllers\BookedController::class, 'store'])->name('offer.booked.store');
Route::middleware(['auth'])->group(function () {
    Route::get('/car/{id}/booked', [App\Http\Controllers\FrontendController::class, 'carbooked'])->name('car.booked');
    Route::post('/car-booked/{id}', [App\Http\Controllers\BookedController::class, 'store'])->name('car.booked.store');
    Route::get('/car-rent/{id}', [App\Http\Controllers\FrontendController::class, 'carrent'])->name('car.rent');
    Route::post('/car/{id}', [App\Http\Controllers\RentController::class, 'store'])->name('car.rent.store');
});
Route::post('/regis', [App\Http\Controllers\customerController::class, 'store'])->name('front.customer.store');
Route::post('/contactdetail', [App\Http\Controllers\MessageController::class, 'store'])->name('message.store');
Route::get('/contactdetail', [App\Http\Controllers\MessageController::class, 'index'])->name('message.index');
Route::post('/testimonial', [App\Http\Controllers\TestimonialController::class, 'store'])->name('testimonial.store');
Route::get('/testimonial', [App\Http\Controllers\TestimonialController::class, 'testimonial'])->name('testimonial.index');
// Route::resource('/contactdetail', App\Http\Controllers\MessageController::class);
// Route::get('/bike', function () {
//     return view('bike');
// });
Route::get('/contactdetail', function () {
    return view('contactdetail');

    // Route::post('/contactdetail', 'ContactdetailController@submitContactForm')->name('contact.submit');
});


// Route::get('/bike', [BikeController::class, 'backend.pages.bike.index']);
// Route::post('/bike', [BikeController::class, 'store']);


Route::get('/', [App\Http\Controllers\FrontendController::class, 'homepage']);
// Route::get('/bike', [App\Http\Controllers\FrontendController::class, 'bikedetail']);
// Route::get('/car', [App\Http\Controllers\FrontendController::class, 'cardetail']);

// Route::get('/team', [App\Http\Controllers\FrontendController::class, 'teampage'])->middleware('auth', 'verified')->name('my.team');
Route::get('/home', [App\Http\Controllers\FrontendController::class, 'index'])->middleware('auth', 'verified')->name('my.home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->middleware( 'admin')->group(function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'admin']);
    Route::get('/nbooking', [App\Http\Controllers\BookedController::class, 'index'])->name('bookedcar.index');
    Route::get('/cobooking', [App\Http\Controllers\BookedController::class, 'indexone'])->name('bookedcar.index');
    Route::get('/cbooking', [App\Http\Controllers\BookedController::class, 'indextwo'])->name('bookedcar.index');

    Route::get('/nbooking', [App\Http\Controllers\BookedofferController::class, 'index'])->name('bookedbike.index');
    Route::get('/cobooking', [App\Http\Controllers\BookedofferController::class, 'indexone'])->name('bookedbike.index');
    Route::get('/cbooking', [App\Http\Controllers\BookedofferController::class, 'indextwo'])->name('bookedbike.index');
    // Route::get('/nbooking/{type}/status/{id}', [App\Http\Controllers\BookedController::class, 'index'])->name('bookedcar.index');
    Route::get('/nbooking/{type}/status/{id}', [App\Http\Controllers\BookedController::class, 'statusUpdate'])->name('bookedcar.index.update');
    Route::get('/nrent', [App\Http\Controllers\RentController::class, 'index'])->name('rentcar.index');
    Route::get('/corent', [App\Http\Controllers\RentController::class, 'indexone'])->name('rentcar.index');
    Route::get('/crent', [App\Http\Controllers\RentController::class, 'indextwo'])->name('rentcar.index');
   
    Route::get('/nrent/{type}/status/{id}', [App\Http\Controllers\RentController::class, 'statusUpdate'])->name('rentcar.index.update');
    // Route::resource('/category', App\Http\Controllers\CategoryController::class);
    Route::resource('/car', App\Http\Controllers\CarController::class);

    Route::resource('/bike', App\Http\Controllers\BikeController::class);
    Route::resource('/customer', App\Http\Controllers\CustomerController::class);
    Route::resource('/renter', App\Http\Controllers\RenterController::class);
    Route::resource('/contact', App\Http\Controllers\ContactController::class);
    Route::resource('/offer', App\Http\Controllers\OfferController::class);
    Route::resource('/user', App\Http\Controllers\UserController::class);
    Route::resource('/booking', App\Http\Controllers\BookingController::class);
    Route::as('admin.')->group(function () {
        Route::resource('/message', App\Http\Controllers\MessageController::class);
        Route::resource('/payment', App\Http\Controllers\RentController::class);
        Route::resource('/testimonial', App\Http\Controllers\TestimonialController::class);
    });

    Route::resource('/user', App\Http\Controllers\UserController::class)->middleware('admin');
});

Route::prefix('customer')->as('customer.')->middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\CusttomerController::class, 'customer']);
    Route::resource('/bike', App\Http\Controllers\CustomerbikeController::class);
    Route::resource('/car', App\Http\Controllers\CustomercarController::class);
});