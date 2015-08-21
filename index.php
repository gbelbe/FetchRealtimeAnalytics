<?php
//notasecret;
function getService()
{
  // Creates and returns the Analytics service object.

  // Load the Google API PHP Client Library.
  require_once 'google-api/src/Google/autoload.php';

  // Use the developers console and replace the values with your
  // service account email, and relative location of your key file.
  $service_account_email = '447727541860-qolo6asbe2qpb93ke4b9m1a636lb0odq@developer.gserviceaccount.com';
  $key_file_location = 'client_secrets.p12';

  // Create and configure a new client object.
  $client = new Google_Client();
  $client->setApplicationName("HelloAnalytics");
  $analytics = new Google_Service_Analytics($client);

  // Read the generated client_secrets.p12 key.
  $key = file_get_contents($key_file_location);
  $cred = new Google_Auth_AssertionCredentials(
      $service_account_email,
      array(Google_Service_Analytics::ANALYTICS_READONLY),
      $key
  );
  $client->setAssertionCredentials($cred);
  if($client->getAuth()->isAccessTokenExpired()) {
    $client->getAuth()->refreshTokenWithAssertion($cred);
  }

  return $analytics;
}

function getFirstprofileId(&$analytics) 

function getResults(&$analytics, 61330176) {
  // Calls the Core Reporting API and queries for the number of sessions
  // for the last seven days.
   return $analytics->data_ga->get(
       'ga:' . $profileId,
       '7daysAgo',
       'today',
       'ga:sessions');
}

function printResults(&$results) {
  // Parses the response from the Core Reporting API and prints
  // the profile name and total sessions.
  if (count($results->getRows()) > 0) {

    // Get the profile name.
    $profileName = $results->getProfileInfo()->getProfileName();

    // Get the entry for the first entry in the first row.
    $rows = $results->getRows();
    $sessions = $rows[0][0];

    // Print the results.
    print "First view (profile) found: $profileName\n";
    print "Total sessions: $sessions\n";
  } else {
    print "No results found.\n";
  }
}

$analytics = getService();
$profile = getFirstProfileId($analytics);
$results = getResults($analytics, $profile);
printResults($results);

?>