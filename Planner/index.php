<?php
session_start();
if(!isset($_SESSION['users']))
header('location: http://www.rimtrip.com/Hackathon2016/');
else
require_once('../ML.class.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<title><?php echo $_SESSION['users'];?> Travel Alert & Organizer (TAO)</title>
<link rel="stylesheet" type="text/css" href="../css/home.css">
</link>
<!--Datepicker CSS-->
<link rel="stylesheet" href="../css/bootstrap.min.css" />
<!--<link rel="stylesheet" href="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/css/material.min.css" />-->
<link rel="stylesheet" href="../css/bootstrap-material-datetimepicker.css" />
<link href='http://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!--Drag CSS-->
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<!--Datepicker JS-->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/material.min.js"></script>
<script type="text/javascript" src="../js/moment-with-locales.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-material-datetimepicker.js"></script>
<!--Drag JS-->
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script src="../js/jquery.touch-punch.min.js"></script>
<script src="../js/jquery.shapeshift.js"></script>
</head>
<body>
<div class="site-container">
  <div class="site-pusher">
    <header class="header"> <a href="#" class="header__icon" id="header__icon"></a> <a>Welcome, <strong><?php echo $_SESSION['users'];?></strong></a>
      <nav class="menu"> <a href="logout.php">LOGOUT</a> </nav>
    </header>
    <div class="site-content">
      <div class="container"> 
        <!--Datepicker start-->
        <div class="container well">
          <div class="col-md-12">
            <p>* In order to organise your journey please select place you want to visit and days you'll stay there.</p>
            <span class="err"></span>
            <form id="Search">
              <div class="row">
                <div class="col-md-3">
                  <div class="form-control-wrapper">
                    <input type="text" class="form-control" id="search"  placeholder="Select Place eg: Bengaluru or Delhi" required="required" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-control-wrapper">
                    <input type="text" id="date-start" class="form-control" placeholder="Trip Start Date - MM/DD/YYYY">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-control-wrapper">
                    <input type="text" id="date-end" class="form-control"  placeholder="Trip End Date - MM/DD/YYYY">
                  </div>
                </div>
                <div class="col-md-3">
                  <button class="btn btn-success pull-right btn-block" id="roundone" name="submit"> Proceed </button>
                  
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 checks">
                  <h5>*Select Your Interest</h5>                 
                  <input type="checkbox" name="selector[]" class="livedata" id="0" value="Historic Sites">
                  Historic Sites
                  </input>
                  <input type="checkbox" name="selector[]" class="livedata" id="1" value="Architectural Buildings">
                  Architectural Buildings
                  </input>
                  <input type="checkbox" name="selector[]" class="livedata" id="2" value="Observatories & Planetariums">
                  Observatories & Planetariums
                  </input>
                  <input type="checkbox" name="selector[]" class="livedata" id="3" value="Religious Sites">
                  Religious Sites
                  </input>
                  <input type="checkbox" name="selector[]" class="livedata" id="4" value="History Museums">
                  History Museums
                  </input>
                  <input type="checkbox" name="selector[]" class="livedata" id="5" value="Nature & Wildlife Areas">
                  Nature & Wildlife Areas
                  </input>
                  <input type="checkbox" name="selector[]" class="livedata" id="6" value="Lookouts">
                  Lookouts
                  </input>
                  <input type="checkbox" name="selector[]" class="livedata" id="7" value="Specialty Museums">
                  Specialty Museums
                  </input>
                  <input type="checkbox" name="selector[]" class="livedata" id="8" value="Points of Interest & Landmarks">
                  Points of Interest & Landmarks
                  </input>
                  <input type="checkbox" name="selector[]" class="livedata" id="9" value="Parks">
                  Parks
                  </input>
                  <input type="checkbox" name="selector[]" class="livedata" id="10" value="Convention Centers">
                  Convention Centers
                  </input>
                  <input type="checkbox" name="selector[]" class="livedata" id="11"value="Factory Outlets">
                  Factory Outlets
                  </input>
                  <input type="checkbox" name="selector[]" class="livedata" id="12"value="Art Galleries">
                  Art Galleries
                  </input>
                  <input type="checkbox" name="selector[]" class="livedata" id="13"value="Shopping Malls">
                  Shopping Malls
                  </input>
                  <input type="checkbox" name="selector[]" class="livedata"id="14" value="Monuments & Statues">
                  Monuments & Statues
                  </input>
                  <input type="checkbox" name="selector[]" class="livedata"id="14" value="Amusement & Theme Parks">
                  Amusement & Theme Parks
                  </input>
                  <input type="checkbox" name="selector[]" class="livedata"id="14" value="Gardens">
                  Gardens
                  </input>
                   <input type="checkbox" name="selector[]" class="livedata"id="14" value="Educational sites">
                  Educational sites
                  </input>  
                  <input type="checkbox" name="selector[]" class="livedata"id="14" value="Neighborhoods">
                  Neighborhoods
                  </input>
                   <input type="checkbox" name="selector[]" class="livedata"id="14" value="Science Museums">
                  Science Museums
                  </input>
                    <input type="checkbox" name="selector[]" class="livedata"id="14" value="Mysterious Sites">
                  Mysterious Sites
                  </input>  
                    <input type="checkbox" name="selector[]" class="livedata"id="14" value="Arenas & Stadiums">
                  Arenas & Stadiums
                  </input> 
                  <input type="checkbox" name="selector[]" class="livedata"id="14" value="Castles">
                  Castles
                  </input> 
                  <input type="checkbox" name="selector[]" class="livedata"id="14" value="Churches & Cathedrals">
                  Churches & Cathedrals
                  </input>
                   <input type="checkbox" name="selector[]" class="livedata"id="14" value="Art Museums">
                  Art Museums
                  </input>
                  <input type="checkbox" name="selector[]" class="livedata"id="14" value="Art Galleries">
                  Art Galleries
                  </input>          
                </div>
              </div>
            </form>
           
          </div>
        </div>
        <div class="container well"> 
        <span id="res_msg">
<?php
$_FileName = '../store/'.$_SESSION['users'].'-Schedule.xml';
if(file_exists($_FileName)){
	$xml = simplexml_load_file($_FileName);
	$D=1;
	$DD =  $xml['Start'];
	function nextDate($FirstDate){		
	$FDate = date('m/d/Y',strtotime($FirstDate . "+1 days"));
	return $FDate;
}
foreach($xml as $items){	
	echo '<div class="col-md-6"><div class="tag-box tag-box-v4"><h5><strong>Day '.$D.' schedule</strong>:'.$DD.'</h5>';
	$DD = nextDate($DD);
	$P = 1;
foreach($items as $item)
{	
    echo '<span class="label label-success">'.$P.'</span>'.$item.'<br/>';
	$P++;    
}
	$D++;
	echo '</div></div>';
}
}
?>
        </span> 
        </div>
        <div class="container well">
          <div id="col-md-12">
            <div class="dragger" style="max-height:400px;overflow:scroll;"> </div>
          </div>
          <div id="dropper"> </div> <br/>
              <div class="col-md-12">
           <a class="btn btn-success pull-right subs"> Submit </a>
           </div>
        </div>
        
        <!--Datepicker end--> 
        
      </div>
      <!-- END container --> 
    </div>
    <!-- END site-content -->
    <div class="site-cache" id="site-cache"></div>
  </div>
  <!-- END site-pusher --> 
</div>
<!-- END site-container -->
<div id="js-handle"><script type="text/javascript" src="../js/scripts.js"></script></div>
<script>
$('.subs').click(function(){
	var Diff = $(this).attr('id');
	var sDate = $('#date-start').val();
	//console.log(sDate);
	//console.log(Diff);
	var Targets = [];
	var Noempty = false;
	for(var x = 1; x <= Diff; x++){
		var arraysOfIds = $('#child_'+x+' div[class="ptitle"]').map(function(){
                       var z = $(this).html().trim();
					   //console.log(z);
					   if(z != null){
						   Noempty = true;
						   }
					   return z;
                   }).get();
				  // console.log(arraysOfIds);
				   Targets.push(arraysOfIds);
	}
	//console.log(Targets);
	if(Noempty){
		$('.subs').html(' Saving... Refreshing... ');
 $.ajax({
            type: 'POST',
            url: '../Data.php',
			dataType: 'json',
			data: { 
			Targets: JSON.stringify(Targets), 
			startDate: sDate }          
        	})
			location.reload();		
		}else{
			return false;
			}	  
});
</script>
<?php
//If file exists with current session then get Interest
$_FileName = '../store/'.$_SESSION['users'].'.txt';
if(file_exists($_FileName)){
$_FileData =  json_decode(file_get_contents($_FileName));
echo '<script type="text/javascript">';
foreach($_FileData as $Pkey => $Pvalue){		
	echo '$("#'.$Pvalue[0].'").prop("checked",true);';	
	}
	echo '</script>';
}
?>
</body>
</html>