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

}

else {
    //user is registered and the string is not empty

}



// if ($text == "") {
//     // This is the first request. Note how we start the response with CON
//     $response  = "CON What would you want to check \n";
//     $response .= "1. My Account \n";
//     $response .= "2. My phone number";

// } else if ($text == "1") {
//     // Business logic for first level response
//     $response = "CON Choose account information you want to view \n";
//     $response .= "1. Account number \n";

// } else if ($text == "2") {
//     // Business logic for first level response
//     // This is a terminal request. Note how we start the response with END
//     $response = "END Your phone number is ".$phoneNumber;

// } else if($text == "1*1") { 
//     // This is a second level response where the user selected 1 in the first instance
//     $accountNumber  = "ACC1001";

//     // This is a terminal request. Note how we start the response with END
//     $response = "END Your account number is ".$accountNumber;

// }

// // Echo the response back to the API
// header('Content-type: text/plain');
// echo $response;


?>