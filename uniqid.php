<?php

require_once('config.php');

$numberLength = 10;

function make_token(){
    list($usec, $sec) = explode(' ', microtime());
    return (float) $sec + ((float) $usec * 100000);
}

srand(make_token());

$numSeed = "01234567892";
$getNumber = "";

for ($i=0; $i < $numberLength; $i++) { 
    $getNumber .= $numSeed[rand(0, strlen($numSeed)-1)]; // THE $numSeed-1 is to avoid offset error on runtime
}

//echo $getNumber;

$sql = "SELECT track_code FROM employees WHERE track_code = ?";

        $stmt = mysqli_stmt_init($dbconnected);
        
        if($stmt = mysqli_prepare($dbconnected, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $getNumber);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                // Check database if data exit and store the count in a variable.
                $rowCount = mysqli_stmt_num_rows($stmt); 
                if( $rowCount == 1){
                    
                    $getNumber .= $numSeed[rand(0, strlen($numSeed))];
                } 
                else{
                    
                    $getNumber = $getNumber;
                }
            }mysqli_stmt_close($stmt);

        }

?>


