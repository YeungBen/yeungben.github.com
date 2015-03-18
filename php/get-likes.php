<?php
try {
    /**************************************
    * Create databases and                *
    * open connections                    *
    **************************************/
 
    // Create (connect to) SQLite database in file
    $file_db = new PDO('sqlite:likes.sqlite');
    // Set errormode to exceptions
    $file_db->setAttribute(PDO::ATTR_ERRMODE, 
                            PDO::ERRMODE_EXCEPTION);
 

if(isset($_GET['isliked']))
{

$pageID = isset($_GET['pageid'])?$_GET['pageid']:0;
$unique = md5($_SERVER['REMOTE_ADDR']. $_SERVER['HTTP_USER_AGENT']);

if(!is_numeric($pageID)) die('ID is not in correct types');

$query = "SELECT COUNT(*) as count FROM tblLikes where pageID=$pageID AND CheckMD5='$unique'";


$result = $file_db->query($query);

foreach($result as $rows) {
$row = $rows['count'];
}




if($row > 0 )
echo 'yes';
else
echo 'no';

die;


}
$pageID = isset($_GET['pageid'])?$_GET['pageid']:0;

if(!is_numeric($pageID)) die('ID is not in correct types');

$query = "SELECT COUNT(*) as count FROM tblLikes where pageID=$pageID";


$result = $file_db->query($query);

foreach($result as $rows) {
$row = $rows['count'];
}




if($row > 0 )
echo $row;

  }
  catch(PDOException $e) {
    // Print PDOException message
    echo $e->getMessage();
  }