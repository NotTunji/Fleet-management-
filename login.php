<?php 

    session_start();

    include 'connect.php';

    $username = $password = $error_message = "";

    $username = $_POST['username'];
    $password = $_POST['password'];
    $stmt = $conn->prepare('SELECT username,password FROM login WHERE username=? AND password=?');

    $stmt->bind_param("ss",$username,$password);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0)
    {
        $user = $result->fetch_assoc();
        // echo "welcome ".$user["username"];
        
        header("Location:Analytics.html");
    }

    else
    {
        $_SESSION['error_message'] = "invalid username or password";
        header("Location: " . $_SERVER['HTTP_REFERER']);

    }

