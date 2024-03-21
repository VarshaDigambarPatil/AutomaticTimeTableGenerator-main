<?php
include('../utils/dbcon.php');

session_start();
if (!isset($_SESSION['id'])) {
    header('location: ./login.php');
}


$department_id = $_POST['department_id'];
$year = $_POST['year'];
$section = $_POST['section'];

$query = "SELECT * FROM timetable_view WHERE year = '$year' AND section = '$section' AND Department_ID = '$department_id'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $timetable = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $timetable = [];
}

mysqli_close($conn);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Time Table</title>
    <link rel="icon" href="../Images/logo.webp" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                        <a class="nav-link " href="./class.php">Classes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./staff.php">Staff</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./subjects.php">Subjects</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="./aboutUs.php">About us</a>
                    </li>
                </ul>
            </div>
        </div>

    </nav>


    <div class="m-4">
        <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-3">
            <a href="javascript:history.back()" class="btn btn-primary">< Back</a>
        </div>
        <div class="head">
            <h2> Time Table </h2>
        </div>

        <div class="table-responsive ">
            <table class="table table-bordered text-center table-hover table-responsive" style="border: 3px;">
                <thead>
                    <tr>
                        <th>Day</th>
                        <th>10:00-11:00</th>
                        <th>11:00-12:00</th>
                        <th>12:00-13:00</th>
                        <th>13:00-14:00</th>
                        <th>14:00-15:00</th>
                        <th>15:00-16:00</th>
                        <th>16:00-17:00</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Monday</td>
                        <?php
                        foreach ($timetable as $period) {
                            if ($period['Day'] == "Monday") {
                                if ($period['recess'] > "0") {
                                    // display a break
                                    echo "<td> Break </td>";
                                    
                                    continue;
                                }
                                $start = date('H:i', strtotime($period['Start_Time']));
                                $end = date('H:i', strtotime($period['End_Time']));
                                $colspan = (strtotime($end) - strtotime($start)) / 3600;
                                // echo the subject code and short name of the staff
                                echo "<td colspan='$colspan'>" . $period['Subject_Code'] . " - " . $period['Subject_Name'] . "<br>" . $period['Staff_Short_Name'] . " - " . $period['Staff_Name'] . "</td>";
                            }
                        }
                        ?>
                    </tr>
                    <tr>
                        <td>Tuesday</td>
                        <?php
                        foreach ($timetable as $period) {
                            if ($period['Day'] == "Tuesday") {
                                if ($period['recess'] > "0") {
                                    // display a break
                                    echo "<td > Break </td>";
                                    continue;
                                }
                                $start = date('H:i', strtotime($period['Start_Time']));
                                $end = date('H:i', strtotime($period['End_Time']));
                                $colspan = (strtotime($end) - strtotime($start)) / 3600;
                                echo "<td colspan='$colspan'>" . $period['Subject_Code'] . " - " . $period['Subject_Name'] . "<br>" . $period['Staff_Short_Name'] . " - " . $period['Staff_Name'] . "</td>";
                            }
                        }
                        ?>
                    </tr>
                    <tr>
                        <td>Wednesday</td>
                        <?php
                        foreach ($timetable as $period) {
                            if ($period['Day'] == "Wednesday") {
                                if ($period['recess'] > "0") {
                                    // display a break
                                    echo "<td > Break </td>";
                                    continue;
                                }
                                $start = date('H:i', strtotime($period['Start_Time']));
                                $end = date('H:i', strtotime($period['End_Time']));
                                $colspan = (strtotime($end) - strtotime($start)) / 3600;
                                // echo the subject code and short name of the staff
                                echo "<td colspan='$colspan'>" . $period['Subject_Code'] . " - " . $period['Subject_Name'] . "<br>" . $period['Staff_Short_Name'] . " - " . $period['Staff_Name'] . "</td>";
                            }
                        }
                        ?>
                    </tr>
                    <tr>
                        <td>Thursday</td>
                        <?php
                        foreach ($timetable as $period) {
                            if ($period['Day'] == "Thursday") {
                                if ($period['recess'] > "0") {
                                    // display a break
                                    echo "<td > Break </td>";
                                    continue;
                                }
                                $start = date('H:i', strtotime($period['Start_Time']));
                                $end = date('H:i', strtotime($period['End_Time']));
                                $colspan = (strtotime($end) - strtotime($start)) / 3600;
                                // echo the subject code and short name of the staff
                                echo "<td colspan='$colspan'>" . $period['Subject_Code'] . " - " . $period['Subject_Name'] . "<br>" . $period['Staff_Short_Name'] . " - " . $period['Staff_Name'] . "</td>";
                            }
                        }
                        ?>
                    </tr>
                    <tr>
                        <td>Friday</td>
                        <?php
                        foreach ($timetable as $period) {
                            if ($period['Day'] == "Friday") {
                                if ($period['recess'] > "0") {
                                    // display a break
                                    echo "<td > Break </td>";
                                    continue;
                                }
                                $start = date('H:i', strtotime($period['Start_Time']));
                                $end = date('H:i', strtotime($period['End_Time']));
                                $colspan = (strtotime($end) - strtotime($start)) / 3600;
                                // echo the subject code and short name of the staff
                                echo "<td colspan='$colspan'>" . $period['Subject_Code'] . " - " . $period['Subject_Name'] . "<br>" . $period['Staff_Short_Name'] . " - " . $period['Staff_Name'] . "</td>";
                            }
                        }
                        ?>
                    </tr>
                    <tr>
                        <td>Saturday</td>
                        <?php
                        foreach ($timetable as $period) {
                            if ($period['Day'] == "Saturday") {
                                if ($period['recess'] > "0") {
                                    // display a break
                                    echo "<td > Break </td>";
                                    continue;
                                }
                                $start = date('H:i', strtotime($period['Start_Time']));
                                $end = date('H:i', strtotime($period['End_Time']));
                                $colspan = (strtotime($end) - strtotime($start)) / 3600;
                                // echo the subject code and short name of the staff
                                echo "<td colspan='$colspan'>" . $period['Subject_Code'] . " - " . $period['Subject_Name'] . "<br>" . $period['Staff_Short_Name'] . " - " . $period['Staff_Name'] . "</td>";
                            }
                        }
                        ?>
                    </tr>
                </tbody>
            </table>
            <!-- Print button -->
            <div class="d-grid gap 2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary" onclick="window.print()">Print</button>

            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>