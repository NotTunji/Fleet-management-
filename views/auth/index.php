<?php
    session_start();
    // $_SESSION['error_message'] = "";
    include 'connect.php';
    // include 'login.php';

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
          <p id="error_message"><?php  echo $_SESSION['error_message']; ?></p>
          <a href="../admin.php"><b>Admin login</b>

          
          
        </div>
      </form>
    </div>
  </body>
  <script src=""></script>
  <style>
    body {
      background-image:url('../../img/cover.png')
    }
  
  </style>
</html>
