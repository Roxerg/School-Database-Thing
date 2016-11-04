<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
#centeredbox {
	position: absolute;
	z-index: 15;
	top: 40%;
	left: 50%;
	background: #D0C9CC;
	margin: -100px 0 0 -150px;
	box-shadow: 3px 3px 9px;
	background: linear-gradient(#E3E3E3,#6C6C6C);

}
label {display: block;}
div {
	padding: 40px;
	border: 5px solid grey;
}
</style>
</head>
<body>
<form action = "" method = "post">

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


</div>

<?php

require_once('../mysqli_connect.php');

$checkname = "SELECT Name, Pass_Hash, klase FROM logininfo where Name = '" . addslashes($_POST['Name']) . "' and Pass_Hash = '". md5(addslashes($_POST['Password'])) . "'";
$getpass = mysqli_query ($dbc, $checkname);


//while 
$row = mysqli_fetch_array($getpass, MYSQL_ASSOC);
//{
	if (strcmp ($row['Name'], $_POST['Name']) == 0 && strcmp ($row['Pass_Hash'], md5(addslashes($_POST['Password']))) == 0 )
	{
		if (strcmp ($row['klase'], "admin") == 0)
		{
		header('Location: adminpage.php');
		}
		else
		{
		setcookie ("klase", $row['klase'], time()+(3600), "/");
		header('Location:mokpage.php');
		}
	}
	else
	{
		echo "you don goofed";
		
	}
//}

//$whatever = mysqli_fetch_array($getpass);
?>

</body>
</html>