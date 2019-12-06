<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pegawai</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css')?>">
    <style>
        .konten{
            width: 100%;
        }
        .footer {
            background-color: #232424;
            height: 60px;
            width: 100%;
            margin-top: 45px
        }
        .logo{
            width:15%;
            padding-bottom:25px;
            padding-top:25px;
        }
        body{
            background-image: url(<?= base_url('assets/img/bg.jpg') ?>);
            background: cover;
            width: auto;
            height: auto;
        }
        #btn-pulang{
            margin-left:10pt;
        }
        #btn-masuk{
            margin-right:10pt;
        }
        .card{
            width: 700px;
            background-color: rgba(33, 33, 33, 0.6);
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .font{
            color:white;
            font-family: arial;
        }
        .font-footer{
          color: white;
          font-family: tahoma;
          font-size: 10pt;
          line-height: 40pt;
        }
        @media (min-width:100px) and (max-width:1080px){
            .card{
              width: auto;
              background-color: rgba(33, 33, 33, 0.6);
              border-radius: 10px;
              margin-bottom: 20px;
            }
            .logo{
              width: 35%;
            }
            .footer{
              margin-top: 44px;
            }
            h3{
              font-size: 15pt;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
          <img src="<?= base_url('assets/img/halu-grup.png')?>" width="55">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="<?= base_url('admin')?>">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('pegawai/cekAbsen') ?>">Cek Absensi</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <a class="btn btn-info btn-outline-light my-2 my-sm-0" href="<?= base_url('Login_controller/logout') ?>">Logout</a>
          </form>
        </div>
      </nav>
    </div>
    <!-- Header end -->
    
    <!-- Konten -->
    <div class="konten">
        <center>
        <div>
            <img class="logo" src="<?= base_url('assets/img/logo.jpg')?>"/>
        </div>
        <div class="card text-center">
          <div class="card-body">
          <h3 class="card-title font">SELAMAT DATANG<br> <?= $this->session->userdata('nama'); ?> (Sebagai PEGAWAI)</h3>
          <h5 class="card-text font">Silahkan Absen Disini</h5>
          <br>
          <a href="<?= base_url('absen/absen_masuk')?>" id="btn-masuk" class="btn btn-primary <?= $muncul[0] ?>">Masuk</a>
          <a href="<?= base_url('absen/absen_keluar')?>" id="btn-pulang" class="btn btn-primary <?= $muncul[1] ?>">Pulang</a>
        </div>
        </center>
    </div>
    <!-- Konten end -->
    
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