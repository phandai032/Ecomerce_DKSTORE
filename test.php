<?php

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://qrtiger.com/api/qr/static",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n  \"size\": 500,\n  \"colorDark\": \"rgb(5,64,128)\",\n  \"logo\": \"scan_me.png\",\n  \"eye_outer\": \"eyeOuter2\",\n  \"eye_inner\": \"eyeInner1\",\n  \"qrData\": \"pattern0\",\n  \"backgroundColor\": \"rgb(255,255,255)\",\n  \"transparentBkg\": false,\n  \"qrCategory\": \"url\",\n  \"text\": \"https://dkstore.tk\"\n}",
  CURLOPT_HTTPHEADER => [
    "Authorization: Bearer 558a9570-cc23-11ec-9829-43a48ae53055",
    "Content-Type: application/json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}