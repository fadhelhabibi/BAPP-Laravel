

<?php $__env->startSection('title','Edit Profile'); ?>

<?php $__env->startSection('content'); ?>
<form action="<?php echo e(isset($user) ? route('user.tambah.update', $user->id) : route('user.tambah.simpan')); ?>" method="post" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-6 mt-3">
                            <h6 class="m-0 font-weight-bold text-primary"><?php echo e(isset($user) ? 'Edit Profile' : 'Edit Profile'); ?></h6>
                      </div>
                      <div class="col-6 text-right">
                            <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-primary mb-3">Kembali</a>
                      </div>
                    </div>
                </div>
                <div class="card-body">
                    <div> 
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="nama">Nama Lengkap</label>
                                <input required type="text" class="form-control" id="nama" name="nama" value="<?php echo e(isset($user) ? $user->nama : ''); ?>" placeholder="Masukkan Nama Lengkap">
                            </div>
                            <div class="col-6">
                                <label for="email">Email</label>
                                <input required type="text" class="form-control" id="email" name="email" value="<?php echo e(isset($user) ? $user->email : ''); ?>" placeholder="Masukkan Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="level">Level</label>
                                <select required class="form-control" id="level" name="level">
                                    <option selected disabled value="">-- Pilih Level --</option>
                                    <option value="Triple-E" <?php echo e(isset($user) && $user->level == 'Triple-E' ? 'selected' : ''); ?>>Triple-E</option>
                                    <option value="RTS" <?php echo e(isset($user) && $user->level == 'RTS' ? 'selected' : ''); ?>>RTS</option>
                                    <option value="KUT" <?php echo e(isset($user) && $user->level == 'KUT' ? 'selected' : ''); ?>>KUT</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="nohp">Nomor Handphone</label>
                                <input type="text" class="form-control" id="nohp" name="nohp" value="<?php echo e(isset($user) ? $user->nohp : ''); ?>" placeholder="Masukkan Nomor Handphone">
                            </div>
                        </div>
                        <div class="form-group row">
                        <div class="col-6">
                            <label for="fotoprofil">Upload Gambar</label>
                            <input type="file" class="form-control" name="image" id="image" value="<?php echo e(isset($user) ? $user->fotoprofil : ''); ?>">
                        </div>
                        <div class="col-6">
                            <label>Gambar Sebelumnya</label><br>
                            <img src="<?php echo e($user->fotoprofil ? asset($user->fotoprofil) : asset($defaultImage)); ?>" alt="Belum Ada" style="width: 100px; height: 100px;">
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\bapp\resources\views/user/form.blade.php ENDPATH**/ ?>