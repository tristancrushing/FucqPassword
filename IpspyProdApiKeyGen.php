<?php
/**
 * IpspyProdApiKeyGen Class
 * 
 * This class is responsible for generating and managing API keys for the FucqPassword system.
 * It includes methods to generate a new UUID version 4, encode it, and add it to the list of valid API keys.
 * 
 * Author: Tristan McGowan
 * Contact: tristan@ipspy.net
 */

// Include the IpspyProductionApiKeys class for API key management
require_once 'IpspyProductionApiKeys.php';

class IpspyProdApiKeyGen {
    /**
     * Generates a UUID version 4.
     * 
     * This method generates a universally unique identifier (UUID) according to the version 4 specification.
     * It uses PHP's random_bytes function to ensure a high level of randomness.
     * The method formats the random bytes into the standard UUID format.
     * 
     * @return string A 36-character UUID version 4.
     */
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

    /**
     * Generates an API key.
     * 
     * This method generates a new API key by first creating a UUID version 4 and then encoding it.
     * The encoding uses bin2hex to convert the UUID into a hexadecimal representation, making it suitable
     * for use as an API key.
     * 
     * @return string The encoded API key.
     */
    public static function generateApiKey() {
        $uuid4 = self::generateUuidV4();
        $encodedKey = bin2hex($uuid4);
        return $encodedKey;
    }

    /**
     * Adds a new API key to the system.
     * 
     * This method generates a new API key and adds it to the list of valid keys managed by the IpspyProductionApiKeys class.
     * It ensures that the new key is correctly incorporated into the system, enabling its use for authentication purposes.
     * 
     * @return string The new API key that was added.
     */
    public static function addNewApiKey() {
        $newKey = self::generateApiKey();
        $keysManager = new IpspyProductionApiKeys();
        $keysManager->addApiKey($newKey);
        return $newKey;
    }
}
?>
