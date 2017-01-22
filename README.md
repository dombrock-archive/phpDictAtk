#phpDictAtk
A proof of concept CLI based Brute-Force/Dictionary attack script written in PHP. This script is specifically targeted at WordPress installs but could be easily re-written to work with a multitude of HTTP-Post based attacks. 

###Requires cURL

##Usage

Clone and run with:

````php Attack.php````

Currently the command does not take any parameters.

Change the URL and password dictionary in the ````Attack.php```` file. 

##More info
You will be much better off testing with a tool such as THC-HYDRA but this is a proof of concept, written as an experiment. 

Most production WordPress servers will implement some kind of policy that will prevent people from brute forcing their login. This script is not effective against sites that will lock you login ability or ban your IP for too many quick login attempts.  

##To-Do

-Add the ability to take command parameters

-Right now the script determines success by checking for a lack of the string "ERROR" in the server response. It would be better to check for something positive, like "logout" as sometimes you run into a page that is not successful but does not contain the string "ERROR". (For instance, being blocked for too many login attempts often does not relay the string "ERROR".

-Add a time-out option to prevent overloading servers and raising red flags.  