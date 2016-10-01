<html>
<head>
<style>
#centeredbox {
	position: absolute;
	z-index: 15;
	top: 50%;
	left: 50%;
	margin: -100px 0 0 -150px;
	padding: 40px;
	border: 5px solid #582849;
	background: linear-gradient(#E7D5E1,#56364C);
	box-shadow: 3px 3px 9px;

}
#inline {display:inline-block;}
label {display: block;}
body {
	background: linear-gradient(to bottom right, #E7D5E1,#56364C);
}
</style>
</head>
<body>
<form action = "http://localhost:1234/pagrindinis.php" method = "post">
<input type = "submit" value = "Atsijungti" />
</form>


<div id = "centeredbox" >

<table>
<tr>
<td>
<b>Klasės sąrašas:</b>
</td>
<td>
<span>
<?php 

require_once('../mysqli_connect.php');
$getclass = mysqli_query($dbc, "SELECT * FROM klases ORDER BY klase ASC");

while($row=mysqli_fetch_array($getclass))
{?>
<form style = "display:inline;" action = "http://localhost:1234/mokinfo.php?klase=<?php echo $row['klase']; ?>" method = "post">
<input style = "width:47px;" type = "submit" value = "<?php echo $row['klase']; ?>" />
</form>
<?php
}?>
</span>
</td>
</tr>


<tr>
<td>
<b>Vidurkiai:</b>
</td>
<td>
<span>
<?php 
require_once('../mysqli_connect.php');
$getclass = mysqli_query($dbc, "SELECT * FROM klases ORDER BY klase ASC");

while($row=mysqli_fetch_array($getclass))
{?>
<form style = "display:inline;" action = "http://localhost:1234/mokvidurkiai_1.php?klase=<?php echo $row['klase']; ?>" method = "post">
<input style = "width:47px;" type = "submit" value = "<?php echo $row['klase']; ?>" />
</form>
<?php
}?>
</span>
</td>
</tr>

</table>

</div>
</body>
</html>








