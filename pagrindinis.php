<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
#centeredbox {
	position: absolute;
	z-index: 15;
	top: 40%;
	left: 50%;
	margin: -100px 0 0 -150px;
	box-shadow: 3px 3px 9px;
	background: linear-gradient(#E3E3E3,#6C6C6C);

}
label {display: block;}
div {
	padding: 40px;
	border: 5px solid grey;
}
body 
{
	background: linear-gradient(to bottom right, #E3E3E3,#6C6C6C);
}
</style>
</head>


<body>
<form action = "http://localhost:1234/pagrindinislogin.php?" method = "post">

<!-- 



tai tu pries irasydamas i duomenu baze turi uzkosuoti
ir saugoti uzkoduota passworda
aisku DEBUG gali issisaugoti ir koduota ir nekoduota
du papildomus clumnus susikures pvz pass ir pass_encoded

Darius Gudavicius
 -->

 
 


<div id="centeredbox">

<center><h3><b style="color:black; text-shadow: 1px 1px 2px grey;">Mokinių duomenų bazė</b></h3>
</br>
<p><label><b>Vartotojo vardas:</b></label>
<input type = "text" name = "Name" size="30" value = "" style="width: 170px; left: 50%;"/> 
</p>



<p><label><b>Slaptažodis:</b></label>
<input type = "password" name = "Password" size="30" value = "" style="width: 170px; left: 50%;"/> 
</p>

<p>
<input type = "submit" name = "prisijungti" size="30" value = "Prisijungti" style = "margin-left:8px";/> 
</p>
</form>
</center>
</div>



</body>
</html>