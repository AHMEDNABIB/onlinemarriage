<?php
//session_start();
//if(!isset($_SESSION['gst_app_id'])) header("Location: https://admission.nstu.edu.bd/", TRUE, 301);
// $epw_id = $_GET['orderID'];
// $random = $_GET['challange'];
// $DateTime = $_GET['datetime'];
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

$bill_id = $_GET['bill_id'];
$group = $_GET['group'];

$payment_check = "SELECT gst_app_id,pay_status FROM applications WHERE gst_app_id=$bill_id AND pay_status='pending'";
$pay_check_result = $conn->query($payment_check);

if ($pay_check_result->num_rows <= 0) {
    header("Location: http://nstu-admission-2021-22.test/student/profile");
}

$invoice_amount = $_GET['amount'];

date_default_timezone_set('Asia/Dhaka');
//$epw_id = "NSTU".rand(11111111,99999999); // ADD

if(!$bill_id || !$group)
    {
    header("Location: http://nstu-admission-2021-22.test/", TRUE, 301);
    //echo "<meta http-equiv=\"refresh\" content=\"0;URL='https://admission.nstu.edu.bd/'\" />";
    //echo "<script>location='https://admission.nstu.edu.bd/'</script>";
    //echo "<meta http-equiv='refresh' content='3;url=\"https://admission.nstu.edu.bd/\"'>";
    }
$epw_id = "NSTU".rand(1111,9999).$group.$bill_id; //text limit:20
$random = rand(11111111,9999999);
$DateTime = Date('YmdHis');

//$invoice_amount = 1.00; // UPDATE to 600


$MerchantID = '683228890108220';

//$PostURL = "http://sandbox.mynagad.com:10080/remote-payment-gateway-1.0/api/dfs/check-out/initialize/" . $MerchantID . "/" . $epw_id;
$PostURL = "https://api.mynagad.com/api/dfs/check-out/initialize/" . $MerchantID . "/" . $epw_id;

//$merchantCallbackURL = "https://admission.nstu.edu.bd/nagad/response_nagad.php";
$merchantCallbackURL = "http://localhost/nstu-admission-2021-22/nagad/response_nagad.php";

$SensitiveData = array(
     'merchantId' => $MerchantID,
     'datetime' => $DateTime,
     'orderId' => $epw_id,
     'challenge' => $random
 );

$PostData = array(
     'accountNumber' => '01322889010', //optional NSTU NAGAD Number
     'dateTime' => $DateTime,
     'sensitiveData' => EncryptDataWithPublicKey(json_encode($SensitiveData)),
     'signature' => SignatureGenerate(json_encode($SensitiveData))
 );


//echo $PostURL."<br/>";
//print_r($PostData);

$Result_Data = HttpPostMethod($PostURL, $PostData);

//print_r($Result_Data);
//  die();

if (isset($Result_Data['sensitiveData']) && isset($Result_Data['signature'])) 
    {
     if ($Result_Data['sensitiveData'] != "" && $Result_Data['signature'] != "") 
        {
         $PlainResponse = json_decode(DecryptDataWithPrivateKey($Result_Data['sensitiveData']), true);
         if (isset($PlainResponse['paymentReferenceId']) && isset($PlainResponse['challenge'])) 
            {
            $paymentReferenceId = $PlainResponse['paymentReferenceId'];
            $randomserver = $PlainResponse['challenge'];
            $SensitiveDataOrder = array(
                 'merchantId' => $MerchantID,
                 'orderId' => $epw_id,
                 'currencyCode' => '050',
                 'amount' => $invoice_amount,
                 'challenge' => $randomserver
                );
            $PostDataOrder = array(
                 'sensitiveData' => EncryptDataWithPublicKey(json_encode($SensitiveDataOrder)),
                 'signature' => SignatureGenerate(json_encode($SensitiveDataOrder)),
                 'merchantCallbackURL' => $merchantCallbackURL
                 // 'additionalMerchantInfo' => json_decode($merchantAdditionalInfo)
                );
            // print_r($PostDataOrder);
            // die();
            //$OrderSubmitUrl = "http://sandbox.mynagad.com:10080/remote-payment-gateway-1.0/api/dfs/check-out/complete/" . $paymentReferenceId;
            $OrderSubmitUrl = "https://api.mynagad.com/api/dfs/check-out/complete/" . $paymentReferenceId;
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
            //echo "Hello";
            echo json_encode($PlainResponse);
            die();
            }   
        }
    }


