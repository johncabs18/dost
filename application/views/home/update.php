<div class="ui fixed black inverted menu">
     <img src="<?php echo base_url('assets/images/top.jpg');?>">
  <div class="right menu">
      <div class="ui dropdown item">
        <i class="setting icon"></i><i class="dropdown icon"></i>
        <div class="menu">
          <a class="item" id="btnaddcust"><i class="user icon"></i> Add Customer</a>
          <a class="item" id="btnadd"><i class="calendar outline icon"></i> Add Schedule</a>
          <a class="item" id="btnchange"><i class="edit icon"></i> Add/Change Sample Type</a>
          <a class="item" id="addnote"><i class="bookmark icon"></i> Add Reminder</a>
          <a class="item" id="addlab"><i class="lab icon"></i> Add Laboratory</a>
          <a class="item" href="<?php echo base_url('main/report');?>"><i class="calendar icon"></i> Reports</a>
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
      Hello <?php echo $name1; ?> !
    </div>
    <div class="item">
      <a href="<?php echo base_url('home');?>">
        Home
      </a>
    </div>
  </div>
</div>

<br/><br/><br/>
<script type="text/javascript">
function getContact(){
  var name = document.getElementById('contactname').value;
  console.log(name);
  $.get('http://172.21.45.154/dost/assets/ajaxphp/getNum.php',{contactname:name},function ( data ){
      document.getElementById('contact').value = data;
    });
}

</script>
<div class="ui basic test modal c">
  <div class="ui grid">

        <div class="three wide column">
        </div>

        <div class="ten wide column">
            <form action="<?php echo base_url('main/updateData');?>" method="post" >
            <div class="ui inverted blue form segment">
              <input type="hidden" name="custid" value="<?php echo $id;?>">
<?php foreach ($data as $row) :
$date = explode('-', $row->sched_date);
$year =$date[0];
$month =$date[1];
$day =$date[2];
?>

