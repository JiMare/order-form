<?php

$nameErr = ''; 
$surnameErr = '';
$mailErr = '';
$name = ''; 
$surname = '';
$mail = '';
$marks = 'áäéëěíóöôúůüýčďňřšťžĺŠŽŘČ';
$ntbPrice = 11000;
$photoPrice = 3000;
$phonePrice = 7000;

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

function showPrice($price, $qty){
    return $price * $qty * 1.21;
}  

 if($_SERVER["REQUEST_METHOD"] == "POST"){

    if (empty($_POST["firstName"])) {
        $nameErr = "Name is required";
    }
    else{
        $name = test_input($_POST["firstName"]);
        if (!preg_match("/^[a-zA-Z-' $marks]*$/",$name)) {
          $nameErr = "Only letters and white space allowed";
        }  
    }

    if(empty($_POST['lastName'])){
        $surnameErr = "Surname is required";
    }
    else{
        $surname = test_input($_POST['lastName']);
        if (!preg_match("/^[a-zA-Z-' $marks]*$/",$surname)) {
            $surnameErr = "Only letters and white space allowed";
        }
    }

    if(empty($_POST['mail'])){
        $mailErr ='E-mail is required';
    }
    else{
        $mail = test_input($_POST['mail']);
        if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
            $mailErr = "Invalid e-mail format";
        }
    }   

    if(is_numeric($_POST['ntbqty'])){
        $ntbqty = test_input($_POST['ntbqty']);  
    }
    
    if(is_numeric($_POST['photoqty'])){
        $photoqty = test_input($_POST['photoqty']);
    }
   
    if(is_numeric($_POST['phoneqty'])){
        $phoneqty = test_input($_POST['phoneqty']);
    }
 }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="index.js" defer></script>
    <title>Objednávka</title>
</head>
<body> 
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <fieldset>
            <legend><h1>Objednávkový formulář</h1></legend>
    
            <label for="firstName">Jméno: </label>
            <span class="error"><?php echo $nameErr;?></span>
            <input type="text" name="firstName" value="<?php if($nameErr == '' && isset($_POST['firstName'])) echo $name ?>">
        
            <label for="lastName">Příjmení:</label>
            <span class="error"><?php echo $surnameErr;?></span>
            <input type="text" name="lastName" value="<?php if($surnameErr == '' && isset($_POST['lastName'])) echo $surname ?>"> 
  
            <label for="mail">E-mail: </label>
            <span class="error"><?php echo $mailErr;?></span>
            <input type="mail" name="mail" value="<?php if($mailErr == '' && isset($_POST['mail'])) echo $mail ?>">
           
            <table>
                <tr>
                    <th>Položka</th>
                    <th>Množství</th>
                    <th>Cena/1ks</th>
                </tr>
                <tr>
                    <td>Notebook</td>
                    <td><input type="text" name="ntbqty" value="0" id="ntbCount"><button id="ntbPlus">+</button><button id="ntbMinus">-</button></td>
                    <td>11.000 Kč</td>
                </tr>
                <tr>
                    <td>Fotoaparát</td>
                    <td><input type="text" name="photoqty" value="0" id="photoCount"><button id="photoPlus">+</button><button id="photoMinus">-</button></td>
                    <td>3.000 Kč</td>
                </tr>
                <tr>
                    <td>Smartphone</td>
                    <td><input type="text" name="phoneqty" value="0" id="phoneCount"><button id="phonePlus">+</button><button id="phoneMinus">-</button></td>
                    <td>7.000 Kč</td>
                </tr>
            </table>
            <input type="submit" id="submitBtn" value="Odeslat objednávku">
       </fieldset>
    </form>

 <?php 



if(isset($_POST) && $nameErr == '' && $surnameErr == '' && $mailErr == ''){

    if(isset($ntbqty) && isset($photoqty) && isset($phoneqty)){
        $totalqty = $ntbqty + $photoqty + $phoneqty;
        if($totalqty > 0 && $ntbqty < 26 && $photoqty < 26 && $phoneqty < 26){
 
            echo '<h1>Výsledek objednávky</h1>';
            echo 'Jméno: ' . $name . '<br>';
            echo 'Příjmení: ' . $surname . '<br>';
            echo 'E-mail: ' . $mail . '<br><br>';

            echo '<h2>Objednané položky:</h2>';

            if($ntbqty > 0 && $ntbqty < 26){
                echo '<h3>Notebook</h3>';
                echo 'počet kusů: ' . $ntbqty . ' ks<br>';
                echo 'cena včetně DPH: '. number_format(showPrice($ntbPrice, $ntbqty), 2,",",".") . ' Kč';
            }
            if($photoqty > 0 && $photoqty < 26){
                echo '<h3>Fotoaparát</h3>';
                echo 'počet kusů: ' . $photoqty . ' ks<br>';
                echo 'cena včetně DPH: '. number_format(showPrice($photoPrice, $photoqty), 2,",",".") . ' Kč';
            }
            if($phoneqty > 0 && $phoneqty < 26){
                echo '<h3>Smartphone</h3>';
                echo 'počet kusů: ' . $phoneqty . ' ks<br>';
                echo 'cena včetně DPH: '. number_format(showPrice($phonePrice, $phoneqty), 2,",","." ). ' Kč';
            }

            $totalPrice = showPrice($ntbPrice, $ntbqty) + showPrice($photoPrice, $photoqty) + 
            showPrice($phonePrice, $phoneqty);
            echo '<h3>Cena celkem: ' . number_format($totalPrice, 2,",",".") . ' Kč</h3>';
           
            require 'select.php';            
        }   
   } 
}

?>

</body>
</html>
