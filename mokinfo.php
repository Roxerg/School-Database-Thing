<html>
<head>
</head>
<body>

<?php

require_once('../mysqli_connect.php');

$query = "SELECT vardas, pavarde, asmens_kodas, gimimo_data, adresas FROM mokinys";


$response = @mysqli_query($dbc, $query);

if($response)
{
	echo '<table align = "left" cellspacing = "5" cellpading = "8">
	<tr><td align = "left"><b>Vardas</b>
	<td align = "justify"><b>Pavardė</b></td>
	<td align = "justify"><b>Asmens kodas</b></td>
	<td align = "justify"><b>Gimimo data</b></td>
	<td align = "justify"><b>Adresas</b></td></td>
	</tr> ';
	
	 while ($row = mysqli_fetch_array($response))
	 {
		 echo '<tr><td align = "left">'.
		 $row['vardas']  .  '</td> <td align = "justify">' .
		 $row['pavarde'] .  '</td> <td align = "justify">' .
		 $row['asmens_kodas'] . '</td> <td align = "left">' .
		 $row['gimimo_data'] . '</td> <td align = "left">' .
		 $row['adresas'] . '</td><td align = "left">'; 
		 
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

</body>
</html>