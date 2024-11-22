@extends('layouts.app')

@section('title','Expense Me')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-6">
                <h6 class="m-0 font-weight-bold text-primary">Data Expense Me</h6>
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
                        <th>Date</th>
                        <th>Type</th>
                        <th>Expane ID</th>
                        <th>Keterangan</th>
                        <th>Jumlah Expense (IDR)</th>            
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @foreach ($expense as $row)
                        <tr class="text-center">
                            <th>{{ $no++ }}</th>
                            <td>{{ $row->date }}</td>
                            <td>Expense Claim</td>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->keterangan }}</td>
                            <td>Rp.{{ number_format($row->pengeluaran, 0, ',', '.') }}</td>
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