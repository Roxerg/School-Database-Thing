<html>
<head>
<title>Pridėti mokinį</title>
</head>
<body>

<?php

if (isset($_POST['submit']))
{
    $data_missing = array();
	if (empty($_POST['vardas']))
	{
	   $data_missing[] = 'Vardas';
	}
	else 
	{
	   $vard = trim($_POST['vardas']);
	}
	if (empty($_POST['pavarde']))
	{
	   $data_missing[] = 'Pavardė';
	}
	else 
	{
	   $pav = trim($_POST['pavarde']);
	}
	if (empty($_POST['gimimo_data']))
	{
	   $data_missing[] = 'Gimimo Data';
	}
	else 
	{
	   $gimdat = trim($_POST['gimimo_data']);
	}
	if (empty($_POST['asmens_kodas']))
	{
	   $data_missing[] = 'Asmens Kodas';
	}
	else 
	{
	   $asmkod = trim($_POST['asmens_kodas']);
	}
	if (empty($_POST['adresas']))
	{
	   $data_missing[] = 'Adresas';
	}
	else 
	{
	   $adresas = trim($_POST['adresas']);
	}
	
	if(empty($data_missing))
	{
	   require_once('../mysqli_connect.php');
	   
	   $query = "INSERT INTO mokinys (vardas, pavarde, asmens_kodas, gimimo_data, adresas) VALUES (?, ?, ?, ?, ?)";
	   $stmt = mysqli_prepare($dbc, $query);
	   
	   mysqli_stmt_bind_param($stmt, "sssss", $vard, $pav, $asmkod, $gimdat,  $adresas);
	   
	   mysqli_stmt_execute($stmt);
	   
	   $affected_rows = mysqli_stmt_affected_rows($stmt);
	   
	   if($affected_rows == 1)
	   {
	      echo 'Mokinys įvestas';
		  mysqli_stmt_close($stmt);
		  mysqli_close($dbc);
	   }
	   else 
	   {
	      echo 'Įvyko klaida<br>';
		  echo mysqli_error();
		  mysqli_stmt_close($stmt);
		  mysqli_close($dbc);
		  
	   }
	}
	else
	{
		echo 'Įveskite trūkstamą informaciją:<br>';
		
		foreach($data_missing as $missing)
		{
			echo "$missing<br>";
		}
	}

}

?>

<form action ="http://localhost:1234/mokpridetas.php" method = "post">
<b> Pridėti naują mokinį</b>

<p>Vardas:
<input type="text" name="vardas" size="30" value="" />
</p>

<p>Pavardė:
<input type="text" name="pavarde" size="30" value="" />
</p>

<p>Asmens kodas:
<input type="text" name="asmens_kodas" size="30" value="" />
</p>

<p>Gimimo data:
<input type="date" name="gimimo_data" size="30" value="" />
</p>

<p>Adresas:
<input type="text" name="adresas" size="30" value="" />
</p>

<p>
<input type="submit" name = "submit" value ="Pridėti" />
</p></form>

<form action = "http://localhost:1234/mokinfo.php">
<input type="submit" value = "Pilnas sąrašas"/>
</form>
</body>
</html>