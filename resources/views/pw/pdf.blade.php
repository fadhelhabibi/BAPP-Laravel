<!DOCTYPE html>
<html>
<head>
    <title>Data PW</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 6px; /* Ukuran font lebih kecil untuk seluruh halaman */
        }
        h3 {
            font-size: 10px; /* Ukuran font untuk judul */
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 6px; /* Ukuran font lebih kecil untuk isi tabel */
        }
        th, td {
            padding: 1px; /* Padding yang lebih kecil */
            text-align: center;
            border: 1px solid #000;
        }
        th {
            background-color: #f2f2f2;
        }
        .signature-section {
            font-size: 6px;
        }
        .signature-table {
            width: 100%;
            border: none; /* Menghilangkan border pada tabel tanda tangan */
        }
        .signature-table td {
            text-align: left;
            border: none; /* Menghilangkan border pada sel */
        }
        .signature-table .signature-cell {
            width: 25%; /* Lebar tiap kolom tanda tangan */
        }
    </style>
</head>
<body>
    <h3>Data PW</h3>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Ticket Number</th>
                <th>Cluster</th>
                <th>Site ID</th>
                <th>Site Name</th>
                <th>PIC</th>            
                <th>No Tlp PIC</th>
                <th>Tipe Penjaga Site</th>
                <th>Harga Pemberdayaan</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @php($no = 1)
            @foreach ($pw as $row)
            <tr>
                <th>{{ $no++ }}</th>
                <td>{{ $row->ticketnumber }}</td>
                <td>{{ $row->cluster }}</td>
                <td>{{ $row->siteid }}</td>
                <td>{{ $row->sitename }}</td>
                <td>{{ $row->pic }}</td>
                <td>{{ $row->notlppic }}</td>
                <td>{{ $row->tipepenjagasite }}</td>
                <td>Rp.{{ number_format($row->hargapemberdayaan, 0, ',', '.') }}</td>
                <td>{{ $row->keterangan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Tanda Tangan -->
    <div class="signature-section">
        <p>Makassar, ................</p>
        <p>Dibuat Oleh,</p>
        <table class="signature-table">
            <tr>
                <td class="signature-cell">
                    <p>PT. Triple eGlobal Transformasi</p>
                    <br><br><br><br>
                    <p>Fany Fitria</p>
                    <p>Lead O&M Sulawesi</p>
                </td>
                <td class="signature-cell">
                    <p>PT. Triple eGlobal Transformasi</p>
                    <br><br><br><br>
                    <p>Fahrul Qistan</p>
                    <p>ROH Ternate</p>
                </td>
                <td class="signature-cell">
                    <p>PT. Triple eGlobal Transformasi</p>
                    <br><br><br><br>
                    <p>Mas Eko Prihantono</p>
                    <p>Regional Lead Sulawesi</p>
                </td>
                <td class="signature-cell">
                    <p>PT. Telkomsel</p>
                    <br><br><br><br>
                    <p>Fredi Tandibura</p>
                    <p>Manager NOP Ternate</p>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
