<?php
// Process delete operation after confirmation
if(isset($_GET["id"]) && !empty($_GET["id"])){
    

    // Include config file
    require_once "config.php";

    // Set parameters
    $id = trim($_GET["id"]);
    
    // Prepare a delete statement
    $sql = "DELETE FROM users WHERE id = ?";

    
    $stmt = mysqli_stmt_init($dbconnected);
    if($stmt = mysqli_prepare($dbconnected, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $id);
            
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // Records deleted successfully. Redirect to landing page

            echo "<script>alert(Courier record deleted successfully)</script>";
            echo "<script>window.open('viewcourier.php', '_self')</script>";
            //header("location: viewcourier.php");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    //mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($dbconnected);
} else{
    // Check existence of id parameter
    if(empty(trim($_GET["id"]))){
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}


?>



