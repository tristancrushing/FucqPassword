<?php
require_once 'IpspyProductionApiKeys.php';

class IpspyProdApiKeyGen {
    public static function generateApiKey() {
        $uuid4 = com_create_guid(); // Generate UUID v4
        $encodedKey = bin2hex($uuid4); // Convert to hexadecimal
        return $encodedKey;
    }

    public static function addNewApiKey() {
        $newKey = self::generateApiKey();
        $keysManager = new IpspyProductionApiKeys();
        $keysManager->addApiKey($newKey);
    }
}
