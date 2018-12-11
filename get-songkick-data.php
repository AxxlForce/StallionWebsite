<?php

    $apiKey = json_decode(file_get_contents('songkick-api-key.json'));

    // $calendar = json_decode(file_get_contents('https://api.songkick.com/api/3.0/artists/9780774/calendar.json?apikey=caCG37BcPKNgugXl'));
    $performances = json_decode(file_get_contents('https://api.songkick.com/api/3.0/artists/9780774/calendar/performances.json?apikey=' . $apiKey->key));

    for ($i = 0; $i < count($performances->resultsPage->results->performance); $i++)
    {
        // select array element
        $performance = $performances->resultsPage->results->performance[$i];

        // create object in result array
        $processedEvents[$i] = new stdClass();

        if (strcmp($performance->event->type, 'Festival') == 0)
        {
            $processedEvents[$i]->isFestival = true;
            $processedEvents[$i]->festivalName = $performance->event->series->displayName;
            $processedEvents[$i]->venue = $performance->event->venue->displayName;
        }
        else
        {
            $processedEvents[$i]->isFestival = false;
            $processedEvents[$i]->festivalName = NULL;
            $processedEvents[$i]->venue = $performance->event->venue->displayName;
        }

        if (is_null($performance->date) == false)
        {
            $processedEvents[$i]->date = $performance->date;
        }
        else
        {
            $processedEvents[$i]->date = $performance->event->start->date;
        }

        $processedEvents[$i]->city = $performance->event->venue->metroArea->displayName;
        $processedEvents[$i]->country = $performance->event->venue->metroArea->country->displayName;
    }

    echo json_encode($processedEvents);
?>