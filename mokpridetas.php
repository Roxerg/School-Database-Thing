<html>
<head>
<title>Pridėti mokinį</title>
</head>
<body>
<fieldset>
 <legend><b> Pridėti naują mokinį</b></legend>
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
	
	if (empty($_POST['klase']))
	{
	   $data_missing[] = 'klase';
	}
	else 
	{
	   $klase = trim($_POST['klase']);
	}
	
	if (empty($_POST['1uzskalb']))
	{
	   $oneuzskalb = ' ';
	}
	else
	{
		$oneuzskalb = trim($_POST['1uzskalb']);
	}		
	
	if (empty($_POST['2uzskalb']))
	{
	   $twouzskalb = ' ';
	}
	else
	{
		$twouzskalb = trim($_POST['2uzskalb']);
	}		
	
	if (empty($_POST['etika']))
	{
	   $etika = ' ';
	}
	else
	{
		$etika = trim($_POST['etika']);
	}		
	
	if (empty($_POST['tikyba']))
	{
	   $tikyba = ' ';
	}
	else
	{
		$tikyba = trim($_POST['tikyba']);
	}		
	
	if(empty($data_missing))
	{
	   require_once('../mysqli_connect.php');
	   
	   $query = "INSERT INTO mokiniai
	   (vardas, pavarde, asmens_kodas, gimimo_data, adresas, klase, 1uzskalb, 2uzskalb, tikyba, etika) 
	   VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
	   $stmt = mysqli_prepare($dbc, $query);
	   
	   mysqli_stmt_bind_param($stmt, "ssssssssss", $vard, $pav, $asmkod, $gimdat,  $adresas, $klase, $oneuzskalb, $twouzskalb, $tikyba, $etika);
	   
	   mysqli_stmt_execute($stmt);
	   
	   
	   
	   $affected_rows = mysqli_stmt_affected_rows($stmt);
	   
	   if($affected_rows == 1)
	   {
	      echo 'mokinys įvestas';
		  #mysqli_stmt_close($stmt);
		  #mysqli_close($dbc);
	   }
	   else 
	   {
	      echo 'Įvyko klaida<br>';
		  echo mysqli_error();
		  #mysqli_stmt_close($stmt);
		  #mysqli_close($dbc);
		  
	   }
	}
	else
	{
		echo '<b>Įveskite trūkstamą informaciją:</b><br>';
		
		foreach($data_missing as $missing)
		{
			echo "* $missing<br>";
		}
	}

}

?>

 
<form action ="http://localhost:1234/mokpridetas.php" method = "post">

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

<p> Klasė:
<select name = "klase">
<?php
require_once('../mysqli_connect.php');
$getclasses = mysqli_query($dbc, "SELECT * FROM klases");

while ($row = mysqli_fetch_array($getclasses))
{
	?><option value = "<?php echo $row['klase']; ?>">
	<?php echo $row['klase'];  ?></option><?php
}  ?>
</p></select>


<p>1-oji užsienio kalba:
<input type="text" name="1uzskalb" size="30" value="" />
</p>

<p>2-oji užsienio kalba:
<input type="text" name="2uzskalb" size="30" value="" />
</p>

<p>Tikyba:
<input type="text" name="tikyba" size="30" value="" />
</p>

<p>Etika:
<input type="text" name="etika" size="30" value="" />
</p>

<p>
<input type="submit" name = "submit" value ="Pridėti" />
</p></form>




<form action = "http://localhost:1234/adminpage.php">
<input type="submit" value = "Grįžti"/>
</form>
</fieldset>
</body>
</html>