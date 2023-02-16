<?php

use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;
use App\Http\Controllers\GuardController;
use App\Http\Controllers\JobRequestsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminJobRequestsController;
use App\Http\Controllers\AdminIssueDdoController;
use App\Http\Controllers\AdminActiveContractsController;
// use App\Models\Guard;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

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
    return view('security.index', ['c_datetime'=> Carbon::now('GMT+8')->format('g:i:s A') ." | ". Date('Y/m/d') ]);
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

        //show security guard
        Route::get("/securityguard",
            [GuardController::class, 'index']
        )->name('showsecurityguard');

        //search guard
        //show security guard
        Route::get("/securityguard/search/",
        [GuardController::class, 'search']
        )->name('searchsecurityguard');

        //add security guard
        Route::get("/securityguard/create",
            [GuardController::class, 'create']
        )->name('createsecurityguard');

        //save created guard
        Route::post("/securityguard",
        [GuardController::class, 'store']
        )->name('storesecurityguard');

        //view security guard
        Route::get("/securityguard/{guard_id}/show",
            [GuardController::class, 'show']
        )->name('viewsecurityguard');

        // End
        Route::get("/jobrequest",
        [AdminJobRequestsController::class, 'index']
        )->name('jobrequestindex');
        // End
        Route::get("/activecontract",
        [AdminActiveContractsController::class, 'index']
        )->name('activecontractindex');
        // End
        Route::get("/ddo",
        [AdminIssueDdoController::class, 'index']
        )->name('issueddoindex');
        // End


    });
    Route::group(['middleware' => 'checkIs_admin:0'], function () {
        // Route::get('/userDashboard', 'userdashboard')->name('userdashboard');
        Route::get('/userdashboard', function () {
            return view('userdashboard');
        })->name('userdashboard');

        // routes for "Create Job Request" tab
        Route::get('/jobrequest/index/{user_id}', [JobRequestsController::class, 'index'])
            ->name('jobrequest.index');
        // Contract
        Route::post('/jobrequest/storecontract/{user_id}', [JobRequestsController::class, 'storecontract'])
            ->name('jobrequest.storecontract');

        // Location
        Route::get('/{user_id}/jobrequest/{contract_id}/location', [JobRequestsController::class, 'location'])
            ->name('jobrequest.location');
        Route::post('/{user_id}/jobrequest/{contract_id}/storelocation', [JobRequestsController::class, 'storelocation'])
            ->name('jobrequest.storelocation');

        // Post
        Route::get('/{contract_id}/jobrequest/{location_id}/post', [JobRequestsController::class, 'post'])
            ->name('jobrequest.post');
        Route::post('/jobrequest/storepost', [JobRequestsController::class, 'storepost'])
            ->name('jobrequest.storepost');

        // Shift
        Route::get('/jobrequest/shift', [JobRequestsController::class, 'shift'])
            ->name('jobrequest.shift');
        Route::post('/jobrequest/storeshift', [JobRequestsController::class, 'storeshift'])
            ->name('jobrequest.storeshift');
    });


    // profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::resource('activecontracts', ContractController::class);
});

require __DIR__ . '/auth.php';
