<html lang="en">
    <style>
        .break-text {
        word-wrap: break-word;
        white-space: pre-line;
    }
        </style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


</head>

<body>

<p style="


font-family: serif;  font-family: serif;
font-weight: bold;
font-style: italic;
font-size: 24px;
text-align: center;
text-decoration: underline;">Daily Report BMW TEBET <br> {{$date}}.</p>
<div id="container">

</div>
                    <hr style="border-top: 1px solid black; margin: 10px 0;">
                    
                    <hr style="border-top: 1px solid black; margin: 10px 0;">

                    <table border="1" cellpadding="4" cellspacing="0" style="border-collapse: collapse;table-layout: auto;">
                <thead>
                    <tr>
                        <th>No WO</th>
                        <th>Tanggal Pembayaran</th>
                        <th>No Plat</th>
                        <th>Nama Customer</th>
                        <th>Jenis Mobil</th>
                        <th>Alamat</th>
                        <th>No Rangka</th>
                        <th>Jenis Layanan</th>
                        <th>Harga Layanan</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td>{{ $item['no_wo'] }}</td>
                        <td>{{ $item['payment_date'] }}</td>
                        <td>{{ $item['no_polisi'] }}</td>
                        <td class="break-text" style= "100px;min-width: 30px">{{ $item['customer_name'] }}</td>
                        <td>{{ $item['jenis_mobil'] }}</td>
                        <td>{{ $item['alamat'] }}</td>
                        <td>{{ $item['no_rangka'] }}</td>
                        <td style="min-width: 135px;">
                            @foreach($item['layanan'] as $layanan)
                                - {{ $layanan }}<br>
                            @endforeach
                        </td>
                        <td style="min-width: 100px;">
                            @foreach($item['layananHarga'] as $harga)
                                {{ $harga }}<br>
                            @endforeach
                        </td>
                        
                        {{-- <td style="color: black;min-width: 100px;">
                            @foreach($item['sparepart'] as $sparepart)
                                -{{ $sparepart }}<br>
                            @endforeach
                        </td> --}}
                        {{-- <td style="color: black;min-width: 100px;">
                            @foreach($item['sparepartHarga'] as $sparepartHarga)
                                {{ $sparepartHarga }}<br>
                            @endforeach
                        </td> --}}
                        <td>{{$item['totalHarga']}}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                        <tr>
                            <td colspan="9" style="text-align: center;"><strong>Total Pemasukan per Tanggal : {{$date}}</strong></td>
                            <td colspan="2">{{$hargaPerhari}}</td>
                        </tr>
                </tfoot>
            </table>
           

            <hr style="border-top: 1px solid black; margin: 10px 0;">
                    
                    <hr style="border-top: 1px solid black; margin: 10px 0;">
                </body>





