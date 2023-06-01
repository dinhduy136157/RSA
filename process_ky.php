<?php
//--------Lấy nội dung văn bản ký---------------//

$van_ban_ky = $_POST['vanBanKy'];

//---------Lấy ra nội dung của file----------//

$file_tmp_name = $_FILES["inputField"]["tmp_name"];

$fptr = fopen("$file_tmp_name", "r");
$content = fread($fptr, filesize("$file_tmp_name"));
fclose($fptr);

//-----------------Ký-------------------//
$keyBits = 512;

    $config = [
        // Config OpenSSL dari laragon
        'config' => 'E:\laragon\www\RSA\openssl.cnf',

        // Ubah Default Config
        'default_md' => 'sha512',
        'private_key_bits' => intval($keyBits),
        // 'private_key_type' => intval($keyType),
    ];

    // keypair
    $keypair = openssl_pkey_new($config);

    // Private key
    openssl_pkey_export($keypair, $privKey, NULL, $config);

    // Public key
    $publickey = openssl_pkey_get_details($keypair);
    $pubKey = $publickey["key"];
    if($van_ban_ky == null){
        header("location:index.php?error=Vui lòng điền văn bản ký");
    }else{
        $message = $van_ban_ky;
    }
    $signature;
    $result = openssl_sign($message, $signature, $privKey);
    $chu_ky1 = bin2hex($signature);



header("location:index.php?vanBanKy=$van_ban_ky&fileName=$content&chuKy1=$chu_ky1");