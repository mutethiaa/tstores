<?php
 require 'africa/vendor/autoload.php';
use AfricasTalking\SDK\AfricasTalking;

    session_start();
    require 'connection.php';
    if(!isset($_SESSION['email'])){
        header('location:index.php');
    }else{
        $user_id=$_GET['id'];
        $confirm_query="update users_items set status='Confirmed' where user_id=$user_id";
        $confirm_query_result=mysqli_query($con,$confirm_query) or die(mysqli_error($con));
        $select_query="select * from users_items  where user_id=$user_id";
        $select_query_result=mysqli_query($con,$select_query) or die(mysqli_error($con));



        $query = "SELECT * FROM users WHERE id='$user_id'";
    
    $results = mysqli_query($con, $query);
    while($row = $results->fetch_assoc()) {
     $y= $row['name'];
      //$q=$row['user_id'];
      //echo "$y";

    
     
    }
    //echo "$y";
   

// Set your app credentials
$username   = "coolers";
$apiKey     = "042e2321c90886d6482fb23126dbcf14255baa183587e577097a8fe538d356f9";

// Initialize the SDK
$AT         = new AfricasTalking($username, $apiKey);

// Get the SMS service
$sms        = $AT->sms();

// Set the numbers you want to send to in international format
$recipients = "254791833360";

// Set your message
$message    = " $y has placed an order";

// Set your shortCode or senderId
//$from       = "254791833360";

try {
    // Thats it, hit send and we'll take care of the rest
    $result = $sms->send([
        'to'      => $recipients,
        'message' => $message,
        //'from'    => $from
    ]);

    //print_r($result);
} catch (Exception $e) {
    echo "Error: ".$e->getMessage();
}








        
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>teshtech Store</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body>
        <div>
            <?php
                require 'header.php';
            ?>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading"></div>
                            <div class="panel-body">
                                <p>Your order is confirmed. Thank you for shopping with us. <a href="products.php">Click here</a> to purchase any other item.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
               <div class="container">
                <center>
                   <p>Copyright &copy <a href="http://developerscenter.cf">teshtech</a> Store. All Rights Reserved.</p>
                   <p>This website is developed by michael</p>
               </center>
               </div>
           </footer>
        </div>
    </body>
</html>
