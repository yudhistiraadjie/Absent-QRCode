<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Absen</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css')?>">
    <style>
        body{
            background-image: url(<?= base_url('assets/img/bg.jpg') ?>);
            width: auto;
        }
        #jam{
            padding: 20px;
            font-size: 70pt;
            color: white;
            font-weight: bold;
            -webkit-text-stroke-width: 2px;
            -webkit-text-stroke-color: black;
        }
        #tgl{
            font-size: 25pt;
            padding-left: 20px;
            margin-top: -30px;
            font-weight: 500;
        }
        .logo{
            min-height: 100%;
            width: 50%;
            padding: 10px;
            margin: 20px;
        }
        .title{
            font-size: 35pt;
            font-weight: bold;
            color: white;
            margin-top: -35px;
            margin-left: 20%;
            margin-right: 20%;
            -webkit-text-stroke-width: 1.5px;
            -webkit-text-stroke-color: black;
        }
        @media (min-width:100px) and (max-width:1080px){
            body{
                background-image: url(<?= base_url('assets/img/bg.jpg') ?>);
                width: auto;
            }
            #jam{
                padding: 20px;
                font-size: 30pt;
                color: white;
                margin-left: 5%;
                margin-top: 8%;
                font-weight: bold;
                -webkit-text-stroke-width: 1px;
                -webkit-text-stroke-color: black;
            }
            #tgl{
                font-size: 10pt;
                padding-left: 20px;
                margin-top: -30px;
                font-weight: 500;
                margin-left: 5%;
            }
            .logo{
                min-height: 100%;
                width: 100%;
                padding: 10px;
                margin: 20px;
                margin-left: -10px;
            }
            .title{
                font-size: 25pt;
                font-weight: bold;
                color: white;
                margin-top: -20px;
                margin-left: 20%;
                -webkit-text-stroke-width: 1px;
                -webkit-text-stroke-color: black;
            }
            #preview{
                width: 100%;
                height: 50%;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-8">
                <div class="jam" id="jam">
                    12:00:00
                </div>
                <div class="tgl" id="tgl">
                    15 November 2019
                </div>
            </div>
            <div class="col-4">
                <div class="row">
                    <div>
                        <img  class="logo" src="<?= base_url('assets/img/logo.jpg')?>"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <div class="col-mx">
                    <center>
                    <div class="title">
                        SCAN DISINI
                    </div>
                    <div>
                        <table>
                            <tr>
                                <td><video id="preview"></video></td>
                            </tr>
                        </table>
                    </center>
                </div>
            </div>
        </div>
    </div>
 
    <script src="<?= base_url('assets/js/jquery.js') ?>"></script>
    <script src="<?= base_url('assets/js/popper.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.js') ?>"></script>
    <script type="text/javascript">
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview'),
      mirror : false });
      scanner.addListener('scan', function (content) {
        pindah(content)
      });
      
      function pindah(url){
          window.location.replace('<?= base_url('absen/absenKeluar/')?>' + url);
      }
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
         var selectedCam = cameras[0];
            $.each(cameras, (i, c) => {
                if (c.name.indexOf('back') != -1) {
                    selectedCam = c;
                    return false;
                }
            });
             scanner.start(selectedCam);
                } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });
    </script>
    <script>
        function startTime() {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('jam').innerHTML = h + ":" + m + ":" + s;
            var t = setTimeout(startTime, 500);
        }
        function checkTime(i) {
            if (i < 10) {i = "0" + i};
            return i;
        }

        var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];

        var date = new Date();

        var day = date.getDate();

        var month = date.getMonth();

        var thisDay = date.getDay(),

            thisDay = myDays[thisDay];

        var yy = date.getYear();

        var year = (yy < 1000) ? yy + 1900 : yy;

        document.getElementById('tgl').innerHTML = thisDay + ', ' + day + ' ' + months[month] + ' ' + year;
        
        startTime();
    </script>
</body>
</html>