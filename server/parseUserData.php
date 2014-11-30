<?php 
include 'konekcija.php';

use Papi\Client\Exception\NoPredictionException;
use Papi\Client\Model\TraitName;
use Papi\Client\PapiClient;	

header("Access-Control-Allow-Origin: *");
//global varibales
$serviceUrl = "http://api-v2.applymagicsauce.com";
$customerId = 304;
$apiKey = "stjoknh43oia1v70t744fgc6m2";

	if (isset($_POST["data"])) {
		$json=$_POST["data"];
		$uid=$json["uid"];
		$user_likes=$json["user_likes"];
		$user_poll_answers=$json["user_poll_answers"];
		insertUserData($uid, $user_poll_answers);
	}


	function getPredictions() {
		
		spl_autoload_register("autoload");
		
		global $customerId;
		global $apiKey;
		global $serviceUrl;
		$papiClient = new PapiClient($serviceUrl);
		//TODO
		$uid = '100001387396276';
		$likeIds = array("366360403533255",
 "293548727336440",
"33138223345",
"17614953850",
 "1553840998179517",
"710234179063682",
"140816219336330",
"360275654135012",
"679299808785244",
"108342629187422",
"449575835184743",
"550827001712454",
"235707209859444",
"1455860877999706",
"9041660987",
"212868802225620",
"215360805229400",
"152063891519142",
"92298273390",
"617892238300205",
"159113470767507",
"112164162133344",
"150905984946351",
"434960559981313",
"9258148868");
		$token = $papiClient->getAuthResource()->requestToken($customerId, $apiKey);
		try {
    		$prediction = $papiClient->getPredictionResource()->getByLikeIds(
       		array(TraitName::RELIGION,TraitName::POLITICS_LIBERAL,TraitName::GAY,'Relationship','Female'), $token->getTokenString(), $uid, $likeIds);
    		var_dump($prediction);
		} catch (NoPredictionException $e) {
  			  print "No prediction could be made";
		}
	}

	function autoload($className) {

   			 $className = ltrim($className, "\\");
   			 $fileName = "";
   			 if ($lastNsPos = strripos($className, "\\")) {
      			  $namespace = substr($className, 0, $lastNsPos);
       			 $className = substr($className, $lastNsPos + 1);
        		$fileName = str_replace("\\", DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
   			 }
   			 $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
   			 require_once $fileName;
		}

	function insertUserData ($uid,$user_poll_answers) {
		$age=$user_poll_answers["age"];
		$gender=$user_poll_answers["gender"];
		$religion=$user_poll_answers["religion"];
		$politics=$user_poll_answers["politics"];
		$relationship=$user_poll_answers["relationship"];
		
		global $connection; 		
		$str="INSERT INTO userdata (uid,poll_age,poll_gender,poll_politics,poll_relationship,poll_religion) 
												VALUES ('$uid',$age,'$gender','$politics','$relationship','$religion')";												
		mysqli_query($connection,$str);
		mysqli_close($connection);

		echo "tuka";


	}

	//getPredictions();



?>