<!--                 <div class="field ">
                  <div class="ui raised">
                    <label class="ui black ribbon label">Customer Name</label>
                  </div>
                  <div class="ui input">
                    <input placeholder="John Doe" type="text" name="name" value="<?php echo $row->customer_name;?>" required>
                  </div>
                </div>
                <div class="field ">
                  <div class="ui raised">
                    <label class="ui black ribbon label">Contact Number</label>
                  </div>
                  <div class="ui input">
                    <input placeholder="09*********" type="text" name="contact" value="<?php echo $row->contact_num;?>">
                  </div>
                </div> -->
                <input type="hidden" value="<?php echo $row->sched_id; ?>" name="schedId">
                <div class="field ">
                  <div class="ui raised">
                    <label class="ui black ribbon label">Scheduled Dates</label>
                  </div><br/>
                    <div class="ui grid">
                    <div class="row">
                      <div class="five wide column">
                             <div class="fluid ui floating dropdown search labeled button">
                                <div class="default text">Year</div>
                                <i class="dropdown icon"></i>
                                  <input type="hidden" name="year" value="<?php echo $year;?>">
                                <div class="menu">
            <?php for ($y = date('Y'); $y >= 1970 ; $y--) : ?>
                                  <div class="item" data-value="<?php echo $y; ?>" ><?php echo $y; ?></div>
            <?php endfor; ?>
                                </div>
                              </div>
                        </div>
                        <div class="six wide column">
                             <div class="fluid ui floating dropdown search labeled button">
                                <div class="default text">Month</div>
                                <i class="dropdown icon"></i>
                                  <input type="hidden" name="month"value="<?php echo $month;?>" >
                                <div class="menu">
                                  <div class="item" data-value="01">January</div>
                                  <div class="item" data-value="02">February</div>
                                  <div class="item" data-value="03">March</div>
                                  <div class="item" data-value="04">April</div>
                                  <div class="item" data-value="05">May</div>
                                  <div class="item" data-value="06">June</div>
                                  <div class="item" data-value="07">July</div>
                                  <div class="item" data-value="08">August</div>
                                  <div class="item" data-value="09">September</div>
                                  <div class="item" data-value="10">October</div>
                                  <div class="item" data-value="11">November</div>
                                  <div class="item" data-value="12">December</div>
                                </div>
                              </div>
                        </div>
                        <div class="five wide column">
                             <div class="fluid ui floating dropdown search labeled button">
                                <div class="default text">Day</div>
                                <i class="dropdown icon"></i>
                                  <input type="hidden" name="day"value="<?php echo $day;?>" >
                                <div class="menu">
            <?php   for ($d = 1; $d <= 31; $d++) : ?>
                                  <div class="item" data-value="<?php echo ($d <= 9) ? '0'.$d : $d; ?>"><?php echo ($d <= 9) ? '0'.$d : $d; ?></div>
            <?php endfor; ?>
                                </div>
                              </div>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="field ">
                  <div class="ui raised">
                    <label class="ui black ribbon label">Type Of Sample</label>
                  </div>
                  <div class="fluid ui floating dropdown labeled button">
                        <div class="default text">Select</div>
                        <i class="dropdown icon"></i>
                            <input type="hidden" name="type" value="<?php echo $row->sample_type;?>" >
                            <div class="menu">
                            <?php foreach($type as $get) :?>
                                <div class="item" data-value="<?php echo $get->sample_type_name; ?>"><?php echo $get->sample_type_name; ?></div>
                            <?php endforeach; ?>
                            </div>
                   </div>
                </div>
                <div class="field ">
                  <div class="ui raised">
                    <label class="ui black ribbon label">Parameters/ Tests</label>
                  </div>
                  <div class="ui input">
                    <input type="text" name="parameters"value="<?php echo $row->parameter;?>">
                  </div>
                </div>
                <div class="field ">
                  <div class="ui raised">
                    <label class="ui black ribbon label">Sample Quantity</label>
                  </div>
                  <div class="ui input">
                    <input type="text" name="quantity"value="<?php echo $row->sample_qty;?>">
                  </div>
                </div>
                <div class="field ">
                  <div class="ui raised">
                    <label class="ui black ribbon label">Laboratory Name</label>
                  </div>
                  <div class="fluid ui floating dropdown labeled button">
                        <div class="default text">Select</div>
                        <i class="dropdown icon"></i>
                            <input type="hidden" name="labtype" value="<?php echo $row->laboratory;?>">
                            <div class="menu">
                            <?php foreach($lab as $get) :?>
                                <div class="item" data-value="<?php echo $get->lab_name; ?>"><?php echo $get->lab_name; ?></div>
                            <?php endforeach; ?>
                            </div>
                   </div>
                </div>
                <div class="field ">
                  <div class="ui raised">
                    <label class="ui black ribbon label">Type of Communication</label>
                  </div>
                  <div class="fluid ui floating dropdown labeled button">
                        <div class="default text">Select</div>
                        <i class="dropdown icon"></i>
                            <input type="hidden" name="comtype" value="<?php echo $row->type_communication; ?>" >
                            <div class="menu">
                                <div class="item" data-value="Walk-in">Walk-in</div>
                                <div class="item" data-value="Telephone-in">Telephone-in</div>
                            </div>
                   </div>
                </div>
                <div class="field ">
                  <div class="ui raised">
                    <label class="ui black ribbon label">Scheduled by</label>
                  </div>
                  <div class="ui input">
                    <input type="text" name="testedby"value="<?php echo $row->scheduled_by;?>">
                  </div>
                </div>
                <div class="field ">
                  <div class="ui raised">
                    <label class="ui black ribbon label">Status</label>
                  </div>
                  <div class="ui input">
                    <input type="text" name="stat"value="<?php echo $row->status;?>">
                  </div>
                </div>
                <button type="submit" class="ui green button">
                  <i class="write icon"></i> Update
                </button>
<?php endforeach; ?>
            </div>
            </form>
        </div>

    <div class="three wide column">
    </div>
  </div>
</div>


 <div class="ui grid">
  <div class="four wide column"></div>

  <div class="eight wide column">
    <table class="ui large basic definition table">
        <tbody>
      <?php foreach ($data as $row) :
