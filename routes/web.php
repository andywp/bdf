<?php

use Illuminate\Support\Facades\Route;
use App\Events\OrderStatusUpdated;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MentorController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Http;
//use Meta;
//use App\Models\Mentor;
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

/* Route::get('/', function () {
    //event(new OrderStatusUpdated('Hello Echo'));
    return view('welcome');
}); */

/* Route::get('/negara', function () {
    //event(new OrderStatusUpdated('Hello Echo'));
    $response = Http::get('https://countriesnow.space/api/v0.1/countries/');
   // dd($response->json());

    foreach($response->json()['data'] as $r){

        \App\Models\Countries::create(['name' => $r['country']]);

    }


}); */

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('landing');
Route::get('/history', [App\Http\Controllers\BdfController::class, 'history'])->name('history');
Route::get('/gallery', [App\Http\Controllers\BdfController::class, 'gallery'])->name('gallery');
Route::get('/ipd', [App\Http\Controllers\BdfController::class, 'ipd'])->name('ipd');
Route::get('/publication', [App\Http\Controllers\BdfController::class, 'publication'])->name('publication');
Route::post('/publication', [App\Http\Controllers\BdfController::class, 'download'])->name('download');
Route::get('/media-advisory', [App\Http\Controllers\BdfController::class, 'mediaadvisory'])->name('mediaadvisory');
Route::get('/contact', [App\Http\Controllers\BdfController::class, 'contact'])->name('contact');
Route::post('/contact', [App\Http\Controllers\BdfController::class, 'contactsend'])->name('contactsend');
//
Auth::routes();

/**register */



