<?php

class FucqDirectionsList {
    private $directions;

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

    public function getRandomDirection() {
        return $this->directions[array_rand($this->directions)];
    }

    // Optionally, a method to add more directions
    public function addDirection($direction) {
        $this->directions[] = $direction;
    }
}

// Example usage:
$directionList = new FucqDirectionsList();
echo $directionList->getRandomDirection();
?>
