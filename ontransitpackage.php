
   <?php include_once('header.php')?>
   
    <title>Package on Transit</title>
    <style type="text/css">
    .session{
    font-size: 10px;
    color: red;
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
          <a href="deliveredpackage.php" class="nav-link ">
            <i class="fa fa-suitcase"></i>
            <span>Delivered Package</span>
          </a>
        </li><!-- nav-item -->

        <li class="nav-item">
          <a href="ontransitpackage.php" class="nav-link  active">
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
            <h2>On transit package</h2>
          </div><!-- sh-pagetitle-left-title -->
        </div><!-- sh-pagetitle-left -->
      </div><!-- sh-pagetitle -->

      <div class="sh-pagebody">
        <div class="row row-sm">
          <div class="col-lg-8">
            <div class="row row-xs">
              
            </div><!-- row -->

            <div class="card bd-primary mg-t-20">
              <div class="card-header bg-primary tx-white" id="all_courier">All package on Transit</div><?php
                    // Include config file
                    require_once "config.php";

                    $status = "onTransit";
                    
                    // Attempt select query execution
                    $sql = "SELECT id, track_code, sen_fname, rec_fname, date_received, status  FROM users WHERE status ='On Transit'";
                    if($result = mysqli_query($dbconnected, $sql)){
                      $rowCount = mysqli_num_rows($result);
                        if($rowCount > 0){

                                echo "<div class = 'table-responsive'>";
                                echo "<table class = 'table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>TrackID</th>";
                                        echo "<th>sHIPPERS <br>FIRST NAME</th>";
                                        echo "<th>RECEIVERS <br>FIRST NAME</th>";
                                        echo "<th>DATE CREATED</th>";
                                        echo "<th>STATUS</th>";
                                        echo "<th>ACTION &nbsp&nbspFLUX &nbsp&nbsp</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";

                                $index = 0;

                                while($row = mysqli_fetch_array($result)){
                                    
                                    //i added this extra hack for the index
                                    //so that when a record is deleted
                                    //it does't give a skipped index.
                                    // Hpwever, 
                                    //Note that i passed the actual id of
                                    //each record in the action dropdown.$row['id']

                                    $index++;
                                   
                                    echo "<tr>";
                                        echo "<td>" . $row['track_code']."</td>";
                                        echo "<td>" . $row['sen_fname'] . "</td>";
                                        echo "<td>" . $row['rec_fname'] . "</td>";
                                        echo "<td>" . $row['date_received'] . "</td>";
                                        echo "<td>" . $row['status'] . "</td>";
                                        echo "<td>" ;

                                        echo "<a href = 'trackpackage.php?id=".$row['id']."'<span class='fa fa-eye' style='font-size:22px; color: green' '></span></a>&nbsp&nbsp";

                                        echo "<a href = 'updatecourier.php?id=".$row['id']."'<span class ='fa fa-edit'style='font-size:22px;'></span></a>&nbsp";

                                        echo "<a href = 'deletecourier.php?id=".$row['id']."'<span class ='fa fa-trash' style='font-size:22px; color: red'></span></a>";

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
                   