<?php
// authentication code
session_start();
if (!isset($_SESSION['id'])) {
    header('location: ./login.php');
}

// Array of developers with their names and photos
$developers = [
    [
        'name' => 'Mrunali Sonawane',
        'photo' => '../Images/mss.jpg',
    ],
    [
        'name' => 'Varsha Patil',
        'photo' => '../Images/vp.jpg',
    ],
    [
        'name' => 'Sushma Patil',
        'photo' => '../Images/sp.jpg',
    ],
    [
        'name' => 'Rajshri Pawar',
        'photo' => '../Images/rp.jpg',
    ],
    [
        'name' => 'Ashwini Rajput',
        'photo' => '../Images/ar.jpg',
    ],
];

?>
<html>
<head>
    <title>About Us</title>
    <style>
      
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" href="../Images/logo.webp" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .card-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .card {
            width: 300px;
            text-align: center;
            margin: 10px;
            background-color: rgb(206, 186, 186);
        }

        .card img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 50%;
        }

        .card h3 {
            margin-top: 10px;
        }
        p{
            margin-top: 50px;
            margin-left: 20%;
            margin-right: 20%;
            font-size: 20px;
            background-color: lightcyan;
        }
    </style>
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
                        <a class="nav-link active" href="./aboutUs.php">About us</a>
                    </li>
                </ul>
            </div>
            <div class="d-flex">
                <a href="./logout.php" class="btn btn-danger" onclick="return confirm('Are you sure you want to logout?')">Logout</a>
            </div>
        </div>

    </nav>

    <div >
        <center><h1 style="margin-top : 30px" > About us </h1></center>

        <p>  We are third-year students, meaning we have been studying at our institution for three years already.A timetable is a schedule that tells us when certain activities or events are supposed to happen.Normally, creating a timetable manually can be time-consuming and complex. So, we want to develop a computer program that can do this automatically for us.This means that with our project, we want to make it easier for college to create timetables without having to do all the work manually. Our program will take in information about classes, teachers,subjects,Departments and other constraints, and then it will generate a timetable for us.By having an automatic timetable generator, we can save time and effort, reduce errors, and ensure that schedules are optimized to meet everyone's needs.

Our goal is to develop a user-friendly software tool that can be easily used by schools or organizations to generate timetables efficiently and effectively.

Learning Opportunity: Through working on this project, we will gain valuable experience in programming, problem-solving, and project management. It's also a chance for us to apply what we've learned in our studies to real-world problems.</p>
    </div>

    <center><h1 style="margin-top : 30px" > Our Team </h1></center>
    
    <div class="card-container mt-3">
        <?php foreach ($developers as $developer): ?>
            <div class="card">
                <img src="<?php echo $developer['photo']; ?>" alt="<?php echo $developer['name']; ?>">
                <h3><?php echo $developer['name']; ?></h3>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