//nagad function
function generateRandomString($length = 40)
    {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) 
        {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
    return $randomString;
    }
 
function EncryptDataWithPublicKey($data)
    {
    //$pgPublicKey = "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAjBH1pFNSSRKPuMcNxmU5jZ1x8K9LPFM4XSu11m7uCfLUSE4SEjL30w3ockFvwAcuJffCUwtSpbjr34cSTD7EFG1Jqk9Gg0fQCKvPaU54jjMJoP2toR9fGmQV7y9fz31UVxSk97AqWZZLJBT2lmv76AgpVV0k0xtb/0VIv8pd/j6TIz9SFfsTQOugHkhyRzzhvZisiKzOAAWNX8RMpG+iqQi4p9W9VrmmiCfFDmLFnMrwhncnMsvlXB8QSJCq2irrx3HG0SJJCbS5+atz+E1iqO8QaPJ05snxv82Mf4NlZ4gZK0Pq/VvJ20lSkR+0nk+s/v3BgIyle78wjZP1vWLU4wIDAQAB";
    $pgPublicKey = "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAiCWvxDZZesS1g1lQfilVt8l3X5aMbXg5WOCYdG7q5C+Qevw0upm3tyYiKIwzXbqexnPNTHwRU7Ul7t8jP6nNVS/jLm35WFy6G9qRyXqMc1dHlwjpYwRNovLc12iTn1C5lCqIfiT+B/O/py1eIwNXgqQf39GDMJ3SesonowWioMJNXm3o80wscLMwjeezYGsyHcrnyYI2LnwfIMTSVN4T92Yy77SmE8xPydcdkgUaFxhK16qCGXMV3mF/VFx67LpZm8Sw3v135hxYX8wG1tCBKlL4psJF4+9vSy4W+8R5ieeqhrvRH+2MKLiKbDnewzKonFLbn2aKNrJefXYY7klaawIDAQAB";
    $public_key = "-----BEGIN PUBLIC KEY-----\n" . $pgPublicKey . "\n-----END PUBLIC KEY-----";
    // echo $public_key; 
    // exit();
    $key_resource = openssl_get_publickey($public_key);
    openssl_public_encrypt($data, $crypttext, $key_resource);
    return base64_encode($crypttext);
    }
 
