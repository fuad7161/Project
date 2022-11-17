<?php
require_once "config.php";

// Check if url contains id parameter
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
  // Get the id from url
  $id = trim($_GET["id"]);

  // Prepare a select statement
  $sql = "SELECT * FROM students WHERE id = ?";

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
        $firstname = $row["firstname"];
        $lastname = $row["lastname"];
        $email = $row["email"];
        $course = $row["course"];
        $batch = $row["batch"];
        $city = $row["city"];
        $state = $row["state"];
        $creation_date = $row["creation_date"];
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
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Search deta</title>
</head>
<body>

<div class="container">
	<form method="post">
		<input type="text" placeholder="Search" name ="search">
		<button class="btn btn-primary btn-sm" name="submit">Search</button>
	</form>
	<div class="container my-5"> 
		<table class="table">
			<?php

			if(isset($_POST['submit'])){
				$search=$_POST['search'];
				$sql = "SELECT * FROM students where id = '$search'";
				$result = mysqli_query($link,$sql);
				if($result){
					$num = mysqli_num_rows($result);
					if($num > 0){
						echo '<thead>
				        <tr>
				          <th>#</th>
				          <th>Firstname</th>
				          <th>Lastname</th>
				          <th>Email Address</th>
				          <th>Course</th>
				          <th>Batch</th>
				          <th>City</th>
				          <th>State</th>
				          <th>Actions</th>
				        </tr>
				      </thead>';
				      $row = mysqli_fetch_assoc($result);

					}
				}
			}

			?>
		</table>
	</div>
</div>
</body>
</html>