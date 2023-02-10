<?php

use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\GuardController;
use App\Http\Controllers\JobRequestsController;
use App\Http\Controllers\ProfileController;
use GuzzleHttp\Psr7\Request;
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

Route::get('/', function () {
    return view('security.index');
    // return dd(auth()->user()->position);
});

// for testing
Route::get('/sampleguard', [GuardController::class, 'index']);

//old dashboard routing
/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
*/

// new
Route::group(['middleware' => 'auth'], function () {

    // separates STAFF to USER dashboard
    // Route::get('/dashboard', 'dashboard')->name('dashboard');
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    Route::get("/redirectAuthenticatedUsers", [RedirectAuthenticatedUsersController::class, "home"]);

    Route::group(['middleware' => 'checkIs_admin:1'], function () {
        // Route::get('/adminDashboard', 'admindashboard')->name('admindashboard');
        Route::get('/admindashboard', function () {
            return view('admindashboard');
        })->name('admindashboard');
    });
    Route::group(['middleware' => 'checkIs_admin:0'], function () {
        // Route::get('/userDashboard', 'userdashboard')->name('userdashboard');
        Route::get('/userdashboard', function () {
            return view('userdashboard');
        })->name('userdashboard');
        Route::get('/jobrequest/index', [JobRequestsController::class, 'index'])
            ->name('jobrequest.index');
        Route::get('/jobrequest/location', [JobRequestsController::class, 'create'])
            ->name('jobrequest.location');
        Route::post('/jobrequest/location', [JobRequestsController::class, 'store'])
            ->name('jobrequest.post');
    });


    // profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::resource('activecontracts', ContractController::class);
});

require __DIR__ . '/auth.php';
