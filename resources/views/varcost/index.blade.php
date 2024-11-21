@extends('layouts.app')

@section('title', 'Data Varcost')

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
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-search fa-sm text-white-50"></i> Search
            </button>
        </div>
    </div>
</form>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-6">
                <h6 class="m-0 font-weight-bold text-primary">Data Varcost</h6>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <a href="{{ route('varcost.export.pdf', ['periode' => request('search')]) }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-download fa-sm text-white-50"></i> Export PDF
                </a>
            </div>
        </div>  
    </div>
    <div class="card-body">
        @if (auth()->user()->level == 'Triple-E' || auth()->user()->level == 'KUT')
            <a href="{{ route('varcost.tambah') }}" class="btn btn-primary mb-3" style="font-size: 14px;"><i class="fas fa-plus"></i> Tambah Data</a>
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
                        <th style="min-width: 100px;">Site Name</th>
                        <th>NOP</th>
                        <th>CLUSTER</th>
                        <th>Tiket SWFM</th>
                        <th style="min-width: 150px;">Tanggal Pelaksanaan</th>
                        <th>Aktivity</th>
                        <th>Kode SL</th>
                        <th>Qty</th>
                        <th style="min-width: 120px;">Harga Satuan</th>
                        <th>Fee</th>
                        <th style="min-width: 100px;">Total Harga</th>
                        <th style="min-width: 100px;">Status Ticket</th>
                        <th>PO</th>
                        <th style="min-width: 150px;">Status Pekerjaan</th>
                        <th style="min-width: 150px;">Status Penagihan</th>
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
                            <td class="text-center" style="min-width: 100px;">{{ $row->sitename }}</td>
                            <td>{{ $row->nop }}</td>
                            <td>{{ $row->cluster }}</td>
                            <td>{{ $row->tiketfiola }}</td>
                            <td class="text-center" style="min-width: 150px;">{{ $row->tanggalpelaksanaan }}</td>
                            <td>{{ $row->aktivity }}</td>
                            <td>{{ $row->kodesl }}</td>
                            <td>{{ $row->qty }}</td>
                            <td class="text-center" style="min-width: 120px;">Rp.{{ number_format($row->hargasatuan, 0, ',', '.') }}</td>
                            <td>{{ $row->fee }}%</td>
                            <td class="text-center" style="min-width: 100px;">Rp.{{ number_format($row->total_harga, 0, ',', '.') }}</td>
                            <td class="text-center" style="min-width: 100px;">{{ $row->statusticket }}</td>
                            <td>{{ $row->po }}</td>
                            <td class="text-center" style="min-width: 150px;">{{ $row->statuspekerjaan }}</td>
                            <td class="text-center" style="min-width: 150px;">{{ $row->statuspenagihan }}</td>
                            <td class="justify-content-center">
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                        @if (auth()->user()->level == 'Triple-E' || auth()->user()->level == 'RTS')
                                            <a class="dropdown-item" href="{{ route('varcost.edit', $row->id) }}">Edit</a>
                                        @endif
                                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin menghapus data ini?')) { document.getElementById('hapus-form-{{ $row->id }}').submit(); }">Hapus</a>
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
                                <form id="hapus-form-{{ $row->id }}" action="{{ route('varcost.hapus', $row->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
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
            dateFormat: 'dd-mm-yy',
            onSelect: function(dateText) {
                var parts = dateText.split('-');
                var formattedDate = parts[2] + '-' + parts[1] + '-' + parts[0];
                $(this).val(formattedDate);
            }
        });
    });
</script>
@endsection
