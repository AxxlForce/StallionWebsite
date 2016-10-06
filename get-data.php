<?php

    header('Content-type: application/json');

    include_once __DIR__ . '/vendor/autoload.php';

    $client = new Google_Client();

    $client->setAuthConfig('service_account.json');

    $client->setApplicationName("StallionWebsiteWebclient");
    $client->setScopes(['https://www.googleapis.com/auth/calendar.readonly']);
    $service = new Google_Service_Calendar($client);

    // make actual request
    $calendarId = 'n0b4gm9cka0hbu3scjuip8nvag@group.calendar.google.com';
    $optParams = array(
      'timeMin' => date('c'),
      'maxResults' => 100,
      'singleEvents' => TRUE,
      'orderBy' => 'startTime',
    );
    $results = $service->events->listEvents($calendarId, $optParams);
    $events = $results->getItems();

    echo json_encode($events)

?>