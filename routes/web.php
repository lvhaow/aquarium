<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Demo\DemoController;

use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\AnimalCategoryController;
use App\Http\Controllers\Home\AnimalController;
use App\Http\Controllers\Home\ContactController;
use App\Http\Controllers\Home\EventController;
use App\Http\Controllers\Home\FooterController;
use App\Http\Controllers\Home\GalleryController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\MapController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('frontend.index');
});

// Route::get('/', function () {
//     return view('frontend.event');
// });

// Route::controller(DemoController::class)->group(function () {
//     Route::get('/about', 'index')->name('about.page')->middleware('check');
//     Route::get('/contact', 'ContactMethod')->name('contact.page');
// });

// Admin All Route
Route::controller(AdminController::class)->group(function(){
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'Profile')->name('admin.profile');
    Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
    Route::post('/store/profile', 'StoreProfile')->name('store.profile');
    Route::get('/change/password', 'ChangePassword')->name('change.password');
    Route::post('/update/password', 'UpdatePassword')->name('update.password');
});


Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Home Slider All Route
Route::controller(HomeSliderController::class)->group(function(){
    Route::get('/home/slide', 'HomeSlider')->name('home.slide');
    Route::post('/update/slider', 'UpdateSlider')->name('update.slider');
 
});

// About Page All Route
Route::controller(AboutController::class)->group(function(){
    Route::get('/about/page', 'AboutPage')->name('about.page');
    Route::post('/update/about', 'UpdateAbout')->name('update.about');
    Route::get('/about', 'HomeAbout')->name('home.about');
    Route::get('/about/multi/image', 'AboutMultiImage')->name('about.multi.image');
    Route::post('/store/multi/image', 'StoreMultiImage')->name('store.multi.image');
    Route::get('/all/multi/image', 'AllMultiImage')->name('all.multi.image');
    Route::get('/edit/multi/image/{id}', 'EditMultiImage')->name('edit.multi.image');

    Route::post('/update/multi/image', 'UpdateMultiImage')->name('update.multi.image');
    Route::get('/delete/multi/image/{id}', 'DeleteMultiImage')->name('delete.multi.image');
});

//Gallery All Route
Route::controller(GalleryController::class)->group(function(){
    Route::get('/all/gallery', 'AllGallery')->name('all.gallery');
    Route::get('/add/gallery', 'AddGallery')->name('add.gallery');
    Route::post('/store/gallery', 'StoreGallery')->name('store.gallery');
    Route::get('/edit/gallery/{id}', 'EditGallery')->name('edit.gallery');
    Route::post('/update/gallery', 'UpdateGallery')->name('update.gallery');
    Route::get('/delete/gallery/{id}', 'DeleteGallery')->name('delete.gallery');
    Route::get('/gallery/details/{id}', 'GalleryDetails')->name('gallery.details');
    Route::get('/gallery', 'HomeGallery')->name('home.gallery');
});


//Event All Route
Route::controller(EventController::class)->group(function(){
    Route::get('/all/event', 'AllEvent')->name('all.event');
    Route::get('/add/event', 'AddEvent')->name('add.event');
    Route::post('/store/event', 'StoreEvent')->name('store.event');
    Route::get('/edit/event/{id}', 'EditEvent')->name('edit.event');
    Route::post('/update/event', 'UpdateEvent')->name('update.event');
    Route::get('/delete/event/{id}', 'DeleteEvent')->name('delete.event');
});

//Footer All Route
Route::controller(FooterController::class)->group(function(){
    Route::get('/footer/setup', 'FooterSetup')->name('footer.setup');
    Route::post('/update/footer', 'UpdateFooter')->name('update.footer');
});

//Contact All Route
Route::controller(ContactController::class)->group(function(){
    Route::get('/contact', 'Contact')->name('contact.me');
    Route::post('/store/message', 'StoreMessage')->name('store.message');
    Route::get('/contact/message', 'ContactMessage')->name('contact.message');
    Route::get('/delete/message/{id}', 'DeletetMessage')->name('delete.message');
});

//Map All Route
Route::controller(MapController::class)->group(function(){
    Route::get('/map/setup', 'MapSetup')->name('map.setup');
    Route::post('/update/map', 'UpdateMap')->name('update.map');
});


//Animal Category All Route
Route::controller(AnimalCategoryController::class)->group(function(){
    Route::get('/all/animal/category', 'AllAnimalCategory')->name('all.animal.category');
    Route::get('/add/animal/category', 'AddAnimalCategory')->name('add.animal.category');
    Route::post('/store/animal/category', 'StoreAnimalCategory')->name('store.animal.category');
    Route::get('/edit/animal/category/{id}', 'EditAnimalCategory')->name('edit.animal.category');
    Route::post('/update/animal/category/{id}', 'UpdateAnimalCategory')->name('update.animal.category');
    Route::get('/delete/animal/category/{id}', 'DeleteAnimalCategory')->name('delete.animal.category');
});

//Animal All Route
Route::controller(AnimalController::class)->group(function(){
    Route::get('/all/animal', 'AllAnimal')->name('all.animal');
    Route::get('/add/animal', 'AddAnimal')->name('add.animal');
    Route::post('/store/animal', 'StoreAnimal')->name('store.animal');
    Route::get('/edit/animal/{id}', 'EditAnimal')->name('edit.animal');
    Route::post('/update/animal', 'UpdateAnimal')->name('update.animal');
    Route::get('/delete/animal/{id}', 'DeleteAnimal')->name('delete.animal');

    Route::get('/animal/details/{id}', 'AnimalDetails')->name('animal.details');
    Route::get('/category/animal/{id}', 'CategoryAnimal')->name('category.animal');
    Route::get('/animal', 'HomeAnimal')->name('home.animal');
    
});





