<?php

    header('Content-Type:text/html;Charset=utf-8;');
    include "RSA.php";
    echo '<pre>';
    
    $private_key = '-----BEGIN RSA PRIVATE KEY-----
MIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQClX+utrlTMUETLDvs9L9lSbez7tj3t63YdNwFa5pROk1/MAiZsHNlPDj4iByE7n0sAxVVcsJRHFVw0Ts/hDJ0YiJt6Nuz39xNCwsAQYWM6Kosdg+33CKeVqS+z7GMKsSzrMcN3ljAyeTNWUUofItmLraZDsKaF2F8ZqHYgMtbq6Xpw2T6ugIWB5K9+Ot9XJi8Y9dVYTytR5TwE7HrQzija/gUCK7sC2Du5KsNmthmeGPMFvGyGb5AKEge7wa6vEEpB4hQClDx9wbKUxjAslOhoeyrtR6mKSIVWYwxIChGcbraSFloFf/4k9Xj/PKbNpBwWi52a/DO78vPoYYhUPtnPAgMBAAECggEAbBtKW91svatzbTK79oHDFWma0+mMjm2wZuTAVAYLyVn588ksCNzLCi0LXP9AMFOvmi9l4BPmupkyD1e9+SZfw9v5l2k0e9zekHPzTkH7tdh93KuT8juMIf/ZmUrca+7qqE19tD1QAI7OiozVYYlMoUzBNdrS4QhTEtjXb7EMYb92IUIHDv+HPbJLSUxCMlQcPG746Ro9Eb2g8sIxLVD2Vn6g7KL2vHjHZLjjXLeHaRsKLPOlJKYtQUclJhWb8rgFb+WqoPUsemOPPd72hwgqcM6Ae5Jh1RBnFmoFTiYjzCE84SoVaIfW+LpskpkApBWrwf7wGbBHxMJKJVad4gbIcQKBgQDSTbVfJLySmArwT9cctHe6bgKnNwQHaBUFUq2gxed8EGipGegqpROskAMPrUDmt40cicu3iN9YpIcidrgaK16tTGvjJkpLLRX6Ft5ZwthPOKAC9RpgF0QuVJ8E3tJRJQ1+LWIVaNA2aLRDTpP1U2e1aaKAO3vKIGMQ3DFrRJB2fQKBgQDJTwLKjuaa40rVCrUBZeW8t2hQlYJRBy84F5ssOEcb1523VgJ1kFW9S08dlnjkEZc1GXEtsVUq6UZazKCv3jjTFbwESrpqc7LYec4kCLop3tv5GP0m/HmEdpQ9MGH2cmbqMkDzUYUhZkWNVPA8YEz3SH69QqBAwNk2T8ohGMinOwKBgQCCfBK3+NxD/LB00KUAu3y6IL3msH0Ad3Tre5QdeA2b7bZyjY9+vjQJ0sUDehUV0fdtKJZMx1EE9/icypqKKjSxRASAyOY55LyJEp1dhkaeSN0HWLrHukfkkz6jT/mgvWO00UXVUNY3nBmU1XF6OwjTB7r64214SUYOVQEYtE8KJQKBgQCre43CJPbWDDaLwmIsPbP1DTtkIefvxDH6E0nQ4mPYmNS1/yN7KCeRZ5yOdMaoaT+oMPMTXFNTiYGwCU38Yk1/qq0N7uZblhFMjH4IfhKvZjN2P04urrWJHEXs1dEtUYjPiV2Ap/nDWM54tVkr5VDK+UtVR3MhleWyeUeS5/zNTwKBgD3NMaYMF/+D8h5cFOgCrtnRYwipZJU9X2i2nPNRMKkJDd5IOdZTUWs8hU19cFs0EOB+jt8o3IwRGuhO7zRJKZ0dZFSl9Q/8oAzFe7weWOxWwuGw30XGQ0j2vOtWawdJH4JySOm1VdiqOkMdYv0DXaEF19VJzuOIV5fmpH62giDI
-----END RSA PRIVATE KEY-----';
 
$public_key = '-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEApV/rra5UzFBEyw77PS/ZUm3s+7Y97et2HTcBWuaUTpNfzAImbBzZTw4+IgchO59LAMVVXLCURxVcNE7P4QydGIibejbs9/cTQsLAEGFjOiqLHYPt9winlakvs+xjCrEs6zHDd5YwMnkzVlFKHyLZi62mQ7CmhdhfGah2IDLW6ul6cNk+roCFgeSvfjrfVyYvGPXVWE8rUeU8BOx60M4o2v4FAiu7Atg7uSrDZrYZnhjzBbxshm+QChIHu8GurxBKQeIUApQ8fcGylMYwLJToaHsq7UepikiFVmMMSAoRnG62khZaBX/+JPV4/zymzaQcFoudmvwzu/Lz6GGIVD7ZzwIDAQAB
-----END PUBLIC KEY-----';

    $pubfile = '.\publicKey.pem';
    $prifile = '.\privateKey.pem';
    // $rsa = new RSA($pubfile, $prifile);
    $rsa = new RSA();
    $rsa->setPublicKey($public_key);
    $rsa->setPrivateKey($private_key);


    // var_dump($rsa->pubKey);

    $rst = array(
        'ret' => 200,
        'code' => 1,
        'data' => array(1, 2, 3, 4, 5, 6),
        'msg' => "成功success",
    );
    $ex = json_encode($rst);
    //加密
    $ret_e = $rsa->encrypt($ex);
    //解密
    $ret_d = $rsa->decrypt($ret_e);
    echo '<pre>';
    echo "原始值:".$ex."\n";
    echo "加密后:".$ret_e."\n";
    echo "解密后:".$ret_d."\n";
    
    //和支付宝同步,sha256加密
    $a = 'a=123';
    echo "签名:".$a."\n";
    //签名
    $x = $rsa->sign($a);
    //验证
    $y = $rsa->verify($a, $x);
    echo "签名结果:".$x."\n";
    echo "签名验证结果:".$y."\n";
    var_dump($y);


