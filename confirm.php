<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script> 
        <script src='https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js'></script>

        <script>
            $(document).ready(function () {

                // Delete 
                $('.delete').click(function () {
                    var el = this;

                    // Delete 
                    var deleteid = $(this).data('announcementID');

                    // Confirm announcementID
                    bootbox.confirm("Do you really want to delete record?", function (result) {

                        if (result) {
                            // AJAX Request
                            $.ajax({
                                url: 'ajaxfile.php',
                                type: 'POST',
                                data: {announcementID: deleteid},
                                success: function (response) {

                                    // Removing row from HTML Table
                                    if (response == 1) {
                                        $(el).closest('tr').css('background', 'tomato');
                                        $(el).closest('tr').fadeOut(800, function () {
                                            $(this).remove();
                                        });
                                    } else {
                                        bootbox.alert('Record not deleted.');
                                    }

                                }
                            });
                        }

                    });

                });
            });
        </script>

    </head>
    <style type="text/css">
        .main-section{
            margin-top:150px;
        }
    </style>
    <body>

        <?php
        include "conn.php";
        ?>
        <div class='container'>
            <table border='1' class='table'>
                <tr style='background: whitesmoke;'>
                    <th>S.no</th>
                    <th>Title</th>
                    <th>Operation</th>
                </tr>

                <?php
                $query = "SELECT * FROM announcements";
                $result = mysqli_query($conn, $query);

                $count = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    $announcementID = $row['$announcementID'];
                    $message = $row['$message'];
                    $date = $row['date'];
                    $time = $row['time'];
                    $branchID = $row['branchID'];
                    ?>
                    <tr>
                        <td align='center'><?= $count ?></td>
                        <td><a href='<?= $link ?>' target='_blank'><?= $title ?></a></td>
                        <td align='center'>
                            <button class='delete btn btn-danger' id='del_<?= $id ?>' data-id='<?= $id ?>' >Delete</button>
                        </td>
                    </tr>
                    <?php
                    $count++;
                }
                ?>
            </table>
        </div>
    </body>
</html>