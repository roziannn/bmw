

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Kasir Control Panel</title>
    <style>

    .sidebar {
        text-align: center;
        width: 250px;
        padding: 1rem;
        background-color: #0046A8;
        color: white;
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .sidebar h2 {
        margin-bottom: 1rem;
    }

    /* Tambahkan CSS tambahan untuk opsi dropdown di sidebar jika diperlukan */
    .sidebar select {
        width: 100%;
        padding: 0.5rem;
        margin-bottom: 0.5rem;
    }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .order-list {
            border: 2px black;
            border-radius: 20px;
            padding: 20px;
            background-color: #f4f4f4;
        }
        header {
            background-color: black;
            color: white;
            text-align: center;
            padding: 3rem;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
            background-color: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #35424a;
            text-decoration: underline;
            margin-top: 10px;
        }
        .working-order-item {
    display: flex;
    align-items: center;
    margin-bottom: 0.5rem;
}

.working-order-info {
    margin-left: 10px;
    display: flex;
    flex-direction: column;
}
        .mechanic {
            display: flex;
            align-items: center;
            border-bottom: 1px solid #e0e0e0;
            padding: 1rem 0;
        }
        .mechanic img {
            max-width: 80px;
            margin-right: 1rem;
        }
        .mechanic-info {
            flex: 1;
        }
        .vehicle {
            margin-top: 0.5rem;
        }
        .sidebar {
            text-align: center;
            width: 250px;
            padding: 1rem;
            background-color: #ffffff;
            color: rgb(0, 0, 0);
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .sidebar h2 {
            margin-bottom: 1rem;
        }
        .working-order {
            margin-top: 1rem;
        }
        .working-order-item {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
        }
        .drop-area {
            border: 2px dashed black;
            width: 150px;
            height: 80px;
            margin: 10px 0;
            text-align: center;
            background-color: #f4f4f4;
            cursor: pointer;
}

body {
        background-color: #f8f9fa;
        margin: 0;
    }

    .sidebar {
        width: 250px;
        background-color: #f8f9fa;
        padding: 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .sidebar h4 {
        margin-bottom: 10px;
    }

    .sidebar ul {
        list-style: none;
        padding: 0;
    }

    .sidebar li {
        cursor: pointer;
        margin-bottom: 5px;
        padding: 5px 10px;
        background-color: #fff;
        border-radius: 5px;
        transition: background-color 0.2s;
    }

    .sidebar li:hover {
        background-color: #f1f1f1;
    }

    .fixed-top {
        position: fixed;
        top: 0;
        right: 0;
        left: 0;
        z-index: 1030;
        background-color: #fff;
        padding: 10px 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: flex-end;
    }

    .btn-logout {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: #fffff;
            color: black;
            border: none;
            cursor: pointer;
            font-size: 14px;
            border-radius: 20px;
        z-index: -1;
        
    }

    .container {
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        margin-top: 50px;
    }

    .btn-print {
        margin-top: 10px;
    }
        .working-order-item .status {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            margin-right: 0.5rem;
        }
        .status-green {
            background-color: green;
        }
        .status-gray {
            background-color: gray;
        }
        .logout-button {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: #fffff;
            color: black;
            border: none;
            cursor: pointer;
            font-size: 14px;
            border-radius: 5px;
            z-index: 3;
        }
        h1 {
            font-family: 'Montserrat', sans-serif;
            font-size: 24px;
            text-align: center;
            margin-top: 20px;
            font-weight: bold;
            color: #000000;
        }
        h2 {
            font-family: 'Montserrat', sans-serif;
            font-size: 20px;
            margin-top: 20px;
            color: #000000;
        }
        .teknisi {
            font-family: 'Montserrat', sans-serif;
            font-size: 15px;
            margin-top: 20px;
            color: #000000;
            font-weight: bold;
        }
        h3 {
            font-family: 'Montserrat', sans-serif;
            font-size: 16px;
            color: #000000;
        }
        .status-icon {
    display: inline-block;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    margin-right: 5px;
}
/* Gaya untuk elemen 'wo-cell' yang terlihat seperti tautan */
.wo-cell {
  cursor: pointer;
  text-decoration: underline;
  color: blue;
}


.off {
    background-color: red; /* Merah untuk status off */
}

.on {
    background-color: green; /* Hijau untuk status on */
}

/* Gaya dasar untuk invoice */
.invoice {
    border: 1px solid #000;
    padding: 20px;
    width: 300px;
    margin: 0 auto;
}

/* Gaya khusus untuk tombol cetak */
#printButton {
    position: fixed;
            top: 6%;
            left: 85%;
            transform: translate(-50%, -50%);
            z-index: 0;
            border-radius: 10px;
            background-color: #4da9d7;
    color: white;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
        }
        #submitButton {
    position: fixed;
            top: 5%;
            border-radius: 10px;
            left: 60%;
            transform: translate(-50%, -50%);
            z-index: 0;
            background-color: #4da9d7;
    color: white;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
        }


.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.4);
}

