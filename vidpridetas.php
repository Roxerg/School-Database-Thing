<html>
<head>
</head>
<body>
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
	      echo 'mokinys įvestas';
		  mysqli_stmt_close($stmt);
	      mysqli_close($dbc);
	   }
	    else 
	   {
	      echo 'Įvyko klaida<br>';
		  echo mysqli_error($dbc);
		  mysqli_stmt_close($stmt);
		  mysqli_close($dbc);
		  
	   }
?>

<form action = "http://localhost:1234/mokinfo.php">
<input type="submit" value = "Pilnas sąrašas"/>
</form>

</body>
</html>