<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BeritaController;
use App\Http\Controllers\API\LogHarianController;
use App\Http\Controllers\API\PerizinanController;
use App\Http\Controllers\API\SuratMenyuratController;
use App\Http\Controllers\API\UserInfoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/login', [AuthController::class, 'login']);
Route::middleware(['auth:api'])->group(function () {

    Route::get('/profile', [UserInfoController::class,'profileInfo']);
    Route::post('/profile', [UserInfoController::class,'updateProfilefileInfo']);

    Route::get('/kependudukan', [UserInfoController::class,'kependudukanInfo']);
    Route::post('/kependudukan', [UserInfoController::class,'updateKependudukanInfo']);

    Route::get('/keluarga', [UserInfoController::class,'keluargaInfo']);
    Route::put('/keluarga', [UserInfoController::class,'updateKeluargaInfo']);

    Route::get('/kepegawaian', [UserInfoController::class,'kepegawaianInfo']);
    Route::put('/kepegawaian', [UserInfoController::class,'updateKepegawaianInfo']);

    Route::get('/alamatdankontak', [UserInfoController::class,'alamatDanKontakInfo']);
    Route::put('/alamatdankontak', [UserInfoController::class,'updateAlamatdankontakInfo']);

    Route::get('/lainlain', [UserInfoController::class,'lainlainInfo']);


    Route::get('/perizinan-cuti', [PerizinanController::class,'index']);
    Route::post('/perizinan-cuti', [PerizinanController::class,'store']);

    Route::get('/log-harian', [LogHarianController::class,'index']);
    Route::post('/log-harian', [LogHarianController::class,'store']);

    Route::get('/berita', [BeritaController::class,'index']);


    
    // Route::get('/uwuw', function(){
    //     return response()->json([
    //         'message' => 'success'
    //     ]);
    // });
});

//api profil
//api kependudakn
//api keluarga
//api kepegawaian
//api alamatdankontak
//api lainlain


