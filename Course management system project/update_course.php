<?php
include "config.php";

// Define variables and initialize with empty values
$fname_err = $lname_err = $email_err = $course_err = $cradit_err = $duration_err = $state_err = "";
$course_name = $course_code = $email = $course = $cradit = $duration = $state = "";

// Process update operation when form is submit
if (isset($_POST["id"]) && !empty($_POST["id"])) {
  // Get post id
  $id = $_POST["id"];

  if (empty($_POST["fname"])) {
    $fname_err = "*this field is required";
  } else {
    $course_name = trim($_POST["fname"]);
  }

  if (empty($_POST["lname"])) {
    $lname_err = "*This field is required";
  } else {
    $course_code = trim($_POST["lname"]);
  }

  if (empty($_POST["cradit"])) {
    $cradit_err = "*This field is required";
  } else {
    $cradit = trim($_POST["cradit"]);
  }

  if (empty($_POST["duration"])) {
    $duration_err = "*This field is required";
  } else {
    $duration = trim($_POST["duration"]);
  }
  // Check input errors before updating record
  if (empty($fname_err) && empty($lname_err) && empty($cradit_err) && empty($duration_err)) {

    // Prepare a update statement
    $sql = "UPDATE courses SET course_name = ?, course_code = ?, cradit = ?, duration = ? WHERE id = ? ";

    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the statement as parameters
      mysqli_stmt_bind_param($stmt, "sssii", $course_name, $course_code, $cradit, $duration, $id);

      // Execute the statement
      if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Record updated successfully');</script>";
        echo "<script>window.location.href='http://localhost/php_crud/course.php';</script>";
        exit;
      } else {
        echo "Oops, Something went wrong. Please try again later.";
      }
    }
    // Close statement
    mysqli_stmt_close($stmt);
  }
  // Close connection
  mysqli_close($link);
} else {
  // Check if url contains id parameter
  if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    // Get id from url
    $id = trim($_GET["id"]);

    // Prepare a select statement
    $sql = "SELECT * FROM courses WHERE id = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variable to a statement as parameter
      mysqli_stmt_bind_param($stmt, "i", $id);

      // Execute the statement
      if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) == 1) {
          // Fetch the record
          $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

          // Retrieve individual field value
          $course_name =  $row["course_name"];
          $course_code =  $row["course_code"];
          $cradit =  $row["cradit"];
          $duration =  $row["duration"];
        } else {
          // Redirect id url doesn't contain valid id parameter
          echo "<script>window.location.href='http://localhost/php_crud/';</script>";
          exit;
        }
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }
    }
    // Close statement
    mysqli_stmt_close($stmt);

    // Close connection
    mysqli_close($link);
  } else {
    // Redirect if url doesn't contain id parameter
    echo "<script>window.location.href='http://localhost/php_crud/';</script>";
    exit;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Data - PHP CRUD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- custom css -->
  <link rel="stylesheet" href="style.css">
</head>

<body style="background-color:powderblue;">
  <div class="container">
    <div class="row justify-content-center pt-5">
      <div class="col-lg-6">
        <!-- form start -->
        <form action="<?= htmlspecialchars(basename($_SERVER["REQUEST_URI"])); ?>" method="post" class="bg-light p-4 shadow-sm" novalidate>
        <div class ="card-header">
        <h4 align="center">Update course Info
        <p class="text-end">
      <a href="course.php" class="btn btn-secondary">&laquo; Go back</a>
    </p>
      </h4>
        </div>
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
              <label for="cradit" class="form-label">cradit</label>
              <input type="number" name="cradit" class="form-control" id="cradit" value="<?= $cradit; ?>">
              <small class="text-danger"><?= $cradit_err; ?></small>
            </div>

            <div class="col-lg-6 mb-3">
              <label for="duration" class="form-label">duration</label>
              <input type="text" name="duration" class="form-control" id="duration" value="<?= $duration; ?>">
              <small class="text-danger"><?= $duration_err; ?></small>
            </div>

            <div class="col-lg-12 mt-1">
              <input type="hidden" name="id" class="form-control" value="<?= $id; ?>">
              <input type="submit" class="btn btn-secondary btn-block w-100" value="Update Record">
            </div>
          </div>
        </form>
        <!-- form end -->
      </div>
    </div>
  </div>
</body>

</html>