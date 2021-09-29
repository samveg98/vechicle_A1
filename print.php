<!DOCTYPE html>
<html lang="en">
<title>Lorry and crane service</title>
  <!-- Add Bootstrap Links -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
body {font-size:16px;}
.w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
.w3-half img:hover{opacity:1}
 .tab1 { 
            tab-size: 2; 
        } 
.w3-button
{
  border: none;
  color: white;
  padding: 7px 16px;
  text-align: left;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
.button:hover 
{
  background-color: black;
}
th
{
	color:white;
}
table
{
	padding: 10px;
	
}

</style>
<body>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-green w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
  <div class="w3-container">
    <h3 class="w3-padding-100"><b>
  </div>
  <div class="w3-bar-block">
  <img src="1.jpg" align="middle" height="150" width="200"><br>
  <a href="#" onclick="window.location.href='index.php'" class="w3-bar-item w3-button  w3-hover-white">Home</a> 
    <a href="#showcase" onclick="window.location.href='add.php'" class="w3-bar-item w3-button w3-hover-white">Add Accounts</a> 
    <a href="#services" onclick="window.location.href='edit.php'"class="w3-bar-item w3-button w3-hover-white">Edit Accounts</a> 
    <a href="#designers" onclick="window.location.href='view.php'"class="w3-bar-item w3-button w3-white w3-border  w3-hover-white">View</a> 
    <a href="#packages" onclick="window.location.href='cb.php'"class="w3-bar-item w3-button w3-hover-white">Company Balance</a> 
    <a href="#contact" onclick="window.location.href='add1.php'"class="w3-bar-item w3-button w3-hover-white">Add Vehicle and company name</a>
  </div>
</nav>
<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
  <a href="javascript:void(0)" class="w3-button w3-red w3-margin-right" onclick="w3_open()">☰</a>
  <span>Company Name</span>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px;margin-top:50px"">

  <!-- Header -->
  <div class="w3-container" style="margin-top:50px" id="showcase">
	<img src="head2.png" align="middle"><br>
	<h1 class="w3-xxxlarge"><b>Umadevi Lorry Service</b></h1>
    <h3 class="w3-xlarge w3-text-green"><b>India's No1 best truck services.</b></h3>

	<div class="container" align="left">

<?php
$z=$_POST["sno"];
$conn=mysqli_connect("localhost","root","","umadevi");
	$sqli = "SELECT* FROM main where sno=".$z;
    $resulti = mysqli_query($conn, $sqli);
	$rowi = mysqli_fetch_assoc($resulti);
	$status=$rowi['status'];
	$bill=$rowi['bill'];
	if($status=='complete' and $bill=='required')
	{		
$q1="UPDATE `main` SET `bill`='notrequired' WHERE sno=".$z;
$resulty = mysqli_query($conn, $q1);
require_once 'PHPExcel-1.8/Classes/PHPExcel.php';
$excel=new PHPExcel();
$excel->setActiveSheetIndex(0)
	->setCellValue('A1',$rowi['no'])
	->setCellValue('A2',$rowi['invoice'])
	->setCellValue('A3',$rowi['company'])
	->setCellValue('A4',$rowi['too'])
	->setCellValue('A5',$rowi['vehicle'])
	->setCellValue('A6',$rowi['date'])
	->setCellValue('A7',$rowi['freight'])
	->setCellValue('A8',$rowi['loading'])
	->setCellValue('A9',$rowi['weighment'])
	->setCellValue('A10',$rowi['loading'])
	->setCellValue('A11',$rowi['store'])
	->setCellValue('A12',$rowi['other'])
	->setCellValue('A13',$rowi['total']);
	
	$file=PHPExcel_IOFactory::createWriter($excel,'Excel2007');
	$file->save('billcopy.xlsx');
	echo "<div class='vertical-align'>"; 
echo "<center><table><tr><td><h3>Bill is successfully Generated</h3></td></tr></table><center>";
echo "<div>";
	}
	else
	{
		echo "<script>window.alert('Enter a valid serial number')</script>";
		echo "<br><br><form action='view.php' method='post'><input type='submit' value='Go Back'></form>";
	}
	
	?>



</div>

<!-- W3.CSS Container -->
<div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px"><p class="w3-right"><a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-opacity"></a></p></div>

<script>
// Script to open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}


// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}
</script>

</body>
</html>
