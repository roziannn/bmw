<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Foreman Control Panel</title>
    <style>

.modalbody {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.4);
    z-index: 9999; /* Menempatkan modal di atas konten lain */
}

.modal-content {
    background-color: rgb(255, 255, 255);
    border-radius: 5px;
    max-width: 400px;
    margin: 0 auto; /* Mengatur margin horizontal untuk mengubah posisi modal menjadi tengah */
    margin-top: 10%; /* Mengatur jarak vertikal dari atas */
    padding: 20px;
    position: relative;
    max-height: 80%; /* Set maximum height for content area */
    overflow-y: auto; /* Add scroll when content exceeds max-height */
}

.modal-content1 {
    background-color: rgb(255, 255, 255);
    border-radius: 5px;
    max-width: 400px;
    margin: 0 auto; /* Mengatur margin horizontal untuk mengubah posisi modal menjadi tengah */
    margin-top: 10%; /* Mengatur jarak vertikal dari atas */
    padding: 20px;
    position: relative;
    max-height: 80%; /* Set maximum height for content area */
    overflow-y: auto; /* Add scroll when content exceeds max-height */
}
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
    #closeModal {
    position: absolute;
    top: 10px;
    right: 10px;
    background: transparent;
    border: none;
    cursor: pointer;
    color: rgb(0, 0, 0); /* Mengubah warna ikon menjadi putih */
    font-size: 20px;
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

        #overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.6); /* Warna latar belakang transparan */
    display: none;
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

        .detail-button {
    background-color: rgb(29, 162, 240);
    color: white;
    padding: 5px 10px; /* Sesuaikan padding sesuai kebutuhan */
    border: none;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s;
    border-radius: 30px;
    font-size: 12px;
  }

  .fontteknisi {
    font-weight: bold;
    color: white;
  }

  .detail-button:hover {
    background-color: rgb(28, 126, 172);
    color: white;
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
.maintenance-label {
    color: rgb(0, 0, 0); 
    font-size: 16px; 
    
}

#noWO {
    font-weight: bold; /* Membuat teks menjadi tebal */
    color: rgb(0, 0, 0); /* Mengubah warna teks menjadi putih */
  }


  #maintenanceText {
    color: rgb(0, 0, 0);
    font-weight: bold;
  }

  #noRangka,
  .mb-1 label {
    font-weight: bold;
    color: rgb(0, 0, 0);
  }


  #modalNoPS1,
  .mb-1 label {
    font-weight: bold;
    color: rgb(0, 0, 0);
  }

  #modalEsW1,
  .mb-1 label {
    font-weight: bold;
    color: rgb(0, 0, 0);
  }
  #modalNoPol,
  .mb-1 label {
    font-weight: bold;
    color: rgb(0, 0, 0);
  }

.off {
    background-color: red; /* Merah untuk status off */
}

.on {
    background-color: green; /* Hijau untuk status on */
}

    </style>
</head>
<body>
    <header>
        <button class="logout-button">Logout</button>
    </header>
  

    <div class="sidebar">
        <div class="mb-1">
            <select class="form-select" id="listWo3" name="listWo3">
                <option value="" disabled selected>Pilih Nomor WO</option>
                @foreach ($dataWO as $wo)
                    <option value="{{ $wo->no_wo }}">{{ $wo->no_wo }}</option>
                @endforeach
            </select>
        </div>

        
    </div>

    <div class="container">
        <h1>Foreman Control Panel</h1>
        <h2>List Working Order</h2>
    
        <div class="row">
            <div class="col">
                <div id="ordersToProcess" class="order-list">
                    <h3>Orders to be Processed :</h3>
                    <ul id="orderList"></ul>
                </div>
            </div>
            <div class="col">
                <div id="onProgressList" class="order-list">
                    <h3>On Progress:</h3>
                    <ul></ul>
                </div>
            </div>
        </div>
    </div>

        <!-- Informasi dari database dapat diambil dan dimasukkan ke dalam ul li seperti contoh di bawah -->
        <script>
            // Contoh data dari database
            const ordersToProcessData = [
                @foreach ($dataWO as $wo)
                    "{{ $wo->no_wo }}",
                @endforeach
            ];

            // Memasukkan data dari database ke dalam Orders to be Processed
            const ordersToProcessContainer = document.getElementById("orderList");
            ordersToProcessData.forEach(order => {
                const li = document.createElement("li");
                li.innerText = order;
                ordersToProcessContainer.appendChild(li);
            });

            // Contoh data on progress dari database
            const onProgressData = [
                @foreach ($dataWOOnProgress as $wo)
                    "{{ $wo->no_wo }}",
                @endforeach
            ];

            // Memasukkan data dari database ke dalam On Progress
            const onProgressContainer = document.getElementById("onProgressList");
            onProgressData.forEach(order => {
                const li = document.createElement("li");
                li.innerText = order;
                onProgressContainer.appendChild(li);
            });
        </script>
