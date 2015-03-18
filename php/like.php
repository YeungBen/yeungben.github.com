<?php

if(!file_exists('./likes.sqlite')) die('Likes db could not exists.');


$file_db = new PDO('sqlite:likes.sqlite');
$file_db->setAttribute(PDO::ATTR_ERRMODE, 
                            PDO::ERRMODE_EXCEPTION);
$unique = md5($_SERVER['REMOTE_ADDR']. $_SERVER['HTTP_USER_AGENT']);

$pageID = isset($_GET['pageid'])?$_GET['pageid']:1;

if(!is_numeric($pageID)) die('ID is not in correct types');

$query = "SELECT COUNT(*) as count FROM tblLikes WHERE pageID=$pageID AND checkMD5='$unique'";

$result = $file_db->query($query);


foreach($result as $rows) {
$row = $rows['count'];
}

if($row > 0 )
die('You already have liked this page');

$query = "INSERT INTO tblLikes(pageID , checkMD5) VALUES ('$pageID' , '$unique')";

$file_db->exec($query);

echo "1";

