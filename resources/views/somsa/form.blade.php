@extends('layouts.app')

@section('title','Form Somsa')

@section('content')
<form action="{{ isset($somsa) ? route('somsa.tambah.update', $somsa->id) : route('somsa.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-6 mt-3">
                            <h6 class="m-0 font-weight-bold text-primary">{{ isset($somsa) ? 'Form Edit somsa' : 'Form Tambah somsa' }}</h6>
                      </div>
                      <div class="col-6 text-right">
                            <a href="{{ route('somsa') }}" class="btn btn-primary mb-3">Kembali</a>
                      </div>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="cluster">Cluster</label>
                                <select required class="form-control" id="cluster" name="cluster">
                                    <option selected disabled value="">-- Pilih Cluster --</option>
                                    <option value="Gorontalo" {{ isset($somsa) && $somsa->cluster == 'Gorontalo' ? 'selected' : '' }}>Gorontalo</option>
                                    <option value="Makassar" {{ isset($somsa) && $somsa->cluster == 'Makassar' ? 'selected' : '' }}>Makassar</option>
                                    <option value="Gowa" {{ isset($somsa) && $somsa->cluster == 'Gowa' ? 'selected' : '' }}>Gowa</option>
                                    <option value="Bone" {{ isset($somsa) && $somsa->cluster == 'Bone' ? 'selected' : '' }}>Bone</option>
                                    <option value="Pangkep" {{ isset($somsa) && $somsa->cluster == 'Pangkep' ? 'selected' : '' }}>Pangkep</option>
                                    <option value="Palu" {{ isset($somsa) && $somsa->cluster == 'Palu' ? 'selected' : '' }}>Palu</option>
                                    <option value="Toli-Toli" {{ isset($somsa) && $somsa->cluster == 'Toli-Toli' ? 'selected' : '' }}>Toli-Toli</option>
                                    <option value="Poso" {{ isset($somsa) && $somsa->cluster == 'Poso' ? 'selected' : '' }}>Poso</option>
                                    <option value="Luwuk" {{ isset($somsa) && $somsa->cluster == 'Luwuk' ? 'selected' : '' }}>Luwuk</option>
                                    <option value="Kendari" {{ isset($somsa) && $somsa->cluster == 'Kendari' ? 'selected' : '' }}>Kendari</option>
                                    <option value="Bau-Bau" {{ isset($somsa) && $somsa->cluster == 'Bau-Bau' ? 'selected' : '' }}>Bau-Bau</option>
                                    <option value="Kolaka" {{ isset($somsa) && $somsa->cluster == 'Kolaka' ? 'selected' : '' }}>Kolaka</option>
                                    <option value="Pare-Pare" {{ isset($somsa) && $somsa->cluster == 'Pare-Pare' ? 'selected' : '' }}>Pare-Pare</option>
                                    <option value="Mamuju" {{ isset($somsa) && $somsa->cluster == 'Mamuju' ? 'selected' : '' }}>Mamuju</option>
                                    <option value="Palopo" {{ isset($somsa) && $somsa->cluster == 'Palopo' ? 'selected' : '' }}>Palopo</option>
                                    <option value="Manado" {{ isset($somsa) && $somsa->cluster == 'Manado' ? 'selected' : '' }}>Manado</option>
                                    <option value="Kotamobagu" {{ isset($somsa) && $somsa->cluster == 'Kotamobagu' ? 'selected' : '' }}>Kotamobagu</option>
                                    <option value="Bitung Kepulauan" {{ isset($somsa) && $somsa->cluster == 'Bitung Kepulauan' ? 'selected' : '' }}>Bitung Kepulauan</option>
                                    <option value="Ternate" {{ isset($somsa) && $somsa->cluster == 'Ternate' ? 'selected' : '' }}>Ternate</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="siteid">Site ID</label> <!-- 6 karakter -->
                                <input required type="text" class="form-control" id="siteid" name="siteid" maxlength="6" value="{{ isset($somsa) ? $somsa->siteid : '' }}" placeholder="Masukkan Site ID">
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="sitename">Site Name</label>
                            <input required type="text" class="form-control" id="sitename" name="sitename" value="{{ isset($somsa) ? $somsa->sitename : '' }}" placeholder="Masukkan Site Name">
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <input required type="text" class="form-control" id="type" name="type" value="{{ isset($somsa) ? $somsa->type : '' }}" placeholder="Masukkan Type">
                        </div> 
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="ticketnumber">Ticket Number</label>
                                <input required type="text" class="form-control" id="ticketnumber" name="ticketnumber" value="{{ isset($somsa) ? $somsa->ticketnumber : '' }}" placeholder="Masukkan Ticket Number">
                            </div>
                            <div class="col-6">
                                <label for="ac">AC</label>
                                <select required class="form-control" id="ac" name="ac">
                                    <option selected disabled value="">-- Pilih AC --</option>
                                    <option value="OK" {{ isset($somsa) && $somsa->ac == 'OK' ? 'selected' : '' }}>OK</option>
                                    <option value="NOK" {{ isset($somsa) && $somsa->ac == 'NOK' ? 'selected' : '' }}>NOK</option>
                                    <option value="Tidak Ada" {{ isset($somsa) && $somsa->ac == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="grounding">Grounding</label>
                                <select required class="form-control" id="grounding" name="grounding">
                                    <option selected disabled value="">-- Pilih Grounding --</option>
                                    <option value="OK" {{ isset($somsa) && $somsa->grounding == 'OK' ? 'selected' : '' }}>OK</option>
                                    <option value="NOK" {{ isset($somsa) && $somsa->grounding == 'NOK' ? 'selected' : '' }}>NOK</option>
                                    <option value="Tidak Ada" {{ isset($somsa) && $somsa->grounding == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="penerangan">Penerangan</label>
                                <select required class="form-control" id="penerangan" name="penerangan">
                                    <option selected disabled value="">-- Pilih Penerangan --</option>
                                    <option value="OK" {{ isset($somsa) && $somsa->penerangan == 'OK' ? 'selected' : '' }}>OK</option>
                                    <option value="NOK" {{ isset($somsa) && $somsa->penerangan == 'NOK' ? 'selected' : '' }}>NOK</option>
                                    <option value="Tidak Ada" {{ isset($somsa) && $somsa->penerangan == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="shelter">Shelter</label>
                                <select required class="form-control" id="shelter" name="shelter">
                                    <option selected disabled value="">-- Pilih Shelter --</option>
                                    <option value="OK" {{ isset($somsa) && $somsa->shelter == 'OK' ? 'selected' : '' }}>OK</option>
                                    <option value="NOK" {{ isset($somsa) && $somsa->shelter == 'NOK' ? 'selected' : '' }}>NOK</option>
                                    <option value="Tidak Ada" {{ isset($somsa) && $somsa->shelter == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="kebersihan">Kebersihan</label>
                                <select required class="form-control" id="kebersihan" name="kebersihan">
                                    <option selected disabled value="">-- Pilih Kebersihan --</option>
                                    <option value="OK" {{ isset($somsa) && $somsa->kebersihan == 'OK' ? 'selected' : '' }}>OK</option>
                                    <option value="NOK" {{ isset($somsa) && $somsa->kebersihan == 'NOK' ? 'selected' : '' }}>NOK</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="sparepart">Sparepart</label>
                                <select required class="form-control" id="sparepart" name="sparepart">
                                    <option selected disabled value="">-- Pilih Sparepart --</option>
                                    <option value="OK" {{ isset($somsa) && $somsa->sparepart == 'OK' ? 'selected' : '' }}>OK</option>
                                    <option value="NOK" {{ isset($somsa) && $somsa->sparepart == 'NOK' ? 'selected' : '' }}>NOK</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="harga">Harga</label><!-- Rp. -->
                                <input required type="number" class="form-control" id="harga" name="harga" value="{{ isset($somsa) ? $somsa->harga : '' }}" placeholder="Masukkan Harga">
                            </div>
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