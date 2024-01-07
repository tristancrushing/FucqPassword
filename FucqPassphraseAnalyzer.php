<?php
/**
 * Class FucqPassphraseAnalyzer
 * 
 * This class is designed to analyze, rank, and score passphrases based on entropy and memorability. 
 * It utilizes a combination of methods to assess the complexity and user-friendliness of passphrases. 
 * The analysis includes calculating entropy as a measure of randomness and memorability as an 
 * indicator of how easily a passphrase can be remembered by a user. This class provides a robust 
 * approach to determining the effectiveness of passphrases in a security context, balancing 
 * the need for complexity with the practicality of user recall.
 * 
 * Author: Tristan McGowan
 * Contact: tristan@ipspy.net
 */
class FucqPassphraseAnalyzer {
    /**
     * Analyzes and ranks passphrases based on entropy and memorability.
     * 
     * This function takes an array of analyzed passphrases, calculates their entropy and 
     * memorability scores, and then ranks them based on the total score. Entropy is a measure 
     * of the randomness or complexity of the passphrase, while memorability reflects how easy 
     * it is to remember the passphrase. Both scores are calculated on a scale from 0 to 10.
     * 
     * The ranking process involves calculating individual scores for entropy and memorability 
     * for each passphrase. These scores are then summed up to derive a total score. The 
     * passphrases are then sorted in descending order of their total scores, with higher scores 
     * indicating better balance between security (entropy) and usability (memorability).
     * 
     * The function returns an array of passphrases along with their individual entropy, 
     * memorability, and total scores. This ranked list can be used to select optimal passphrases 
     * that balance security and ease of use.
     * 
     * @param array $analysisData The analysis data returned from analyzePassphraseWithGPT4.
     * @return array Ranked passphrases with scores. Each element contains the passphrase, 
     *               its entropy score, memorability score, and total score.
     */
    public function rankPassphrases(array $analysisData): array {
        $passphrases = $analysisData['passphrases'];
        $rankedPassphrases = [];
    
        foreach ($passphrases as $passphrase) {
            $entropy = $this->calculateEntropy($passphrase);
            $memorability = $this->calculateMemorability($passphrase);
            $totalScore = $entropy + $memorability;
    
            $rankedPassphrases[] = [
                'passphrase' => $passphrase,
                'entropy_score' => $entropy,
                'memorability_score' => $memorability,
                'total_score' => $totalScore
            ];
        }
    
        // Sort passphrases by total score in descending order
        usort($rankedPassphrases, function ($a, $b) {
            return $b['total_score'] <=> $a['total_score'];
        });
    
        return $rankedPassphrases;
    }


    /**
     * Calculates the entropy of a passphrase.
     * 
     * Entropy is a measure of randomness or unpredictability in a passphrase. This function 
     * calculates the entropy of a given passphrase by analyzing the frequency and distribution 
     * of characters within it. A higher entropy value indicates a more complex and secure passphrase.
     * 
     * The entropy is calculated based on the number of unique characters and the total length 
     * of the passphrase. The ratio of unique characters to the total length gives an initial 
     * entropy score. This score is then scaled to a 0-10 range to provide a standardized measure.
     * 
     * Note: This function provides a basic measure of entropy and is suitable for general purposes.
     * However, it does not consider character type diversity (such as numbers, symbols, uppercase, 
     * and lowercase letters) or common patterns that might make a passphrase more predictable. For 
     * more advanced security applications, a more comprehensive entropy calculation method should be employed.
     *
     * @param string $passphrase The passphrase to analyze.
     * @return float The entropy score, scaled to a 0-10 range.
     */
    private function calculateEntropy(string $passphrase): float {
        // Count the number of unique characters in the passphrase
        $uniqueChars = count(array_unique(str_split($passphrase)));
    
        // Get the total length of the passphrase
        $length = strlen($passphrase);
    
        // Calculate the basic entropy score
        $entropy = ($uniqueChars / $length);
    
        // Scale the entropy score to a 0-10 range for standardization
        // Note: The scaling factor can be adjusted based on security requirements
        $scaledEntropy = $entropy * 10;
    
        return $scaledEntropy;
    }


   /**
     * Calculates the memorability of a passphrase.
     * 
     * Memorability is a measure of how easily a passphrase can be remembered by a human. This function 
     * calculates the memorability of a passphrase based on its word and syllable counts. The rationale 
     * is that passphrases with a moderate number of words and syllables are generally easier to remember.
     * 
     * The function uses an ideal word and syllable count (set here as 10 for demonstration), and 
     * calculates how far the passphrase deviates from this ideal. A lower deviation results in a higher 
     * memorability score. The final score is scaled to a 0-10 range.
     * 
     * Note: This is a basic approach to estimate memorability. It assumes that passphrases with 
     * approximately 10 words and 10 syllables are optimal for memorability. However, other factors like 
     * word complexity, phrase structure, and linguistic fluency can also significantly impact memorability. 
     * For more nuanced assessments, these factors should be considered.
     *
     * @param string $passphrase The passphrase to analyze.
     * @return float The memorability score, scaled to a 0-10 range.
     */
    private function calculateMemorability(string $passphrase): float {
        // Count the number of words in the passphrase
        $words = str_word_count($passphrase);
    
        // Count the number of syllables in the passphrase
        // Assumes the existence of a function countSyllables that accurately counts syllables
        $syllables = $this->countSyllables($passphrase);
    
        // Ideal counts for words and syllables for optimal memorability
        $idealCount = 10;
    
        // Calculate the deviation from the ideal for both words and syllables
        $wordDeviation = abs($idealCount - $words);
        $syllableDeviation = abs($idealCount - $syllables);
    
        // Calculate the memorability score, inversely proportional to the deviations
        $memorabilityScore = (10 - ($wordDeviation + $syllableDeviation) / 2);
    
        // Ensure the score is within the 0-10 range
        $memorabilityScore = max(0, min($memorabilityScore, 10));
    
        return $memorabilityScore;
    }


    /**
     * Counts the number of syllables in a phrase.
     * 
     * This function provides a basic approximation of syllable counting for a given English phrase. 
     * It primarily counts the groups of vowels as an initial estimate for syllables. The algorithm
     * considers each contiguous group of vowels (a, e, i, o, u, y) as a single syllable. 
     * 
     * Additionally, it includes adjustments for common exceptions in English syllabification. 
     * For example, it subtracts a syllable count for silent 'e' at the end of words. However, 
     * this method is not comprehensive and may not accurately count syllables for words with 
     * complex syllabic structures or where pronunciation significantly varies from spelling.
     * 
     * It's also important to note that every word is assumed to have at least one syllable. 
     * Therefore, the function ensures that the syllable count is not less than the number of words.
     * 
     * While this method provides a reasonable approximation for syllable counting, it is not 
     * foolproof. For more accurate and nuanced syllable counting, a more sophisticated natural 
     * language processing approach or a dedicated library would be required.
     *
     * @param string $phrase The phrase to analyze.
     * @return int The syllable count.
     */
    private function countSyllables(string $phrase): int {
        // Lowercase the phrase to standardize
        $phrase = strtolower($phrase);
        // Count vowel groups as a basic approximation of syllables
        $count = preg_match_all('/[aeiouy]+/', $phrase, $matches);
    
        // Adjust count for specific exceptions
        // Example: subtract 1 for each occurrence of 'e' at the end of a word
        $count -= preg_match_all('/e\b/', $phrase, $matches);
    
        // Ensure count is at least 1 for each word (every word has at least one syllable)
        $wordCount = str_word_count($phrase);
        $count = max($count, $wordCount);
    
        return $count;
    }

}

?>
