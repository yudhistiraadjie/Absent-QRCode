<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Data Pegawai</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css')?>">
    <style>
        .konten {
            float: left;
            width: 70%;
        }
        .bawah{
            margin-bottom: 80px;
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
        .logo{
            width:20%;
            padding-bottom:25px;
            padding-top:25px;
            margin-top: 80px;
        }
        .nama{
            min-width: 100px;
            padding: 10px 0px 20px 5px;
        }
        body{
            background-image: url(<?= base_url('assets/img/bg.jpg') ?>);
            width: auto;
            height: auto;
            background-size: cover;
            background-repeat: no-repeat;
        }
        @media (min-width:100px) and (max-width:800px){
            .nama{
                min-width: 70px;
            }
            .logo{
              width: 35%;
            }
        }
	}
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
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
              <a class="nav-link" href="<?= base_url('pegawai')?>">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">Cek Absensi</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <a class="btn btn-info btn-outline-light my-2 my-sm-0" href="<?= base_url('Login_controller/logout') ?>">Logout</a>
          </form>
        </div>
      </nav>
    </div>
    <!-- Header end -->
    
    <div class="container bawah">
        <div class="d-flex justify-content-center">
            <img class="logo" src="<?= base_url('assets/img/logo.jpg')?>"/>
        </div>
        <form action="<?= base_url('pegawai/tampilAbsen/'. $this->session->userdata('nik')) ?>" method="post">
            <div class="form-group">
                <label class="bulan">Bulan</label>
                <select class="form-control" name="bulan" id="exampleFormControlSelect1">
                  <?php foreach ($bulan as $b) { ?>
                    <option value="<?= $b[0] ?>"><?= $b[1] ?></option>    
                  <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label class="tahun">Tahun</label>
                <select class="form-control" name="tahun" id="exampleFormControlSelect1">
                <?php
                    $thn_skr = date('Y');
                    for ($x = $thn_skr; $x >= 2015; $x--) {
                    ?>
                        <option value="<?php echo $x ?>"><?php echo $x ?></option>
                    <?php
                    }
                ?>
                </select>
            </div>
            <div class="">
                <button type="submit" class="btn btn-block btn-primary">Coba Cek</button>
            </div>
        </form>
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