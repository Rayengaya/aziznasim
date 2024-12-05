<?php
// model/Reclamation.php

class Reclamation
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function updateReclamation($id, $first_name, $last_name, $email, $subject, $gender)
    {
        $sql = "UPDATE `crud` 
                SET `first_name` = ?, `last_name` = ?, `email` = ?, `subject` = ?, `gender` = ? 
                WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$first_name, $last_name, $email, $subject, $gender, $id]);
    }
}
?>