function SignatureGenerate($data)
    {
    //$merchantPrivateKey = "MIIEvAIBADANBgkqhkiG9w0BAQEFAASCBKYwggSiAgEAAoIBAQCJakyLqojWTDAVUdNJLvuXhROV+LXymqnukBrmiWwTYnJYm9r5cKHj1hYQRhU5eiy6NmFVJqJtwpxyyDSCWSoSmIQMoO2KjYyB5cDajRF45v1GmSeyiIn0hl55qM8ohJGjXQVPfXiqEB5c5REJ8Toy83gzGE3ApmLipoegnwMkewsTNDbe5xZdxN1qfKiRiCL720FtQfIwPDp9ZqbG2OQbdyZUB8I08irKJ0x/psM4SjXasglHBK5G1DX7BmwcB/PRbC0cHYy3pXDmLI8pZl1NehLzbav0Y4fP4MdnpQnfzZJdpaGVE0oI15lq+KZ0tbllNcS+/4MSwW+afvOw9bazAgMBAAECggEAIkenUsw3GKam9BqWh9I1p0Xmbeo+kYftznqai1pK4McVWW9//+wOJsU4edTR5KXK1KVOQKzDpnf/CU9SchYGPd9YScI3n/HR1HHZW2wHqM6O7na0hYA0UhDXLqhjDWuM3WEOOxdE67/bozbtujo4V4+PM8fjVaTsVDhQ60vfv9CnJJ7dLnhqcoovidOwZTHwG+pQtAwbX0ICgKSrc0elv8ZtfwlEvgIrtSiLAO1/CAf+uReUXyBCZhS4Xl7LroKZGiZ80/JE5mc67V/yImVKHBe0aZwgDHgtHh63/50/cAyuUfKyreAH0VLEwy54UCGramPQqYlIReMEbi6U4GC5AQKBgQDfDnHCH1rBvBWfkxPivl/yNKmENBkVikGWBwHNA3wVQ+xZ1Oqmjw3zuHY0xOH0GtK8l3Jy5dRL4DYlwB1qgd/Cxh0mmOv7/C3SviRk7W6FKqdpJLyaE/bqI9AmRCZBpX2PMje6Mm8QHp6+1QpPnN/SenOvoQg/WWYM1DNXUJsfMwKBgQCdtddE7A5IBvgZX2o9vTLZY/3KVuHgJm9dQNbfvtXw+IQfwssPqjrvoU6hPBWHbCZl6FCl2tRh/QfYR/N7H2PvRFfbbeWHw9+xwFP1pdgMug4cTAt4rkRJRLjEnZCNvSMVHrri+fAgpv296nOhwmY/qw5Smi9rMkRY6BoNCiEKgQKBgAaRnFQFLF0MNu7OHAXPaW/ukRdtmVeDDM9oQWtSMPNHXsx+crKY/+YvhnujWKwhphcbtqkfj5L0dWPDNpqOXJKV1wHt+vUexhKwus2mGF0flnKIPG2lLN5UU6rs0tuYDgyLhAyds5ub6zzfdUBG9Gh0ZrfDXETRUyoJjcGChC71AoGAfmSciL0SWQFU1qjUcXRvCzCK1h25WrYS7E6pppm/xia1ZOrtaLmKEEBbzvZjXqv7PhLoh3OQYJO0NM69QMCQi9JfAxnZKWx+m2tDHozyUIjQBDehve8UBRBRcCnDDwU015lQN9YNb23Fz+3VDB/LaF1D1kmBlUys3//r2OV0Q4ECgYBnpo6ZFmrHvV9IMIGjP7XIlVa1uiMCt41FVyINB9SJnamGGauW/pyENvEVh+ueuthSg37e/l0Xu0nm/XGqyKCqkAfBbL2Uj/j5FyDFrpF27PkANDo99CdqL5A4NQzZ69QRlCQ4wnNCq6GsYy2WEJyU2D+K8EBSQcwLsrI7QL7fvQ==";
    $merchantPrivateKey = "MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCVxWVRwK6fMZXJbwht2xu90OdagNNdT1JWMCCmc/K7ua54eJMrv3mmPIu2UTTsTZr6LavO2Nhyl23QghLCJynbtIBOWb48FbwRZHQO7kDIMlHRrCQuyiYU92x23ViuvH6pTYzwAHJKv9fkWRkVUL4yphsKkLYwuV/szhwtO7j7jVmXPaiAkq7afRhHAeFwsQcPs5JFrPdpsHSnPlNAk3BcPBI0jdW7ZM5LkAdVrag476NYwCiSFF8QZcJZE0nK3NqRSDB4p0LV1jXAqY00mpUBzxKjblNmMJzTZMvPDNKZwT05i469gwjA8WGWBhzcG77RuoP79+PykXDt3n0LPjw1AgMBAAECggEASU67Tw6u6kDM/jGYwJy0sW4lL4lK66s9s+4OrSqnrvctzM3Hy2wHUTTldbG948QAjV/5bl95Ym14VMy1/c5JkL6C5tbKZIKG8URoAj7f+p2WqrhFZZmQlkadEnk5RR4CKUBKMdcmGixYse5idqp0zjm7lqpKYwL5TuF7rTBEVOuOzmwIFWeeYdby0YaPjIgh9BR0YlMkxuAGpy1QIaQdIOYNTuVTbXJMffDmHpsYQ1U9fFSV6pde+aIeTUEb7hFh71v5TnVx0oSAg8buTOFza6Gut43Eo5S0K4ewWKHsqKYuzq5HriEdoYYQUpl8HEocJpzUecIt91Dc7SENb3qc6QKBgQD9XjDLuBPDba4r8zfa24YDpINnXhjE2j1nfg98U60CPEQT+JkOfqaLr3lHlVVDzh5Yf8PFsowz7t3QCmF5pJHzZ8y9/ttH9ntgU+M2T/zv++2sHnI1WglfK9LZWii/5y4cMS8AbUx+SQzGIqNS1OBPv+2Tp9ZbjdT41bPJ4qOpywKBgQCXU7LWe6lUeCVhEB57tmK2tT6PkKSAPitLSa4WQFvVdwLYUayVaqIvZAGl4eLEnIImlmExzKPAscNCKm+Ifac0uh9Uk8Ju2JnGqJ4Je7ScOELGvTIo/Gu/csWdOMd+DBwYdGS9tuqVfgpbP/oL+zYx8uBGYtucA4K0OEvxOiDx/wKBgH0HAeVFjNsfQJeHicSCF3usrvtPP8HEQBDV8CZV1EYKHz4LqtuwO9cqXBqq4kx3Zhod0im4ld76vJJwzPEN+Me4LRyEqwiz5OX//1tJ1XNHSl1pGMqjB4TjR0TibMFl/ycCTkNTrC+VNKyBYz74tUglWcNHS0wajUHNks7I/CJJAoGBAIm6DLd2/ys42lRX9laELZ26oYDKlV1+t6qjGYV499v1oCo/U4L99TSKoZFXYCuvgikajsVjSdp0L5FFzBL+wbKUfzVb8gcure6HwqZA56WS8vuscD2rV2l8TO0GI1LONLfxH0sncqOyfjyEotBKyA13zrVg/h0leM0Lu9qGHDwDAoGAWyHc9cOGvxJh4q9Bixp3HoQs/g7PsBIqDyzjMEiX//sbLG/vsCDVdtGWxBnSrBztNv8VY71aQsjpfn4pIBJmkSaU//p61Di4tlEquu2Pz+S1IQxWuvNMoFCcqa5DagUcs42gucGFSdJzC48Nv8SvBke1BUCz8F3FK6Lm13kcv6s=";
    $private_key = "-----BEGIN RSA PRIVATE KEY-----\n" . $merchantPrivateKey . "\n-----END RSA PRIVATE KEY-----";
    // echo $private_key; 
    // exit();
    openssl_sign($data, $signature, $private_key, OPENSSL_ALGO_SHA256);
    return base64_encode($signature);
    }
 
