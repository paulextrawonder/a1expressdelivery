<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "config.php";

        //set parameters
    $id = trim($_GET['id']);
   
   
        // Prepare a select statement
        $sql = "SELECT * FROM users WHERE id = ?";

        $stmt = mysqli_stmt_init($dbconnected);
        
        if($stmt = mysqli_prepare($dbconnected, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $id);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                 $result = mysqli_stmt_get_result($stmt);
                
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                // Check database if data exit and store the count in a variable.
                $rowCount = mysqli_num_rows($result); 
                if( $rowCount === 0){
                    echo "<script>alert('Not found')</script>";
                    echo "<script>window.open('index.php')</script>";
                } else if($rowCount == 1){
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                        // Retrieve individual field value

                        $trackid = $row["track_code"];
                        $rec_fname = $row["rec_fname"];
                        $rec_lname = $row["rec_lname"];
                        $rec_address = $row["rec_address"];
                        $rec_phone = $row["rec_phone"];
                        $rec_email = $row["rec_email"];
                        $rec_state = $row["rec_state"];

                        $pacNumber = $row["pac_number"]; 
                        $pacDestination =$row["pac_destination"];
                        $pacWeight = $row["pac_weight"];
                        $pacShipMode =$row["ship_mode"]; 
                        $pacSpecItem =$row["specify_item"]; 
                        $pacPayMode =$row["pay_mode"]; 
                        $pacDeliveryDate =$row["delivery_date"]; 
                        $pacDepartDate = $row["departure_date"];
                        $pacPickTime =$row["pick_time"]; 
                        $pacPickDate =$row["pick_date"];
                        $pacStatus =$row["status"]; 
                        $pacLocation = $row["location"];
                        $pacComment =$row["comment"]; 
                    

                        
                }
            } else{
                header('location: error.php');
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }else{
        header('location: error.php');
        mysql_close($dbconnected);
    }
  
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
      <title>Package Result</title>

    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">

    <style type="text/css">
    .error{
    color: red;
    font-size: 13px;
    </style>

  </head>

  <body class="bg-gray-900">

    <div class="signpanel-wrapper">
      <div class="signbox signup">
        <div class="signbox-header">
          <h2>A1EXPRESS</h2>
          <p class="mg-b-0">Tracked Package Result</p>
          <p class="mg-b-0">Id: <?php echo $trackid?></p>
        </div><!-- signbox-header -->


        <div class="signbox-body">
          <div class="form-group">
            <div class="form-group">
                
                    <p align="center">Receiver's Info</p>
        </div><!-- signbox-header -->
            <label class="form-control-label">First Name:</label>
            <input class="form-control" disabled="disabled" value="<?php echo $rec_fname?>">
            <label class="form-control-label">Last Name:</label>
            <input class="form-control"  disabled="disabled" value="<?php echo $rec_lname?>">
            <label class="form-control-label">Address:</label>
            <input class="form-control"  disabled="disabled" value="<?php echo $rec_address?>">
            <label class="form-control-label">Phone:</label>
            <input class="form-control"  disabled="disabled" value="<?php echo $rec_phone?>">
            <label class="form-control-label">Email:</label>
            <input class="form-control"  disabled="disabled" value="<?php echo $rec_email?>">
            <label class="form-control-label">Country:</label>
            <input class="form-control"  disabled="disabled" value="<?php echo $rec_state?>">
            <hr>

            <p align="center">Package Info</p>
            <label class="form-control-label">Package number:</label>
            <input class="form-control"  disabled="disabled" value="<?php echo $pacNumber?>">
            <label class="form-control-label">Destination:</label>
            <input class="form-control"  disabled="disabled" value="<?php echo $pacDestination?>">
            <label class="form-control-label">Weight:</label>
            <input class="form-control"  disabled="disabled" value="<?php echo $pacWeight?>">
            <label class="form-control-label">Shipping mode:</label>
            <input class="form-control"  disabled="disabled" value="<?php echo $pacShipMode?>">
            <label class="form-control-label">Items:</label>
            <input class="form-control"  disabled="disabled" value="<?php echo $pacSpecItem?>">
            <label class="form-control-label">Payment mode:</label>
            <input class="form-control"  disabled="disabled" value="<?php echo $pacPayMode?>">
            <label class="form-control-label">Delivery Date:</label>
            <input class="form-control"  disabled="disabled" value="<?php echo $pacDeliveryDate?>">
            <label class="form-control-label">Departure time:</label>
            <input class="form-control"  disabled="disabled" value="<?php echo $pacDepartDate?>">
            <label class="form-control-label">Departure Date:</label>
            <input class="form-control"  disabled="disabled" value="<?php echo $rec_state?>">
            <label class="form-control-label">PickUp time:</label>
            <input class="form-control"  disabled="disabled" value="<?php echo $pacPickTime?>">
            <label class="form-control-label">Pick up date:</label>
            <input class="form-control"  disabled="disabled" value="<?php echo $pacPickDate?>">
            <label class="form-control-label">Current location:</label>
            <input class="form-control"  disabled="disabled" value="<?php echo $pacLocation?>">
            <label class="form-control-label">Comment:</label>
            <input class="form-control"  disabled="disabled" value="<?php echo $pacComment?>">
            <hr>
            
           <h2 align="center" style="background: blue; padding: 10px; ">STATUS: <strong><?php echo $pacStatus?></strong></h2>

            <!-- <div class="tx-center pd-5 alert-danger"><strong>NOTE!! </strong>Records of delivered packages will be cleared from our database after 7 working days! </div> -->
       

          <div class="tx-center bd pd-10 mg-t-40">Return to admin <a href="index.php">Homepage</a></div>
        </div><!-- signbox-body -->
      </div><!-- signbox -->
      </form>
    </div><!-- signpanel-wrapper -->

  </body>

</html>
