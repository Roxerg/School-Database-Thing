<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
#centeredbox {
	position: absolute;
	z-index: 15;
	top: 45%;
	left: 50%;
	margin: -100px 0 0 -150px;
	padding: 40px;
	border: 5px solid #19A432;
	background: linear-gradient(#D8F5D1,#065815);
	box-shadow: 3px 3px 9px;

}
table, th, td {
	border: 2px solid #19A432;
	border-collapse: collapse;
	padding: 7px;
}
body {
	background: linear-gradient(to bottom right, #D8F5D1,#065815);
}
</style>
</head>
<body>
<form action = "http://localhost:1234/pagrindinis.php" method = "post">
<input type = "submit" value = "Atsijungti" />
</form>



<?php $klase = $_COOKIE["klase"]; 
require_once('../mysqli_connect.php');
$query = "SELECT User FROM logininfo WHERE klase ='" .$klase. "'";

$getname = mysqli_query($dbc, $query);
$name = mysqli_fetch_array($getname);




 ?>
<div id = "centeredbox">

<center>
<table>
<th><?php echo $name["User"]; ?></th>
<th><?php echo $_COOKIE["klase"]; ?></th>
 
 </table> </center>
</br>

<form action = "http://localhost:1234/mokinfo.php?klase=<?php echo $klase; ?>" method = "post">
<input style = "width:150px;"  type = "submit" value = "Klasės sąrašas" style = "margin-right:20px";/>
</form>

<form action = "http://localhost:1234/mokvidurkiai_1.php">
<input style = "width:150px;" type="submit" value = "Klasės vidurkiai" style = "margin-right:20px";/>
</form>

<form action = "http://localhost:1234/pridetimok.php">
<input style = "width:150px;" type="submit" value = "Pridėti mokinį" style = "margin-right:20px";/>
</form>

<form action = "http://localhost:1234/pridetivid.php">
<input style = "width:150px;" type="submit" value = "Pridėti vidurkį" style = "margin-right:20px";/>
</form>




</div>



</body>
</html>