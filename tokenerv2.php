<?php

/**
 * Created by ayhanyigid <ayhan@yigid.com>
 * Date: 16.12.2021
 *
 * Encrypts & Decrypts data
 * (PHP 5 >= 5.3.0, PHP 7, PHP 8)
 *
 * Class TokenerV2
 */
class TokenerV2
{
    private $key = 'Turkiye';
    public $text = 'www.yigid.com';
    public $chipper = 'AES-128-CBC';

    /**
     * TokenerV2 constructor.
     * @throws Exception
     */
    public function __construct()
    {
        if (empty($this->key)) {
            throw new Exception("The key is empty");
        }
    }

    /**
     * Encrypts plaintext with given parameters
     * @return string
     * @throws Exception
     */
    public function encrypt(): string
    {
        if (empty($this->chipper)) {
            throw new Exception("The Chipper is empty");
        }

        if (empty($this->text)) {
            throw new Exception("The Text is empty");
        }

        if (empty($this->text)) {
            throw new Exception("The Key is empty");
        }

        $iv = openssl_random_pseudo_bytes(
            openssl_cipher_iv_length($this->chipper)
        );
        $cipher_text_raw = openssl_encrypt(
            $this->text,
            $this->chipper,
            $this->key,
            OPENSSL_RAW_DATA,
            $iv
        );
        $hmac = hash_hmac(
            'sha256',
            $cipher_text_raw,
            $this->key,
            true
        );
        return base64_encode($iv . $hmac . $cipher_text_raw);
    }


    /**
     * Decrypts crypttext with given parameters
     *
     * @param string $encrypted
     * @return string|bool
     * @throws Exception
     */
    public function decrypted(string $encrypted): string|bool
    {
        if (empty($encrypted))
            throw new Exception("The encrypted text is empty");

        if (empty($this->chipper))
            throw new Exception("The Chipper is empty");

        if (empty($this->text))
            throw new Exception("The Text is empty");


        $decode_text = base64_decode($encrypted);
        $iv_len = openssl_cipher_iv_length($this->chipper);
        $iv = substr($decode_text, 0, $iv_len);
        $hmac = substr($decode_text, $iv_len, $sha2len = 32);
        $cipher_text = substr($decode_text, $iv_len + $sha2len);
        $calc_mac = hash_hmac('sha256', $cipher_text, $this->key, true);
        if (hash_equals($hmac, $calc_mac)) {
            return openssl_decrypt($cipher_text, $this->chipper, $this->key, OPENSSL_RAW_DATA, $iv);
        }
        return false;
    }

    /**
     * @return string
     */
    public function random_string(): string
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return str_shuffle($chars);
    }

    /**
     * @return string
     */
    public function random_cities(): string
    {
        $list = array(
            'Adana',
            'Ad??yaman',
            'Afyon',
            'A??r??',
            'Amasya',
            'Ankara',
            'Antalya',
            'Artvin',
            'Ayd??n',
            'Bal??kesir',
            'Bilecik',
            'Bing??l',
            'Bitlis',
            'Bolu',
            'Burdur',
            'Bursa',
            '??anakkale',
            '??ank??r??',
            '??orum',
            'Denizli',
            'Diyarbak??r',
            'Edirne',
            'Elaz????',
            'Erzincan',
            'Erzurum',
            'Eski??ehir',
            'Gaziantep',
            'Giresun',
            'G??m????hane',
            'Hakkari',
            'Hatay',
            'Isparta',
            'Mersin',
            '??stanbul',
            '??zmir',
            'Kars',
            'Kastamonu',
            'Kayseri',
            'K??rklareli',
            'K??r??ehir',
            'Kocaeli',
            'Konya',
            'K??tahya',
            'Malatya',
            'Manisa',
            'Kahramanmara??',
            'Mardin',
            'Mu??la',
            'Mu??',
            'Nev??ehir',
            'Ni??de',
            'Ordu',
            'Rize',
            'Sakarya',
            'Samsun',
            'Siirt',
            'Sinop',
            'Sivas',
            'Tekirda??',
            'Tokat',
            'Trabzon',
            'Tunceli',
            '??anl??urfa',
            'U??ak',
            'Van',
            'Yozgat',
            'Zonguldak',
            'Aksaray',
            'Bayburt',
            'Karaman',
            'K??r??kkale',
            'Batman',
            '????rnak',
            'Bart??n',
            'Ardahan',
            'I??d??r',
            'Yalova',
            'Karab??k',
            'Kilis',
            'Osmaniye',
            'D??zce'
        );
        shuffle($list);
        $len = count($list) - 1;
        $rand = rand(0, $len);
        return $list[$rand];
    }
}
