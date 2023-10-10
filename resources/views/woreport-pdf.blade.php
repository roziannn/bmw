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

    <p
        style=" font-family: serif;  font-family: serif;
font-weight: bold;
font-style: italic;
font-size: 24px;
text-align: left;">
        WO Receipt BMW TEBET <br>
    </p>
    <p style="font-size: 16px">
        Jl. Dr. Soepomo No 174, Tebet
        Jakarta - 12810
        <br>
        Telp. (021) 8310805-7, 8298451 Fax.(021)8305704
    </p>
    <hr style="border-top: 1px solid black; margin: 10px 0;">
    <hr style="border-top: 1px solid black; margin: 10px 0;">
    <table border="0" cellpadding="4" cellspacing="0" style="border-collapse: collapse;table-layout: auto;">
        <tbody>
            <td style="padding-right: 200px;">
                <h3>{{ $woData->nama }}</h3>
                <p>{{ $woData->alamat }}</p>
                <p>{{ $woData->email }}</p>
                <p>{{ $woData->no_telp }}</p>
            </td>
            <td>
                <p>No. WO :{{ $woData->no_wo }}</p>
                <p>No. Polisi :{{ $woData->no_polisi }}</p>
                <p>Tgl/Jam Masuk :{{ $woData->tanggal_mulai }} {{ $woData->waktu_mulai }}</p>
                <p>Estimasi Selesai: {{ $woData->tanggal_mulai }} {{ $woData->estimasi_selesai }}</p>
            </td>
        </tbody>
    </table>
    <hr style="border-top: 0.5px solid black; margin: 2px 0;">
    <table border="0" cellpadding="4" cellspacing="0" style="border-collapse: collapse;table-layout: auto;">
        <tbody>
            <td style="padding-right: 120px;">
                <p>No. Rangka : {{ $woData->no_rangka }}</p>
            </td>
            <td style="padding-right: 120px;">
                <p>BMW {{ $woData->jenis_mobil }}</p>
            </td>
            <td>
                <p>Km {{ $woData->kilometer }}</p>
            </td>
        </tbody>
    </table>
    <hr style="border-top: 0.5px solid black; margin: 2px 0;">
    <table border="0" cellpadding="4" cellspacing="0" style="border-collapse: collapse;table-layout: auto;">
        <thead>
            <tr>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['data'] as $item)
                @foreach ($item['layanan'] as $key => $layanan)
                    <tr>
                        <td style="padding-left: 50px;">{{ $layanan }}</td>
                        <td>{{ $item['layananHarga'][$key] }}</td>
                    </tr>
                @endforeach
                <tr>
                    @if ($woData->biaya_tambahan)
                    <td style="padding-left: 50px;">{{ $woData->layanan_tambahan }}</td>
                    <td>Rp. {{ number_format($woData->biaya_tambahan, 0, ',', '.') }}</td>
                @endif
                
                </tr>
            @endforeach
        </tbody>
    </table>
    <hr style="border-top: 0.3px solid rgb(118, 118, 118);">
    <h5 style="padding-left: 50px;">Total : Rp. {{ number_format($woData->biaya, 0, ',', '.') }}</h5>
    <table border="0" cellpadding="4" cellspacing="0"
        style="border-collapse: collapse;table-layout: auto;padding-top:350px;">
        <tbody>
            <td style="padding-right: 120px;">
                <p>Ttd. Pelanggan</p>
            </td>
            <td style="padding-right: 120px;">
                <p>Ttd. Service Advisor</p>
            </td>
        </tbody>
    </table>
</body>
