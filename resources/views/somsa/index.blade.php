@extends('layouts.app')

@section('title','Data Somsa')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-6">
                <h6 class="m-0 font-weight-bold text-primary">Data Somsa</h6>
            </div>
            <div class="col-6 d-flex justify-content-end"> <!-- Tambahkan d-flex -->
                {{-- <a href="{{ route('somsa.export.excel') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-download fa-sm text-white-50"></i> Export Excel
                </a>&nbsp; --}}
                <a href="{{ route('somsa.export.pdf') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-download fa-sm text-white-50"></i> Export PDF
                </a>
            </div>
        </div>  
    </div>
    <div class="card-body">
        @if (auth()->user()->level == 'Triple-E' || auth()->user()->level == 'KUT')
           <a href="{{ route('somsa.tambah') }}" class="btn btn-primary mb-3" style="font-size: 14px;"><i class="fas fa-plus"></i> Tambah Data</a>
        @endif
        <div class="table-responsive">
            <table class="table" id="dataTable" cellspacing="0" style="font-size: 12px">
                <thead>
                    <tr class="bg-primary text-white text-center">
                        <th>No</th>
                        <th>Cluster</th>
                        <th>Site ID</th>
                        <th style="min-width: 100px;">Site Name</th>
                        <th>Type</th>
                        <th>Ticket Number</th>
                        <th>AC</th>
                        <th>Grounding</th>
                        <th>Penerangan</th>
                        <th>Shelter</th>
                        <th>Kebersihan</th>
                        <th>Sparepart</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @foreach ($somsa as $row)
                        <tr class="text-center">
                            <th>{{ $no++ }}</th>
                            <td>{{ $row->cluster }}</td>
                            <td>{{ $row->siteid }}</td>
                            <td style="min-width: 100px;">{{ $row->sitename }}</td>
                            <td>{{ $row->type }}</td>
                            <td>{{ $row->ticketnumber }}</td>
                            <td>{{ $row->ac }}</td>
                            <td>{{ $row->grounding }}</td>
                            <td>{{ $row->penerangan }}</td>
                            <td>{{ $row->shelter }}</td>
                            <td>{{ $row->kebersihan }}</td>
                            <td>{{ $row->sparepart }}</td>
                            <td>Rp.{{ number_format($row->harga, 0, ',', '.') }}</td>
                            <td class="justify-content-center">
                                {{-- <a href="{{ route('somsa.edit', $row->id) }}" class="btn btn-warning" style="font-size: 12px">Edit</a><br><br>
                                <a href="{{ route('somsa.hapus', $row->id) }}" class="btn btn-danger" style="font-size: 12px">Hapus</a> --}}
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                        aria-labelledby="dropdownMenuLink">
                                        @if (auth()->user()->level == 'Triple-E' || auth()->user()->level == 'RTS')
                                        <a class="dropdown-item" href="{{ route('somsa.edit', $row->id) }}">Edit</a>
                                        @endif
                                        <a class="dropdown-item" href="#" 
                                        onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin menghapus data ini?')) { document.getElementById('hapus-form-{{ $row->id }}').submit(); }">Hapus</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#" 
                                        @if(isset($row->filepdf) && !empty($row->filepdf))
                                            onclick="window.open('{{ asset('uploads/' . $row->filepdf) }}', '_blank')"
                                        @else
                                            disabled
                                        @endif>
                                        Lihat Detail
                                     </a>
                                    </div>
                                </div>

                                <!-- Form untuk hapus data -->
                                <form id="hapus-form-{{ $row->id }}" action="{{ route('somsa.hapus', $row->id) }}" method="POST" style="display: none;">
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