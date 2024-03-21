<?php
include './utils/dbcon.php';

// authentication code
session_start();
if (!isset($_SESSION['id'])) {
    header('location: ./pages/login.php');
}

$query = "SELECT * FROM class_list";

$result = mysqli_query($conn, $query);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./Images/logo.webp" type="image/x-icon">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Time Table Generator</title>
    <!--logo-->
    <link rel="icon" href="./Images/logo.webp" type="image/x-icon">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="./">
                <img src="./Images/logo.webp" width="34" height="36">
                TimeTable Generator</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./pages/department.php">Departments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./pages/class.php">Classes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="./pages/staff.php">Staff</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./pages/subjects.php">Subjects</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./pages/aboutUs.php">About us</a>
                    </li>
                </ul>
            </div>
            <div class="d-flex">
                <a href="./pages/logout.php" class="btn btn-danger" onclick="return confirm('Are you sure you want to logout?')">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <div class="head">
            <h2>Welcome, <?php echo $_SESSION['name']; ?></h2>
        </div>
        <div class="content">
            <div class="d-flex flex-row-reverse mb-3">
                <a href="./pages/generateTimeTable.php" name="generate" class="btn btn-success mt-2 ">Generate Time Table</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered text-center table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Sr No.</th>
                            <th scope="col">Department name</th>
                            <th scope="col">Year</th>
                            <th scope="col">Section</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <form method="post" action="./pages/timetable.php">
                                    <input type="hidden" name="department_id" value="<?php echo $row['Department_ID']; ?>">
                                    <input type="hidden" name="year" value="<?php echo $row['Year']; ?>">
                                    <input type="hidden" name="section" value="<?php echo $row['section_no']; ?>">
                                    <th scope="row"><?php echo $i; ?></th>
                                    <td><?php echo $row['Department_Name']; ?></td>
                                    <td><?php echo $row['Year']; ?></td>
                                    <td><?php echo $row['Section']; ?></td>
                                    <td>
                                        <button type="submit" name="view" class="btn btn-primary">View</button>
                                    </td>
                                </form>
                            </tr>
                        <?php
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</body>

</html>