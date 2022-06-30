<?php
session_start(); 
include "conn.php";

  
//CHECK IF ALL INPUT BOXES ARE VALID
if (isset($_POST['branchName']) && isset($_POST['address']) && isset($_POST['zipCode']) ){
    
    //Method to validate data
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //RETRIVE AND VALIDATE INPUT FROM TEXTBOXES
    $branchName = validate($_POST['branchName']);
    $address = validate($_POST['address']);
    $country = validate($_POST['country']);
    $province = validate($_POST['province']);
    $city = validate($_POST['city']);
    $zipCode = validate($_POST['zipCode']);


    //IF IT EMPTY, DISPLAY ERROR MESSAGE
    if (empty($branchName) || empty($address) || empty($zipCode)){
		header("Location:  officer-add-branch.php?error=Something Went Wrong !!! Please fill in the fields."); exit();  
	} 
    else{
        	/* RETRIEVING BRANCH ID
			$sql1 = "SELECT * FROM branch WHERE branchName='$branch'";
			$result1 = $conn-> query($sql1);
			if ($result1-> num_rows > 0){	while($row = $result1-> fetch_assoc()){	$branchID = $row['branchID'];	}	}
            */
            //ADD BRANCH
			$sql = "INSERT INTO branches (branchName, address, country, province, city, zipCode) VALUE('$branchName', '$address', '$country', '$province', '$city', '$zipCode')";
            $result1 = mysqli_query($conn, $sql);
			//if(mysqli_query($conn, $sql2)) $last_id = mysqli_insert_id($conn); //OBTAINING LAST INSERTED ID
      
        if ($result1) 
            { 
                header("Location:  officer-add-branch.php?success=Branch Added Successfully."); 
                exit();  
            }
        else { header("Location:  officer-add-branch.php?error=Something Went Wrong !!! Please Try Again."); exit(); }
    }
    header("Location: officer-add-branch.php"); exit();
}


