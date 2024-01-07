<?php
/**
 * FucqAdjectiveList Class
 *
 * This class is a part of the Fucq (Flexible, Unique, Creative, Quick) suite of tools.
 * It is responsible for maintaining a list of adjectives. The class provides methods
 * for retrieving a random adjective and adding new adjectives to the list.
 * The primary purpose is to aid in generating creative and varied phrases or passwords.
 *
 * Author: Tristan McGowan
 * Contact: tristan@ipspy.net
 */
class FucqAdjectiveList {
    /**
     * @var array $adjectives A list of adjectives.
     */
    private $adjectives;

    /**
     * Constructor to initialize the adjectives array.
     * The adjectives array is populated with a diverse set of words to ensure variety.
     */
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

    /**
     * Example method to demonstrate the usage of the FucqAdjectiveList class.
     * This method is primarily for testing and educational purposes.
     */
    public function __run_example_usage()
    {
        // Example usage:
        $FucqAdjectiveList = new FucqAdjectiveList();
        echo $FucqAdjectiveList->getRandomAdjective();
    }

    /**
     * Fetches a random adjective from the adjectives array.
     *
     * @return string A randomly selected adjective from the list.
     */
    public function getRandomAdjective() {
        return $this->adjectives[array_rand($this->adjectives)];
    }

    /**
     * Adds a new adjective to the adjectives array.
     * This method allows for the dynamic expansion of the adjective list.
     *
     * @param string $adjective The new adjective to add to the list.
     */
    public function addAdjective($adjective) {
        $this->adjectives[] = $adjective;
    }
    
}

?>
