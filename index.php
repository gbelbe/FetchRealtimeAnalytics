
<?php
// api dependencies
define('PATH_TO_API', 'google-api/src/'); 

$googleClientPath = PATH_TO_API . 'Google/Client.php';
$googleAnalyticsPath = PATH_TO_API . 'Google/Service/Analytics.php';

echo $googleClientPath;
echo $googleAnalyticsPath;

require_once(PATH_TO_API . 'Google/Client.php');
require_once(PATH_TO_API . 'Google/Service/Analytics.php');

// create client object and set app name
$client = new Google_Client();
$client->setApplicationName(APP_NAME); // name of your app

// set assertion credentials
$client->setAssertionCredentials(
  new Google_Auth_AssertionCredentials(

    APP_EMAIL, // email you added to GA

    array('https://www.googleapis.com/auth/analytics.readonly'),

    file_get_contents(PATH_TO_PRIVATE_KEY_FILE)  // keyfile you downloaded

));

// other settings
$client->setClientId(CLIENT_ID);           // from API console
$client->setAccessType('offline_access');  // this may be unnecessary?

// create service and get data
$service = new Google_Service_Analytics($client);
$service->data_ga->get($ids, $startDate, $endDate, $metrics, $optParams);

php?>
