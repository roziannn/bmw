<?php

use App\Models\BookingModel;
use Illuminate\Http\Request;
use App\Models\PelangganModel;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// API Data Pelanggan Spesifik
// Route::get('/pelanggan/{id}', function ($id) {
//     $berhasil = PelangganModel::where('no_polisi', $id)->first();
//     return $berhasil;
// }); 

Route::get('/pelanggan/{id}', function ($id) {
    $pelanggan = PelangganModel::where('no_polisi', $id)->first();
    $tglBookingTerbaru = BookingModel::where('no_polisi', $id)
        ->orderBy('tgl_booking', 'desc')
        ->first();

    return [
        'pelanggan' => $pelanggan,
        'tgl_booking_terbaru' => $tglBookingTerbaru ? $tglBookingTerbaru->tgl_booking : null,
    ];
});