function HttpPostMethod($PostURL, $PostData)
    {
    // echo $PostURL;
    // print_r($PostData);
    // die();
    $url = curl_init($PostURL);
    $posttoken = json_encode($PostData);
    $header = array(
        'Content-Type:application/json',
        'X-KM-Api-Version:v-0.2.0',
        'X-KM-IP-V4:' . get_client_ip(),
        'X-KM-Client-Type:PC_WEB'
        );
    //print_r($posttoken);
    //print_r($header);
    // die();
    curl_setopt($url, CURLOPT_HTTPHEADER, $header);
    curl_setopt($url, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($url, CURLOPT_POSTFIELDS, $posttoken);
    curl_setopt($url, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($url, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($url, CURLOPT_SSL_VERIFYPEER, 0);
    
    $resultdata = curl_exec($url);
    
    //new code
    // $header_size = curl_getinfo($url, CURLINFO_HEADER_SIZE);
    // $headers = substr($resultData, 0, $header_size);
    // $body = substr($resultData, $header_size);
    // curl_close($url);
    // $headers_arr = explode("\r\n", $headers);
    // echo json_encode($headers_arr); exit();
    //new code end
    $ResultArray = json_decode($resultdata, true);
    curl_close($url);
    //print_r($ResultArray);
    // die();
    return $ResultArray;
    }
 
function get_client_ip()
    {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP'])) $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_X_FORWARDED'])) $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_FORWARDED'])) $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if (isset($_SERVER['REMOTE_ADDR'])) $ipaddress = $_SERVER['REMOTE_ADDR'];
    else $ipaddress = 'UNKNOWN';
    return $ipaddress;
    }
 