</body>
</html>
    <div class="container"style="padding-right: 6px;">
     <!-- Modal Detail Teknisi -->
   
     <div class="modal" id="modalDetail">
        <div class="modal-content">
              <form method="POST" id="pengerjaanForm" action="/pengerjaan/000001">
    @csrf
            <h2 style="color: rgb(0, 0, 0); font-weight: bold;" id="namaTeknisi"></h2>
            <p style="color: rgb(0, 0, 0); font-weight: bold;  text-align: center;">--Sedang Mengerjakan--</p>
            <p id="teknisiId"></p>
            <p id="noWO"></p>
            <input type="hidden" name="noWO" id="dataToSubmit" value="">
            <p id="noRangka"></p>
            <p id="modalNoPol"></p>
            <p id="modalNoPS1">Pergantian Sparepart :</p>
            <p id="modalEsW1">Estimasi Waktu :</p>
            <div style="margin-top: 10px">  
            <label for="listTechnicians" class="form-label" style="color: rgb(0, 0, 0); font-weight: bold;" >Sparepart Pengerjaan:  </label>
                    <div id="maintenanceForm">
                </div>
                <button type="submit" style="font-weight: bold; border-radius: 10px; " class="btn btn-primary">Kerjakan</button>

        </div>
        </form>

            <button id="closeModal">
                <i class="fas fa-times"></i>
              </button>
              
        </div>
    </div>
        <div col-auto class="mechanic">
            <div class="mechanic-info">
                <img src="https://static.vecteezy.com/system/resources/thumbnails/016/007/776/small_2x/mechanic-creative-icon-design-free-vector.jpg" alt="Mekanik 2" width="100" height="100">
                <h2 class="teknisi">{{ $teknisi->isEmpty() ? 'Tidak ada teknisi' : $teknisi->get(0)->nama_teknisi }}</h2>
                <p>Status: <span class="status-icon {{ $teknisi->get(0)->status == 'On Working' ? 'off' : 'on' }}"></span> <br>{{$teknisi->get(0)->status}}</p>
                @if (!$teknisi->isEmpty() && $teknisi->get(0)->status == 'On Working')
                <button class="detail-button" data-teknisi-id="{{ $teknisi->get(0)->id_teknisi }}">See Detail</button>
                <button id="serviceButton" style="border-radius: 10px; font-size: 10px; background-color: green;margin-top: 20px;" class="btn btn-primary" onclick="performService('{{ $teknisi->get(0)->id_teknisi }}')">Service Done.</button>
                <div id="serviceButton" style="display: none; background-color: #dff0d8; border: 1px solid #d0e9c6; padding: 10px; border-radius: 5px; margin-top: 10px;"></div>
                
                @endif      
                

                <!-- Pindahkan area drop ke sini -->
            </div>
            
            <div class="mechanic-info" onClick()>
                <img src="https://static.vecteezy.com/system/resources/thumbnails/016/007/776/small_2x/mechanic-creative-icon-design-free-vector.jpg" alt="Mekanik 2" width="100" height="100">
                <h2 class="teknisi">{{ $teknisi->isEmpty() ? 'Tidak ada teknisi' : $teknisi->get(1)->nama_teknisi }}</h2>
                <p>Status: <span class="status-icon {{ $teknisi->get(1)->status == 'On Working' ? 'off' : 'on' }}"></span> <br>{{$teknisi->get(1)->status}}</p>
                @if (!$teknisi->isEmpty() && $teknisi->get(1)->status == 'On Working')
                    <button class="detail-button" data-teknisi-id="{{ $teknisi->get(1)->id_teknisi }}">See Detail</button>
                    <button id="serviceButton" style="border-radius: 10px; font-size: 10px; background-color: green;margin-top: 20px;" class="btn btn-primary" onclick="performService('{{ $teknisi->get(1)->id_teknisi }}')">Service Done.</button>

                @endif
                <!-- Modal Detail WO dan Pilih Teknisi-->
                <form method="POST" id="kerjakanForm" action="">
                    @csrf
                    <div class="modal fade" id="taskModal" tabindex="-1" aria-labelledby="taskModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="taskModalLabel">Detail Task</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="modal-body">
                                        <p id="modalNoWo">No Wo : </p>
                                        <p id="modalNoRangka">No Rangka :</p>
                                        <p id="modalJenisKendaraan">Jenis Kendaraan:</p>
                                        <p id="modalJL">Jenis Layanan :</p>
                                        <p id="modalNoPS">Pergantian Sparepart :</p>
                                        <p id="modalEsW">Estimasi Waktu :</p>
                                        <div class="mb-1">
                                            <label for="listTechnicians" class="form-label" style="color: black; font-weight: bold;">Pilih Teknisi:</label>
                                            <div class="d-flex">
                                                @foreach($teknisiAvailable as $teknisiList)
                                                <div class="mr-3">
                                                    <input type="radio" id="technicianInput{{ $teknisiList->id_teknisi }}" name="technician" value="{{ $teknisiList->id_teknisi }}">
                                                    <label for="technicianInput{{ $teknisiList->id_teknisi }}">{{ $teknisiList->nama_teknisi }}</label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    
                                        <div class="mb-1">
                                            <!-- <label for="listTechnicians" class="form-label" style="color: black; font-weight: bold;" >Pilih Sparepart:</label> -->
                                            <form >
                                                <div id="maintenanceForm">

                                                </div>
                                            </form>
                                            <!-- <input type="hidden" name="selectedSparepart" id="selectedSparepart"> -->
                                        </div>
                                    </div>  
                                
                                    
                                    <!-- Isi konten modal di sini -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    
                                        <button type="submit" class="btn btn-primary">Kerjakan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                
            </div>
            <div class="mechanic-info">
                <img src="https://static.vecteezy.com/system/resources/thumbnails/016/007/776/small_2x/mechanic-creative-icon-design-free-vector.jpg" alt="Mekanik 2" width="100" height="100">
                <h2 class="teknisi">{{ $teknisi->isEmpty() ? 'Tidak ada teknisi' : $teknisi->get(2)->nama_teknisi }}</h2>
                <p>Status: <span class="status-icon {{ $teknisi->get(2)->status == 'On Working' ? 'off' : 'on' }}"></span> <br>{{$teknisi->get(2)->status}}</p>
                @if (!$teknisi->isEmpty() && $teknisi->get(2)->status == 'On Working')
                    <button class="detail-button" data-teknisi-id="{{ $teknisi->get(2)->id_teknisi }}">See Detail</button>
                    <button id="serviceButton" style="border-radius: 10px; font-size: 10px; background-color: green;margin-top: 20px;" class="btn btn-primary" onclick="performService('{{ $teknisi->get(2)->id_teknisi }}')">Service Done.</button>

                @endif
                
                <!-- Pindahkan area drop ke sini -->
            </div>
            <div class="mechanic-info">
                <img src="https://static.vecteezy.com/system/resources/thumbnails/016/007/776/small_2x/mechanic-creative-icon-design-free-vector.jpg" alt="Mekanik 2" width="100" height="100">
                <h2 class="teknisi">{{ $teknisi->isEmpty() ? 'Tidak ada teknisi' : $teknisi->get(3)->nama_teknisi }}</h2>
                <p>Status: <span class="status-icon {{ $teknisi->get(3)->status == 'On Working' ? 'off' : 'on' }}"></span> <br>{{$teknisi->get(3)->status}}</p>
                @if (!$teknisi->isEmpty() && $teknisi->get(3)->status == 'On Working')
                    <button class="detail-button" data-teknisi-id="{{ $teknisi->get(3)->id_teknisi }}">See Detail</button>
                    <button id="serviceButton" style="border-radius: 10px; font-size: 10px; background-color: green;margin-top: 20px;" class="btn btn-primary" onclick="performService('{{ $teknisi->get(3)->id_teknisi }}')">Service Done.</button>

                @endif
                
            </div>
            <div class="mechanic-info">
                <img src="https://static.vecteezy.com/system/resources/thumbnails/016/007/776/small_2x/mechanic-creative-icon-design-free-vector.jpg" alt="Mekanik 2" width="100" height="100">
                <h2 class="teknisi">{{ $teknisi->isEmpty() ? 'Tidak ada teknisi' : $teknisi->get(4)->nama_teknisi }}</h2>
                <p>Status: <span class="status-icon {{ $teknisi->get(4)->status == 'On Working' ? 'off' : 'on' }}"></span> <br>{{$teknisi->get(4)->status}}</p>
                @if (!$teknisi->isEmpty() && $teknisi->get(4)->status == 'On Working')
                    <button class="detail-button" data-teknisi-id="{{ $teknisi->get(4)->id_teknisi }}">See Detail</button>
                    <button id="serviceButton" style="border-radius: 10px; font-size: 10px; background-color: green;margin-top: 20px;" class="btn btn-primary" onclick="performService('{{ $teknisi->get(4)->id_teknisi }}')">Service Done.</button>

                @endif
                
                <!-- Pindahkan area drop ke sini -->
            </div>
        </div>
          <!-- Modal Popup -->
          <div class="modal fade" id="taskModal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="taskModalLabel">Detail Task</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary">Kerjakan</button>
                    </div>
                </div>
            </div>
        </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>









    <script>
        document.getElementById("myForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent form submission

            const choice = document.querySelector('input[name="choice"]:checked');
            if (choice) {
                if (choice.value === "yes") {
                    document.getElementById("submitButton").classList.add("hidden");
                }
                console.log("Selected: " + choice.value);
            }
        });
    </script>







    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const dropdowns = document.querySelectorAll(".form-select"); // Mengambil semua dropdown
            const kerjakanForm = document.getElementById('kerjakanForm');

            const modalNoWoElement = document.getElementById("modalNoWo");
            kerjakanForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Menghentikan pengiriman formulir sementara
            
            const selectedTechnician = document.querySelector('input[name="technician"]:checked');
            
            if (selectedTechnician) {
                const selectedTechnicianId = selectedTechnician.value;
                
                // Buat elemen input tersembunyi untuk mengirim teknisi_id
                const hiddenInput = document.createElement("input");
                hiddenInput.setAttribute("type", "hidden");
                hiddenInput.setAttribute("name", "technician_id");
                hiddenInput.setAttribute("value", selectedTechnicianId);
                
                // Sisipkan input tersembunyi ke dalam formulir
                kerjakanForm.appendChild(hiddenInput);
                
                // Lanjutkan dengan mengubah action dan mengirimkan formulir
                const noWoText = document.getElementById('modalNoWo').textContent;
                const colonIndex = noWoText.indexOf(':');
                const noWo = colonIndex !== -1 ? noWoText.substring(colonIndex + 2) : noWoText;
                const cleanNoWo = noWo.replace(/\D/g, '');
                kerjakanForm.action = `/kerjakan/${cleanNoWo}`;
                kerjakanForm.submit();
            } else {
                alert('Pilih salah satu teknisi terlebih dahulu.');
            }
        });

        const selectWo = document.getElementById('listWo3');

       

            const modalNoRangkaElement = document.getElementById("modalNoRangka");
            const modalJenisKendaraanElement = document.getElementById("modalJenisKendaraan");
            const modalJLElement = document.getElementById("modalJL");
            const modalNoPSElement = document.getElementById("modalNoPS");
            const modalEsWElement = document.getElementById("modalEsW");
    
            dropdowns.forEach(dropdown => {
                dropdown.addEventListener("change", function() {
                    const selectedValue = dropdown.value;
                    // Simpan data ini pada elemen modal
                    modalNoWoElement.textContent = "No Wo : " + selectedValue;
                    fetch(`/detail/task/${selectedValue}`)
                        .then(response => response.json())
                        .then(data => {
                            modalNoWoElement.textContent = `No Wo : ${data.NoWO}`;
                            modalNoRangkaElement.textContent = `No Rangka : ${data.NoRangka}`;
                            modalJenisKendaraanElement.textContent = `Jenis Kendaraan : ${data.JenisKendaraan}`;
                            modalJLElement.textContent = `Jenis Layanan : ${data.JenisLayanan}`;
                            const spareparts = data.SparePart.join(', ');
                            modalNoPSElement.textContent = `Pergantian Sparepart : ${spareparts}`;
                            modalEsWElement.textContent = `Estimasi Waktu : ${data.EstimasiWaktu} menit`;
                            
                            const maintenanceForm = document.getElementById('maintenanceForm');
                            const submitButton = document.getElementById('submitButton');

                            maintenanceForm.innerHTML = '';
                            data.SparePart.forEach(sparepart => {
                            const label = document.createElement('label');
                            const input = document.createElement('input');
                            input.type = 'radio';
                            input.name = 'maintenance';
                            input.className = 'maintenance-option';
                            input.value = sparepart;
                            
                            label.appendChild(input);
                            label.appendChild(document.createTextNode(` ${sparepart}`));
                            
                            maintenanceForm.appendChild(label);
                            label.classList.add("white-text"); 
                            maintenanceForm.appendChild(document.createElement('br'));
                        });
                        const radioButtons = maintenanceForm.querySelectorAll('.maintenance-option');

                        radioButtons.forEach(radioButton => {
                            radioButton.addEventListener('change', function() {
                                const selectedValue = this.value;
                                console.log(`Anda memilih: ${selectedValue}`);
                                // const selectedSparepartElement = document.getElementById('selectedSparepart');
                                // selectedSparepartElement.textContent = `${selectedValue}`;                          
                              });
                        });
                        
                            $('#taskModal').modal('show');
                        })
                        .catch(error => console.error('Terjadi kesalahan:', error));
    
                    // Lakukan pemanggilan API JSON atau data lainnya untuk mendapatkan detail task
                    // Kemudian isi elemen modal sesuai dengan data yang didapatkan
                    
                    // Tampilkan modal
                    $('#taskModal').modal('show');
                });
            });
        });
    </script>
    <script>

