# tokenerv2
Encrypts & Decrypts data


Example 1 : 
$token = new TokenerV2();
$token->text = $token->random_cities();
$encrypted1 = $token->encrypt();
$decrypted1 = $token->decrypted($encrypted1);

echo '<pre>'.
        'Encrypt : '.$encrypted1 . PHP_EOL .
        'Decrypted : ' . $decrypted1 .PHP_EOL.
    '</pre>';

Example 2 : 
$token->text = "Hello World!";
$encrypted1 = $encrypted1 = $token->encrypt();
$decrypted1 = $token->decrypted($encrypted1);

echo '<pre>'.
        'Encrypt : '.$encrypted1 . PHP_EOL .
        'Decrypted : ' . $decrypted1 .PHP_EOL.
    '</pre>';

Example 3 : 
$encrypted1 = '0XpqKa2m01y8uUInosLbhCEwni0HTGNZ/D/dcpUYlohT1M8P/z3K+pUlQ0RPVF8MXdnLtsx6hruD/qMUw4vvqQ==';
$decrypted1 = $token->decrypted($encrypted1);

echo '<pre>'.
        'Encrypt : '.$encrypted1 . PHP_EOL .
        'Decrypted : ' . $decrypted1 .PHP_EOL.
     '</pre>';
