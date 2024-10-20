<!-- Purpose: This file contains the functions that interact with the database. -->

<?php

require_once 'dbConfig.php';

// Insert records into the database
function insertRecords($pdo, $lastname, $firstname, $age, $skills, $dreamjob, $expectedsalary, $date_added) {
  $sql = "INSERT INTO profession (lastname, firstname, age, skills, dreamjob, expectedsalary, date_added) VALUES (?, ?, ?, ?, ?, ?, ?)";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$lastname, $firstname, $age, $skills, $dreamjob, $expectedsalary, $date_added]);
}

// Show all students table 
function showStudentRecords($pdo) {
  $sql = "SELECT * FROM profession";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  if ($stmt->rowCount() > 0) {
    $results = $stmt->fetchAll();
    return $results;
  } else {
    return false;
  }
}

// Getting student id
function getStudentId($pdo, $personID) {
  $sql = "SELECT * FROM profession WHERE personID = ?";
  $stmt = $pdo->prepare($sql);
  if ($stmt->execute([$personID])) {
    return $stmt->fetch();
}
}

// Update student records
function updateStudentRecords($pdo, $lastname, $firstname, $age, $skills, $dreamjob, $expectedsalary, $personID) {
  $sql = "UPDATE profession SET lastname = ?, firstname = ?, age = ?, skills = ?, dreamjob = ?, expectedsalary = ? WHERE personID= ?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$lastname, $firstname, $age, $skills, $dreamjob, $expectedsalary, $personID]);
}

// Delete student records
function deleteStudentRecords($pdo, $personID) {
  $sql = "DELETE FROM profession WHERE personID = ?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$personID]);
}
?>