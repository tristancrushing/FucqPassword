<?php

class AdjectiveList {
    private $adjectives;

    public function __construct() {
        // Initialize the array with a subset of adjectives
        $this->adjectives = [
            'quick', 'lazy', 'energetic', 'sleepy', 'curious', 
            'happy', 'sad', 'tall', 'short', 'bright', 
            'dark', 'colorful', 'plain', 'young', 'old', 
            'new', 'ancient', 'modern', 'fast', 'slow',
            // ... (add as many adjectives as you need)
        ];
    }

    public function getRandomAdjective() {
        return $this->adjectives[array_rand($this->adjectives)];
    }

    // Optionally, a method to add more adjectives
    public function addAdjective($adjective) {
        $this->adjectives[] = $adjective;
    }
}

// Example usage:
$adjectiveList = new AdjectiveList();
echo $adjectiveList->getRandomAdjective();

?>
