<?php
// Creates and returns the Analytics service object.
// Load the Google API PHP Client Library.

require_once 'google-api/src/Google/autoload.php';



/**
 * 1. create project at https://console.developers.google.com/project
 * 2. enable 'Analytics API' under 'APIs & auth' / APIs
 * 3. create 'NEW CLIENT ID' (OAuth client) under 'APIs & auth' / Credentials
 *    i.  select 'Service account'
 *    ii. save generated key file to 'key.p12'
 *    iii. remember CLIENT ID
 * 4. under GA account add 'Read & Analyze' access to newly generated email (access to GA Account not Property nor View)
 * 5. get View ID. go to GA Admin section, select proper Account, than proper Property, than proper View.
      Under View click on 'View settings' and copy the number below 'View ID' (that is your GA_VIEW_ID number)
 * 5. download google php library https://github.com/google/google-api-php-client
 * 6. use the code below, use info from google API console (1.)
 *    doc here: https://developers.google.com/analytics/devguides/reporting/realtime/v3/reference/data/realtime/get 
 *    real time metrics doc: https://developers.google.com/analytics/devguides/reporting/realtime/dimsmets/
 */


$CLIENT_ID = '447727541860-hd9u52fs8ndhjdjlib41h33rqrv5jkh0.apps.googleusercontent.com';
$CLIENT_ACCOUNT_EMAIL = '447727541860-qolo6asbe2qpb93ke4b9m1a636lb0odq@developer.gserviceaccount.com';
$SCOPE = 'https://www.googleapis.com/auth/analytics.readonly';
$KEY_FILE = 'client_secrets.p12';
$GA_VIEW_ID = 'ga:61330176';

$client = new Google_Client();
$client->setClientId($CLIENT_ID);
$client->setAssertionCredentials(
    new Google_Auth_AssertionCredentials(
        $CLIENT_ACCOUNT_EMAIL,
        array($SCOPE),
        file_get_contents($KEY_FILE)
    )

var_dump($client);
);

$service = new Google_Service_Analytics($client);
try {
    $result = $service->data_realtime->get(
        $GA_VIEW_ID,
        'rt:activeVisitors'
    );

	//print the number of visitors realtime
    echo "<".$result->totalsForAllResults['rt:activeVisitors'].">";
        
} catch(Exception $e) {
    var_dump($e);
}
?>