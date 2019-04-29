<?php
require "header.php";
?>

<!--TOP HEADER OF THE WEBPAGE-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Axel: Signup</title>
    <link href="loginstyle.css" rel="stylesheet">
</head>

<main>
    <div class="loginbox"> <!--class to take register input and put it into the server-->
            <h1>Register Here</h1>
            <!--Login: uid = userid upwd= userpassword uemail=useremail-->
            <form action="includes/signup.in.php" method="post">
                <p>Username</p>
                <input type="text" name="uid" placeholder="Enter Username" required>
                <p>E-mail</p>
                <input type="text" name="uemail" placeholder="Enter E-mail" required>
                <p>Password</p>
                <input type="password" name="upwd" placeholder="Enter Password" required>
                <input type="submit" name="signup-submit" value="Signup!">
                <a href="signup.php">Already have an account?</a>
            </form>
        </div>
    </main>


<?php
require "footer.php";
?> 