@extends('main')
@section('content')
    <head>


    </head>

    <body>
    <div class="container-fluid" style="background-image: url(/bgwelcome.jpg); width: 100%;">
        <div class="container-xl px-4 px-lg-5 d-flex  align-items-top justify-content-center ">
            <div class="col-12 d-flex justify-content-center">
                {{-- <div class="text-center"> --}}
                <div class="card w-100 border-0 rounded-3">
                    {{-- <form action="/submit/wo/baru" method="post">
                        @csrf --}}
                    <div class="card-header " style="background-color: #241468;color: white;">
                        <div class="row">
                            <div class="col-8 d-flex justify-content-start">
                                <h4>Detail WO</h4>
                            </div>
                            <div class="col-4 align-bottom d-flex justify-content-end" onclick="edit()">
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="col-12">

                            <div class="row w-100">
                                <div class="col-6">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="no_wo" class="form-label">WO Number</label>
                                            <input required type="text" class="form-control" id="no_wo" name="no_wo" 
                                            value="{{ $dataWo->no_wo }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="tgl_mulai" class="form-label">Start Date</label>
                                            <input required type="date" class="form-control" id="tgl_mulai"
                                                name="tgl_mulai"
                                                value="{{ $dataWo->tanggal_mulai }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="waktu_mulai" class="form-label">Start Time</label>
                                            <input required type="time" class="form-control" id="waktu_mulai"
                                                name="waktu_mulai"
                                                value="{{ $dataWo->waktu_mulai }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="pic_service" class="form-label">Service Advisor</label>
                                                    <input required type="text" class="form-control" id="pic_service"
                                                        name="pic_Service" value="{{ ucwords(Auth::user()->nama) }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="no_tlp_pic" class="form-label">Phone Number</label>
                                                    <input required type="tel" class="form-control" id="no_tlp_pic" placeholder="+62" name="no_tlp_pic"
                                                        value="{{ $dataPelanggan->no_telp }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="kilometer" class="form-label">Mileage</label>
                                            <input type="number" class="form-control" id="kilometer"
                                                value="{{ $dataWo->pelanggan->kilometer }}" name="kilometer"
                                                value="{{ $dataPelanggan->kilometer }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="no_polisi" class="form-label">Police Number</label>
                                                    <input required type="text" class="form-control" id="no_polisi"
                                                        name="no_polisi" onchange="pelanggan()"
                                                        value="{{ $dataPelanggan->no_polisi }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="jenis_mobil" class="form-label">Car Model</label>
                                                    <input required type="text" class="form-control" id="jenis_mobil"
                                                        name="jenis_mobil"
                                                        value="{{ $dataPelanggan->jenis_mobil }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="nama_customer" class="form-label">Customer Name</label>
                                            <input required type="text" class="form-control" id="nama_customer"
                                                name="nama_pelanggan"
                                                value="{{ $dataPelanggan->nama }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="alamat" class="form-label">Address</label>
                                            <input required type="text" class="form-control" id="alamat"
                                                name="alamat"
                                                value="{{ $dataPelanggan->alamat }}" readonly>

                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="no_kerangka" class="form-label">Chassis Number</label>
                                            <input required type="text" class="form-control" id="no_kerangka"
                                                name="no_kerangka"
                                                value="{{ $dataPelanggan->no_rangka }}" readonly>

                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                            <div class="row">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                                    Detail Service
                                                  </button>

                                    </div>
                                    <div class="modal fade" id="myModal">
                                        <div class="modal-dialog">
                                        <!-- Bagian Konten Modal -->
<div class="modal-content" style="width: 800px; margin: 0 auto;">
    <div class="modal-header">
        <h4 class="modal-title">Detail Service</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
    </div>
    <div class="container mt-3">
        <form>
            <div class="mb-1">
            <label for="service" class="form-label">Jenis Layanan</label>
                <div class="form-check">
                    <label class="form-check-label" for="">{{ $layananString }}</label>
                </div>
            </div>
            <div class="mb-3">
                {{-- <label for="parts" class="form-label">Sparepart</label>
                <div class="form-check">
                    <label class="form-check-label" for="">{{ $sparepartString }}</label>
                </div> --}}
                <!-- Tambahkan checkbox sparepart lainnya di sini -->
            </div>
            <!-- <div class="mb-3">
                {{-- <label for="hours" class="form-label">Jam Kerja</label> --}}
                <input type="hidden" class="form-control" id="hours" name="hours" step="0.5">
            </div>
            <button type="submit" class="btn btn-primary">Hitung Estimasi</button> -->
        </form>
    
        <!-- Tampilkan hasil estimasi biaya di sini -->
        <div class="mt-4">
            <h3>Estimasi Biaya: Rp.<span id="estimatedCost">{{ $dataWo->biaya }}</span></h3>
        </div>
     
        <div class="mt-4">
            <h3>Estimasi Waktu: <span id="estimatedTime">{{ $totalMenit }}</span> Menit</h3>
        </div>
        <input type="hidden" name="estimatedCost" id="estimatedCosts">
        <input type="hidden" name="estimatedTime" id="estimatedTimes">
    </div>
        <!-- Bagian Footer Modal -->
      
    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- </form> --}}
                </div>
            </div>
            {{-- </div> --}}
        </div>
    </div>

    

    
    <script>
            
        function openDetailModal() {
            var modal = document.getElementById("detailModal");
            modal.style.display = "block";
            document.querySelector(".modal-content").innerHTML = "<p>Detail service content</p>";
            
        }
    
        // Fungsi untuk menutup modul saat di klik di luar area modul
        window.onclick = function(event) {
            var modal = document.getElementById("detailModal");
            if (event.target === modal) {
                modal.style.display = "none";
            }
        };
    </script>
    </body>

@endsection