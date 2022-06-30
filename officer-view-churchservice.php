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
			$sql1 = "SELECT * FROM churchservice WHERE branchName='$branch'";
			$result1 = $conn-> query($sql1);
			if ($result1-> num_rows > 0){	while($row = $result1-> fetch_assoc()){	$branchID = $row['branchID'];	}	}

           
			
			 //VIEW SERVICES
			$sql2 = "SELECT * FROM announcements WHERE branchName='$branch'";
			$result2 = $conn-> query($sql2);
			if ($result2-> num_rows > 0){	while($row = $result2-> fetch_assoc()){	$branchID = $row['branchID'];	}	}

        if ($result2) 
            { 
                header("Location:  officer-view-announcements.php?success=Announcement Added Successfully."); 
                exit();  
            }
        else { header("Location: officer-view-service.php?error=Something Went Wrong !!! Please Try Again."); exit(); }
    }
    header("Location: officer-view-service.php"); exit();
}

