<?php
// session_start();

//--------Lấy nội dung văn bản ký---------------//

$van_ban_ky = $_POST['vanBanKy'];
$p = $_POST['p'];
$q = $_POST['q'];
$b = $_POST['b'];
$explode_vanBanKy = explode(' ', $van_ban_ky);

//---------Lấy ra nội dung của file----------//

$file_tmp_name = $_FILES["inputField"]["tmp_name"];

$fptr = fopen("$file_tmp_name", "r");
$content = fread($fptr, filesize("$file_tmp_name"));
fclose($fptr);

//-----------------FUNCTION-------------------//
function n($p, $q){
    return $p*$q;
}
function omegaN($p, $q){
    return ($p-1)*($q-1);
}
function euclid($a, $m){
    $m0 = $m;
    $y = 0; $x = 1;
    if($m == 1)
        return false;
    while($a > 1){
        $q = intval($a/$m);
        $t = $m;
        $m = intval($a % $m);
        $a = $t;
        $t = $y;
        $y = $x - $q * $y;
        $x = $t;
    }
    if($x<0){
        $x += $m0;
    }
    return $x;
}
function binhPhuongVaNhan($explode_vanBanKy, $a, $n){
    if($a == 0)
    return true;
    if($a == 1)
        return intval($explode_vanBanKy % $n);
    $t = binhPhuongVaNhan($explode_vanBanKy, intval($a/2), $n);
    $t = intval(($t*$t) % $n);
    if(intval($a) % 2 ==0)
        return $t;
    else
        return intval((intval($explode_vanBanKy % $n) * $t) % $n);
}

//-------------------------PROCESS hàm ký----------------//
$n = n($p, $q);
$omegaN = omegaN($p, $q);
$a = euclid(3, 8);
//-----ký---------//
$hamKy = array_map(function ($explode_vanBanKy) use ($a, $n){
    if($a == 0)
    return true;
    if($a == 1)
        return intval($explode_vanBanKy % $n);
    $t = binhPhuongVaNhan($explode_vanBanKy, intval($a/2), $n);
    $t = intval(($t*$t) % $n);
    if(intval($a) % 2 ==0)
        return $t;
    else
        return intval((intval($explode_vanBanKy % $n) * $t) % $n);
}, $explode_vanBanKy);
foreach($hamKy as $value)
{
    echo $value;
}
;

// $_SESSION['hamKy'] = $hamKy ;
$string_hamKy = implode(" ", $hamKy);

header("location:index.php?p=$p&q=$q&b=$b&vanBanKy=$van_ban_ky&fileName=$content&chuKy1=$string_hamKy");
