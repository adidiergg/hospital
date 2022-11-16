<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ReceptionistController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Middleware\RedirectIfAuthenticated;
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


Route::get('/', function () {
    //
})->middleware(RedirectIfAuthenticated::class)->name("home");


Route::post('/auth',[AuthenticationController::class, 'authenticate'])->name('auth');
Route::get('/logout',[AuthenticationController::class, 'logout'])->name('logout');
Route::get('/login', [AuthenticationController::class, 'index'] )->name('signin');

Route::prefix('admin')->group(function () {

    Route::middleware(['admin'])->group(function () {
        Route::get('/',function () {
            return view('admin');
        })->name('admin');
    
        Route::resource('receptionists',ReceptionistController::class);
        Route::put('receptionists/reset/{receptionist}/', [ReceptionistController::class, 'reset'])->name('receptionists.reset');
        
        Route::resource('doctors',DoctorController::class);
        Route::put('doctors/reset/{doctor}/', [DoctorController::class, 'reset'])->name('doctors.reset');
    
    });
    
});


Route::prefix('recepcionista')->group(function () {
    Route::middleware(['receptionist'])->group(function () {
        Route::get('/',function () {
            return view('receptionist');
        })->name('receptionist');

        Route::resource('patients',PatientController::class);
        //Route::put('patients/reset/{patient}/', [PatientController::class, 'reset'])->name('doctors.reset');
        Route::resource('appointments',AppointmentController::class);
        


    });
});


Route::prefix('doctor')->group(function () {
    Route::middleware(['doctor'])->group(function () {
        Route::get('/',function () {
            return view('doctor');
        })->name('doctor');
    });
    /*
    Route::middleware(['doctor'])->group(function () {
        Route::get('/',function () {
            return view('doctor');
        })->name('doctor');
    });
    */
});



/*
Route::get('/', function () {
    return view('welcome');
})->name('home');;
*/

#Route::get('/',view('welcome'))->name('home');



/*
Route::middleware(['receptionist'])->group(function () {
    Route::get('/',function () {
        return view('home');
    })->name('home');
});
*/

/*
Route::get('/',function () {
    return view('home');
})->middleware(['admin'])->name('home');

Route::post('/auth',[AuthenticationController::class, 'authenticate'])->name('auth');
Route::get('/logout',[AuthenticationController::class, 'logout'])->name('logout');
//Route::get('/login', 'index' )->name('login');
*/
/*
Route::get('/home', function () {
    return view('welcome');
})->middleware('auth:admin')->name('home');

Route::middleware(['web'])->group(function () {
    //
});

*/