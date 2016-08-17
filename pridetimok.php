<html>
<head>
<title>Pridėti mokinį</title>
</head>
<body>

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