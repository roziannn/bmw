<?php

namespace App\Http\Controllers;

use DbPelanggan;
use Carbon\Carbon;
use App\Models\User;
use App\Models\BookingModel;
use App\Models\ForemanModel;
use App\Models\LayananModel;
use App\Models\TeknisiModel;
use Illuminate\Http\Request;
use App\Models\PelangganModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Yajra\DataTables\DataTables;
use App\Models\WorkingOrderModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;




class ServiceController extends Controller
{
    public function indexBiodata()
    {
        $title = 'Service';
        return view('customer.biodata', compact('title'));
    }

    public function onBooking($no_pol)
    {
        $title = 'Service';
        $pelanggan = PelangganModel::where('no_polisi', $no_pol)->first();
        $booking = BookingModel::where('no_polisi', $no_pol)->latest('created_at')->first(); // Mengambil yang terbaru
        // dd($booking);

        //revisi/modify
        $wo = WorkingOrderModel::where('no_polisi', $no_pol)
            ->whereNotIn('no_wo', function ($query) {
                $query->select('no_wo')
                    ->from('db_wo')
                    ->where('status', 'done');
            })
            ->latest('created_at')
            ->first();


        if ($wo !== null) {
            $sparepartsArray = json_decode($wo->sparepart);
            if (!empty($sparepartsArray)) {
                $sparepart = implode(', ', $sparepartsArray);
            } else {
                $sparepart = "";
            }
        } else {
            $sparepart = "";
        }
        $namaTeknisi = "";

        if ($wo !== null) {
            $teknisi = TeknisiModel::find($wo->id_teknisi);
            if ($teknisi !== null) {
                $namaTeknisi = $teknisi ? $teknisi->nama_teknisi : "";
            }
        }


        if ($booking !== null) {
            $sameDayBookings = BookingModel::whereDate('tgl_booking', $booking->tgl_booking)
                ->where(function ($query) {
                    $query->where('status', 'pending')
                        ->orWhere('status', 'prepare');
                })
                ->orderBy('created_at')
                ->get();

            $index = $sameDayBookings->search(function ($item) use ($booking) {
                return $item->id == $booking->id;
            });
            // Hitung nomor antrian berdasarkan index
            $antrian = $index !== false ? $index + 1 : null;
        } else {
            $antrian = null;
        }

        return view('customer.onBooking', compact('title', 'pelanggan', 'booking', 'wo', 'antrian', 'namaTeknisi'));
    }

    public function detailTASK($no_wo)
    {
        $dataWO = WorkingOrderModel::where('no_wo', $no_wo)->first();

        if (!$dataWO) {
            return response()->json(['error' => 'Data WO tidak ditemukan'], 404);
        }

        $dataPelanggan = PelangganModel::where('no_polisi', $dataWO->no_polisi)->first();

        $booking = BookingModel::where('no_polisi', $dataWO->no_polisi)->where('status', 'pending')->first();

        $waktuArray = explode(':', $dataWO->waktu_estimasi_selesai);
        $jam = (int)$waktuArray[0];
        $menit = (int)$waktuArray[1];
        $totalMenitEstimasi = ($jam * 60) + $menit;
        // $layananArray = json_decode($dataWO->layanan, true); // Mengubah JSON menjadi array


        // $layananNames = [];
        // foreach ($layananArray as $layananItem) {
        //     $layananNames[] = $layananItem['nama'];
        // }

        // $layananString = implode(', ', $layananNames);

        $dbbooking = BookingModel::where('no_wo', $dataWO->no_wo)
            ->where('status', '<>', 'Done')
            ->where('no_polisi', $dataWO->no_polisi) // Ganti $nomor_polisi dengan nilai nomor polisi yang diinginkan
            ->first();
        $pengerjaan = "";
        if ($dbbooking !== null) {
            $pengerjaan = $dbbooking->pengerjaan;
        }

        $layananData = json_decode($dataWO->layanan); // Mendekode data JSON menjadi array

        $layananNames = []; // Inisialisasi array untuk menyimpan nama-nama layanan

        foreach ($layananData as $layanan) {
            $layananObj = json_decode($layanan); // Dekode data JSON dalam setiap elemen
            $layananNames[] = $layananObj->nama; // Ambil dan tambahkan nama layanan ke dalam array
        }

        $pengerjaan = $dbbooking->pengerjaan; // Contoh: "busi"


        // Temukan indeks pertama dari nilai $pengerjaan dalam array $layananNames
        $firstKeyToRemove = array_search($pengerjaan, $layananNames);

        // Jika indeks ditemukan, hapus elemen-elemen dari indeks tersebut hingga akhir array
        if ($firstKeyToRemove !== false) {
            $layananNames = array_slice($layananNames, $firstKeyToRemove + 1);
        }

        $layananNamesString = implode(', ', $layananNames);




        $detail = [
            'NoWO' => $dataWO->no_wo,
            'NoRangka' => $dataPelanggan->no_rangka,
            'JenisKendaraan' => $dataPelanggan->jenis_mobil,
            'JenisLayanan' => $layananNames,
            'LayananTambahan' => $dataWO->layanan_tambahan,
            'EstimasiWaktu' => $totalMenitEstimasi
        ];

        return response()->json($detail);
    }


