

@extends('main')
@section('content')

<style>
    /* Style the modal */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
}


/* Modal content */
.modal-content {
    background-color: white;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    left: 8%;
    width: 60%;
    max-height: 400px; /* Atur tinggi maksimum modal */
    overflow-y: auto;
}

/* Close button */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

    </style>
<div class="container-fluid pb-3 flex-grow-1 d-flex flex-column flex-sm-row overflow-auto">
    <div class="row flex-grow-sm-1 flex-grow-0">
        <aside class="col-sm-3 flex-grow-sm-1 flex-shrink-1 flex-grow-0 sticky-top pb-sm-0 pb-3">
            <div class="bg-light border rounded-3 p-1 h-100 sticky-top">
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th class="text-center">Report History</th>
                        </tr>
                    </thead>
                    <tbody>
                   
                        <!-- You can add more rows here -->
                    </tbody>
                </table>
            </div>
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h1 style="color: black; text-align: center; font-size: 24px;">
                        <span style="font-size: 32px;">📊</span> Daily Report: <span id="datedialyReport"> </span>
                    </h1>
                    <div id="container">
                        <!-- Elemen-elemen akan ditambahkan di sini -->
                    </div>
                  
                   
                    
                    <button id="exportButton" style="background-color: #008CBA; color: white; padding: 10px 20px; border: none; cursor: pointer;">
    Export to PDF
  <button id="exportButtonPDF" style="background-color: #008CBA; color: white; padding: 10px 20px; border: none; cursor: pointer;">
                </div>
            </div>
            
            
        </aside>
        <main class="col overflow-auto h-100">
            <div class="bg-light border rounded-3 p-3">
                <div class="card-header">
                    <div class="row flex-justify-content-between text-center">
                        <div class="col-8 d-flex justify-content-start text-center fs-4"
                            style="font-weight: 700; font-size: 20px">List Working
                            Order</div>
                        <div class="col-4"><a href="/input/wo" class="btn btn-outline-secondary">Input
                                Working Order </a></div>
                    </div>
                </div>
                <div class="table-responsive p-3">
                    <table class="table table-bordered m-3 data-table">
                        <thead>
                            <th>NO WO</th>
                            <th>Nama Customer</th>
                            <th>NO Polisi</th>
                            <th>Jenis Mobil</th>
                            <th>Tanggal Mulai</th>
                            <th>Status</th>
                            <th>Sparepart</th>
                            
                        </thead>
                        <tbody>
                       
                        </tbody>
                    </table>
                </div>
                <hr />
            </div>
        </main>
    </div>
</div>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const exportButtonPDF = document.getElementById('exportButtonPDF');
        const modalContent = document.querySelector('.modal-content');
        const modal = document.getElementById('myModal');


       
        exportButtonPDF.addEventListener('click', () => {
            const modalContent = modal.querySelector('.modal-content');
            
            // Ubah style sementara agar konten di luar layar bisa terlihat
            const originalStyle = modal.style.display;
            modal.style.display = 'block';

            // Tambahkan delay untuk memastikan konten di luar layar dimuat dengan benar
            setTimeout(() => {
                // Konversi konten modal menjadi file PDF
                html2pdf().from(modalContent).outputPdf().then(pdf => {
                    const pdfBlob = new Blob([pdf], { type: 'application/pdf' });
                    const pdfURL = URL.createObjectURL(pdfBlob);
                    const a = document.createElement('a');
                    a.style.display = 'none';
                    a.href = pdfURL;
                    a.download = 'full_modal_content.pdf';
                    document.body.appendChild(a);
                    a.click();
                    document.body.removeChild(a);

                    // Kembalikan style modal ke semula
                    modal.style.display = originalStyle;
                });
            }, 1000); // Sesuaikan waktu delay sesuai kebutuhan Anda
        });
    });
</script> -->











