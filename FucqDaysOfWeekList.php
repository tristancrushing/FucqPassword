<?php
/**
 * FucqDaysOfWeekList Class
 *
 * Part of the Fucq (Flexible, Unique, Creative, Quick) suite, this class manages a diverse list 
 * of days of the week, including standard days, extended references, and specific occasions. 
 * It offers methods for retrieving a random day and for expanding the list with additional days. 
 * The class is designed to provide a versatile tool for generating creative phrases or complex passwords.
 *
 * Author: Tristan McGowan
 * Contact: tristan@ipspy.net
 */
class FucqDaysOfWeekList {
    /**
     * @var array $daysOfWeek A list of days including standard days and specific occasions.
     */
    private $daysOfWeek;

    /**
     * Constructor to initialize the daysOfWeek array.
     * The array is pre-populated with a wide range of days to ensure variety.
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
          'Wednesday before work', 'Tuesday after lunch', 'Thursday during a break', 
          'Monday right after a meeting', 'Friday at tea time', 'Saturday before the game',
          'Sunday after brunch', 'First day of the month', 'Last day of the year',
          'Midsummer\'s Eve', 'Midwinter\'s Day', 'Groundhog Day', 'Election Day', 
          'Super Bowl Sunday', 'Finals Week', 'Opening Day', 'Closing Day',
          'Summer Solstice', 'Winter Solstice', 'Spring Equinox', 'Autumn Equinox',
          'Full moon', 'New moon', 'A rainy day', 'A snowy day', 'A stormy morning', 
          'A foggy evening', 'A sunny afternoon', 'A breezy night', 'A humid day',
          'A chilly morning', 'A scorching afternoon', 'The day before vacation', 
          'The day after a holiday', 'A quiet weekday', 'A busy weekend',
          'The start of the season', 'The end of the month', 'Midweek', 'A typical Tuesday',
          'A lazy Sunday', 'A bustling Saturday market', 'A serene Friday sunset',
          'A wild Wednesday party', 'A thoughtful Thursday', 'A reflective evening',
          'A festive Friday', 'A solemn Monday', 'A vibrant Tuesday evening', 
          'A mellow Thursday morning', 'A festive Saturday night', 'A quiet Wednesday noon',
          'A lively Friday brunch', 'An early Monday workout', 'A late Sunday night movie',
          'A mid-Tuesday coffee break', 'A Thursday team lunch', 'A Wednesday deadline',
          'A Tuesday deadline', 'A Friday celebration', 'A Monday blues day', 
          'A Thursday rehearsal', 'A Saturday adventure', 'A Sunday relaxation',
          'A mid-month crisis', 'An end-of-week triumph', 'A start-of-week challenge', 
          'A mid-Saturday excitement', 'A Sunday evening reflection', 'A Friday night out',
          'A Tuesday morning meeting', 'A Wednesday afternoon walk', 'A Thursday workout',
          'A Friday gaming night', 'A Saturday cooking spree', 'A Sunday gardening day',
          'A Monday commute', 'A Tuesday deadline rush', 'A Wednesday project update', 
          'A Thursday brainstorming session', 'A Friday team outing', 'A Saturday road trip',
          'A Sunday staycation', 'A midweek surprise', 'A weekend getaway',
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
     * Fetches a random day from the daysOfWeek array.
     *
     * @return string A randomly selected day from the list.
     */
    public function getRandomDayOfWeek() {
        return $this->daysOfWeek[array_rand($this->daysOfWeek)];
    }

    /**
     * Adds a new day to the daysOfWeek array.
     * This method allows for the dynamic expansion of the day list.
     *
     * @param string $day The new day to add to the list.
     */
    public function addDayOfWeek($day) {
        $this->daysOfWeek[] = $day;
    }
}

?>
