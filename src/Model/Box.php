<?php

class Box {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    // Example method to fetch all boxes
    public function getAllBoxes() {
        $stmt = $this->pdo->query("SELECT * FROM boxes");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Retrieve a box by ID
    public function getBoxById($boxId) {
        $stmt = $this->pdo->prepare("SELECT * FROM boxes WHERE box_id = ?");
        $stmt->execute([$boxId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update a box
    public function updateBox($boxId, $boxData) {
        $stmt = $this->pdo->prepare("UPDATE boxes SET box_name = :box_name, prayer_zone = :prayer_zone, subs_id = :subs_id WHERE box_id = :box_id");
        $boxData['box_id'] = $boxId;
        $stmt->execute($boxData);
        return $stmt->rowCount();
    }

    // Delete a box
    public function deleteBox($boxId) {
        $stmt = $this->pdo->prepare("DELETE FROM boxes WHERE box_id = ?");
        $stmt->execute([$boxId]);
        return $stmt->rowCount();
    }


    // Add more methods as needed...
}