Route::middleware(['guest:web','PreventBackHistory'])->group(function(){
    //Route::view('/login','auth.login')->name('login');
    Route::get('/login', function () {
        \Meta::set('title', 'Login | BDF');
        \Meta::set('description', 'Directorate General of Information and Public Diplomacy, Ministry of Foreign Affairs of Republic of Indonesia');
        \Meta::set('image', asset('images/home-logo.png'));
        return view('auth.login');
    })->name('login');
    
    Route::post('/login',[App\Http\Controllers\UserController::class,'check'])->name('logincheck');
});
Route::group(['middleware' => 'auth:web,admin'], function() {
    Route::post('/logout',[App\Http\Controllers\UserController::class,'logout'])->name('logout');

    Route::get('/commitee', [App\Http\Controllers\RegisterController::class,'commitee'])->name('commitee');
    Route::post('/commitee', [App\Http\Controllers\RegisterController::class,'commitee_create'])->name('commitee_create');
    /* Physical Attendance */
    Route::get('/physical-attendance', [App\Http\Controllers\RegisterController::class,'physical_attendance'])->name('physicalattendance');
    Route::post('/physical-attendance', [App\Http\Controllers\RegisterController::class,'physical_attendance_create'])->name('physicalattendance_store');
    /* Virtual Attendance */
    Route::get('/virtual-attendance', [App\Http\Controllers\RegisterController::class,'virtual_attendance'])->name('virtualattendance');
    Route::post('/virtual-attendance', [App\Http\Controllers\RegisterController::class,'virtual_attendance_create'])->name('virtualattendance_store');
    /*Media */
    Route::get('/media', [App\Http\Controllers\RegisterController::class,'media'])->name('media');
    Route::post('/media', [App\Http\Controllers\RegisterController::class,'media_create'])->name('media_store');
    /* Guest Attendance */
    Route::get('/guest', [App\Http\Controllers\RegisterController::class,'guest'])->name('guest');
    Route::post('/guest', [App\Http\Controllers\RegisterController::class,'guest_create'])->name('guest_store');
    /* commitee */
    Route::get('/commitee', [App\Http\Controllers\RegisterController::class,'commitee'])->name('commitee');
    Route::post('/commitee', [App\Http\Controllers\RegisterController::class,'commitee_create'])->name('commitee_create');
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' =>['web', 'auth:admin']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
//Route::group(['namespace' => 'App\Http\Controllers\Admin'], function(){
    Route::prefix('rasa-admin')->name('admin.')->group(function(){
        Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
            Route::view('/login','admin.auth.login')->name('login');
            Route::post('/login',[AdminController::class,'check'])->name('login');
        });

        Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
            Route::view('/','admin.home')->name('home')->middleware('checkRole:admin,user');
            Route::post('/logout',[AdminController::class,'logout'])->name('logout');
       

            /* mentor */
            Route::prefix('mentor')->name('mentor.')->group(function(){
                Route::get('/', [MentorController::class,'index'])->name('index');
                Route::post('data',[MentorController::class,'dataTable'])->name('data');
                Route::get('/create', [MentorController::class,'create'])->name('create');
                Route::post('/create', [MentorController::class,'store'])->name('store');
                Route::get('/{id}/show', [MentorController::class,'show'])->name('show');
                Route::get('/{id}/edit', [MentorController::class,'edit'])->name('edit');
                Route::put('/{id}/update',  [MentorController::class,'update'])->name('update');
                Route::delete('/{id}/delete', [MentorController::class,'destroy'])->name('destroy');
            });

            /* Studen */
            Route::prefix('student')->name('student.')->group(function(){
                Route::get('/', [StudentController::class,'index'])->name('index');
                Route::post('data',[StudentController::class,'dataTable'])->name('data');
                Route::get('/create', [StudentController::class,'create'])->name('create');
                Route::post('/create', [StudentController::class,'store'])->name('store');
                Route::get('/{id}/show', [StudentController::class,'show'])->name('show');
                Route::get('/{id}/edit', [StudentController::class,'edit'])->name('edit');
                Route::put('/{id}/update',  [StudentController::class,'update'])->name('update');
                Route::delete('/{id}/delete', [StudentController::class,'destroy'])->name('destroy');
            });
            /* bdf */
            Route::middleware('checkRole:admin')->group(function () {
                Route::prefix('bdf')->name('bdf.')->group(function(){
                    Route::get('/', [App\Http\Controllers\Admin\BdfController::class,'index'])->name('index');
                    Route::post('data',[App\Http\Controllers\Admin\BdfController::class,'dataTable'])->name('data');
                    Route::get('/create', [App\Http\Controllers\Admin\BdfController::class,'create'])->name('create');
                    Route::post('/create', [App\Http\Controllers\Admin\BdfController::class,'store'])->name('store');
                    Route::get('/{id}/show', [App\Http\Controllers\Admin\BdfController::class,'show'])->name('show');
                    Route::get('/{id}/edit', [App\Http\Controllers\Admin\BdfController::class,'edit'])->name('edit');
                    Route::put('/{id}/update',  [App\Http\Controllers\Admin\BdfController::class,'update'])->name('update');
                    Route::delete('/{id}/delete', [App\Http\Controllers\Admin\BdfController::class,'destroy'])->name('destroy');
                    Route::post('/publish', [App\Http\Controllers\Admin\BdfController::class,'publish'])->name('publish');
                });

                /** History */
                Route::prefix('history')->name('history.')->group(function(){
                    Route::get('/', [App\Http\Controllers\Admin\HistoryController::class,'index'])->name('index');
                    Route::post('data',[App\Http\Controllers\Admin\HistoryController::class,'dataTable'])->name('data');
                    Route::get('/create', [App\Http\Controllers\Admin\HistoryController::class,'create'])->name('create');
                    Route::post('/create', [App\Http\Controllers\Admin\HistoryController::class,'store'])->name('store');
                    Route::get('/{id}/show', [App\Http\Controllers\Admin\HistoryController::class,'show'])->name('show');
                    Route::get('/{id}/edit', [App\Http\Controllers\Admin\HistoryController::class,'edit'])->name('edit');
                    Route::put('/{id}/update',  [App\Http\Controllers\Admin\HistoryController::class,'update'])->name('update');
                    Route::delete('/{id}/delete', [App\Http\Controllers\Admin\HistoryController::class,'destroy'])->name('destroy');
                    Route::post('/publish', [App\Http\Controllers\Admin\HistoryController::class,'publish'])->name('publish');
                });

                /**About */
                Route::prefix('about')->name('about.')->group(function(){
                    Route::get('/', [App\Http\Controllers\Admin\AboutController::class,'index'])->name('index');
                    Route::post('data',[App\Http\Controllers\Admin\AboutController::class,'dataTable'])->name('data');
                    Route::get('/create', [App\Http\Controllers\Admin\AboutController::class,'create'])->name('create');
                    Route::post('/create', [App\Http\Controllers\Admin\AboutController::class,'store'])->name('store');
                    Route::get('/{id}/show', [App\Http\Controllers\Admin\AboutController::class,'show'])->name('show');
                    Route::get('/{id}/edit', [App\Http\Controllers\Admin\AboutController::class,'edit'])->name('edit');
                    Route::put('/{id}/update',  [App\Http\Controllers\Admin\AboutController::class,'update'])->name('update');
                    Route::delete('/{id}/delete', [App\Http\Controllers\Admin\AboutController::class,'destroy'])->name('destroy');
                    Route::post('/publish', [App\Http\Controllers\Admin\AboutController::class,'publish'])->name('publish');
                });
                /* gallery */
                Route::prefix('gallery')->name('gallery.')->group(function(){
                    Route::get('/', [App\Http\Controllers\Admin\GalleryController::class,'index'])->name('index');
                    Route::post('data',[App\Http\Controllers\Admin\GalleryController::class,'dataTable'])->name('data');
                    Route::get('/create', [App\Http\Controllers\Admin\GalleryController::class,'create'])->name('create');
                    Route::post('/create', [App\Http\Controllers\Admin\GalleryController::class,'store'])->name('store');
                    //Route::get('/{id}/show', [App\Http\Controllers\Admin\GalleryController::class,'show'])->name('show');
                    //Route::get('/{id}/edit', [App\Http\Controllers\Admin\GalleryController::class,'edit'])->name('edit');
                    //Route::put('/{id}/update',  [App\Http\Controllers\Admin\GalleryController::class,'update'])->name('update');
                    Route::post('/update', [App\Http\Controllers\Admin\GalleryController::class,'update'])->name('update');
                    Route::delete('/{id}/delete', [App\Http\Controllers\Admin\GalleryController::class,'destroy'])->name('destroy');
                    Route::post('/publish', [App\Http\Controllers\Admin\GalleryController::class,'publish'])->name('publish');

                    Route::post('data-photo/{id}',[App\Http\Controllers\Admin\GalleryController::class,'dataTableGallery'])->name('dataphoto');
                    Route::get('/{id}/photo', [App\Http\Controllers\Admin\GalleryController::class,'photo'])->name('photo');
                    Route::post('/store-photo', [App\Http\Controllers\Admin\GalleryController::class,'storePhoto'])->name('storephoto');
                    Route::post('/delete-photo', [App\Http\Controllers\Admin\GalleryController::class,'deletePhoto'])->name('deletephoto');
                    Route::delete('/{id}/destroy-photo', [App\Http\Controllers\Admin\GalleryController::class,'photodestroy'])->name('photodestroy');
                    Route::post('/update-photo', [App\Http\Controllers\Admin\GalleryController::class,'updatePhoto'])->name('updatephoto');
                });

                /*Video */
                Route::prefix('video')->name('video.')->group(function(){
                    Route::get('/', [App\Http\Controllers\Admin\VideoController::class,'index'])->name('index');
                    Route::post('data',[App\Http\Controllers\Admin\VideoController::class,'dataTable'])->name('data');
                    Route::get('/create', [App\Http\Controllers\Admin\VideoController::class,'create'])->name('create');
                    Route::post('/create', [App\Http\Controllers\Admin\VideoController::class,'store'])->name('store');
                    Route::post('/update', [App\Http\Controllers\Admin\VideoController::class,'update'])->name('update');
                    Route::delete('/{id}/delete', [App\Http\Controllers\Admin\VideoController::class,'destroy'])->name('destroy');
                    //Route::get('/{id}/list', [App\Http\Controllers\Admin\VideoController::class,'listVideo'])->name('list');
                    Route::get('/list', [App\Http\Controllers\Admin\VideoController::class,'listVideo'])->name('list');
                    Route::post('/publish', [App\Http\Controllers\Admin\VideoController::class,'publish'])->name('publish');
                    Route::post('/store-video', [App\Http\Controllers\Admin\VideoController::class,'storevideo'])->name('storevideo');
                    Route::post('data-video/{id}',[App\Http\Controllers\Admin\VideoController::class,'dataTableVideo'])->name('datavideo');
                    Route::delete('/{id}/video-delete', [App\Http\Controllers\Admin\VideoController::class,'destroyvideo'])->name('destroyvideo');

                });

                /*Publication */
                Route::prefix('publication')->name('publication.')->group(function(){
                    Route::get('/', [App\Http\Controllers\Admin\PublicationController::class,'index'])->name('index');
                    Route::post('data',[App\Http\Controllers\Admin\PublicationController::class,'dataTable'])->name('data');
                    Route::post('/create', [App\Http\Controllers\Admin\PublicationController::class,'store'])->name('store');
                    Route::post('/update', [App\Http\Controllers\Admin\PublicationController::class,'update'])->name('update');
                    Route::delete('/{id}/delete', [App\Http\Controllers\Admin\PublicationController::class,'destroy'])->name('destroy');

                    Route::get('/{id}/list', [App\Http\Controllers\Admin\PublicationController::class,'listPublication'])->name('list');
                    Route::post('/store-file', [App\Http\Controllers\Admin\PublicationController::class,'storeFile'])->name('storeFile');
                    Route::post('data-file/{id}',[App\Http\Controllers\Admin\PublicationController::class,'dataTableFile'])->name('dataTableFile');
                    Route::delete('/{id}/delete-file', [App\Http\Controllers\Admin\PublicationController::class,'destroyFile'])->name('destroyFile');
                    Route::post('/update-file', [App\Http\Controllers\Admin\PublicationController::class,'updateFile'])->name('updateFile');
                    //Route::post('/publish', [App\Http\Controllers\Admin\GalleryController::class,'publish'])->name('publish');

                });

                /*Media Advisory */
                Route::prefix('media-advisory')->name('advisory.')->group(function(){
                    Route::get('/', [App\Http\Controllers\Admin\MediaAdvisoryController::class,'index'])->name('index');
                    Route::post('data',[App\Http\Controllers\Admin\MediaAdvisoryController::class,'dataTable'])->name('data');
                    Route::post('/create', [App\Http\Controllers\Admin\MediaAdvisoryController::class,'store'])->name('store');
                    Route::post('/update', [App\Http\Controllers\Admin\MediaAdvisoryController::class,'update'])->name('update');
                    Route::delete('/{id}/delete', [App\Http\Controllers\Admin\MediaAdvisoryController::class,'destroy'])->name('destroy');

                    Route::get('/{id}/list', [App\Http\Controllers\Admin\MediaAdvisoryController::class,'listPublication'])->name('list');
                    Route::post('/store-file', [App\Http\Controllers\Admin\MediaAdvisoryController::class,'storeFile'])->name('storeFile');
                    Route::post('data-file/{id}',[App\Http\Controllers\Admin\MediaAdvisoryController::class,'dataTableFile'])->name('dataTableFile');
                    Route::delete('/{id}/delete-file', [App\Http\Controllers\Admin\MediaAdvisoryController::class,'destroyFile'])->name('destroyFile');
                    Route::post('/update-file', [App\Http\Controllers\Admin\MediaAdvisoryController::class,'updateFile'])->name('updateFile');
                    /**cek */
                    Route::post('/publish', [App\Http\Controllers\Admin\GalleryController::class,'publish'])->name('publish');

                });

                Route::prefix('slider')->name('slider.')->group(function(){
                    Route::get('/', [App\Http\Controllers\Admin\SliderController::class,'index'])->name('index');
                    Route::post('/create', [App\Http\Controllers\Admin\SliderController::class,'store'])->name('store');
                    Route::post('data',[App\Http\Controllers\Admin\SliderController::class,'dataTable'])->name('data');
                    Route::post('update',[App\Http\Controllers\Admin\SliderController::class,'update'])->name('update');
                    Route::delete('/{id}/delete', [App\Http\Controllers\Admin\SliderController::class,'destroy'])->name('destroy');
                    Route::post('publish',[App\Http\Controllers\Admin\SliderController::class,'publish'])->name('publish');
                });

                Route::prefix('external-link')->name('link.')->group(function(){
                    Route::get('/', [App\Http\Controllers\Admin\ExternalLinkController::class,'index'])->name('index');
                    Route::post('/create', [App\Http\Controllers\Admin\ExternalLinkController::class,'store'])->name('store');
                    Route::post('data',[App\Http\Controllers\Admin\ExternalLinkController::class,'dataTable'])->name('data');
                    Route::post('update',[App\Http\Controllers\Admin\ExternalLinkController::class,'update'])->name('update');
                    Route::delete('/{id}/delete', [App\Http\Controllers\Admin\ExternalLinkController::class,'destroy'])->name('destroy');
                    Route::post('publish',[App\Http\Controllers\Admin\ExternalLinkController::class,'publish'])->name('publish');
                });

            });

            Route::middleware('checkRole:admin,user')->group(function () {
                Route::prefix('profile')->name('profile.')->group(function(){
                    Route::get('/', [App\Http\Controllers\Admin\AdminUserController::class,'index'])->name('index');
                    Route::put('/{id}/update',  [App\Http\Controllers\Admin\AdminUserController::class,'update'])->name('update');
                    Route::put('/{id}/update-password',  [App\Http\Controllers\Admin\AdminUserController::class,'updatepassword'])->name('password');
                    //Route::delete('/{id}/delete', [App\Http\Controllers\Admin\AdminUserController::class,'destroy'])->name('destroy');
                });
            });
            /*user */
            Route::middleware('checkRole:admin')->group(function () {
                Route::prefix('user-register')->name('userreg.')->group(function(){
                    Route::get('/', [App\Http\Controllers\Admin\UserController::class,'index'])->name('index');
                    Route::post('/data',[App\Http\Controllers\Admin\UserController::class,'dataTable'])->name('data');
                    Route::post('/store',[App\Http\Controllers\Admin\UserController::class,'store'])->name('store');
                    Route::post('/update',[App\Http\Controllers\Admin\UserController::class,'update'])->name('update');
                    Route::post('/password',[App\Http\Controllers\Admin\UserController::class,'password'])->name('password');
                    Route::post('/publish',[App\Http\Controllers\Admin\UserController::class,'publish'])->name('publish');
                    Route::delete('/{id}/delete',[App\Http\Controllers\Admin\UserController::class,'destroy'])->name('destroy');
                });
            });
            /**register physical */
            Route::middleware('checkRole:admin,user')->group(function () {
                Route::prefix('physical')->name('physical.')->group(function(){
                    Route::get('/', [App\Http\Controllers\Admin\RegisterController::class,'physicalindex'])->name('index');
                    Route::post('/data',[App\Http\Controllers\Admin\RegisterController::class,'physicaldataTable'])->name('physicaldataTable');
                    Route::get('/excel/{start}/{end}',[App\Http\Controllers\Admin\RegisterController::class,'physicalindexexcel'])->name('excel');
                });

                Route::prefix('virtual')->name('virtual.')->group(function(){
                    Route::get('/', [App\Http\Controllers\Admin\RegisterController::class,'virtualindex'])->name('index');
                    Route::post('/data',[App\Http\Controllers\Admin\RegisterController::class,'virtualdataTable'])->name('data');
                    Route::get('/excel/{start}/{end}',[App\Http\Controllers\Admin\RegisterController::class,'virtualexcel'])->name('excel');
                });

                Route::prefix('media')->name('media.')->group(function(){
                    Route::get('/', [App\Http\Controllers\Admin\RegisterController::class,'mediaindex'])->name('index');
                    Route::post('/data',[App\Http\Controllers\Admin\RegisterController::class,'mediadataTable'])->name('data');
                    Route::get('/excel/{start}/{end}',[App\Http\Controllers\Admin\RegisterController::class,'Mediaexcel'])->name('excel');
                });

                Route::prefix('guest')->name('guest.')->group(function(){
                    Route::get('/', [App\Http\Controllers\Admin\RegisterController::class,'guestindex'])->name('index');
                    Route::post('/data',[App\Http\Controllers\Admin\RegisterController::class,'guestataTable'])->name('data');
                    Route::get('/excel/{start}/{end}',[App\Http\Controllers\Admin\RegisterController::class,'guestexcel'])->name('excel');
                });

                Route::prefix('commitee')->name('commitee.')->group(function(){
                    Route::get('/', [App\Http\Controllers\Admin\RegisterController::class,'commiteeindex'])->name('index');
                    Route::post('/data',[App\Http\Controllers\Admin\RegisterController::class,'commiteeTable'])->name('data');
                    Route::get('/excel/{start}/{end}',[App\Http\Controllers\Admin\RegisterController::class,'commiteeexcel'])->name('excel');
                });

            });
        });
    });
    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
        Route::post('ckeditor/upload',[App\Http\Controllers\CkeditorController::class,'upload'])->name('ckeditor.upload');
    });
//});

Route::get('{slug_url}', [App\Http\Controllers\BdfController::class, 'index'])->name('detail');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
