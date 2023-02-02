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

//$gst_app_id = $_GET['gst_app_id'];
$bill_id = $_GET['bill_id'];
$group = $_GET['group'];
$amount = $_GET['amount'];

$payment_check = "SELECT gst_app_id,pay_status,gst_unit FROM applications WHERE gst_app_id=$bill_id AND pay_status='pending'";
$pay_check_result = $conn->query($payment_check);

if ($pay_check_result->num_rows <= 0) {
    header("Location: http://nstu-admission-2021-22.test/student/profile");
}

if(!$bill_id || !$amount)
{
    header("Location: http://nstu-admission-2021-22.test/student/profile");
}

$row = $pay_check_result->fetch_assoc();

$reference = $bill_id.$row['gst_unit'].$group;
$invoice = "NSTU".$bill_id.$group;
// echo $reference;
// exit();
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Sara Life Style Payment Gateway</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />


    </head>
    <body>
        <div class="container d-none">
            <div class="row align-items-center">
                <div class="col-sm-4"></div>
                <div class="mt-lg-5 ml-lg-5 col-md-4 col-sm-12">
                    <div class="input-group mb-3 pt-5">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Amount</span>
                        </div>
                        <input id="invoice" type="text" value="<?= $invoice ?>" class="form-control" placeholder="" aria-label="invoice" aria-describedby="basic-addon1"  disabled/>
                        <input id="reference" type="text" value="<?= $reference ?>" class="form-control" placeholder="" aria-label="reference" aria-describedby="basic-addon1"  disabled/>
                        <input id="amount" type="text" value="<?= $amount ?>" class="form-control" placeholder="" aria-label="Amount" aria-describedby="basic-addon1"  disabled/>
                    </div>
                    <button id="tokenButton" type="button" class="btn btn-primary" onclick="iframeInitiate(this)">Send</button>
                    <!-- <button id="backToAppButton" type="button" class="btn btn-primary" onclick="backToApp()">Go to App</button> -->
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/arrive/2.4.1/arrive.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://merchant-pg-ui-prod.tadlbd.com/script.js"></script>
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
                    url: "https://auth-prod.tadlbd.com/oauth/token",
                    method: "POST",
                    timeout: 0,
                    headers: {
                        Authorization: "Basic bnN0dTpaNHBUVlhxMHV5MlhSZA==",
                        "Content-Type": "application/x-www-form-urlencoded",
                    },
                    data: {
                        grant_type: "password",
                        username: "nstu-user",
                        password: "eXha1CI7y97As9",
                    },
                    async: false,
                };


                $.ajax(settings).done(function (response) {
                    //console.log("response.access_token::"+response.access_token)

                    // 2. Loading the iFrame
                    tapIFrame($('body'), {
                        token: response.access_token,
                        authAPIKey: "2c2f9a97-33b2-49b0-b58d-7b5c84960b04",
                        paymentMode: "iFrame",
                        requestorReferenceId: $("#reference")[0].value,
                        callBackUrl: "http://localhost/nstu-admission-2021-22/tap/loading.php",
                        amount: $("#amount")[0].value,
                        invoiceNumber: $("#invoice")[0].value,
                        additionalInformation: "Far far away, behind the word mountains",
                        popUpCloseTimeOut : 15
                    });
                })

            }

            function backToApp(){
                let data = getOS();
                if(getOS() == "iOS"){
                    window.webkit.messageHandlers.myOwnJSHandler.postMessage(data);
                } else if(getOS() == "Android"){
                    cnsJsBridge.returnToApp(data)
                }
            }

            function getOS() {
                var userAgent = window.navigator.userAgent,
                    platform = window.navigator.platform,
                    macosPlatforms = ['Macintosh', 'MacIntel', 'MacPPC', 'Mac68K'],
                    windowsPlatforms = ['Win32', 'Win64', 'Windows', 'WinCE'],
                    iosPlatforms = ['iPhone', 'iPad', 'iPod'],
                    os = null;

                if (macosPlatforms.indexOf(platform) !== -1) {
                    os = 'Mac';
                } else if (iosPlatforms.indexOf(platform) !== -1) {
                    os = 'iOS';
                } else if (windowsPlatforms.indexOf(platform) !== -1) {
                    os = 'Windows';
                } else if (/Android/.test(userAgent)) {
                    os = 'Android';
                } else if (!os && /Linux/.test(platform)) {
                    os = 'Linux';
                }

                return os;
            }

            function tapTransactionDone(response){
                if(getOS() == "iOS"){
                    window.webkit.messageHandlers.myOwnJSHandler.postMessage(response);
                } else if(getOS() == "Android"){
                    cnsJsBridge.returnToApp(response)
                }
                console.log('first done')
                console.log("tapTransactionDone::"+JSON.stringify(response))
                console.log(response)
                console.log("status::"+response.status)

            }

            function tapWindowClosed(response){
                // if(getOS() == "iOS"){
                //     window.webkit.messageHandlers.myOwnJSHandler.postMessage(response);
                // } else if(getOS() == "Android"){
                //     cnsJsBridge.returnToApp(response)
                // }
                console.log('second done')
                //console.log("tapWindowClosed::"+JSON.stringify(response))
                console.log(response)
                console.log("status::"+response.status)

                // tapWindowClosed::{"requestorReferenceId":"2000010022000010001","amount":"2.022","transactionId":"63919f4d-bd06-44f2-98b7-fe2271f728b0","status":"completed"}

                var reference = response.requestorReferenceId;
                var amount = response.amount;
                var transactionId = response.transactionId;
                var status = response.status;

               window.location.href = 'http://localhost/nstu-admission-2021-22/tap/confirm.php?reference='+reference+'&amount='+amount+'&transactionId='+transactionId+'&status='+status;



            }

            function receiver(ev) {
                /*console.log("We've got a message!");
                console.log("* Function:", ev.data.func);
                console.log("* Param:", ev.data.param);
                console.log("* Origin:", ev.origin);
                console.log("* Source:", ev.source);*/
                console.log("* Origin:", ev.origin);
                //ev.data.func(ev.data.param);
                //if("https://mwstaging.tadlbd.com")
                if(ev.data.func == "tapWindowClosed"){
                    tapWindowClosed(ev.data.param)
                } else{
                    tapTransactionDone(ev.data.param)
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
