<?php
/**
 * Constants Configuration File
 *
 * Used to store application-wide constants, such as API keys and other configuration items.
 * Ensure this file is properly secured and not accessible publicly.
 *
 * Author: Tristan McGowan
 * Contact: tristan@ipspy.net
 */

require_once 'IpspyProductionApiKeys.php';

// Define the OpenAI API Key
define('OPENAI_API_KEY', 'your_openai_api_key_here');

define('IPSPY_PRODUCTION_API_KEYS', (new IpspyProductionApiKeys())->getApiKeys());

?>
