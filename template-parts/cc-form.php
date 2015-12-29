<!-- CREDIT CARD FORM STARTS HERE -->
<div class="panel panel-default credit-card-box">
    <div class="panel-heading display-table" >
            <h5 class="widget-title" ><i class="fa fa-lock"></i> <?php  _e('Payment Details: ','bookingwp');?></h5>
            <small><?php  _e('Leave your credit card to confirm your reservation. No fees will be applied, you will pay at your arrival.','bookingwp');?></small>
                <img class="img-responsive" src="<?php bloginfo('template_url'); ?>/assets/images/accepted_c22e0.png" />
    </div>
    <div class="panel-body">
      <form method="post" id="confirmation-form" action="<?php bloginfo('siteurl');?>/thank-you/?token=<?php echo $token; ?>">
      <div class="form-group">
        <label for="cc-number" class="control-label"><?php  _e('Card Number','bookingwp');?> <small class="text-muted">[<span class="cc-brand"></span>]</small></label>
        <div class="input-group">
        <input id="cc-number" type="tel" name="cc-number" class="input-lg form-control cc-number" autocomplete="cc-number" placeholder="•••• •••• •••• ••••" required>
          <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
        </div>
      </div>

      <div class="form-group">
        <label for="cc-exp" class="control-label"><?php  _e('Card expiration','bookingwp');?></label>
        <input id="cc-exp" type="tel" name="cc-exp" class="input-lg form-control cc-exp" autocomplete="cc-exp" placeholder="•• / ••" required>
      </div>

      <div class="form-group">
        <label for="cc-cvv" class="control-label"><?php  _e('Card CVV','bookingwp');?></label>
        <input id="cc-cvv" type="tel" name="cc-cvv" class="input-lg form-control cc-cvv" autocomplete="off" placeholder="•••" required>
      </div>

      <div class="form-group">
        <label for="nameoncard" class="control-label"><?php  _e('Name on card','bookingwp');?></label>
        <input id="nameoncard" name="name-oncard" type="text" class="input-lg form-control">
        <input id="numeric" type="hidden" class="input-lg form-control" name="bid" value="<?php echo get_the_ID(); ?>">
      </div>

      <button type="submit" class="btn btn-lg btn-success" id="confirm"><?php  _e('Process booking','bookingwp');?></button>

      <h2 class="validation"></h2>
    </form>
    </div>
</div>
<!-- CREDIT CARD FORM ENDS HERE -->
