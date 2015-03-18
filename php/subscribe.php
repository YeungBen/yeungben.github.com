<?php

include_once './lib.php';
include_once './config.php';
if(!isPostBack()) die('Please send subscribe form via POST method...');


$Email = htmlspecialchars($_POST['txtSubscribe']);;

$Text = "Subscriber email address recieved : ". $Email;
$Subject = "Subscribe";

if(!checkEmailAddress($Email)) die('Invalid email address...');

if(!sendmail::send($Email , $subscribeEmail , $Text , $Subject ))
   die('Could not send message. failed to connect to mailserver.');
   
echo '1';