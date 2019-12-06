<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Data Pegawai</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css')?>">
    <style>
        .kiri {
            height: 200px;
            width: 15%;
            float: left;
        }
        .konten {
            float: left;
            width: 70%;
        }
        .kanan {
            height: 200px;
            width: 15%;
            float: right;
        }
        .bawah{
            margin-bottom: 100px;
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
        .kode{
            min-width: 395px;
        }
        .tanggal{
            min-width: 203px;
        }
        .jam{
            min-width: 203px;
        }
        .logo{
            width:20%;
            padding-bottom:25px;
            padding-top:25px;
            margin-top: 100px;
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
              width: 50%;
            }
            .form-control{
                margin-top: -20px;
            }
            table{
                width: auto;
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
    
    <div class="kiri">
    </div>
    <div class="konten">
        <center>
            <div>
                <img class="logo" src="<?= base_url('assets/img/logo.jpg')?>"/>
            </div>

            <div class="text-left bg-light">
                <table>
                    <tr>
                        <td class="nama">Nama</td>
                        <td class="nama"><?= $nama->nama ?></td>
                    </tr>
                    <tr>
                        <td class="nama">Bulan</td>
                        <td class="nama"><?= $bulan .' '. $tahun ?></td>
                    </tr>
                </table>
            </div>

            <table class="table table-responsive table-bordered bg-light bawah">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="no">No.</th>
                        <th scope="col" class="kode">Kode Absen</th>
                        <th scope="col" class="tanggal">Tanggal</th>
                        <th scope="col" class="jam">Jam Masuk</th>
                        <th scope="col" class="jam">Jam Keluar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach ($tampil_absen as $absen){
                        ?>
                        <tr>
                            <td> <?= $no++ ?>.</td>
                            <td> <?= $absen->id_absen ?> </td>
                            <td> <?= $absen->tgl ?> </td>
                            <td> <?= $absen->jam_masuk ?> </td>
                            <td> <?= $absen->jam_keluar ?> </td>
                        </tr>
                    <?php 
                    }
                    ?>
                </tbody>
            </table>
        </center>
    </div>
    <div class="kanan">
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