<?php

namespace Util;

class EmailService {
    private $senderEmail;

    public function __construct($senderEmail) {
        $this->senderEmail = $senderEmail;
    }

    // Method to send an email notification
    public function sendEmail($recipient, $subject, $message) {
        $headers = 'From: ' . $this->senderEmail . "\r\n" .
                   'Reply-To: ' . $this->senderEmail . "\r\n" .
                   'X-Mailer: PHP/' . phpversion();

        return mail($recipient, $subject, $message, $headers);
    }
}

?>
