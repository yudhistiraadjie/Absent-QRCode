<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="10">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QR Code</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css')?>">
</head>
<style>
        body{
            background-image: url(<?= base_url('assets/img/bg.jpg') ?>);
            background-size: cover;
        }
                
        #jam{
            padding: 20px;
            font-size: 60pt;
            color: white;
            font-weight: bold;
            -webkit-text-stroke-width: 1.5px;
            -webkit-text-stroke-color: black;
        }
        .title{
            font-size: 35pt;
            margin-top: 30px;
            font-weight: bold;
            color: white;
            -webkit-text-stroke-width: 1px;
            -webkit-text-stroke-color: black;
        }
        .code{
            margin-top: -9%;
        }
    </style>

<body onload="setInterval(startTime(), 1000)">
    <div class="text-center">
            <div class="col-mx">
                <div class="title text-center">
                    SCAN DISINI
                </div>
                <div>
                    <table>
                        <tr>
                            <td><video id="preview"></video></td>
                        </tr>
                    </table>
                </div>
                <div id="qrcode" class="code"></div>
                <div id="jam"></div>
            </div>
        </div>
    


    <script src="<?= base_url('assets/js/jquery.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.qrcode.js') ?>"></script>
    <script src="<?= base_url('assets/js/qrcode.js') ?>"></script>
    <script src="<?= base_url('assets/js/popper.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.js') ?>"></script>

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

        startTime();
        $('#qrcode').qrcode({
            text : '<?= $kode ?>'
        });
            
    </script>
</body>
</html>