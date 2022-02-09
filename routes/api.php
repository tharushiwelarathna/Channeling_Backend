<?php
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//public routes
// Route::resource('doctors', DoctorController::class);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
// Route::get('/doctors', [DoctorController::class, 'index']);
// Route::post('/doctors', [DoctorController::class, 'store']);
// Route::get('/doctors/{id}', [DoctorController::class, 'show']);
// Route::get('/doctors/search/{fullName}', [DoctorController::class, 'search']);


//Sanctum Auth route
//Protected routes
// Route::group(['middleware' => ['auth:sanctum']], function () {
//     Route::post('/logout', [AuthController::class, 'register']);
//     Route::put('/doctors/{id}', [DoctorController::class, 'update']);
//     Route::delete('/doctors/{id}', [DoctorController::class, 'destroy']);
// });

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware(['cors'])->group(function () {
    Route::get('/doctors', [DoctorController::class, 'index']);
    Route::post('/doctors', [DoctorController::class, 'store']);
    Route::delete('/doctors/{id}', [DoctorController::class, 'destroy']);
    Route::get('/doctors/search/{fullName}', [DoctorController::class, 'search']);
    Route::put('/doctors/{id}', [DoctorController::class, 'update']);


    Route::get('/patients', [PatientController::class, 'index']);
    Route::post('/patients', [PatientController::class, 'store']);
    Route::delete('/patients/{id}', [PatientController::class, 'destroy']);
    Route::get('/patients/search/{fullName}', [PatientController::class, 'search']);
    Route::put('/patients', [PatientController::class, 'update']);

    Route::get('/appointments', [AppointmentController::class, 'index']);
    Route::post('/appointments', [AppointmentController::class, 'store']);

});
