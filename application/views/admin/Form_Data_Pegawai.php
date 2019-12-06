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
        .nik{
            min-width: 150px;
        }
        .nama{
            min-width: 380px;
        }
        .jabatan{
            min-width: 150px;
        }
        .keterangan{
            min-width: 209px;
        }
        .logo{
            width:20%;
            padding-bottom:25px;
            padding-top:25px;
            margin-top: 100px;
        }
        body{
            background-image: url(<?= base_url('assets/img/bg.jpg') ?>);
            width: auto;
            height: auto;
            background-size: cover;
            background-repeat: no-repeat;
        }
        @media (min-width:100px) and (max-width:800px){
            .logo{
              width: 50%;
            }
            .form-control{
                margin-top: -20px;
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
    </div>
    <!-- Header end -->
    
    <div class="kiri">
    </div>
    <div class="konten">
        <center>
            <div>
                <img class="logo" src="<?= base_url('assets/img/logo.jpg')?>"/>
            </div>

            <form class="form-inline">
                <div class="form-group">
                    <a class="btn btn-success btn-outline-light mb-3" href="<?= base_url('Admin/tambahData') ?>">(+) Tambah Data</a>
                </div>
            </form>
            <table class="table table-responsive table-bordered bg-light bawah">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="no">No.</th>
                        <th scope="col" class="nik">NIK</th>
                        <th scope="col" class="nama">Nama</th>
                        <th scope="col" class="jabatan">Jabatan</th>
                        <th scope="col" class="keterangan">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach ($gawai as $g){
                        ?>
                        <tr>
                            <td> <?= $no++ ?> </td>
                                    <td> <?= $g->nik ?> </td>
                                    <td> <?= $g->nama ?> </td>
                                    <td> <?= $g->jabatan ?> </td>
                                    <td>
                                        <a href="<?= base_url('admin/editData/'.$g->nik)?>" class="btn btn-outline-secondary">Edit</button>
                                        <a href="<?= base_url('admin/detailsData/'.$g->nik)?>" class="btn btn-outline-info" >Details</a>
                                        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter<?= $g->nik ?>">
  Cek Absen
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter<?= $g->nik ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Cek Absen <?= $g->nama ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('admin/cekAbsen/'). $g->nik ?>" method="post">
          <div class="form-group">
            <label for="exampleFormControlInput1">NIK</label>
            <input type="text" name="nik" class="form-control" id="exampleFormControlInput1" value="<?= $g->nik ?>">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Bulan</label>
            <select class="form-control" name="bulan" id="exampleFormControlSelect1">
              <?php foreach ($bulan as $b) { ?>
                <option value="<?= $b[0] ?>"><?= $b[1] ?></option>    
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Bulan</label>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Coba Cek</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
                                </td>
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