<head><meta http-equiv="refresh" content="1" > </head>
<link rel="stylesheet" href="style2.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php


    $link = mysqli_connect("localhost","faka","Tijger","lm35");
    if($link){
    }
    else{
    echo "Verbinding mislukt:";
    echo mysqli_connect_error();
    }

	

    $query = "SELECT * FROM `lm35data` WHERE 1";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);
    if($row['Plaats'] == "Keuken"){
        echo "Keuken: <br>";
        echo "Temperatuur:". $row['Temperatuur'] ."<br>";
        echo "Licht:". $row['Lamp']."<br>";
    }
    while($row = mysqli_fetch_assoc($result)) 
    
        { 
            
            if($row['Plaats'] == "Woonplaats"){
                echo "<br>Woonplaats: <br>";
                echo "Temperatuur:". $row['Temperatuur'] ."<br>";
                echo "Licht:". $row['Lamp']."<br>";
            }
            if($row['Plaats'] == "Hal"){
                echo "<br>Hal: <br>";
                echo "Temperatuur:". $row['Temperatuur'] ."<br>";
                echo "Licht:". $row['Lamp']."<br>";
            }
            if($row['Plaats'] == "Slaapkamer 1"){
                echo "<br>Slaapkamer 1: <br>";
                echo "Temperatuur:". $row['Temperatuur'] ."<br>";
                echo "Licht:". $row['Lamp']."<br>";
            }
            if($row['Plaats'] == "Slaapkamer 2"){
                echo "<br>Slaapkamer 2: <br>";
                echo "Temperatuur:". $row['Temperatuur'] ."<br>";
                echo "Licht:". $row['Lamp']."<br>";
            }
            if($row['Plaats'] == "Garage"){
                echo "<br>Garage: <br>";
                echo "Temperatuur:". $row['Temperatuur'] ."<br>";
                echo "Licht:". $row['Lamp']."<br>";
            }
            if(mysqli_query($link, $query)){
            }else{
                echo "Fout bij het toevoegen:".mysqli_error($link);
            }
        } 
    

?>
