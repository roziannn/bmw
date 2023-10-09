<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PelangganModel;
use App\Models\BookingModel;


class BookingController extends Controller
{

    public function simpanBooking(Request $request)
    {
        $request->validate([
            'no_polisi' => 'required|exists:db_pelanggan,no_polisi', // Memastikan nomor_member ada dalam tabel pelanggan
            'tgl_booking' => 'required|date',
            // 'service_type' => 'required',
        ]);

        // Cari pelanggan berdasarkan nomor_member
        $pelanggan = PelangganModel::where('no_polisi', $request->input('no_polisi'))->first();

        $booking = new BookingModel();
        $booking->no_polisi = $request->input('no_polisi'); // Menyimpan nomor  di booking
        $booking->tgl_booking = $request->input('tgl_booking');
        $booking->service_type = $request->input('service_type'); // Menyimpan service type dari request
        $booking->keluhan = $request->input('keluhan'); // Menyimpan keluhan dari request
        // $booking->jenis_layanan = $request->input('jenis_layanan');

        $pelanggan->bookings()->save($booking); // Mengaitkan booking dengan pelanggan


        $noPolisi = $request->no_polisi;
        $checkNo = PelangganModel::where('no_polisi',  $noPolisi)->first();
        $nopol = $noPolisi;

        return redirect()->route('indexOnBooking', compact('nopol'));
    }
}
