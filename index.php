<?php include_once('header.php')?>
    <title>Dashboard</title>
    <style type="text/css">
      .session{
    font-size: 10px;
    color: red;
}
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
          <a href="index.php" class="nav-link  active" >
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
          <div class="sh-pagetitle-icon"><i class="fa fa-home"></i></div>
          <div class="sh-pagetitle-title">
            <span>All Features Summary</span>
            <h2>Dashboard</h2>
          </div><!-- sh-pagetitle-left-title -->
        </div><!-- sh-pagetitle-left -->
      </div><!-- sh-pagetitle -->

      <div class="sh-pagebody">
        <div class="row row-sm">
          <div class="col-lg-8">
            <div class="row row-xs">
              <div class="col-6 col-sm-4 col-md">
                <a href="addcourier.php" class="shortcut-icon">
                  <div>
                    <i class="fa fa-plus"></i>
                    <span>Add courier</span>
                  </div>
                </a>
              </div><!-- col -->
              <div class="col-6 col-sm-4 col-md">
                <a href="#all_courier" class="shortcut-icon">
                  <div>
                    <i class="fa fa-eye"></i>
                    <span >Quick courier<br> View</span>
                  </div>
                </a>
              </div><!-- col -->
              <div class="col-6 col-sm-4 col-md mg-t-10 mg-sm-t-0">
                <a href="deliveredpackage.php" class="shortcut-icon">
                  <div>
                    <i class="fa fa-glass"></i>
                    <span>Delivered Package</span>
                  </div>
                </a>
              </div><!-- col -->
              <div class="col-6 col-sm-4 col-md mg-t-10 mg-md-t-0">
                <a href="ontransitpackage.php" class="shortcut-icon">
                  <div>
                    <i class="fa fa-plane"></i>
                    <span>On transit Package</span>
                  </div>
                </a>
              </div><!-- col -->
              <div class="col-6 col-sm-4 col-md mg-t-10 mg-md-t-0">
                <a href="#" class="shortcut-icon">
                  <div>
                    <i class="fa fa-spinner"></i>
                    <span>A1EXPRESS Staff</span>
                  </div>
                </a>
              </div><!-- col -->
              <div class="col-6 col-sm-4 col-md mg-t-10 mg-md-t-0">
                <a href="../index.html" class="shortcut-icon">
                  <div>
                    <i class="fa fa-desktop"></i>
                    <span>Customer's<br>Page</span>
                  </div>
                </a>
              </div><!-- col -->
            </div><!-- row -->

            <div class="card bd-primary mg-t-20">
              <div class="card-header bg-primary tx-white">Daily Statistics</div>
              <div class="card-body pd-sm-30">
            <p class="mg-b-20 mg-sm-b-30">Daily company's delivery chart.</p>

            <div class="progress mg-b-20">
              <div class="progress-bar progress-bar-striped wd-25p" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <div class="progress mg-b-20">
              <div class="progress-bar progress-bar-striped bg-success wd-35p" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <div class="progress mg-b-20">
              <div class="progress-bar progress-bar-striped bg-warning wd-50p" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <div class="progress mg-b-20">
              <div class="progress-bar progress-bar-striped bg-danger wd-65p" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <div class="progress">
              <div class="progress-bar progress-bar-striped bg-info wd-75p" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div><!-- card-body -->
        </div><!-- card -->
        

            <div class="card bd-primary mg-t-20">
              <div class="card-header bg-primary tx-white" id="all_courier">All Couriers</div><?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT id, track_code, sen_fname, rec_fname, date_received, status  FROM users";
                    if($result = mysqli_query($dbconnected, $sql)){
                      $rowCount = mysqli_num_rows($result);
                        if($rowCount > 0){

                                echo "<div class = 'table-responsive'>";
                                echo "<table class = 'table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>S/N</th>";
                                        echo "<th>TrackID</th>";
                                        echo "<th>sHIPPERS <br>FIRST NAME</th>";
                                        echo "<th>RECEIVERS <br>FIRST NAME</th>";
                                        echo "<th>DATE CREATED</th>";
                                        echo "<th>STATUS</th>";
                                        echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";

                                $index = 0;
                                while($row = mysqli_fetch_array($result)){
                                    $index++;
                                   
                                    echo "<tr>";
                                        echo "<td>" . $index;
                                        echo "<td>" . "<strong>".$row['track_code']."</strong></td>";
                                        echo "<td>" . $row['sen_fname'] . "</td>";
                                        echo "<td>" . $row['rec_fname'] . "</td>";
                                        echo "<td>" . $row['date_received'] . "</td>";
                                        echo "<td>" . $row['status'] . "</td>";
                                        
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                                                         
                            echo "</table>";
                            echo "<div align = 'center'>Go to courier action page <a href='viewcourier.php'>here</a></div>";
                            echo "</div>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbconnected);
                    }
 
                    // Close connection
                    mysqli_close($dbconnected);
                    ?>
              </div><!-- table-responsive -->
            </div><!-- card -->
          </div>


          </div><!-- col-8 -->
          <div class="col-lg-4 mg-t-20 mg-lg-t-0">
            <div class="alert alert-primary bd bd-primary pd-25 mg-b-20">
              <h6 class="tx-14 mg-b-15">Some Announcement</h6>
              <p class="mg-b-0 op-8">Please all admins collecting shipments should be careful with addressing and enusre the correct tracking code is given to customers</p>
              <strong><br>-Super Admin</strong>
            </div><!-- alert -->

            
</div>

              </div><!-- card-body -->
            </div><!-- card -->
          </div><!-- col-4 -->
        </div><!-- row -->
      </div><!-- sh-pagebody -->
   

   <?php include_once('footer.php')?>
