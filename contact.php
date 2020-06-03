<?php

 $name=$phone=$email=$subject=$message="";
   $name_err=$phone_err=$email_err=$subject_err=$message_err="";

if($_SERVER["REQUEST_METHOD"] == "POST"){


    //basic email header injections
    function has_header_injection($str){
        return preg_match("/[\r\n]/", $str);
    }

    $name=trim($_POST['name']);
    $phone=trim($_POST['phone']);
    $email=trim($_POST['email']);
    $subject=trim($_POST['subject']);
    $message=trim($_POST['message']);


    if (empty($name)) {
        $name_err = "Please enter your name";
    }
    if (empty($phone)) {
        $phone_err = "Please enter phone number";
    }
    if (empty($email)) {
        $email_err = "Please enter your email";
    }elseif (!preg_match("/[a-zA-Z0-9.@_]/", $email)) {
        $email_err = "Enter a valid email adddress";
    } if (empty($subject)) {
        $subject_err = "Please enter your Subject";
    } if (empty($message)) {
        $message_err = "Please enter your message";
    }
    if (has_header_injection($name) || has_header_injection($email) || has_header_injection($subject) || has_header_injection($message)) {

            die(); // kills or stops the script..
           
    }
    if (empty($name_err) && empty($phone_err) && empty($email_err) && empty($subject_err) && empty($message_err)) {


    $myMail = "a1samedayexpresdeliveryservice@gmail.com";
    $header = "from: ".$email;
    $alert = " - MAIL FROM A1EXPRESSDELIVERY WEBSITE - "."\n\nSender's Name : ". $name. "\n\n Sender's Phone: ". $phone. "\n\nEmail". $email. "\n\nSubject". $subject."\n\nMessage". $message;
    mail($myMail, $subject, $alert, $header);

    echo "<script>alert('Message sent successfully')</script>";
     echo "<script>window.open('index.html', '_self')</script>";

    }
   

}

?>





<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">

    <!-- viewport meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CONTACT US - A1EXPRESS DELIVERY SERVICE</title>

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
        .error{
            position: relative;
            top: -15px;
            color: red;
            font-size: 13px;
            padding-left: 10px
        }
    </style>
