<?php
session_start(); 
include "conn.php";

//FINDING CURRENT DATE AND TIME
$date_time = date("Y/m/d")."-".date("h:i:sa");
// echo $date_time;
  
//CHECK IF ALL INPUT BOXES ARE VALID
if (isset($_POST['select-branch'])){
    
    //Method to validate data
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //RETRIVE AND VALIDATE INPUT FROM TEXTBOXES
    $branch = validate($_POST['select-branch']);

    //IF IT EMPTY, DISPLAY ERROR MESSAGE
    if (empty($branch)){
		header("Location:  officer-view-announcements.php?error=Something Went Wrong !!! Please Try Again."); exit();  
		exit(); 
	} 
    else{
        	// RETRIEVING BRANCH ID
			$sql1 = "SELECT * FROM branch WHERE branchName='$branch'";
			$result1 = $conn-> query($sql1);
			if ($result1-> num_rows > 0){	while($row = $result1-> fetch_assoc()){	$branchID = $row['branchID'];	}	}

           
// 			$sql2 = "INSERT INTO announcements (messageA, dateA, branchID)
// 			VALUES('$message', '$date_time', '$branchID')";
            // $result2 = mysqli_query($conn, $sql2);
			//if(mysqli_query($conn, $sql2)) $last_id = mysqli_insert_id($conn); //OBTAINING LAST INSERTED ID
			
			 //VIEW ANNOUNCEMENTS
			$sql2 = "SELECT * FROM announcements WHERE branchID='$branchID'";
			$result2 = $conn-> query($sql2);
			if ($result2-> num_rows > 0){	
			    while($row = $result2-> fetch_assoc()){	
			        $branchID = $row['branchID'];	
			        
			    }
			}

       
        else { header("Location: officer-view-announcements.php?error=Something Went Wrong !!! Please Try Again."); exit(); }
    }
    header("Location: officer-view-announcements.php"); exit();
}
else{  
	// header("Location: customer-add.php");  
	// exit(); 
	// mysqli_insert_id($conn)
}
