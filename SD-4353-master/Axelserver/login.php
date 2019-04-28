<?php
require "header.php";
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Axel: Login</title>
    <link href="loginstyle.css" rel="stylesheet">
</head>

<!-- Using a header file to split the top part of the CODE to be more organized -->

    <!--class to take login input and put it into the server-->
        <div class="loginbox">
            <h1>Login Here</h1>
            <!--Login: uid = userid upwd= userpassword-->
            <form action="includes/login.in.php" method="post">
                <p>Username</p>
                <input type="text" name="uid" placeholder="Enter Username">
                <p>Password</p>
                <input type="password" name="upwd" placeholder="Enter Password">
                <input type="submit" name="login-submit" value="Login">
                <a href="signup.php">Don't have an account?</a>
            </form>
            <!--Login: uid = userid upwd= userpassword-->
            <!--
            <form action="includes/logout.in.php" method="post">
                <input type="submit" name="logout-submit" value="Logout">
            </form>
            -->

        </div>

<?php
require "footer.php";
?> 