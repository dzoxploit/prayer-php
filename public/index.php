<?php

// Autoloader for loading classes
spl_autoload_register(function ($className) {
    require_once __DIR__ . '/../' . str_replace('\\', '/', $className) . '.php';
});

// Sample usage of the API controller
use Controller\ApiController;
use Util\EmailService;
use Service\PrayerService;
use Service\VoiceService;

// Instantiate necessary services
$emailService = new EmailService('your_email@example.com');
$prayerService = new PrayerService('https://www.e-solat.gov.my/index.php');
$voiceService = new VoiceService('/path/to/voiceovers');

// Instantiate API controller
$apiController = new ApiController($emailService, $prayerService, $voiceService);

// Sample usage of the API controller methods
// $apiController->getAllSubscribers();
// $apiController->getAllBoxes();
// $apiController->getAllSongs();
// $apiController->createSubscriber('John Doe');
// $apiController->createBox(['box_name' => 'Box A', 'prayerzone' => 'JHR01', 'subs_id' => 1]);
// $apiController->createSong(['song_title' => 'Voiceover 1', 'subs_id' => 1, 'box_id' => 1, 'prayerzone' => 'JHR01', 'prayertimedate' => '2024-05-12', 'prayertimeseq' => 1, 'prayertime' => '06:00:00']);
// $apiController->updateSubscriber(1, 'Jane Doe');
// $apiController->updateBox(1, ['box_name' => 'Updated Box A', 'prayerzone' => 'JHR02']);
// $apiController->updateSong(1, ['song_title' => 'Updated Voiceover 1']);
// $apiController->deleteSubscriber(1);
// $apiController->deleteBox(1);
// $apiController->deleteSong(1);

// Handle API requests
$request = $_SERVER['REQUEST_URI'];
switch ($request) {
    case '/api/subscribers':
        $apiController->getAllSubscribers();
        break;
    case '/api/boxes':
        $apiController->getAllBoxes();
        break;
    case '/api/songs':
        $apiController->getAllSongs();
        break;
    case '/api/create-subscriber':
        // Example: $apiController->createSubscriber($_POST['subscriberName']);
        break;
    case '/api/create-box':
        // Example: $apiController->createBox($_POST);
        break;
    case '/api/create-song':
        // Example: $apiController->createSong($_POST);
        break;
    // Add more API routes as needed...
    default:
        http_response_code(404);
        echo json_encode(["error" => "Endpoint not found"]);
        break;
}

?>
