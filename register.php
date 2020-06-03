<?php

include('config.php');
// Define variables and initialize with empty values
$name= $email= $password= $confirm_password = "";
$name_err=$email_err=$password_err=$confirm_password_err="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

        //set parameters
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    
    //Validate name
    if (empty($name)) {
      $name_err = "Please enter your name";
    }else{
      $name;
    }

    // Validate email
    if(empty($email)){
        $email_err = "Please enter a password.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM admin WHERE email = ?";

        $stmt = mysqli_stmt_init($dbconnected);
        
        if($stmt = mysqli_prepare($dbconnected, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $email);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                // Check database if data exit and store the count in a variable.
                $rowCount = mysqli_stmt_num_rows($stmt); 
                if( $rowCount == 1){
                    $email_err = "This email address has already been registered.";
                } else{
                    
                    $email;
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty($password)){
        $password_err = "Please enter a password.";     
    }  else{
        // Repitition not to make my else statement blank
        $password;
    }
    
    // Validate confirm password
    if(empty($confirm_password)){
        $confirm_password_err = "Please confirm password.";     
    } else{
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) &&empty($email_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO admin (name, email, password) VALUES (?,?,?)";

        $password_hash = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
         
        if($stmt = mysqli_prepare($dbconnected, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $name, $email, $password_hash);
         
                    
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){

                // Pop alert for successful registration..
                echo "<script>alert('Admin Registered successfully!')</script>";
                //redirect to login page
                echo "<script>window.open('login.php', '_self')</script>";
                
                //header("location: login.php");
            } else{
                echo "<script>alert('Something went wrong. Please try again later!')</script>";
                //echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($dbconnected);
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
      <title>Register</title>

    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">
     <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="css/style.css">

    <style type="text/css">
    .error{
    color: red;
    font-size: 13px;
    </style>
}
  </head>

  <body class="bg-gray-900">

    <div class="signpanel-wrapper">
      <div class="signbox signup">
        <div class="signbox-header">
          <h2>A1EXPRESS</h2>
          <p class="mg-b-0">Admnin Registration</p>
        </div><!-- signbox-header -->


        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="signbox-body">
          <div class="form-group">
            <div class="form-group">
            <label class="form-control-label">First Name:</label>
            <input type="text" name="name" class="form-control">
            <span class="error"><?php echo $name_err; ?></span>
          </div><!-- form-group -->

            <label class="form-control-label">Email:</label>
            <input type="email" name="email" class="form-control">
            <span class="error"><?php echo $email_err; ?></span>
          </div><!-- form-group -->
          
          <div class="form-group">
            <label class="form-control-label">Password:</label>
            <input type="password" name="password" class="form-control">
            <span class="error"><?php echo $password_err; ?></span>
          </div><!-- form-group -->

          <div class="form-group">
            <label class="form-control-label">Confirm Password:</label>
            <input type="password" name="confirm_password" class="form-control">
            <span class="error"><?php echo $confirm_password_err; ?></span>
          </div><!-- form-group -->


          <div class="form-group mg-b-20 tx-12">By clicking Sign Up button below you agree to our <a href="#">Terms of Use</a> and our <a href="#">Privacy Policy</a></div>

          <button type="submit" name = "register" class="btn btn-success btn-block">Sign Up</button>
          <div class="tx-center bd pd-10 mg-t-40">Already a member? <a href="login.php">Sign In</a></div>
        </div><!-- signbox-body -->
      </div><!-- signbox -->
      </form>
    </div><!-- signpanel-wrapper -->

    <script src="lib/jquery/jquery.js"></script>
    <script src="lib/popper.js/popper.js"></script>
    <script src="lib/bootstrap/bootstrap.js"></script>

    <script src="js/shamcey.js"></script>
  </body>

</html>
