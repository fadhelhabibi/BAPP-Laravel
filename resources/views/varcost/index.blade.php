@extends('layouts.app')

@section('title','Data Varcost')

@section('content')
<form method="GET" action="{{ route('varcost') }}">
    <div class="form-group row">
        <div class="col-4">
            <select name="search" id="periode" class="form-control">
                <option value="">Semua Periode</option>
                @foreach($periods as $period)
                    <option value="{{ $period }}">{{ $period }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-2">
            <button type="submit" class="btn btn-primary"><i class="fas fa-search fa-sm text-white-50"></i> Search</button>
        </div>
    </div>
</form>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-6">
                <h6 class="m-0 font-weight-bold text-primary">Data Varcost</h6>
            </div>
            <div class="col-6 d-flex justify-content-end"> <!-- Tambahkan d-flex -->
                {{-- <a href="{{ route('varcost.export.excel') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-download fa-sm text-white-50"></i> Export Excel
                </a>&nbsp; --}}
                <a href="{{ route('varcost.export.pdf', ['periode' => request('search')]) }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-download fa-sm text-white-50"></i> Export PDF
                </a>
            </div>
        </div>  
    </div>
    <div class="card-body">
        @if (auth()->user()->level == 'Triple-E' || auth()->user()->level == 'KUT')
           <a href="{{ route('varcost.tambah') }}" class="btn btn-primary mb-3">Tambah Varcost</a>
        @endif
        <div class="table-responsive">
            <table class="table" id="dataTable" cellspacing="0" style="font-size: 12px">
                <thead>
                    <tr class="bg-primary text-white text-center">
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Periode</th>
                        <th>Tahun</th>
                        <th>Site ID</th>
                        <th>Site Name</th>
                        <th>NOP</th>
                        <th>CLUSTER</th>
                        <th>Tiket SWFM</th>
                        <th>Tanggal Pelaksanaan</th>
                        <th>Aktivity</th>
                        <th>Kode SL</th>
                        <th>Qty</th>
                        <th>Harga Satuan</th>
                        <th>Fee</th>
                        <th>Total Harga</th>
                        <th>Status Ticket</th>
                        <th>PO</th>
                        <th>Status Pekerjaan</th>
                        <th>Status Penagihan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @foreach ($varcost as $row)
                        <tr>
                            <th>{{ $no++ }}</th>
                            <td>{{ $row->kategori }}</td>
                            <td>{{ $row->periode }}</td>
                            <td>{{ $row->tahun }}</td>
                            <td>{{ $row->siteid }}</td>
                            <td>{{ $row->sitename }}</td>
                            <td>{{ $row->nop }}</td>
                            <td>{{ $row->cluster }}</td>
                            <td>{{ $row->tiketfiola }}</td>
                            <td>{{ $row->tanggalpelaksanaan }}</td>
                            <td>{{ $row->aktivity }}</td>
                            <td>{{ $row->kodesl }}</td>
                            <td>{{ $row->qty }}</td>
                            <td>Rp.{{ number_format($row->hargasatuan, 0, ',', '.') }}</td>
                            <td>{{ $row->fee }}%</td>
                            <td>Rp.{{ number_format($row->total_harga, 0, ',', '.') }}</td>
                            <td>{{ $row->statusticket }}</td>
                            <td>{{ $row->po }}</td>
                            <td>{{ $row->statuspekerjaan }}</td>
                            <td>{{ $row->statuspenagihan }}</td>
                            <td class="justify-content-center">
                                {{-- <a href="{{ route('varcost.edit', $row->id) }}" class="btn btn-warning" style="font-size: 12px">Edit</a><br><br>
                                <a href="{{ route('varcost.hapus', $row->id) }}" class="btn btn-danger" style="font-size: 12px">Hapus</a> --}}
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                        aria-labelledby="dropdownMenuLink">
                                        @if (auth()->user()->level == 'Triple-E' || auth()->user()->level == 'RTS')
                                        <a class="dropdown-item" href="{{ route('varcost.edit', $row->id) }}">Edit</a>
                                        @endif
                                        <a class="dropdown-item" href="#" 
                                        onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin menghapus data ini?')) { document.getElementById('hapus-form-{{ $row->id }}').submit(); }">Hapus</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Detail</a>
                                    </div>
                                </div>

                                <!-- Form untuk hapus data -->
                                <form id="hapus-form-{{ $row->id }}" action="{{ route('varcost.hapus', $row->id) }}" method="POST" style="display: none;">
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