<!-- <script>
    var modal = document.getElementById("myModal");
    var span = document.getElementsByClassName("close")[0];

    var tableRows = document.getElementsByTagName("tr");
    for (var i = 0; i < tableRows.length; i++) {
        tableRows[i].addEventListener("click", function() {
            var woNumber = this.getAttribute("data-wo");
            var selectedDate = this.getAttribute("data-date");
            const datedialyReport = document.getElementById('datedialyReport'); 
            datedialyReport.textContent = selectedDate;

            console.log(selectedDate);

            fetch(`/get-payment-data?date=${selectedDate}`)
            .then(response => response.json())
            .then(data => {
            console.log(data);
            // document.getElementById("woNumber").textContent = data.data[0].no_wo;
            const container = document.getElementById('container'); // Ganti 'container' dengan ID div tempat Anda ingin menampilkan hasil
            console.log(container);
            const templateHTML = data.data.map(item =>
            
            `
                <div style="display: flex; flex-wrap: wrap; margin-top: 10px;">
                        <div style="flex: 1; margin-right: 20px;">
                            <p style="color: black; font-size: 16px;">No WO: <span id="woNumber">${item.no_wo}</span></p>
                            <p style="color: black; font-size: 16px;">Nama Customer: <span id="customerName">${item.customer_name}</span></p>
                        </div>
                        <div style="flex: 1; margin-right: 20px;">
                            <p style="color: black; font-size: 16px;">No Plat: <span id="noPlat">${item.no_polisi}</span></p>
                            <p style="color: black; font-size: 16px;">Alamat: <span id="alamat">${item.alamat}</span></p>
                        </div>
                        <div style="flex: 1;">
                            <p style="color: black; font-size: 16px;">Jenis Mobil: <span id="jenisMobil">${item.jenis_mobil}</span></p>
                            <p style="color: black; font-size: 16px;">No Rangka: <span id="noRangka">${item.no_rangka}</span></p>
                        </div>
                    </div>
                    <div style="color: black; display: flex; justify-content: space-between; font-size: 16px;">
                        <p style="color: black;">Jenis Layanan:  <span id="jenisLayanan"></span></p>
                        <p style="color: black;">Harga Layanan: <span id="harga"></span></p>
                    </div>
                    ${item.layanan.map((jenis, i) => `
                    <div style="color: black; display: flex; justify-content: space-between; font-size: 16px;">
                        <p style="color: black;"> <span>${jenis}</span></p>
                        <p style="color: black;"> <span>${item.layananHarga[i]}</span></p>
                    </div>
                    `).join('')}
                    <div style="color: black; display: flex; justify-content: space-between; font-size: 16px;">
                        <p style="color: black;">Jenis Sparepart: <span id="jenisLayanan"></span></p>
                        <p style="color: black;">Harga Sparepart: <span id="harga"></span></p>
                    </div>
                    ${item.sparepart.map((sparepart, i) => `
                    <div style="color: black; display: flex; justify-content: space-between; font-size: 16px;">
                        <p style="color: black;"><span id="jenisLayanan">${sparepart}</span></p>
                        <p style="color: black;"><span id="harga">${item.sparepartHarga[i]}</span></p>
                    </div>
                    `).join('')}

                    <hr style="border-top: 1px solid black; margin: 10px 0;">
                    
                    <hr style="border-top: 1px solid black; margin: 10px 0;">
            `).join('');

            container.innerHTML = templateHTML;
            console.log(container);

        
            });

            modal.style.display = "block";
        });
    }

    span.addEventListener("click", function() {
        modal.style.display = "none";
    });

    window.addEventListener("click", function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    });

    
</script>
    <script>
        $(function() {

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('data.wo') }}",
                columns: [{
                        data: 'no_wo',
                        name: 'no_wo'
                    },
                    {
                        data: 'pelanggan',
                        name: 'pelanggan'
                    },
                    {
                        data: 'no_polisi',
                        name: 'no_polisi',
                        // orderable: false,
                        // searchable: false
                    },
                    {
                        data: 'jenis_mobil',
                        name: 'jenis_mobil'
                    },
                    {
                        data: 'tanggal_mulai',
                        name: 'tanggal_mulai'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'no_polisi',
                        name: 'no_polisi'
                    },
                ]
            });

        });
    </script> -->
@endsection
