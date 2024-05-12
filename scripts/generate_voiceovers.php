<?php

// Include necessary classes
require_once __DIR__ . '/../Model/Subscriber.php';
require_once __DIR__ . '/../Model/Box.php';
require_once __DIR__ . '/../Model/Song.php';
require_once __DIR__ . '/../Util/EmailService.php';
require_once __DIR__ . '/../Service/PrayerService.php';
require_once __DIR__ . '/../Service/VoiceService.php';

// Set up database connection (assuming you have a DB connection)

// Instantiate necessary services
$emailService = new EmailService('your_email@example.com');
$prayerService = new PrayerService('https://www.e-solat.gov.my/index.php');
$voiceService = new VoiceService('/path/to/voiceovers');

// Fetch all boxes with prayer time enabled
$boxes = Box::getAllBoxesWithPrayerTimeEnabled();

foreach ($boxes as $box) {
    // Retrieve prayer times for the box's prayer zone
    $prayerTimes = $prayerService->getPrayerTimes($box['prayerzone']);

    if ($prayerTimes) {
        // Loop through prayer times and generate voiceovers
        foreach ($prayerTimes as $prayerTime) {
            $prayerDateTime = $prayerTime['date'] . ' ' . $prayerTime['time'];
            $voiceoverFile = $box['box_name'] . '_' . $prayerTime['prayer'] . '_' . $prayerTime['date'] . '.mp3';

            // Check if voiceover already exists for this prayer time
            if (!Song::voiceoverExists($box['box_id'], $prayerTime['prayer'], $prayerTime['date'])) {
                // Generate voiceover and save it
                $success = $voiceService->generateVoiceover($prayerTime['prayer'], $prayerDateTime, $voiceoverFile);

                if ($success) {
                    // Save voiceover information to the database
                    Song::saveVoiceover($box['box_id'], $prayerTime['prayer'], $prayerTime['date'], $voiceoverFile);
                } else {
                    // Handle error: Unable to generate voiceover
                    $errorMessage = "Error generating voiceover for prayer time: {$prayerTime['prayer']} - {$prayerTime['date']}";
                    $emailService->sendEmail('phu@expressinmusic.com', 'Voiceover Generation Error', $errorMessage);
                }
            }
        }
    } else {
        // Handle error: Unable to fetch prayer times
        $errorMessage = "Error fetching prayer times for box: {$box['box_name']}";
        $emailService->sendEmail('phu@expressinmusic.com', 'Prayer Time Fetching Error', $errorMessage);
    }
}

?>