function DecryptDataWithPrivateKey($crypttext)
    {
    //$merchantPrivateKey = "MIIEvAIBADANBgkqhkiG9w0BAQEFAASCBKYwggSiAgEAAoIBAQCJakyLqojWTDAVUdNJLvuXhROV+LXymqnukBrmiWwTYnJYm9r5cKHj1hYQRhU5eiy6NmFVJqJtwpxyyDSCWSoSmIQMoO2KjYyB5cDajRF45v1GmSeyiIn0hl55qM8ohJGjXQVPfXiqEB5c5REJ8Toy83gzGE3ApmLipoegnwMkewsTNDbe5xZdxN1qfKiRiCL720FtQfIwPDp9ZqbG2OQbdyZUB8I08irKJ0x/psM4SjXasglHBK5G1DX7BmwcB/PRbC0cHYy3pXDmLI8pZl1NehLzbav0Y4fP4MdnpQnfzZJdpaGVE0oI15lq+KZ0tbllNcS+/4MSwW+afvOw9bazAgMBAAECggEAIkenUsw3GKam9BqWh9I1p0Xmbeo+kYftznqai1pK4McVWW9//+wOJsU4edTR5KXK1KVOQKzDpnf/CU9SchYGPd9YScI3n/HR1HHZW2wHqM6O7na0hYA0UhDXLqhjDWuM3WEOOxdE67/bozbtujo4V4+PM8fjVaTsVDhQ60vfv9CnJJ7dLnhqcoovidOwZTHwG+pQtAwbX0ICgKSrc0elv8ZtfwlEvgIrtSiLAO1/CAf+uReUXyBCZhS4Xl7LroKZGiZ80/JE5mc67V/yImVKHBe0aZwgDHgtHh63/50/cAyuUfKyreAH0VLEwy54UCGramPQqYlIReMEbi6U4GC5AQKBgQDfDnHCH1rBvBWfkxPivl/yNKmENBkVikGWBwHNA3wVQ+xZ1Oqmjw3zuHY0xOH0GtK8l3Jy5dRL4DYlwB1qgd/Cxh0mmOv7/C3SviRk7W6FKqdpJLyaE/bqI9AmRCZBpX2PMje6Mm8QHp6+1QpPnN/SenOvoQg/WWYM1DNXUJsfMwKBgQCdtddE7A5IBvgZX2o9vTLZY/3KVuHgJm9dQNbfvtXw+IQfwssPqjrvoU6hPBWHbCZl6FCl2tRh/QfYR/N7H2PvRFfbbeWHw9+xwFP1pdgMug4cTAt4rkRJRLjEnZCNvSMVHrri+fAgpv296nOhwmY/qw5Smi9rMkRY6BoNCiEKgQKBgAaRnFQFLF0MNu7OHAXPaW/ukRdtmVeDDM9oQWtSMPNHXsx+crKY/+YvhnujWKwhphcbtqkfj5L0dWPDNpqOXJKV1wHt+vUexhKwus2mGF0flnKIPG2lLN5UU6rs0tuYDgyLhAyds5ub6zzfdUBG9Gh0ZrfDXETRUyoJjcGChC71AoGAfmSciL0SWQFU1qjUcXRvCzCK1h25WrYS7E6pppm/xia1ZOrtaLmKEEBbzvZjXqv7PhLoh3OQYJO0NM69QMCQi9JfAxnZKWx+m2tDHozyUIjQBDehve8UBRBRcCnDDwU015lQN9YNb23Fz+3VDB/LaF1D1kmBlUys3//r2OV0Q4ECgYBnpo6ZFmrHvV9IMIGjP7XIlVa1uiMCt41FVyINB9SJnamGGauW/pyENvEVh+ueuthSg37e/l0Xu0nm/XGqyKCqkAfBbL2Uj/j5FyDFrpF27PkANDo99CdqL5A4NQzZ69QRlCQ4wnNCq6GsYy2WEJyU2D+K8EBSQcwLsrI7QL7fvQ==";
    $merchantPrivateKey = "MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCVxWVRwK6fMZXJbwht2xu90OdagNNdT1JWMCCmc/K7ua54eJMrv3mmPIu2UTTsTZr6LavO2Nhyl23QghLCJynbtIBOWb48FbwRZHQO7kDIMlHRrCQuyiYU92x23ViuvH6pTYzwAHJKv9fkWRkVUL4yphsKkLYwuV/szhwtO7j7jVmXPaiAkq7afRhHAeFwsQcPs5JFrPdpsHSnPlNAk3BcPBI0jdW7ZM5LkAdVrag476NYwCiSFF8QZcJZE0nK3NqRSDB4p0LV1jXAqY00mpUBzxKjblNmMJzTZMvPDNKZwT05i469gwjA8WGWBhzcG77RuoP79+PykXDt3n0LPjw1AgMBAAECggEASU67Tw6u6kDM/jGYwJy0sW4lL4lK66s9s+4OrSqnrvctzM3Hy2wHUTTldbG948QAjV/5bl95Ym14VMy1/c5JkL6C5tbKZIKG8URoAj7f+p2WqrhFZZmQlkadEnk5RR4CKUBKMdcmGixYse5idqp0zjm7lqpKYwL5TuF7rTBEVOuOzmwIFWeeYdby0YaPjIgh9BR0YlMkxuAGpy1QIaQdIOYNTuVTbXJMffDmHpsYQ1U9fFSV6pde+aIeTUEb7hFh71v5TnVx0oSAg8buTOFza6Gut43Eo5S0K4ewWKHsqKYuzq5HriEdoYYQUpl8HEocJpzUecIt91Dc7SENb3qc6QKBgQD9XjDLuBPDba4r8zfa24YDpINnXhjE2j1nfg98U60CPEQT+JkOfqaLr3lHlVVDzh5Yf8PFsowz7t3QCmF5pJHzZ8y9/ttH9ntgU+M2T/zv++2sHnI1WglfK9LZWii/5y4cMS8AbUx+SQzGIqNS1OBPv+2Tp9ZbjdT41bPJ4qOpywKBgQCXU7LWe6lUeCVhEB57tmK2tT6PkKSAPitLSa4WQFvVdwLYUayVaqIvZAGl4eLEnIImlmExzKPAscNCKm+Ifac0uh9Uk8Ju2JnGqJ4Je7ScOELGvTIo/Gu/csWdOMd+DBwYdGS9tuqVfgpbP/oL+zYx8uBGYtucA4K0OEvxOiDx/wKBgH0HAeVFjNsfQJeHicSCF3usrvtPP8HEQBDV8CZV1EYKHz4LqtuwO9cqXBqq4kx3Zhod0im4ld76vJJwzPEN+Me4LRyEqwiz5OX//1tJ1XNHSl1pGMqjB4TjR0TibMFl/ycCTkNTrC+VNKyBYz74tUglWcNHS0wajUHNks7I/CJJAoGBAIm6DLd2/ys42lRX9laELZ26oYDKlV1+t6qjGYV499v1oCo/U4L99TSKoZFXYCuvgikajsVjSdp0L5FFzBL+wbKUfzVb8gcure6HwqZA56WS8vuscD2rV2l8TO0GI1LONLfxH0sncqOyfjyEotBKyA13zrVg/h0leM0Lu9qGHDwDAoGAWyHc9cOGvxJh4q9Bixp3HoQs/g7PsBIqDyzjMEiX//sbLG/vsCDVdtGWxBnSrBztNv8VY71aQsjpfn4pIBJmkSaU//p61Di4tlEquu2Pz+S1IQxWuvNMoFCcqa5DagUcs42gucGFSdJzC48Nv8SvBke1BUCz8F3FK6Lm13kcv6s=";
    $private_key = "-----BEGIN RSA PRIVATE KEY-----\n" . $merchantPrivateKey . "\n-----END RSA PRIVATE KEY-----";
    openssl_private_decrypt(base64_decode($crypttext), $plain_text, $private_key);
    return $plain_text;
    }


?>