<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properities -->
  <title><?php echo $title; ?></title>


  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/semantic.min.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/semantic.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/kitchensink.css'); ?>">

  <script src="<?php echo base_url('assets/jquery.js'); ?>"></script>
  <script src="<?php echo base_url('assets/semantic.js'); ?>"></script>
  <script src="<?php echo base_url('assets/homepage.js'); ?>"></script>

  <link rel="stylesheet" href="<?php echo base_url('assets/jquery-ui.css'); ?>" />
  <!-- Load jQuery UI Main JS  -->
  <script src="<?php echo base_url('assets/jquery-ui.js'); ?>"></script>

  <link rel="icon" href="<?php echo base_url('assets/images/DOST.png'); ?>">
</head>
<body id="sink">

<div class="ui fixed black inverted menu">
     <img src="<?php echo base_url('assets/images/top.jpg'); ?>">
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
          <a class="item" href="<?php echo base_url('main/logout'); ?>"><i class="sign out icon"></i> Logout</a>
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
    <div class="active item">
      <a href="home/">
        Home
      </a>
    </div>
  </div>
</div>
<br/><br/><br/>
<script type="text/javascript">
    $(document).ready(function(){
        $('#table').load('http://localhost/dost/assets/ajaxphp/getData.php');

    });
	function search(){
    var value = document.getElementById('searchbox').value;
    var datepck = document.getElementById('datepicker').value;
    var labtype = document.getElementById('labtype').value;
		$.get('http://localhost/dost/assets/ajaxphp/get.php',{search:value,datepckr:datepck,labtype1:labtype},function ( data ){
			$('#table').html(data);

		});
    $.get('http://localhost/dost/assets/ajaxphp/getNote.php',{datepckr:datepck,labtype1:labtype},function ( data ){
      $('#note').html(data);

    });
	}
</script>
<div class="ui grid">
		<div class="sixteen wide column">
      <div class="ui info message">
        <div class="header">
          <center>DOST-X Customers Schedule and Relevant Communication System</center>
        </div>
      </div><br/>


		<div class="ui action input">
		  <input type="text" placeholder="Search name..." id="searchbox" onkeyup="search()">
		  <div class="ui black icon button"><i class="search icon"></i></div>&nbsp;

      <div class="ui input">
        <input type="text" placeholder="Filter by date" id="datepicker" onchange="search()" onkeyup="search()">
      </div>&nbsp;

      <div class="ui floating dropdown labeled button">
        <div class="default text">Filter by Lab</div>
        <i class="dropdown icon"></i>
          <input type="hidden" id="labtype" value="" onchange="search()">
        <div class="menu">
          <?php foreach($lab as $row) :?>
            <div class="item" data-value="<?php echo $row->lab_name; ?>"><?php echo $row->lab_name; ?></div>
          <?php endforeach; ?>
        </div>
      </div>&nbsp;

    </div><br/>
    <div id="note"></div>
		<br/>
		  <div id="table"></div>
		</div>
</div>
<br/><br/><center>
    <div class="ui segment">
      <a href="<?php echo base_url('main/team');?>">About Us</a> • <a href="<?php echo base_url('assets/user_guide.pdf'); ?>" target="_blank">User Guide</a> • <a href="<?php echo base_url('home'); ?>">Department of Science and Technology</a> • © 2015 DOST-X
    </div>
</center>
<script type="text/javascript">
function getContact(){
  var name = document.getElementById('contactname').value;
  console.log(name);
  $.get('http://localhost/dost/assets/ajaxphp/getNum.php',{contactname:name},function ( data ){
      document.getElementById('contact').value = data;
    });
}

</script>
<div class="ui basic test modal b">
      <div class="ui grid">

        <div class="three wide column">
        </div>

        <div class="ten wide column">
            <form action="<?php echo base_url('main/add'); ?>" method="post" >
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

<div class="ui basic test modal c">
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
                            <?php foreach($lab as $get) :?>
                                <div class="item" data-value="<?php echo $get->lab_name; ?>"><?php echo $get->lab_name; ?></div>
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

   <div class="ui basic test modal d">
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
    $("#btnchange").click(function(){
      $('.ui.basic.test.modal.a').modal('show');
    });
  });
</script>
<script>
  $(document).ready(function(){
    $("#addnote").click(function(){
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
  $(document).ready(function(){
    $("#btnaddcust").click(function(){
      $('.ui.basic.test.modal.d').modal('show');
    });
  });
</script>
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


</body>
</html>