document.addEventListener("DOMContentLoaded", function() {
    // ... (Kode lainnya seperti sebelumnya)

    const kerjakanButton = document.getElementById("kerjakanButton");
    kerjakanButton.addEventListener("click", function() {
        const selectedTechnicians = document.querySelectorAll("input[name='technician']:checked");
        const selectedTechnicianIds = Array.from(selectedTechnicians).map(checkbox => checkbox.value);

        // ... (Kode sebelumnya)

        // Tutup modal
        $('#taskModal').modal('hide');
    });
});
</script>
<script>
    $(function() {
        console.log("Autocomplete script executed");
        $("#technicianInput").autocomplete({
            source: function(request, response) {
                console.log("Autocomplete script executed");

                $.ajax({
                    url: "/teknisi/available", // Ganti dengan URL API endpoint Anda
                    dataType: "json",
                    data: {
                        term: request.term
                    },
                    success: function(data) {
                        var namaTeknisi = data.map(function(teknisi) {
                            return teknisi.Nama;
                        });
                        response(namaTeknisi);
                    }
                });
            },
            minLength: 2 // Jumlah karakter minimal sebelum mulai pencarian
        });
    });
</script>

<script>
    function performService(teknisiId) {
        // Panggil fungsi update melalui Ajax atau metode lain
        // Contoh: fetch('url', { method: 'POST', body: teknisiId });

        // Tampilkan notifikasi di elemen "notification"
        var notificationElement = document.getElementById('serviceButton');
        notificationElement.innerHTML = 'Service selesai dapat melanjutkan pembayaran.';
        notificationElement.style.display = 'block';
        alert('Service selesai. Silakan melanjutkan pembayaran.');

        var button = document.getElementById('serviceButton');
        button.style.backgroundColor = 'darkgreen'; // Ubah warna latar belakang
        button.style.color = 'white'; // Ubah warna teks
        button.disabled = true; // Nonaktifkan tombol
        button.innerHTML = "Service Completed"; // Ubah teks tombol
        

    }
    
