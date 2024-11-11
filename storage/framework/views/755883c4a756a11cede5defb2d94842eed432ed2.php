

<?php $__env->startSection('title','Form Varcost'); ?>

<?php $__env->startSection('content'); ?>
<form action="<?php echo e(isset($varcost) ? route('varcost.tambah.update', $varcost->id) : route('varcost.tambah.simpan')); ?>" method="post">
    <?php echo csrf_field(); ?>
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-6 mt-3">
                            <h6 class="m-0 font-weight-bold text-primary"><?php echo e(isset($varcost) ? 'Form Edit Varcost' : 'Form Tambah Varcost'); ?></h6>
                      </div>
                      <div class="col-6 text-right">
                            <a href="<?php echo e(route('varcost')); ?>" class="btn btn-primary mb-3">Kembali</a>
                      </div>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <div class="form-group row">
                            <div class="col-6">
                            <label for="kategori">Kategori</label>
                            <select required class="form-control" id="kategori" name="kategori">
                                <option selected disabled value="">-- Pilih Kategori --</option>
                                <option value="Power" <?php echo e(isset($varcost) && $varcost->kategori == 'Power' ? 'selected' : ''); ?>>Power</option>
                                <option value="Non-Power" <?php echo e(isset($varcost) && $varcost->kategori == 'Non-Power' ? 'selected' : ''); ?>>Non-Power</option>
                                <option value="Transportasi Kepulauan" <?php echo e(isset($varcost) && $varcost->kategori == 'Transportasi Kepulauan' ? 'selected' : ''); ?>>Transportasi Kepulauan</option>
                            </select>
                            </div>
                        <div class="col-6">
                            <label for="periode">Periode</label>
                            <select required class="form-control" id="periode" name="periode">
                                <option selected disabled value="">-- Pilih Periode --</option>
                                <option value="Januari" <?php echo e(isset($varcost) && $varcost->periode == 'Januari' ? 'selected' : ''); ?>>Januari</option>
                                <option value="Februari" <?php echo e(isset($varcost) && $varcost->periode == 'Februari' ? 'selected' : ''); ?>>Februari</option>
                                <option value="Maret" <?php echo e(isset($varcost) && $varcost->periode == 'Maret' ? 'selected' : ''); ?>>Maret</option>
                                <option value="April" <?php echo e(isset($varcost) && $varcost->periode == 'April' ? 'selected' : ''); ?>>April</option>
                                <option value="Mei" <?php echo e(isset($varcost) && $varcost->periode == 'Mei' ? 'selected' : ''); ?>>Mei</option>
                                <option value="Juni" <?php echo e(isset($varcost) && $varcost->periode == 'Juni' ? 'selected' : ''); ?>>Juni</option>
                                <option value="Juli" <?php echo e(isset($varcost) && $varcost->periode == 'Juli' ? 'selected' : ''); ?>>Juli</option>
                                <option value="Agustus" <?php echo e(isset($varcost) && $varcost->periode == 'Agustus' ? 'selected' : ''); ?>>Agustus</option>
                                <option value="September" <?php echo e(isset($varcost) && $varcost->periode == 'September' ? 'selected' : ''); ?>>September</option>
                                <option value="Oktober" <?php echo e(isset($varcost) && $varcost->periode == 'Oktober' ? 'selected' : ''); ?>>Oktober</option>
                                <option value="November" <?php echo e(isset($varcost) && $varcost->periode == 'November' ? 'selected' : ''); ?>>November</option>
                                <option value="Desember" <?php echo e(isset($varcost) && $varcost->periode == 'Desember' ? 'selected' : ''); ?>>Desember</option>
                            </select>                            
                        </div>
                        </div> 
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="tahun">Tahun</label>
                                <select required class="form-control" id="tahun" name="tahun">
                                    <option selected disabled value="">-- Pilih Tahun --</option>
                                    <option value="2021" <?php echo e(isset($varcost) && $varcost->tahun == '2021' ? 'selected' : ''); ?>>2021</option>
                                    <option value="2022" <?php echo e(isset($varcost) && $varcost->tahun == '2022' ? 'selected' : ''); ?>>2022</option>
                                    <option value="2023" <?php echo e(isset($varcost) && $varcost->tahun == '2023' ? 'selected' : ''); ?>>2023</option>
                                    <option value="2024" <?php echo e(isset($varcost) && $varcost->tahun == '2024' ? 'selected' : ''); ?>>2024</option>
                                </select>
                            </div>
                            <div class="col-6">
                            <label for="siteid">Site ID</label> <!-- 6 karakter -->
                            <input required type="text" class="form-control" id="siteid" name="siteid" maxlength="6" value="<?php echo e(isset($varcost) ? $varcost->siteid : ''); ?>" placeholder="Masukkan Site ID">
                        </div>
                        </div> 
                        <div class="form-group">
                            <label for="sitename">Site Name</label>
                            <input required type="text" class="form-control" id="sitename" name="sitename" value="<?php echo e(isset($varcost) ? $varcost->sitename : ''); ?>" placeholder="Masukkan Site Name">
                        </div> 
                        <div class="form-group row">
                        <div class="col-6">
                            <label for="nop">NOP</label>
                            <select required class="form-control" id="nop" name="nop">
                                <option selected disabled value="">-- Pilih NOP --</option>
                                <option value="Gorontalo" <?php echo e(isset($varcost) && $varcost->nop == 'Gorontalo' ? 'selected' : ''); ?>>Gorontalo</option>
                                <option value="Makassar" <?php echo e(isset($varcost) && $varcost->nop == 'Makassar' ? 'selected' : ''); ?>>Makassar</option>
                                <option value="Palu" <?php echo e(isset($varcost) && $varcost->nop == 'Palu' ? 'selected' : ''); ?>>Palu</option>
                                <option value="Kendari" <?php echo e(isset($varcost) && $varcost->nop == 'Kendari' ? 'selected' : ''); ?>>Kendari</option>
                                <option value="Pare-Pare" <?php echo e(isset($varcost) && $varcost->nop == 'Pare-Pare' ? 'selected' : ''); ?>>Pare-Pare</option>
                                <option value="Manado" <?php echo e(isset($varcost) && $varcost->nop == 'Manado' ? 'selected' : ''); ?>>Manado</option>
                                <option value="Ternate" <?php echo e(isset($varcost) && $varcost->nop == 'Ternate' ? 'selected' : ''); ?>>Ternate</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="cluster">Cluster</label>
                            <select required class="form-control" id="cluster" name="cluster">
                                <option selected disabled value="">-- Pilih Cluster --</option>
                                <option value="Gorontalo" <?php echo e(isset($varcost) && $varcost->cluster == 'Gorontalo' ? 'selected' : ''); ?>>Gorontalo</option>
                                <option value="Makassar" <?php echo e(isset($varcost) && $varcost->cluster == 'Makassar' ? 'selected' : ''); ?>>Makassar</option>
                                <option value="Gowa" <?php echo e(isset($varcost) && $varcost->cluster == 'Gowa' ? 'selected' : ''); ?>>Gowa</option>
                                <option value="Bone" <?php echo e(isset($varcost) && $varcost->cluster == 'Bone' ? 'selected' : ''); ?>>Bone</option>
                                <option value="Pangkep" <?php echo e(isset($varcost) && $varcost->cluster == 'Pangkep' ? 'selected' : ''); ?>>Pangkep</option>
                                <option value="Palu" <?php echo e(isset($varcost) && $varcost->cluster == 'Palu' ? 'selected' : ''); ?>>Palu</option>
                                <option value="Toli-Toli" <?php echo e(isset($varcost) && $varcost->cluster == 'Toli-Toli' ? 'selected' : ''); ?>>Toli-Toli</option>
                                <option value="Poso" <?php echo e(isset($varcost) && $varcost->cluster == 'Poso' ? 'selected' : ''); ?>>Poso</option>
                                <option value="Luwuk" <?php echo e(isset($varcost) && $varcost->cluster == 'Luwuk' ? 'selected' : ''); ?>>Luwuk</option>
                                <option value="Kendari" <?php echo e(isset($varcost) && $varcost->cluster == 'Kendari' ? 'selected' : ''); ?>>Kendari</option>
                                <option value="Bau-Bau" <?php echo e(isset($varcost) && $varcost->cluster == 'Bau-Bau' ? 'selected' : ''); ?>>Bau-Bau</option>
                                <option value="Kolaka" <?php echo e(isset($varcost) && $varcost->cluster == 'Kolaka' ? 'selected' : ''); ?>>Kolaka</option>
                                <option value="Pare-Pare" <?php echo e(isset($varcost) && $varcost->cluster == 'Pare-Pare' ? 'selected' : ''); ?>>Pare-Pare</option>
                                <option value="Mamuju" <?php echo e(isset($varcost) && $varcost->cluster == 'Mamuju' ? 'selected' : ''); ?>>Mamuju</option>
                                <option value="Palopo" <?php echo e(isset($varcost) && $varcost->cluster == 'Palopo' ? 'selected' : ''); ?>>Palopo</option>
                                <option value="Manado" <?php echo e(isset($varcost) && $varcost->cluster == 'Manado' ? 'selected' : ''); ?>>Manado</option>
                                <option value="Kotamobagu" <?php echo e(isset($varcost) && $varcost->cluster == 'Kotamobagu' ? 'selected' : ''); ?>>Kotamobagu</option>
                                <option value="Bitung Kepulauan" <?php echo e(isset($varcost) && $varcost->cluster == 'Bitung Kepulauan' ? 'selected' : ''); ?>>Bitung Kepulauan</option>
                                <option value="Ternate" <?php echo e(isset($varcost) && $varcost->cluster == 'Ternate' ? 'selected' : ''); ?>>Ternate</option>
                            </select>
                        </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="kodesl">Kode SL</label>
                                <input required type="text" class="form-control" id="kodesl" name="kodesl" value="<?php echo e(isset($varcost) ? $varcost->kodesl : ''); ?>" placeholder="Masukkan Kode SL">
                            </div>
                        <div class="col-6">
                            <label for="tanggalpelaksanaan">Tanggal Pelaksanaan</label>
                            <input required type="date" class="form-control" id="tanggalpelaksanaan" name="tanggalpelaksanaan" value="<?php echo e(isset($varcost) ? $varcost->tanggalpelaksanaan : ''); ?>" placeholder="DD-MM-YYYY" onclick="this.showPicker();">
                        </div>
                        </div> <!-- DD/MM/YY -->
                        <div class="form-group">
                            <label for="aktivity">Aktivity</label>
                            <input required type="text" class="form-control" id="aktivity" name="aktivity" value="<?php echo e(isset($varcost) ? $varcost->aktivity : ''); ?>" placeholder="Masukkan Aktivity">
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="po">PO</label>
                                <select required class="form-control" id="po" name="po">
                                    <option selected disabled value="">-- Pilih PO --</option>
                                    <option value="Release" <?php echo e((isset($varcost) && $varcost->po == 'Release') ? 'selected' : ''); ?>>Release</option>
                                    <option value="Not Release" <?php echo e((isset($varcost) && $varcost->po == 'Not Release') ? 'selected' : ''); ?>>Not Release</option>
                                </select>                                
                            </div>
                        <div class="col-6">
                            <label for="qty">Qty</label>
                            <input required type="number" class="form-control" id="qty" name="qty" value="<?php echo e(isset($varcost) ? $varcost->qty : ''); ?>" placeholder="Masukkan Qty">
                        </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="hargasatuan">Harga Satuan</label><!-- Rp. -->
                            <input required type="number" class="form-control" id="hargasatuan" name="hargasatuan" value="<?php echo e(isset($varcost) ? $varcost->hargasatuan : ''); ?>" placeholder="Masukkan Harga Satuan">
                        </div>
                        <div class="col-6">
                            <label for="fee">Fee</label> <!-- % -->
                            <input required type="number" class="form-control" id="fee" name="fee" value="<?php echo e(isset($varcost) ? $varcost->fee : ''); ?>" placeholder="Masukkan Fee">
                        </div>
                        </div>
                        <?php if(auth()->user()->level == 'Triple-E' || auth()->user()->level == 'RTS'): ?>
                        <div class="form-group row"> <!-- RTS -->
                            <div class="col-6">
                                <label for="statusticket">Status Ticket</label>
                                <select class="form-control" id="statusticket" name="statusticket">
                                    <option selected disabled value="">-- Pilih Status Ticket --</option>
                                    <option value="In Progress" <?php echo e(isset($varcost) && $varcost->statusticket == 'In Progress' ? 'selected' : ''); ?>>In Progress</option>
                                    <option value="Draft" <?php echo e(isset($varcost) && $varcost->statusticket == 'Draft' ? 'selected' : ''); ?>>Draft</option>
                                    <option value="Proposed" <?php echo e(isset($varcost) && $varcost->statusticket == 'Proposed' ? 'selected' : ''); ?>>Proposed</option>
                                    <option value="Ready for FMS" <?php echo e(isset($varcost) && $varcost->statusticket == 'Ready for FMS' ? 'selected' : ''); ?>>Ready for FMS</option>
                                    <option value="Rejected" <?php echo e(isset($varcost) && $varcost->statusticket == 'Rejected' ? 'selected' : ''); ?>>Rejected</option>
                                    <option value="Waiting Approval NOP MGR" <?php echo e(isset($varcost) && $varcost->statusticket == 'Waiting Approval NOP MGR' ? 'selected' : ''); ?>>Waiting Approval NOP MGR</option>
                                    <option value="Waiting Approval NOS" <?php echo e(isset($varcost) && $varcost->statusticket == 'Waiting Approval NOS' ? 'selected' : ''); ?>>Waiting Approval NOS</option>
                                    <option value="Waiting Approval NOS MGR" <?php echo e(isset($varcost) && $varcost->statusticket == 'Waiting Approval NOS MGR' ? 'selected' : ''); ?>>Waiting Approval NOS MGR</option>
                                    <option value="Waiting for Revision" <?php echo e(isset($varcost) && $varcost->statusticket == 'Waiting for Revision' ? 'selected' : ''); ?>>Waiting for Revision</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="tiketfiola">Tiket SWFM</label> <!--21 karakter -->
                                <input type="text" class="form-control" id="tiketfiola" name="tiketfiola" maxlength="21" value="<?php echo e(isset($varcost) ? $varcost->tiketfiola : ''); ?>" placeholder="Masukkan tiket SWFM">
                            </div>
                        </div>         
                        <?php endif; ?>
                        <div class="form-group row">
                            <div class="col-6">
                            <label for="statuspekerjaan">Status Pekerjaan</label>
                            <select required class="form-control" id="statuspekerjaan" name="statuspekerjaan">
                                <option selected disabled value="">-- Pilih Status Pekerjaan --</option>
                                <option value="Not Yet" <?php echo e(isset($varcost) && $varcost->statuspekerjaan == 'Not Yet' ? 'selected' : ''); ?>>Not Yet</option>
                                <option value="Done" <?php echo e(isset($varcost) && $varcost->statuspekerjaan == 'Done' ? 'selected' : ''); ?>>Done</option>
                                <option value="Propose Budget" <?php echo e(isset($varcost) && $varcost->statuspekerjaan == 'Propose Budget' ? 'selected' : ''); ?>>Propose Budget</option>
                                <option value="Progress" <?php echo e(isset($varcost) && $varcost->statuspekerjaan == 'Progress' ? 'selected' : ''); ?>>Progress</option>
                            </select>                                
                            </div>
                        <div class="col-6">
                            <label for="statuspenagihan">Status Penagihan</label>
                            <select required class="form-control" id="statuspenagihan" name="statuspenagihan">
                                <option selected disabled value="">-- Pilih Status Penagihan --</option>
                                <option value="Not Yet" <?php echo e(isset($varcost) && $varcost->statuspenagihan == 'Not Yet' ? 'selected' : ''); ?>>Not Yet</option>
                                <option value="Done" <?php echo e(isset($varcost) && $varcost->statuspenagihan == 'Done' ? 'selected' : ''); ?>>Done</option>
                                <option value="Progress Reconcile" <?php echo e(isset($varcost) && $varcost->statuspenagihan == 'Progress Reconcile' ? 'selected' : ''); ?>>Progress Reconcile</option>
                            </select>                            
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        document.getElementById('tanggalpelaksanaan').addEventListener('focus', function() {
        this.showPicker();
    });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\bapp\resources\views/varcost/form.blade.php ENDPATH**/ ?>