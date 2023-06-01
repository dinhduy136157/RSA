<?php
$chu_ky1 = $_POST['chuKy'];
if (isset($_POST['chuyen'])){
    echo $chu_ky1;
}else{
    if(isset($chu_ky1)){
        header('Content-Disposition: attachment; filename=chu_ky.txt');
        header('Content-Length: ' . filesize(3000));
        ob_clean();
        flush();
        readfile('chu_ky.txt');
        exit;

    }

}