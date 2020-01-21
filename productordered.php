


<?php require 'server.php'; 





?>
<!DOCTYPE html>
<html>
<title>teshstore</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<body class="w3-container">

<h2>orders</h2>

<table class="w3-table w3-striped w3-bordered w3-card-4">
<thead>
<tr class="w3-black">
  <th>customer Name</th>
  <th>product Name</th>
  <th>phone Number</th>
  <th>price</th>
</tr>
</thead>





 
   <?php  



//$z=$_SESSION['filename'];

  # code...
   $confirmed='Confirmed';

  $query = "SELECT * FROM users_items WHERE status='$confirmed'";
    
    $results = mysqli_query($db, $query);
    while($row = $results->fetch_assoc()) {
     $y= $row['item_id'];
      $q=$row['user_id'];

       $quer= "SELECT * FROM users WHERE id='$q'";
        $result = mysqli_query($db, $quer);
    if($row = $result->fetch_assoc()) {
      $name= $row['name'];
      $contact= $row['contact'];
     
    }
    $que= "SELECT * FROM items WHERE id='$y'";
        $result = mysqli_query($db, $que);
    if($row = $result->fetch_assoc()) {
      $productname= $row['name'];
       $price= $row['price'];

      
       echo "<tr>
  <td>$name</td>
  <td>$productname</td>
  <td>$contact</td>
  <td>$price</td>
</tr>";



    }












    }?>
    </table>
    </body>