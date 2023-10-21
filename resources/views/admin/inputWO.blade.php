@extends('main')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css">
</head>
<style>
    .no-wrap {
        white-space: nowrap;
    }

    .margin {
        margin-right: 2px;
    }
</style>
@section('content')
    <div class="container-fluid" style="background-image: url(/bgwelcome.jpg); width: 100%;">
        <div class="container-xl px-4 px-lg-5 d-flex  align-items-top justify-content-center ">
            <div class="col-12 d-flex justify-content-center">
                {{-- <div class="text-center"> --}}
                <div class="card w-100 border-0 rounded-3">
                    <form id="woForm" action="/submit/wo/baru" method="post">
                        @csrf
                        <div class="card-header " style="background-color: #241468;color: white;">
                            <div class="row">
                                <div class="col-8 d-flex justify-content-start">
                                    <h4>Input WO</h4>
                                </div>
                                <div class="col-4 align-bottom d-flex justify-content-end" onclick="edit()">
                                    <button type="submit" class="btn" style="color: aliceblue"><i
                                            class="bx bx-save bx-md " style="width: 10px; margin-right: 10%;"></i></button>
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
                                                <input required type="text" class="form-control" id="no_wo"
                                                    name="no_wo" readonly>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="tgl_booking" class="form-label">Start Date</label>
                                                <input required type="date" class="form-control" id="tanggal_mulai"
                                                    name="tanggal_mulai">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="waktu_mulai" class="form-label">Start Time</label>
                                                <input required type="time" class="form-control" id="waktu_mulai"
                                                    name="waktu_mulai">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="pic_service" class="form-label">Service Advisor</label>
                                                        <input required type="text" class="form-control" id="pic_service"
                                                            name="pic_Service" value="{{ ucwords(Auth::user()->nama) }}">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="no_tlp_pic" class="form-label">Phone Number</label>
                                                        <input required type="number" class="form-control" id="no_tlp_pic"
                                                            placeholder="+62" name="no_tlp_pic"
                                                            value="{{ Auth::user()->no_telp }}">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-auto">
                                            <div class="mb-3">
                                                <label for="kilometer1" class="form-label">Mileage</label>
                                                <input required type="number" class="form-control" id="kilometer1"
                                                    name="kilometer1">
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
                                                            name="no_polisi" onchange="pelanggan()">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="jenis_mobil" class="form-label">Car Model</label>
                                                        <input required type="text" class="form-control"
                                                            id="jenis_mobil" name="jenis_mobil">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="nama_customer" class="form-label">Customer Name</label>
                                                <input required type="text" class="form-control" id="nama_customer"
                                                    name="nama_pelanggan">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="alamat" class="form-label">Address</label>
                                                <input required type="text" class="form-control" id="alamat"
                                                    name="alamat">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="no_rangka" class="form-label">Chassis Number</label>
                                                <input required type="text" class="form-control" id="no_rangka"
                                                    name="no_rangka">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#myModal">
                                                    Detail Service
                                                </button>

                                            </div>
                                            <div class="modal fade" id="myModal">
                                                <div class="modal-dialog">
                                                    <!-- Bagian Konten Modal -->
                                                    <div class="modal-content" style="width: 800px; margin: 0 auto;">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Detail Service</h4>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="container mt-3">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="mb-1">
                                                                        <label for="service" class="form-label">Service
                                                                            Type<span class="text-danger">*</span></label>
                                                                        <input required type="text"
                                                                            class="form-control" id="service_type"
                                                                            name="service_type">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-2">
                                                                        <label for="keluhan" class="form-label">Keluhan
                                                                            Customer</label>
                                                                        <textarea class="form-control" id="keluhan" name="keluhan" rows="2"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                        </div>

                                                        <div class="container mt-3">
                                                            <form>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="mb-1">
                                                                            <label for="service" class="form-label">Mobil
                                                                                Bensin</label>
                                                                            @foreach ($bensinOptions as $layanan)
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value='{"harga": "{{ $layanan->harga }}", "waktu": "{{ $layanan->waktu }}", "nama": "{{ $layanan->nama }}" }'
                                                                                        id="check{{ $layanan->kode }}"
                                                                                        name="service[]">
                                                                                    <label class="form-check-label"
                                                                                        for="check{{ $layanan->kode }}">{{ $layanan->nama }}</label>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="parts" class="form-label">Mobil
                                                                                Diesel</label>
                                                                            @foreach ($dieselOptions as $diesel)
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value='{"harga": "{{ $diesel->harga }}", "waktu": "{{ $diesel->waktu }}", "nama": "{{ $diesel->nama }}" }'
                                                                                        id="check{{ $diesel->kode }}"
                                                                                        name="service[]">
                                                                                    <label class="form-check-label"
                                                                                        for="check{{ $diesel->kode }}">{{ $diesel->nama }}</label>
                                                                                </div>
                                                                            @endforeach
                                                                            <!-- Tambahkan checkbox diesel lainnya di sini -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                {{-- modifikasi FIRDA --}}
                                                                <div class="my-3 row">
                                                                    <!-- Kolom Service Tambahan -->
                                                                    <div class="col-md-6">
                                                                        <label for="serviceTambahan" class="form-label">Service Tambahan</label>
                                                                        <textarea class="form-control" id="layanan_tambahan" name="layanan_tambahan" rows="3"></textarea>
                                                                    </div>
                                                                
                                                                    <!-- Kolom Biaya Tambahan -->
                                                                    <div class="col-md-6">
                                                                        <label for="biayaTambahan" class="form-label">Biaya Tambahan</label>
                                                                        <input type="text" class="form-control" id="biaya_tambahan" name="biaya_tambahan" placeholder="Biaya Tambahan">
                                                                        
                                                                        <label for="waktuTambahan" class="form-label">Waktu Tambahan <small class="text-muted"> (dalam menit)</small></label>
                                                                        <input type="text" class="form-control" id="waktu_tambahan" name="waktu_tambahan" placeholder="Masukkan angka">
                                                                    </div>
                                                                
                                                                    <!-- Kolom Service Cover (Checkbox) -->
                                                                    <div class="col-md-6 my-2">
                                                                        <label for="serviceCover" class="form-label mx-2">Service Cover</label>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="checkbox" id="serviceCoverCheckbox" name="serviceCover" value="active">
                                                                            <label class="form-check-label" for="serviceCoverCheckbox">Active</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                

                                                                <div class="mb-3">
                                                                    {{-- <label for="hours" class="form-label">Jam Kerja</label> --}}
                                                                    <input type="hidden" class="form-control"
                                                                        id="hours" name="hours" step="0.5">
                                                                </div>
                                                                <button type="submit" class="btn btn-primary">Hitung
                                                                    Estimasi</button>
                                                            </form>

                                                            <!-- Tampilkan hasil estimasi biaya di sini -->
                                                            <div class="mt-4">
                                                                <h3>Estimasi Biaya: Rp.<span id="estimatedCost">0</span>
                                                                </h3>
                                                            </div>
                                                            <div class="mt-4">
                                                                <h3>Estimasi Waktu: <span id="estimatedTime">0</span>
                                                                    Menit
                                                                </h3>
                                                            </div>
                                                            <input type="hidden" name="estimatedCost"
                                                                id="estimatedCosts">
                                                            <input type="hidden" name="estimatedTime"
                                                                id="estimatedTimes">
                                                        </div>
                                                        <!-- Bagian Footer Modal -->

                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                    </form>
                </div>
            </div>
            {{-- </div> --}}
        </div>
    </div>
    @php
        $last_wo = $dataWo->last();
        $last_wip = $dataWo->last();
        // dd($last_pr);
    @endphp

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- <script>
        // Simulasi perhitungan estimasi biaya
        const form = document.querySelector('form');
        const estimatedCostSpan = document.getElementById('estimatedCost');
        const estimatedTimeSpan = document.getElementById('estimatedTime');
        const serviceCoverCheckbox = document.getElementById('serviceCoverCheckbox'); // Tambahkan ID ke checkbox Service Cover
    
        function edit() {
            // Ambil formulir dengan ID "woForm" dan submitkan
            const woForm = document.getElementById('woForm');
            woForm.submit();
        }
    
        form.addEventListener('submit', function(event) {
            event.preventDefault();
    
            const selectedServices = document.querySelectorAll('input[name="service[]"]:checked');
    
            let totalCostForServices = 0;
            let totalWaktuForServices = 0;
    
            selectedServices.forEach(checkbox => {
                const data = JSON.parse(checkbox.value);
                totalCostForServices += parseFloat(data.harga);
                totalWaktuForServices += parseInt(data.waktu.split(':')[0]) * 60 + parseInt(data.waktu.split(':')[1]);
            });
    
            let totalCost = totalCostForServices;
            let totalAllwaktu = totalWaktuForServices;
    
            // Modifikasi perhitungan totalCost berdasarkan status Service Cover checkbox
            if (serviceCoverCheckbox.checked) {
                totalCost = 0; // Jika Service Cover dicentang, totalCost menjadi 0
            }
    
            estimatedCostSpan.textContent = totalCost.toLocaleString('id-ID');
            estimatedTimeSpan.textContent = totalAllwaktu;
            document.getElementById('estimatedCosts').value = totalCost;
            document.getElementById('estimatedTimes').value = totalAllwaktu;
        });
    </script> --}}

    {{-- modify FIRDA --}}
    <script>
        // Simulasi perhitungan estimasi biaya
        const form = document.querySelector('form');
        const estimatedCostSpan = document.getElementById('estimatedCost');
        const estimatedTimeSpan = document.getElementById('estimatedTime');
        const serviceCoverCheckbox = document.getElementById('serviceCoverCheckbox');
        const biayaTambahanInput = document.getElementById('biaya_tambahan'); // Tambahkan ID ke input biaya tambahan
        const waktuTambahanInput = document.getElementById('waktu_tambahan'); // Tambahkan ID ke input biaya tambahan

        function edit() {
            // Ambil formulir dengan ID "woForm" dan submitkan
            const woForm = document.getElementById('woForm');
            woForm.submit();
        }

        form.addEventListener('submit', function(event) {
            event.preventDefault();

            const selectedServices = document.querySelectorAll('input[name="service[]"]:checked');

            let totalCostForServices = 0;
            let totalWaktuForServices = 0;

            selectedServices.forEach(checkbox => {
                const data = JSON.parse(checkbox.value);
                totalCostForServices += parseFloat(data.harga);
                totalWaktuForServices += parseInt(data.waktu.split(':')[0]) * 60 + parseInt(data.waktu
                    .split(':')[1]);
            });

            let totalCost = totalCostForServices;
            let totalAllwaktu = totalWaktuForServices;

            // Modifikasi perhitungan totalCost berdasarkan status Service Cover checkbox
            if (serviceCoverCheckbox.checked) {
                totalCost = 0;
            }

            // Tambahkan biaya tambahan ke totalCost
            if (biayaTambahanInput.value) {
                totalCost += parseFloat(biayaTambahanInput.value);
            }

            if (waktuTambahanInput.value) {
                totalAllwaktu += parseFloat(waktuTambahanInput.value);
            }

            estimatedCostSpan.textContent = totalCost.toLocaleString('id-ID');
            estimatedTimeSpan.textContent = totalAllwaktu;
            document.getElementById('estimatedCosts').value = totalCost;
            document.getElementById('estimatedTimes').value = totalAllwaktu;
        });
    </script>


    <script>
        document.getElementById("no_tlp_pic").addEventListener("input", function() {
            let input = this.value;
            input = input.replace(/\D/g, ''); // Hapus semua karakter non-digit

            if (input.length >= 2) {
                if (input.substring(0, 2) !== "62") {
                    input = "62" + input;
                }
            }

            this.value = input;
        });
    </script>
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
    <script>
        // Untuk format Nomor WO
        @php
            $last_wo = $dataWo->last();
            $urutan = $last_wo ? (int) substr($last_wo->no_wo, -4) + 1 : 1;
            $nomor_wo = str_pad($urutan, 4, '0', STR_PAD_LEFT);
        @endphp

        let nomor_wo = '{{ $nomor_wo }}';
        document.getElementById("no_wo").value = nomor_wo;
        document.getElementById("no_wip").value = nomor_wo;

        function pelanggan() {
            let id = document.getElementById("no_polisi").value;
            let url = '/api/pelanggan' + '/' + id;
            $.ajax({
                method: "GET",
                dataType: "json",
                url: url,
                success: function(data) {
                    console.log(data);
                    if (data.pelanggan) {
                        // Isi elemen-elemen HTML dengan data pelanggan
                        document.getElementById("jenis_mobil").value = data.pelanggan.jenis_mobil;
                        document.getElementById("nama_customer").value = data.pelanggan.nama;
                        document.getElementById("alamat").value = data.pelanggan.alamat;
                        document.getElementById("no_tlp_pic").value = data.pelanggan.no_telp;
                        document.getElementById("no_rangka").value = data.pelanggan.no_rangka;

                        document.getElementById("service_type").value = data.service ? data.service
                            .service_type : '';
                        document.getElementById("keluhan").value = data.service ? data.service.keluhan : '';
                        // Isi elemen input "tgl_booking" dengan tgl_booking_terbaru
                        document.getElementById("tanggal_mulai").value = data.tgl_booking_terbaru;
                        document.getElementById("waktu_mulai").value = data.service ? data.service.waktu_mulai : '';

                    } else {
                        // Handle jika data pelanggan tidak ditemukan
                        alert("Data pelanggan tidak ditemukan.");
                    }
                },
                error: function() {
                    // Handle jika terjadi kesalahan dalam permintaan
                    alert("Terjadi kesalahan dalam permintaan.");
                }
            });
        }
    </script>
@endsection
