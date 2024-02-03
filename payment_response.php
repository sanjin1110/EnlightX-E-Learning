<?php
include('./dbConnection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data from the payment gateway response
    session_start();

    // $order_id = $_POST['ORDER_ID'];
    // $stu_email = $_SESSION['stuLogEmail'];
    // $course_id = $_SESSION['course_id'];
    // $status = $_POST['STATUS'];
    // $respmsg = $_POST['RESPMSG'];
    // $amount = $_POST['AMOUNT'];
    // $date = $_POST['ORDER_DATE'];

    $order_id = $_POST['ORDER_ID'];
    $stu_email = $_SESSION['stuLogEmail'];
    $course_id = $_SESSION['course_id'];
    $status = isset($_POST['STATUS']) ? $_POST['STATUS'] : 'TNX_SUCCESS';
    $respmsg = isset($_POST['RESPMSG']) ? $_POST['RESPMSG'] : 'TNX success';
    $amount = isset($_POST['TXNAMOUNT']) ? $_POST['TXNAMOUNT'] : '1000';
    $date = isset($_POST['TXNDATE']) ? $_POST['TXNDATE'] : '2024-02-03';

    // Insert data into the database
    $sql = "INSERT INTO courseorder (order_id, stu_email, course_id, status, respmsg, amount, order_date) VALUES ('$order_id', '$stu_email', '$course_id', '$status', '$respmsg', '$amount', '$date')";
if ($conn->query($sql) == TRUE) {
    // ...

    echo "Redirecting to My Profile....";
        echo "<script> setTimeout(() => {
            window.location.href  = '../elearning/student/myCourse.php';
        }, 500); </script>";
} else {
    if ($conn->errno == 1062) { // MySQL error code for duplicate entry
        echo "Duplicate entry for order_id: $order_id";
    }
    else{
    echo "Error inserting data into the database: " . $conn->error;
}}

   
} else {
    // Handle the case when the form is not submitted via POST
    echo "Invalid request!";
}
?>
