<!DOCTYPE html>
<html>
<head>
	<title>PENGAMBILAN SALINAN PUTUSAN</title>
</head>
<body>

	<h2>PENGADILAN NEGERI TANJUNG REDEB</h2>
	<h3>Data Perkara</h3>

	<!--<a href="/pegawai/tambah"> + Tambah Pegawai Baru</a>

	<br/>
	<br/>-->

	<p>Cari Data Perkara :</p>
	<form action="/perkara/cari" method="GET">
		<input type="text" name="cari" placeholder="Cari Perkara .." value="<?php echo e(old('cari')); ?>">
		<input type="text" name="email" placeholder="Email.." value="<?php echo e(old('email')); ?>">
		<input type="submit" value="CARI">
	</form>
	</br>

	<table border="1">
		<tr>
			<th>Nomor Perkara</th>
			<th>Jenis Perkara</th>
			<th>Pihak 1</th>
			<th>Pihak 2</th>
		</tr>
		<?php $__currentLoopData = $perkara; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<tr>
			<td><?php echo e($p->nomor_perkara); ?></td>
            <td><?php echo e($p->jenis_perkara_nama); ?></td>
            <td><?php echo e($p->pihak1_text); ?></td>
            <td><?php echo e($p->para_pihak); ?></td>
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</table>

	Halaman : <?php echo e($perkara->currentPage()); ?> <br/>
	Jumlah Data : <?php echo e($perkara->total()); ?> <br/>
	Data Per Halaman : <?php echo e($perkara->perPage()); ?> <br/>
 
	<a href="/perkara">HOME</a>
	<?php echo e($perkara->links()); ?>



</body>
</html><?php /**PATH C:\xampp\htdocs\example-app\resources\views/index2.blade.php ENDPATH**/ ?>