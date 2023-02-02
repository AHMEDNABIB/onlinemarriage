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

$gst_app_id = $_GET['gst_app_id'];
$bill_id = $_GET['bill_id'];
$group = $_GET['group'];
$amount = $_GET['amount'];

$payment_check = "SELECT id,pay_status FROM application_bills WHERE id=$bill_id AND pay_status='pending'";
$pay_check_result = $conn->query($payment_check);

if ($pay_check_result->num_rows <= 0) {
    header("Location: http://nstu-admission-2021-22.test/student/profile");
}

if(!$gst_app_id || !$amount)
{
    header("Location: http://nstu-admission-2021-22.test/student/profile");
}

// echo $gst_app_id;
// exit();

$sql = "SELECT * FROM students_info WHERE gst_app_id=$gst_app_id LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows < 0) {
    header("Location: http://nstu-admission-2021-22.test/student/profile");
}
$row = $result->fetch_assoc();

$reference = $bill_id.$row['gst_app_id'].$group;
$invoice = "NSTU".$bill_id.$group;
// echo $row['fullname'];
// exit();
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>NSTU PG-sandbox</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
        <style>
            #tap_payment{
                width: 60%;
            }
            /* For Desktop View */
            @media screen and (min-width: 1024px) {
                #tap_payment{
                width: 60%;
            }
            }
            
            /* For Tablet View */
            @media screen and (min-device-width: 768px)
            and (max-device-width: 1024px) {
                #tap_payment{
                width: 100%;
            }
            }
            
            /* For Mobile Portrait View */
            @media screen and (max-device-width: 480px)
            and (orientation: portrait) {
                #tap_payment{
                width: 100%;
            }
            }
            
            /* For Mobile Landscape View */
            @media screen and (max-device-width: 640px)
            and (orientation: landscape) {
                #tap_payment{
                width: 100%;
            }
            }
            
            /* For Mobile Phones Portrait or Landscape View */
            @media screen and (max-device-width: 640px) {
                #tap_payment{
                width: 100%;
            }
            }
            
            /* For iPhone 4 Portrait or Landscape View */
            @media screen and (min-device-width: 320px)
            and (-webkit-min-device-pixel-ratio: 2) {
                #tap_payment{
                width: 100%;
            }
            }
        </style>
    </head>
    <body>
        <div class="container d-flex justify-content-center align-items-center h-100 d-none">
            <div class="card p-3" id="tap_payment">
                <div class="card-header bg-info text-white text-center">
                    <h4>Payment Info</h4>
                </div>
                <div class="card-body alert-success">
                    <div class="form-group row">
                        <label for="appid" class="col-sm-4 col-form-label">Applicant's Name</label>
                        <div class="col-sm-8">
                        <input type="text" value="<?= $row['fullname'] ?>" class="form-control" id="appid" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="appid" class="col-sm-4 col-form-label">Application ID</label>
                        <div class="col-sm-8">
                        <input type="text" value="<?= $row['gst_app_id'] ?>" class="form-control" id="appid" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="roll" class="col-sm-4 col-form-label">GST Roll</label>
                        <div class="col-sm-8">
                        <input type="text" value="<?= $row['gst_roll'] ?>" class="form-control" id="roll" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="amount" class="col-sm-4 col-form-label">Amount</label>
                        <div class="col-sm-8">
                        <input type="number" value="<?= $amount ?>" class="form-control" id="amount"  disabled>
                        <input type="number" value="<?= $reference ?>" class="form-control" id="reference"  hidden>
                        <input type="text" value="<?= $invoice ?>" class="form-control" id="invoice"  hidden>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-4 col-sm-8">                            
                        <button id="tokenButton" type="button"  class="btn btn-primary" onclick="iframeInitiate(this)">Next</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/arrive/2.4.1/arrive.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://mwstaging.tadlbd.com/merchant-pg-sandbox/pg-ui/script.js"></script>
        <script>
            window.onload = function(){
                document.getElementById('tokenButton').click();
                
                var scriptTag = document.createElement("script");
                scriptTag.src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js";
                document.getElementsByTagName("head")[0].appendChild(scriptTag);
            }
            function iframeInitiate(param) {
                // 1. Getting the Access Token
                var settings = {
                    url: "https://auth-sandbox.tadlbd.com/oauth/token",
                    method: "POST",
                    timeout: 0,
                    headers: {
                        Authorization: "Basic bnN0dS1zYW5kYm94Ok0zR0c2M2pnOWU4OVI1",
                        "Content-Type": "application/x-www-form-urlencoded",
                    },
                    data: {
                        grant_type: "password",
                        username: "nstu-sandbox-user",
                        password: "kUI1kGBOhp0S46",
                    },
                    async: false,
                };

                $.ajax(settings).done(function (response) {
                    // 2. Loading the iFrame
                    tapIFrame($('body'), {
                        token: response.access_token,
                        authAPIKey: "57798b5f-8a76-4c3c-ad1c-bff27540284c",
                        paymentMode: "iFrame",
                        requestorReferenceId: $("#reference")[0].value, //11112113481325700reference
                        callBackUrl: "http://localhost/nstu-admission-2021-22/tap/loading.php",
                        amount: $("#amount")[0].value,
                        invoiceNumber: $("#invoice")[0].value, //invoice11112113481325700
                        additionalInformation: '{"name":"John", "age":30, "car":null}',
                        popUpCloseTimeOut: 5
                    });
                });
            }
            
            // 3. Handle event
            function tapWindowClosed(payment) {
                console.log('tapWindowClosed ok');
                console.log(payment);
                console.log(payment.requestorReferenceId);
                var reference = payment.requestorReferenceId;
                var amount = payment.amount;
                var transactionId = payment.transactionId;
                var status = payment.status;
                window.location.href = 'http://localhost/nstu-admission-2021-22/tap/confirm.php?reference='+reference+'&amount='+amount+'&transactionId='+transactionId+'&status='+status;

                // amount : "505.5"
                // requestorReferenceId : "200000201001"
                // status : "completed"
                // transactionId : "b4b5c9c6-2885-4abc-8565-0629e9bb28cc"
                
            }
            
            // Required
            function receiver(event) {
                // Change it with production URL (will be given later)
                if (event.origin != 'https://mwstaging.tadlbd.com') {
                    //return;
                    console.log("ok first");
                }
                
                if (event.data.func == "tapWindowClosed") {
                    tapWindowClosed(event.data.param);
                }
            }
            
            
            if (window.addEventListener) {
                window.addEventListener("message", receiver, false);
            } else {
                window.attachEvent("onmessage", receiver);
            }
        </script>
    </body>
</html>
