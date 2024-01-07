<?php

/**
 * FucqPassword Class
 * 
 * This class generates passphrases based on the Fucq (Flexible, Unique, Creative, Quick) concept.
 * It utilizes separate lists of adjectives, animals, actions, directions, days of the week,
 * times of day, and locations to construct a unique and lengthy passphrase.
 * Each category is represented by its own class, providing a diverse and extensive pool of options.
 * 
 * Author: Tristan McGowan
 * Contact: tristan@ipspy.net
 */

// Import the newly created list classes for each category
require_once 'constants.php';          // Path to constants.php file
require_once 'FucqAdjectiveList.php';  // Path to FucqAdjectiveList class file
require_once 'FucqAnimalList.php';     // Path to FucqAnimalList class file
require_once 'FucqActionsList.php';    // Path to FucqActionsList class file
require_once 'FucqDirectionsList.php'; // Path to FucqDirectionsList class file
require_once 'FucqDaysOfWeekList.php'; // Path to FucqDaysOfWeekList class file
require_once 'FucqTimesOfDayList.php'; // Path to FucqTimesOfDayList class file
require_once 'FucqLocationsList.php';  // Path to FucqLocationsList class file

class FucqPassword {
    // Declare properties for each category with specific types
    private FucqAdjectiveList $adjectives;
    private FucqAnimalList $animals;
    private FucqActionsList $actions;
    private FucqDirectionsList $directions;
    private FucqDaysOfWeekList $daysOfWeek;
    private FucqTimesOfDayList $timesOfDay;
    private FucqLocationsList $locations;

    /**
     * Constructor to initialize each category with its respective list class.
     * This approach allows for easily expanding or changing the word pool for each category.
     */
    public function __construct() {
        $this->adjectives = new FucqAdjectiveList();
        $this->animals = new FucqAnimalList();
        $this->actions = new FucqActionsList();
        $this->directions = new FucqDirectionsList();
        $this->daysOfWeek = new FucqDaysOfWeekList();
        $this->timesOfDay = new FucqTimesOfDayList();
        $this->locations = new FucqLocationsList();
    }

    /**
     * Fetches a random element from a given list.
     * 
     * @param object $list The list object from which to fetch a random element.
     * @return string A random element from the provided list.
     */
    private function getRandomElement($list): string {
        return $list->getRandomElement();
    }

    /**
     * Generates a passphrase.
     * Constructs a sentence by randomly selecting elements from each category.
     * Ensures the passphrase is at least 128 characters long.
     * 
     * @return string A passphrase that is a minimum of 128 characters long.
     */
    public function generatePassphrase(): string {
        $passphrase = "The " . $this->adjectives->getRandomAdjective($this->adjectives) . " " . 
                      $this->animals->getRandomAnimal($this->animals) . " " . 
                      $this->actions->getRandomAction($this->actions) . " " . 
                      $this->directions->getRandomDirection($this->directions) . " every " . 
                      $this->daysOfWeek->getRandomDayOfWeek($this->daysOfWeek) . " " . 
                      $this->timesOfDay->getRandomTimeOfDay($this->timesOfDay) . " to play at the " . 
                      $this->locations->getRandomLocation($this->locations);

        // Check the length and append characters if needed
        $currentLength = strlen($passphrase);
        if ($currentLength < 80) {
            // Calculate remaining length
            $remainingLength = 80 - $currentLength;
    
            // Characters to append
            $specialChars = ['.', '!', '#'];
    
            // Create a random string of numbers and special characters
            for ($i = 0; $i < $remainingLength; $i++) {
                $passphrase .= $i % 2 == 0 ? $specialChars[array_rand($specialChars)] : rand(0, 9);
            }
        }else{
            $specialChars = ['.', '!', '?'];
            $passphrase .= $i % 2 == 0 ? $specialChars[array_rand($specialChars)] : $specialChars[array_rand($specialChars)];
        }

        return $passphrase;
    }

    /**
     * Analyzes the generated passphrase using OpenAI's GPT-4 API.
     *
     * @param string $passphrase The generated passphrase to analyze.
     * @return array An array of responses from the GPT-4 API.
     */
    public function analyzePassphraseWithGPT4(string $passphrase): array {
        $responses = [];
    
        $payload = $this->preparePayload($passphrase);
        $response = $this->sendRequestToGPT4($payload);
        $responses[] = json_decode($response, true);

        return $responses;
    }
    
    /**
     * Prepares the payload for the GPT-4 API request.
     *
     * @param string $passphrase The passphrase to be analyzed.
     * @return array The payload for the API request.
     */
    private function preparePayload(string $passphrase): array {
        return [
            'messages' => [
                ['role' => "system", 'content' => "Analyze this passphrase: {$passphrase} and provide feedback. Mock response for passphrase analysis. Response should be in JSON code block with an analysis object, and passphrases object that has 5 iterations or mockings of the passphrase. Make sure the return is only json and in a code block, make sure all generated passphrases are gramatically correct for the english language."],
                ['role' => "system", 'content' => "PASS_PHRASE_TO_MOCK: {$passphrase}"],
                ['role' => "user", 'content' => 'EXAMPLE_JSON_RETURN_FORMAT = {"analysis":{"genesisPassphrase":"'.$passphrase.'","length":CALCULATED_BY_CHATGPT,"syllables":CALCULATED_BY_CHATGPT,"word_count":CALCULATED_BY_CHATGPT,"readability_score":CALCULATED_BY_CHATGPT,"complexity":CALCULATED_BY_CHATGPT,"repeated_words":CALCULATED_BY_CHATGPT,"characters":{"total":CALCULATED_BY_CHATGPT,"letters":CALCULATED_BY_CHATGPT,"non_letters":CALCULATED_BY_CHATGPT},"sentiment":{"score":CALCULATED_BY_CHATGPT,"type":CALCULATED_BY_CHATGPT},"language":CALCULATED_BY_CHATGPT,"verbs":CALCULATED_BY_CHATGPT,"nouns":CALCULATED_BY_CHATGPT,"adjectives":CALCULATED_BY_CHATGPT,"pattern":CALCULATED_BY_CHATGPT},"passphrases":[GENERATED_BY_CHATGPT,GENERATED_BY_CHATGPT,GENERATED_BY_CHATGPT,GENERATED_BY_CHATGPT,GENERATED_BY_CHATGPT]}']
            ],
            'max_tokens' => 750,
            'model' => 'gpt-4-0613'
            // Add other necessary parameters for the API request
        ];
    }
    
    /**
     * Sends a request to OpenAI's GPT-4 API and returns the response.
     *
     * @param array $payload The payload for the API request.
     * @return string The JSON response from the API.
     */
    private function sendRequestToGPT4(array $payload): string {
        // URL and headers for the OpenAI API
        $url = 'https://api.openai.com/v1/chat/completions'; // Adjust with the correct API endpoint
        $headers = [
            'Authorization: Bearer ' . OPENAI_API_KEY, // Replace OPENAI_API_KEY with the actual key
            'Content-Type: application/json'
        ];
    
        // Initialize cURL session
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
    
        // Execute the request and capture the response
        $response = curl_exec($ch);
        curl_close($ch);
    
        return $response;
    }

    
}

// Example usage
$generator = new FucqPassword();
$passphrase = $generator->generatePassphrase();
$analysis = $generator->analyzePassphraseWithGPT4($passphrase);
echo "<pre>";
print_r($analysis);
echo "</pre>";
die();

?>
