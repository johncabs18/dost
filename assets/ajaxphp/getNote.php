<?php


try{
	$conn = new PDO('mysql:host=localhost;dbname=dost','root','');
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $date1 = $_GET['datepckr'];
    $labtype = $_GET['labtype1'];

            $sql = "SELECT * FROM note
                    WHERE date_note = '$date1'  AND type_lab = '$labtype' ";

            $res = $conn->query($sql);

    foreach ($res as $key => $value) {
        echo '<div class="ui negative message">';
        echo '<div class="header">';
        echo $value['note'];
        echo '</div>';
        echo '</div>';   
        
    }
            

}
catch(PDOException $e){
	echo $sql . "<br/>" . $e->getMessage();
}