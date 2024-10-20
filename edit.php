<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Record</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="title">
    <h1>PILOT</h1>
  </div>

  <?php $studentDetails = getStudentId($pdo, $_GET['personID']); ?>
  <div class="form">
    <form action="core/handleForms.php" method="POST">
      <input type="hidden" name="personID" value="<?php echo $studentDetails['personID']; ?>">
      <p>
        <label for="lastname">Last Name</label>
        <input type="text" name="lastName" value="<?php echo $studentDetails['lastname']; ?>" required>
      </p>
      <p>
        <label for="firstname">First Name</label>
        <input type="text" name="firstName" value="<?php echo $studentDetails['firstname']; ?>" required>
      </p>
      <p>
        <label for="age">Age</label>
        <input type="text" name="age" value="<?php echo $studentDetails['age']; ?>" required>
      </p>
      <p>
        <label for="skills">Skills</label>
        <input type="text" name="skills" value="<?php echo $studentDetails['skills']; ?>" required>
      </p>
      <p>
        <label for="dreamJob">Dream Job</label>
        <input type="text" name="dreamJob" value="<?php echo $studentDetails['dreamjob']; ?>" required>
      </p>
      <p>
        <label for="expectedsalary">Expected Salary</label>
        <input type="text" name="expectedsalary" value="<?php echo $studentDetails['expectedsalary']; ?>" required>
      </p>

      <div style="text-align: left; margin-top: 30px;">
        <input type="submit" name="editBtn" value="Update">
      </div>
    </form>
  </div>
</body>
</html>
