<?php
require_once 'IpspyProductionApiKeys.php';

class IpspyProdApiKeyGen {
    public static function generateUuidV4() {
        // Generate 16 bytes (128 bits) of random data
        $data = random_bytes(16);
        // Set version to 0100 (UUID version 4)
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        // Set bits 6-7 to 10
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
        // Output the 36 character UUID.
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }

    public static function generateApiKey() {
        $uuid4 = self::generateUuidV4();
        $encodedKey = bin2hex($uuid4);
        return $encodedKey;
    }

    public static function addNewApiKey() {
        $newKey = self::generateApiKey();
        $keysManager = new IpspyProductionApiKeys();
        $keysManager->addApiKey($newKey);
    }
}
