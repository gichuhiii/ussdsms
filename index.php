<?php
//https://2513-41-80-9-49.in.ngrok.io/ussdsms/index.php
include_once 'menu.php';

// Read the variables sent via POST from our API
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

$isRegistered = true;
$menu = new Menu($text, $sessionId);

if ($text == "" && !$isRegistered) {
   //user is registered and the string is empty
       //calling the function
       $menu->mainMenuRegistered();
}

else if ($text == "" && $isRegistered) {
   //user is unregistered and string is empty
    //calling the function
    $menu->mainMenuUnRegistered();

}

else if ($isRegistered) {
    //user is unregistered and string is not empty
    $textArray = explode("*", $text);
    switch($textArray[0]){
        case 1:
            $menu->registerMenu($textArray);
            break;
        default:
            echo "END Invalid input. Please try again";
    }

}

else {
    //user is registered and the string is not empty
    $textArray = explode("*", $text);
    switch($textArray[0]){
        case 1:
            $menu->sendMoneyMenu($textArray);
            break;
        case 2:
            $menu->withdrawMoneyMenu($textArray);
            break;
        case 3:
            $menu->checkBalanceMenu($textArray);
            break;
        default:
            echo "END Invalid input. Please try again";
    }


}

?>