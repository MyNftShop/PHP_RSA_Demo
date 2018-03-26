<?php

$config = array(
    "digest_alg" => "sha256",
    "private_key_bits" => 2048,
    "private_key_type" => OPENSSL_KEYTYPE_RSA,
    //需要指定 openssl.cnf的位置
    "config" => "F:/workspace/xampp7.2.2/php/extras/openssl/openssl.cnf"
);
//创建公钥和私钥
$res=openssl_pkey_new($config); #此处512必须不能包含引号。

//提取私钥,注意这里需要带上config
openssl_pkey_export($res, $private_key,null,$config);

//生成公钥
$public_key=openssl_pkey_get_details($res);
/*Array
(
    [bits] => 512
    [key] => 
    [rsa] => 
    [type] => 0
)*/
$public_key=$public_key["key"];

//显示数据
echo "<pre>";
echo "private_key:\n";
var_dump($private_key);
echo "public_key:\n";
var_dump($public_key);

//要加密的数据
$data = "Web site:http://www.04007.cn需要加密的数据";
echo '等待加密的数据：'.$data."\n";

//私钥加密后的数据
openssl_private_encrypt($data,$encrypted,$private_key);

//加密后的内容通常含有特殊字符，需要base64编码转换下
$encrypted = base64_encode($encrypted);
echo "私钥加密后的数据:".$encrypted."\n";  

//公钥解密  
openssl_public_decrypt(base64_decode($encrypted), $decrypted, $public_key);
echo "公钥解密后的数据:".$decrypted,"\n-------------------------------\n";  
  
//----相反操作。公钥加密 
openssl_public_encrypt($data, $encrypted, $public_key);
$encrypted = base64_encode($encrypted);  
echo "公钥加密后的数据:".$encrypted."\n";
  
openssl_private_decrypt(base64_decode($encrypted), $decrypted, $private_key);//私钥解密  
echo "私钥解密后的数据:".$decrypted."\n";

