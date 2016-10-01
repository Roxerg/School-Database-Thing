<html>
<head>
<style>
div#frm *{display:inline}
table, th, td {
	border: 1px solid black;
	border-collapse: collapse;
	padding: 7px;
}
body 
{
	background: linear-gradient(to bottom right, #E3E3E3,#6C6C6C);
}
</style>
</head>
<body>
</br>
<?php 


$klase = setcookie ("klase", $_GET["klase"], time()+(600), "/");


if (empty($_POST['orderby']))
{$orderby = "pavarde";}
else 
$orderby = $_POST['orderby'];	?>


<button onclick="goBack()">Grįžti</button>

<script>
function goBack() {
    window.history.back();
}
</script>

</br></br>

<fieldset>

 <legend><b><?php echo $_GET["klase"]. " "; ?> Mokinių sąrašas</b></legend>

<div id="frm">

<form action = "http://localhost:1234/pridetimok.php">
<input type="submit" value = "Pridėti mokinį" style = "margin-right:20px";/>
</form>

<!-- <form action = "http://localhost:1234/mokvidurkiai_1.php?klase=<?php // echo $_GET["klase"];?>">
<input type="submit" value = "Vidurkiai" style = "margin-right:20px";/>
</form> -->

<b>Rūšiuoti pagal:</b>
<form action ="http://localhost:1234/mokinfo.php?klase=<?php echo $_GET["klase"]; ?>&orderby=<?php echo $_POST['orderby']; ?>" method="post">
<select name = "orderby">
<option value = "vardas">Vardą</option>
<option value ="pavarde">Pavardę</option>
<option value ="gimimo_data">Gimimo datą</option>
<input type="submit" value = "Rūšiuoti" style = "margin-right:20px";/>
</select>
</form>




<br><br>






</div>

<form>
<?php
require_once('../mysqli_connect.php');


$query = "SELECT vardas, pavarde, asmens_kodas, gimimo_data, adresas, klase, 1uzskalb, 2uzskalb, tikyba, etika FROM mokiniai WHERE klase = '".$_GET["klase"]."' ORDER BY ".$orderby." ASC";
// TODO: add ability to ORDER BY X with buttons or some shit 
//$class = trim($_POST['klase']);
//$stmt = mysqli_prepare($dbc, $query);
//mysqli_stmt_bind_param($stmt, "s", $class);


$response = @mysqli_query($dbc, $query);

if($response)
{
	echo '<table align = "left" cellspacing = "5" cellpading = "8">
	<tr><td align = "left"><b>Klasė</b>
	<td align = "justify"><b>Vardas</b></td>
	<td align = "justify"><b>Pavardė</b></td>
	<td align = "justify"><b>Asmens kodas</b></td>
	<td align = "justify"><b>Gimimo data</b></td>
	<td align = "justify"><b>Adresas</b></td></td>
	<td align = "justify"><b>1-oji užsienio kalba</b></td>
	<td align = "justify"><b>2-oji užsienio kalba</b></td>
	<td align = "justify"><b>Tikyba</b></td>
	<td align = "justify"><b>Etika</b></td>
	</tr> ';
	
	 while ($row = mysqli_fetch_array($response))
	 {
		 echo '<tr><td align = "left">'.
		 $row['klase']  .  '</td> <td align = "justify">' .
		 $row['vardas']  .  '</td> <td align = "justify">' .
		 $row['pavarde'] .  '</td> <td align = "justify">' .
		 $row['asmens_kodas'] . '</td> <td align = "left">' .
		 $row['gimimo_data'] . '</td> <td align = "left">' .
		 $row['adresas'] . '</td><td align = "left">'.
		 $row['1uzskalb'] . '</td><td align = "left">'.
		 $row['2uzskalb'] . '</td><td align = "left">'.
		 $row['tikyba'] . '</td><td align = "left">'.
		 $row['etika'] . '</td></tr>' ;
		 
		 
	 }
	 
	 echo '</table>';
}
else 
{
	echo "Nerasta duomenų bazė<br>";
	echo mysqli_error($dbc);
}

mysqli_close($dbc);


?>



</fieldset>
</form>

</body>
</html>