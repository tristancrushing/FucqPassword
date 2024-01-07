<?php
/**
 * FucqTimesOfDayList Class
 *
 * As a component of the Fucq (Flexible, Unique, Creative, Quick) suite, this class encapsulates
 * a comprehensive list of times of day. It includes standard times, specific moments, and unique
 * periods, enhancing applications that require a nuanced representation of time, such as in
 * storytelling, event planning, or creative passphrase generation.
 *
 * Author: Tristan McGowan
 * Contact: tristan@ipspy.net
 */
class FucqTimesOfDayList {
    /**
     * @var array $timesOfDay An extensive and varied list of times of day.
     */
    private $timesOfDay;

    /**
     * Constructor to initialize the timesOfDay array.
     * The array is populated with a broad spectrum of times to cater to diverse needs.
     */
    public function __construct() {
        // Initialize the array with a range of times of day, including more specific times
        $this->timesOfDay = [
          'morning', 'afternoon', 'evening', 'midnight', 'noon', 
          'dawn', 'dusk', 'daybreak', 'nightfall', 'early morning', 
          'late night', 'lunchtime', 'teatime', 'bedtime', 'sunrise', 
          'sunset', 'brunch time', 'happy hour', 'rush hour', 'the witching hour',
          'high noon', 'the dead of night', 'the small hours', 'the wee hours', 'predawn',
          'early afternoon', 'mid-morning', 'late afternoon', 'early evening', 'late evening',
          'midday', 'cocktail hour', 'dinner time', 'snack time', 'study time',
          'work hours', 'leisure time', 'nap time', 'break time', 'playtime',
          'golden hour', 'blue hour', 'peak hour', 'off-peak hours', 'quiet hours',
          'office hours', 'closing time', 'opening time', 'showtime', 'game time',
          'exercise time', 'meditation time', 'reading time', 'writing time', 'painting time',
          'gardening time', 'cooking time', 'cleaning time', 'shopping time', 'family time',
          'party time', 'movie time', 'music time', 'dance time', 'art time',
          'study hour', 'lunch break', 'coffee break', 'tea break', 'siesta time',
          'workout time', 'training time', 'travel time', 'commute time', 'rush minute',
          'magic hour', 'twilight', 'gloaming', 'eventide', 'night',
          'daylight', 'broad daylight', 'starry night', 'full moon night', 'new moon night',
          'eclipse', 'solstice', 'equinox', 'season change', 'holiday season',
          'vacation time', 'weekend', 'weekday', 'school hours', 'exam time',
          'deadline hour', 'meeting time', 'appointment time', 'consultation hour', 'visiting hours',
          'early bird hour', 'night owl moment', 'after school', 'pre-dawn', 'post-sunset',
          'midnight snack time', 'after-party hours', 'pre-workout', 'post-workout', 'afternoon siesta',
          'morning rush', 'evening calm', 'lunch rush', 'dinner prep time', 'midnight musings',
          'first light', 'last light', 'witching hour', 'vampire hour', 'ghost hour',
          'dawn patrol', 'twilight zone', 'happy minutes', 'quiet reflection time', 'afternoon hustle',
          'morning meditation', 'evening relaxation', 'noonday sun', 'pre-lunch', 'post-dinner',
          'second breakfast time', 'elevenses', 'afternoon tea', 'pre-evening', 'post-midnight',
          'early dusk', 'late dawn', 'morning golden hour', 'evening golden hour', 'lunch hour',
          'candlelight time', 'moonrise', 'sunfall', 'day’s end', 'night’s start',
          // ... continue adding as needed
      ];

    }

    /**
     * Demonstrates the usage of the FucqTimesOfDayList class.
     * Mainly for testing and educational purposes.
     */
    public function __run_example_usage() {
        // Example usage:
        $timesOfDayList = new FucqTimesOfDayList();
        echo $timesOfDayList->getRandomTimeOfDay();
    }

    /**
     * Fetches a random time of day from the timesOfDay array.
     *
     * @return string A randomly selected time of day from the list.
     */
    public function getRandomTimeOfDay() {
        return $this->timesOfDay[array_rand($this->timesOfDay)];
    }

    /**
     * Adds a new time of day to the timesOfDay array.
     * Enables dynamic expansion of the time list for customized and creative uses.
     *
     * @param string $time The new time of day to be added.
     */
    public function addTimeOfDay($time) {
        $this->timesOfDay[] = $time;
    }
}

?>
