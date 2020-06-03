
   <?php include_once('header.php')?>
   
    <title>View Courier</title>
    <style type="text/css">
    .session{
    font-size: 10px;
    color: red;
    </style>

  
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
            <span>Add courier</span>
          </a>
        </li><!-- nav-item -->

        <li class="nav-item">
          <a href="viewcourier.php" class="nav-link active">
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
          <div class="sh-pagetitle-icon"><i class="fa fa-eye"></i></div>
          <div class="sh-pagetitle-title">
            <span>admin</span>
            <h2>List of all couriers</h2>
          </div><!-- sh-pagetitle-left-title -->
        </div><!-- sh-pagetitle-left -->
      </div><!-- sh-pagetitle -->

      <div class="sh-pagebody">
        
              
           

                    <div class="card bd-primary mg-t-20">
              <div class="card-header bg-primary tx-white" id="all_courier">All Couriers</div>
                  <div class="card-body pd-sm-30">
            <p class="mg-b-20 mg-sm-b-30">List of Couriers, careful with editing/deletion... all tracks are recorded.</p>

              <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT id, track_code, sen_fname, rec_fname, date_received, status  FROM users";
                    if($result = mysqli_query($dbconnected, $sql)){
                      $rowCount = mysqli_num_rows($result);
                        if($rowCount > 0){

                                echo "<div class='table-wrapper'>";
                                //echo "<div class = 'table display responsive nowrap'>";
                                echo "<table id='datatable1' class = 'table table-responsive'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>S/N</th>";
                                        echo "<th class='wd-15p'>TrackID</th>";
                                        echo "<th class='wd-15p'>sHIPPERS <br>FIRST NAME</th>";
                                        echo "<th class='wd-20p'>RECEIVERS <br>FIRST NAME</th>";
                                        echo "<th class='wd-15p'>DATE CREATED</th>";
                                        echo "<th class='wd-10p'>STATUS</th>";
                                        echo "<th class='wd-25p'>ACTION &nbsp&nbspFLUX &nbsp&nbsp</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";

                                $index = 0;

                                while($row = mysqli_fetch_array($result)){
                                $index++;

                                   
                                    echo "<tr>";
                                        echo "<td>" .$index;
                                        echo "<td>" . $row['track_code']."</td>";
                                        echo "<td>" . $row['sen_fname'] . "</td>";
                                        echo "<td>" . $row['rec_fname'] . "</td>";
                                        echo "<td>" . $row['date_received'] . "</td>";
                                        echo "<td>" . $row['status'] . "</td>";
                                        echo "<td>" ; 

                                        echo "<a href = 'trackpackage.php?id=".$row['id']."'<span class='fa fa-eye' style='font-size:22px; color: green' '></span></a>&nbsp&nbsp";

                                        echo "<a href = 'updatecourier.php?id=".$row['id']."'<span class ='fa fa-edit' style='font-size:22px' '></span></a>&nbsp";
                                        echo "<a href = 'deletecourier.php?id=".$row['id']."'<span class ='fa fa-trash' style='font-size:22px; color: red '></span></a>&nbsp";

                                     //    echo "<span class ='fa fa-trash' data-toggle='modal' data-target='#deletecourier' style='font-size:22px; color: red'></span></a>";

                                     //    echo "<div class='modal' id = 'deletecourier'>";
                                     //          echo "<div class='modal-dialog'>";
                                     //          echo "<div class='modal-content'>";

                                     //  echo "<div class='modal-header'>";
                                     //      echo "<h4 class='modal-title'>Confirm delete?</h4>";
                                     //      echo "<button type='button' class = 'close' data-dismiss='modal'>&times;</button>";
                                     // echo " </div>";

                                     //  echo "<div class='modal-body'>";
                                     //     echo " <p> Are you sure you want to truncate ".$row['track_code']." id courier records?</p>";

                                     // echo " <div class='modal-footer'>";

                                     //    echo "<a href ='deletecourier.php?id=".$row['id']."'<button class='btn btn-danger'>Submit</a>";
                                     //  // <!-- <a href="updatecourier.php?id='.$row['id']." class="btn btn-danger">Submit</a> -->
                                     //     echo " <button type='button' class='btn btn-success' data-dismiss='modal'>Close</button>";
                                     //     echo " </div>
                                     //                      </div>
                                     //                         </div>
                                     //                            </div>
                                     //                            </div>

                                     //                                   </div>";

                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                                                         
                            echo "</table>";
                            echo "</div>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                            echo "<p class ='lead'><a href='addcourier.php'><strong>Add</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbconnected);
                    }
 
                    // Close connection
                    mysqli_close($dbconnected);
                    ?>
              </div><!-- table-responsive -->
            </div><!-- card -->

          </div><!-- col-8 -->

                <div id="flotArea" class="ht-200 ht-sm-300"></div>
              </div><!-- card-body -->
            </div><!-- card -->

            
                
              </div>

            </div>



     <?php include_once('footer.php')?><?php
                   