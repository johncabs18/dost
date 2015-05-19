
<div class="ui large inverted menu" style="margin-top:0px;margin-bottom:1px">
  <img src="<?php echo base_url('assets/images/top.jpg');?>">
</div>
<img class="fluid ui image" src="<?php echo base_url('assets/images/banner.jpg');?>"><br/>
	<div class="ui grid">
	    <div class="five wide column">
	    </div>
	    <div class="six wide column">
	    	<form action="<?php echo base_url('verifylogin');?>" method="post">
		    	<div class="ui inverted form segment">
				  <div class="field">
				    <div class="ui raised">
			            <label class="ui blue ribbon label">Username</label>
			          </div>
				    <div class="ui left labeled icon input">
				      <input type="text" placeholder="Username" name="username" value="<?php echo set_value('username'); ?>">
				      <i class="user icon"></i>
				      <div class="ui corner label">
				        <i class="red icon asterisk"></i>
				      </div>
				    </div>
				    <?php echo form_error('username');?>
				  </div>
				  <div class="field">
				    <div class="ui raised">
			            <label class="ui blue ribbon label">Password</label>
			          </div>
				    <div class="ui left labeled icon input">
				      <input type="password" placeholder="Password" name="password" value="<?php echo set_value('password'); ?>">
				      <i class="lock icon"></i>
				      <div class="ui corner label">
				        <i class="red icon asterisk"></i>
				      </div>
				    </div>
				    <?php echo form_error('password');?>
				  </div>
				  <button class="ui blue labeled icon button" type="submit">
			          <i class="sign in icon"></i>
			          Sign in
			        </button>
			        <a class="ui labeled icon button" id="btnuser">
			          <i class="write icon"></i>
			          Sign Up
			        </a>
				</div>
			</form>
	    </div>
	    <div class="five wide column">
	    </div>
	</div>
<div class="ui basic test modal">
  <div class="ui grid">

  	<div class="two wide column">
    </div>
    <div class="twelve wide column">
		<form action="<?php echo base_url('register/saveUser');?>" method="post" >
      <div class="ui inverted blue form segment">
      <h5 class="ui header">* Required</h5>
        <div class="field ">
          <div class="ui raised">
            <label class="ui black ribbon label">Fullname</label>
          </div>
          <div class="ui labeled input">
            <input placeholder="John Smith Doe" type="text" name="fname" value="<?php echo set_value('fname'); ?>">
              <div class="ui corner label">
                <i class="red asterisk icon"></i>
              </div>
          </div>
          <?php echo form_error('fname');?>
        </div>
        <!-- <div class="field ">
          <div class="ui raised">
            <label class="ui black ribbon label">Position</label>
          </div>
          <div class="ui labeled input">
            <input placeholder="Director" type="text" name="position" value="<?php echo set_value('position'); ?>">
              <div class="ui corner label">
                <i class="red asterisk icon"></i>
              </div>
          </div>
          <?php echo form_error('position');?>
        </div>
        <div class="field">
          <div class="ui raised">
            <label class="ui black ribbon label">Gender</label>
          </div>
            <div class="ui fluid labeled selection dropdown">
              <div class="default text">Select</div>
                <input type="hidden" name="gender" value="<?php echo set_value('gender'); ?>">
                <div class="ui corner label">
                  <i class="red asterisk icon"></i>
                </div>
              <div class="menu">
                <div class="item" data-value="male">Male</div>
                <div class="item" data-value="female">Female</div>
              </div>
            </div>
            <?php echo form_error('gender');?>
        </div>
        <div class="field">
        <div class="ui raised">
            <label class="ui black ribbon label">Date of Birth</label>
        </div><br/>
        <div class="ui grid">
        <div class="row">
          <div class="six wide column">
                 <div class="ui fluid labeled selection dropdown">
                    <div class="default text">Year</div>
                      <input type="hidden" name="year" value="<?php echo set_value('year'); ?>">
                      <div class="ui corner label">
                        <i class="red asterisk icon"></i>
                      </div>
                    <div class="menu">
<?php for ($y = 1940; $y <= date('Y'); $y++) : ?>
                      <div class="item" data-value="<?php echo $y; ?>" ><?php echo $y; ?></div>
<?php endfor; ?>
                    </div>
                  </div>
                  <?php echo form_error('year');?>
            </div>
            <div class="five wide column">
                 <div class="ui fluid labeled selection dropdown">
                    <div class="default text">Month</div>
                      <div class="ui corner label">
                        <i class="red asterisk icon"></i>
                      </div>
                      <input type="hidden" name="month"  value="<?php echo set_value('month'); ?>">
                    <div class="menu">
<?php for ($m = 1; $m <= 12; $m++) : ?>
                      <div class="item" data-value="<?php echo ($m <= 9) ? '0'.$m : $m; ?>"><?php echo ($m <= 9) ? '0'.$m : $m; ?></div>
<?php endfor; ?>
                    </div>
                  </div>
                  <?php echo form_error('month');?>
            </div>
            <div class="five wide column">
                 <div class="ui fluid labeled selection dropdown">
                    <div class="default text">Day</div>
                    <div class="ui corner label">
                      <i class="red asterisk icon"></i>
                    </div>
                      <input type="hidden" name="day"  value="<?php echo set_value('day'); ?>">
                    <div class="menu">
<?php   for ($d = 1; $d <= 31; $d++) : ?>
                      <div class="item" data-value="<?php echo ($d <= 9) ? '0'.$d : $d; ?>"><?php echo ($d <= 9) ? '0'.$d : $d; ?></div>
<?php endfor; ?>
                    </div>
                  </div>
                  <?php echo form_error('day');?>
            </div>
          </div>
          </div>
        </div>
        <div class="field">
          <div class="ui raised">
            <label class="ui black ribbon label">Address</label>
          </div>
          <div class="ui labeled input">
          <textarea placeholder="Lapasan, Cagayan De Oro City" name="address"  value="<?php echo set_value('address'); ?>"></textarea>
            <div class="ui corner label">
                <i class="green circle icon"></i>
              </div>
          </div>
          <?php echo form_error('address');?>
        </div> -->
        <div class="ui inverted divider"></div>
         <div class="field">
          <div class="ui raised">
            <label class="ui black ribbon label">Username</label>
          </div>
          <div class="ui left labeled icon input">
            <input type="text" placeholder="Username" name="username1" value="<?php echo set_value('username'); ?>">
            <i class="user icon"></i>
          <div class="ui corner label">
            <i class="red asterisk icon"></i>
          </div>
          </div>
          <?php echo form_error('username1');?>
        </div>
        <div class="field">
          <div class="ui raised">
            <label class="ui black ribbon label">Password</label>
          </div>
          <div class="ui left labeled icon input">
            <input type="password" placeholder="Password" name="password1" value="<?php echo set_value('password'); ?>">
            <i class="lock icon"></i>
          <div class="ui corner label">
            <i class="red asterisk icon"></i>
          </div>
          </div>
          <?php echo form_error('password1');?>
        </div>
        <button class="ui green labeled icon button" type="submit">
          <i class="checkmark icon"></i>
          Create User
        </button>
        <a class="ui labeled icon button" href="<?php echo base_url();?>">
          <i class="chevron left icon"></i>
          Back
        </a>
        </div>
        </form>
    </div>
	<div class="two wide column">
    </div>

  </div>
</div>
<script>
  $(document).ready(function(){
    $("#btnuser").click(function(){
      $('.basic.test.modal').modal('show');
    });
  });
</script>