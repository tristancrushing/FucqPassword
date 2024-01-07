<?php
/**
 * index.php
 * Author: Tristan McGowan
 * Contact: tristan@ipspy.net
 * 
 * This script acts as a REST interface for the FucqPassword system. It handles 
 * HTTP GET requests to generate and analyze passphrases. The script validates 
 * incoming API keys and returns the result in JSON format.
 */

// Include necessary files and dependencies
require_once 'constants.php'; // Constants file contains configuration settings and API keys.
require_once 'FucqPassword.php'; // FucqPassword class for generating and analyzing passphrases.

/**
 * Checks if the provided API key is valid.
 * 
 * This function checks the provided API key against the list of valid keys 
 * stored in IPSPY_PRODUCTION_API_KEYS. It ensures that only authorized users 
 * can access the passphrase generation and analysis features.
 * 
 * @param string $apiKey The API key to validate.
 * @return bool Returns true if the key is valid, otherwise false.
 */
function isValidApiKey($apiKey) {
    return in_array($apiKey, IPSPY_PRODUCTION_API_KEYS);
}

/**
 * Main function to handle REST API requests.
 * 
 * This function serves as the entry point for the REST API. It processes incoming 
 * GET requests, validates the API key, and uses the FucqPassword class to generate 
 * and analyze passphrases. The function outputs the results in JSON format, making 
 * it suitable for integration with various client applications.
 */
function main() {
    // Set the content type to JSON for the response
    header('Content-Type: application/json');

    // Retrieve 'seedPhrase' and 'fpapikey' from the GET parameters
    $seedPhrase = isset($_GET['seedPhrase']) ? urldecode($_GET['seedPhrase']) : '';
    $fpApiKey = isset($_GET['fpapikey']) ? $_GET['fpapikey'] : '';

    // Validate the provided API key
    if (!isValidApiKey($fpApiKey)) {
        echo json_encode(['error' => 'Invalid API Key']);
        return;
    }

    // Initialize the FucqPassword class
    $generator = new FucqPassword();
    $responses = [];

    // Use the provided seed phrase or generate a new one
    $passphrase = $seedPhrase ?: $generator->generatePassphrase();

    // Analyze the passphrase using GPT-4
    $analysis = $generator->analyzePassphraseWithGPT4($passphrase);

    // Rank the passphrases based on the analysis
    $rankedPassphrases = $generator->returnRankPassphrases($analysis);

    // Prepare the response array
    $responses[] = [
        'seedPassphrase' => $passphrase, 
        'analysis' => $analysis, 
        'rankedPassphrases' => $rankedPassphrases
    ];

    // Output the response in JSON format
    echo json_encode($responses);
}

// Execute the main function to handle the request
main();
?>
