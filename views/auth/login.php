<?php

session_start();

include 'connect.php';

// $username = $password = $error_message = "";

// $username = $_POST['username'];
// $password = $_POST['password'];
// $stmt = $conn->prepare('SELECT username,password FROM login WHERE username=? AND password=?');

// $stmt->bind_param("ss",$username,$password);
// $stmt->execute();
// $result = $stmt->get_result();

// if($result->num_rows > 0)
// {
//     $user = $result->fetch_assoc();
//     // echo "welcome ".$user["username"];

//     header("Location:../analytics.php");
// }

// else
// {
//     $_SESSION['error_message'] = "invalid username or password";
//     header("Location: " . $_SERVER['HTTP_REFERER']);

// }

// Check if the user is already authenticated
if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) {
    // User is already logged in, redirect to the dashboard
    header("Location: ../dashboard.php");
    exit();
}
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Retrieve the submitted username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // SQL query to check if the username and password match
    $sql = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Username and password are correct
        // Set the session variable to true
        session_start();
        $_SESSION['authenticated'] = true;

        // Redirect to the dashboard
        header("Location: ../dashboard.php");
        exit();
    } else {
        // Invalid username or password
        $error = "Invalid username or password.";
    }

    // Close connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html>



<head>
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
        }

        h1 {
            text-align: center;
            font-size: 500%;
            font: 50px Arial, ;


        }

        .login {
            background-color: white;
            width: 400px;
            margin: 0 auto;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #010802;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #046104;
        }

        .container {
            padding: 16px;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }

        @media screen and (max-width: 500px) {
            .login {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <h1>Ctrack</h1>

    <div class="login">

        <form action="login.php" method="post">
            <div class="container">
                <label for="username"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" required>

                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>

                <button>LOGIN</button>
                <p id="error_message"><?php echo $error ?></p>




            </div>
        </form>
    </div>
</body>
<script src=""></script>
<style>
    body {
        background-image: url('../../img/cover.png')
    }
</style>

</html>