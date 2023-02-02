<?php
$servername="localhost";
$username="nstu_SystemAdmin";
$password="RIZ7(*v]oB*f";
$dbname="nstu_admission";

$conn = mysqli_connect($servername, $username, $password, $dbname);
$conn->query("SET CHARACTER SET utf8");
$conn->query("SET SESSION collation_connection =’utf8_general_ci'");

$emailMessage = "Total Number of Applicants in NSTU Admission 2020-21 till $dateTime\n\n";

$sql_nagadData = "SELECT * FROM nagad";
$result_nagadData = $conn->query($sql_nagadData);
//$arr_nagadData = $result_nagadData->fetch_all(MYSQLI_ASSOC);

$sql_nagadExtra = "SELECT * FROM nagad_extra ";
$result_nagadExtra = $conn->query($sql_nagadExtra);
$arr_nagadExtra = $result_nagadExtra->fetch_all(MYSQLI_ASSOC);
$sl=1;
/*while($row = $result_nagadExtra->fetch_assoc()) 
    {
    $transactionID = $row['transaction_id'];
    $sql_payments = "SELECT * FROM payments WHERE transaction_id = '$transactionID'";
    $result_payments = $conn->query($sql_payments);
    if($result_payments) 
        {
        echo $sl."<br/>";
        }
    $sl++;
    }*/
while($row = $result_nagadData->fetch_assoc())  
    {
    $transactionID = $row['trans_id'];
    $valueExists = array_search($transactionID, array_column($arr_nagadExtra,'transaction_id'));
    if($valueExists)
        {
        $order_id = $row['order_id'];
        $amount = $row['amount'];
        $date = $row['trans_date'];
        $convDate = substr($date, 6,4)."-".substr($date, 3,2)."-".substr($date,0,2)." ".substr($date,11,8);
        //$convDate = date("Y-m-d H:i:s");
        $mobile = $row['payee_mobile'];
        $remark = "NAGAD rest of the data inserted with Script";
        $gst_app_id = substr($order_id, -8);
        $group = substr($order_id, 10, 1);
        //echo "Group: $group and GST ID: $gst_app_id ----- ";
        $tableName = strtolower($group)."_group_applications";
        $sql_groupDataExists = "SELECT * FROM $tableName WHERE gst_app_id = '$gst_app_id' AND payment_status=0";
        //echo $sql_groupDataExists."<br/>";
        $result_groupDataExists = $conn->query($sql_groupDataExists);
        if($result_groupDataExists) 
            {
            /*$ins_payment = "INSERT INTO payments (gst_app_id, payments.group, payment_way, transaction_id, amount, payee_mobile, payment_date, status, created_at, remark_payment)
                                            VALUES ('$gst_app_id', '$group', 'Nagad', '$transactionID', '$amount', '$mobile', '$convDate', 1, '$convDate', '$remark')";
            $conn->query($ins_payment);*/
            $update_groupApplications = "UPDATE $tableName SET payment_status = 1 WHERE gst_app_id = '$gst_app_id'";
            $successUpdateGroup = $conn->query($update_groupApplications);
            $update_nagadExtra = "UPDATE nagad_extra SET status = 'update' WHERE transaction_id = '$transactionID'";
            if($successUpdateGroup) $conn->query($update_nagadExtra);
            echo "$sl) GST App ID: $gst_app_id --- Group: $group ---- Transaction ID: $transactionID --- $convDate<br/>";
            //exit();
            }
        $sl++;
        }
    }
?>