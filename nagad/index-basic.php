<?php

/**
 * *****************************************************************
 * Copyright 2019.
 * All Rights Reserved to
 * Nagad
 * Redistribution or Using any part of source code or binary
 * can not be done without permission of Nagad
 * *****************************************************************
 *
 * @author - Md Nazmul Hasan Nazim
 * @email - nazmul.nazim@nagad.com.bd
 * @date: 18/11/2019
 * @time: 10:20 AM
 * ****************************************************************
 */

require_once('./helper.php');

session_start();

date_default_timezone_set('Asia/Dhaka');

$MerchantID = "683002007104225";
$DateTime = Date('YmdHis');
$amount = "50.55";
$OrderId = 'NSTU'.strtotime("now").rand(1000, 10000);
$random = generateRandomString();   

$PostURL = "http://sandbox.mynagad.com:10080/remote-payment-gateway-1.0/api/dfs/check-out/initialize/" . $MerchantID . "/" . $OrderId;

$_SESSION['orderId'] = $OrderId;

$merchantCallbackURL = "https://admission.nstu.edu.bd/nagad/response_nagad.php";

$SensitiveData = array(
    'merchantId' => $MerchantID,
    'datetime' => $DateTime,
    'orderId' => $OrderId,
    'challenge' => $random
);

$PostData = array(
    'accountNumber' => '01322889010', //Replace with Merchant Number
    'dateTime' => $DateTime,
    'sensitiveData' => EncryptDataWithPublicKey(json_encode($SensitiveData)),
    'signature' => SignatureGenerate(json_encode($SensitiveData))
);
//echo "POST: " . $PostURL . " Post Data: ".json_encode($PostData);
var_dump($PostData);
//die();
$Result_Data = HttpPostMethod($PostURL, $PostData);

echo "<br/>Result: "; var_dump($Result_Data);
die();

if (isset($Result_Data['sensitiveData']) && isset($Result_Data['signature'])) 
    {
    if ($Result_Data['sensitiveData'] != "" && $Result_Data['signature'] != "") 
        {
        $PlainResponse = json_decode(DecryptDataWithPrivateKey($Result_Data['sensitiveData']), true);
        if (isset($PlainResponse['paymentReferenceId']) && isset($PlainResponse['challenge'])) 
            {
            $paymentReferenceId = $PlainResponse['paymentReferenceId'];
            $randomServer = $PlainResponse['challenge'];
            $SensitiveDataOrder = array(
                'merchantId' => $MerchantID,
                'orderId' => $OrderId,
                'currencyCode' => '050',
                'amount' => $amount,
                'challenge' => $randomServer
            );
            $merchantAdditionalInfo = '{"Service Name": "NSTU Admission"}';
            $PostDataOrder = array(
                'sensitiveData' => EncryptDataWithPublicKey(json_encode($SensitiveDataOrder)),
                'signature' => SignatureGenerate(json_encode($SensitiveDataOrder)),
                'merchantCallbackURL' => $merchantCallbackURL,
                'additionalMerchantInfo' => json_decode($merchantAdditionalInfo)
            );
            $OrderSubmitUrl = "http://sandbox.mynagad.com:10080/remote-payment-gateway-1.0/api/dfs/check-out/complete/" . $paymentReferenceId;
            $Result_Data_Order = HttpPostMethod($OrderSubmitUrl, $PostDataOrder);
            if ($Result_Data_Order['status'] == "Success") 
                {
                $url = json_encode($Result_Data_Order['callBackUrl']);   
                echo "<script>window.open($url, '_self')</script>";  
                }
            else 
                {
                echo json_encode($Result_Data_Order);
                }
            } 
        else 
            {
            echo json_encode($PlainResponse);
            }
        }
    }



?>