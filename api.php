<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Převod jednotek</title>
</head>
<body>
  
</body>
</html>


<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://www.cnb.cz/cs/financni-trhy/devizovy-trh/kurzy-devizoveho-trhu/kurzy-devizoveho-trhu/denni_kurz.txt;jsessionid=FCB52D22DF5ECA3F245AE62CE705243B?date=" . date('d.m.Y'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "key: 6SGQc0mUTm10jFsjyDass72BpLqSZ5W12ziYPvtb."
  ));

$response = curl_exec($ch);
curl_close($ch);

$response = explode("\n",$response);
unset($response[0]);

for($i = 1; $i <  count($response); $i++){
    $response[$i] = explode("|", $response[$i]);
}

if(isset($_POST['totalPrice'])){
  $totalPrice= ($_POST['totalPrice']);
}

if(isset($_POST['currency'])){
    $currency = $_POST['currency'];
    foreach($response as $country){
      if($country[0] == $currency){
          $unit = $country[2];
          $total = $country[4];
          $total = str_replace(',','.',$total);
          $calc = ($totalPrice * $unit) / (double)$total;
          echo '<h2>Převod měny : česká koruna -> ' . $country[1] . '</h2><br>';
          echo '<h3>' . $totalPrice . ' Kč = ' . $calc . ' ' . $country[3] . '</h3>';
    }
  }
}






