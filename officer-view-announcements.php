<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="styles.css" />
    <title>View Announcements</title>
</head>
<?php
//  session_start(); 
//  include "conn.php";
//  $name = $_SESSION['currentUser_name'];
//  $surname = $_SESSION['currentUser_surname'];
  $name = "Default";
 $surname = "User";
 $currentUser = $name .' '. $surname;
?>
 <!-- -------------------------COUNT ACTIVE USERS---------------------------------- -->
 <?php          
    include "conn.php";                     $user_count = 0;
    $sql = "SELECT * FROM announcements";        $result = $conn-> query($sql);
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
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
            <img src="img/logo.png" style="width:50px; height:50px;"></i><br>Inqola</div>
            <div class="list-group list-group-flush my-3">
                <!-- ACTIVE USERS -->
                <a href="officer-active-users.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    ></i>Active Users</a>
                <a style="margin-top: -25px;" href="officer-create-users.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    ></i>Create Users</a>
                <!-- ANNOUNCEMENTS -->
                <a style="margin-top: -25px;" href="officer-post-announcements.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    ></i>Post Announcements</a>
                <a style="margin-top: -25px;" href="#" class="list-group-item list-group-item-action bg-transparent second-text active"><i
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
                <a href="login.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
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
                                <li><a class="dropdown-item"  href="login.php">Logout</a></li>
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
                                <h3 class="fs-2">There Are <?php echo $user_count  ?> Announcements</h3>
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
                    <h3 class="fs-4 mb-3">View Announcements</h3>
                     <!----------------------------Display error and success message------------------------------>
                     <?php if (isset($_GET['error'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
                    <?php if (isset($_GET['success'])) { ?>
                        <p class="success"><?php echo $_GET['success']; ?></p>
                    <?php } ?>

                    <!---------------------------------Selecting the branch------------------------------------>
                    <?php          
                        include "conn.php";
                        $sql = "SELECT * FROM branch";
                        $result = $conn-> query($sql);
                        if($result-> num_rows > 0){
                            echo "<select name='select-branch' class='input' style='width: 100%; height: 40px; margin-top:10px; margin-bottom:10px; border-radius:5px;'>";
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

                    <?php
                    //FINDING CURRENT DATE AND TIME
                    $c_date = date("Y/m/d");
                    $c_time = date("h:i:sa");

                    // RETRIEVING USER NAME AND SURNAME
                    $count = 0; 
                    include "conn.php";
                    $sql = "SELECT * FROM announcements";
                    $result = $conn-> query($sql);
                    if ($result-> num_rows > 0){	
                        while($row = $result-> fetch_assoc()){
                            $count++;	
                            $date = $row['date'];
                            $time = $row['time'];
                            $message = $row['message'];

                            // $description = "Date Posted: $date \nTime Posted: $time \n\nDescription: $description";
                            // <!-- DISPLAY ALL ANNOUNCEMENTS FROM THE DATABASE USING A LOOP -->
                            echo "<div class='content' style='border: 1px solid; border-radius: 10px; margin-top: 10px'>";
                            echo "<label style='font-weight: bold;'>Date Posted: $date</label>";
                            echo "<label style='float: right; font-weight: bold;'>Time Posted: $time</label>";
                            echo "<textarea type='text' id='textarea' rows='4' cols='50' class='table bg-white rounded shadow-sm  table-hover'  
                                style='width: 100%;' placeholder='$message' disabled></textarea>";
                            echo "<button type='submit' class='table bg-white rounded shadow-sm  table-hover'  
                                style='width: 100%; height: 40px; border: none; border-radius: 500px;'>Delete</button>";
                            echo "</div>";
                            }
                        }else{
                            echo "<div class='content' style='border: 1px solid; border-radius: 10px; margin-top: 10px'>";
                            echo "<textarea type='text' id='textarea' rows='4' cols='50' class='table bg-white rounded shadow-sm  table-hover'  
                                style='width: 100%; font-weight: bold; height:40px; margin-top:10px;' placeholder='No Announcements Found !!!' disabled></textarea>";
                            echo "</div>";
                        }
                    ?>
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
</body>

</html>