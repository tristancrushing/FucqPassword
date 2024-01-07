<?php
/**
 * IpspyProductionApiKeys Class
 * 
 * This class manages the API keys used in the FucqPassword system. It includes functionality to load,
 * add, and save API keys. The keys are stored in a JSON file outside of the public web directory for security.
 * 
 * Author: Tristan McGowan
 * Contact: tristan@ipspy.net
 */

class IpspyProductionApiKeys {
    private $apiKeys = []; // Array to store API keys
    private $filePath = '../../ipspyProdApiKeys.json'; // File path for the API keys JSON file

    /**
     * Constructor for the IpspyProductionApiKeys class.
     * 
     * Upon instantiation, it calls the loadApiKeys method to load existing API keys from the JSON file.
     */
    public function __construct() {
        $this->loadApiKeys();
    }

    /**
     * Loads API keys from the JSON file.
     * 
     * This method checks if the JSON file exists. If it does, it reads the file and decodes the JSON content
     * into the $apiKeys array. If the file doesn't exist or is empty, it initializes the $apiKeys array as empty.
     */
    private function loadApiKeys() {
        if (file_exists($this->filePath)) {
            $this->apiKeys = json_decode(file_get_contents($this->filePath), true) ?: [];
        }
    }

    /**
     * Retrieves the current list of API keys.
     * 
     * @return array The array of stored API keys.
     */
    public function getApiKeys() {
        return $this->apiKeys;
    }

    /**
     * Adds a new API key to the list and saves it.
     * 
     * This method adds a new API key to the $apiKeys array if it is not already present.
     * After adding the new key, it calls saveApiKeys to update the JSON file.
     * 
     * @param string $apiKey The new API key to add.
     */
    public function addApiKey($apiKey) {
        if (!in_array($apiKey, $this->apiKeys)) {
            $this->apiKeys[] = $apiKey;
            $this->saveApiKeys();
        }
    }

    /**
     * Saves the current list of API keys to the JSON file.
     * 
     * This method writes the $apiKeys array to the specified JSON file.
     * It ensures that any updates to the list of API keys are persisted.
     */
    private function saveApiKeys() {
        file_put_contents($this->filePath, json_encode($this->apiKeys));
    }
}
?>
