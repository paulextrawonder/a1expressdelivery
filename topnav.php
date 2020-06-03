              
      </div><!-- sh-headpanel-left -->

      <div class="sh-headpanel-right">
        <div class="dropdown mg-r-10">
          <a href="#" class="dropdown-link dropdown-link-notification">
            <i class="fa fa-tags tx-24"></i>
          </a>
        </div>
        <div class="dropdown dropdown-notification">
          <a href="#" data-toggle="dropdown" class="dropdown-link dropdown-link-notification">
            <i class="fa fa-bell tx-24"></i>
            <span class="square-8"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-menu-header">
              <label>Notifications</label>
              <a href="#">Mark All as Read</a>
            </div><!-- d-flex -->

            <div class="media-list">
              <!-- loop starts here -->
              <a href="#" class="media-list-link read">
                <div class="media pd-x-20 pd-y-15">
                  <img src="img/img8.jpg" class="wd-40 rounded-circle" alt="">
                  <div class="media-body">
                    <p class="tx-13 mg-b-0"><strong class="tx-medium">Benjamin Grace</strong> just delivered to London office.</p>
                    <span class="tx-12">May 20, 2020 8:45am</span>
                  </div>
                </div><!-- media -->
              </a>
              <!-- loop ends here -->
              <a href="#" class="media-list-link read">
                <div class="media pd-x-20 pd-y-15">
                  <img src="img/img9.jpg" class="wd-40 rounded-circle" alt="">
                  <div class="media-body">
                    <p class="tx-13 mg-b-0"><strong class="tx-medium">Mellisa Brown</strong> Slight server downtime </p><strong>In USA</strong>
                    <span class="tx-12">May 15, 2020 12:44am</span>
                  </div>
                </div><!-- media -->

                <!-- loop ends here -->
              <a href="#" class="media-list-link read">
                <div class="media pd-x-20 pd-y-15">
                  <img src="img/img9.jpg" class="wd-40 rounded-circle" alt="">
                  <div class="media-body">
                    <p class="tx-13 mg-b-0"><strong class="tx-medium">Mellisa Brown</strong> Flight packaged to Europe </p><strong>Delivered</strong>
                    <span class="tx-12">May 15, 2020 4:44am</span>
                  </div>
                </div><!-- media -->
                          
              </a>
              <div class="media-list-footer">
                <a href="#" class="tx-12"><i class="fa fa-angle-down mg-r-5"></i> Show All Notifications</a>
              </div>
            </div><!-- media-list -->
          </div><!-- dropdown-menu -->
        </div>
        <div class="dropdown dropdown-profile">
          <a href="#" data-toggle="dropdown" class="dropdown-link">
            <img src="img/img1.jpg" class="wd-60 rounded-circle" alt="">
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <div class="media align-items-center">
              <img src="img/img1.jpg" class="wd-60 ht-60 rounded-circle bd pd-5" alt="">
              <div class="media-body">
                <h6 class="tx-inverse tx-15 mg-b-5">Welcome,</h6>
                <p class="mg-b-0 tx-12"><b class ="session"><?php echo htmlspecialchars($_SESSION["email"]); ?></b></p>
              </div><!-- media-body -->
            </div><!-- media -->
            <hr>
            <ul class="dropdown-profile-nav">
              <li><a href="#"><i class="fa fa-female"></i> Edit Profile</a></li>
              <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
              <li><a href="logout.php"><i class="fa fa-ban"></i> Sign Out</a></li>
            </ul>
          </div><!-- dropdown-menu -->
        </div>
      </div><!-- sh-headpanel-right -->
    </div><!-- sh-headpanel -->