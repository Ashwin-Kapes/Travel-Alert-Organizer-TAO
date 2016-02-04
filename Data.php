<?php
if(isset($_POST['FormData'])){
	
$search = trim($_POST['FormData']);
	
libxml_use_internal_errors(true);

//Function getHalf_URL 
function getHalf_URL($_Place){
$html = file_get_contents("http://www.tripadvisor.com/".urlencode($_Place)."");						
$dom = new DOMDocument;
$dom->loadHTML($html);
//foreach open
foreach($dom->getElementsByTagName('li') as $ptag)
{
    if($ptag->getAttribute('class') == "attractions twoLines")
    {
     foreach($ptag->getElementsByTagName('a') as $tag){
		 return $tag->getAttribute('href');
		 exit();
		 }
    }
}
//foreach close	
	}
//Function getHalf_URL

//Function getData
function getData($_Data){
$html = file_get_contents($_Data);	
$xml = new DOMDocument();
$xml->loadHtml($html);
$xpath = new DOMXPath($xml);
$response = 'NOT'; 
$html = '';
$_Precise = array();
$results = $xpath->query("//*[@class='wrap al_border attraction_element']");


$result_length  = $results->length;
if ($result_length > 0){

	foreach($results as $container){
		$_Titles = $container->getElementsByTagName("a");		
		$_Ratings = $container->getElementsByTagName("img");
		$_Reviews = $container->getElementsByTagName("span");
		$_Tags = $container->getElementsByTagName("span");			
	
		foreach($_Titles as $_Title){		
				foreach($_Ratings as $_Rating){
					foreach($_Reviews as $_Review){
						foreach($_Tags as $_Tag){
			
		if($_Title->parentNode->getAttribute('class') == "property_title" 
		&& $_Rating->parentNode->parentNode->getAttribute('class') == "rs rating"		
		&& $_Review->getAttribute('class') == "more"
		&& $_Tag->parentNode->getAttribute('class') == "p13n_reasoning_v2"){
				$_Title_Text = trim(preg_replace("/[\r\n]+/", " ", $_Title->nodeValue));
				$_Rating_Text = trim(preg_replace("/[\r\n]+/", " ", $_Rating->getAttribute("alt")));				
				$_Review_Text = trim(preg_replace("/[\r\n]+/", " ", $_Review->nodeValue));
				$_Tag_Text = trim(preg_replace("/[\r\n]+/", " ", $_Tag->nodeValue));
				$_Rating_Digit = explode(" ",$_Rating_Text);
				$links[] = array('Title' => $_Title_Text, 'Rating' => $_Rating_Digit[0], 'Review' => $_Review_Text, 'Tag' => $_Tag_Text);
				}
					}//Tags Close
					}//Reviews Close
				}//Ratings Close
			
			}//Titles Close
		}
		
	// $response = trim($results->getElementsByTagName("a"));
	 //if(!empty($response) && $response != " " && $response != '()'){
	 //$_Precise[] = trim($response);
	//	}
	
	
}

//ob_start();
//$output = ob_get_clean();
//return json_encode(preg_replace('/^\s+|\n|\r|\s+$/m', '', $_Precise));

 return json_encode($links); 
	}
//Function getData
 
$Full_URL = "http://www.tripadvisor.com" . getHalf_URL($search);

echo $Response = getData($Full_URL);

}//Save Live checked box value
else if(isset($_POST['LiveData'])){
	//Get Post data
	$_Interests = $_POST['LiveData'];	
	session_start();
	//Write to file
	$_FileName = 'store/'.$_SESSION['users'].'.txt';
	file_put_contents($_FileName,$_Interests);
	}
	else{
		echo 'Empty Request';
	}
?> 