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

    // of type Events.php
    $events = $service->events;

    // list of items of type Event.php
    $eventItems = $events->listEvents($calendarId, $optParams)->getItems();

    // compose an result object, we're only interested in summary, location and dateTime atm
    // don't know if this is considered proper php code, works though
    $result = array();
    for ($i = 0; $i < count($eventItems); $i++)
    {
        $result[$i]->{summary} = $eventItems[$i]->getSummary();
        $result[$i]->{location} = $eventItems[$i]->getLocation();
        $result[$i]->{startDate} = $eventItems[$i]->getStart()->getDateTime();
    }

    echo json_encode($result);

?>
