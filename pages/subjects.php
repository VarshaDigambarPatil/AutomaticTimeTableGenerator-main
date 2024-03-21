<?php
// Include the database connection file
include('../utils/dbcon.php');

session_start();
if (!isset($_SESSION['id'])) {
    header('location: ./login.php');
}



// Function to add a subject to the database
function addSubject($conn, $scode, $sname, $stype)
{
    $query = "INSERT INTO subjects (scode, sname, stype) VALUES ('$scode', '$sname', '$stype')";
    return mysqli_query($conn, $query);
}

// Function to delete a subject from the database
function deleteSubject($conn, $sub_id)
{
    $query = "DELETE FROM subjects WHERE sub_id = '$sub_id'";
    return mysqli_query($conn, $query);
}

// Check if the Add Subject button is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addSubject'])) {
    // Get values from the input fields
    $scode = $_POST['subjectCode'];
    $sname = $_POST['subjectName'];
    $stype = $_POST['type'];

    // Add the subject to the database
    addSubject($conn, $scode, $sname, $stype);
}

// Check if the Delete button is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteSubject'])) {
    // Get subject code from the clicked row
    $scodeToDelete = $_POST['deleteSubject'];

    // Delete the subject from the database
    deleteSubject($conn, $scodeToDelete);
}

// Fetch data from the database
$query = "SELECT * FROM subjects";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subjects</title>
    <link rel="icon" href="../Images/logo.webp" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="../">
                <img src="../Images/logo.webp" width="34" height="36">
                TimeTable Generator</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./department.php">Departments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./class.php">Classes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="./staff.php">Staff</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./subjects.php">Subjects</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./aboutUs.php">About us</a>
                    </li>
                </ul>
            </div>
            <div class="d-flex">
                <a href="./logout.php" class="btn btn-danger" onclick="return confirm('Are you sure you want to logout?')">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <div class="head row">
            <h2 class="m-0 col-md-6">Subject List</h2>
        </div>
        <div class="content">
            <form method="post" class="row g-0 my-3">
                <!-- Subject name -->
                <div class="col-md-5 pe-2">
                    <input type="text" class="form-control" name="subjectName" placeholder="Subject name" required>
                </div>

                <!-- Subject Code -->
                <div class="col-md-3 pe-2">
                    <input type="text" class="form-control" name="subjectCode" placeholder="Subject Code" required>
                </div>

                <!-- Type (Theory or Lab) -->
                <div class="col-md-2 pe-2">
                    <select class="form-select" name="type" required>
                        <option selected disabled>Type</option>
                        <option value="Theory">Theory</option>
                        <option value="Lab">Lab</option>
                    </select>
                </div>

                <button type="submit" name="addSubject" class="btn col btn-success col-md-2">Add Subject</button>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered text-center table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Subject Code</th>
                            <th scope="col">Subject Name</th>
                            <th scope="col">Type</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Loop through the fetched data and display it in the table
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td scope="row">' . $row['sub_id'] . '</td>';
                            echo '<td scope="row">' . $row['scode'] . '</td>';
                            echo '<td scope="row">' . $row['sname'] . '</td>';
                            echo '<td scope="row">' . $row['stype'] . '</td>';
                            echo '<td>';
                            echo '<button type="button" class="btn btn-danger btn-sm" onclick="deleteSubject(\'' . $row['sub_id'] . '\')">Delete</button>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        // JavaScript function to confirm and delete a subject
        function deleteSubject(scode) {
            if (confirm('Are you sure you want to delete this subject?')) {
                // If the user confirms, submit the form with the subject code
                var form = document.createElement('form');
                form.method = 'post';
                form.action = '';
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'deleteSubject';
                input.value = scode;
                form.appendChild(input);
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
</body>

</html>