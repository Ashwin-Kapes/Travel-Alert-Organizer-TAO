<?php
session_start();
if(!isset($_SESSION['users']))
header('location:http://localhost/Travel-Alert-Organiser-TAO/');
else
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
                  <input type="checkbox" name="selector[]" class="livedata"id="9" value="Parks">
                  Parks
                  </input>
                  <input type="checkbox" name="selector[]" class="livedata"id="10" value="Convention Centers">
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
                </div>
              </div>
            </form>
           
          </div>
        </div>
        <div class="container well"> <span id="res_msg"></span> </div>
        <div class="container well">
          <div id="col-md-12">
            <div class="dragger" style="max-height:400px;overflow:scroll;"> </div>
          </div>
          <div id="dropper"> </div> <br/>         
           <a class="btn btn-success pull-right" id="subs"> Submit </a>           
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

<?php
//If file exists with current session then get Interest
$_FileName = '../store/'.$_SESSION['users'].'.txt';
if(file_exists($_FileName))
$_FileData =  json_decode(file_get_contents($_FileName));
echo '<script type="text/javascript">';
foreach($_FileData as $k => $v){		
	echo '$("#'.$v.'").prop("checked",true);';	
	}
	echo '</script>';	
?>
</body>
</html>