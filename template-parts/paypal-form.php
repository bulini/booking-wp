<?php
$amount = ($_GET['testing']==1) ? 0.01 : $price;
?>
<div class="panel panel-default credit-card-box">
    <div class="panel-heading display-table" >
      <h5 class="widget-title" ><i class="fa fa-cc-paypal"></i> <?php  _e('Pay with Paypal','bookingwp');?></h5>
        <small><?php  _e('Pay the entire amount of your booking using Paypal with your credit card. The room wil be instantly booked and a voucher will be sent to you.','bookingwp');?></small>
        <img class="img-responsive" src="<?php bloginfo('template_url'); ?>/assets/images/accepted_c22e0.png" />
    </div>
    <div class="panel-body">
      <!-- PAYPAL FORM STARTS HERE -->
      <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
        <input type="hidden" name="cmd" value="_xclick">
        <input type="hidden" name="business" value="<?php echo booking_get_option('bookingwp_paypal_email');?>">
        <input type="hidden" name="item_name" value="booking <?php echo get_the_title($room_id); ?> <?php echo date('d/m/Y',$checkin); ?> - <?php echo date('d/m/Y',$checkout); ?>">
        <input type="hidden" name="item_number" value="<?php echo $token; ?>">
        <input type="hidden" name="amount" value="<?php echo $amount; ?>">
        <input type="hidden" name="currency_code" value="EUR">
        <input type="hidden" name="ipn_notification_url" value="<?php bloginfo('siteurl');?>/ipn">
        <input type="hidden" name="return" value="<?php bloginfo('siteurl');?>/thank-you?token=<?php echo $token; ?>">
        <button type="submit" name="submit" class="btn btn-large btn-success"><i class="fa fa-cc-paypal"></i> <?php  _e('Pay Now','bookingwp');?></button>
      </form>
<!-- PAYPAL FORM END HERE -->
    </div>
</div>
