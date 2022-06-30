<?php 
session_start(); 
include "conn.php";

//RETRIEVING CURRENT COMPANY ID
// $id = 0;
// if(isset($_SESSION['Company_id']) && isset($_SESSION['Company_id'])){
// 	$id = $_SESSION['Company_id'];
// }

//FINDING CURRENT DATE AND TIME
$date_time = date("Y/m/d")."-".date("h:i:sa");
// echo $date_time;
  
//CHECK IF ALL INPUT BOXES ARE VALID
if (isset($_POST['date']) && isset($_POST['time']) && isset($_POST['link']) && isset($_POST['textarea'])){

	//METHOD TO VALIDATE DATA
	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	//RETRIVE AND VALIDATE INPUT FROM TEXTBOXES
    $select_branch = validate($_POST['select-branch']);	
	$date = validate($_POST['date']);
	$time = validate($_POST['time']);
	$link = validate($_POST['link']);
	$textarea = validate($_POST['textarea']);

	//IF IT EMPTY, DISPLAY ERROR MESSAGE
    if (empty($select_branch) || empty($date) || empty($time) || empty($link) || empty($textarea)){
		header("Location:  officer-add-service.php?error=Something Went Wrong !!! Please Try Again."); exit();  
		exit(); 
	}
    else{
        //   -----------------------------------------------------------------------------------------------------------------
		// RETRIEVING BRANCH ID
// 		$sql1 = "SELECT * FROM branch WHERE branchName='$branch'";
// 		$result1 = $conn-> query($sql1);
// 		if ($result1-> num_rows > 0){	while($row = $result1-> fetch_assoc()){	$branchID = $row['branchID'];	}	}

		//   -----------------------------------------------------------------------------------------------------------------
		//ADD SERVICE
		$sql = "INSERT INTO churchservice (date, time, link, branchID, description)
		VALUES('$date', '$time', '$link', '1', '$textarea')";
		$result1 = mysqli_query($conn, $sql);

       if ($result1) { header("Location:  officer-add-service.php.php?success=Service Added Successfully."); exit();
       }
       else {
           header("Location:  officer-add-service.php.php?error=Something Went Wrong !!! Please Try Again."); exit(); 
           }
     }
	 header("Location: officer-add-service.php"); exit();
}
