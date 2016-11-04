<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
input, label {display:block;}
label {font-weight: bold;}
</style>
</head>
<body>

<form>
<fieldset>
 <legend><b>Įrašyti vidurkius</b></legend>
 <!-- 1_uzs_k, 2_uzs_k, Istorija, Geografija, Matematika, IT, Biologija, Chemija, Fizika -->
<?php

      
	   
	  $lietk = trim ($_POST['Lietuviu_k']);
	  $vienuzs = trim ($_POST['1_uzs_k']);
	  $duuzs = trim ($_POST['2_uzs_k']);
	  $istor = trim ($_POST['Istorija']);
	  $geo = trim ($_POST['Geografija']);
	  $mat = trim ($_POST['Matematika']);
	  $IT = trim ($_POST['IT']);
	  $Bio = trim ($_POST['Biologija']);
	  $Chem = trim ($_POST['Chemija']);
	  $Fiz = trim ($_POST['Fizika']);
	  $mok_id = trim ($_POST['mok_id']);
	  
	  
	  
	  require_once('../mysqli_connect.php');
	  
	  
	  $checkquery = "SELECT mok_id FROM vidurkiai WHERE mok_id = ";
	  $checkquery .= $mok_id;
	  $response = @mysqli_query($dbc, $checkquery);
	  $row = mysqli_fetch_array($response);
	  
	  
	  $isempty = empty($row);

       if($isempty)
	   {
       $query = "INSERT INTO vidurkiai (Lietuviu_k, 1_uzs_k, 2_uzs_k, Istorija, Geografija, Matematika, IT, Biologija, Chemija, Fizika, mok_id) 
	   VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
	   }
	   else 
	   {
	    $query = "UPDATE vidurkiai 
	   SET Lietuviu_k = ?, 1_uzs_k = ?, 2_uzs_k = ?, Istorija = ?, Geografija = ?, Matematika = ? ,
	   IT = ?, Biologija = ?, Chemija = ?, Fizika = ?
	   WHERE mok_id = ?";
	   } 
	   $stmt = mysqli_prepare($dbc, $query);
	   
	   #$stmt = $dbc->prepare($query);
	   #$stmt->bind_param($stmt, 'iiiiiiiiiii', $lietk, $vienuzs, $duuzs, $istor,  $geo, $mat, $IT, $Bio, $Chem, $Fiz, $mok_id);
	   
	   mysqli_stmt_bind_param($stmt, "iiiiiiiiiii", $lietk, $vienuzs, $duuzs, $istor,  $geo, $mat, $IT, $Bio, $Chem, $Fiz, $mok_id);
	   #$stmt->execute();
	   mysqli_stmt_execute($stmt);

	   $affected_rows = mysqli_stmt_affected_rows($stmt);
	   
	   
	   
	   if($affected_rows == 1)
	   {
	      echo 'vidurkiai įvesti';
		  #mysqli_stmt_close($stmt);
	      #mysqli_close($dbc);
	   }
	    else 
	   {
	      echo 'Įvyko klaida<br>';
		  echo mysqli_error($dbc);
		  #mysqli_stmt_close($stmt);
		  #mysqli_close($dbc);
		  
	   }
?>

</br>




 
<section>	


<p> Klasė:
<select name = "klase">
<option value = "0">Visos</option>
<?php
require_once('../mysqli_connect.php');
$getclasses = mysqli_query($dbc, "SELECT * FROM klases");

while ($row = mysqli_fetch_array($getclasses))
{
	?><option value = "<?php echo $row['klase']; ?>">
	<?php echo $row['klase'];  ?></option><?php
}  ?>
</p></select>
</form>


<form action ="http://localhost:1234/vidpridetas.php" method = "post">

<!-- add php/javascript/idk to grab all classes when database is made 
       then you will need to fetch only those students that are
	   in a specific class....
	   
	                                                     good luck :) 
                                                                                  -->
																				  
																				  






																				 

																		 
<div style="float:left; margin-right:20px;">
<label>Mokinys:</label>

<select name = "mok_id">
<option value="" >Pasirinkti mokinį</option>
<?php 
require_once('../mysqli_connect.php');
$getnames = mysqli_query($dbc, "SELECT mok_id, vardas, pavarde FROM mokiniai"); 

