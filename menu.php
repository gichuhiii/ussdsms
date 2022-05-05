<?php
include_once 'util.php';
class Menu{
    protected $text;
    protected $sessionId;

    function __construct($text,$sessionId){
        $this->text=$text;
        $this->sessionId=$sessionId;
    }
    
    public function mainMenuRegistered(){
        $response = "CON Reply with\n";
        $response .= "1. Send Money\n";
        $response .= "2. Withdraw\n";
        $response .= "3. Check balance\n";
        echo $response;

    }
    public function mainMenuUnRegistered(){
        $response = "CON Welcome to CadoCash. Reply with\n";
        $response .="1. Register\n";
        echo $response;

    }
    public function registerMenu($textArray){
        //to get the level
        $level=count($textArray);
        if ($level == 1) {
            echo "CON Enter your Full Name:";
        } else if($level == 2){
            echo "CON Set a pin:";
        } else if ($level == 3) {
            echo "CON Confirm your pin:";
        } else if ($level == 4){
            $name=$textArray[1];
            $pin=$textArray[2];
            $confirmPin=$textArray[3];
            if ($pin != $confirmPin) {
                echo "END Your pin does not match. Please try again";
            } else{
                //upload data to db
                //send confirmation sms
                echo "END Registration Successful";
            }
        }

    }
    public function sendMoneyMenu($textArray){

    }
    public function withdrawMoneyMenu($textArray){

    }
    public function checkBalanceMenu($textArray){

    }
}


?>