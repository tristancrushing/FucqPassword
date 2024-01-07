<?php

// Import the newly created list classes
require_once 'FucqAdjectiveList.php'; // Path to FucqAdjectiveList class file
require_once 'FucqAnimalList.php';    // Path to FucqAnimalList class file
require_once 'FucqActionsList.php';   // Path to FucqActionsList class file
require_once 'FucqDirectionsList.php';// Path to FucqDirectionsList class file
require_once 'FucqDaysOfWeekList.php';// Path to FucqDaysOfWeekList class file
require_once 'FucqTimesOfDayList.php';// Path to FucqTimesOfDayList class file
require_once 'FucqLocationsList.php'; // Path to FucqLocationsList class file

class FucqPassword {
    // Define properties with specific types
    private FucqAdjectiveList $adjectives;
    private FucqAnimalList $animals;
    private FucqActionsList $actions;
    private FucqDirectionsList $directions;
    private FucqDaysOfWeekList $daysOfWeek;
    private FucqTimesOfDayList $timesOfDay;
    private FucqLocationsList $locations;

    public function __construct() {
        // Initialize each category with its respective list class
        $this->adjectives = new FucqAdjectiveList();
        $this->animals = new FucqAnimalList();
        $this->actions = new FucqActionsList();
        $this->directions = new FucqDirectionsList();
        $this->daysOfWeek = new FucqDaysOfWeekList();
        $this->timesOfDay = new FucqTimesOfDayList();
        $this->locations = new FucqLocationsList();
    }

    // Fetches a random element from a given list class
    private function getRandomElement($list): string {
        return $list->getRandomElement();
    }

    // Generates a passphrase
    public function generatePassphrase(): string {
        // Construct a sentence using random elements from each category
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
