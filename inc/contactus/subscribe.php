<?php
include_once './lib.php';
switch($_REQUEST['cemail']) {
	default: 
// replace the bellow email with your email id
$subscribeEmail = "info@netcasb.com";
$subscribeEmail .= $_REQUEST['emailto2'];  break;	
}

if(!isPostBack()) die('Please send subscribe form via POST method...');


$Email = htmlspecialchars($_POST['txtSubscribe']);;

$Text = "Subscriber email address recieved : ". $Email;
$Subject = "Subscribe";

if(!checkEmailAddress($Email)) die('Invalid email address...');

if(!sendmail::send($Email , $subscribeEmail , $Text , $Subject ))
   die('Could not send message. failed to connect to mailserver.');
   
echo '1';
?>