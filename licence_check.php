<?php
/**
 * DVLA Licence Status Check
 *
 * @category File
 * @package  DVSATestCheck
 * @author   Craig Watson <craig@cwatson.org>
 * @license  https://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @link     https://github.com/craigwatson/dvsa-test-check
 */

// Script set-up
date_default_timezone_set('Europe/London');
$include_dir = dirname(__FILE__);

// Include DOM parser + script functions
require_once "$include_dir/inc/simple_html_dom.php";
require_once "$include_dir/inc/functions.php";

// Error if secrets file not found
if (!is_file("$include_dir/secrets.php")) {
    die(logger("Secrets file not found at $include_dir/secrets.php", "ERROR"));
} else {
    include_once "$include_dir/secrets.php";
}

// System Variables
$email_subject = "Driving Licence Status Check";
$user_agent    = 'Mozilla/5.0';

// Loop through checks to make
foreach ($licence_data as $name => $data) {
     logger("========= Running Check for: $name");
     runLicenceCheck($data);
}

?>