    public function teknisiWO($id_teknisi)
    {
        $dataWO = WorkingOrderModel::where('id_teknisi', $id_teknisi)
            ->where('status', '<>', 'Done')
            ->first();

        $dataPelanggan = PelangganModel::where('no_polisi', $dataWO->no_polisi)->first();
        $waktuArray = explode(':', $dataWO->waktu_estimasi_selesai);
        $jam = (int)$waktuArray[0];
        $menit = (int)$waktuArray[1];
        $totalMenitEstimasi = ($jam * 60) + $menit;

        $dataTeknisi = TeknisiModel::where('id_teknisi', $id_teknisi)
            ->where('status', '<>', 'available')
            ->first();

        if ($dataTeknisi !== null) {
        } else {
            return response()->json(['error' => 'Data teknisi tidak ditemukan', $id_teknisi], 404);
        }

        $dbbooking = BookingModel::where('no_wo', $dataWO->no_wo)
            ->where('status', '<>', 'Done')
            ->where('no_polisi', $dataWO->no_polisi) // Ganti $nomor_polisi dengan nilai nomor polisi yang diinginkan
            ->first();
        $pengerjaan = "";
        if ($dbbooking !== null) {
            $pengerjaan = $dbbooking->pengerjaan;
        }


        // dd(dataTeknisi);
        $layananData = json_decode($dataWO->layanan); 

        $layananNames = []; 

        foreach ($layananData as $layanan) {
            $layananObj = json_decode($layanan); 
            $layananNames[] = $layananObj->nama; 
        }

        $pengerjaan = $dbbooking->pengerjaan; 

        $firstKeyToRemove = array_search($pengerjaan, $layananNames);

        if ($firstKeyToRemove !== false) {
            $layananNames = array_slice($layananNames, $firstKeyToRemove + 1);
        }

        $layananNamesString = implode(', ', $layananNames);


        $detail = [
            'NoWO' => $dataWO->no_wo,
            'NamaTeknisi' => $dataTeknisi->nama_teknisi,
            'NomorPolisi' => $dataWO->no_polisi,
            'NoRangka' => $dataPelanggan->no_rangka,
            'JenisKendaraan' => $dataPelanggan->jenis_mobil,
            'JenisLayanan' => $layananNames,
            'LayananTambahan' => $dataWO->layanan_tambahan,
            // 'SparePart' => json_decode($dataWO->sparepart),
            'EstimasiWaktu' => $totalMenitEstimasi
        ];
        
        return response()->json($detail);
    }

    public function teknisiAvailable()
    {
        $teknisiList = TeknisiModel::where('foreman_id', 2)
            ->where('status', 'Available')
            ->get();

        $teknisiChain = $teknisiList->map(function ($teknisi) {
            return [
                'Nama' => $teknisi->nama_teknisi
            ];
        });

        return response()->json($teknisiChain);
    }

    public function invoiceAPI($id)
    {
        $workingOrder = WorkingOrderModel::find($id);
        $pelanggan = PelangganModel::find($workingOrder->no_polisi);
        $formattedPrice = 'Rp ' . number_format($workingOrder->biaya, 2, ',', '.');


        $sparepartsArray = json_decode($workingOrder->sparepart); // Ubah JSON string menjadi array

        $sparepartsFormatted = implode(', ', $sparepartsArray);

        $dataArray = json_decode($workingOrder->layanan, true);
        $names = [];
        foreach ($dataArray as $item) {
            $itemArray = json_decode($item, true); // Melakukan decode JSON pada setiap string JSON
            $names[] = $itemArray['nama'];
        }

        $layananString = implode(', ', $names);

        return response()->json([
            'kebutuhan' => $workingOrder->no_wo,
            'invoice_police' => $workingOrder->no_polisi,
            'phone_number' => $pelanggan->no_telp,
            'address' => $pelanggan->alamat,
            'price' => $formattedPrice,
            // 'sparepart' => $sparepartsFormatted,
            'layanan' => $layananString,
        ]);
    }

