<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Demo\DemoController;

use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\AnimalCategoryController;
use App\Http\Controllers\Home\AnimalController;
use App\Http\Controllers\Home\EventController;
use App\Http\Controllers\Home\GalleryController;
use App\Http\Controllers\Home\HomeSliderController;
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
    
});

//Event All Route
Route::get('/events/create', [EventController::class, 'create'])->name('events.create');

// Route to store the new event in the database
Route::post('/events', [EventController::class, 'store'])->name('events.store');

// Route to show the edit event form
Route::get('/events/{id}/edit', [EventController::class, 'edit'])->name('events.edit');

// Route to update the event in the database
Route::put('/events/{id}', [EventController::class, 'update'])->name('events.update');

// Route to delete the event from the database
// Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');

Route::get('/delete/events/{id}', [EventController::class, 'DeleteEvent'])->name('delete.event');

// Route to show all events
Route::get('/events', [EventController::class, 'index'])->name('events.index');

// Route to show a specific event
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');



