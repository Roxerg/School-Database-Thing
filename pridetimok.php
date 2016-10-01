<html>
<head>
<title>Pridėti mokinį</title>
</head>
<body>

<fieldset>
 <legend><b> Pridėti naują mokinį</b></legend>
<form action ="http://localhost:1234/mokpridetas.php" method = "post">

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
</p></select>

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




<button onclick="goBack()">Grįžti</button>

<script>
function goBack() {
    window.history.back();
}
</script>
</fieldset>

</body>
</html>