</head>
<body class="home1">

    <!-- preloader -->
   <!--  <div class="preloader-bg">
        <div class="preloader-container">
            <div class="my-preloader"><img src="images/favicon.png" alt="preloader"></div>
        </div>
    </div> -->


    <!--================================
        START HEADER AREA
    =================================-->

    <!-- start header -->
    <header>
        <!-- container start -->
        <div class="container">
            <!-- .row start -->
            <div class="row">
                <div class="tiny_header clearfix">
                    <div class="col-md-12">
                        <div class="tiny_header_wrapper">
                            <div class="header_info">
                                <ul>
                                    <li><a href="#faq">Faq</a></li>
                                    <li><a href="#contact">Help Desk</a></li>
                                    <li><a href="track_trace.php">Track Shipment</a></li>
                                </ul>
                            </div>

                            <div class="times">
                                <p><i class="fa fa-clock-o"></i> <span class="day">Sun - Sat</span>7 am - 8:30 pm</p>
                            </div>

                            <div class="social_links">
                                <ul>
                                    <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                                    <li><a href="#"><span class="fa fa-pinterest-p"></span></a></li>
                                    <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                                    <li><a href="#"><span class="fa fa-dribbble"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.row end -->

            <!-- row start -->
            <div class="row">
                <div class="header_middle_wrapper clearfix">
                    <div class="col-md-3 xs_fullwidth col-xs-3">
                        <div class="logo_container">
                            <a href="index.html"><img class = 'imgresize' src="images/logoN.jpg" alt="logo here"></a>
                        </div>
                    </div>

                    <div class="col-lg-5 xs_fullwidth col-xs-6 col-md-6 col-md-offset-0 col-lg-offset-1">
                        <div class="contact_info">
                            <div class="single_info_section">
                                <span class="fa fa-headphones v_middle"></span>
                                <div class="contact_numbers v_middle right_info">
                                    <p><a href="+1 862-234-9837">+1 862-234-9837</a></p>
                                    
                                </div>
                            </div>
                            <div class="single_info_section">
                                <span class="fa fa-envelope v_middle"></span>
                                <div class="contact_numbers right_info v_middle">
                                    <p><a href="mailto:a1samedayexpresdeliveryservice@gmail.com">a1samedayexpresdeliveryservice@gmail.com</a></p>
                                    <p><a href="mailto:a1expressdeliveries@gmail.com">a1expressdeliveries@gmail.com</a></p>
                                    <!-- <p><a href="mailto:A1samedayexpressdeliveryservice.com">A1samedayexpressdeliveryservice.com</a></p> -->
                                </div>
                            </div>
                        </div>
                    </div>

                        <div class="col-md-3 xs_fullwidth col-xs-3 col-lg-2 col-lg-offset-1">
                        <a href="quote.html" class="trust_btn quote_btn">get a free quote</a>
                    </div>
                </div>
            </div><!-- /.row end -->


        </div><!-- /.container end -->
    </header><!-- start header -->
    <!--================================
        END HEADER AREA
    =================================-->

    <!--================================
        START SLIDER AREA
    =================================-->
    <section class="breadcrumb reveal animated" data-delay="0.2s" data-anim="fadeInUpShort">

        <div class="breadcrumb_content">
            <!-- container starts -->
            <div class="container">
                <!-- row starts -->
                <div class="row">
                    <!-- col-md-12 starts -->
                    <div class="col-md-12">
                        <div class="breadcrumb_title_wrapper">
                            <div class="page_title">
                                <h1>Contact</h1>
                            </div>
                            <ul class="bread_crumb">
                                <li><a href="index.html">Home</a></li>
                                <li class="bread_active">Contact</li>
                            </ul>
                        </div>
                    </div><!-- col-md-12 ends -->
                </div>
                <!-- /.row ends -->
            </div><!-- /.container ends -->
        </div>

        <!-- menu starts -->
         <!-- menu starts -->
        <div class="menu_area">

            <!-- container starts -->
            <div class="container">
                <!-- row start -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="mainmenu nav_shadow">
                            <nav class="navbar navbar-default">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>

                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                    <ul class="nav navbar-nav magic_menu">
                                        <li>
                                            <a href="index.html">home</a></li>
                                        
                                        <li>
                                            <a href="about_us.html">About us</a></li>
                                        

                                        <li class="has_megamenu">
                                            <a href="services.html">Services<span class="fa fa-angle-down"></span></a>
                                            <div class="megamenu">
                                               <ul>
                                                    <li><a href="ondemand_service.html">On-Demand local Courier </a></li>
                                                    <li><a href="scheduled_service.html">Scheduled Delivery  </a></li>
                                                    <li><a href="next_flight_service.html">Next Flight Delivery</a></li>
                                                    <li><a href="emergency_service.html">Emergency Delivery</a></li></li>
                                                    
                                                </ul>
                                                <ul>
                                                    <li><a href="nationwide_service.html">Nationwide Courier Service</a></li>
                                                    <li><a href="messenger_service.html">Messenger Courier Service</a></li>
                                                    <li><a href="fulfilment_service.html">Fulfilment Service</a></li>
                                                    
                                                </ul>
                                                <ul>
                                                    <li><a href="fleet_solution_service.html">Fleet Solution Service</a></li>
                                                    <li><a href="bike_service.html">Bike Delivery Service</a></li>
                                                </ul>
                                            </div>

                                            <li class="has_dropdown">
                                            <a href="location.html">Location<span class="fa fa-angle-down"></span></a>
                                            <div class="dropdwon">
                                                <ul>
                                                    <li><a href="location.html">Northern Courier</a></li>
                                                    <li><a href="location.html">Sourthern Courier</a></li>
                                                    <li><a href="location.html">South Central Courier</a></li>
                                                    <li><a href="location.html">Midwest Courier</a></li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li><a href="track_trace.php">Track & Trace</a></li>
                                        <li   class="active"><a href="contact.php">Contact</a></li>
                                    <div class="search_form">
                                        <div class="search_btn" data-toggle="modal" data-target="#search_modal">
                                            <span class="fa fa-search"></span>
                                        </div>

                                        <!-- search Modal -->
                                        <div class="modal fade" id="search_modal" tabindex="-1" role="dialog">
                                          <div class="modal-dialog s_modal" role="document">
                                            <div class="modal-content">
                                              <div class="modal-body">
                                                <div class="search_form_wrapper">
                                                    <form method="post">
                                                        <div class="search_input">
                                                            <input type="text" name="search_field" placeholder="Find our services...">
                                                            <button class="submit_btn" type="submit">
                                                                <span class="fa fa-search"></span>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div><!-- /.navbar-collapse -->
                            </nav>
                        </div><!-- main menu ends -->
                    </div>
                </div><!-- /.row end -->

            </div><!-- /.container ends -->
        </div><!-- menu ends -->
    </section>
    <!--================================
        END SLIDER AREA
    =================================-->

    <!--================================
        START SLIDER AREA
    =================================-->
    <section class="get_quote section_padding reveal animated" data-delay="0.2s" data-anim="fadeInUpShort">
        <!-- container starts -->
        <div class="container">
            <!-- row starts -->
            <div class="row">
                <!-- col-md-3 starts -->
                <div class="col-md-3 col-sm-4">
                    <div class="office_schedule">
                        <div class="section_title">
                            <div class="title"><h2>BRANCH OFFICE</h2></div>
                        </div>

                        <ul>
                            <li><span class="day">United State</span><span class="time">1450 W Peachtree St Nw #200, Atlanta, GA 30309 United State.</span></li>
                            <!-- <li><span class="day">Monday</span><span class="time">09:30 am-8:30 pm</span></li>
                            <li><span class="day">Tuesday</span><span class="time">09:30 am-8:30 pm</span></li>
                            <li><span class="day">Wednesday</span><span class="time">09:30 am-8:30 pm</span></li>
                            <li><span class="day">Thursday</span><span class="time">09:30 am-8:30 pm</span></li>
                            <li><span class="day">Friday</span><span class="time">09:30 am-8:30 pm</span></li>
                            <li><span class="day">Monurday</span><span class="time">09:30 am-8:30 pm</span></li> -->
                        </ul>
                    </div>
                </div><!-- /.col-md-3 ends -->

                <!-- col-md-3 starts -->
                <div class="col-md-8 col-sm-7 col-sm-offset-1 col-md-offset-1">
                    <div class="quote_requ_wrapper">
                        <div class="section_title">
                            <div class="title"><h2>LETS HEAR FROM YOU </h2></div>
                        </div>

                        <div class="sub_content">
                            <p>We'll get in touch as soon as possible</p>
                        </div>

                        <div class="quote_form">
                            <form action="contact.php" method="POST">
                                <div class="form_half left">
                                    <input type="text" name = "name" placeholder="Full Name" value="<?php echo $name; ?>">
                                    <span class="error"><?php echo $name_err; ?></span>
                                </div>

                                <div class="form_half right">
                                    <input type="tel" name = "phone" placeholder="Phone" value="<?php echo $phone; ?>">
                                    <span class="error"><?php echo $phone_err; ?></span>
                                </div>

                                <div>
                                <input type="email" name = "email" placeholder="Email" value="<?php echo $email; ?>">
                                <span class="error"><?php echo $email_err; ?></span>
                                </div>

                                <div>
                                <input type="text" name = "subject" placeholder="subject" value="<?php echo $subject; ?>">
                                <span class="error"><?php echo $subject_err; ?></span>
                                </div>

                                <div>
                                <textarea name="message" placeholder="Message" cols="30" rows="10"><?php echo $message; ?></textarea>
                                <span class="error"><?php echo $message_err; ?></span>
                                </div>

                                <div class="quote_btn_wrapper">
                                    <button class="trust_btn qute_sbmt" type="submit" name="submit_msg">send message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- col-md-3 ends -->
            </div><!-- /.row ends -->
        </div><!-- container ends -->
    </section>
    <!--================================
        START SLIDER AREA
    =================================-->

    <!--================================
        START SLIDER AREA
    =================================-->
    <div id="google_map"></div>
    <!--================================
        START SLIDER AREA
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
                                <p>A1Express offers a wide range of same-day delivery services including messenger, courier and distribution services for clients consisting of small local firms to large national corporations. </p>
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
                            <div class="footer_subject">
                                <ul>
                                    <li><span class="fa fa-paper-plane-o"></span> <div class="subject_right">1450 W Peachtree St Nw #200, Atlanta, GA 30309 United State.</div></li>
                                    <li>
                                        <span class="fa fa-phone"></span>
                                        <div class="number subject_right">
                                            <a href="+1 862-234-9837">+1 862-234-9837</a>
                                            <a href="#"></a>
                                        </div>
                                    </li>
                                    <li>
                                        <span class="fa fa-envelope-o"></span>
                                        <div class="subject_right">
                                            <a href="mailto:a1samedayexpresdeliveryservice@gmail.com">Mail us</a>
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
                        <p class="footer_text">A1 EXPRESS. All Rights Reserved | Designed by <a href="#">PaulHack</a></p>
                    </div>
                </div>
                <div class="col-md-6 xs_fullwidth col-xs-6">
                    <div class="footer_menu clearfix">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><a href="about_us.html">About Us</a></li>
                            <li><a href="track_trace.php">Track & Trace</a></li>
                            <li><a href="services.html">Service</a></li>
                            <li><a href="contact.php">Contact Us</a></li>
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

    <script>

        var markers = [
            ['Afghanistan', 36.779030, 69.949081],
            ['Egypt', 	30.028706, 31.249592],
            ['Thailand', 13.736717, 100.523186],
            ['Bangladesh', 23.728783, 	90.393791]
        ];
        var myCenter=new google.maps.LatLng(32.294445, 72.349724);
        function initialize()
            {
                var mapProp = {
                  center:myCenter,
                  zoom:4,
                  scrollwheel: false,
                  mapTypeId:google.maps.MapTypeId.ROADMAP,
                    styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#edf0f5"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"Monuration":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]
                  };

                var map = new google.maps.Map(document.getElementById("google_map"),mapProp);

                for( var i=0; i < markers.length; i++){
                    var marker = new google.maps.Marker({
                      position: new google.maps.LatLng(markers[i][1], markers[i][2]),
                      map: map,
                      icon:'images/map-marker'+i+'.png'
                    });
                }


                var infowindow = new google.maps.InfoWindow({
                  content:"united-states"
                });
            }

            google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</body>

<!-- Mirrored from trusttransport.themeebit.com/quote.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Apr 2020 18:59:38 GMT -->
</html>
