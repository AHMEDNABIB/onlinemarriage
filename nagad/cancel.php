<?php


require_once ('./helper.php');

session_start();
header('Content-Type: application/json');

$orderId = $_SESSION["orderId"];


$cancel = array(
    'merchantId' => '683002007104225', 
    'originalRequestDate' => '20210605', // Change date to the current date
    'orderId' => $orderId,
    'originalAmount' => '50.55',
    'cancelAmount' => '30',
    'referenceNo' => 'DEMOCANCEL',
    'referenceMessage' => 'Cancel for Return'
);


$CancelSen = array(
    'sensitiveDataCancelRequest' => EncryptDataWithPublicKey(json_encode($cancel)),
    'signature' => SignatureGenerate(json_encode($cancel))
);


$cancelURL = "http://sandbox.mynagad.com:10080/remote-payment-gateway-1.0/api/dfs/purchase/cancel?orderId=".$orderId;

$cancelResponse = HttpPostMethod($cancelURL, $CancelSen);

if (isset($cancelResponse['sensitiveData']) && isset($cancelResponse['signature'])) {
    if ($cancelResponse['sensitiveData'] != "" && $cancelResponse['signature'] != "") {

        $PlainResponse = json_decode(DecryptDataWithPrivateKey($cancelResponse['sensitiveData']), true);

        echo json_encode($PlainResponse);
    }
}

?>