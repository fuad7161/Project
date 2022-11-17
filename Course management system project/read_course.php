<?php
require_once "config.php";

// Check if url contains id parameter
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
  // Get the id from url
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

        // Retrieve the individual field value
        $course_name = $row["course_name"];
        $course_code = $row["course_code"];
        $cradit = $row["cradit"];
        $duration = $row["duration"];        
      } else {
        // Redirect if url doesn't contain valid id parameter
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
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Read Data - PHP CRUD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- custom css -->
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <table class="table table-bordered mt-5">
      <thead>
        <tr>
          <th>course_name</th>
          <th>course_code</th>
          <th>cradit</th>
          <th>duration</th>
        </tr>
      </thead>

      <tbody>
        <tr>
          <td><?= ucfirst($course_name); ?></td>
          <td><?= ucfirst($course_code); ?></td>
          <td><?= ucfirst($cradit); ?></td>
          <td><?= $duration; ?></td>
        </tr>
      </tbody>
    </table>
    <p class="text-end">
      <a href="course.php" class="btn btn-secondary">&laquo; Go back</a>
    </p>
  </div>
</body>

</html>