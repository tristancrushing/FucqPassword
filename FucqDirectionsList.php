<?php
/**
 * FucqDirectionsList Class
 *
 * As part of the Fucq (Flexible, Unique, Creative, Quick) suite, this class manages a detailed list 
 * of directions. It includes standard cardinal directions, relative positions, and more intricate 
 * directional phrases. The class is designed to support applications such as creative writing, 
 * passphrase generation, or any scenario where a rich variety of directional references is beneficial.
 *
 * Author: Tristan McGowan
 * Contact: tristan@ipspy.net
 */
class FucqDirectionsList {
    /**
     * @var array $directions A comprehensive list of directional terms.
     */
    private $directions;
    
    /**
     * Constructor to initialize the directions array.
     * The array is populated with a broad range of directions to ensure extensive coverage and diversity.
     */
    public function __construct() {
        // Initialize the array with a broader range of directions
        $this->directions = [
          'north', 'south', 'east', 'west', 'upwards', 
          'downwards', 'northeast', 'northwest', 'southeast', 'southwest', 
          'left', 'right', 'forward', 'backward', 'inwards', 
          'outwards', 'uphill', 'downhill', 'sideways', 'diagonally', 
          'around', 'through', 'into', 'onto', 'off', 
          'over', 'under', 'beneath', 'above', 'below', 
          'within', 'outside', 'inside', 'alongside', 'beside', 
          'between', 'among', 'across', 'towards', 'away',
          'past', 'beyond', 'adjacent', 'opposite', 'parallel',
          'perpendicular', 'aslant', 'astride', 'atop', 'aboard',
          'aground', 'aloft', 'askew', 'athwart', 'about',
          'counter-clockwise', 'clockwise', 'lengthwise', 'crosswise', 'homeward',
          'leeward', 'windward', 'earthward', 'skyward', 'seaward',
          'northbound', 'southbound', 'eastbound', 'westbound', 'upstream',
          'downstream', 'inbound', 'outbound', 'homewards', 'outwards',
          'headfirst', 'headlong', 'sidelong', 'crosswise', 'lengthwise',
          'north-northeast', 'north-northwest', 'south-southeast', 'south-southwest', 'east-northeast',
          'east-southeast', 'west-northwest', 'west-southwest', 'upwards-left', 'upwards-right',
          'downwards-left', 'downwards-right', 'clockwise-upwards', 'clockwise-downwards', 'counter-clockwise-upwards',
          'counter-clockwise-downwards', 'spiral-upwards', 'spiral-downwards', 'zigzag', 'serpentine',
          'meandering', 'winding', 'snaking', 'curving', 'veering',
          'swerving', 'deviating', 'diverging', 'converging', 'intersecting',
          'crisscrossing', 'overlapping', 'encompassing', 'circumnavigating', 'orbiting',
          'circling', 'revolving', 'rotating', 'twisting', 'turning',
          'bending', 'curling', 'looping', 'coiling', 'spiraling',
          'wreathing', 'encircling', 'surrounding', 'enveloping', 'shrouding',
          'veiling', 'shadowing', 'tracking', 'trailing', 'following',
          'pursuing', 'chasing', 'hunting', 'stalking', 'shadowing',
          'retreating', 'receding', 'withdrawing', 'backtracking', 'reversing',
          // ... continue adding as needed
      ];

    }

    /**
     * Example method to demonstrate the usage of the FucqDirectionsList class.
     * This method is primarily for testing and educational purposes.
     */
    public function __run_example_usage()
    {
        // Example usage:
        $directionList = new FucqDirectionsList();
        echo $directionList->getRandomDirection();
    }

    /**
     * Fetches a random direction from the directions array.
     *
     * @return string A randomly selected direction from the list.
     */
    public function getRandomDirection() {
        return $this->directions[array_rand($this->directions)];
    }

    /**
     * Adds a new direction to the directions array.
     * This method allows for dynamic expansion of the direction list, accommodating unique or specialized terms.
     *
     * @param string $direction The new direction to add to the list.
     */
    public function addDirection($direction) {
        $this->directions[] = $direction;
    }
    
}

?>
