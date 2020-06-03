<?php


?>


<style type="text/css">
	label{
		font-size: 14px;
	}
</style>


          <!-- Add courier modal -->
    <div id="addcourier" class="modal fade">
      <div class="modal-dialog modal-dialog-vertical-center" role="document">
        <div class="modal-content bd-0 tx-14">
          <div class="modal-header pd-y-20 pd-x-25">
            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Courier</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body pd-25">
            <h4 class="lh-3 mg-b-20 tx-inverse hover-primary">

            	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                  <h4 class=" btn btn-secondary form-control">Receiver's Details</h4><hr>
                  <div style="width: 400px">
                    <label>First name</label>
                    <input type="text" name="rec_fname" class="form-control" required></div>
                    <div class="form-group">
                    <label>Last name</label>
                    <input type="text" name="rec_lname" class="form-control" required >
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="rec_address" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" name="rec_phone" class="form-control" required >
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="rec_email" class="form-control" required >
                  </div>
                  <div class="form-group">
                    <label>State</label>
                    <input type="text" name="rec_state" class="form-control" required >
                  </div>
                  

                  <h4 class=" btn btn-secondary form-control">Sender's Details</h4><hr>
                  <div class="form-group">
                    <label>First name</label>
                    <input type="text" name="sen_fname" class="form-control" required></div>
                    <div class="form-group">
                    <label>Last name</label>
                    <input type="text" name="sen_lname" class="form-control" required >
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="sen_address" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" name="sen_phone" class="form-control" required >
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="sen_email" class="form-control" required >
                  </div>
                  <div class="form-group">
                    <label>State</label>
                    <input type="text" name="sen_state" class="form-control" required >
                  </div>
                  
                   
                  <div class="form-group">
                    <label>Package Number</label>
                    <input type="text" name="pacnumber" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Package Destination</label>
                    <input type="text" name="packdestination" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Package Weight</label>
                    <input type="text" name="packweight" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Shipping Mode</label>
                    <input type="text" name="shippingmode" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Specify Individual Item</label>
                    <input type="text" name="specifyitem" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Payment Mode</label>
                    <input type="text" name="paymentmode" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Delivery Date</label>
                    <input type="date" name="deliverydate" class="form-control" required>
                  </div>
                  <div class="form-group">
                   <label>Departure Date</label>
                    <input type="date" name="departuredate" class="form-control" required>
                  </div>
                  <div class="form-group">
                   <label>PickUp Time</label>
                    <input type="time" name="picktime" class="form-control" required>
                  </div>
                  <div class="form-group">
                   <label>PickUp Date</label>
                    <input type="date" name="pickdate" class="form-control" required>
                  </div>
                  <div class="form-group">
                   <label>status</label>
                    <select type="text" name="status" class="form-control" data-placeholder="Choose one" required>
                    	<option label="Choose one"></option>
	                    <option value="On Transit">On Transit</option>
	                    <option value="Delivered">Delivered</option>
	                    </select>
                   </div>
                   <div class="form-group">
                   <label>Current Location</label>
                    <input type="text" name="location" class="form-control" required>
                   </div>
                   <div class="form-group">
                   <label>Comment</label>
                   <textarea name = "comment" class="form-control"></textarea>
                   </div>
                    <button type="submit" name="add" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                   </div>

                  	
                </form>
          </div>
         
        </div>
      </div><!-- modal-dialog -->
    </div><!-- end add courier modal -->

