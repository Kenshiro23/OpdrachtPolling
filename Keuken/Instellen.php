<link rel="stylesheet" href="style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
    echo '
    		    <form action="Instellen.php" method="get">
			    <h1> Opdracht Polling </h1>
			    Ideale Temperatuur:
			    <br>
			    <input type="text" name="idealeTemp" id="">
			    <br>Licht:
			    <br>
			    <label class="switch" for="checkbox">
				<input type="checkbox" name="lichtState" value="" id="checkbox">
				<div class="slider round"></div>
			    </label>
				<br>
				<div class="box">
				<select name="plaats">
				<option value="" selected>Welke kamer?</option>
				<option value="Keuken">Keuken</option>
				<option value="Woonplaats">Woonplaats</option>
				<option value="Hal">Hal</option>
				<option value="Slaapkamer 1">Slaapkamer 1</option>
				<option value="Slaapkamer 2">Slaapkamer 2</option>
				<option value="Garage">Garage</option>
				</select>
			    </div>
			    <br><button type="submit">Sturen</button>
			</form>
                
    ';

    $link = mysqli_connect("localhost","faka","Tijger","lm35");
    if($link){
    }else{
        echo "Verbinding mislukt:";
        echo mysqli_connect_error();
    }

    if (isset($_GET['idealeTemp'])){
        $idealeTemp = $_GET['idealeTemp'];
        if (isset($_GET['lichtState'])){
            $lichtState = "Aan";
        }else{
            $lichtState = "Uit";
        }
        if (isset($_GET['plaats'])){
            $plaats = $_GET['plaats'];
            $query = 'UPDATE `lm35data` SET `IdealeTemperatuur`="'.$idealeTemp.'",`LichtState`="'.$lichtState.'" WHERE `Plaats` = "'.$plaats.'"';
	
            if(mysqli_query($link, $query)){
                
            }else{
                echo "Fout bij het toevoegen:".mysqli_error($link);
            }
        }else{
        }

        
    }
?>
