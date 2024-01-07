<?php
// index.php

require_once 'constants.php'; // Include constants
require_once 'FucqPassword.php'; // Include the FucqPassword class and other dependencies

/**
 * Checks if the API key is valid.
 * 
 * @param string $apiKey The API key to validate.
 * @return bool Returns true if the key is valid, otherwise false.
 */
function isValidApiKey($apiKey) {
    return in_array($apiKey, IPSPY_PRODUCTION_API_KEYS);
}

/**
 * Main REST interface for generating and analyzing passphrases.
 */
function main() {
    // Get parameters from the URL
    $iterations = isset($_GET['iterations']) ? (int)$_GET['iterations'] : 1;
    $seedPhrase = isset($_GET['seedPhrase']) ? urldecode($_GET['seedPhrase']) : '';
    $fpApiKey = isset($_GET['fpapikey']) ? $_GET['fpapikey'] : '';

    // Validate API key
    if (!isValidApiKey($fpApiKey)) {
        echo json_encode(['error' => 'Invalid API Key']);
        return;
    }

    // Validate iterations and seedPhrase length
    if ($iterations < 1 || $iterations > 10 || strlen($seedPhrase) > 128) {
        echo json_encode(['error' => 'Invalid parameters']);
        return;
    }

    // Initialize FucqPassword class
    $generator = new FucqPassword();
    $responses = [];

    // Generate and analyze passphrases
    for ($i = 0; $i < $iterations; $i++) {
        $passphrase = $seedPhrase ?: $generator->generatePassphrase();
        $analysis = $generator->analyzePassphraseWithGPT4($passphrase);
        $rankedPassphrases = $generator->returnRankPassphrases($analysis);
        $responses[] = ['seedPassphrase' => $passphrase, 'analysis' => $analysis, 'rankedPassphrases' => $rankedPassphrases];
    }

    // Output the response
    header('Content-Type: application/json');
    echo json_encode($responses);
}

// Run the main function
main();
