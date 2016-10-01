<html>
<head>
</head>
<body>

<?php

require_once('../mysqli_connect.php');
$response = @mysqli_query($dbc, "SELECT vidurkiai.*, mokiniai.vardas, mokiniai.pavarde FROM vidurkiai, mokiniai"); 

if($response)
{
	echo '<table align = "left" cellspacing = "5" cellpading = "8">
	<tr><td align = "left">
	<b>mok_id</b></td>
	<td align = "justify"><b>Vardas</b>
	<td align = "justify"><b>Pavarde</b></td>
	<td align = "justify"><b>1_uzs_k</b></td>
	<td align = "justify"><b>2_uzs_k</b></td>
	<td align = "justify"><b>Biologija</b></td>
	<td align = "justify"><b>Chemija</b></td>
	<td align = "justify"><b>Fizika</b></td>
	<td align = "justify"><b>Geografija</b></td>
	<td align = "justify"><b>Istorija</b></td>
	<td align = "justify"><b>IT</b></td>
	<td align = "justify"><b>Lietuviu k.</b></td>
	<td align = "justify"><b>Matematika</b></td>
	
	<td align = "justify"><b>Vidurkis</b></td>
	</td>
	</tr> ';
	
	 while ($row = mysqli_fetch_array($response))
	 {
		 echo '<tr><td align = "left">'.
		 $row['mok_id'] . '</td> <td align = "left">' .
		 $row['vardas']  .  '</td> <td align = "justify">' .
		 $row['pavarde'] .  '</td> <td align = "justify">' .
		 $row['1_uzs_k'] . '</td> <td align = "left">' .
		 $row['2_uzs_k'] . '</td> <td align = "left">' .
		 $row['Biologija'] . '</td> <td align = "left">' .
		 $row['Chemija'] . '</td> <td align = "left">' .
		 $row['Fizika'] . '</td> <td align = "left">' .
		 $row['Geografija'] . '</td> <td align = "left">' .
		 $row['Istorija'] . '</td> <td align = "left">' .
		 $row['IT'] . '</td> <td align = "left">' .
		 $row['Lietuviu_k'] . '</td> <td align = "left">' .
		 $row['Matematika'] . '</td> <td align = "left">' .
		 $row['Vidurkis'] . '</td> <td align = "left">'; 
		 
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

<form action = "http://localhost:1234/pridetimok.php">
<input type="submit" value = "Pridėti mokinį"/>
</form>

<form action = "http://localhost:1234/mokinfo.php">
<input type="submit" value = "Pilnas sąrašas"/>
</form>

<form action = "http://localhost:1234/pridetivid.php">
<input type="submit" value = "Įrašyti vidurkius"/>
</form>



</body>