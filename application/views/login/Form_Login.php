<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css')?>">
    <style>
            .card{
                background-color: rgba(33, 33, 33, 0.6);
                border-radius: 10px;
                width: 30%;
                margin-top: -10px;
            }
            .logo{
                width:15%;
                padding-bottom:25px;
                padding-top:25px;
            }
            body{
                background-image: url(<?= base_url('assets/img/bg.jpg') ?>);
                background-repeat: no-repeat;
                background-size: cover;
            }
            .font{
                color:white;
                font-family: arial;
            }
            .footer {
                background-color: #232424;
                height: 60px;
                width: 100%;
                margin-top: 20px;
            }
            .font-footer{
                color: white;
                font-family: tahoma;
                font-size: 10pt;
                line-height: 40pt;
            }
            @media (max-width:1080px){
                .card{
                background-color: rgba(33, 33, 33, 0.6);
                border-radius: 10px;
                width: auto;
                
                }
                .logo{
                    width:35%;
                    margin-top: 25px;
                    /*padding-bottom: 50px;*/
                    padding-top:25px;
                }
                body{
                    background-image: url(<?= base_url('assets/img/bg.jpg') ?>);
                    background-size: cover;
                    height: 720px;
                }
                .card{
                    width: auto;
                    margin-bottom: 50px;
                }
            }
        }
    </style>
</head>
<body>
<!-- Logo Pemkot -->
<center>
  <div>
      <img class="logo" src="<?= base_url('assets/img/logo.jpg')?>"/>
  </div>
</center>
<!-- Form Login -->
<div class="d-flex justify-content-center font">
    <div class="card">
    <div class="card-body">
        <h5 class="card-title text-center">SILAHKAN LOGIN</h5>
        <?php 
            if ($this->session->flashdata('err')) {
        ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal Login</strong> <?php echo $this->session->flashdata('err') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div> <?php
            }   
        ?>
        <form action="<?= base_url('Login_controller/validasi') ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Login Gagal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
        </div>
    </div>
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