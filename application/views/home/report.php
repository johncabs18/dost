<div class="ui fixed black inverted menu">
     <img src="<?php echo base_url('assets/images/top.jpg');?>">
  <div class="right menu">
      <div class="ui dropdown item">
        <i class="setting icon"></i><i class="dropdown icon"></i>
        <div class="menu">
          <a class="item" href="<?php echo base_url('main/logout');?>"><i class="sign out icon"></i> Logout</a>
        </div>
      </div>
    </div>
  <div class="right menu">
    <div class="item">
      <?php
      $n = explode(' ',$name);
      $name1 = $n[0];
      ?>
      Hello <?php echo $name1;
      $count =1; ?> !
    </div>
    <div class="item">
      <a href="<?php echo base_url('home');?>">
        Home
      </a>
    </div>
  </div>
</div>

<br/><br/><br/>


<div class="ui grid">
    <div class="sixteen wide column">
      <div class="ui info message">
        <div class="header">
          <center>DOST-X Customers Schedule and Relevant Communication Report</center>
        </div>
      </div><br/>
      <form action="<?php echo base_url('main/weeklyReport'); ?>" method="post">
        <div class="ui input">
          From: <input type="text" placeholder="Filter by date" id="datepicker" name="from">
        </div>
        <div class="ui input">
          To: <input type="text" placeholder="Filter by date" id="datepicker1" name="to">
        </div>
        <button type="submit" class="ui blue labeled icon button">
          <i class="search icon"></i>
          Find
        </button>
      </form><br/>
      <table class="ui blue celled structured table">
        <thead>
          <tr>
            <th rowspan="2">No.</th>
            <th rowspan="2">Contact Person</th>
            <th rowspan="2">Contact Number</th>
            <th rowspan="2">Scheduled Date</th>
            <th rowspan="2">Type of Sample</th>
            <th rowspan="2">No. of Sample</th>
            <th rowspan="2">Parameter / Test</th>
            <th rowspan="2">Relevant Communication/Date</th>
          </tr>
        </thead>
        <tbody>
    <?php foreach ($records as $row): ?>

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
<br/>
    </div>
</div>

<script>


    $( "#datepicker" ).datepicker({
      changeMonth: true,//this option for allowing user to select month
      changeYear: true,
      dateFormat: 'yy-mm-dd' //this option for allowing user to select from year range
    });

</script>

<script>


    $( "#datepicker1" ).datepicker({
      changeMonth: true,//this option for allowing user to select month
      changeYear: true,
      dateFormat: 'yy-mm-dd' //this option for allowing user to select from year range
    });

</script>