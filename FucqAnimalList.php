<?php
/**
 * FucqAnimalList Class
 *
 * Part of the Fucq (Flexible, Unique, Creative, Quick) suite, this class manages a list of animals.
 * It is designed to provide a diverse and extensive selection of animal names for various applications,
 * such as generating creative phrases or complex passwords. The class includes methods to retrieve
 * a random animal and to expand the list with additional animals.
 *
 * Author: Tristan McGowan
 * Contact: tristan@ipspy.net
 */
class FucqAnimalList {
    /**
     * @var array $animals A list of animal names.
     */
    private $animals;

    /**
     * Constructor to initialize the animals array.
     * The array is pre-populated with a wide range of animal names to ensure diversity.
     */
    public function __construct() {
        // Initialize the array with a more extensive variety of animals
        $this->animals = [
          'cat', 'dog', 'rabbit', 'elephant', 'tiger', 
          'lion', 'bear', 'fox', 'wolf', 'deer', 
          'giraffe', 'zebra', 'kangaroo', 'koala', 'panda', 
          'rhinoceros', 'hippopotamus', 'squirrel', 'meerkat', 'lemur',
          'raccoon', 'otter', 'beaver', 'skunk', 'badger',
          'hedgehog', 'armadillo', 'porcupine', 'mole', 'bat',
          'weasel', 'ferret', 'mink', 'chinchilla', 'opossum',
          'gorilla', 'orangutan', 'chimpanzee', 'bonobo', 'gibbon',
          'lemur', 'tarsier', 'loris', 'bushbaby', 'macaque',
          'baboon', 'mandrill', 'capuchin', 'howler monkey', 'spider monkey',
          'marmoset', 'tamarin', 'sloth', 'antelope', 'buffalo',
          'bison', 'yak', 'moose', 'elk', 'caribou',
          'reindeer', 'gazelle', 'impala', 'wildebeest', 'kudu',
          'gerenuk', 'oryx', 'eland', 'hartebeest', 'topi',
          'duiker', 'dik-dik', 'waterbuck', 'roan', 'sable',
          'zebu', 'okapi', 'camel', 'llama', 'alpaca',
          'vicuña', 'guanaco', 'horse', 'donkey', 'zebra',
          'rhino', 'tapir', 'peccary', 'warthog', 'hippo',
          'dolphin', 'whale', 'porpoise', 'manatee', 'dugong',
          'seal', 'sea lion', 'walrus', 'otter', 'beaver',
          'penguin', 'flamingo', 'swan', 'duck', 'goose',
          'eagle', 'hawk', 'falcon', 'owl', 'vulture',
          'parrot', 'cockatoo', 'macaw', 'sparrow', 'robin',
          'bluebird', 'cardinal', 'canary', 'finch', 'warbler',
          'starling', 'magpie', 'crow', 'raven', 'jay',
          'woodpecker', 'kingfisher', 'hummingbird', 'heron', 'stork',
          'crane', 'ibis', 'pelican', 'albatross', 'seagull',
          'sandpiper', 'puffin', 'ostrich', 'emu', 'cassowary',
          'kiwi', 'pigeon', 'dove', 'quail', 'partridge',
          'pheasant', 'turkey', 'chicken', 'peacock', 'guinea fowl',
          'frog', 'toad', 'newt', 'salamander', 'axolotl',
          'iguana', 'lizard', 'chameleon', 'gecko', 'monitor lizard',
          'skink', 'alligator', 'crocodile', 'gavial', 'snake',
          'viper', 'python', 'boa', 'anaconda', 'cobra',
          'tortoise', 'turtle', 'terrapin', 'sea turtle', 'leatherback turtle',
          'shark', 'ray', 'swordfish', 'marlin', 'sailfish',
          'tuna', 'mackerel', 'barracuda', 'piranha', 'trout',
          'salmon', 'carp', 'goldfish', 'koi', 'catfish',
          'cod', 'halibut', 'flounder', 'sole', 'bass',
          'perch', 'pike', 'walleye', 'muskie', 'gar',
          'eel', 'jellyfish', 'octopus', 'squid', 'cuttlefish',
          'nautilus', 'clam', 'oyster', 'mussel', 'scallop',
          'snail', 'slug', 'urchin', 'starfish', 'sea cucumber',
          'crab', 'lobster', 'shrimp', 'prawn', 'barnacle',
          'anemone', 'coral', 'sponge', 'kangaroo rat', 'jerboa',
          'groundhog', 'prairie dog', 'marmot', 'chipmunk', 'gopher',
          'muskrat', 'voles', 'lemming', 'guinea pig', 'capibara',
          // ... continue adding as needed
      ];

    }

    /**
     * Example method to demonstrate the usage of the FucqAnimalList class.
     * This method is primarily for testing and educational purposes.
     */
    public function __run_example_usage()
    {
        // Example usage:
        $animalList = new FucqAnimalList();
        echo $animalList->getRandomAnimal();
    }

    /**
     * Fetches a random animal name from the animals array.
     *
     * @return string A randomly selected animal name from the list.
     */
    public function getRandomAnimal() {
        return $this->animals[array_rand($this->animals)];
    }

    /**
     * Adds a new animal name to the animals array.
     * This method allows for the dynamic expansion of the animal list.
     *
     * @param string $animal The new animal name to add to the list.
     */
    public function addAnimal($animal) {
        $this->animals[] = $animal;
    }
    
}

?>
