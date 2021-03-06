<?php
session_start();
require_once('config.php');


$email = $_POST['email'];
$password = sha1($_POST['password']);

$sql = "SELECT * FROM users WHERE email = ? AND password = ? LIMIT 1";
$stmtselect  = $db->prepare($sql);
$result = $stmtselect->execute([$email, $password]);

if($result)
{
	$user = $stmtselect->fetch(PDO::FETCH_ASSOC);
	if($stmtselect->rowCount() > 0)
	{
		if($user['email_verified_at']!=0)
		{
			$_SESSION['userlogin'] = $user;
			echo 'Logged';
		}
		else
		{
			echo 'You haven\'t confirmed your registration.';
		}
	}
	else
	{
		echo 'There is no user with these credentials.';		
	}
}
else
{
	echo 'There was a problem with your login. Please try again later.';
}