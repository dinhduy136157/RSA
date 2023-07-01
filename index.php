
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Chữ ký RSA</title>
</head>
<body>
    <?php
    session_start();
    $hamKy = $_SESSION['hamKy'];
    echo $hamKy;
    ?>
    <div class="container">
        <div class="row">
            <div class="col-6">
                 <p class="title">
                    PHÁT SINH CHỮ KÝ
                </p>
                <form method="post" action="process_ky.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-2">Tạo p, q, b: </div>
                        <div class="col-8">
                            <input type="number" name="p" id="p" value="<?php if(isset($_GET['p'])){
                                    $p = $_GET['p'];
                                    echo $p;} ?>">
                            <input type="number" name="q" id="q" value="<?php if(isset($_GET['q'])){
                                    $q = $_GET['q'];
                                    echo $q;} ?>">
                            <input type="number" name="b" id="b" value="<?php if(isset($_GET['b'])){
                                    $b = $_GET['b'];
                                    echo $b;} ?>">
                            <button class="btn btn-random" onclick="random()">Random</button>

                        </div>
                    </div>
                    <div class="row" style="margin-top: 30px">
                        
                        <div class="col-2 div-sidebar">Văn bản ký: </div>
                        <div class="col-8">
                            <textarea name="vanBanKy" id="vanBanKy" cols="35" rows="5" ><?php
                                if(isset($_GET['vanBanKy'])){
                                    $van_ban_ky = $_GET['vanBanKy'];
                                    echo $van_ban_ky;
                                }if(isset($_GET['fileName'])){
                                    $file_name = $_GET['fileName'];
                                    echo $file_name;
                                } ?></textarea>
                            <input type="file" id="inputField" name="inputField" style="display:none">
                            <label for="inputField" class="btn btn-file">File</label>
                            <br>
                            <button name="submit" class="btn btn-ky">Ký</button>
                        </div>
                        
                    </div>
                </form>
                <form style="margin-top: 50px;" method="post" action="process_chuyen_luu.php">
                    <div class="row">
                        <div class="col-2 div-sidebar">Chữ ký: </div>
                        <div class="col-8">
                            <textarea name="chuKy" id="chuKy" cols="35" rows="5"><?php 
                                if (isset($_GET['error'])){
                                    $error = $_GET['error'];
                                    echo $error;
                                }
                                if(isset($_GET['chuKy1'])){
                                    $chu_ky1 = $_GET['chuKy1'];
                                    echo $chu_ky1;
                                } ?></textarea>
                            <button class="btn btn-luu" name="luu">Lưu</button>
                        </div>
                    </div>
                </form>
                <button class="btn btn-chuyen" name="chuyen" onclick="chuyen()">Chuyển</button>
                <button class="btn btn-refresh" name="refresh" onclick="refresh()">Refresh</button>
            </div>
            <div class="col-6">
                <p class="title">
                    KIỂM TRA CHỮ KÝ
                </p>
                <form action="/">
                    <div class="row">
                        <div class="col-2 div-sidebar">Văn bản ký: </div>
                        <div class="col-9">
                            <textarea name="vanBanKy2" id="vanBanKy2" cols="35" rows="3" ><?php
                                if(isset($_GET['fileName2'])){
                                    $file_name2 = $_GET['fileName2'];
                                    echo $file_name2;
                                } ?></textarea>
                            <input type="file" id="inputField2" style="display:none">
                            <label for="inputField2" class="btn btn-file">File văn bản</label>
                            <br>
                        </div>
                        <div class="col-2 div-sidebar" style="margin-top: 50px;">Chữ ký: </div>
                        <div class="col-9" style="margin-top: 50px;">
                            <textarea name="chuKy2" id="chuKy2" cols="35" rows="3"></textarea>
                            <input type="file" id="inputField" style="display:none">
                            <label for="inputField" class="btn btn-file">File chữ ký</label>
                            <br>
                        </div> 
                    </div>
                </form>
                <button class="btn btn-ktck" onclick="check()">Kiểm tra chữ ký</button>

                <div class="row" style="margin-top: 50px">
                        <div class="col-2 div-sidebar">Thông báo: </div>
                        <div class="col-10" >
                            <textarea name="thongBao" id="thongBao" cols="35" rows="3"></textarea>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <script>
        function chuyen()
        {
            var vanBanKy = document.getElementById('vanBanKy').innerHTML;
            var chuKy = document.getElementById('chuKy').innerHTML;
            document.getElementById('vanBanKy2').innerHTML = vanBanKy;
            document.getElementById('chuKy2').innerHTML = chuKy;
        }
        function refresh()
        {
            window.location.href = "http://rsa.test:8080/index.php";
        }
        //----HANDLE KIEM TRA CHU KY----//
        function check(){
        var chuKy = document.getElementById('chuKy').value;
        var chuKy2 = document.getElementById('chuKy2').value;
        if (chuKy === chuKy2){
            document.getElementById('thongBao').innerHTML = 'Chữ ký đúng';
        }
        else{
            document.getElementById('thongBao').innerHTML = 'Chữ ký sai';
        }
        }
        //GCD
        function gcd(a, b){
            if(a == 0)
                return b;
            if(b == 0)
                return a;
            if(a > b)
                return(a-b, b);
            return (a, b-a);
        }
        function random()
        {
            let p = Math.floor(Math.random() * 200);
            let q = Math.floor(Math.random() * 200);
            let omegaN = (p-1)*(q-1);
            let b=2;
            while(b < omegaN)
            {
                if(gcd(b, omegaN) === 1){
                    break;
                }
                else{
                    b++;
                }
            }
            document.getElementById('p').value = p;
            document.getElementById('q').value = q;
            document.getElementById('b').value = b;
        }
    </script>
    
</body>
</html>