<?php

session_start();

if(!$_POST['mobile_no'])
	
	throw new Error("Invalid parameters");


function createRandomPassword() { 

    $chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
    srand((double)microtime()*1000000); 
    $i = 0; 
    $pass = '' ; 

    while ($i <= 7) { 
        $num = rand() % 33; 
        $tmp = substr($chars, $num, 1); 
        $pass = $pass . $tmp; 
        $i++; 
    } 

    return $pass; 

} 

$code = createRandomPassword();


		$array_fields['phone_number'] = "+63". $_POST['mobile_no'] ;

        $array_fields['message'] = "Please enter code above '" .$code."'" ;
		
		$array_fields['device'] = "New Device";

        $array_fields['device_id'] = 114249;

        $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTU3NDQ0MjU5MSwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjc1NDQ5LCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.Hc71Azyix2eNXnM-Vt4Zjmbedq-1IzR-4oEygj6ksJk";

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://smsgateway.me/api/v4/message/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "[  " . json_encode($array_fields) . "]",
            CURLOPT_HTTPHEADER => array(
                "authorization: $token",
                "cache-control: no-cache"
            ),
        ));
		
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
		
		echo true;
       