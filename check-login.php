<?php 
session_start(); 
include "conn.php";

//RETRIEVING CURRENT COMPANY ID
//$id = 0;
//if(isset($_SESSION['Company_id']) && isset($_SESSION['Company_id'])){
//  $id = $_SESSION['Company_id'];
//}

//FINDING CURRENT DATE AND TIME
$date_time = date("Y/m/d")."-".date("h:i:sa");

//METHOD TO VALIDATE DATA
function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//RETRIVE AND VALIDATE INPUT FROM TEXTBOXES
$email = validate($_POST['email']);
$password = validate($_POST['password']);
    
	//IF IT EMPTY, DISPLAY ERROR MESSAGE
    if (empty($email) || empty($password)){
		header("Location:  login.php?error=Something Went Wrong!!!"); exit();  
		exit(); 
	} else{
        $userID = null;
	    $sql = "SELECT * FROM userlogin WHERE email='$email' AND passwords='$password'";
        $result = $conn-> query($sql);
        if ($result-> num_rows > 0){	
            while($row = $result-> fetch_assoc()){	
                $userID = $row['userID'];	
            }
            // RETRIEVING USER NAME AND SURNAME
            $name = "Default";  $surname = "User";  $rankID = null;
			$sql1 = "SELECT * FROM userinfo WHERE userID='$userID'";
			$result1 = $conn-> query($sql1);
			if ($result1-> num_rows > 0){	
                while($row = $result1-> fetch_assoc()){	
                    $name = $row['namee']; 
                    $surname = $row['surname'];	
                    $rankID = $row['rankID'];	
                }
            }

             //RETRIEVING MEMBERSHIP RANK
             $rank = null;
             $sql2 = "SELECT * FROM membershiprank WHERE rankID='$rankID'";
             $result2 = $conn-> query($sql2);
             if ($result2-> num_rows > 0){  while($row = $result2-> fetch_assoc()){    $rank = $row['rank'];   }  }
            $_SESSION['currentUser_name'] = $name;
            $_SESSION['currentUser_surname'] = $surname;
            $_SESSION['currentUserID'] = $userID;

            if($rank == "Brother or Sister"){ header("Location: login.php?error=Users Not Allowed For Now");  exit();  }
            else { header("Location:  officer-active-users.php"); exit(); }
        }else { header("Location: login.php?error=Incorrect Details"); exit(); }
     }
	 header("Location: login.php"); exit();

