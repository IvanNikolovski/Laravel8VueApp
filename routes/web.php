<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

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

// Localization
Route::get('/js/lang.js', function () {
    if(env('APP_ENV','none') == 'local'){
        Cache::forget('lang.js');
        }
    $strings = Cache::rememberForever('lang.js', function () {
        $lang = config('app.locale');

        $files   = glob(resource_path('lang/' . $lang . '/*.php'));
        $strings = [];
        foreach ($files as $file) {
            $name= basename($file, '.php');
            $strings[$name] = require $file;
        }
        return $strings;
    });
    header('Content-Type: text/javascript');
    return('window.i18n = ' . json_encode($strings) . ';');
    exit();
})->name('assets.lang');

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/{lang}', function ($lang) {
//     App::setlocale($lang);
//     return view('welcome');
// });


// Route::get('locale', function () {
//     return App::getLocale();
// });

Route::get('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
});


Route::get('/doctor/index', [DoctorController::class, 'index']);
Route::get('/doctor/create', [DoctorController::class, 'create']);
// Route::post('/doctor/create', [DoctorController::class, 'store']);
Route::get('/doctor/edit/{doctor}', [DoctorController::class, 'edit']);
// Route::post('/doctor/update/{id}', [DoctorController::class, 'update']);
Route::get('/doctor/show/{doctor}', [DoctorController::class, 'show']);
Route::post('/doctor/delete/{doctor}', [DoctorController::class, 'destroy']);

Route::get('/appointments/create', [AppointmentController::class, 'create']);
Route::post('/appointments/create', [AppointmentController::class, 'store']);
Route::get('/appointments/edit/{appointment}', [AppointmentController::class, 'edit']);
Route::post('/appointments/update/{appointment}', [AppointmentController::class, 'update']);
Route::get('/appointments/show/{appointment}', [AppointmentController::class, 'show']);
Route::post('/appointments/delete/{appointment}', [AppointmentController::class, 'destroy']);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