    public function kerjakanAPI(Request $request, $id)
    {
        $teknisiId = $request->input('technician_id'); // Mengambil nilai teknisi_id dari input tersembunyi
        $selectedSparepart = $request->input('maintenance');

        $workingOrder = WorkingOrderModel::find($id);
        $workingOrder->status = 'On Progress';
        $workingOrder->id_teknisi = $teknisiId;
        $workingOrder->save();

        $booking = BookingModel::where('no_wo', $id)->first();
        $booking->status = 'On Progress';
        $booking->pengerjaan = $selectedSparepart;
        $booking->save();

        $teknisi = TeknisiModel::where('id_teknisi', $teknisiId)->first();
        $teknisi->status = 'On Working';
        $teknisi->save();


        response()->json([
            'status' => 'success',
            'message' => 'Data berhasil diproses',
        ]);

        return redirect()->back();
    }

    public function pengerjaanAPI(Request $request, $id)
    {

        $noWo = $request->input('noWO');
        $noWO = preg_replace('/\D/', '', $noWo);

        $selectedSparepart = $request->input('maintenance');

        $booking = BookingModel::where('no_wo', $noWO)->first();
        $booking->status = 'On Progress';
        $booking->pengerjaan = $selectedSparepart;
        $booking->save();

        response()->json([
            'status' => 'success',
            'message' => 'Data berhasil diproses',
        ]);


        return redirect()->back();
    }

    // public function updateDone(Request $request, $id)
    // {

    //     $workingOrders = WorkingOrderModel::find($id);
    //     $teknisi = TeknisiModel::find($workingOrders->id_teknisi);
    //     if ($teknisi) {
    //         $teknisi->status = 'available';
    //         $teknisi->save();
    //     }



    //     $workingOrder = WorkingOrderModel::find($id);
    //     $workingOrder->status = 'Done';
    //     $workingOrder->id_teknisi = null;
    //     $workingOrder->save();
    //     $workingOrder = WorkingOrderModel::find($id);
    //     $booking = BookingModel::where('no_wo', $workingOrder->no_wo)->first();
    //     if ($booking !== null) {
    //         $booking->status =  'Done';
    //         $booking->pengerjaan = null;
    //         $booking->save();
    //     } else {
    //     }

    //     response()->json([
    //         'status' => 'success',
    //         'message' => 'Data berhasil diproses',
    //     ]);

    //     return redirect()->back();
    // }

