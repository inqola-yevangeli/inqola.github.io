<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="styles.css" />
    <title>Active Users</title>
    <style>
        .input{
            height: 35px; 
            width: 29%; 
            display: inline;
            margin-top: 10px;
            margin-bottom: 10px;
            border: none; 
            border-radius: 10px;
            font-weight: bold;
        }
        .btn{
            height: 35px; 
            width: 11%; 
            display: inline;
            margin-bottom: 10px;
            border: none; 
            border-radius: 10px;
            font-weight: bold;
            background-color: white;
        }
    </style>
</head>

<?php
// if( empty(session_id()) && !headers_sent()){
//     session_start();
// }
//  session_start(); 
//  include "conn.php";
//  $name = $_SESSION['currentUser_name'];
//  $surname = $_SESSION['currentUser_surname'];
//  $currentUser = $name .' '. $surname;

 $name = "Default";
 $surname = "User";
 $currentUser = $name .' '. $surname;
?>
 <!-- -------------------------COUNT ACTIVE USERS---------------------------------- -->
 <?php          
    include "conn.php";                     $user_count = 0;
    $sql = "SELECT * FROM userinfo";        $result = $conn-> query($sql);
    if($result-> num_rows > 0){    while($row = $result-> fetch_assoc()){  $user_count++;  }  }
    $conn-> close();
?>
 <!-- -------------------------COUNT BRANCHES---------------------------------- -->
 <?php          
    include "conn.php";                     $count_branch = 0;
    $sql = "SELECT * FROM branch";        $result = $conn-> query($sql);
    if($result-> num_rows > 0){    while($row = $result-> fetch_assoc()){  $count_branch++;  }  }
    $conn-> close();
