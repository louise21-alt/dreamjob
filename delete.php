<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete Confirmation</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="title">
    <h1>PILOT</h1>
  </div>

  <?php $studentDetails = getStudentId($pdo, $_GET['personID']); ?>
  <div class="form">
    <form action="core/handleForms.php" method="POST">
      <h2 style="text-align: center;">Are you sure you want to delete this user?</h2>
      <input type="hidden" name="personID" value="<?php echo $studentDetails['personID']; ?>" readonly>
      <p>
        <label for="lastName">Last Name</label>
        <input type="text" name="lastName" value="<?php echo $studentDetails['lastname']; ?>" readonly>
      </p>
      <p>
        <label for="firstName">First Name</label>
        <input type="text" name="firstName" value="<?php echo $studentDetails['firstname']; ?>" readonly>
      </p>
      <p>
        <label for="age">Age</label>
        <input type="text" name="age" value="<?php echo $studentDetails['age']; ?>" readonly>
      </p>
      <p>
        <label for="skills">Skills</label>
        <input type="text" name="skills" value="<?php echo $studentDetails['skills']; ?>" readonly>
      </p>
      <p>
        <label for="dreamJob">Dream Job</label>
        <input type="text" name="dreamJob" value="<?php echo $studentDetails['dreamjob']; ?>" readonly>
      </p>
      <p>
        <label for="expectedSalary">Expected Salary</label>
        <input type="text" name="expectedSalary" value="<?php echo $studentDetails['expectedsalary']; ?>" readonly>
      </p>
      <div style="text-align: left; margin-top: 50px;">
        <input type="submit" name="deleteBtn" value="Delete">
      </div>
    </form>
  </div>
</body>
</html>
