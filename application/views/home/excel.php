<?php
// We change the headers of the page so that the browser will know what sort of file is dealing with. Also, we will tell the browser it has to treat the file as an attachment which cannot be cached.
/*header("Content-Type: text/html; charset=UTF-8");*/
header("Content-Disposition: attachment; filename=report.xls");
header("Content-Type: application/vnd.ms-excel");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table border='1' align='center'>
    <caption>DOST-X Customers Schedule and Relevant Communication System</caption>
        <tbody style="padding : 10px; font-style: Centaur Gothic;">
          <tr>
            <th style="padding: 5px;">No.</th>
            <th style="padding: 5px;">Contact Person</th>
            <th style="padding: 5px;">Contact Number</th>
            <th style="padding: 5px;">Scheduled Date</th>
            <th style="padding: 5px;">Type of Sample</th>
            <th style="padding: 5px;">No. of Sample</th>
            <th style="padding: 5px;">Parameter / Test</th>
            <th style="padding: 5px;">Relevant Communication/Date</th>
          </tr>
    <?php $count =1; ?>
    <?php foreach ($report as $row): ?>
          <tr>
            <td style="padding: 5px;"><?php echo $count++; ?></a></td>
            <td style="padding: 5px;"><?php echo $row->customer_name; ?></a></td>
            <td style="padding: 5px;"><?php echo $row->contact_num; ?></a></td>
            <td style="padding: 5px;"><?php echo $row->sched_date; ?></a></td>
            <td style="padding: 5px;"><?php echo $row->sample_type; ?></a></td>
            <td style="padding: 5px;"><?php echo $row->sample_qty; ?></a></td>
            <td style="padding: 5px;"><?php echo $row->parameter; ?></a></td>
            <td style="padding: 5px;"><?php echo $row->type_communication. ' / '.$row->communication_date; ?></a></td>
          </tr>
    <?php endforeach; ?>
        </tbody>
</table>