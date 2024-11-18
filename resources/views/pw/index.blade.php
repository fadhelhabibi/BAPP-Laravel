@extends('layouts.app')

@section('title','Data Pemberdayaan Warga (PW)')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-6">
                <h6 class="m-0 font-weight-bold text-primary">Data Pemberdayaan Warga (PW)</h6>
            </div>
            <div class="col-6 d-flex justify-content-end"> <!-- Tambahkan d-flex -->
                {{-- <a href="{{ route('pw.export.excel') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-download fa-sm text-white-50"></i> Export Excel
                </a>&nbsp; --}}
                <a href="{{ route('pw.export.pdf') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-download fa-sm text-white-50"></i> Export PDF
                </a>
            </div>
        </div>  
    </div>
    <div class="card-body">
        @if (auth()->user()->level == 'Triple-E' || auth()->user()->level == 'KUT')
           <a href="{{ route('pw.tambah') }}" class="btn btn-primary mb-3" style="font-size: 14px;"><i class="fas fa-plus"></i> Tambah Data</a>
        @endif
        <div class="table-responsive">
            <table class="table" id="dataTable" cellspacing="0" style="font-size: 12px">
                <thead>
                    <tr class="bg-primary text-white text-center">
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
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @foreach ($pw as $row)
                        <tr class="text-center">
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
                            <td class="justify-content-center">
                                {{-- <a href="{{ route('pw.edit', $row->id) }}" class="btn btn-warning" style="font-size: 12px">Edit</a><br><br>
                                <a href="{{ route('pw.hapus', $row->id) }}" class="btn btn-danger" style="font-size: 12px">Hapus</a> --}}
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                        aria-labelledby="dropdownMenuLink">
                                        @if (auth()->user()->level == 'Triple-E' || auth()->user()->level == 'RTS')
                                        <a class="dropdown-item" href="{{ route('pw.edit', $row->id) }}">Edit</a>
                                        @endif
                                        <a class="dropdown-item" href="#" 
                                        onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin menghapus data ini?')) { document.getElementById('hapus-form-{{ $row->id }}').submit(); }">Hapus</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Detail</a>
                                    </div>
                                </div>

                                <!-- Form untuk hapus data -->
                                <form id="hapus-form-{{ $row->id }}" action="{{ route('pw.hapus', $row->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE') <!-- Menandakan bahwa ini adalah permintaan DELETE -->
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
    $(document).ready(function() {
        $("#tanggalpelaksanaan").datepicker({
            dateFormat: 'dd-mm-yy', // Format tanggal yang ditampilkan
            onSelect: function(dateText) {
                // Saat tanggal dipilih, konversi ke format YYYY-MM-DD sebelum disimpan
                var parts = dateText.split('-');
                var formattedDate = parts[2] + '-' + parts[1] + '-' + parts[0]; // Ubah ke format YYYY-MM-DD
                $(this).val(formattedDate); // Set nilai input
            }
        });
    });
    </script>
@endsection