    //MODIFY FIRDA
    public function updateDone(Request $request, $id)
    {
        $workingOrders = WorkingOrderModel::find($id);
        $teknisi = TeknisiModel::find($workingOrders->id_teknisi);

        if ($teknisi) {
            $teknisi->status = 'available';
            $teknisi->save();
        }

        $workingOrder = WorkingOrderModel::find($id);
        $workingOrder->status = 'Done';
        $workingOrder->id_teknisi = null;
        $workingOrder->save();

        $workingOrder = WorkingOrderModel::find($id);
        $booking = BookingModel::where('no_wo', $workingOrder->no_wo)->first();

        if ($booking !== null) {
            $booking->status =  'Done';
            $booking->pengerjaan = null;
            $booking->save();
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil diproses',
        ]);
    }


    // public function updatePembayaran(Request $request, $id)
    // {

    //     $workingOrder = WorkingOrderModel::where('id_teknisi', $id)->first();

    //     // Pastikan working order ditemukan
    //     if ($workingOrder) {
    //         // Ubah status working order menjadi "On Progress"
    //         $workingOrder->status = "Menunggu Pembayaran";
    //         $workingOrder->save();
    //         $booking = BookingModel::where('no_polisi', $workingOrder->no_polisi)
    //             ->where('no_wo', $workingOrder->no_wo)
    //             ->first();

    //         if ($booking) {
    //             // Ubah status working order menjadi "On Progress"
    //             $booking->status = "Menunggu Pembayaran";
    //             $booking->pengerjaan = "";
    //             $booking->save();
    //         }

    //         return response()->json(['message' => 'Status working order berhasil diubah.']);
    //     } else {
    //         return response()->json(['error' => 'Working order tidak ditemukan.'], 404);
    //     }


    //     return redirect()->back();
    // }

    public function updatePembayaran(Request $request, $id)
    {
        $workingOrder = WorkingOrderModel::where('id_teknisi', $id)->first();

        // Pastikan working order ditemukan
        if ($workingOrder) {
            // Ubah status working order menjadi "Menunggu Pembayaran"
            $workingOrder->status = "Menunggu Pembayaran";
            $workingOrder->save();

            // Check if pengerjaan is empty and update the technician's status
            if (empty($workingOrder->pengerjaan)) {
                $teknisi = TeknisiModel::find($id);
                if ($teknisi) {
                    $teknisi->status = 'available';
                    $teknisi->save();
                }
            }

            $booking = BookingModel::where('no_polisi', $workingOrder->no_polisi)
                ->where('no_wo', $workingOrder->no_wo)
                ->first();

            if ($booking) {
                // Ubah status booking menjadi "Menunggu Pembayaran"
                $booking->status = "Menunggu Pembayaran";
                $booking->pengerjaan = "";
                $booking->save();
            }

            return response()->json(['message' => 'Status working order berhasil diubah.']);
        } else {
            return response()->json(['error' => 'Working order tidak ditemukan.'], 404);
        }

        return redirect()->back();
    }


    public function onService()
    {
        $title = 'Service';
        return view('customer.onService', compact('title'));
    }

    public function inputCustomer(Request $request)
    {
        $title = 'Service';
        $noPolisi = $request->no_polisi;
        $tglBooking = $request->tgl_booking;

        $jumlahBookingHariIni = BookingModel::whereDate('tgl_booking', $tglBooking)->count();

        $batasBookingPerHari = 2;

        if ($jumlahBookingHariIni >= $batasBookingPerHari) {
            $errorMessage = "Daily Service Limit Reached<br>Please Try a Different Date !!";
            return redirect()->back()->with('error', $errorMessage);
        }


        $checkNo = PelangganModel::where('no_polisi',  $noPolisi)->first();

        if ($checkNo != null) {
            BookingModel::create([
                'no_polisi' =>   $noPolisi,
                'tgl_booking' => $request->tgl_booking,
            ]);
        } else {
            PelangganModel::create([
                'no_polisi' =>  $noPolisi,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'no_telp' => $request->no_telp,
                'jenis_mobil' => $request->jenis_mobil,
                'no_rangka' => $request->no_rangka,
            ]);

            User::create([
                'no_polisi' =>  $noPolisi,
                'nama' => $request->nama,
                'username' => $request->nama
            ]);

            BookingModel::create([
                'no_polisi' =>   $noPolisi,
                'tgl_booking' => $request->tgl_booking,
                'service_type' => $request->service_type,
                'keluhan' => $request->keluhan,
            ]);
        }

        $nopol = $noPolisi;

        return redirect()->route('indexOnBooking', compact('nopol'));
    }


    ////
    public function woTable()
    {
        $title = 'BMW OFFICE';
        $historyWo = WorkingOrderModel::all();

        $dates = $historyWo->pluck('tanggal_mulai')->unique();

        return view('admin.WO', compact('dates', 'title', 'historyWo'));
    }
    public function dashboardTable(Request $request)
    {
        $title = 'BMW OFFICE';
        $userId = intval($request->input('id'));

        $user = User::where('id', $userId)->first();
        $dataWo = WorkingOrderModel::where('status', 'prepare')->get();
        $dataWoAll = WorkingOrderModel::where('status', '!=', 'Done')->get();

        $dataWOOnProgress = WorkingOrderModel::where('status', 'On Progress')->get();


        // dd($user->username);

        $teknisi = TeknisiModel::where('foreman_id', $userId)->get();
        $teknisiAvailable = TeknisiModel::where('foreman_id', $userId)
            ->where('status', 'Available')
            ->get();
        // dd($teknisi);

        return view('admin.Dashboard', ['title' => $title, 'user' => $user, 'teknisi' => $teknisi, 'dataWOAll' => $dataWoAll, 'dataWO' => $dataWo, 'dataWOOnProgress' => $dataWOOnProgress, 'teknisiAvailable' => $teknisiAvailable]);
    }

    public function inputWO()
    {
        $dataWo = WorkingOrderModel::all();
        $booking = BookingModel::all();
        $title = 'BMW OFFICE';
        $bensinOptions = LayananModel::where('kode', 1)->get();
        $dieselOptions = LayananModel::where('kode', 2)->get();

        return view('admin.inputWO', compact('title', 'dataWo', 'bensinOptions', 'dieselOptions', 'booking'));
    }


    // public function submitWO(Request $request)
    // {
    //     $user = User::where('nama', $request->pic_Service)->first();
    //     // $sparepart = $request->input('sparepart', []);
    //     // $sparepartJSON = json_encode($sparepart);

    //     // $sparepartCount = count($sparepart);

    //     // $biaya = $sparepartCount * 5000;
    //     // $estimasi_waktu = $sparepartCount * 5;

    //     $booking = BookingModel::where('no_polisi', $request->no_polisi)->where('status', 'pending')->first();
    //     $estimasi_waktu = $request->estimatedTime;
    //     $jam_estimasi_selesai = floor($estimasi_waktu / 60);
    //     $menit_estimasi_selesai = $estimasi_waktu % 60;
    //     $waktu_estimasi_selesai = sprintf('%02d:%02d:00', $jam_estimasi_selesai, $menit_estimasi_selesai);
    //     // $namaSpareparts = $request->input('parts'); // Array berisi nama-nama sparepart
    //     $namaLayanans = $request->input('service'); // Array berisi nama-nama sparepart

    //     // Ambil hanya field 'nama' dari setiap elemen array
    //     // $namaSparepartsNames = [];
    //     // foreach ($namaSpareparts as $sparepart) {
    //     //     $sparepartData = json_decode($sparepart);
    //     //     $namaSparepartsNames[] = $sparepartData->nama;
    //     // }
    //     // $namaSparepartsJson = json_encode($namaSparepartsNames); // Mengonversi array menjadi string JSON


    //     $namaLayanansJson = json_encode($namaLayanans); // Mengonversi array menjadi string JSON


    //     WorkingOrderModel::create([
    //         'no_wo' => $request->no_wo,
    //         'tanggal_mulai' => $request->tanggal_mulai,
    //         'waktu_mulai' => $request->waktu_mulai,
    //         'no_polisi' => $request->no_polisi,
    //         'service_advisor' =>  $user->id,
    //         'status' => 'prepare',
    //         'waktu_estimasi_selesai' => $waktu_estimasi_selesai,
    //         'biaya' => $request->estimatedCost,
    //         'biaya_tambahan' => $request->biaya_tambahan,
    //         // 'sparepart' => $namaSparepartsJson,
    //         'layanan' => $namaLayanansJson,
    //         'layanan_tambahan' => $request->layanan_tambahan,
    //         'tgl_booking' => $booking->tgl_booking,
    //         'tanggal_estimasi_selesai' => today(),

    //     ]);

    //     //Update Pelanggan
    //     $pelanggan = PelangganModel::where('no_polisi', $request->no_polisi)->first();

    //     $pelanggan->update([
    //         'no_rangka' => $request->no_rangka,
    //         'kilometer' => $request->kilometer1,
    //         'tanggal_registrasi' => now(),
    //     ]);

    //     //Update Status Booking
    //     $booking = BookingModel::where('no_polisi', $request->no_polisi)->first();

    //     $booking->update([
    //         'status' => 'prepare',
    //         'no_wo' => $request->no_wo,
    //     ]);

    //     $wo = WorkingOrderModel::all();
    //     $last = $wo->last();
    //     $id = $last->no_wo;
    //     $dataWo = WorkingOrderModel::where('no_wo', $id)->first();
    //     $title = 'BMW OFFICE';



    //     return redirect()->route('detailWO', ['id' => $id])->with(compact('dataWo', 'title'));
    // }

    public function submitWO(Request $request)
    {
        $user = User::where('nama', $request->pic_Service)->first();

        // Ambil pesanan sebelumnya yang sudah selesai jika ada
        $previousBooking = BookingModel::where('no_polisi', $request->no_polisi)
            ->where('status', 'Done')
            ->first();

        if ($previousBooking) {
            // Jika ada pesanan sebelumnya yang sudah selesai, ubah statusnya menjadi 'DONE'
            $previousBooking->update(['status' => 'Done']);
        }

        // Kemudian, buat pesanan baru atau ambil yang sudah ada jika masih dalam status 'pending'
        $booking = BookingModel::where('no_polisi', $request->no_polisi)
            ->where('status', 'pending')
            ->first();

        if (!$booking) {
            // Jika tidak ada pesanan sebelumnya yang masih pending, buat pesanan baru
            $booking = new BookingModel();
            // Set data-data pesanan baru di sini
        }

        // Update status pesanan baru menjadi 'prepare'
        $booking->update([
            'status' => 'prepare',
            'service_type' => $request->service_type,
            'no_wo' => $request->no_wo,
        ]);

        // Sisanya tetap seperti sebelumnya
        $estimasi_waktu = $request->estimatedTime;
        $jam_estimasi_selesai = floor($estimasi_waktu / 60);
        $menit_estimasi_selesai = $estimasi_waktu % 60;
        $waktu_estimasi_selesai = sprintf('%02d:%02d:00', $jam_estimasi_selesai, $menit_estimasi_selesai);

        $namaLayanans = $request->input('service');
        $namaLayanansJson = json_encode($namaLayanans);

        WorkingOrderModel::create([
            'no_wo' => $request->no_wo,
            'tanggal_mulai' => $request->tanggal_mulai,
            'waktu_mulai' => $request->waktu_mulai,
            'no_polisi' => $request->no_polisi,
            'service_advisor' =>  $user->id,
            'status' => 'prepare',
            'waktu_estimasi_selesai' => $waktu_estimasi_selesai,
            'biaya' => $request->estimatedCost,
            'biaya_tambahan' => $request->biaya_tambahan,
            'layanan' => $namaLayanansJson,
            'layanan_tambahan' => $request->layanan_tambahan,
            'tgl_booking' => $booking->tgl_booking,
            'tanggal_estimasi_selesai' => today(),
        ]);

        // Update Pelanggan
        $pelanggan = PelangganModel::where('no_polisi', $request->no_polisi)->first();
        $pelanggan->update([
            'no_rangka' => $request->no_rangka,
            'kilometer' => $request->kilometer1,
            'tanggal_registrasi' => now(),
        ]);

        // Update Status Booking (tidak perlu dilakukan lagi, sudah diupdate di atas)

        $wo = WorkingOrderModel::all();
        $last = $wo->last();
        $id = $last->no_wo;
        $dataWo = WorkingOrderModel::where('no_wo', $id)->first();
        $title = 'BMW OFFICE';

        return redirect()->route('detailWO', ['id' => $id])->with(compact('dataWo', 'title'));
    }


    public function updateWO(Request $request, $id)
    {
        $workingOrder = WorkingOrderModel::find($request->no_wo);

        if ($workingOrder) {
            $workingOrder->id_teknisi = $request->teknisiId;
            $workingOrder->status = 'On Progress';
            $workingOrder->save();
        }

        $teknisi = TeknisiModel::find($request->teknisiId);

        if ($teknisi) {
            $teknisi->status = 'On Progress';
            $teknisi->save();
        }
        return redirect()->route('detailWO', ['id' => $id])->with(compact('dataWo', 'title'));
    }

    public function detailWO($id)
    {
        $dataWo = WorkingOrderModel::where('no_wo', $id)->first();


        $dataArray = json_decode($dataWo->layanan, true);
        $names = [];
        foreach ($dataArray as $item) {
            $itemArray = json_decode($item, true); // Melakukan decode JSON pada setiap string JSON
            $names[] = $itemArray['nama'];
        }

        $layananString = implode(', ', $names);
        // $sparepartArray = json_decode($dataWo->sparepart);
        // $sparepartString = implode(', ', $sparepartArray);
        // dd($$dataWo->layanan);
        $cleanedJsonString = trim($dataWo->layanan, '"');

        $jsonString = stripslashes($dataWo->layanan);
        $layananData = json_decode($jsonString);
        // dd($jsonString);

        $waktuArray = explode(':', $dataWo->waktu_estimasi_selesai); // Memisahkan jam, menit, dan detik menjadi array
        $jam = (int)$waktuArray[0];
        $menit = (int)$waktuArray[1];
        $detik = (int)$waktuArray[2];

        $totalMenit = ($jam * 60) + $menit + ($detik / 60);


        $dataPelanggan = PelangganModel::where('no_polisi', $dataWo->no_polisi)->first();
        $title = 'BMW OFFICE';
        // return view('admin.detailWO', compact('title', 'dataWo', 'dataPelanggan', 'sparepartString', 'totalMenit', 'layananString')); HAPUS sparepartString
        return view('admin.detailWO', compact('title', 'dataWo', 'dataPelanggan',  'totalMenit', 'layananString'));
    }

    public function dataWO(Request $request)
    {
        if ($request->ajax()) {
            $data = WorkingOrderModel::with('pelanggan')->select('*');
            return Datatables::of($data)
                ->addColumn('no_wo', function ($data) {
                    $wo = '<a href="/detail/wo/' . $data->no_wo . '" style="text-decoration: none;">' . $data->no_wo . '</a>';
                    return $wo;
                })
                ->addColumn('pelanggan', function ($data) {
                    return optional($data->pelanggan)->nama;
                })
                ->addColumn('jenis_mobil', function ($data) {
                    return optional($data->pelanggan)->jenis_mobil;
                })
                ->rawColumns(['no_wo', 'pelanggan', 'jenis_mobil'])
                ->make(true);
        }
        // return  view('createWO', [
        //     "title" => 'Create WO'
        // ], compact('data'));
    }

    public function getPelanggan($id)
    {
        // $pelanggan = WorkingOrderModel::where('no_polisi', $id)->first();
        // return json_decode($pelanggan);
        $pelanggan = WorkingOrderModel::where('no_polisi', $id)->first();

        if ($pelanggan) {
            return json_decode($pelanggan);
        } else {
            return response()->json([], 200); // Mengembalikan JSON kosong dengan status 200
        }
    }

    public function teknisiForeman($foremanId)
    {
        $foreman = ForemanModel::find($foremanId);

        if (!$foreman) {
            return response()->json(['message' => 'Foreman not found'], 404);
        }

        $teknisi = $foreman->teknisi;

        return response()->json(['foreman' => $foreman, 'teknisi' => $teknisi]);
    }

    public function exportpdf()
    {
        // $dataWo = WorkingOrderModel::all();
        // view()->share('no_wo', $dataWo);
        $historyWo = WorkingOrderModel::all();

        $dates = $historyWo->pluck('tanggal_mulai')->unique();

        $selectedDate = request()->segment(2);
        // Lakukan logika untuk mengambil data dari tanggal tertentu, misalnya:
        $paymentData = WorkingOrderModel::whereDate('tanggal_mulai', $selectedDate)->get();

        $noPlatArray = $paymentData->pluck('no_polisi')->toArray();

        // Mengambil data pelanggan berdasarkan nomor polisi
        $pelangganData = PelangganModel::whereIn('no_polisi', $noPlatArray)->get();

        $mergedData = [];
        $TotalHargaPerHari = 0;
        foreach ($paymentData as $payment) {
            $pelanggan = $pelangganData->where('no_polisi', $payment->no_polisi)->first();
            $dataArray = json_decode($payment->layanan, true);
            $names = [];
            $prices = [];
            foreach ($dataArray as $item) {
                $itemArray = json_decode($item, true); // Melakukan decode JSON pada setiap string JSON
                $names[] = $itemArray['nama'];

                $formattedPrice = 'Rp. ' . number_format(floatval($itemArray['harga']), 0, ',', '.');
                $prices[] = $formattedPrice;
            }

            $layananString = implode(', ', $names);
            $hargaString = implode(', ', $prices);

            $TotalHargaRupiah = 'Rp. ' . number_format(floatval($payment->biaya), 0, ',', '.');
            $TotalHargaPerHari += $payment->biaya;
            $mergedData[] = [
                'no_wo' => $payment->no_wo,
                'payment_date' => $payment->tanggal_mulai,
                'no_polisi' => $payment->no_polisi,
                'customer_name' => optional($pelanggan)->nama,
                'jenis_mobil' => optional($pelanggan)->jenis_mobil,
                'alamat' => optional($pelanggan)->alamat,
                'no_rangka' => optional($pelanggan)->no_rangka,
                'layanan' => $names,
                'layananHarga' => $prices,
                'totalHarga' => $TotalHargaRupiah,
            ];
        }

        $TotalHargaPerHari = 'Rp. ' . number_format(floatval($TotalHargaPerHari), 0, ',', '.');

        $data = [
            'title' => 'value2',
            'date' => $selectedDate,
            'data' => $mergedData, // Mengirim data tanggal ke view
            'hargaPerhari' => $TotalHargaPerHari,
        ];
        $pdf = PDF::loadView('dailyreport-pdf', $data);
        $pdf->setPaper('A3', 'landscape');
        return $pdf->download('dataWo.pdf');
    }

    public function updateTeknisiInWo($id, Request $request)
    {
        $workOrder = WorkingOrderModel::find($id);

        if (!$workOrder) {
            // Handle jika working order tidak ditemukan
            return response()->json(['message' => 'Working order not found'], 404);
        }

        $teknisiId = $request->input('teknisi_id');

        if (!$teknisiId) {
            // Handle jika teknisi_id tidak ada dalam request
            return response()->json(['message' => 'Teknisi ID is required'], 400);
        }

        // Lakukan pengecekan apakah teknisi_id valid dan ada dalam tabel teknisi
        $teknisi = TeknisiModel::find($teknisiId);

        if (!$teknisi) {
            // Handle jika teknisi tidak ditemukan
            return response()->json(['message' => 'Teknisi not found'], 404);
        }

        // Update id_teknisi dalam working order
        $workOrder->id_teknisi = $teknisiId;
        $workOrder->save();

        return response()->json(['message' => 'Teknisi updated successfully', 'teknisi_id' => $teknisiId], 200);
    }

    // public function getPaymentData(Request $request)
    // {
    //     $selectedDate = $request->query('date'); // Ambil tanggal dari parameter query

    //     // Lakukan logika untuk mengambil data dari tanggal tertentu, misalnya:
    //     $paymentData = WorkingOrderModel::whereDate('tanggal_mulai', $selectedDate)->get();

    //     $noPlatArray = $paymentData->pluck('no_polisi')->toArray();

    //     // Mengambil data pelanggan berdasarkan nomor polisi
    //     $pelangganData = PelangganModel::whereIn('no_polisi', $noPlatArray)->get();

    //     // Kembalikan data dalam format JSON
    //     $mergedData = [];
    //     $totalHarga = 0;
    //     foreach ($paymentData as $payment) {
    //         $pelanggan = $pelangganData->where('no_polisi', $payment->no_polisi)->first();
    //         $dataArray = json_decode($payment->layanan, true);
    //         $names = [];
    //         $prices = [];
    //         $hargaSparepart = [];
    //         $totalHarga += $payment->biaya;
    //         foreach ($dataArray as $item) {
    //             $itemArray = json_decode($item, true); // Melakukan decode JSON pada setiap string JSON
    //             $names[] = $itemArray['nama'];
    //             $formattedPrice = 'Rp. ' . number_format(floatval($itemArray['harga']), 0, ',', '.');
    //             $prices[] = $formattedPrice;
    //         }

    //         $layananString = implode(', ', $names);
    //         $hargaString = implode(', ', $prices);

    //         $sparepartArray = json_decode($payment->sparepart);
    //         foreach ($sparepartArray as $sparepart) {
    //             $sparepart = LayananModel::where('nama', $sparepart)->first();
    //             $formattedPrice = 'Rp. ' . number_format(floatval($sparepart->harga), 0, ',', '.');
    //             $hargaSparepart[] = $formattedPrice;
    //         }

    //         $totalperWO = 'Rp. ' . number_format(floatval($payment->biaya), 0, ',', '.');

    //         $mergedData[] = [
    //             'no_wo' => $payment->no_wo,
    //             'payment_date' => $payment->tanggal_mulai,
    //             'no_polisi' => $payment->no_polisi,
    //             'customer_name' => optional($pelanggan)->nama,
    //             'jenis_mobil' => optional($pelanggan)->jenis_mobil,
    //             'alamat' => optional($pelanggan)->alamat,
    //             'no_rangka' => optional($pelanggan)->no_rangka,
    //             'layanan' => $names,
    //             'layananHarga' => $prices,
    //             // 'sparepart' => $sparepartArray,
    //             'sparepartHarga' => $hargaSparepart,
    //             'totalPerWo' => $totalperWO,
    //         ];
    //     }

    //     $totalHargaString = 'Rp. ' . number_format(floatval($totalHarga), 0, ',', '.');
    //     // Kembalikan data dalam format JSON
    //     return response()->json([
    //         'data' => $mergedData,
    //         'totalHarga' => $totalHargaString,

    //     ]);
    // }

    //modify FIRDA
    public function getPaymentData(Request $request)
    {
        // Ambil tanggal dari parameter query
        $selectedDate = $request->query('date');

        // Lakukan query untuk mengambil data sesuai tanggal
        $paymentData = WorkingOrderModel::whereDate('tanggal_mulai', $selectedDate)->get();

        // Lakukan query untuk mengambil data pelanggan berdasarkan nomor polisi
        $noPlatArray = $paymentData->pluck('no_polisi')->toArray();
        $pelangganData = PelangganModel::whereIn('no_polisi', $noPlatArray)->get();

        // Kembalikan data dalam format JSON
        $mergedData = [];
        $totalHarga = 0;

        foreach ($paymentData as $payment) {
            // Temukan pelanggan yang sesuai dengan nomor polisi dari order
            $pelanggan = $pelangganData->firstWhere('no_polisi', $payment->no_polisi);

            // Decode data layanan dari JSON
            $dataArray = json_decode($payment->layanan, true);

            $names = [];
            $prices = [];

            foreach ($dataArray as $item) {
                // Decode JSON pada setiap string JSON
                $itemArray = json_decode($item, true);
                $names[] = $itemArray['nama'];
                $formattedPrice = 'Rp. ' . number_format(floatval($itemArray['harga']), 0, ',', '.');
                $prices[] = $formattedPrice;
            }

            // Gabungkan data layanan
            $layananString = implode(', ', $names);
            $hargaString = implode(', ', $prices);

            // Format total biaya per WO
            $totalperWO = 'Rp. ' . number_format(floatval($payment->biaya), 0, ',', '.');

            // Tambahkan data ke array $mergedData
            $mergedData[] = [
                'no_wo' => $payment->no_wo,
                'payment_date' => $payment->tanggal_mulai,
                'no_polisi' => $payment->no_polisi,
                'customer_name' => optional($pelanggan)->nama,
                'jenis_mobil' => optional($pelanggan)->jenis_mobil,
                'alamat' => optional($pelanggan)->alamat,
                'no_rangka' => optional($pelanggan)->no_rangka,
                'layanan' => $names,
                'layananHarga' => $prices,
                'totalPerWo' => $totalperWO,
            ];

            // Akumulasi total harga
            $totalHarga += $payment->biaya;
        }

        // Format total harga keseluruhan
        $totalHargaString = 'Rp. ' . number_format(floatval($totalHarga), 0, ',', '.');

        // Kembalikan data dalam format JSON
        return response()->json([
            'data' => $mergedData,
            'totalHarga' => $totalHargaString,
        ]);
    }


    public function cetakSA($tgl)
    {

        // dd($tgl);
        $data = []; // Isi dengan data yang diperlukan untuk view

        $title = "hore";
        $pdf = Pdf::loadView('admin.CetakSaPertanggal', compact('title', 'data'));
        return $pdf->download('invoice.pdf');
        // return view('admin.CetakSaPertanggal');
    }
}
