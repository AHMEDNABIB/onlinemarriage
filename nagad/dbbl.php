<?php
    echo "hello...<br/>";
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://103.11.137.17:8081/BillPayGW/BillInquiryService?shortcode=555&userid=dbbl&password=dbbl&txnid=23252527',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'responseType: json',
            'Authorization: Basic ZGJpbGw6ZEJJTEwhMjM='
          ),
        ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    var_dump($response);
?>