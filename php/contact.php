<?php
include_once './lib.php';
include_once './config.php';
if(!isPostBack()) die('Please send contact form via POST method...');

$Name = htmlspecialchars($_POST['txtName']);
$Email = htmlspecialchars($_POST['txtEmail']);;
$Subject = htmlspecialchars($_POST['txtSubject']);;
$Text = htmlspecialchars($_POST['txtText']);;


if(empty ($Text)) die('Text could not be empty...');
if(!checkEmailAddress($Email)) die('Invalid email address...');

if(!sendmail::send($Email , $contactEmail , $Text , $Subject ))
   die('Could not send message. failed to connect to mailserver.');
   
echo '1';