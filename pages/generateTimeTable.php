<?php
// Include the database connection file
include('../utils/dbcon.php');

session_start();
if (!isset($_SESSION['id'])) {
    header('location: ./login.php');
}


// ittrate through the assigned table in the database 
// query to fetch the assigned table from the database
$query = "SELECT * FROM assigned";

// execute the query
$result = mysqli_query($conn, $query);
$collage_start_time = "10:00:00";
$collage_end_time = "18:00:00";
// total number of hours college is open * total days in a week
$MAX_ITERATION = 8 * 6;
$recess_start_time = "12:00:00";
$recessDuration = 1; // in hours

// clear the time table
$query = "TRUNCATE TABLE time_table";

if ($conn->query($query) === TRUE) {
} else {
    echo "Error deleting record: " . $conn->error;
}

// clear the rem_periods table
$query = "TRUNCATE TABLE rem_periods";

if ($conn->query($query) === TRUE) {
} else {
    echo "Error deleting record: " . $conn->error;
}

// check if the query was executed successfully
if ($result) {
    // fetch the result as an associative array
    $assigned = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $currentDay = "Monday";
    $currentTime = $collage_start_time;

    foreach ($assigned as $assign) {
        $period_id = $assign['period_id'];
        $dept_id = $assign['dept_id'];
        $year = $assign['year'];
        $section = $assign['section'];
        $sub_id = $assign['sub_id'];
        $staff_short_name = $assign['staff_short_name'];
        $duration = $assign['duration'];
        $total_in_week = $assign['total_in_week'];
        $count = 0;
        $clash_count = 0;

        while ($total_in_week > 0) {
            $count++;
            if ($count > $MAX_ITERATION) {
                echo "Time table can't be generated for the given data, " . $total_in_week . " periods are remaining for " . $sub_id . " " . $staff_short_name . " " . $year . " " . $section . " " . $dept_id;
                // clear the time table
                $query = "TRUNCATE TABLE time_table";
                if ($conn->query($query) === TRUE) {
                } else {
                    echo "Error deleting record: " . $conn->error;
                }
                break;
            }

            $query = "SELECT * FROM timetable_view WHERE day = '$currentDay' AND year = '$year' AND section = '$section' AND Department_ID = '$dept_id'";

            // get the last period end time
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                // go to the last row
                $lastPeriodEndTime = mysqli_fetch_all($result, MYSQLI_ASSOC);
                $lastPeriodEndTime = end($lastPeriodEndTime);
                $lastPeriodEndTime = $lastPeriodEndTime['End_Time'];
            } else {
                $lastPeriodEndTime = $collage_start_time;
            }

            // check if the last period end time is greater than the current time
            if ($lastPeriodEndTime > $currentTime) {
                $currentTime = $lastPeriodEndTime;
            }

            // check if the recess is already in the time table for the that class
            $query = "SELECT * FROM timetable_view WHERE day = '$currentDay' AND year = '$year' AND section = '$section' AND Department_ID = '$dept_id' AND recess = 1";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) == 0 && $currentTime >= $recess_start_time) {
                // add reccess into the time table
                $temp = date('H:i:s', strtotime($currentTime) + $recessDuration * 60 * 60);
                $query = "INSERT INTO time_table ( day, period_id, start_time, end_time, recess) VALUES ('$currentDay', '$period_id', '$currentTime', '$temp', 1)";
                $result = mysqli_query($conn, $query);
                $currentTime = $temp;
            }

            $temp = date('H:i:s', strtotime($currentTime) + $duration * 60 * 60);

            if ($temp < $collage_end_time) {

                // check if the lecturer is free at that time
                // SELECT * FROM timetable_view WHERE day="Monday" AND Staff_Short_Name = "SRC" and ((Start_Time="10:00:00") AND (End_Time="11:00:00" OR End_Time="12:00:00")); 
                // set endtime as start time + 1 ans + 2

                $end1 = date('H:i:s', strtotime($currentTime) + 1 * 60 * 60);
                $end2 = date('H:i:s', strtotime($currentTime) + 2 * 60 * 60);

                $query = "SELECT * FROM timetable_view WHERE day='$currentDay' AND Staff_Short_Name = '$staff_short_name' AND ((Start_Time='$currentTime') AND (End_Time='$end1' OR End_Time='$end2'))";

                $result = mysqli_query($conn, $query);

                if ($result && mysqli_num_rows($result)) {

                    $clash_count++;

                    // printing which leacture is clashing
                    echo "Time table can't be generated for the given data, " . $sub_id . " " . $staff_short_name . " " . $year . " " . $section . " " . $dept_id . " is clashing with another subject on day" . $currentDay . "<br>";
                    $count--;

                    if ($currentDay == "Monday") {
                        $currentDay = "Tuesday";
                        $currentTime = $collage_start_time;
                    } else if ($currentDay == "Tuesday") {
                        $currentDay = "Wednesday";
                        $currentTime = $collage_start_time;
                    } else if ($currentDay == "Wednesday") {
                        $currentDay = "Thursday";
                        $currentTime = $collage_start_time;
                    } else if ($currentDay == "Thursday") {
                        $currentDay = "Friday";
                        $currentTime = $collage_start_time;
                    } else if ($currentDay == "Friday") {
                        $currentDay = "Saturday";
                        $currentTime = $collage_start_time;
                    } else if ($currentDay == "Saturday") {
                        $currentDay = "Monday";
                        $currentTime = $collage_start_time;
                    }

                    if ($clash_count > 7) {
                        // ente the logic to skpi the current period and go to the next period 
                        // also store the current period in the database 
                        // 
                        // storing into the database 
                        $query = "INSERT INTO rem_periods (period_id, dept_id, year, section, sub_id, staff_short_name, duration, total_in_week) VALUES ('$period_id', '$dept_id', '$year', '$section', '$sub_id', '$staff_short_name', '$duration', '$total_in_week')";
                        $result = mysqli_query($conn, $query);

                        if ($result) {
                        } else {
                            echo "Error: " . $query . "<br>" . mysqli_error($conn);
                        }

                        break;
                    }

                    continue;
                }

                $query = "INSERT INTO time_table ( day, period_id, start_time, end_time) VALUES ('$currentDay', '$period_id', '$currentTime', '$temp')";
                $result = mysqli_query($conn, $query);
                $total_in_week--;

                $currentTime = $temp;

                if ($result) {
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($conn);
                }
            }

            if ($currentDay == "Monday") {
                $currentDay = "Tuesday";
                $currentTime = $collage_start_time;
            } else if ($currentDay == "Tuesday") {
                $currentDay = "Wednesday";
                $currentTime = $collage_start_time;
            } else if ($currentDay == "Wednesday") {
                $currentDay = "Thursday";
                $currentTime = $collage_start_time;
            } else if ($currentDay == "Thursday") {
                $currentDay = "Friday";
                $currentTime = $collage_start_time;
            } else if ($currentDay == "Friday") {
                $currentDay = "Saturday";
                $currentTime = $collage_start_time;
            } else if ($currentDay == "Saturday") {
                $currentDay = "Monday";
                $currentTime = $collage_start_time;
            }
        }
    }

    
    echo "Time table generated successfully";
    // go back to the home page button
    echo "<br><a href='../' class='btn btn-primary'>Go back to the home page</a>";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="../Images/logo.webp" type="image/x-icon">
</head>

<body>
</body>

</html>