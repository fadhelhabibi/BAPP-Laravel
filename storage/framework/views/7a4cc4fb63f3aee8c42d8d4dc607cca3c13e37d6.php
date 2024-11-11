<!DOCTYPE html>
<html>
<head>
    <title>Data Varcost</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 6px; /* Ukuran font lebih kecil untuk seluruh halaman */
        }
        h3 {
            font-size: 10px; /* Ukuran font untuk judul */
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 6px; /* Ukuran font lebih kecil untuk isi tabel */
        }
        th, td {
            padding: 1px; /* Padding yang lebih kecil */
            text-align: center;
            border: 1px solid #000;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h3>Data Varcost</h3>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
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
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>
</html>
<?php /**PATH C:\laragon\www\bapp\resources\views/varcost/pdf.blade.php ENDPATH**/ ?>