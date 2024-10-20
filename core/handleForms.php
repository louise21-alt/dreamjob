<?php

require_once 'dbConfig.php';
require_once 'models.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission when the submit button is clicked
    if (isset($_POST['submitBtn'])) {
        $lastname = $_POST['lastname'] ?? '';
        $firstname = $_POST['firstname'] ?? '';
        $age = $_POST['age'] ?? '';
        $skills = $_POST['skills'] ?? '';
        $dreamjob = $_POST['dreamJob'] ?? '';
        $expectedsalary = $_POST['expectedsalary'] ?? '';
        $dateadded = date('Y-m-d H:i:s');

        if (!empty($lastname) && !empty($firstname) && !empty($age) && !empty($skills) && !empty($dreamjob) && !empty($expectedsalary)) {
            insertRecords($pdo, $lastname, $firstname, $age, $skills, $dreamjob, $expectedsalary, $dateadded);
            echo "Data has been successfully added!<br>";
        } else {
            echo "Failed to add data!<br>";
        }
        echo '<a href="../index.php">Go back to the homepage</a>';
    }

    // Handle editing a record when the edit button is clicked
    if (isset($_POST['editBtn'])) {
        $personID = $_POST['personID'] ?? '';
        $lastname = $_POST['lastname'] ?? '';
        $firstname = $_POST['firstname'] ?? '';
        $age = $_POST['age'] ?? '';
        $skills = $_POST['skills'] ?? '';
        $dreamjob = $_POST['dreamJob'] ?? '';
        $expectedsalary = $_POST['expectedsalary'] ?? '';

        if (!empty($personID) && !empty($lastname) && !empty($firstname) && !empty($age) && !empty($skills) && !empty($dreamjob) && !empty($expectedsalary)) {
            updateStudentRecords($pdo, $lastname, $firstname, $age, $skills, $dreamjob, $expectedsalary, $personID);
            echo "Record has been updated successfully!<br>";
        } else {
            echo "Unable to update the record!<br>";
        }
        echo '<a href="../index.php">Return to the homepage</a>';
    }

    // Handle deleting a record when the delete button is clicked
    if (isset($_POST['deleteBtn'])) {
        $personID = $_POST['personID'] ?? '';

        if (!empty($personID)) {
            deleteStudentRecords($pdo, $personID);
            echo "The record has been deleted successfully!<br>";
        } else {
            echo "Failed to delete the record!<br>";
        }
        echo '<a href="../index.php">Return to the homepage</a>';
    }
}

?>