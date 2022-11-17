<?php
  require_once "config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD Application</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- custom css -->
    <link rel="stylesheet" href="style.css">
</head>

<body style="background-color:#E0FFFF;">
    <div>
        <h1 align="center"><b>
                Welcome to CSE Course management System</b><br><br>
        </h1>
</body>

</html>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD Application</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- custom css -->
    <link rel="stylesheet" href="style.css">
</head>

<body style="background-color:#E0FFFF;">
    <div class="container">
        <div>
            <h1 class="text-center">Course Table</h1>
        </div>
        <a href="create_courses.php" class="btn btn-secondary my-4">
            <i class="bi bi-plus-circle"></i> Add Record
        </a>
        <a href="home.php" class="btn btn-secondary my-4"> Home
        </a>&nbsp&nbsp
        <a href="student.php" class="btn btn-secondary my-4">
    <i class="bi bi-mortarboard-fill "></i>
    </a>&nbsp&nbsp
    <a href="course.php" class="btn btn-secondary my-4">
    <i class="bi bi-layout-text-sidebar-reverse"></i>
    </a>&nbsp&nbsp
    <a href="teacher.php" class="btn btn-secondary my-4">
    <i class="bi bi-person-video"></i> 
    </a>&nbsp&nbsp
        <form method="post">
            <input type="text" placeholder="Search" name="search">
            <button class="btn btn-primary btn-sm" name="submit">Search</button>
        </form>
        <table style="background-color:#F0FFFF" class="table table-bordered table-striped align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Course name</th>
                    <th>Course code</th>
                    <th>Course Cradit</th>
                    <th>Duration</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php

if(isset($_POST['submit'])){
  $search=$_POST['search'];
  $sql = "SELECT * FROM courses where id = '$search'
  or course_name = '$search' or course_code = '$search' or cradit = '$search' 
  or duration = '$search'";
  if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
      // Fetch the records
      $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
      $count = 1;
      foreach ($rows as $row) { ?>
                <tr>
                    <td><?= $count++; ?>.</td>
                    <td><?= ucfirst($row["course_name"]); ?></td>
                    <td><?= ucfirst($row["course_code"]); ?></td>
                    <td><?= $row["cradit"]; ?></td>
                    <td><?= $row["duration"]; ?></td>
                    <td>
                        <a href="read.php?id=<?= $row["id"]; ?>" class="btn btn-info btn-sm">
                            <i class="bi bi-eye-fill"></i>
                        </a>&nbsp;
                        <a href="update.php?id=<?= $row["id"]; ?>" class="btn btn-primary btn-sm">
                            <i class="bi bi-pencil-square"></i>
                        </a>&nbsp;
                        <a href="delete.php?id=<?= $row["id"]; ?>" class="btn btn-danger btn-sm">
                            <i class="bi bi-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php
      }
    } else { ?>
                <tr>
                    <td class="text-center text-danger fw-bold" colspan="9">* No Record Found *</td>
                </tr>
                <?php
    }
  } else {
    echo "<script>alert('Oops! Something went wrong. Please try again later.');</script>";
  }
  // Close conection 
  mysqli_close($link);
}else{
  $sql = "SELECT * FROM courses";

        if ($result = mysqli_query($link, $sql)) {
          if (mysqli_num_rows($result) > 0) {
            // Fetch the records
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $count = 1;
            foreach ($rows as $row) { ?>
                <tr>
                    <td><?= $count++; ?>.</td>
                    <td><?= ucfirst($row["course_name"]); ?></td>
                    <td><?= ucfirst($row["course_code"]); ?></td>
                    <td><?= $row["cradit"]; ?></td>
                    <td><?= strtoupper($row["duration"]); ?></td>
                    <td>
                        <a href="read_course.php?id=<?= $row["id"]; ?>" class="btn btn-info btn-sm">
                            <i class="bi bi-eye-fill"></i>
                        </a>&nbsp;
                        <a href="update_course.php?id=<?= $row["id"]; ?>" class="btn btn-primary btn-sm">
                            <i class="bi bi-pencil-square"></i>
                        </a>&nbsp;
                        <a href="delete_course.php?id=<?= $row["id"]; ?>" class="btn btn-danger btn-sm">
                            <i class="bi bi-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php
            }
          } else { ?>
                <tr>
                    <td class="text-center text-danger fw-bold" colspan="9">* No Record Found *</td>
                </tr>
                <?php
          }
        } else {
          echo "<script>alert('Oops! Something went wrong. Please try again later.');</script>";
        }
        // Close conection 
        mysqli_close($link);
}

        
        ?>
            </tbody>
        </table>
    </div>

    <!-- custom js -->
    <script>
    const delBtnEl = document.querySelectorAll(".btn-danger");
    delBtnEl.forEach(function(delBtn) {
        delBtn.addEventListener("click", function(event) {
            const message = confirm("Are you sure you want to delete this record?");
            if (message == false) {
                event.preventDefault();
            }
        });
    });
    </script>
</body>

</html>