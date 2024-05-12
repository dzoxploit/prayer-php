<?php

class PrayerService {
    private $apiUrl;

    public function __construct($apiUrl) {
        $this->apiUrl = $apiUrl;
    }

    // Method to retrieve prayer times from the government website API
    public function getPrayerTimes($zone) {
        $url = $this->apiUrl . "?r=esolatApi/TakwimSolat&period=week&zone=" . urlencode($zone);
        $data = file_get_contents($url);

        if ($data === false) {
            return false; // Failed to fetch data
        }

        return json_decode($data, true);
    }
}

?>
