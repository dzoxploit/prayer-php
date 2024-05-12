<?php

class ApiController {
    private $subscriberModel;
    private $boxModel;
    private $songModel;

    public function __construct(Subscriber $subscriberModel, Box $boxModel, Song $songModel) {
        $this->subscriberModel = $subscriberModel;
        $this->boxModel = $boxModel;
        $this->songModel = $songModel;
    }

    // Example endpoint to retrieve all subscribers
    public function getAllSubscribers() {
        $subscribers = $this->subscriberModel->getAllSubscribers();
        echo json_encode($subscribers);
    }

    // Example endpoint to retrieve all boxes
    public function getAllBoxes() {
        $boxes = $this->boxModel->getAllBoxes();
        echo json_encode($boxes);
    }

    // Example endpoint to retrieve all songs
    public function getAllSongs() {
        $songs = $this->songModel->getAllSongs();
        echo json_encode($songs);
    }
    
    // Example endpoint to retrieve a subscriber by ID
    public function getSubscriberById($subscriberId) {
        $subscriber = $this->subscriberModel->getSubscriberById($subscriberId);
        echo json_encode($subscriber);
    }

    // Example endpoint to retrieve all boxes for a subscriber
    public function getBoxesBySubscriber($subscriberId) {
        $boxes = $this->boxModel->getBoxesBySubscriber($subscriberId);
        echo json_encode($boxes);
    }

    // Example endpoint to retrieve all songs for a box
    public function getSongsByBox($boxId) {
        $songs = $this->songModel->getSongsByBox($boxId);
        echo json_encode($songs);
    }

     // Example endpoint to create a new subscriber
    public function createSubscriber($subscriberName) {
        $subscriberId = $this->subscriberModel->createSubscriber($subscriberName);
        echo json_encode(["subscriber_id" => $subscriberId]);
    }

    // Example endpoint to create a new box
    public function createBox($boxData) {
        $boxId = $this->boxModel->createBox($boxData);
        echo json_encode(["box_id" => $boxId]);
    }

    // Example endpoint to create a new song
    public function createSong($songData) {
        $songId = $this->songModel->createSong($songData);
        echo json_encode(["song_id" => $songId]);
    }
     // Example endpoint to update a subscriber by ID
    public function updateSubscriber($subscriberId, $newName) {
        $success = $this->subscriberModel->updateSubscriber($subscriberId, $newName);
        echo json_encode(["success" => $success]);
    }

    // Example endpoint to update a box by ID
    public function updateBox($boxId, $boxData) {
        $success = $this->boxModel->updateBox($boxId, $boxData);
        echo json_encode(["success" => $success]);
    }

    // Example endpoint to update a song by ID
    public function updateSong($songId, $songData) {
        $success = $this->songModel->updateSong($songId, $songData);
        echo json_encode(["success" => $success]);
    }

    // Example endpoint to delete a subscriber by ID
    public function deleteSubscriber($subscriberId) {
        $success = $this->subscriberModel->deleteSubscriber($subscriberId);
        echo json_encode(["success" => $success]);
    }

    // Example endpoint to delete a box by ID
    public function deleteBox($boxId) {
        $success = $this->boxModel->deleteBox($boxId);
        echo json_encode(["success" => $success]);
    }

    // Example endpoint to delete a song by ID
    public function deleteSong($songId) {
        $success = $this->songModel->deleteSong($songId);
        echo json_encode(["success" => $success]);
    }

    public function getSongsByBoxAndDate($boxId, $date) {
        $songs = $this->songModel->getSongsByBoxAndDate($boxId, $date);
        echo json_encode($songs);
    }

    // Example endpoint to handle error notifications via email
    public function handleErrors($boxId, $prayerZone, $errorMessage) {
        $to = 'phu@expressinmusic.com';
        $subject = 'Error Notification';
        $message = "Box ID: $boxId, Prayer Zone: $prayerZone, Error Message: $errorMessage";
        $headers = 'From: your_email@example.com' . "\r\n" .
                   'Reply-To: your_email@example.com' . "\r\n" .
                   'X-Mailer: PHP/' . phpversion();

        // Send email notification
        $success = mail($to, $subject, $message, $headers);
        echo json_encode(["success" => $success]);
    }
}

?>
