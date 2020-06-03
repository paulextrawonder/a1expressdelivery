<?php
// Include config file
require_once "config.php";


// Define variables and initialize with empty values for receiver and sender details
$rfname = $rlname = $raddress = $rphone = $remail = $rstate = "";
$sfname = $slname = $saddress = $sphone = $semail = $sstate = "";

$name_err = $address_err = $phone_err = $email_err = $state_err = "";
$sname_err = $saddress_err = $sphone_err = $semail_err = $sstate_err = "";



//Initializinf variables for package details 
$pacNumber="";
$pacDestination ="";
$pacWeight ="" ;
$pacShipMode=""; 
$pacSpecItem="" ;
$pacPayMode="" ;
$pacDeliveryDate="";
$pacDepartDate="";
$pacPickTime="" ;
$pacPickDate="" ;
$status="";
$pacLocation=""; 
$pacComment="" ;
$pacDateReceived="";

$pacNumber_err = $pacDestination_err = $pacWeight_err = $pacShipMode_err = $pacSpecItem_err = $pacPayMode_err = $pacDeliveryDate_err = $pacDepartDate_err = $pacPickTime_err = 
$pacPickDate_err = $pacStatus_err = $pacLocation_err = $pacComment_err ="";

// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    

// recivers inputs
$rfname =trim($_POST["rec_fname"]); 
$rlname =trim($_POST["rec_lname"]);
$raddress =trim($_POST["rec_address"]);
$rphone =trim($_POST["rec_phone"]); 
$remail =trim($_POST["rec_email"]); 
$rstate =trim($_POST["rec_state"]);

// senders inputs
$sfname =trim($_POST["sen_fname"]); 
$slname =trim($_POST["sen_lname"]);
$saddress =trim($_POST["sen_address"]);
$sphone =trim($_POST["sen_phone"]); 
$semail =trim($_POST["sen_email"]); 
$sstate =trim($_POST["sen_state"]); 

