<?php
class Login{
	function Request($url,$post)
	{
		$ch = curl_init();
		$curlConfig = array(
		    CURLOPT_URL            => $url,
		    CURLOPT_POST           => 1,
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_COOKIEFILE => 'cookies.txt',
		    CURLOPT_COOKIEJAR => 'cookies.txt',
		    CURLOPT_USERAGENT => '"Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6"',
		    CURLOPT_FOLLOWLOCATION => 1,
		    CURLOPT_REFERER => $url,
		    CURLOPT_POSTFIELDS     => $post
		);
		curl_setopt_array($ch, $curlConfig);
		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
	}
	function TestCreds($url,$post,$log,$pwd,$error_list){
		$result = $this->Request($url,$post);
		foreach ($error_list as &$check_error) {
			if (stripos($result, $check_error) == true){
				//echo "[Login/Password] Combo: [$log,$pwd] is seemingly invalid. \n";
				$new_error = $check_error;
				return $new_error;
			}
		}
		if (isset($new_error)==false){
			return false;
		}
	}
}
