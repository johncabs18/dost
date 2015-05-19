<?php

try{
    $conn = new PDO('mysql:host=localhost;dbname=dost','root','');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM customer
            INNER JOIN schedules ON schedules.cust_id = customer.cust_id";
    $res = $conn->query($sql);
    $count = 1;
        echo '<table class="ui black basic celled table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th class="center aligned">No.</th>';
        echo '<th class="center aligned">Customer Name</th>';
        echo '<th class="center aligned">Laboratory</th>';
        echo '<th class="center aligned">Status</th>';
        echo '<th class="center aligned">Action</th>';
        echo '</tr>';
        echo '</thead>';

        echo '<tbody>';
foreach ($res as $key => $value) {
        echo '<tr>';
        echo '<td class="center aligned">'. $count++ . '</td>';
        echo '<td class="center aligned">'. $value['customer_name'] . '</td>';
        if($value['laboratory'] != ''){
            echo '<td class="center aligned">'.$value['laboratory'].'</td>';
        }else{
            echo '<td class="center aligned">'.'---'.'</td>';
        }
        echo '<td class="center aligned">'. $value['status'] . '</td>';
        //echo '<td>'. $value['lab_name'] . '</td>';
        echo '<td class="center aligned"><a class="ui blue labeled icon button" title="Edit" href="http://localhost/dost/main/update/'.$value['sched_id'].'"><i class="chevron right icon"></i>View More Details ...</a></td>';
        echo '</tr>';
    }
        echo '</tbody>';
        echo '</table>';


}
catch(PDOException $e){
    echo $sql . "<br/>" . $e->getMessage();
}