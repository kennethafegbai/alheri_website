<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\paymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);
Route::get('about', [AboutController::class, 'index']);
Route::get('contact', [ContactController::class, 'index']);
Route::get('room', [RoomController::class, 'index']);
Route::get('room/{category}', [RoomController::class, 'roomDetails']);
Route::get('gallery', [GalleryController::class, 'index']);

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::any('logout', [AuthController::class, 'logout']);
Route::post('authenticate', [AuthController::class, 'authenticate']);

Route::post('customer-inquiry', [AdminController::class, 'customerInquiry']);


Route::group(['middleware'=>['auth']], function(){
    Route::get('dashboard', [AdminController::class, 'index']);
    Route::get('admin/rooms/categories', [AdminController::class, 'category']);
    Route::post('admin/rooms/categories', [AdminController::class, 'storeCategory']);
    Route::get('admin/rooms/categories/create', [AdminController::class, 'createCategory']);
    Route::get('admin/rooms/categories/{category}', [AdminController::class, 'editCategory']);
    Route::patch('admin/rooms/categories/{category}', [AdminController::class, 'updateCategory']);
    Route::delete('admin/rooms/categories/{category}', [AdminController::class, 'deleteCategory']);
    Route::get('admin/rooms', [AdminController::class, 'rooms']);
    Route::post('admin/rooms', [AdminController::class, 'storeRoom']);
    Route::patch('admin/rooms/{room}', [AdminController::class, 'updateRoom']);
    Route::delete('admin/rooms/{room}', [AdminController::class, 'deleteRoom']);
    Route::get('admin/rooms/create', [AdminController::class, 'createRoom']);
    Route::get('admin/rooms/{room}', [AdminController::class, 'editRoom']);
    Route::get('admin/reservations', [AdminController::class, 'reserves']);
    Route::post('admin/reservations', [AdminController::class, 'storeReserve']);
    Route::get('admin/reservations/{reserve}', [AdminController::class, 'editReserve']);
    Route::patch('admin/reservations/{reserve}', [AdminController::class, 'updateReserve']);
    Route::get('admin/reserves/create', [AdminController::class, 'createReserve']);
    Route::get('admin/categories/rooms', [AdminController::class, 'categoryRooms']);
    
    Route::get('admin/galleries', [AdminController::class, 'galleries']);
    Route::post('admin/galleries', [AdminController::class, 'storeGallery']);
    Route::get('admin/galleries/create', [AdminController::class, 'createGallery']);
    Route::get('admin/galleries/{gallery}', [AdminController::class, 'editGallery']);
    Route::patch('admin/galleries/{gallery}', [AdminController::class, 'updateGallery']);
    Route::delete('admin/galleries/{gallery}', [AdminController::class, 'deleteGallery']);

    Route::get('admin/settings', [AdminController::class, 'settings']);

    Route::put('admin/settings', [AdminController::class, 'updateSettings']);

    Route::post('settings/config', [AdminController::class, 'updateConfigSettings']);

    Route::patch('password-change', [AdminController::class, 'updatePassword']);

    Route::get('checkin-out', [AdminController::class, 'checkinOut']);
});

 // Paystack
 Route::post('paystack/payment', [paymentController::class, 'redirectToGateway'])->name('paystack.post');
 Route::get('/paystack/success', [paymentController::class, 'successPaystack'])->name('paystack.success');
 Route::get('/payment/successfull', [paymentController::class, 'paymentSuccess'])->name('payment.successfull');



 Route::get('route-clear', function () {
    \Artisan::call('route:clear');
    dd("Route Cleared");
});

Route::get('optimize', function () {
    \Artisan::call('optimize');
    dd("Optimized");
});

Route::get('optimize-clear', function () {
 \Artisan::call('optimize:clear');
 dd("Optimized clear");
});

Route::get('view-clear', function () {
    \Artisan::call('view:clear');
    dd("View Cleared");
});

Route::get('view-cache', function () {
    \Artisan::call('view:cache');
    dd("View cleared and cached again");
});

Route::get('config-cache', function () {
    \Artisan::call('config:cache');
    dd("configuration cleared and cached again");
});

Route::get('storage-link', function () {
    $path = public_path()."/storage";
    if (file_exists($path)) {
        unlink($path);
    }
    \Artisan::call('storage:link');
    dd("storage link created");
});

Route::get('migrate', function () {
 \Artisan::call('migrate:fresh');
 dd("Migrated");
});

