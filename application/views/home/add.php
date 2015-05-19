<div class="ui page grid masthead segment">
  <div class="ui grid">

    <div class="three wide column">
    </div>

    <div class="ten wide column">
      <form action="<?php echo base_url('main/add'); ?>" method="post" >
      <div class="ui inverted blue form segment">
      <h5 class="ui header">* Required</h5>
        <div class="field ">
          <div class="ui raised">
            <label class="ui black ribbon label">Customer Name</label>
          </div>
          <div class="ui labeled input">
            <input type="text" name="custName" value="<?php echo set_value('custName'); ?>">
              <div class="ui corner label">
                <i class="red asterisk icon"></i>
              </div>
          </div>
          <?php echo form_error('custName');?>
        </div>
        <div class="field ">
          <div class="ui raised">
            <label class="ui black ribbon label">Contact Number</label>
          </div>
          <div class="ui labeled input">
            <input type="text" name="contact">
              <div class="ui corner label">
                <i class="red asterisk icon"></i>
              </div>
          </div>
        </div>
        <div class="field ">
          <div class="ui raised">
            <label class="ui black ribbon label">Contact Number</label>
          </div>
          <div class="ui labeled input">
            <input type="text" name="contact">
              <div class="ui corner label">
                <i class="red asterisk icon"></i>
              </div>
          </div>
        </div>
        <button class="ui green labeled icon button" type="submit">
          <i class="checkmark icon"></i>
          Submit
        </button>
        <a class="ui labeled icon button" href="http://localhost/dost/main/ctl">
          <i class="chevron left icon"></i>
          Back
        </a>
        </div>
        </form>
    </div>

    <div class="three wide column">
    </div>
  </div>
</div>
