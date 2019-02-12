<?php

//recieved data from user form
//check for malicious code

//setup blank variable to hold input
$userInput = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userInput = stripData($_POST['value']);
}

//echo $userInput;

//set up twitter
require "twitteroauth-1.0.1/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;


//APP DELETED AFTER VIDEO CONSTRUCTION

//gather authenitcation data
$CONSUMER_KEY = "7xLsyEJRCzff3XrcFaMTPGs30";
$CONSUMER_SECRET = "ppZj0M58Bcte3j6mTUoDeZmiF3mgfuhD7AnVLBpVjMnaG6LjK7";
$access_token = "873979080605138944-njAHZshewwmV3dXCTO13A2JGTYuMjLs";
$access_token_secret = "sZSvcmYPCgRNwH6RbDpDsvvCPU5SDQh4LqbXNR2ofipBJ";

//authetnicate with twitter using access tokens
$connection = new TwitterOAuth($CONSUMER_KEY, $CONSUMER_SECRET, $access_token, $access_token_secret);


//$content = $connection->get("account/verify_credentials");
//print_r($content);

//run a querie

$search = $connection->get('search/tweets', ['q' => $userInput]);

print_r($search);


//function to clear code
function stripData($data){
    //trim our data 
    $data = trim($data);
    //remove slashes
    $data = stripslashes($data);
    //remove special HTML characters () <>
    $data = htmlspecialchars($data);
    
    return $data;
}

?>