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
                                                        <input required type="text" class="form-control" id="jenis_mobil"
                                                            name="jenis_mobil">
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
                                                <label for="no_kerangka" class="form-label">Chassis Number</label>
                                                <input required type="text" class="form-control" id="no_kerangka"
                                                    name="no_kerangka">
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
                                                            <form>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="mb-1">
                                                                            <label for="service" class="form-label">Jenis
                                                                                Layanan</label>
                                                                            @foreach ($layananOptions as $layanan)
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
                                                                            <label for="parts"
                                                                                class="form-label">Sparepart</label>
                                                                            @foreach ($spareparts as $sparepart)
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value='{"harga": "{{ $sparepart->harga }}", "waktu": "{{ $sparepart->waktu }}", "nama": "{{ $sparepart->nama }}" }'
                                                                                        id="check{{ $sparepart->kode }}"
                                                                                        name="parts[]">
                                                                                    <label class="form-check-label"
                                                                                        for="check{{ $sparepart->kode }}">{{ $sparepart->nama }}</label>
                                                                                </div>
                                                                            @endforeach
                                                                            <!-- Tambahkan checkbox sparepart lainnya di sini -->
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
                                                                <h3>Estimasi Waktu: <span id="estimatedTime">0</span> Menit
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
    <script>
        // Simulasi perhitungan estimasi biaya
        const form = document.querySelector('form');
        const estimatedCostSpan = document.getElementById('estimatedCost');
        const estimatedTimeSpan = document.getElementById('estimatedTime');

        function edit() {
            // Ambil formulir dengan ID "woForm" dan submitkan
            const woForm = document.getElementById('woForm');
            woForm.submit();
        }
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            // Contoh perhitungan estimasi biaya (hanya simulasi)
            // const selectedService = JSON.parse(document.getElementById('service').value);
            // const hargaService = parseFloat(selectedService.harga);
            // const waktuService =  parseInt(selectedService.waktu.split(':')[0]) * 60 + parseInt(selectedService.waktu.split(':')[1]);

            // const selectedServiceData = JSON.parse(selectedService); 
            // const hargaService = parseFloat(selectedServiceData.harga); 
            // $selectedService = json_decode($_POST['service']); // Mendekode JSON menjadi objek PHP
            // $hargaService = floatval($selectedService->harga);

            const selectedParts = document.querySelectorAll('input[name="parts[]"]:checked');
            const selectedServices = document.querySelectorAll('input[name="service[]"]:checked');
            // const hoursOfWork = parseFloat(document.getElementById('hours').value);

            let totalCostForServices = 0;
            let totalWaktuForServices = 0;
            selectedServices.forEach(checkbox => {
                const data = JSON.parse(checkbox.value);
                totalCostForServices += parseFloat(data.harga);
                totalWaktuForServices += parseInt(data.waktu.split(':')[0]) * 60 + parseInt(data.waktu
                    .split(':')[1]);
            });
            let totalCostForParts = 0;
            let totalWaktuForParts = 0;
            selectedParts.forEach(checkbox => {
                const data = JSON.parse(checkbox.value);
                totalCostForParts += parseFloat(data.harga);
                totalWaktuForParts += parseInt(data.waktu.split(':')[0]) * 60 + parseInt(data.waktu.split(
                    ':')[1]);
            });
            totalAllwaktu = totalWaktuForParts + totalWaktuForServices
            const totalWaktuInJam = totalAllwaktu / 60;




            const baseCost = 50000; // Biaya dasar
            const costPerService = {
                1: 20000,
                2: 30000,
                3: 40000
            }; // Biaya tambahan berdasarkan jenis layanan

            const costPerPart = 10000; // Biaya tambahan per sparepart
            const hourlyRate = 15000; // Biaya per jam kerja

            // const totalCost = baseCost + (costPerService[selectedService] || 0) + (selectedParts * costPerPart) + (hoursOfWork * hourlyRate);
            const totalCost = (totalCostForServices + totalCostForParts);
            // const totalCost = totalWaktuInJam;
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

                        // Isi elemen input "tgl_booking" dengan tgl_booking_terbaru
                        document.getElementById("tanggal_mulai").value = data.tgl_booking_terbaru;
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
