@extends('layouts.app')

@section('title','Kelola Expanse by Manager')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-6">
                <h6 class="m-0 font-weight-bold text-primary">Kelola Expanse by Manager</h6>
            </div>
            {{-- <div class="col-6 d-flex justify-content-end"> <!-- Tambahkan d-flex -->
                <a href="{{ route('expense.export.excel') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-download fa-sm text-white-50"></i> Export Excel
                </a>&nbsp;
                <a href="{{ route('expense.export.pdf') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-download fa-sm text-white-50"></i> Export PDF
                </a>
            </div> --}}
        </div>  
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table" id="dataTable" cellspacing="0" style="font-size: 12px">
                <thead>
                    <tr class="bg-primary text-white text-center">
                        <th>No</th>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Area</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Site</th>
                        <th>Ticket</th>
                        <th>Expense ID</th>
                        <th>Keterangan</th>
                        <th>Jumlah Expense (IDR)</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @foreach ($expense as $row)
                        <tr class="text-center">
                            <th>{{ $no++ }}</th>
                            <td>{{ $row->category }}</td>
                            <td>{{ $row->subcategory }}</td>
                            <td>{{ $row->area }}</td>
                            <td>{{ $row->title }}</td>
                            <td>{{ $row->date }}</td>
                            <td>{{ $row->site }}</td>
                            <td>{{ $row->ticket }}</td>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->keterangan }}</td>
                            <td>Rp.{{ number_format($row->pengeluaran, 0, ',', '.') }}</td>
                            <td>{{ $row->status }}</td>
                            <td class="justify-content-center">
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="{{ route('expense.edit', $row->id) }}">Edit</a>
                                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin menghapus data ini?')) { document.getElementById('hapus-form-{{ $row->id }}').submit(); }">Hapus</a>
                                    </div>
                                </div>
                                <form id="hapus-form-{{ $row->id }}" action="{{ route('expense.hapus', $row->id) }}" method="POST" style="display: none;">
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
        $("#date").datepicker({
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