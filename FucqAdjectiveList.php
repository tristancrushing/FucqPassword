<?php

class FucqAdjectiveList {
    private $adjectives;

    public function __construct() {
        // Initialize the array with a subset of adjectives
        $this->adjectives = [
            'quick', 'lazy', 'energetic', 'sleepy', 'curious', 
            'happy', 'sad', 'tall', 'short', 'bright', 
            'dark', 'colorful', 'plain', 'young', 'old', 
            'new', 'ancient', 'modern', 'fast', 'slow',
            'graceful', 'clumsy', 'nimble', 'brave', 'cowardly',
            'smooth', 'rough', 'soft', 'hard', 'sharp',
            'gentle', 'fierce', 'friendly', 'hostile', 'warm',
            'cold', 'lively', 'quiet', 'noisy', 'silent',
            'strong', 'weak', 'thick', 'thin', 'neat',
            'messy', 'clean', 'dirty', 'rich', 'poor',
            'heavy', 'light', 'beautiful', 'ugly', 'easy',
            'difficult', 'comfortable', 'uncomfortable', 'safe', 'dangerous',
            'famous', 'obscure', 'skilled', 'unskilled', 'educated',
            'uneducated', 'rational', 'irrational', 'sane', 'insane',
            'healthy', 'unhealthy', 'bitter', 'sweet', 'sour',
            'spicy', 'flavorful', 'tasteless', 'fragrant', 'odorless',
            'loud', 'soft', 'squeaky', 'muffled', 'clear',
            'blurry', 'bright', 'dim', 'shiny', 'dull',
            'transparent', 'opaque', 'solid', 'liquid', 'gaseous',
            'elegant', 'awkward', 'vivid', 'faded', 'glossy',
            'matte', 'vast', 'tiny', 'immense', 'petite',
            'boisterous', 'serene', 'vibrant', 'monotone', 'exuberant',
            'subdued', 'luxurious', 'modest', 'ornate', 'sparse',
            'opulent', 'stingy', 'generous', 'thrifty', 'extravagant',
            'slender', 'bulky', 'svelte', 'corpulent', 'skeletal',
            'robust', 'fragile', 'flexible', 'rigid', 'elastic',
            'resilient', 'brittle', 'creamy', 'crispy', 'velvety',
            'slippery', 'sticky', 'fluffy', 'jagged', 'smoothed',
            'polished', 'unpolished', 'waxed', 'unwaxed', 'varnished',
            'unvarnished', 'melodic', 'discordant', 'harmonious', 'cacophonous', 'symphonic',
            // ... and so on
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
$FucqAdjectiveList = new FucqAdjectiveList();
echo $FucqAdjectiveList->getRandomAdjective();

?>
