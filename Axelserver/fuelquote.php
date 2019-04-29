<!-- page for the client manager-->
<?php
require "header.php";
require 'includes/db.in.php';
?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Axel User</title>
    <link href="userstyle.css" rel="stylesheet">
</head>

<!-- Using a header file to split the top part of the CODE to be more organized -->

<!--Form for fuel quote-->
<div class="accountbox">
    <h1>Fuel Quote Form</h1>
    <!--<center> <h4> Fill out the form to get an estimation of total price. When you are ready hit Submit </h4> <br> </center>-->
    <!--All the required information from the clients-->
    <form action="" method="post">

        <?php
        // RUNNING CALCULATION MODULE AND METHODS THROUGH PHP


        if (isset($_POST['get-price'])) {

            // Make sure that there is a session, if not start one
            if (!isset($_SESSION)) {
                session_start();
            }

            /*                          CALCULATION MODULE
            
            Location Factor: Texas =  2%, Not Texas = 4%
            Rate History:  1% if client had requested fuel before, 0 Of there are no history
            Gallons requested Factor :  2% if > 1000 Gallons other wise you do 3%
            Company Profit Factor = 10% STATIC DOES NOT CHANGE
            Rate Fluctuation = 4% for summer, other wise 3% 

            SUMMER = MARCH, APRIL, MAY, JUNE, JULY, AUGUST
            WINTER = SEPTEMBER, OCTOVER, NOVEMBER, DECEMBER, JUNUARY, FEBRUARY

            CURRENT PRICE PER GALLON = $1.50 THIS IS STATIC AND DOES NOT CHANGE
        
            SUGGESTED PRICE =CURRENT PRICE + MARGIN 
            MARGIN = Current Price * (Location factor - Rate History + Gallons Requested Tax + Company Profit Factor + Rate Fluctuation)
            
            */

            // VARIABLE OF POST METHOD TO GET CALCULATIONS
            $location = $_POST['cLocation'];
            //$gallons_requested = $_POST['cGallons'];
            $gallons_requested = filter_var($_POST['cGallons'], FILTER_VALIDATE_INT);
            $date_wanted = strtotime($_POST['cDate']);
            $currentID = $_SESSION['currentUser'];

            // PRICING MODULE VARIABLES. INITIALIZING ALL OF THEM
            $location_Factor = 0;
            $gallon_rate = 0;
            $rate_History = 0;
            $season_rate = 0;
            $suggested_price = 0;
            $company_Profit = .10;
            $current_price = 1.50;



            /*                                        STATE TAX RATES                                                   */
            $sql_location = "SELECT uState FROM profiles WHERE currentUser='$currentID'";
            $result_location = mysqli_query($conn, $sql_location);
            $row = mysqli_fetch_assoc($result_location);
            $r_address = $row['uState'];
            if ($r_address == "TX") {
                $location_Factor = 0.02;
                //echo $location_Factor;
            } else {
                $location_Factor = 0.04;
                //echo $location_Factor;
            }
            // ENDING OF FINDING STATE RATES


            //                                        STATE TAX RATES                                                   */
            $sql_history = "SELECT * FROM fuelquote WHERE client_username ='$currentID'";
            $result_history = mysqli_query($conn, $sql_history);
            $resultCheck = mysqli_fetch_assoc($result_history);
            
            if ($resultCheck > 0) {
                $rate_History = .01;

                //echo $rate_History;

            } else {
                $rate_History = 0;
                //echo $rate_History;
            }


            // END OF RATE HISTORY


            /*                                        GALLONS REQUESTED TAX RATES                                         */
            if ($gallons_requested > 1000) {
                $gallon_rate = 0.02;
                //echo $gallon_rate;
            } else {
                $gallon_rate = 0.03;
                //echo $rate_History;
            }
            // END OF GALLONS REQUESTED



            /*                                         SEASONS TAX RATES                                                */
            $month = date('m', $date_wanted); // Converted the date and then settibg it to months
            if ($month == '03' || $month == '04' || $month == '05' || $month == '06' || $month == '07' || $month == '08') {
                $season_rate = .04;
                //echo "ITS SUMMER!";

            } else // Every other month will be winter
                {
                    $season_rate = .03;
                    //echo "ITS WINTER!";
                }
            // END OF SEASON FLUCTUATIONS


            //COMPUTATION OF PRICE FROM CALCULATION MODULE

            $margin_price = 0;
            $total_due = 0;

            $margin_price = ($location_Factor - $rate_History +
            $gallon_rate + $company_Profit + $season_rate) * $current_price;
            $suggested_price = $current_price + $margin_price; // Gets suggested Price

            $total_due = $suggested_price * $gallons_requested;

          
        }


        if (isset($_POST['get-price'])) {

            // Finding address of the user and then post it into the form.
            $sql = "SELECT uAddress FROM profiles WHERE currentUser='$currentID'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $r_address = $row['uAddress'];
            $date_wanted = $_POST['cDate'];

            // Calling Out The page + pasting in the variable and changing the page based on conditions. 

            
            echo "  MARGIN PRICE = (" .$location_Factor. "% State Tax - " .$rate_History. "% History Discount + " .$gallon_rate. "% Gallons Discount + " .$company_Profit. " Profit Margin + " 
            .$season_rate. " Seasonal Rate) * $" .$current_price."";

            echo ' <br> 
            SUGGESTED PRICE = $'.$current_price.' Current Price x '.$margin_price.' Margin Price  
            <br>
            TOTAL PRICE = $'.$suggested_price.' Suggested Price x '.$gallons_requested.' Gallons';
            
            /*echo '  <center> 
            <h4> 
            Clients who reside in TEXAS recieves a 2% TAX DISCOUNT. 
            <br>
            Clients who purchased from us before recieve 1% DISCOUNT.<br>
            Clients who requested more than 1,000 Gallons will get an additional 1% DISCOUNT.
            Any Purchase made in the summer will require a 4% TAX. Winter will result in a 3% TAX. 
            </h4> <br> 
            </center>';*/


            echo '

            <br><br>

            <p>Number of Gallons</p>
            <input type="text" name="cGallons" pattern="\d*" value = "' . $gallons_requested . '" readonly>
            
            <p>Location</p>
            <input type="text" name="cLocation" value="' . $r_address . '" readonly />
            
            <p>Delivery Date</p>
            <input type="date" name="cDate" value= "' . $date_wanted . '" readonly />
            
            <p>Suggested Price Per Gallon</p>
            <input type="text" name="suggestedPrice" value = "'.$suggested_price.'" readonly >

            
            <p>Total Amount Due</p>
            <input type="text" name="amountDue" value="'.$total_due.'" readonly >
       
            
            <div class = "submit-button">
            <input type="submit" name="quote-submit" value="Submit!">
            </div>';
        } 


        else if (isset($_POST['quote-submit'])) {

            //VARIABLES
            $gallons_requested = filter_var($_POST['cGallons'], FILTER_VALIDATE_INT);
            $date_wanted = $_POST['cDate'];
            $currentID = $_SESSION['currentUser'];
            $purchase_price = $_POST['amountDue'];
            // SQL QUERY 
            $sql = "INSERT INTO fuelquote (client_username,gallons_requested,purchase_price,date_purchased) VALUES (?,?,?,?)";
            $stmt = mysqli_stmt_init($conn); // Connect to database by initializing 
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_bind_param($stmt, "siis", $currentID, $gallons_requested, $purchase_price, $date_wanted); // Take info from user to send to db using our statement
            mysqli_stmt_execute($stmt); // Execute the statement and run it inside our db to see if there is a match

           // header("Location:fuelquote.php?dataInput=SUCCESS");

           echo '<center> <h3> Thank You! Would you like to request another fuel order? </h3> </center> <br>';
           echo'
            <p>Number of Gallons</p>
            <input type="text" name="cGallons" pattern="\d*" required>

            

            <p>Delivery Date</p>
            <input type="date" name="cDate" required>

            <div class = "submit-button">
            <input type="submit" name="get-price" value="Get Price">
            </div>

            ';
           

        }

        else // Kepping the page the same
            {
            
            echo '<center> <h3> Fill out the form to get an estimation of total price. When you are ready click Submit </h3> <br> </center>';
        
            echo'
            <p>Number of Gallons</p>
            <input type="text" name="cGallons" pattern="\d*" required>

            
            <p>Delivery Date</p>
            <input type="date" name="cDate" required>

            <div class = "submit-button">
            <input type="submit" name="get-price" value="Get Price">
            </div>

            ';
            }


        
        // END OF PHP CODE
        ?>
    </form>
</div>


<?php
require "footer.php";
?>