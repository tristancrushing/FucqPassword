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
        $passphrase = "The " . $this->getRandomElement($this->adjectives) . " " . 
                      $this->getRandomElement($this->animals) . " " . 
                      $this->getRandomElement($this->actions) . " " . 
                      $this->getRandomElement($this->directions) . " every " . 
                      $this->getRandomElement($this->daysOfWeek) . " " . 
                      $this->getRandomElement($this->timesOfDay) . " to play at the " . 
                      $this->getRandomElement($this->locations);

        // Append spaces to reach a minimum length of 128 characters if necessary
        if (strlen($passphrase) < 128) {
            $passphrase .= str_repeat(' ', 128 - strlen($passphrase));
        }

        return $passphrase;
    }
}

// Example usage
$generator = new FucqPassword();
echo $generator->generatePassphrase();

?>
