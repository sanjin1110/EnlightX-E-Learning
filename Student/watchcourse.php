<?php
session_start();

include('../dbConnection.php');

if (!isset($_SESSION['is_login'])) {
    echo "<script> location.href='../index.php'; </script>";
    exit;
}

$stuEmail = $_SESSION['stuLogEmail'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Watch Course</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="../css/all.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/stustyle.css">
    <style>
        body {
            background-color: #f0f5ff;
        }

        .container-fluid.bg-secondary {
            background-color: #1e4874;
            color: #ffffff;
            padding: 1rem;
        }

        .btn-info {
            background-color: #138496;
            border-color: #138496;
        }

        .btn-info:hover {
            background-color: #0a5670;
            border-color: #0a5670;
        }

        .col-md-3 {
            background-color: #ffffff;
            padding: 1rem;
            border-right: 1px solid #cee0f2;
        }

        .col-md-9 {
            background-color: #ffffff;
            padding: 1rem;
        }

        #playlist {
            padding: 0;
        }

        #playlist li {
            list-style: none;
            padding: 10px;
            cursor: pointer;
            border-bottom: 1px solid #cee0f2;
        }

        #playlist li:hover {
            background-color: #f0f5ff;
        }

        #videoarea {
            border: 1px solid #cee0f2;
        }
    </style>
</head>
<body>

    <div class="container-fluid bg-secondary p-3">
        <div class="row">
            <div class="col-md-6">
                <h3 class="text-white">Improve your academics.</h3>
            </div>
            <div class="col-md-6 text-md-right">
                <a class="btn btn-info" href="./myCourse.php">Back</a>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-md-3 border-right">
                <h4 class="text-center">Lessons</h4>
                <ul id="playlist" class="nav flex-column">
                    <?php
                    if (isset($_GET['course_id'])) {
                        $course_id = $_GET['course_id'];
                        $sql = "SELECT * FROM lesson WHERE course_id = '$course_id'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<li class="nav-item py-2" movieurl=' . $row['lesson_link'] . '>' . $row['lesson_name'] . '</li>';
                            }
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="col-md-9">
                <video id="videoarea" src="" class="mt-3 w-100" controls></video>
            </div>
        </div>
    </div>

    <!-- Jquery and Boostrap JavaScript -->
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <!-- Font Awesome JS -->
    <script type="text/javascript" src="../js/all.min.js"></script>
    <!-- Ajax Call JavaScript -->
    <!-- <script type="text/javascript" src="..js/ajaxrequest.js"></script> -->
    <!-- Custom JavaScript -->
    <script type="text/javascript" src="../js/custom.js"></script>

</body>
</html>
