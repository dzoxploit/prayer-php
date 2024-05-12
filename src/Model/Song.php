<?php

class Song {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    // Example method to fetch all songs
    public function getAllSongs() {
        $stmt = $this->pdo->query("SELECT * FROM songs");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Create a new song
    public function createSong($songData) {
        $stmt = $this->pdo->prepare("INSERT INTO songs (song_title, subs_id, box_id, prayer_zone, prayertimedate, prayertimeseq, prayertime) VALUES (:song_title, :subs_id, :box_id, :prayer_zone, :prayertimedate, :prayertimeseq, :prayertime)");
        $stmt->execute($songData);
        return $this->pdo->lastInsertId();
    }


    // Retrieve songs by box ID and date
    public function getSongsByBoxAndDate($boxId, $date) {
        $stmt = $this->pdo->prepare("SELECT * FROM songs WHERE box_id = :box_id AND prayertimedate = :date");
        $stmt->execute(['box_id' => $boxId, 'date' => $date]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Retrieve songs by box ID
    public function getSongsByBox($boxId) {
        $stmt = $this->pdo->prepare("SELECT * FROM songs WHERE box_id = ?");
        $stmt->execute([$boxId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Update a song
    public function updateSong($songId, $songData) {
        $stmt = $this->pdo->prepare("UPDATE songs SET song_title = :song_title, subs_id = :subs_id, box_id = :box_id, prayer_zone = :prayer_zone, prayertimedate = :prayertimedate, prayertimeseq = :prayertimeseq, prayertime = :prayertime WHERE song_id = :song_id");
        $songData['song_id'] = $songId;
        $stmt->execute($songData);
        return $stmt->rowCount();
    }

    // Delete a song
    public function deleteSong($songId) {
        $stmt = $this->pdo->prepare("DELETE FROM songs WHERE song_id = ?");
        $stmt->execute([$songId]);
        return $stmt->rowCount();
    }

}
