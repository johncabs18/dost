<?php


try{
	$conn = new PDO('mysql:host=localhost;dbname=dost','root','');
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$name = $_GET['contactname'];

            $sql = "SELECT * FROM customer WHERE customer_name LIKE '%$name%' 
                /*ORDER BY customer.cust_id DESC*/ ";

            $res = $conn->query($sql);
            foreach ($res as $key => $value) {
                echo $value['contact_num'];
            }

}
catch(PDOException $e){
	echo $sql . "<br/>" . $e->getMessage();
}