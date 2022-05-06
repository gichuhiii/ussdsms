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
        $level = count($textArray);
        if ($level == 1) {
            echo "CON Enter the receiver's Mobile No.";
        }else if ($level == 2) {
            echo "CON Enter amount";
        }else if ($level == 3) {
            echo "CON Enter your pin:";
        }else if ($level == 4) {
            $response = "CON  Send ". $textArray[2] . " to " . $textArray[1] . "\n";
            $response .= "1. Confirm\n";
            $response .= "2. Cancel\n";
            $response .=Util::$GO_BACK. "Back\n";
            $response .=Util::$MAIN_MENU. "Main Menu\n";
            echo $response;
        }else if($level ==5 && $textArray[4] == 1) {
            //confirm
            //check pin
            //check balance
            //send money

            echo "END Your request is being processed";
            
        }else if ($level == 5 && $textArray[4] == 2) {
            echo "END ThankYou for using our service";
        }else if ($level == 5 && $textArray[4] == Util :: $GO_BACK) {
           echo "END You have requested to go back";
        }else if ($level == 5 && $textArray[4] == Util :: $MAIN_MENU) {
            echo "END You have requested to go back to the main menu";
        }else{
            echo "END Invalid entry";
        }

    }
    public function withdrawMoneyMenu($textArray){

    }
    public function checkBalanceMenu($textArray){

    }
}


?>