<?php
class IpspyProductionApiKeys {
    private $apiKeys = [];
    private $filePath = '../../ipspyProdApiKeys.json'; // IMPORTANT make sure this file sits outside of the public web directory.

    public function __construct() {
        $this->loadApiKeys();
    }

    private function loadApiKeys() {
        if (file_exists($this->filePath)) {
            $this->apiKeys = json_decode(file_get_contents($this->filePath), true) ?: [];
        }
    }

    public function getApiKeys() {
        return $this->apiKeys;
    }

    public function addApiKey($apiKey) {
        if (!in_array($apiKey, $this->apiKeys)) {
            $this->apiKeys[] = $apiKey;
            $this->saveApiKeys();
        }
    }

    private function saveApiKeys() {
        file_put_contents($this->filePath, json_encode($this->apiKeys));
    }
}
