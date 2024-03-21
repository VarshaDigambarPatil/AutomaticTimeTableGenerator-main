<?php
// Include the database connection file
include('../utils/dbcon.php');

// Check if the form is submitted
if (isset($_POST['login'])) {
    // Get the input values
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the user exists
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    // If the user exists
    if (mysqli_num_rows($result) > 0) 
    {
        // Fetch the user data
        $user = mysqli_fetch_assoc($result);

        // Start the session
        session_start();

        // Set the session variables
        $_SESSION['id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['email'] = $user['email'];

        // Redirect to the ../index.php
        header('Location: ../index.php');
    } else {
       
        echo "<script>alert('Invalid email or password')</script>";
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="h-100 d-flex justify-content-center align-items-center bg-light">
    <div class="container mt-5 col-4 rounded-2 border border-2 p-5 bg-white">
        <h2 class="text-center">Login</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email </label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <button type="submit" class="btn btn-primary w-100 mt-3" name="login">Login</button>
        </form>

        <div class="text-center mt-3">
            Don't have an account?
            <a href="register.php">Register</a>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>