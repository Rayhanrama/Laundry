<?php 

    namespace App\Helpers;

use Illuminate\Support\Facades\Crypt;

    class EncryptionHelpers{
        public static function encrypt($data){
            $encryptedData = Crypt::encryptString($data);
            $encryptedBase64 = base64_encode($encryptedData);

            return $encryptedBase64;
        }

        public static function decrypt($encryptedBase64){
            $encrypted = base64_decode($encryptedBase64);
            $decryptedData = Crypt::decryptString($encrypted);

            return $decryptedData;
        }
 }

?>