<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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


<?php $klase = $_GET["klase"]; ?>

<button onclick="goBack()">Grįžti</button>

<script>
function goBack() {
    window.history.back();
}
</script>

</br>
</br>
<fieldset>
 <legend><b><?php echo $klase . " "; ?> Vidurkiai</b></legend>
<form action = "http://localhost:1234/pridetivid.php">
<input type = "submit" value = "Įrašyti vidurkius" style ="margin-right:20px";/>
</form>

<!-- <form action = "http://localhost:1234/pridetivid.php">
<input type="submit" value = "Įrašyti vidurkius" style = "margin-right:20px";/>
</form>

<form action = "http://localhost:1234/pridetimok.php">
<input type="submit" value = "Pridėti mokinį" style = "margin-right:20px";/>
</form>

<form action = "http://localhost:1234/mokinfo.php">
<input type="submit" value = "Pilnas sąrašas" />
</form> -->








<?php



require_once('../mysqli_connect.php');
$response = mysqli_query($dbc, "SELECT mokiniai.vardas, mokiniai.pavarde, vidurkiai.Lietuviu_k, 
vidurkiai.1_uzs_k, vidurkiai.2_uzs_k, vidurkiai.Istorija, vidurkiai.Geografija, vidurkiai.Matematika, 
vidurkiai.IT, vidurkiai.Biologija, vidurkiai.Chemija, vidurkiai.Fizika 
FROM mokiniai
JOIN vidurkiai ON mokiniai.mok_id = vidurkiai.mok_id WHERE mokiniai.klase ='" .$klase. "'"); 

// <td align = "left"><b>mok_id</b></td>
// <td align = "justify"><b>Vidurkis</b></td>
// $row['mok_id'] . '</td> <td align = "left">' .
// $row['Vidurkis'] . '</td> <td align = "left">';

if($response)
{
	echo '<table align = "left" cellspacing = "5" cellpading = "8">
	<tr>
	
	<td align = "justify"><b>Vardas</b>
	<td align = "justify"><b>Pavarde</b></td>
	<td align = "justify"><b>1-oji užsienio kalba</b></td>
	<td align = "justify"><b>2-oji užsienio kalba</b></td>
	<td align = "justify"><b>Biologija</b></td>
	<td align = "justify"><b>Chemija</b></td>
	<td align = "justify"><b>Fizika</b></td>
	<td align = "justify"><b>Geografija</b></td>
	<td align = "justify"><b>Istorija</b></td>
	<td align = "justify"><b>IT</b></td>
	<td align = "justify"><b>Lietuviu k.</b></td>
	<td align = "justify"><b>Matematika</b></td>
	
	
	</td>
	</tr> ';
	
	 while ($row = mysqli_fetch_array($response))
	 {
		 echo '<tr><td align = "left">'.
		 $row['vardas']  .  '</td> <td align = "center">' .
		 $row['pavarde'] .  '</td> <td align = "center">' .
		 $row['1_uzs_k'] . '</td> <td align = "center">' .
		 $row['2_uzs_k'] . '</td> <td align = "center">' .
		 $row['Biologija'] . '</td> <td align = "center">' .
		 $row['Chemija'] . '</td> <td align = "center">' .
		 $row['Fizika'] . '</td> <td align = "center">' .
		 $row['Geografija'] . '</td> <td align = "center">' .
		 $row['Istorija'] . '</td> <td align = "center">' .
		 $row['IT'] . '</td> <td align = "center">' .
		 $row['Lietuviu_k'] . '</td> <td align = "center">' .
		 $row['Matematika'] . '</td>' ;
		  
		 
		 echo '<tr>';
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