</script>



<script> //script buat detail teknisi mengerjakan apa
 const detailButtons = document.querySelectorAll('.detail-button');
 
        const modal = document.getElementById('modalDetail');
        const closeModalButton = document.getElementById('closeModal');

        detailButtons.forEach(button => {
            button.addEventListener('click', function() {
                const teknisiId = this.getAttribute('data-teknisi-id');
                openModalWithTeknisiId(teknisiId);
            });
        });

        closeModalButton.addEventListener('click', function() {
            closeModal();
        });

        function openModalWithTeknisiId(teknisiId) {
            console.log('Teknisi ID yang dipilih:', teknisiId);
            const teknisiIdElement = document.getElementById('teknisiId');
            const modalNoPS1Element = document.getElementById("modalNoPS1");
            const modalEsW1Element = document.getElementById("modalEsW1");
            const modalNoPolElement = document.getElementById("modalNoPol");
            teknisiIdElement.textContent = ""
            // teknisiIdElement.textContent = "Teknisi ID :" + teknisiId;// Menyimpan id_teknisi di elemen tersembunyi
        fetch(`/teknisi/mengerjakan/${teknisiId}`)
        .then(response => response.json())
        .then(data => {
            // Isi elemen-elemen di dalam modal dengan data dari respons JSON
            const noWOElement = document.getElementById('noWO');
            const noRangkaElement = document.getElementById('noRangka');
            const namaTeknisi = document.getElementById('namaTeknisi');

            noWOElement.textContent = "No WO: " + data.NoWO;
            noRangkaElement.textContent = "No Rangka: " + data.NoRangka;
            noRangkaElement.textContent = "No Rangka: " + data.NoRangka;
            namaTeknisi.textContent = "Nama Teknisi: " + data.NamaTeknisi;
            modalNoPolElement.textContent = "No Polisi: " + data.NomorPolisi;

            const spareparts = data.SparePart.join(', ');
            modalNoPS1Element.textContent = `Pergantian Sparepart : ${spareparts}`;
            modalEsW1Element.textContent = `Estimasi Waktu : ${data.EstimasiWaktu} menit`;

            console.log(spareparts);
            const maintenanceForm = document.getElementById('maintenanceForm');
            maintenanceForm.innerHTML = '';
            data.JenisLayanan.forEach(sparepart => {
            const label = document.createElement('label');
            const input = document.createElement('input');
            input.type = 'radio';
            input.name = 'maintenance';
            input.className = 'maintenance-option';
            input.value = sparepart;
                            
            label.appendChild(input);
            label.appendChild(document.createTextNode(` ${sparepart}`));
                            
            label.className = 'maintenance-label';

            maintenanceForm.appendChild(label);
            maintenanceForm.appendChild(document.createElement('br'));
            });
                        const radioButtons = maintenanceForm.querySelectorAll('.maintenance-option');

                        radioButtons.forEach(radioButton => {
                            radioButton.addEventListener('change', function() {
                                const selectedValue = this.value;
                                console.log(`Anda memilih: ${selectedValue}`);
                                // const selectedSparepartElement = document.getElementById('selectedSparepart');
                                // selectedSparepartElement.textContent = `${selectedValue}`;                          
                              });
                        });


                  






            // Tampilkan modal
            modal.style.display = 'block';
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });


        
            modal.style.display = 'block'; // Tampilkan modal
        }

        function closeModal() {
            var closeModalButton = document.getElementById("closeModal");
  closeModalButton.addEventListener("click", function() {
    modal.style.display = 'none';
  });
            // Tutup modal
            
        }


