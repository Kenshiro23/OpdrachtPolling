
<head><meta http-equiv="refresh" content="1" > </head>
<?php


$link = mysqli_connect("localhost","faka","Tijger","lm35");
if($link){
}
else{
echo "Verbinding mislukt:";
echo mysqli_connect_error();
}



if (isset($_GET['T']) and isset($_GET['V']) and isset($_GET['L']) and $plaats = $_GET['P']){
    $temp = $_GET['T'];
	$verwarming1 = $_GET['V'];
	$lamp = $_GET['L'];
	
	if ($verwarming1 == 1){
		$vw = "Aan";
	}elseif($verwarming1 == 0){
		$vw = "Uit";
	}
	
	if ($lamp == 1){
		$lm = "Aan";
	}elseif($lamp == 0){
		$lm = "Uit";
	}


	
	
	$strtemp = strval($temp);

	$query = 'UPDATE `lm35data` SET `Temperatuur`="'.$strtemp.'",`Verwarming`="'.$vw.'",`Lamp`="'.$lm.'" WHERE `Plaats` = "'.$plaats.'"';

	
	if(mysqli_query($link, $query)){
		
	}else{
		echo "Fout bij het toevoegen:".mysqli_error($link);
	}
	$query2 = 'SELECT `IdealeTemperatuur`, `LichtState` FROM `lm35data` WHERE `Plaats` = "'.$plaats.'"';
	$result2 = mysqli_query($link, $query2);
    $row2 = mysqli_fetch_assoc($result2);
	echo "x";
    echo $row2['IdealeTemperatuur'];
	echo "+";
    echo $row2['LichtState'];

	if(mysqli_query($link, $query2)){
	}else{
		echo "Fout bij het toevoegen:".mysqli_error($link);
	}
}else{
}


?>
