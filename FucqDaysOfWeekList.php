<?php
/**
 * FucqDaysOfWeekList Class
 *
 * Part of the Fucq (Flexible, Unique, Creative, Quick) suite, this class manages a diverse list 
 * of days of the week, including standard days, extended references, and specific occasions. 
 * It offers methods for retrieving random day and for expanding the list with additional days. 
 * The class is designed to provide versatile tool for generating creative phrases or complex passwords.
 *
 * Author: Tristan McGowan
 * Contact: tristan@ipspy.net
 */
class FucqDaysOfWeekList {
    /**
     * @var array $daysOfWeek list of days including standard days and specific occasions.
     */
    private $daysOfWeek;

    /**
     * Constructor to initialize the daysOfWeek array.
     * The array is pre-populated with wide range of days to ensure variety.
     */
    public function __construct() {
        // Initialize the array with standard days, extended references, and specific occasions
        $this->daysOfWeek = [
          'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday',
          'Weekend', 'Weekday', 'Holiday', 
          'Monday morning', 'Tuesday afternoon', 'Wednesday evening', 'Thursday night', 
          'Friday before dawn', 'Saturday at noon', 'Sunday at midnight',
          'New Year\'s Day', 'Christmas Day', 'Thanksgiving', 'Independence Day', 
          'Labor Day', 'Memorial Day', 'Easter Sunday', 'Halloween', 'Valentine\'s Day',
          'Spring day', 'Summer evening', 'Autumn morning', 'Winter night',
          'The longest day', 'The shortest night', 'April Fools\' Day', 'Black Friday',
          'Cyber Monday', 'Tax Day', 'Leap Day', 'Earth Day', 'Mother\'s Day', 
          'Father\'s Day', 'Veterans Day', 'Boxing Day', 'Saint Patrick\'s Day', 
          'Wednesday before work', 'Tuesday after lunch', 'Thursday during break', 
          'Monday right after meeting', 'Friday at tetime', 'Saturday before the game',
          'Sunday after brunch', 'First day of the month', 'Last day of the year',
          'Midsummer\'s Eve', 'Midwinter\'s Day', 'Groundhog Day', 'Election Day', 
          'Super Bowl Sunday', 'Finals Week', 'Opening Day', 'Closing Day',
          'Summer Solstice', 'Winter Solstice', 'Spring Equinox', 'Autumn Equinox',
          'Full moon', 'New moon', 'rainy day', 'snowy day', 'stormy morning', 
          'foggy evening', 'sunny afternoon', 'breezy night', 'humid day',
          'chilly morning', 'scorching afternoon', 'The day before vacation', 
          'The day after holiday', 'quiet weekday', 'busy weekend',
          'The start of the season', 'The end of the month', 'Midweek', 'typical Tuesday',
          'lazy Sunday', 'bustling Saturday market', 'serene Friday sunset',
          'wild Wednesday party', 'thoughtful Thursday', 'reflective evening',
          'festive Friday', 'solemn Monday', 'vibrant Tuesday evening', 
          'mellow Thursday morning', 'festive Saturday night', 'quiet Wednesday noon',
          'lively Friday brunch', 'An early Monday workout', 'late Sunday night movie',
          'mid-Tuesday coffee break', 'Thursday team lunch', 'Wednesday deadline',
          'Tuesday deadline', 'Friday celebration', 'Monday blues day', 
          'Thursday rehearsal', 'Saturday adventure', 'Sunday relaxation',
          'mid-month crisis', 'An end-of-week triumph', 'start-of-week challenge', 
          'mid-Saturday excitement', 'Sunday evening reflection', 'Friday night out',
          'Tuesday morning meeting', 'Wednesday afternoon walk', 'Thursday workout',
          'Friday gaming night', 'Saturday cooking spree', 'Sunday gardening day',
          'Monday commute', 'Tuesday deadline rush', 'Wednesday project update', 
          'Thursday brainstorming session', 'Friday team outing', 'Saturday road trip',
          'Sunday staycation', 'midweek surprise', 'weekend getaway',
          // ... continue adding as needed
      ];

    }

    /**
     * Example method to demonstrate the usage of the FucqDaysOfWeekList class.
     * This method is primarily for testing and educational purposes.
     */
    public function __run_example_usage()
    {
        // Example usage to demonstrate the class functionality
        $daysOfWeekList = new FucqDaysOfWeekList();
        echo $daysOfWeekList->getRandomDayOfWeek();
    }

    /**
     * Fetches random day from the daysOfWeek array.
     *
     * @return string randomly selected day from the list.
     */
    public function getRandomDayOfWeek() {
        return $this->daysOfWeek[array_rand($this->daysOfWeek)];
    }

    /**
     * Adds new day to the daysOfWeek array.
     * This method allows for the dynamic expansion of the day list.
     *
     * @param string $day The new day to add to the list.
     */
    public function addDayOfWeek($day) {
        $this->daysOfWeek[] = $day;
    }
}

?>
