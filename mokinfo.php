<html>
<head>
<style>
div#frm *{display:inline}
</style>
</head>
<body>
</br>


<fieldset>
 <legend>Mokinių sąrašas</legend>

<div id="frm">
<form action = "http://localhost:1234/pridetimok.php">
<input type="submit" value = "Pridėti mokinį" style = "margin-right:20px";/>
</form>

<form action = "<!-- make site -->">
<input type="submit" value = "Keisti mokinio duomenis" style = "margin-right:20px";/>
</form>

<form action = "http://localhost:1234/mokvidurkiai_1.php">
<input type="submit" value = "Vidurkiai" style = "margin-right:20px";/>
</form>




</div>

<form>
<?php

require_once('../mysqli_connect.php');

$query = "SELECT vardas, pavarde, asmens_kodas, gimimo_data, adresas, klase, 1uzskalb, 2uzskalb, tikyba, etika FROM mokiniai ORDER BY pavarde ASC";
// TODO: add ability to ORDER BY X with buttons or some shit 

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
	<td align = "justify"><b>1-oji užsienio kalba</b></td></td>
	<td align = "justify"><b>2-oji užsienio kalba</b></td></td>
	<td align = "justify"><b>Tikyba</b></td></td>
	<td align = "justify"><b>Etika</b></td></td>
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
		 $row['etika'] . '</td><td align = "left">'; 
		 
		 echo '<tr>';
	 }
	 
	 echo '<table>';
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