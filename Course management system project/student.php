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
            <h1 class="text-center">Student Table</h1>
        </div>
        <div>
        <a href="create.php" class="btn btn-secondary my-4">
                    <i class="bi bi-plus-circle"></i> Add Record
                </a>
        <a href="home.php" class="btn btn-secondary my-4"> Home
                </a>
                &nbsp&nbsp
                <a href="student.php" class="btn btn-secondary my-4">
    <i class="bi bi-mortarboard-fill "></i>
    </a>&nbsp&nbsp
    <a href="course.php" class="btn btn-secondary my-4">
    <i class="bi bi-layout-text-sidebar-reverse"></i>
    </a>&nbsp&nbsp
    <a href="teacher.php" class="btn btn-secondary my-4">
    <i class="bi bi-person-video"></i> 
    </a></div>
    <div>
    <form method="post">
            <input type="text" placeholder="Search" name="search">
            <button class="btn btn-primary btn-sm" name="submit">Search</button>
        </form>
    </div>



        <table style="background-color:#F0FFFF" class="table table-bordered table-striped align-middle">
            <thead>
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
            </thead>

            <tbody>
                <?php
        if(isset($_POST['submit'])){
        
        $search=$_POST['search'];
        $sql = "SELECT * FROM students where id = '$search'
        or firstname = '$search' or lastname = '$search' or email = '$search'
        or course = '$search' or batch = '$search' or city = '$search' or state = '$search'";
        if ($result = mysqli_query($link, $sql)) {
          if (mysqli_num_rows($result) > 0) {
            // Fetch the records
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $count = 1;
            foreach ($rows as $row) { ?>
                <tr>
                    <td><?= $count++; ?>.</td>
                    <td><?= ucfirst($row["firstname"]); ?></td>
                    <td><?= ucfirst($row["lastname"]); ?></td>
                    <td><?= $row["email"]; ?></td>
                    <td><?= strtoupper($row["course"]); ?></td>
                    <td><?= $row["batch"]; ?></td>
                    <td><?= ucfirst($row["city"]); ?></td>
                    <td><?= ucwords($row["state"]); ?></td>
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

        // Include config file
        require_once "config.php";

        $sql = "SELECT * FROM students";

        if ($result = mysqli_query($link, $sql)) {
          if (mysqli_num_rows($result) > 0) {
            // Fetch the records
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $count = 1;
            foreach ($rows as $row) { ?>
                <tr>
                    <td><?= $count++; ?>.</td>
                    <td><?= ucfirst($row["firstname"]); ?></td>
                    <td><?= ucfirst($row["lastname"]); ?></td>
                    <td><?= $row["email"]; ?></td>
                    <td><?= strtoupper($row["course"]); ?></td>
                    <td><?= $row["batch"]; ?></td>
                    <td><?= ucfirst($row["city"]); ?></td>
                    <td><?= ucwords($row["state"]); ?></td>
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