$date = explode('-', $row->sched_date);
$year =$date[0];
$month =$date[1];
$day =$date[2];
$da = date('F d, Y', strtotime($row->sched_date));
$tocdate = date('F d, Y', strtotime($row->communication_date));
?>
      <tr>
        <td class="positive center aligned">Customer Name</td>
        <td><?php echo $row->customer_name; ?></td>
      </tr>
      <tr>
        <td class="positive center aligned">Contact Number</td>
        <td><?php echo $row->contact_num; ?></td>
      </tr>
      <tr>
        <td class="positive center aligned">Scheduled Date</td>
        <td><?php echo $da; ?></td>
      </tr>
      <tr>
        <td class="positive center aligned">Type of sample</td>
        <td><?php echo $row->sample_type; ?></td>
      </tr>
      <tr>
        <td class="positive center aligned">Parameters/ Tests</td>
        <td><?php echo $row->parameter; ?></td>
      </tr>
      <tr>
        <td class="positive center aligned">Sample Quantity</td>
        <td><?php echo $row->sample_qty; ?></td>
      </tr>
      <tr>
        <td class="positive center aligned">Laboratory</td>
        <td><?php echo $row->laboratory; ?></td>
      </tr>
      <tr>
      <tr>
        <td class="positive center aligned">Type of Communication</td>
        <td><?php echo $row->type_communication; ?></td>
      </tr>
      <tr>
        <td class="positive center aligned">Date of Communication</td>
        <td><?php echo $tocdate; ?></td>
      </tr>
      <tr>
        <td class="positive center aligned">Status</td>
        <td><?php echo $row->status; ?></td>
      </tr>
      <tr>
        <td class="positive center aligned">Scheduled by</td>
        <td><?php echo $row->scheduled_by; ?></td>
      </tr>
      <?php endforeach; ?>
        </tbody>
      </table>
      <a class="ui blue button" id="edit"><i class="edit icon"></i> Edit Schedule</a>
      <a class="ui button" href="<?php echo base_url('home');?>"><i class="chevron left icon"></i> Back to Main</a>
  </div>

  <div class="four wide column"></div>
 </div>
 <br/><br/><center>
    <div class="ui segment">
      <a href="<?php echo base_url('main/team');?>">About Us</a> • <a href="<?php echo base_url('assets/user_guide.pdf'); ?>" target="_blank">User Guide</a> • <a href="<?php echo base_url('home'); ?>">Department of Science and Technology</a> • © 2015 DOST-X
    </div>
</center>


