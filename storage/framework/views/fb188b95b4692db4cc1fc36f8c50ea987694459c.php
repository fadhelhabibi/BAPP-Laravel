

<?php $__env->startSection('title','Data Varcost'); ?>

<?php $__env->startSection('content'); ?>
<form method="GET" action="<?php echo e(route('varcost')); ?>">
    <div class="form-group row">
        <div class="col-4">
            <select name="search" id="periode" class="form-control">
                <option value="">Semua Periode</option>
                <?php $__currentLoopData = $periods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $period): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($period); ?>"><?php echo e($period); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                
                <a href="<?php echo e(route('varcost.export.pdf', ['periode' => request('search')])); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-download fa-sm text-white-50"></i> Export PDF
                </a>
            </div>
        </div>  
    </div>
    <div class="card-body">
        <?php if(auth()->user()->level == 'Triple-E' || auth()->user()->level == 'KUT'): ?>
           <a href="<?php echo e(route('varcost.tambah')); ?>" class="btn btn-primary mb-3">Tambah Varcost</a>
        <?php endif; ?>
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
                    <?php ($no = 1); ?>
                    <?php $__currentLoopData = $varcost; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th><?php echo e($no++); ?></th>
                            <td><?php echo e($row->kategori); ?></td>
                            <td><?php echo e($row->periode); ?></td>
                            <td><?php echo e($row->tahun); ?></td>
                            <td><?php echo e($row->siteid); ?></td>
                            <td><?php echo e($row->sitename); ?></td>
                            <td><?php echo e($row->nop); ?></td>
                            <td><?php echo e($row->cluster); ?></td>
                            <td><?php echo e($row->tiketfiola); ?></td>
                            <td><?php echo e($row->tanggalpelaksanaan); ?></td>
                            <td><?php echo e($row->aktivity); ?></td>
                            <td><?php echo e($row->kodesl); ?></td>
                            <td><?php echo e($row->qty); ?></td>
                            <td>Rp.<?php echo e(number_format($row->hargasatuan, 0, ',', '.')); ?></td>
                            <td><?php echo e($row->fee); ?>%</td>
                            <td>Rp.<?php echo e(number_format($row->total_harga, 0, ',', '.')); ?></td>
                            <td><?php echo e($row->statusticket); ?></td>
                            <td><?php echo e($row->po); ?></td>
                            <td><?php echo e($row->statuspekerjaan); ?></td>
                            <td><?php echo e($row->statuspenagihan); ?></td>
                            <td class="justify-content-center">
                                
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                        aria-labelledby="dropdownMenuLink">
                                        <?php if(auth()->user()->level == 'Triple-E' || auth()->user()->level == 'RTS'): ?>
                                        <a class="dropdown-item" href="<?php echo e(route('varcost.edit', $row->id)); ?>">Edit</a>
                                        <?php endif; ?>
                                        <a class="dropdown-item" href="#" 
                                        onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin menghapus data ini?')) { document.getElementById('hapus-form-<?php echo e($row->id); ?>').submit(); }">Hapus</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Detail</a>
                                    </div>
                                </div>

                                <!-- Form untuk hapus data -->
                                <form id="hapus-form-<?php echo e($row->id); ?>" action="<?php echo e(route('varcost.hapus', $row->id)); ?>" method="POST" style="display: none;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?> <!-- Menandakan bahwa ini adalah permintaan DELETE -->
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\bapp\resources\views/varcost/index.blade.php ENDPATH**/ ?>