<?php
require_once('ML.class.php');
	$ML = new ML();
	if(isset($_POST['FormData'])){	
	$search = trim($_POST['FormData']);	
	libxml_use_internal_errors(true); 
	$Full_URL = "http://www.tripadvisor.com" . $ML -> getHalf_URL($search);
	echo $Response = $ML -> getData($Full_URL);
}
else if(isset($_POST['LiveData'])){
	//Get Post data
	$_Interests = $_POST['LiveData'];	
	session_start();
	//Write to file
	$_FileName = 'store/'.$_SESSION['users'].'.txt';
	file_put_contents($_FileName,$_Interests);
	}
else if(isset($_POST['Targets']) && isset($_POST['startDate'])){	
	//Get Post data
	$Targets = json_decode($_POST['Targets']);
	$startDate = $_POST['startDate'];	
	session_start();
	//Write to file
	$_FileName = 'store/'.$_SESSION['users'].'-Schedule.xml';
	//file_put_contents($_FileName,$Targets);
	//creating object of SimpleXMLElement
	$xml_user_info = new SimpleXMLElement("<?xml version=\"1.0\"?><Date></Date>");
	$xml_user_info -> addAttribute('Start', $startDate);
	//function call to convert array to xml
	array_to_xml($Targets, $xml_user_info);
	//saving generated xml file
	$xml_file = $xml_user_info->asXML($_FileName);
	}
	else{
		echo 'Empty Request';
	}
/////////////////////////////////////////////////////////////
function array_to_xml($array, &$xml_user_info) {
    foreach($array as $key => $value) {
        if(is_array($value)) {
            if(!is_numeric($key)){
                $subnode = $xml_user_info->addChild("$key");
                array_to_xml($value, $subnode);
            }else{
				//$key += 1;
                $subnode = $xml_user_info->addChild("Day");
                array_to_xml($value, $subnode);
            }
        }else {
			//$key += 1;
            $xml_user_info->addChild("Place", htmlspecialchars("$value"));
        }
    }
}		
?> 