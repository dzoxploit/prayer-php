<?php

class Subscriber {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function createSubscriber($subscriberName) {
        $stmt = $this->pdo->prepare("INSERT INTO subscribers (subs_name) VALUES (?)");
        $stmt->execute([$subscriberName]);
        return $this->pdo->lastInsertId();
    }

    // Retrieve all subscribers
    public function getAllSubscribers() {
        $stmt = $this->pdo->query("SELECT * FROM subscribers");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Retrieve a subscriber by ID
    public function getSubscriberById($subscriberId) {
        $stmt = $this->pdo->prepare("SELECT * FROM subscribers WHERE subs_id = ?");
        $stmt->execute([$subscriberId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update a subscriber by ID
    public function updateSubscriber($subscriberId, $newName) {
        $stmt = $this->pdo->prepare("UPDATE subscribers SET subs_name = ? WHERE subs_id = ?");
        $stmt->execute([$newName, $subscriberId]);
        return $stmt->rowCount() > 0;
    }

    // Delete a subscriber by ID
    public function deleteSubscriber($subscriberId) {
        $stmt = $this->pdo->prepare("DELETE FROM subscribers WHERE subs_id = ?");
        $stmt->execute([$subscriberId]);
        return $stmt->rowCount() > 0;
    }
}