.horizontal-line {
    border-bottom: 2px solid #000; /* Ubah nilai lebar garis menjadi 2px */
    margin: 20px 0;
}

.modal-content {
  background-color: white;
  margin: 15% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 50%;
}

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
</head>
<body>
    <header>
        <button class="logout-button">Logout</button>
    </header>
                
                
    <div id="woModal" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <h1><strong>INVOICE PAYMENT BMW TEBET <strong> </h1>
          <p><strong>WO Number:</strong> <span id="modal-kebutuhan"></span></p>
          <p><strong>Police Number:</strong> <span id="modal-invoice"></span></p>
          <p><strong>Phone Number:</strong> <span id="modal-phone"></span></p>
          <p><strong>Address:</strong> <span id="modal-address"></span></p>
            <hr class="horizontal-line">
            <p><strong>Jasa Layanan:</strong> <span id="modal-service"></span></p>
            {{-- <p><strong>Additional Sparepart:</strong> <span id="modal-sparepart"></span></p> --}}
          <p><strong>Total Price:</strong> <span id="modal-price"></span></p>
          <button id="printButton">Print Invoice</button>
          <div class="invoice-container" id="invoiceContainer">
            <!-- Isi invoice akan ditampilkan di sini -->
        </div>
        <script src="script.js"></script>
        </div>
      </div>
      <!-- Modal -->
<div id="myModal" class="modal">
    <div class="modal-content">
      <p>WO Number :</p>
      <input type="text" id="woNumberInput">
      <button id="modalSubmitButton">Submit</button>
    </div>
  </div>
   
    <div class="container">
        <h1><i class="bx bx-user-circle"></i> Kasir Service Center</h1>
        <h2>Transaction History :</h2>
        <p style="font-size: 14px;">Click on List table to see details invoice!</p>
        <div class="table-responsive p-1">
            <table id="table1" class="table table-bordered m-3 data-table">
                <thead>
                    <th>NO WO</th>
                    <th>NO Polisi</th>
                    <th>Status</th>
                    <th>Proccess Payment</th>
                </thead>
                <tbody>
                    @foreach($dataWO as $wo)
                    <tr  style="cursor: pointer"> 
                        <td onclick="openModal('{{ $wo->no_wo }}')">{{ $wo->no_wo }}</td>
                        <td onclick="openModal('{{ $wo->no_wo }}')">{{ $wo->no_polisi }}</td>
                        <td onclick="openModal('{{ $wo->no_wo }}')">{{ $wo->status }}</td>
                        <td>
                            <button class="btn btn-primary" onclick="submitWO('{{ $wo->no_wo }}')">Submit</button>
                        </td>
                    </tr>
                    
                    <!-- Modal -->
                    <div id="myModal" class="modal">
                        <div class="modal-content">
                            <span class="close" onclick="closeModal()">&times;</span>
                            <!-- Place your modal content here -->
                            <h2>Modal Header</h2>
                            <p>Modal content goes here.</p>
                            <!-- Add the Submit button inside the modal -->
                            <button class="btn btn-primary" onclick="submitModal()">Submit</button>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
            </div>
            <script>
              $(function() {
        var table1 = $('#table1').DataTable({
            // Configuration options
            columns: [
                { data: 'no_wo', name: 'no_wo' },
                // ... Other columns ...
            ]
        });

        function populateTable(table, route) {
            table.clear().draw();
            $.getJSON(route, function(data) {
                table.rows.add(data).draw();
            });
        }

        populateTable(table1, "{{ route('data.wo') }}");
    });
            </script>
            <script>
                // Ambil elemen-elemen yang diperlukan
                const modalSubmitButton = document.getElementById("modalSubmitButton");
                const woNumberInput = document.getElementById("woNumberInput");
                const submitButton = document.getElementById("submitButton");
            
                // Tambahkan event listener pada tombol "Submit" di dalam modal
                modalSubmitButton.addEventListener("click", function() {
                    // Ambil nilai dari input WO Number
                    const woNumberValue = woNumberInput.value;
                    
                    // Masukkan nilai WO Number ke dalam tombol "Submit"
                    submitButton.dataset.woNumber = woNumberValue;
            
                    // Tutup modal setelah tombol "Submit" di dalam modal ditekan
                    modal.style.display = "none";
                });
            
                // Event listener untuk tombol "Submit" di luar modal
                submitButton.addEventListener("click", function() {
                    // Ambil nilai WO Number yang telah dimasukkan sebelumnya
                    const woNumberValue = submitButton.dataset.woNumber;
                    
                    // Lakukan sesuatu dengan nilai WO Number, misalnya mengirimnya ke server
                    console.log("WO Number submitted: " + woNumberValue);
                });
            </script>

