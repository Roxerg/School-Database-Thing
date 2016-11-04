<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
input, label {display:block;}
label {font-weight: bold;}
</style>
</head>
<body>
</br>



<form>
<fieldset>
 <legend><b>Įrašyti vidurkius</b></legend>
 
<section>	



<p> Klasė:
<select name = "klase">
<?php
require_once('../mysqli_connect.php');

if (strcmp ($_COOKIE["klase"], "admin") == 0)
{
$getclasses = mysqli_query($dbc, "SELECT * FROM klases");
while ($row = mysqli_fetch_array($getclasses))
{
	?><option value = "<?php echo $row['klase']; ?>">
	<?php echo $row['klase'];  ?></option><?php
}}
else 
{ ?>
<option value = "<?php echo $_COOKIE["klase"]; ?>"><?php echo $_COOKIE["klase"]; ?></option>
<?php } 
?>
</p>
</select>
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
$getnames = mysqli_query($dbc, "SELECT mok_id, vardas, pavarde FROM mokiniai WHERE klase = '" . $_COOKIE["klase"]. "'"); 

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
<br>
<button onclick="goBack()">Grįžti</button>

<script>
function goBack() {
    window.history.back();
}
</script>

</body>
</html>