<div class="ui basic test modal b">
      <div class="ui grid">

        <div class="three wide column">
        </div>

        <div class="ten wide column">
            <form action="<?php echo base_url('main/add');?>" method="post" >
            <div class="ui inverted blue form segment">
                <div class="field ">
                  <div class="ui raised">
                    <label class="ui black ribbon label">Customer name</label>
                  </div>
                  <div class="fluid ui floating dropdown search labeled button">
                        <div class="default text">Select</div>
                        <i class="dropdown icon"></i>
                            <input type="hidden" name="contactname" id="contactname" onchange="getContact()">
                            <div class="menu">
                            <?php foreach($cust as $row) :?>
                                <div class="item" data-value="<?php echo $row->customer_name; ?>"><?php echo $row->customer_name; ?></div>
                            <?php endforeach; ?>
                            </div>
                   </div>
                </div>
                <div class="field ">
                  <div class="ui raised">
                    <label class="ui black ribbon label">Contact Number</label>
                  </div>
                  <div class="ui input">
                    <input placeholder="09*********"  type="text" id="contact" name="contact" readonly>
                  </div>
                </div>
                <div class="field ">
                  <div class="ui raised">
                    <label class="ui black ribbon label">Scheduled Dates</label>
                  </div><br/>
                    <div class="ui grid">
                    <div class="row">
                      <div class="six wide column">
                             <div class="fluid ui floating dropdown search labeled button">
                                <div class="default text">Year</div>
                                <i class="dropdown icon"></i>
                                  <input type="hidden" name="year" >
                                <div class="menu">
            <?php for ($y = date('Y'); $y >= 1970 ; $y--) : ?>
                                  <div class="item" data-value="<?php echo $y; ?>" ><?php echo $y; ?></div>
            <?php endfor; ?>
                                </div>
                              </div>
                        </div>
                        <div class="five wide column">
                             <div class="fluid ui floating dropdown search labeled button">
                                <div class="default text">Month</div>
                                <i class="dropdown icon"></i>
                                  <input type="hidden" name="month" >
                                <div class="menu">
                                  <div class="item" data-value="01">January</div>
                                  <div class="item" data-value="02">February</div>
                                  <div class="item" data-value="03">March</div>
                                  <div class="item" data-value="04">April</div>
                                  <div class="item" data-value="05">May</div>
                                  <div class="item" data-value="06">June</div>
                                  <div class="item" data-value="07">July</div>
                                  <div class="item" data-value="08">August</div>
                                  <div class="item" data-value="09">September</div>
                                  <div class="item" data-value="10">October</div>
                                  <div class="item" data-value="11">November</div>
                                  <div class="item" data-value="12">December</div>
                                </div>
                              </div>
                        </div>
                        <div class="five wide column">
                             <div class="fluid ui floating dropdown search labeled button">
                                <div class="default text">Day</div>
                                <i class="dropdown icon"></i>
                                  <input type="hidden" name="day" >
                                <div class="menu">
            <?php   for ($d = 1; $d <= 31; $d++) : ?>
                                  <div class="item" data-value="<?php echo ($d <= 9) ? '0'.$d : $d; ?>"><?php echo ($d <= 9) ? '0'.$d : $d; ?></div>
            <?php endfor; ?>
                                </div>
                              </div>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="field ">
                  <div class="ui raised">
                    <label class="ui black ribbon label">Type Of Sample</label>
                  </div>
                  <div class="fluid ui floating dropdown labeled button">
                        <div class="default text">Select</div>
                        <i class="dropdown icon"></i>
                            <input type="hidden" name="type" >
                            <div class="menu">
                            <?php foreach($type as $row) :?>
                                <div class="item" data-value="<?php echo $row->sample_type_name; ?>"><?php echo $row->sample_type_name; ?></div>
                            <?php endforeach; ?>
                            </div>
                   </div>
                </div>
                <div class="field ">
                  <div class="ui raised">
                    <label class="ui black ribbon label">Parameters/ Tests</label>
                  </div>
                  <div class="ui input">
                    <input type="text" name="parameters">
                  </div>
                </div>
                <div class="field ">
                  <div class="ui raised">
                    <label class="ui black ribbon label">Sample Quantity</label>
                  </div>
                  <div class="ui input">
                    <input type="text" name="quantity">
                  </div>
                </div>
                <div class="field ">
                  <div class="ui raised">
                    <label class="ui black ribbon label">Laboratory Name</label>
                  </div>
                  <div class="fluid ui floating dropdown labeled button">
                        <div class="default text">Select</div>
                        <i class="dropdown icon"></i>
                            <input type="hidden" name="labtype" >
                            <div class="menu">
                            <?php foreach($lab as $row) :?>
                                <div class="item" data-value="<?php echo $row->lab_name; ?>"><?php echo $row->lab_name; ?></div>
                            <?php endforeach; ?>
                            </div>
                   </div>
                </div>
                <div class="field ">
                  <div class="ui raised">
                    <label class="ui black ribbon label">Type of Communication</label>
                  </div>
                  <div class="fluid ui floating dropdown labeled button">
                        <div class="default text">Select</div>
                        <i class="dropdown icon"></i>
                            <input type="hidden" name="comtype" >
                            <div class="menu">
                                <div class="item" data-value="Walk-in">Walk-in</div>
                                <div class="item" data-value="Telephone-in">Telephone-in</div>
                            </div>
                   </div>
                </div>
                <div class="field ">
                  <div class="ui raised">
                    <label class="ui black ribbon label">Scheduled by</label>
                  </div>
                  <div class="ui input">
                    <input type="text" name="testedby">
                  </div>
                </div>
                <button type="submit" class="ui green button">
                  <i class="plus icon"></i> Add Schedule
                </button>

            </div>
            </form>
        </div>

    <div class="three wide column">
    </div>
  </div>

<div class="ui basic test modal a">
      <div class="ui grid">

        <div class="five wide column">
        </div>

        <div class="six wide column">
            <form action="<?php echo base_url('main/addtype');?>" method="post">
              <div class="ui form segment">
                <div class="field ">
                  <div class="ui input">
                    <input type="text" name="type" placeholder="Add Type">
                  </div>
                  <button type="submit" class="ui blue labeled icon button"><i class="plus icon"></i>Add</button>
                </div>
            </form>
                <table class="ui two column table">
                  <thead>
                  <tr>
                    <th>Sample Type</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach($type as $row) :?>
                    <tr>
                      <td><?php echo $row->sample_type_name; ?></td>
                      <td><a href="<?php echo base_url('main/deletetype').'/'.$row->sample_cb_id;?>">Delete </a></td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
        </div>

    <div class="five wide column">
    </div>
  </div>

</div>

