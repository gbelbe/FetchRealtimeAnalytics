# FetchRealtimeAnalytics

###A simple PHP script to retrieve Google Analytics RealTime Visits from google API

-------------
Pre requisites to make it work:
------------
1. Register an access on google analytics API

Access Google Analytics' [Realtime API page](https://developers.google.com/analytics/devguides/reporting/realtime/v3/) and apply for an access (delivered within 24h) 

2. Activate API

Access [Google Developers Console](https://console.developers.google.com) then click on the menu ***API & auth -> API*** and activate the Google Analytics API.

3. Add Oauth2 Credentials

On the same Google Developer Console, menu ***API & Auth -> Credentials***
click on the top button: ***"Add credentials"*** . On the drop-down menu, select ***"Service Account"***, then select the ***.P12*** key type and download it. Copy also your newly created ***Client ID*** and  ***Service Account email***:
44772758989898-qolo6asbe2qpb9bnjkhjk0odq@developer.gserviceaccount.com

4. Access your google analytics account and add the Service Account Email as a new user (with Read Only access) 

5. Modify the index.php file with your own **Service Account Email** and **Client ID**.

5. Upload the **google-api** folder, the **index.php** and your newly created **client_secrets.p12** files

####Access your webpage: you should see the number of real-time visits each time you refresh the page.