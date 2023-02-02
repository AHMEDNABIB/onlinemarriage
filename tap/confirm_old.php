<?php 
ob_start();
?>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nstuadmission2021-22";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$reference = $_GET['reference'];
$amount = $_GET['amount'];
$transactionId = $_GET['transactionId'];
$status = $_GET['status'];
$bill_id = substr($reference, 0,7);
//$gst_app_id = substr($reference, 9,7);
$gst_unit = substr($reference, 7,1);
$all_unit= substr($reference, -3);
$a_unit = substr($all_unit, 0,1);
$b_unit = substr($all_unit, 1,1);
$c_unit = substr($all_unit, -1);

// echo "reference: ".$reference.", amount: ".$amount.", transactionId: ".$transactionId.", status: ".$status.", gst_app_id: ".$gst_app_id;
// exit();

if($status == "completed")
{
    // $applications = "SELECT sub_choice FROM applications WHERE gst_app_id=$gst_app_id LIMIT 1";
    // $app_result = $conn->query($applications);

    // if ($app_result->num_rows <= 0) {
    //     header("Location: https://admission.nstu.edu.bd/student/profile");
    // }
    // $app_row = $app_result->fetch_assoc();

    // $sub_choice = $app_row['sub_choice'];
    
    $data = date('d-m-Y');
    //session_start();

    $app_bill = "UPDATE applications SET pay_status='paid' WHERE gst_app_id=$bill_id";
    $conn->query($app_bill);
    // $app_final_row = "UPDATE applications SET final_sub_choice='$sub_choice' WHERE gst_app_id=$gst_app_id";
    // $conn->query($app_final_row);

    $app_payment = "INSERT INTO application_payment (gst_app_id, bill_id, gst_unit, a_unit, b_unit, c_unit, payment_way, transaction_id, amount, payee_mobile, payment_date, status)
                    VALUES ('$bill_id', 'NULL', '$gst_unit', '$a_unit', '$b_unit', '$c_unit', 'Tap', '$transactionId', '$amount', NULL, '$data', 'paid')";
    //$conn->query($app_payment);

    if ($conn->query($app_payment) === TRUE) 
    {
       
        //header("Location: https://admission.nstu.edu.bd/student/acknowledgement/slip", TRUE, 301);
        header("Location: http://nstu-admission-2021-22.test/student/acknowledgement/slip", TRUE, 301);

    } else
    {
        echo "Error updating record: " . $conn->error;
    }
    
    
}
else
{
    header("Location: https://admission.nstu.edu.bd/student/profile");
}
?>