<script>
// Ambil semua elemen dengan kelas 'wo-cell'
const woCells = document.querySelectorAll('.wo-cell');

// Ambil elemen modal dan elemen-elemen di dalamnya
const modal = document.getElementById('woModal');
const modalKebutuhan = document.getElementById('modal-kebutuhan');
const modalAddress = document.getElementById('modal-address');
const modalPhone = document.getElementById('modal-phone');
const modalInvoice = document.getElementById('modal-invoice');
const modalBiaya = document.getElementById('modal-price');
const selesaiButton = document.getElementById('selesaiButton');
const closeButton = document.querySelector('.close');


// Tambahkan event listener pada setiap 'wo-cell'
woCells.forEach((woCell) => {
  woCell.addEventListener('click', () => {
    modalKebutuhan.textContent = woCell.dataset.kebutuhan;
    modalAddress.textContent = woCell.dataset.address;
    modalPhone.textContent = woCell.dataset.phone;
    modalInvoice.textContent = woCell.dataset.invoice;
    modalBiaya.textContent = woCell.dataset.biaya;
    modal.style.display = 'block';
  });
});

// Tutup modal saat tombol 'Tutup' atau area di sekitar modal diklik
closeButton.addEventListener('click', () => {
  modal.style.display = 'none';
});

window.addEventListener('click', (event) => {
  if (event.target === modal) {
    modal.style.display = 'none';
  }
});

// Event listener untuk tombol 'Selesai Pembayaran'
selesaiButton.addEventListener('click', () => {
  // Tambahkan logika untuk tindakan setelah tombol di klik
  // Misalnya, tampilkan pesan sukses atau lakukan aksi lain
});
</script>
<script>
    document.getElementById("printButton").addEventListener("click", function() {
    // Mengganti isi dari invoiceContainer dengan isi invoice yang diinginkan
    const invoiceContent = `
    <div align="center">
		<table width="100%" border="0" cellpadding="1" cellspacing="0">
			<tr align="center">
				<th>BMW TEBET <br>
					Jl Rokan Kiri, Jakarta, 60822</th>
			</tr>
			<tr align="center"><td><hr></td></tr>
			<tr align="center">
				
			</tr>
			<tr><td><hr></td></tr>
		</table>
		<table width="100%" border="0" cellpadding="3" cellspacing="0">
			
			<tr>
				<td colspan="4"><hr></td>
			</tr>
			
		</table>
		<table width="100%" border="0" cellpadding="1" cellspacing="0">
			<tr><td><hr></td></tr>
			<tr align="center">
				<th>Terimkasih, Silahkan Datang Kembali</th>
			</tr>
			<tr align="center">
				<th>===== Layanan Konsumen ====</th>
			</tr>
			<tr align="center">
				<th>SMS/CALL 085895986529 </th>
			</tr>
		</table>
	</div>
    `;
    document.getElementById("invoiceContainer").innerHTML = invoiceContent;

    // Mengambil elemen invoiceContainer
    const container = document.getElementById("invoiceContainer");

    // Menggunakan window.print() untuk mencetak halaman
    window.print();

    // Mengembalikan isi invoiceContainer ke tampilan awal setelah pencetakan
    container.innerHTML = "";
});

</script>
<script>
    function openModal(noWo) {
        console.log("testing")
        $.get(`/invoice/${noWo}`, function(data) {
            $('#modal-kebutuhan').text(data.kebutuhan);
            $('#modal-invoice').text(data.invoice_police);
            $('#modal-phone').text(data.phone_number);
            $('#modal-address').text(data.address);
            $('#modal-price').text(data.price);
            $('#modal-service').text(data.layanan);
            $('#modal-sparepart').text(data.sparepart);
            modal.style.display = 'block';
        });
    }
</script>
<script>
    function submitWO(noWo) {
       
        $.get(`/updateDone/${noWo}`,  function(data) {
            // $('#modal-kebutuhan').text(data.kebutuhan);
            // $('#modal-invoice').text(data.invoice_police);
            // $('#modal-phone').text(data.phone_number);
            // $('#modal-address').text(data.address);
            // $('#modal-price').text(data.price);
            // $('#modal-service').text(data.layanan);
            // $('#modal-sparepart').text(data.sparepart);
            // modal.style.display = 'block';
            location.reload();

        });


    }
</script>


</body>
</html>