<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <link rel="icon" href="../favicon.png" type="image/png" />
    <link rel="stylesheet" href="../styles/register.css" />
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
            <h1>Sign up</h1>
            <p>Please fill up this form.</p>
            <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
                <input type="text" name="fname" id="firstname" placeholder="First Name" />
                <input type="text" name="lname" id="lastname" placeholder="Last Name" />
                <input type="email" name="email" id="email" placeholder="Email Address" />
                <input type="password" name="pwd" id="password" placeholder="Password" />
                <label for="checkbox">
                    <input type="checkbox" name="checkbox" id="checkbox" class="inline" />
                    I agree to the Terms and Conditions.
                </label>
                <button class="btn" id="login-btn">Register</button>
            </form>
            <p id="register-text">
                Already have an account? <a href="login.php">Log In</a>
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

  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $pwd = $_POST['pwd'];

  $sql = "INSERT INTO users_table (fname,lname,email,pwd) VALUES ('$fname','$lname','$email','$pwd')";
  $result = mysqli_query($connection,$sql);

  if($result){
    ?>
<script>
alert("Account created succesfully!");
</script>

<?php
  }
    else {
       echo "Data not inserted " . mysqli_error($connection);
  }

  mysqli_close($connection);
}

?>