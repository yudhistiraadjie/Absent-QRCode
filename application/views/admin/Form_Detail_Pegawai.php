<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Detail Pegawai</title>
	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css')?>">
	<style>
		body{
            background-image: url(<?= base_url('assets/img/bg.jpg') ?>);
            background-size: cover;
            background-repeat: no-repeat;
        }
		.logo{
                width:15%;
                padding-top:25px;
        }
		.container{
			width: 50%;
			background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
			margin-top: 15px;
			padding: 20px;
			margin-bottom: 90px;
		}
		.title{
			font-size: 18pt;
			font-weight: bold;
			margin-bottom: 30px;
			font-family: Lucida Console Regular;
		}
		form{
			margin-left: 15%;
		}
		hr{
			margin-top: -20px;
		}
		.footer {
            background-color: #232424;
            
        }
        .font-footer{
            color: white;
            font-family: tahoma;
            font-size: 10pt;
            line-height: 40pt;
        }
	</style>
</head>
<body>
	
	<div class="d-flex justify-content-center">
		<img class="logo" src="<?= base_url('assets/img/logo.jpg')?>"/>
	</div>
	<div class="container">
		<div class="title text-center"> Detail Data Pegawai</div>
		<hr>
		<div>
			<form>
				<div class="form-group row">
					<label class="col-sm-4 col-form-label">NIK</label>
					<div class="col-sm-8">
						<input type="text" readonly class="form-control-plaintext" value=" : <?= $details->nik?>">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Nama</label>
					<div class="col-sm-8">
						<input type="text" readonly class="form-control-plaintext" value=" : <?= $details->nama?>">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Tanggal Lahir</label>
					<div class="col-sm-8">
						<input type="text" readonly class="form-control-plaintext" value=" : <?= $details->ttl?>">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Jenis Kelamin</label>
					<div class="col-sm-8">
						<input type="text" readonly class="form-control-plaintext" value=" : <?= $details->jenis_kelamin?>">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Alamat</label>
					<div class="col-sm-8">
						<input type="text" readonly class="form-control-plaintext" value=" : <?= $details->alamat?>">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 col-form-label">No. Telepon</label>
					<div class="col-sm-8">
						<input type="text" readonly class="form-control-plaintext" value=" : <?= $details->no_tlp?>">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Jabatan</label>
					<div class="col-sm-8">
						<input type="text" readonly class="form-control-plaintext" value=" : <?= $details->jabatan?>">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Username</label>
					<div class="col-sm-8">
						<input type="text" readonly class="form-control-plaintext" value=" : <?= $details->username?>">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Password</label>
					<div class="col-sm-8">
						<input type="text" readonly class="form-control-plaintext" value=" : <?= $details->password?>">
					</div>
				</div>
			</form>
		</div>	
	</div>

	<!-- Footer -->
	<div class="footer fixed-bottom">
		<h5 class="text-center font-footer">Copyright &copy; Halusinasi Grup - 2019</h5>
	</div>
	<!-- Footer End -->

	<script src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/popper.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
</body>
</html>