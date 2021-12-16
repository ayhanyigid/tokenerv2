# Tokener v2
## _Encrypts & Decrypts data_

[![N|Yigid](https://yigid.com/img/profile.jpg)](https://yigid.com)

(PHP 5 >= 5.3.0, PHP 7, PHP 8)
Using : [openssl_encrypt](https://www.php.net/manual/en/function.openssl-encrypt.php) and [openssl_decrypt](https://www.php.net/manual/en/function.openssl-decrypt.php)

```sh
# Example 1:

$token = new TokenerV2();
$token->text = $token->random_cities();
$encrypted1 = $token->encrypt();
$decrypted1 = $token->decrypted($encrypted1);

echo '<pre>'.
        'Encrypt : '.$encrypted1 . PHP_EOL .
        'Decrypted : ' . $decrypted1 .PHP_EOL.
    '</pre>';
```

```sh
# Example 2:

$token->text = "Hello World!";
$encrypted1 = $encrypted1 = $token->encrypt();
$decrypted1 = $token->decrypted($encrypted1);

echo '<pre>'.
        'Encrypt : '.$encrypted1 . PHP_EOL .
        'Decrypted : ' . $decrypted1 .PHP_EOL.
    '</pre>';
```

```sh
# Example 3:

$encrypted1 = '0XpqKa2m01y8uUInosLbhCEwni0HTGNZ/D/dcpUYlohT1M8P/z3K+pUlQ0RPVF8MXdnLtsx6hruD/qMUw4vvqQ==';
$decrypted1 = $token->decrypted($encrypted1);

echo '<pre>'.
        'Encrypt : '.$encrypted1 . PHP_EOL .
        'Decrypted : ' . $decrypted1 .PHP_EOL.
     '</pre>';
```
