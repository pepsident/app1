<!DOCTYPE html>
<html>
<head>
	<title>PENGAMBILAN SALINAN PUTUSAN</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>

	<?php

use PhpParser\Node\Stmt\Else_;

$nomorErr = $tanggalErr = $nohpErr = $websiteErr = "";
		$name = $email = $gender = $comment = $website = "";
		$jmambil = $jmambilErr = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST"){
		if (empty($_POST["nomorperkara"])) {
			$nomorErr = "Nomor Perkara harus diisi";
		} else {
			$name = test_input($_POST["nomorperkara"]);
		}

		if (empty($_POST["tanggalpengambilan"])) {
			$tanggalErr = "Tanggal Pengambilan harus diisi";
		} else {
			$email = test_input($_POST["tanggalpengambilan"]);
		}

		if (empty($_POST["nohp"])) {
			$nohpErr = "Nomor HP harus diisi";
		} else {
			$website = test_input($_POST["nohp"]);
		}

		if (empty($_POST["jampengambilan"])) {
			$jmambilErr = "Jam Pengambilan harus diisi";
		}else {
			$jmambil = test_input($_POST["jampengambilan"]);
		}}

		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		  }


	?>
	<style>
		body{
			background-image: url("2A.jpg");
		}
	</style>
</head>
<body>
	<h2>PENGADILAN NEGERI TANJUNG REDEB</h2>
	<h3>Request Salinan Putusan</h3>



	<?php if(count($errors)>0): ?>
		<div class="alert alert-danger">
			<ul>
				<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li><?php echo e($error); ?></li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</ul>
		</div>
	<?php endif; ?>

    <?php if($errors->any()): ?>
        <h4><?php echo e($errors->first()); ?></h4>
    <?php endif; ?>

	<form action="/requestsalinan/cari" method="POST">
		<?php echo e(csrf_field()); ?>

		<div class="well">
		  <div class="col-md-12">
			<div class="row">
				<div class="col-md-6"><label>Cari Nomor Perkara:</label><input type="text" name="cari" placeholder="Cari nomor perkara... (contoh: 1/PDT.G/2013/PN.TJR)" value="<?php echo e(old('cari')); ?>" size="125" class="form-control"></div>
				<div class="col-md-6"><label>Tanggal Pengambilan:</label><input type="date" name="tanggalpengambilan" placeholder="mm/dd/yyyy" value="<?php echo e(old('tanggalpengambilan')); ?>" width="125" size="125" class="form-control"></div>
			</div>
		  </div>

		  <div class="col-md-12">
		  	<div class="row">
		  		<div class="col-md-6"><label>Jam Pengambilan:</label></div>
			</div>
			<div class="row">
		  		<div class="col-md-2">
		  			<div class="input-group">
		  				<span class="input-group-addon"><input type="radio" name="jampengambilan" value="08.00-09.00"></span>
						<input type="text" value="08.00-09.00" class="form-control" disabled>
					</div>
				</div>
				<div class="col-md-2">
		  			<div class="input-group">
		  				<span class="input-group-addon"><input type="radio" name="jampengambilan" value="09.00-10.00"></span>
						<input type="text" value="09.00-10.00" class="form-control" disabled>
					</div>
				</div>
				<div class="col-md-2">
		  			<div class="input-group">
		  				<span class="input-group-addon"><input type="radio" name="jampengambilan" value="10.00-11.00"></span>
						<input type="text" value="10.00-11.00" class="form-control" disabled>
					</div>
				</div>
				<div class="col-md-2">
		  			<div class="input-group">
		  				<span class="input-group-addon"><input type="radio" name="jampengambilan" value="11.00-12.00"></span>
						<input type="text" value="11.00-12.00" class="form-control" disabled>
					</div>
				</div>
				<div class="col-md-2">
		  			<div class="input-group">
		  				<span class="input-group-addon"><input type="radio" name="jampengambilan" value="13.00-14.00"></span>
						<input type="text" value="13.00-14.00" class="form-control" disabled>
					</div>
				</div>
				<div class="col-md-2">
		  			<div class="input-group">
		  				<span class="input-group-addon"><input type="radio" name="jampengambilan" value="14.00-15.00"></span>
						<input type="text" value="14.00-15.00" class="form-control" disabled>
					</div>
				</div>
			</div>
		  </div>

		  <div class="col-md-6">
		  	<label>Pihak Yang Mengambil:</label>
			<div class="input-group">
		  		<span class="input-group-addon"><input type="radio" name="pihakygmengambil" value="1" aria-label="Radio button for following text input"></span>
				<input type="text" name="nama_pengambil1" class="form-control" disabled>
			</div>
			<div class="input-group">
		  		<span class="input-group-addon"><input type="radio" name="pihakygmengambil" value="other" aria-label="Radio button for following text input"></span>
				<input type="text" name="nama_pengambil2" class="form-control">
			</div>
		  </div>
		  <div class="col-md-6">
		  	<label class="control-label">Email:</label>
			<input type="text" name="email" class="form-control" placeholder="Email... (contoh: pengambil@putusan.com)">
		  </div>
		  <div class="row">
		  	<div class="col-md-6"></div>
		  </div>
		  <div class="row">
		  	<div class="col-md-6"></br></div>
		  </div>
		  <div class="row">
		  	<div class="col-md-12">
				<div class="col-md-6">
					<input type="submit" value="CARI">
					<input type="reset" value="CLEAR">
					<input type="button" value="HOME" onclick="location.href='/requestsalinan'">
				</div>
			</div>
		  </div>

		</div>
	</form>
	</br>




	<footer style="text-align: center;">
		  <p>2021 &#169; Pengadilan Negeri Tanjung Redeb</p>
	</footer>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\example-app\resources\views/formrequest.blade.php ENDPATH**/ ?>