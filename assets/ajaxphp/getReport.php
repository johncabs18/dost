<?php

try{
    $conn = new PDO('mysql:host=localhost;dbname=dost','root','');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM customer
            INNER JOIN schedules ON schedules.cust_id = customer.cust_id";
    $res = $conn->query($sql);
    $count = 1;
        echo '<table class="ui blue celled structured table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th rowspan="2">No.</th>';
        echo '<th rowspan="2">Contact Person</th>';
        echo '<th rowspan="2">Contact Number</th>';
        echo '<th rowspan="2">Scheduled Date</th>';
        echo '<th rowspan="2">Type of Sample</th>';
        echo '<th rowspan="2">No. of Sample</th>';
        echo '<th rowspan="2">Parameter / Test</th>';
        echo '<th rowspan="2">Relevant Communication/Date</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
foreach ($res as $key => $value) {
        echo '<tr>';
        echo '<td style="padding: 5px;">'. $count++ .'</a></td>';
        echo '<td style="padding: 5px;">'.$value['customer_name'].'</a></td>';
        echo '<td style="padding: 5px;">'.$value['contact_num'].'</a></td>';
        echo '<td style="padding: 5px;">'.$value['sched_date'].'</a></td>';
        echo '<td style="padding: 5px;">'.$value['sample_type'].'</a></td>';
        echo '<td style="padding: 5px;">'.$value['sample_qty'].'</a></td>';
        echo '<td style="padding: 5px;">'.$value['parameter'].'</a></td>';
        echo '<td style="padding: 5px;">'.$value['type_communication']. ' / '.$value['communication_date'].'</a></td>';
        echo '</tr>';
    }
        echo '</tbody>';
        echo '</table>';


}
catch(PDOException $e){
    echo $sql . "<br/>" . $e->getMessage();
}