?>
<body>
<form action="#" method="post" enctype="multipart/form-data" autocomplete="off">
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
            <img src="img/logo.png" style="width:50px; height:50px;"></i><br>Inqola</div>
                    
            <div class="list-group list-group-flush my-3">
                <!-- ACTIVE USERS -->
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                    ></i>Active Users</a>
                <a style="margin-top: -25px;" href="officer-create-users.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    ></i>Create Users</a>
                <!-- ANNOUNCEMENTS -->
                <a style="margin-top: -25px;" href="officer-post-announcements.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    ></i>Post Announcements</a>
                <a style="margin-top: -25px;" href="officer-view-announcements.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    ></i>View Announcements</a>
                <!-- PREVIOS VIDEOS -->
                <a style="margin-top: -25px;" href="officer-upload-videos.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    ></i>Upload Videos</a>
                <a style="margin-top: -25px;" href="officer-view-videos.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    ></i>View Videos</a>
                <!-- BRANCHES -->
                <a style="margin-top: -25px;" href="officer-add-branch.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    ></i>Add Branches</a>
                <a style="margin-top: -25px;" href="officer-view-branch.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    ></i>View Branches</a>
                <!-- CHURCH SERVICES -->
                <a style="margin-top: -25px;" href="officer-add-service.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    ></i>Church Service</a>
                <a style="margin-top: -25px;" href="officer-view-service.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    ></i>View Church Service</a>
                <!-- ------------------------------------------------------------------------------------------ -->
                <a href="index.html" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i><?php echo $currentUser  ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="index.html">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3" style="width:50%;">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">There Are <?php echo $user_count  ?> Active Users</h3>
                                <!-- <p class="fs-5">Users</p> -->
                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3" style="width:50%;">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">There Are <?php echo $count_branch  ?> Branches</h3>
                                <!-- <p class="fs-5">Branches</p> -->
                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                </div>

                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Active Users</h3>
                    <div class="content" style="border: 1px solid; width: 98%; margin-left: 10px; border-radius: 10px; margin-top: 5px;">

                    <!-- ---------------------------------SELECT BRANCH----------------------------------- -->
                    <?php          
                        include "conn.php";
                        $sql = "SELECT * FROM branch";
                        $result = $conn-> query($sql);
                        if($result-> num_rows > 0){
                            echo "<select name='select-branch' class='input'>";
                                echo "<option value disabled selected>Select Branch</option>";
                                echo "<option>All Branches</option>";
                            while($row = $result-> fetch_assoc()){
                                $data = $row['branchName'];
                                 echo "<option value='$data'>$data</option>";
                            }
                            echo "</select>";
                        }
                        $conn-> close();
                    ?>
                    <!-- -------------------------SELECT MEMBERSHIP STATUS-------------------------------- -->
                    <?php          
                        include "conn.php";
                        $sql = "SELECT * FROM membershipstatus";
                        $result = $conn-> query($sql);
                        if($result-> num_rows > 0){
                            echo "<select name='select-status' class='input'>";
                                echo "<option value disabled selected>Select Membership Status</option>";
                                echo "<option>All Members</option>";
                            while($row = $result-> fetch_assoc()){
                                $data = $row['statuss'];
                                 echo "<option value='$data'>$data</option>";
                            }
                            echo "</select>";
                        }
                        $conn-> close();
                    ?>
                    <!-- -------------------------SELECT OCCUPATION---------------------------------- -->
                    <?php          
                        include "conn.php";
                        $sql = "SELECT * FROM occupation";
                        $result = $conn-> query($sql);
                        if($result-> num_rows > 0){
                            echo "<select name='select-occupation' class='input' style='margin-bottom: 10px;'>";
                                echo "<option value disabled selected>Select Occupation</option>";
                                echo "<option>All Members</option>";
                            while($row = $result-> fetch_assoc()){
                                $data = $row['occupationName'];
                                 echo "<option value='$data'>$data</option>";
                            }
                            echo "</select>";
                        }
                        $conn-> close();
                    ?>
                    <button type="submit" class="btn">Search</button>
                    </br>
                    

                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">#</th>
                                    <th scope="col">Name and Surname</th>
                                    <th scope="col">Country</th>
                                    <th scope="col">Province</th>
                                    <th scope="col">Branch</th>
                                    <th scope="col">Membership Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    // RETRIEVING USER NAME AND SURNAME
                                    $count = 0; 
                                    include "conn.php";
                                    $sql = "SELECT * FROM userinfo";
                                    $result = $conn-> query($sql);
                                    if ($result-> num_rows > 0){	
                                        while($row = $result-> fetch_assoc()){
                                            $count++;	
                                            $name = $row['namee'];
                                            $surname = $row['surname'];
                                            $addressID = $row['addressID'];
                                            $branchID = $row['branchID'];
                                            $statusID = $row['statusID'];

                                            //RETRIEVING COUNTRY AND PROVINCE FOR EACH USER USING ADDRESS ID
                                            $sql2 = "SELECT * FROM addresss WHERE addressID='$addressID'" ;
                                            $result2 = $conn-> query($sql2);
                                            if ($result2-> num_rows > 0){	
                                                while($row = $result2-> fetch_assoc()){
                                                    $country = $row['country'];
                                                    $province = $row['province'];
                                                }
                                            }

                                            //RETRIEVING BRANCH FOR EACH USER USING BRANCH ID
                                            $sql3 = "SELECT * FROM branch WHERE branchID='$branchID'" ;
                                            $result3 = $conn-> query($sql3);
                                            if ($result3-> num_rows > 0){	
                                                while($row = $result3-> fetch_assoc()){
                                                    $branchName = $row['branchName'];
                                                }
                                            }

                                            //RETRIEVING MEMBERSHIP STATUS FOR EACH USER USING OCCUPATION ID
                                            $sql3 = "SELECT * FROM membershipstatus WHERE statusID='$statusID'" ;
                                            $result3 = $conn-> query($sql3);
                                            if ($result3-> num_rows > 0){	
                                                while($row = $result3-> fetch_assoc()){
                                                    $occupationName = $row['statuss'];
                                                }
                                            }

                                            //DISPLAYING
                                            echo "<tr>";
                                            echo "<th scope='row'>$count</th>";
                                            echo "<td>$name $surname</td>";
                                            echo "<td>$country</td>";
                                            echo "<td>$province</td>";
                                            echo "<td>$branchName</td>";
                                            echo "<td>$occupationName</td>";
                                            echo "</tr>";
                                        }	
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</form>
</body>

</html>