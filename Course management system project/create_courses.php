<?php
require_once "config.php";

// Define variables and initialize with empty values
$fname_err = $lname_err = $duration_err = $cradit_err = "";
$course_name = $course_code = $duration = $cradit = "";

// Processing input data when form is submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fname"])) {
    $fname_err = "This field is required*";
  } else {
    $course_name = trim($_POST["fname"]);
    if (!ctype_alpha($course_name)) {
      $fname_err = "Only letters are allowed";
    }
  }

  if (empty($_POST["lname"])) {
    $lname_err = "This field is required*";
  } else {
    $course_code = trim($_POST["lname"]);
    if (!ctype_alnum($course_code)) {
      $lname_err = "Only letters are allowed";
    }
  }

  if (empty($_POST["duration"])) {
    $duration_err = "This field is required*";
  } else {
    $duration = trim($_POST["duration"]);
  }

  if (empty($_POST["cradit"])) {
    $cradit_err = "This field is required*";
  } else {
    $cradit = trim($_POST["cradit"]);
  }

  // Check input errors before inserting data into database
  if (empty($fname_err) && empty($lname_err) && empty($course_err) && empty($cradit_err)) {
    // Prepare an insert statement
    $sql = "INSERT INTO courses (course_name, course_code, duration, cradit) VALUES (?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to a prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "ssis", $course_name, $course_code, $duration, $cradit);

      // Execute the statement
      if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('New record created successfully')</script>";
        echo "<script>window.location.href='http://localhost/php_crud/course.php';</script>";
        exit;
      } else {
        echo "Oops! Something went wrong. Please try again later";
      }
    }
    // Close statement
    mysqli_stmt_close($stmt);
  }
  // Close connection
  mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Data - PHP CRUD Application</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- custom css -->
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <div class="row justify-content-center pt-5">
      <div class="col-lg-6">
        <!-- form start -->
        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="bg-light p-4 shadow-sm" novalidate>
        <div class ="card-header">
        <h4 align="center">Add course
        <p class="text-end">
      <a href="course.php" class="btn btn-secondary">&laquo; Go back</a>
    </p>
      </h4></div>
          <div class="row">
            <div class="col-lg-6 mb-3">
              <label for="fname" class="form-label">course_name</label>
              <input type="text" name="fname" class="form-control" id="fname" value="<?= $course_name; ?>">
              <small class="text-danger"><?= $fname_err; ?></small>
            </div>

            <div class="col-lg-6 mb-3">
              <label for="lname" class="form-label">course_code</label>
              <input type="text" name="lname" class="form-control" id="lname" value="<?= $course_code; ?>">
              <small class="text-danger"><?= $lname_err; ?></small>
            </div>

            <div class="col-lg-6 mb-3">
              <label for="duration" class="form-label">duration</label>
              <input type="number" name="duration" class="form-control" id="duration" value="<?= $duration; ?>">
              <small class="text-danger"><?= $duration_err; ?></small>
            </div>

            <div class="col-lg-6 mb-3">
              <label for="cradit" class="form-label">cradit</label>
              <input type="text" name="cradit" class="form-control" id="cradit" value="<?= $cradit; ?>">
              <small class="text-danger"><?= $cradit_err; ?></small>
            </div>

            <div class="col-lg-12 mt-1">
              <input type="submit" class="btn btn-primary form-control" value="Create Record">
            </div>
          </div>
        </form>
        <!-- form end -->
      </div>
    </div>
  </div>
</body>

</html>