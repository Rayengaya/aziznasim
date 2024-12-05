<?php
// controller/reclamationcontroller.php

require_once '../model/Reclamation.php';
require_once '../config/database.php'; // Assume this connects to the DB

class ReclamationController
{
    private $reclamation;

    public function __construct($db)
    {
        $this->reclamation = new Reclamation($db);
    }

    public function updateReclamation($id, $first_name, $last_name, $email, $subject, $gender)
    {
        if ($this->reclamation->updateReclamation($id, $first_name, $last_name, $email, $subject, $gender)) {
            return "Reclamation updated successfully!";
        } else {
            return "Failed to update reclamation.";
        }
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new PDO('mysql:host=localhost;dbname=your_database', 'username', 'password'); // Update with your DB info
    $controller = new ReclamationController($db);

    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $gender = $_POST['gender'];

    echo $controller->updateReclamation($id, $first_name, $last_name, $email, $subject, $gender);
}
?>
