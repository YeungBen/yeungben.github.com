<?php
class sendmail
{

	public static function send($from , $to , $message, $subject)
	{

		


		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

		$headers .= "From:" . $from;
		if(mail($to,$subject,$message,$headers))
		return true;
		else
		return false;
	}
}




function checkEmailAddress($email){

	return preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",$email);

}

function isPostBack()
{

return ($_SERVER['REQUEST_METHOD'] == 'POST');

}