while ($row = mysqli_fetch_array($getnames))
{ 
  
    ?><option value = "<?php echo $row['mok_id']; ?>">   
	<?php echo $row['mok_id'] . ' ' .$row['vardas'] . ' '. $row['pavarde'];  
	?></option>;	<?php
}
?>
</option> 
</div>
</select>


</section>

<section>	


<div style="float:left; margin-right:20px;">
<label>Lietuvių kalba</label>
<select name = "Lietuviu_k">
<option value ="" >
<?php
for ($paz=1; $paz<=10; $paz++)
{ 
?>
	<option value ="<?php echo $paz; ?>"> <?php echo $paz; ?> </option>
<?php
}	
?>
</select> 
</div>





<div style="float:left; margin-right:20px;">
<label>1 Užsienio k.</label>

<select name = "1_uzs_k">
<option value ="" >
<?php
for ($paz=1; $paz<=10; $paz++)
{ 
?>
	<option value ="<?php echo $paz; ?>"> <?php echo $paz; ?> </option>
<?php
}	
?>
</select> 

</div>



<div style="float:left; margin-right:20px;">
<label>2 Užsienio k.</label>

<select name = "2_uzs_k">
<option value ="" >
<?php
for ($paz=1; $paz<=10; $paz++)
{ 
?>
	<option value ="<?php echo $paz; ?>"> <?php echo $paz; ?> </option>
<?php
}	
?>
</select> 

</div>



<div style="float:left; margin-right:20px;">
<label>Istorija</label>

<select name = "Istorija">
<option value ="" >
<?php
for ($paz=1; $paz<=10; $paz++)
{ 
?>
	<option value ="<?php echo $paz; ?>"> <?php echo $paz; ?> </option>
<?php
}	
?>
</select> 

</div>



<div style="float:left; margin-right:20px;">
<label>Geografija</label>

<select name = "Geografija">
<option value ="" >
<?php
for ($paz=1; $paz<=10; $paz++)
{ 
?>
	<option value ="<?php echo $paz; ?>"> <?php echo $paz; ?> </option>
<?php
}	
?>
</select> 

</div>



<div style="float:left; margin-right:20px;">
<label>Matematika</label>

<select name = "Matematika">
<option value ="" n>
<?php
for ($paz=1; $paz<=10; $paz++)
{ 
?>
	<option value ="<?php echo $paz; ?>"> <?php echo $paz; ?> </option>
<?php
}	
?>
</select> 

</div>



<div style="float:left; margin-right:20px;">
<label>IT</label>

<select name = "IT">
<option value ="" >
<?php
for ($paz=1; $paz<=10; $paz++)
{ 
?>
	<option value ="<?php echo $paz; ?>"> <?php echo $paz; ?> </option>
<?php
}	
?>
</select> 

</div>



<div style="float:left; margin-right:20px;">
<label>Biologija</label>

<select name = "Biologija">
<option value ="" >
<?php
for ($paz=1; $paz<=10; $paz++)
{ 
?>
	<option value ="<?php echo $paz; ?>"> <?php echo $paz; ?> </option>
<?php
}	
?>
</select> 

</div>



<div style="float:left; margin-right:20px;">
<label>Chemija</label>

<select name = "Chemija">
<option value ="" >
<?php
for ($paz=1; $paz<=10; $paz++)
{ 
?>
	<option value ="<?php echo $paz; ?>"> <?php echo $paz; ?> </option>
<?php
}	
?>
</select> 

</div>



<div style="float:left; margin-right:20px;">
<label>Fizika</label>

<select name = "Fizika">
<option value ="" >
<?php
for ($paz=1; $paz<=10; $paz++)
{ 
?>
	<option value ="<?php echo $paz; ?>"> <?php echo $paz; ?> </option>
<?php
}	
?>
</select> 

</div>
</section>



<br><br>
<p>
<input type="submit" name = "submit" value ="Pridėti" />
</form>

<p>
<form action = "http://localhost:1234/mokinfo.php">
<input type="submit" value = "Pilnas sąrašas"/>
</form>
<p>
<form action = "http://localhost:1234/mokvidurkiai_1.php">
<input type="submit" value = "Vidurkiai"/>
</form>
</p>
</fieldset>
</form>

</body>
</html>