</script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    $("#technicianInput").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "/teknisi/available", // Ganti dengan URL API endpoint Anda
                dataType: "json",
                success: function(data) {
                    response(data);
                }
            });
        },
        minLength: 0 // Mengubah minLength menjadi 0 agar tampilan semua hasil saat mengetik
    });
});
</script>

<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        var form = document.getElementById('pengerjaanForm');
        form.addEventListener('submit', function (event) {
            event.preventDefault(); // Mencegah formulir dikirimkan secara langsung
            console.log("error")
        var selectedMaintenance = document.querySelector('input[name="maintenance"]:checked');
        console.log(selectedMaintenance)
        var noWO = document.getElementById("noWO").textContent;
        document.getElementById("dataToSubmit").value = noWO;

        if (!selectedMaintenance) {
            event.preventDefault(); // Mencegah pengiriman jika tidak ada opsi yang dipilih
            console.log('Pilih opsi sparepart terlebih dahulu.');
        } else {
            console.log('Form dikirim dengan opsi: ' + selectedMaintenance.value);
            form.submit(); // Uncomment ini untuk mengirim formulir secara otomatis setelah validasi
        }
        });
    });
</script>

<script>
    // Fungsi yang akan dijalankan saat tombol diklik dengan parameter
    function performService(param1) {
        // Jalankan API di sini dengan menggunakan parameter yang diberikan
        // Misalnya, menggunakan metode fetch untuk melakukan GET request ke suatu URL dengan parameter
        fetch(`/updatePembayaran/${param1}`, {
            method: 'GET'
            // Tambahkan konfigurasi lain yang diperlukan untuk API Anda
        })
        .then(response => response.json())
        .then(data => {
            console.log('API Response:', data);
            // Lakukan sesuatu dengan data response API
        })
        .catch(error => {
            console.error('API Error:', error);
            // Lakukan sesuatu jika terjadi error pada API
        });
    }
</script>

</body>
</html>