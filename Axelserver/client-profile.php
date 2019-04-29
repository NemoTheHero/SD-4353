<!-- page for the client manager-->
<?php
require "header.php";
?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Axel User</title>
    <link href="userstyle.css" rel="stylesheet">
</head>

<!-- Using a header file to split the top part of the CODE to be more organized -->


<?php

if(isset($_SESSION['userId']))
  {

    echo '<div class="accountbox">
    <h1>User Information</h1>
    <center> <h2 style="text-transform:none;">Enter New Information to Update</h2> </center>
    <!--Login: uid = userid upwd= userpassword-->
    <form action="includes/profile.in.php" method="post">
        <p>Full Name</p>
        <input type="text" name="uFullname" placeholder="Enter Full Name" required>
        <p>Address 1</p>
        <input type="text" name="uAddress1" placeholder="Enter Address" required>
        <p>Address 2</p>
        <input type="text" name="uAddress2" placeholder="Enter Address (Optional)">
        <p>City</p>
        <input type="text" name="uCity" placeholder="Enter City" required>
        <div class="zipfield">
        <p>Zip Code</p>
        <input id="zip" name="uZip" type="text" pattern="[0-9]*" required>
        <!--<input type="text" pattern="[0-9]{5,7}"  name = "uZip" placeholder="Enter Zip Code" required/> -->
        </div>

        <!--BIG DROP DOWN BOX FOR SELECTING STATES-->
        <p>State</p>
        <select name="uState" required>
            <option value="AL">AL</option>
            <option value="AK">AK</option>
            <option value="AR">AR</option>
            <option value="AZ">AZ</option>
            <option value="CA">CA</option>
            <option value="CO">CO</option>
            <option value="CT">CT</option>
            <option value="DC">DC</option>
            <option value="DE">DE</option>
            <option value="FL">FL</option>
            <option value="GA">GA</option>
            <option value="HI">HI</option>
            <option value="IA">IA</option>
            <option value="ID">ID</option>
            <option value="IL">IL</option>
            <option value="IN">IN</option>
            <option value="KS">KS</option>
            <option value="KY">KY</option>
            <option value="LA">LA</option>
            <option value="MA">MA</option>
            <option value="MD">MD</option>
            <option value="ME">ME</option>
            <option value="MI">MI</option>
            <option value="MN">MN</option>
            <option value="MO">MO</option>
            <option value="MS">MS</option>
            <option value="MT">MT</option>
            <option value="NC">NC</option>
            <option value="NE">NE</option>
            <option value="NH">NH</option>
            <option value="NJ">NJ</option>
            <option value="NM">NM</option>
            <option value="NV">NV</option>
            <option value="NY">NY</option>
            <option value="ND">ND</option>
            <option value="OH">OH</option>
            <option value="OK">OK</option>
            <option value="OR">OR</option>
            <option value="PA">PA</option>
            <option value="RI">RI</option>
            <option value="SC">SC</option>
            <option value="SD">SD</option>
            <option value="TN">TN</option>
            <option value="TX">TX</option>
            <option value="UT">UT</option>
            <option value="VT">VT</option>
            <option value="VA">VA</option>
            <option value="WA">WA</option>
            <option value="WI">WI</option>
            <option value="WV">WV</option>
            <option value="WY">WY</option>
        </select> 
        <div class = "submit-button">
        <input type="submit" name="profile-submit" value="Submit!">
        </div>
    </form>

</div>';
}
else
{
    echo '<!--Form for the account info-->
    <div class="accountbox">
        <h1>User Information</h1>
        <!--Login: uid = userid upwd= userpassword-->
        <form action="includes/profile.in.php" method="post">
            <p>Full Name</p>
            <input type="text" name="uFullname" placeholder="Enter Full Name" required>
            <p>Address 1</p>
            <input type="text" name="uAddress1" placeholder="Enter Address" required>
            <p>Address 2</p>
            <input type="text" name="uAddress2" placeholder="Enter Address (Optional)">
            <p>City</p>
            <input type="text" name="uCity" placeholder="Enter City" required>
            <div class="zipfield">
            <p>Zip Code</p>
            <input id="zip" name="uZip" type="text" pattern="[0-9]*" required>
            <!--<input type="text" pattern="[0-9]{5,7}"  name = "uZip" placeholder="Enter Zip Code" required/> -->
            </div>
    
            <!--BIG DROP DOWN BOX FOR SELECTING STATES-->
            <p>State</p>
            <select name="uState" required>
                <option value="AL">AL</option>
                <option value="AK">AK</option>
                <option value="AR">AR</option>
                <option value="AZ">AZ</option>
                <option value="CA">CA</option>
                <option value="CO">CO</option>
                <option value="CT">CT</option>
                <option value="DC">DC</option>
                <option value="DE">DE</option>
                <option value="FL">FL</option>
                <option value="GA">GA</option>
                <option value="HI">HI</option>
                <option value="IA">IA</option>
                <option value="ID">ID</option>
                <option value="IL">IL</option>
                <option value="IN">IN</option>
                <option value="KS">KS</option>
                <option value="KY">KY</option>
                <option value="LA">LA</option>
                <option value="MA">MA</option>
                <option value="MD">MD</option>
                <option value="ME">ME</option>
                <option value="MI">MI</option>
                <option value="MN">MN</option>
                <option value="MO">MO</option>
                <option value="MS">MS</option>
                <option value="MT">MT</option>
                <option value="NC">NC</option>
                <option value="NE">NE</option>
                <option value="NH">NH</option>
                <option value="NJ">NJ</option>
                <option value="NM">NM</option>
                <option value="NV">NV</option>
                <option value="NY">NY</option>
                <option value="ND">ND</option>
                <option value="OH">OH</option>
                <option value="OK">OK</option>
                <option value="OR">OR</option>
                <option value="PA">PA</option>
                <option value="RI">RI</option>
                <option value="SC">SC</option>
                <option value="SD">SD</option>
                <option value="TN">TN</option>
                <option value="TX">TX</option>
                <option value="UT">UT</option>
                <option value="VT">VT</option>
                <option value="VA">VA</option>
                <option value="WA">WA</option>
                <option value="WI">WI</option>
                <option value="WV">WV</option>
                <option value="WY">WY</option>
            </select> 
            <div class = "submit-button">
            <input type="submit" name="profile-submit" value="Submit!">
            </div>
        </form>
    
    </div>';
}
   


?>




<?php
require "footer.php";
?> 