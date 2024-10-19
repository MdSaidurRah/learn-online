<?php
/**
 * Created by PhpStorm.
 * User: miliscript
 * Date: 2/26/2020
 * Time: 9:50 PM
 */

namespace App\LibraryFunctions;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class encription
{
    public function doEncript($data)
    {
        $encrypted = Crypt::encryptString($data);
        return $encrypted;
    }

    public function doDecript($data)
    {
        $decrypted = Crypt::decryptString($data);
        return $decrypted;
    }

}
