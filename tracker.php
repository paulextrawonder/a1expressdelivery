<?php
// Check existence of id parameter before processing further
if(isset($_GET["trackid"]) && !empty(trim($_GET["trackid"]))){
    // Include config file
    require_once "admin/config.php";

    //Check for sql injection and replace with an empty string
    function strip_bad_char($input){
        $out = preg_replace("/^[a-zA-Z._-]$/", "", $input);
        return $out;
    }

        //set parameters
    $trackid = strip_bad_char(trim($_GET['trackid'])); 
   
        // Prepare a select statement
        $sql = "SELECT * FROM users WHERE track_code = ?";

        $stmt = mysqli_stmt_init($dbconnected);
        
        if($stmt = mysqli_prepare($dbconnected, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $trackid);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                 $result = mysqli_stmt_get_result($stmt);
                
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                // Check database if data exit and store the count in a variable.
                $rowCount = mysqli_num_rows($result); 
                if( $rowCount === 0){
                    header('location: ../track_trace.php');
                } else if($rowCount == 1){
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                        // Retrieve individual field value

                        $trackid = $row["track_code"];

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

<!-- Mirrored from trusttransport.themeebit.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Apr 2020 18:57:04 GMT -->
<head>
    <meta charset="UTF-8">

    <!-- viewport meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Package Tracker</title>

    <!-- owl carousel css -->
    <link rel="stylesheet" href="css/owl.carousel.css"/>


    <!-- font icofont -->
    <link rel="stylesheet" href="css/font-awesome.min.css"/>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Montserrat:300,400,400i,700,900" rel="stylesheet">

    <!-- bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>

    <!-- animte css -->
    <link rel="stylesheet" href="css/animate.css"/>

    <!-- camera css goes here -->
    <link rel="stylesheet" href="css/camera.css">

    <!-- venobox css goes here -->
    <link rel="stylesheet" href="css/venobox.css">

    <!-- style css -->
    <link rel="stylesheet" href="style.css"/>

    <!-- responsive css -->
    <link rel="stylesheet" href="css/responsive.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">

    <style type="text/css">
        .tracker{
            color: #fff;
            font-size: 15px;
        }
        .trackerimage{
            height: 100px;
            width: 150px;
            position: relative;
            top: -100px;
            margin-bottom: -100px;
            border-radius: 7px;
        }
    </style>
</head>
<body class="home1">

        <!--================================
        START HEADER AREA
    =================================-->
    <!--================================
        END HEADER AREA
    =================================-->

    <!--================================
        START SLIDER AREA
    =================================-->
    <section class="breadcrumb reveal animated" data-delay="0.2s" data-anim="fadeInUpShort">

        <div class="breadcrumb_content">
            <!-- container starts -->
           
                    <!-- col-md-12 starts -->
                    <div class="col-md-12">
                        <div class="breadcrumb_title_wrapper">
                            <div class="page_title">
                                <p><img class = "trackerimage "src="images/logoN.jpg"></p>
                                <h1>PACKAGE TRACKED<i class="fa fa-check"></i></h1>
                                <P>
                                <h1>TRACKER ID: <i class="fa fa-barcode "></i> <?php echo $trackid?></h1>
                            </P>
                            </div>
                            
                    </div><!-- col-md-12 ends -->
                </div>
                <!-- /.row ends -->
            </div><!-- /.container ends -->
        </div>

       
    <!--================================
        END BREADCRUMB AREA
    =================================-->

    <!--================================
        START LOGIN AREA
    =================================-->
    <section class="login_area section_padding reveal animated" data-delay="0.2s" data-anim="fadeInUpShort">
        <!-- container starts -->
        <div class="container">
            <!-- row starts -->
            <div class="row">
                <!-- col-md-3 starts -->
                <div class="col-md-5 col-sm-8 col-sm-offset-2 col-md-offset-3">
                    <div class="signbox-body">
          <div class="form-group">
            <div class="form-group">
                
                    
        </div><!-- signbox-header -->
            <p align="center" class="alert btn-success">Sender's Info <i class="fa fa-eye"></i></p>
            <label class="form-control-label">First Name:</label>
            <input class="form-control" disabled="disabled" value="<?php echo $sen_fname?>">
            <label class="form-control-label">Last Name:</label>
            <input class="form-control"  disabled="disabled" value="<?php echo $sen_lname?>">
            <label class="form-control-label">Address:</label>
            <textarea class="form-control" rows="4" disabled="disabled"><?php echo $sen_address?>;</textarea>
            <label class="form-control-label">Phone:</label>
            <input class="form-control"  disabled="disabled" value="<?php echo $sen_phone?>">
            <label class="form-control-label">Email:</label>
            <input class="form-control"  disabled="disabled" value="<?php echo $sen_email?>">
            <label class="form-control-label">Country:</label>
            <input class="form-control"  disabled="disabled" value="<?php echo $sen_state?>">
            <hr>


             <p align="center" class="alert btn-success">Receiver's Info <i class="fa fa-eye"></i></p>
            <label class="form-control-label">First Name:</label>
            <input class="form-control" disabled="disabled" value="<?php echo $rec_fname?>">
            <label class="form-control-label">Last Name:</label>
            <input class="form-control"  disabled="disabled" value="<?php echo $rec_lname?>">
            <label class="form-control-label">Address:</label>
            <textarea class="form-control" rows="4" disabled="disabled"><?php echo $rec_address?>;</textarea>
            <label class="form-control-label">Phone:</label>
            <input class="form-control"  disabled="disabled" value="<?php echo $rec_phone?>">
            <label class="form-control-label">Email:</label>
            <input class="form-control"  disabled="disabled" value="<?php echo $rec_email?>">
            <label class="form-control-label">Country:</label>
            <input class="form-control"  disabled="disabled" value="<?php echo $rec_state?>">
            <hr>



            <p align="center" class="alert btn-success">Package Info <i class="fa fa-eye"></i></p>
            <label class="form-control-label">Package number:</label>
            <input class="form-control"  disabled="disabled" value="<?php echo $pacNumber?>">
            <label class="form-control-label">Destination:</label>
            <input class="form-control"  disabled="disabled" value="<?php echo $pacDestination?>">
            <label class="form-control-label">Weight:</label>
            <input class="form-control"  disabled="disabled" value="<?php echo $pacWeight?>">
            <label class="form-control-label">Shipping mode:</label>
            <input class="form-control"  disabled="disabled" value="<?php echo $pacShipMode?>">
            <label class="form-control-label">Items:</label>
            <textarea class="form-control" rows="4" disabled="disabled"><?php echo $pacSpecItem?></textarea>
            <label class="form-control-label">Payment mode:</label>
            <input class="form-control"  disabled="disabled" value="<?php echo $pacPayMode?>">
            <label class="form-control-label">Delivery Date:</label>
            <input class="form-control"  disabled="disabled" value="<?php echo $pacDeliveryDate?>">
            <label class="form-control-label">Departure Date:</label>
            <input class="form-control"  disabled="disabled" value="<?php echo $pacDepartDate?>">
            <label class="form-control-label">PickUp time:</label>
            <input class="form-control"  disabled="disabled" value="<?php echo $pacPickTime?>">
            <label class="form-control-label">Pick up date:</label>
            <input class="form-control"  disabled="disabled" value="<?php echo $pacPickDate?>">
            <label class="form-control-label">Current location:</label>
            <input class="form-control"  disabled="disabled" value="<?php echo $pacLocation?>">
            <label class="form-control-label">Comment:</label>
            <textarea class="form-control" rows="4" disabled="disabled"><?php echo $pacComment?>;</textarea>
            <hr>
            
           <div align="center" class="alert btn-success" ">STATUS: <strong><?php echo $pacStatus?></strong></div>

         <div align = "center" class="alert alert-success" >Track Another Package <a href="track_trace.php"> Here!</a></div>

        </div><!-- signbox-body -->
      </div><!-- signbox -->
      </form>
    </div><!-- signpanel-wrapper -->
                </div><!-- col-md-3 ends -->
            </div><!-- /.row ends -->
        </div><!-- container ends -->
    </section>
    <!--================================
        END LOGIN AREA
    =================================-->


    <!--================================
        START FOOTER
    =================================-->
  <footer>
        <div class="big_footer_wrapper section_padding">
            <div class="container">
                <div class="row">

                    <div class="col-md-3 xxs_fullwidth col-xs-6">
                        <div class="footer_about_wrapper reveal animated" data-anim="fadeInLeftShort" >
                            <div class="footer_logo">
                                <a href="index.html">
                                    <img class = 'imgresize' src="images/favicon.png" alt="footer_logo">
                                </a>
                            </div>
                            <div class="footer_about_us">
                                <p>A1Express offers a wide range of same-day  services including messenger, courier and distribution services for clients consisting of small local firms to large national corporations. </p>
                            </div>
                            <div class="footer_social">
                                <h4>get connected</h4>
                                <ul>
                                    <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                                    <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                                    <li><a href="#"><span class="fa fa-pinterest-p"></span></a></li>
                                    <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                                    <li><a href="#"><span class="fa fa-skype"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 xxs_fullwidth col-xs-6">
                        <div class="footer_widgets sevices reveal animated" data-anim="fadeInRightShort" data-delay="0.2s">
                            <div class="widget_title">
                                <h4>our services</h4>
                            </div>
                            <div class="footer_links">
                                <ul>
                                    <li><a href="ondemand_service.html">On Demand</a></li><hr>
                                    <li><a href="scheduled_service.html">Scheduled</a></li><hr>
                                    <li><a href="next_flight_service.html">Next-Day Air</a></li><hr>
                                    <li><a href="emergency_service.html">Expedited</a></li><hr>
                                    <li><a href="nationwide_service.html">Nationwide</a></li><hr>
                                    <li><a href="messenger_service.html">Messenger</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 xxs_fullwidth col-xs-6">
                        <div class="footer_widgets contact reveal animated" data-anim="fadeInRightShort" data-delay="0.4s">
                            <div class="widget_title">
                                <h4>Contact details</h4>
                            </div>
                            <div class="footer_address">
                                <ul>
                                    <li><span class="fa fa-paper-plane-o"></span> <div class="address_right">1450 W Peachtree St Nw #200, Atlanta, GA 30309 United State.</div></li>
                                    <li>
                                        <span class="fa fa-phone"></span>
                                        <div class="number address_right">
                                            <a href="+1 862-234-9837">+1 862-234-9837</a>
                                            <a href="#"></a>
                                        </div>
                                    </li>
                                    <li>
                                        <span class="fa fa-envelope-o"></span>
                                        <div class="address_right">
                                            <a href="mailto:a1samedayexpresservice@gmail.com">Mail us</a>
                                            <a href="#"></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 xxs_fullwidth col-xs-6">
                        <div class="footer_widgets twitter reveal animated" data-anim="fadeInRightShort" data-delay="0.6s">
                            <div class="widget_title">
                                <h4>Locations</h4>
                            </div>

                            <div class="footer_links">
                                <ul>
                                    <li><a href="location.html">Northern Courier</a></li><hr>
                                    <li><a href="location.html">Sourthern Courier</a></li><hr>
                                    <li><a href="location.htmll">South Central</a></li><hr>
                                    <li><a href="location.html">Midwest Courier</a></
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="tiny_footer">
            <div class="container">
                <div class="col-md-6 xs_fullwidth col-xs-6">
                    <div class="footer_text_wrapper">
                        <p class="footer_text">A1Express . All Rights Reserved | Designed by <a href="#">PaulHack</a></p>
                    </div>
                </div>
                <div class="col-md-6 xs_fullwidth col-xs-6">
                    <div class="footer_menu clearfix">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><a href="about_us.html">About Us</a></li>
                            <li><a href="track_trace.php">Track & Trace</a></li>
                            <li><a href="services.html">Service</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--================================
        END FOOTER
    =================================-->

    <!--//////////////////// JS GOES HERE ////////////////-->

    <!-- jquery latest version -->
    <script src="js/jquery-1.12.3.js"></script>

    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>

    <!-- jquery easing 1.3 -->
    <script src="js/jquery.easing1.3.js"></script>

    <!-- Owl carousel js-->
    <script src="js/owl.carousel.min.js"></script>

    <!-- venobox js -->
    <script src="js/venobox.min.js"></script>

    <!-- Isotope js-->
    <script src="js/isotope.js"></script>

    <!-- Pakcery layout js-->
    <script src="js/packery.js"></script>

    <!-- waypoint js -->
    <script src="js/waypoints.min.js"></script>

    <!-- google map js -->
    <script src="http://maps.googleapis.com/maps/api/js"></script>

    <!-- smoothscroll js -->
    <script src="js/jqury.smooth-scroll.min.js"></script>

    <!-- jquery camera slider js -->
    <script src="js/jquery.camera.min.js"></script>
    <!-- Counter up -->
    <script src="js/jquery.counterup.js"></script>

    <!-- Waypoint -->
    <script src="js/waypoints.min.js"></script>

    <!-- Main js -->
    <script src="js/main.js"></script>
</body>

</html>