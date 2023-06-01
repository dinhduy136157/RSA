<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

    <title>Chữ ký RSA</title>
</head>
<body>
    <?php
    
    ?>
    <div class="container">
        <div class="row">
            <div class="col-6">
                 <p class="title">
                    PHÁT SINH CHỮ KÝ
                </p>
                <form method="post" action="process_ky.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-2 div-sidebar">Văn bản ký: </div>
                        <div class="col-8">
                            <textarea name="vanBanKy" id="vanBanKy" cols="35" rows="3" ><?php
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
                            <textarea name="chuKy" id="" cols="35" rows="3"><?php 
                                if (isset($_GET['error'])){
                                    $error = $_GET['error'];
                                    echo $error;
                                }
                                if(isset($_GET['chuKy1'])){
                                    $chu_ky1 = $_GET['chuKy1'];
                                    echo $chu_ky1;
                                } ?></textarea>
                            <button class="btn btn-chuyen" name="chuyen">Chuyển</button>
                            <button class="btn btn-luu" name="luu">Lưu</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-6">
                <p class="title">
                    KIỂM TRA CHỮ KÝ
                </p>
                <form action="/process.php" method="post">
                    <div class="row">
                        <div class="col-2 div-sidebar">Văn bản ký: </div>
                        <div class="col-9">
                            <textarea name="" id="" cols="35" rows="3"></textarea>
                            <input type="file" id="inputField" style="display:none">
                            <label for="inputField" class="btn btn-file">File văn bản</label>
                            <br>
                        </div>
                        <div class="col-2 div-sidebar" style="margin-top: 50px;">Chữ ký: </div>
                        <div class="col-9" style="margin-top: 50px;">
                            <textarea name="" id="" cols="35" rows="3"></textarea>
                            <input type="file" id="inputField" style="display:none">
                            <label for="inputField" class="btn btn-file">File chữ ký</label>
                            <br>
                            <button class="btn btn-ktck">Kiểm tra chữ ký</button>

                        </div>
                        
                    </div>
                    
                </form>
                <div class="row" style="margin-top: 50px">
                        <div class="col-2 div-sidebar">Thông báo: </div>
                        <div class="col-10" >
                            <textarea name="" id="" cols="35" rows="3"></textarea>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    
</body>
</html>