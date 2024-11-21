@extends('layouts.app')

@section('title','Form PW')

@section('content')
<form action="{{ isset($pw) ? route('pw.tambah.update', $pw->id) : route('pw.tambah.simpan') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-6 mt-3">
                            <h6 class="m-0 font-weight-bold text-primary">{{ isset($pw) ? 'Form Edit PW' : 'Form Tambah PW' }}</h6>
                      </div>
                      <div class="col-6 text-right">
                            <a href="{{ route('pw') }}" class="btn btn-primary mb-3">Kembali</a>
                      </div>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="ticketnumber">Ticket Number</label>
                                <input required type="text" class="form-control" id="ticketnumber" name="ticketnumber" value="{{ isset($pw) ? $pw->ticketnumber : '' }}" placeholder="Masukkan Ticket Number">
                            </div>
                            <div class="col-6">
                                <label for="cluster">Cluster</label>
                                <select required class="form-control" id="cluster" name="cluster">
                                    <option selected disabled value="">-- Pilih Cluster --</option>
                                    <option value="Gorontalo" {{ isset($pw) && $pw->cluster == 'Gorontalo' ? 'selected' : '' }}>Gorontalo</option>
                                    <option value="Makassar" {{ isset($pw) && $pw->cluster == 'Makassar' ? 'selected' : '' }}>Makassar</option>
                                    <option value="Gowa" {{ isset($pw) && $pw->cluster == 'Gowa' ? 'selected' : '' }}>Gowa</option>
                                    <option value="Bone" {{ isset($pw) && $pw->cluster == 'Bone' ? 'selected' : '' }}>Bone</option>
                                    <option value="Pangkep" {{ isset($pw) && $pw->cluster == 'Pangkep' ? 'selected' : '' }}>Pangkep</option>
                                    <option value="Palu" {{ isset($pw) && $pw->cluster == 'Palu' ? 'selected' : '' }}>Palu</option>
                                    <option value="Toli-Toli" {{ isset($pw) && $pw->cluster == 'Toli-Toli' ? 'selected' : '' }}>Toli-Toli</option>
                                    <option value="Poso" {{ isset($pw) && $pw->cluster == 'Poso' ? 'selected' : '' }}>Poso</option>
                                    <option value="Luwuk" {{ isset($pw) && $pw->cluster == 'Luwuk' ? 'selected' : '' }}>Luwuk</option>
                                    <option value="Kendari" {{ isset($pw) && $pw->cluster == 'Kendari' ? 'selected' : '' }}>Kendari</option>
                                    <option value="Bau-Bau" {{ isset($pw) && $pw->cluster == 'Bau-Bau' ? 'selected' : '' }}>Bau-Bau</option>
                                    <option value="Kolaka" {{ isset($pw) && $pw->cluster == 'Kolaka' ? 'selected' : '' }}>Kolaka</option>
                                    <option value="Pare-Pare" {{ isset($pw) && $pw->cluster == 'Pare-Pare' ? 'selected' : '' }}>Pare-Pare</option>
                                    <option value="Mamuju" {{ isset($pw) && $pw->cluster == 'Mamuju' ? 'selected' : '' }}>Mamuju</option>
                                    <option value="Palopo" {{ isset($pw) && $pw->cluster == 'Palopo' ? 'selected' : '' }}>Palopo</option>
                                    <option value="Manado" {{ isset($pw) && $pw->cluster == 'Manado' ? 'selected' : '' }}>Manado</option>
                                    <option value="Kotamobagu" {{ isset($pw) && $pw->cluster == 'Kotamobagu' ? 'selected' : '' }}>Kotamobagu</option>
                                    <option value="Bitung Kepulauan" {{ isset($pw) && $pw->cluster == 'Bitung Kepulauan' ? 'selected' : '' }}>Bitung Kepulauan</option>
                                    <option value="Ternate" {{ isset($pw) && $pw->cluster == 'Ternate' ? 'selected' : '' }}>Ternate</option>
                                </select>
                            </div>
                        </div> 
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="siteid">Site ID</label> <!-- 6 karakter -->
                                <input required type="text" class="form-control" id="siteid" name="siteid" maxlength="6" value="{{ isset($pw) ? $pw->siteid : '' }}" placeholder="Masukkan Site ID">
                            </div>
                            <div class="col-6">
                                <label for="sitename">Site Name</label>
                                <input required type="text" class="form-control" id="sitename" name="sitename" value="{{ isset($pw) ? $pw->sitename : '' }}" placeholder="Masukkan Site Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="pic">PIC</label>
                                <input required type="text" class="form-control" id="pic" name="pic" value="{{ isset($pw) ? $pw->pic : '' }}" placeholder="Masukkan PIC">
                            </div>
                            <div class="col-6">
                                <label for="notlppic">No Tlp PIC</label>
                                <input required type="text" class="form-control" id="notlppic" name="notlppic" value="{{ isset($pw) ? $pw->notlppic : '' }}" placeholder="Masukkan No Tlp PIC">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="tipepenjagasite">Tipe Penjaga Site</label>
                                <select required class="form-control" id="tipepenjagasite" name="tipepenjagasite">
                                    <option selected disabled value="">-- Pilih Tipe Penjaga Site --</option>
                                    <option value="Reguler" {{ isset($pw) && $pw->tipepenjagasite == 'Reguler' ? 'selected' : '' }}>Reguler</option>
                                    <option value="Backbone" {{ isset($pw) && $pw->tipepenjagasite == 'Backbone' ? 'selected' : '' }}>Backbone</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="hargapemberdayaan">Harga Pemberdayaan</label><!-- Rp. -->
                                <input required type="number" class="form-control" id="hargapemberdayaan" name="hargapemberdayaan" value="{{ isset($pw) ? $pw->hargapemberdayaan : '' }}" placeholder="Masukkan Harga Pemberdayaan">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input required type="text" class="form-control" id="keterangan" name="keterangan" value="{{ isset($pw) ? $pw->keterangan : '' }}" placeholder="Masukkan Keterangan">
                        </div> 
                        <div class="form-group">
                            <label for="filepdf">Upload PDF</label>
                            <input type="file" name="filepdf" id="filepdf" class="form-control">
                        </div>
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

@endsection