<div class="ui basic test modal d">
      <div class="ui grid">

        <div class="five wide column">
        </div>

        <div class="six wide column">
            <form action="<?php echo base_url('main/addnote');?>" method="post">
              <div class="ui form segment">
                <div class="field ">
                  <div class="ui raised">
                    <label class="ui black ribbon label">Select a date</label>
                  </div>
                  <div class="ui input">
                    <input type="text" name="date_note" placeholder="Select a date" id="datepicker1">
                  </div>
                </div>
                <div class="field ">
                  <div class="ui raised">
                    <label class="ui black ribbon label">Add Reminder</label>
                  </div>
                  <div class="ui input">
                    <textarea name="note"></textarea>
                  </div>
                </div>
                <div class="field ">
                  <div class="ui raised">
                    <label class="ui black ribbon label">Laboratory Name</label>
                  </div>
                  <div class="fluid ui floating dropdown labeled button">
                        <div class="default text">Select</div>
                        <i class="dropdown icon"></i>
                            <input type="hidden" name="type_lab" >
                            <div class="menu">
                            <?php foreach($lab as $row) :?>
                                <div class="item" data-value="<?php echo $row->lab_name; ?>"><?php echo $row->lab_name; ?></div>
                            <?php endforeach; ?>
                            </div>
                   </div>
                </div>
                <button type="submit" class="ui blue labeled icon button"><i class="plus icon"></i>Add</button>
            </form>
              </div>
        </div>

    <div class="five wide column">
    </div>
  </div>
<div class="ui basic test modal e">
      <div class="ui grid">

        <div class="five wide column">
        </div>

        <div class="six wide column">
            <form action="<?php echo base_url('main/addCust');?>" method="post">
              <div class="ui inverted blue form segment">
                <div class="field ">
                  <div class="ui raised">
                    <label class="ui black ribbon label">Customer Name</label>
                  </div>
                  <div class="ui input">
                    <input placeholder="John Doe" type="text" name="custname" required>
                  </div>
                </div>
                <div class="field ">
                  <div class="ui raised">
                    <label class="ui black ribbon label">Contact Number</label>
                  </div>
                  <div class="ui input">
                    <input placeholder="09*********" type="text" name="custcontact">
                  </div>
                </div>
                <button type="submit" class="fluid ui green labeled icon button"><i class="plus icon"></i>Add Customer</button>
              </div>
            </form>
              </div>
        </div>

    <div class="five wide column">
    </div>
  </div>

  <div class="ui basic test modal lab">
      <div class="ui grid">

        <div class="five wide column">
        </div>

        <div class="six wide column">
            <form action="<?php echo base_url('main/addLab');?>" method="post">
              <div class="ui form segment">
                <div class="field ">
                  <div class="ui input">
                    <input type="text" name="lab" placeholder="Add Laboratory">
                  </div>
                  <button type="submit" class="ui blue labeled icon button"><i class="plus icon"></i>Add</button>
                </div>
            </form>
                <table class="ui two column table">
                  <thead>
                  <tr>
                    <th>Laboratory</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach($lab as $row) :?>
                    <tr>
                      <td><?php echo $row->lab_name; ?></td>
                      <td><a href="<?php echo base_url('main/deletelab').'/'.$row->lab_id;?>">Delete </a></td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
        </div>

    <div class="five wide column">
    </div>
  </div>

<script>
  $(document).ready(function(){
    $("#btnadd").click(function(){
      $('.ui.basic.test.modal.b').modal('show');
    });
  });
</script>
<script>
  $(document).ready(function(){
    $("#btnaddcust").click(function(){
      $('.ui.basic.test.modal.e').modal('show');
    });
  });
</script>
<script>
  $(document).ready(function(){
    $("#btnchange").click(function(){
      $('.ui.basic.test.modal.a').modal('show');
    });
  });
</script>
<script>
  $(document).ready(function(){
    $("#addnote").click(function(){
      $('.ui.basic.test.modal.d').modal('show');
    });
  });
</script>
<script>
  $(document).ready(function(){
    $("#edit").click(function(){
      $('.ui.basic.test.modal.c').modal('show');
    });
  });
</script>
<script>
  $(document).ready(function(){
    $("#addlab").click(function(){
      $('.ui.basic.test.modal.lab').modal('show');
    });
  });
</script>
<script>


    $( "#datepicker1" ).datepicker({
      changeMonth: true,//this option for allowing user to select month
      changeYear: true,
      dateFormat: 'yy-mm-dd' //this option for allowing user to select from year range
    });

</script>