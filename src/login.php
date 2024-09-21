<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Log In</title>
    <link rel="icon" href="../favicon.png" type="image/png" />
    <link rel="stylesheet" href="../styles/login.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@300..700&family=Space+Grotesk:wght@300..700&display=swap"
        rel="stylesheet" />
</head>

<body>
    <section class="login-section">
        <div class="left-section">
            <img src="../learning.gif" alt="student" />
        </div>
        <div class="right-section">
            <a href="index.php"><button class="btn">← Back to Homepage</button></a>
            <h1>Log In</h1>
            <p>Please enter your login information.</p>
            <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
                <input type="email" name="email" id="email" placeholder="Email Address" />
                <input type="password" name="pwd" id="password" placeholder="Password" />
                <button class="btn" id="login-btn">Log In</button>
            </form>
            <p id="register-text">
                New Here? <a href="register.php">Create an Account</a>
            </p>
        </div>
    </section>
</body>

</html>

<?php

if(!empty($_POST)) {
  $servername = 'localhost';
  $username = 'root';
  $password = '';
  $database = 'USERS';

  $connection = mysqli_connect($servername,$username,$password,$database);

  if(!$connection){
    die("Connection Error" . mysqli_connect_error());
  }

  $email = $_POST['email'];
  $pwd = $_POST['pwd'];

  $sql = "SELECT * FROM users_table WHERE email='$email' AND pwd='$pwd'";
  $result = mysqli_query($connection,$sql);

  if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
?>

<script>
alert("Hello 👋 <?php echo $row['fname'] . " " . $row['lname'] ?>. You are successfully logged in!");
</script>

<?php
}
}

else {
?>

<script>
alert("Invalid Credentials!🤖");
</script>

<?php
}
}

mysqli_close($connection);
?>