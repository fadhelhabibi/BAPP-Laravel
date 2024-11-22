@extends('layouts.app')

@section('title','Form Pengajuan Expense')

@section('content')
<form action="{{ isset($expense) ? route('expense.tambah.update', $expense->id) : route('expense.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-6 mt-3">
                            <h6 class="m-0 font-weight-bold text-primary">{{ isset($expense) ? 'Form Update Expense' : 'Form Pengajuan Expense' }}</h6>
                      </div>
                      {{-- <div class="col-6 text-right">
                            <a href="{{ route('expense') }}" class="btn btn-primary mb-3">Kembali</a>
                      </div> --}}
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="category">Category</label>
                                <select required class="form-control" id="category" name="category">
                                    <option selected disabled value="">-- Pilih Category --</option>
                                    <option value="Entertainment" {{ isset($expense) && $expense->category == 'Entertainment' ? 'selected' : '' }}>Entertainment</option>
                                    <option value="Office" {{ isset($expense) && $expense->category == 'Office' ? 'selected' : '' }}>Office</option>
                                    <option value="Transport" {{ isset($expense) && $expense->category == 'Transport' ? 'selected' : '' }}>Transport</option>
                                    <option value="WH & Delivery" {{ isset($expense) && $expense->category == 'WH & Delivery' ? 'selected' : '' }}>WH & Delivery</option>
                                    <option value="Travel" {{ isset($expense) && $expense->category == 'Travel' ? 'selected' : '' }}>Travel</option>
                                    <option value="Other" {{ isset($expense) && $expense->category == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="subcategory">Sub Category</label>
                                <select required class="form-control" id="subcategory" name="subcategory">
                                    <option selected disabled value="">-- Pilih Sub Category --</option>
                                    <option disabled value="">-- Entertainment --</option>
                                    <option value="Event" {{ isset($expense) && $expense->subcategory == 'Event' ? 'selected' : '' }}>Event</option>
                                    <option value="Meeting" {{ isset($expense) && $expense->subcategory == 'Meeting' ? 'selected' : '' }}>Meeting</option>
                                    <option value="Non" {{ isset($expense) && $expense->subcategory == 'Non' ? 'selected' : '' }}>Non</option>
                                    <option value="Customer" {{ isset($expense) && $expense->subcategory == 'Customer' ? 'selected' : '' }}>Customer</option>
                                    <option value="Internal" {{ isset($expense) && $expense->subcategory == 'Internal' ? 'selected' : '' }}>Internal</option>
                                    <option disabled value="">-- Office --</option>
                                    <option value="Pantry" {{ isset($expense) && $expense->subcategory == 'Pantry' ? 'selected' : '' }}>Pantry</option>
                                    <option value="Biaya Admin Bank" {{ isset($expense) && $expense->subcategory == 'Biaya Admin Bank' ? 'selected' : '' }}>Biaya Admin Bank</option>
                                    <option disabled value="">-- Transport --</option>
                                    <option value="Rental Car" {{ isset($expense) && $expense->subcategory == 'Rental Car' ? 'selected' : '' }}>Rental Car</option>
                                    <option value="BBM" {{ isset($expense) && $expense->subcategory == 'BBM' ? 'selected' : '' }}>BBM</option>
                                    <option value="Toll" {{ isset($expense) && $expense->subcategory == 'Toll' ? 'selected' : '' }}>Toll</option>
                                    <option value="Taxi" {{ isset($expense) && $expense->subcategory == 'Taxi' ? 'selected' : '' }}>Taxi</option>
                                    <option value="Grab/Gojek" {{ isset($expense) && $expense->subcategory == 'Grab/Gojek' ? 'selected' : '' }}>Grab/Gojek</option>
                                    <option value="Driver" {{ isset($expense) && $expense->subcategory == 'Driver' ? 'selected' : '' }}>Driver</option>
                                    <option value="Perairan" {{ isset($expense) && $expense->subcategory == 'Perairan' ? 'selected' : '' }}>Perairan</option>
                                    <option value="Ekspedisi" {{ isset($expense) && $expense->subcategory == 'Ekspedisi' ? 'selected' : '' }}>Ekspedisi</option>
                                    <option value="Travel" {{ isset($expense) && $expense->subcategory == 'Travel' ? 'selected' : '' }}>Travel</option>
                                    <option value="Other" {{ isset($expense) && $expense->subcategory == 'Other' ? 'selected' : '' }}>Other</option>
                                    <option disabled value="">-- WH & Delivery --</option>
                                    <option value="WH Rental" {{ isset($expense) && $expense->subcategory == 'WH Rental' ? 'selected' : '' }}>WH Rental</option>
                                    <option value="Delivery" {{ isset($expense) && $expense->subcategory == 'Delivery' ? 'selected' : '' }}>Delivery</option>
                                    <option value="Consumable Material" {{ isset($expense) && $expense->subcategory == 'Consumable Material' ? 'selected' : '' }}>Consumable Material</option>
                                    <option value="Patty Cash" {{ isset($expense) && $expense->subcategory == 'Patty Cash' ? 'selected' : '' }}>Patty Cash</option>
                                    <option disabled value="">-- Travel --</option>
                                    <option value="Allowance" {{ isset($expense) && $expense->subcategory == 'Allowance' ? 'selected' : '' }}>Allowance</option>
                                    <option value="Ticket" {{ isset($expense) && $expense->subcategory == 'Ticket' ? 'selected' : '' }}>Ticket</option>
                                    <option value="Penginapan" {{ isset($expense) && $expense->subcategory == 'Penginapan' ? 'selected' : '' }}>Penginapan</option>
                                    <option disabled value="">-- Other --</option>
                                    <option value="Training" {{ isset($expense) && $expense->subcategory == 'Training' ? 'selected' : '' }}>Training</option>
                                    <option value="Tools" {{ isset($expense) && $expense->subcategory == 'Tools' ? 'selected' : '' }}>Tools</option>
                                </select>
                            </div>
                        </div> 
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="area">Area</label> <!-- 6 karakter -->
                                <select required class="form-control" id="area" name="area">
                                    <option selected disabled value="">-- Pilih Area --</option>
                                    <option value="Gorontalo" {{ isset($expense) && $expense->area == 'Gorontalo' ? 'selected' : '' }}>Gorontalo</option>
                                    <option value="Makassar" {{ isset($expense) && $expense->area == 'Makassar' ? 'selected' : '' }}>Makassar</option>
                                    <option value="Gowa" {{ isset($expense) && $expense->area == 'Gowa' ? 'selected' : '' }}>Gowa</option>
                                    <option value="Bone" {{ isset($expense) && $expense->area == 'Bone' ? 'selected' : '' }}>Bone</option>
                                    <option value="Pangkep" {{ isset($expense) && $expense->area == 'Pangkep' ? 'selected' : '' }}>Pangkep</option>
                                    <option value="Palu" {{ isset($expense) && $expense->area == 'Palu' ? 'selected' : '' }}>Palu</option>
                                    <option value="Toli-Toli" {{ isset($expense) && $expense->area == 'Toli-Toli' ? 'selected' : '' }}>Toli-Toli</option>
                                    <option value="Poso" {{ isset($expense) && $expense->area == 'Poso' ? 'selected' : '' }}>Poso</option>
                                    <option value="Luwuk" {{ isset($expense) && $expense->area == 'Luwuk' ? 'selected' : '' }}>Luwuk</option>
                                    <option value="Kendari" {{ isset($expense) && $expense->area == 'Kendari' ? 'selected' : '' }}>Kendari</option>
                                    <option value="Bau-Bau" {{ isset($expense) && $expense->area == 'Bau-Bau' ? 'selected' : '' }}>Bau-Bau</option>
                                    <option value="Kolaka" {{ isset($expense) && $expense->area == 'Kolaka' ? 'selected' : '' }}>Kolaka</option>
                                    <option value="Pare-Pare" {{ isset($expense) && $expense->area == 'Pare-Pare' ? 'selected' : '' }}>Pare-Pare</option>
                                    <option value="Mamuju" {{ isset($expense) && $expense->area == 'Mamuju' ? 'selected' : '' }}>Mamuju</option>
                                    <option value="Palopo" {{ isset($expense) && $expense->area == 'Palopo' ? 'selected' : '' }}>Palopo</option>
                                    <option value="Manado" {{ isset($expense) && $expense->area == 'Manado' ? 'selected' : '' }}>Manado</option>
                                    <option value="Kotamobagu" {{ isset($expense) && $expense->area == 'Kotamobagu' ? 'selected' : '' }}>Kotamobagu</option>
                                    <option value="Bitung Kepulauan" {{ isset($expense) && $expense->area == 'Bitung Kepulauan' ? 'selected' : '' }}>Bitung Kepulauan</option>
                                    <option value="Ternate" {{ isset($expense) && $expense->area == 'Ternate' ? 'selected' : '' }}>Ternate</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="title">Title</label>
                                <input required type="text" class="form-control" id="title" name="title" value="{{ isset($expense) ? $expense->title : '' }}" placeholder="Masukkan Title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="date">Date</label>
                                <input required type="date" class="form-control" id="date" name="date" value="{{ isset($expense) ? $expense->date : '' }}" placeholder="DD-MM-YYYY" onclick="this.showPicker();">
                            </div>
                            <div class="col-6">
                                <label for="site">Site</label>
                                <input required type="text" class="form-control" id="site" name="site" value="{{ isset($expense) ? $expense->site : '' }}" placeholder="Masukkan Site">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="ticket">Ticket</label>
                                <input required type="text" class="form-control" id="ticket" name="ticket" value="{{ isset($expense) ? $expense->ticket : '' }}" placeholder="Masukkan Ticket">
                            </div>
                            <div class="col-6">
                                <label for="pengeluaran">Pengeluaran</label>
                                <input required type="number" class="form-control" id="pengeluaran" name="pengeluaran" value="{{ isset($expense) ? $expense->pengeluaran : '' }}" placeholder="Masukkan Pengeluaran">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input required type="text" class="form-control" id="keterangan" name="keterangan" value="{{ isset($expense) ? $expense->keterangan : '' }}" placeholder="Masukkan Keterangan">
                        </div>
                        @if (auth()->user()->level == 'Manager')
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option selected disabled value="">-- Pilih Status --</option>
                                <option value="1" {{ isset($expense) && $expense->status == '1' ? 'selected' : '' }}>Approve</option>
                                <option value="2" {{ isset($expense) && $expense->status == '2' ? 'selected' : '' }}>Reject</option>
                            </select>
                        </div>
                        @endif
                    </div>                 
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div> 
        </div>
    </div>
</form>
@endsection
@section('script')
    <script>
        document.getElementById('date').addEventListener('focus', function() {
        this.showPicker();
    });
    </script>
@endsection