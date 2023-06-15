<?php
$chu_ky1 = $_POST['chuKy'];
if(isset($chu_ky1)){
    header('Content-Disposition: attachment; filename=chu_ky.txt');
    $file = 'chu_ky.txt';
    $current = "$chu_ky1";
    file_put_contents($file, $current);
    readfile('chu_ky.txt');
    exit;
}
