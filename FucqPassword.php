<?php

class FucqPassword {
    private $adjectives;
    private $animals;
    private $actions;
    private $directions;
    private $daysOfWeek;
    private $timesOfDay;
    private $locations;

    public function __construct() {
        // Initialize arrays with possible words for each category
        $this->adjectives = ['quick', 'lazy', 'energetic', 'sleepy', 'curious'];
        $this->animals = ['cat', 'dog', 'rabbit', 'elephant', 'tiger'];
        $this->actions = ['jumps', 'runs', 'flies', 'walks', 'hops'];
        $this->directions = ['north', 'south', 'east', 'west', 'upwards'];
        $this->daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $this->timesOfDay = ['morning', 'afternoon', 'evening', 'midnight', 'noon'];
        $this->locations = ['park', 'forest', 'beach', 'mountain', 'river'];
    }

    private function getRandomElement($array) {
        return $array[array_rand($array)];
    }

    public function generatePassphrase() {
        $passphrase = "The " . $this->getRandomElement($this->adjectives) . " " . 
                      $this->getRandomElement($this->animals) . " " . 
                      $this->getRandomElement($this->actions) . " " . 
                      $this->getRandomElement($this->directions) . " every " . 
                      $this->getRandomElement($this->daysOfWeek) . " " . 
                      $this->getRandomElement($this->timesOfDay) . " to play at the " . 
                      $this->getRandomElement($this->locations);

        // Ensure the passphrase is 128 characters long
        return substr($passphrase . str_repeat(' ', 128), 0, 128);
    }
}

// Example usage
$generator = new FucqPassword();
echo $generator->generatePassphrase();
?>
