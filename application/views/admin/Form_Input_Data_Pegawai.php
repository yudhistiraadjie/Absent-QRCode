<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Tambah Data Pegawai</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css')?>">
    <style>
        .card{
            width:800px;
            background-color: rgba(255, 255, 255, 0.6);
            margin-bottom: 100px;
        }
        .title{
          font-size: 18pt;
          font-weight: bold;
          font-family: Lucida Console Regular;
          padding-top: 20px;
        }
        .logo{
            width:14%;
            padding-bottom:25px;
            padding-top:25px;
            margin-top: 100px;
        }
        body{
            background-image: url(<?= base_url('assets/img/bg.jpg') ?>);
            background-repeat: no-repeat;
            background-size: cover;
        }
        .warna-tulisan{
          color:white;
          font-family: arial;
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
        @media (max-width: 800px){
          .card{
            width: auto;
          }
        }
    </style>
</head>
<body>
<!-- Menu Navigasi -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
          <img src="<?= base_url('assets/img/halu-grup.png')?>" width="55">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('admin')?>">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item  active">
              <a class="nav-link" href="<?= base_url('Admin/cari')?>">Data Pegawai</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Laporan Absensi</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <a class="btn btn-info btn-outline-light my-2 my-sm-0" href="<?= base_url('Login_controller/logout') ?>">Logout</a>
          </form>
        </div>
      </nav>

<!-- Logo Pemkot -->
<center>
<div>
    <img class="logo" src="<?= base_url('assets/img/logo.jpg')?>"/>
</div>

<!-- Form Input Data -->
<form class="card" method="post" action="<?= base_url('admin/inputData')?>">
<div class="title text-center">Silahkan Isikan Data Pegawai Sesuai Form</div>
<hr>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label pl-5">NIK</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" placeholder="NIK" name="nik">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label pl-5">Nama</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" placeholder="Nama" name="nama">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label pl-5">Tanggal Lahir</label>
    <div class="col-sm-8">
      <input type="date" class="form-control" name="tgl">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label pl-5">Jenis Kelamin</label>
    <div class="col-sm-8">
      <select class="form-control" name="jenis_kelamin">
        <option value="Pria">Pria</option>
        <option value="Wanita">Wanita</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label pl-5">Alamat</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" placeholder="Alamat" name="alamat">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label pl-5">No. Telepon</label>
    <div class="col-sm-8">
      <input type="number" class="form-control" placeholder="No. Telepon" name="no_tlp">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label pl-5">Username</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" placeholder="Username" name="username">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label pl-5">Password</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" placeholder="Password" name="password">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label pl-5">Jabatan</label>
    <div class="col-sm-8">
      <select class="form-control" name="kd_jabatan">
        <option value="1">Admin</option>
        <option value="2">Pegawai</option>
      </select>
    </div>
  </div>
  <div class="form-group row ">
    <label class="col-sm-2 col-form-label pl-5"></label>
    <div class="col-sm-8">
      <button type="submit" class="btn btn-block btn-primary">Simpan</button>
    </div>
  </div>
</form>
</center>
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