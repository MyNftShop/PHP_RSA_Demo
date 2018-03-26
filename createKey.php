<?php

$config = array(
    "digest_alg" => "sha256",
    "private_key_bits" => 1024,
    "private_key_type" => OPENSSL_KEYTYPE_RSA,
    "config" => "F:/workspace/xampp7.2.2/php/extras/openssl/openssl.cnf"
);
    
// Create the private and public key
$res = openssl_pkey_new($config);

echo "<pre>";
var_dump($res);

// Get public key
$pubkey=openssl_pkey_get_details($res);
$pubkey=$pubkey["key"];

echo "public_key:";
var_dump($pubkey);

// Extract the private key from $res to $privKey
openssl_pkey_export($res, $privKey,null,$config);

echo "private_key:";
var_dump($privKey);

// Extract the public key from $res to $pubKey
$pubKey = openssl_pkey_get_details($res);
$pubKey = $pubKey["key"];

$data = 'plaintext data goes here';

// Encrypt the data to $encrypted using the public key
openssl_public_encrypt($data, $encrypted, $pubKey);

echo "\n", base64_encode($encrypted);

// Decrypt the data using the private key and store the results in $decrypted
openssl_private_decrypt($encrypted, $decrypted, $privKey);

echo "\n", $decrypted;