//Packae details inputs
$pacNumber = trim($_POST["pacnumber"]); 
$pacDestination =trim($_POST["pacdestination"]); 
$pacWeight = trim($_POST["pacweight"]);
$pacShipMode =trim($_POST["shippingmode"]); 
$pacSpecItem =trim($_POST["specifyitem"]); 
$pacPayMode =trim($_POST["paymentmode"]); 
$pacDeliveryDate =($_POST["deliverydate"]); 
$pacDepartDate = ($_POST["departuredate"]);
$pacPickTime =($_POST["picktime"]); 
$pacPickDate =($_POST["pickdate"]);
$pacStatus =trim($_POST["status"]); 
$pacLocation = trim($_POST["location"]);
$pacComment =trim($_POST["comment"]); 


   // ---------------Validate receivers details ----------------------
    if(empty($rfname)){
        $name_err = "Please enter a name.";
    // } elseif(!filter_var($rfname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
    //     $name_err = "Please enter a valid name.";
    } 
   
    if(empty($raddress)){
        $address_err = "Please enter address.";     
      } 

    if (empty($rphone)) {
      $phone_err = "Please enter a phone number";
    }
  
    if (empty($remail)) {
      $email_err = "Please enter email address";
    }elseif(!filter_var($remail, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z0-9@._\s]+$/")))){
        $email_err = "Please enter a valid email address.";
    } 
  
    if (empty($rstate)) {
      $state_err = "Please enter state";
    }


      // ---------Validate Sender's details-----------------------
    if(empty($sfname)){
        $sname_err = "Please enter a name.";
    // } elseif(!filter_var($sfname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
    //     $sname_err = "Please enter a valid name.";
    } 
   
    if(empty($saddress)){
        $saddress_err = "Please enter address.";     
      } 

    if (empty($sphone)) {
      $sphone_err = "Please enter a phone number";
    }
  
    if (empty($semail)) {
      $semail_err = "Please enter email address";
    }elseif(!filter_var($semail, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z0-9@._\s]+$/")))){
        $semail_err = "Please enter a valid email address.";
    } 
  
    if (empty($sstate)) {
      $sstate_err = "Please enter state";
    }

    // ---------------------Package validations-------------------------------
     if (empty($pacNumber)) {
      $pacNumber_err = "Enter number of package";
    }
    if (empty($pacDestination)) {
      $pacDestination_err = "Please enter package destination";
    }
    if (empty($pacWeight)) {
      $pacWeight_err = "Please enter package weight";
    }
    if (empty($pacShipMode)) {
      $pacShipMode_err = "Please enter package shipping mode";
    }
    if (empty($pacSpecItem)) {
      $pacSpecItem_err = "Please enter package destination";
    }
    if (empty($pacPayMode)) {
      $pacPayMode_err = "Please enter package destination";
    }
    if (empty($pacDeliveryDate)) {
      $pacDeliveryDate_err = "Please enter package delivery date";
    }
    if (empty($pacDepartDate)) {
      $pacDepartDate_err = "Please enter package departure date";
    }
    if (empty($pacPickTime)) {
      $pacPickTime_err = "Please enter package pick up time";
    }
    if (empty($pacPickDate)) {
      $pacPickDate_err = "Please enter package pick up date";
    }
    if (empty($pacStatus)) {
      $pacStatus_err = "Please enter package status";
    }
    if (empty($pacLocation)) {
      $pacLocation_err = "Please enter package location";
    }

    // Check input errors before inserting in database
    if(empty($name_err) && empty($address_err) && empty($phone_err) && empty($email_err) && empty($state_err) && empty($sname_err) && empty($saddress_err) && empty($sphone_err) && empty($semail_err) && empty($sstate_err) && empty($pacNumber_err) && empty($pacDestination_err) && empty($pacWeight_err) && empty($pacShipMode_err) && empty($pacSpecItem_err) && empty($pacPayMode_err) && empty($pacDeliveryDate_err) && empty($pacDepartDate_err) && empty($pacPickTime_err) && empty($pacPickDate_err) && empty($pacStatus_err) && empty($pacLocation_err)){

        // Prepare an update statement
        $sql = "UPDATE users SET rec_fname=?, rec_lname=?, rec_address=?, rec_phone=?, rec_email=?, rec_state=?, sen_fname=?, sen_lname=?, sen_address=?, sen_phone=?, sen_email=?, sen_state=?,pac_number=?, pac_destination=?, pac_weight=?, ship_mode=?, specify_item=?, pay_mode=?, delivery_date=?, departure_date=?, pick_time=?, pick_date=?, status=?, location=?, comment=? WHERE id=?";
         
         $stmt = mysqli_stmt_init($dbconnected);
        if($stmt = mysqli_prepare($dbconnected, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssssssssssssssssssssi", $rfname, $rlname, $raddress, $rphone, $remail, $rstate, $sfname, $slname, $saddress, $sphone, $semail, $sstate, $pacNumber, $pacDestination, $pacWeight, $pacShipMode, $pacSpecItem, $pacPayMode, $pacDeliveryDate, $pacDepartDate, $pacPickTime, $pacPickDate, $pacStatus, $pacLocation, $pacComment, $id);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                echo "<script>alert(' Courier Record Updated successfully!')</script>";
                echo "<script>window.open('viewcourier.php', '_self')</script>";
               
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
                header("location: updatecourier.php");
                exit();

            }
        }
         
        // Close statement
       // mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($dbconnected);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM users WHERE id = ?";
        if($stmt = mysqli_prepare($dbconnected, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $id);
            
            // Set parameters
            $id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                     $sen_fname = $row["sen_fname"];
                    $sen_lname = $row["sen_lname"];
                    $sen_address = $row["sen_address"];
                    $sen_phone = $row['sen_phone'];
                    $sen_email = $row["sen_email"];
                    $sen_state = $row["sen_state"];

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
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later, possibly your query .";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($dbconnected);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}


?>

 
    <?php require_once('header.php')?>
   
    <title>Update Courier</title>

    <style type="text/css">
    .error{
    color: #dc3545;
    padding: 10px;
    font-size: 17px; 
    </style>
 }

  </head>

  <body>
<div class="sh-logopanel">
      <a href="#" class="sh-logo-text">A1EXPRESS</a>
      <a id="navicon" href="#" class="sh-navicon d-none d-xl-block"><i class="fa fa-navicon"></i></a>
      <a id="naviconMobile" href="#" class="sh-navicon d-xl-none"><i class="fa fa-navicon"></i></a>
    </div><!-- sh-logopanel -->

    <div class="sh-sideleft-menu">
      <label class="sh-sidebar-label">Navigation</label>
      <ul class="nav">
        <li class="nav-item">
          <a href="index.php" class="nav-link">
            <i class="fa fa-home"></i>
            <span>Dashboard</span>
          </a>
        </li><!-- nav-item -->

        <li class="nav-item">
          <a href="addcourier.php" class="nav-link">
            <i class="fa fa-plus"></i>
            <span>Add courier</span></a>
        </li><!-- nav-item -->

        <li class="nav-item">
          <a href="viewcourier.php" class="nav-link">
            <i class="fa fa-eye"></i>
            <span>View all Courier</span>
          </a>
        </li><!-- nav-item -->

        <li class="nav-item">
          <a href="deliveredpackage.php" class="nav-link">
            <i class="fa fa-suitcase"></i>
            <span>Delivered Package</span>
          </a>
        </li><!-- nav-item -->

        <li class="nav-item">
          <a href="ontransitpackage.php" class="nav-link">
            <i class="fa fa-truck"></i>
            <span>On Transit package</span>
          </a>
        </li><!-- nav-item -->

        <li class="nav-item">
          <a href="logout.php" class="nav-link">
            <i class="fa fa-ban"></i>
            <span>Logout</span>
          </a>
        </li><!-- nav-item -->
        
        </ul>
    </div>

    <div class="sh-headpanel">
      <div class="sh-headpanel-left">


        <!-- START: HIDDEN IN MOBILE -->
        
        <?php include_once('topnav.php')?>
    

    <div class="sh-mainpanel">
      <div class="sh-breadcrumb">
        <nav class="breadcrumb">
          <a class="breadcrumb-item" href="index.html">Admin</a>
          <span class="breadcrumb-item active">Dashboard</span>
        </nav>
      </div><!-- sh-breadcrumb -->
      <div class="sh-pagetitle">
        <div class="input-group">
          <input type="search" class="form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn"><i class="fa fa-search"></i></button>
          </span><!-- input-group-btn -->
        </div><!-- input-group -->
        <div class="sh-pagetitle-left">
          <div class="sh-pagetitle-icon"><i class="fa fa-edit"></i></div>
          <div class="sh-pagetitle-title">
            <span>admin</span>
            <h2>Update courier</h2>
          </div><!-- sh-pagetitle-left-title -->
        </div><!-- sh-pagetitle-left -->
      </div><!-- sh-pagetitle -->

      <div class="sh-pagebody">
        <div class="row row-sm">
          <div class="col-lg-8">
            <div class="row row-xs">
              
            </div><!-- row -->

            <div class="card bd-primary mg-t-20">
              <div class="card-header bg-primary tx-white"><em>Updating Courier record...</em></div>
              <div class="card-body">

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

                   <h4 class=" btn btn-secondary form-control">Receiver's Details</h4><hr>
                  <div class="form-group">
                    <label>First name</label>
                    <input type="text" name="rec_fname" class="form-control" value="<?php echo $rec_fname; ?>">
                    <span class="error"><?php echo $name_err;?></span>
                  </div>
                    <div class="form-group">
                    <label>Last name</label>
                    <input type="text" name="rec_lname" class="form-control" value="<?php echo $rec_lname; ?>">
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <textarea name="rec_address" class="form-control"><?php echo $rec_address; ?></textarea>
                    <span class="error"><?php echo $address_err;?></span>
                  </div>
                  <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" name="rec_phone" class="form-control" value="<?php echo $rec_phone; ?>">
                    <span class="error"><?php echo $phone_err;?></span>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="rec_email" required class="form-control" value="<?php echo $rec_email; ?>">
                    <span class="error"><?php echo $email_err;?></span>
                  </div>
                  <div class="form-group">
                    <label>Country</label>
                    <input type="text" name="rec_state" class="form-control" value="<?php echo $rec_state; ?>">
                    <span class="error"><?php echo $state_err;?></span>
                  </div>
                  

                  <h4 class=" btn btn-secondary form-control">Sender's Details</h4><hr>
                  <div class="form-group">
                    <label>First name</label>
                    <input type="text" name="sen_fname" class="form-control" value="<?php echo $sen_fname; ?>">
                  <span class="error"><?php echo $sname_err;?></span>
                 </div>
                    <div class="form-group">
                    <label>Last name</label>
                    <input type="text" name="sen_lname" class="form-control" value="<?php echo $sen_fname; ?>">
                    </div>
                    <div class="form-group">
                    <label>Address</label>
                    <textarea name="sen_address" class="form-control" ><?php echo $sen_address; ?></textarea>
                    <span class="error"><?php echo $saddress_err;?></span>
                    </div>
                    <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" name="sen_phone" class="form-control" value="<?php echo $sen_phone; ?>">
                    <span class="error"><?php echo $sphone_err;?></span>
                    </div>
                    <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="sen_email" required class="form-control" value="<?php echo $sen_email; ?>">
                    <span class="error"><?php echo $semail_err;?></span>
                    </div>
                    <div class="form-group">
                    <label>Counrty</label>
                    <input type="text" name="sen_state" class="form-control" value="<?php echo $sen_state; ?>">
                    <span class="error"><?php echo $sstate_err;?></span>
                    </div>

                  
                   <h4 class=" btn btn-secondary form-control">Package Details</h4><hr>
                  <div class="form-group">
                    <label>Package Number</label>
                    <input type="number" name="pacnumber" class="form-control" value="<?php echo $pacNumber; ?>">
                    <span class="error"><?php echo $pacNumber_err;?></span>
                  </div>
                  <div class="form-group">
                    <label>Package Destination</label>
                    <input type="text" name="pacdestination" class="form-control" value="<?php echo $pacDestination; ?>">
                    <span class="error"><?php echo $pacDestination_err;?></span>
                  </div>
                  <div class="form-group">
                    <label>Package Weight</label>
                    <input type="text" name="pacweight" class="form-control" value="<?php echo $pacWeight; ?>">
                    <span class="error"><?php echo $pacWeight_err;?></span>
                  </div>
                  <div class="form-group">
                    <label>Shipping Mode</label>
                    <input type="text" name="shippingmode" class="form-control" value="<?php echo $pacShipMode; ?>">
                    <span class="error"><?php echo $pacShipMode_err;?></span>
                  </div>
                  <div class="form-group">
                    <label>Specify Individual Item</label>
                    <input type="text" name="specifyitem" class="form-control" value="<?php echo $pacSpecItem; ?>">
                    <span class="error"><?php echo $pacSpecItem_err;?></span>
                  </div>
                  <div class="form-group">
                    <label>Payment Mode</label>
                    <input type="text" name="paymentmode" class="form-control" value="<?php echo $pacPayMode; ?>">
                    <span class="error"><?php echo $pacPayMode_err;?></span>
                  </div>
                  <div class="form-group">
                    <label>Delivery Date</label>
                    <input type="date" name="deliverydate" class="form-control" value="<?php echo $pacDeliveryDate; ?>">
                    <span class="error"><?php echo $pacDeliveryDate_err;?></span>
                  </div>
                  <div class="form-group">
                   <label>Departure Date</label>
                    <input type="date" name="departuredate" class="form-control" value="<?php echo $pacDepartDate; ?>">
                    <span class="error"><?php echo $pacDepartDate_err;?></span>
                  </div>
                  <div class="form-group">
                   <label>PickUp Time</label>
                    <input type="time" name="picktime" class="form-control" value="<?php echo $pacPickTime; ?>">
                    <span class="error"><?php echo $pacPickTime_err;?></span>
                  </div>
                  <div class="form-group">
                   <label>PickUp Date</label>
                    <input type="date" name="pickdate" class="form-control" value="<?php echo $pacPickDate; ?>">
                    <span class="error"><?php echo $pacPickDate_err;?></span>
                  </div>
                  <div class="form-group">
                   <label>status</label>
                    <select type="text" name="status" class="form-control" data-placeholder="Choose one" value="<?php echo $pacStatus; ?>">
                      <option label="Choose one"></option>
                      <option value="On Transit">On Transit</option>
                      <option value="Delivered">Delivered</option>
                      <option value="On Hold">On hold</option>
                      <option value="Arrived">Arrived</option>
                      <option value="On Air">On Air</option>
                      </select>
                      <span class="error"><?php echo $pacStatus_err;?></span>
                   </div>
                   <div class="form-group">
                   <label>Current Location</label>
                    <input type="text" name="location" class="form-control" value="<?php echo $pacLocation; ?>">
                    <span class="error"><?php echo $pacLocation_err;?></span>
                   </div>
                   <div class="form-group">
                   <label>Comment</label>
                   <textarea name = "comment" class="form-control"><?php echo $pacComment; ?></textarea>
                   </div>
                   <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                   </div>


                </form>



                <div id="flotArea" class="ht-200 ht-sm-300"></div>
              </div><!-- card-body -->
            </div><!-- card -->

            
                
              </div>

            </div>
     <?php include_once('footer.php')?>
