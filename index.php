<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dream Job</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <div class="title">
    <h1>PILOT</h1>
  </div>

  <div class="form">
    <form action="core/handleForms.php" method="POST">
      <!-- Required fields to ensure no null answers -->
      <p>
        <label for="lastname">Last Name:</label>
        <input type="text" name="lastname" required>
      </p>
      <p>
        <label for="firstname">First Name:</label>
        <input type="text" name="firstname" required>
      </p>
      <p>
        <label for="age">Age:</label>
        <input type="number" name="age" required>
      </p>
      <p>
        <label for="skills">Skills:</label>
        <input type="text" name="skills" required>
      </p>
      <p>
        <label for="dreamJob">Dream Job:</label>
        <input type="text" name="dreamJob" required>
      </p>
      <p>
        <label for="expectedsalary">Expected Salary:</label>
        <input type="number" name="expectedsalary" required>
      </p>
      <p>
        <label for="date">Date Created:</label>
        <input type="date" name="date" required>
      </p>
      <p style="display: flex; justify-content: left;">
        <input type="submit" name="submitBtn" value="Submit">
      </p>
    </form>
  </div>

  <div class="testGlobal" style="text-align: center; margin-top: 50px;">
    <a href="testGetVariable.php?studentLastName=Ordillano&Age=22">Test Get SuperGlobal</a>
  </div>

  <div class="table" style="padding: 30px;">
    <?php $showStudentRecords = showStudentRecords($pdo); ?>
    <?php if ($showStudentRecords) : ?>
      <table border="1" style="margin: 0 auto; text-align: left; width: 65%">
        <thead>
          <tr>
            <th>ID</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Age</th>
            <th>Skills</th>
            <th>Dream Job</th>
            <th>Expected Salary</th>
            <th>Date Created</th>
            <th>Modify</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($showStudentRecords as $student) : ?>
            <tr>
              <td><?php echo $student['personID']; ?></td>
              <td><?php echo $student['lastname']; ?></td>
              <td><?php echo $student['firstname']; ?></td>
              <td><?php echo $student['age']; ?></td>
              <td><?php echo $student['skills']; ?></td>
              <td><?php echo $student['dreamjob']; ?></td>
              <td><?php echo $student['expectedsalary']; ?></td>
              <td><?php echo $student['date_added']; ?></td>
              <td>
                <a href="edit.php?personID=<?php echo $student['personID']; ?>">Edit</a>
                <a href="delete.php?personID=<?php echo $student['personID']; ?>">Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php else : ?>
      <p style="text-align: center;">No student records found!</p>
    <?php endif; ?>
  </div>
</body>
</html>