<?php
function animated_bar() {
    if(!is_checkout()){
        $mytotal = WC()->cart->cart_contents_total;
				$max = 30;
				$perc = round(($mytotal*100)/$max, 2);
					if($perc > 100){
						$perc = 100;
					}
				$diff = round($max - $mytotal, 2);
            ?>
            <div class="mini-skill">               
				<?php if($diff>=0){ ?>
					<p>you’re $<?php echo $diff; ?> away from free shipping</p>
				<?php } else { ?>
					<p>free shipping granted</p>
                <?php } ?>
                <div class="skillbar2 clearfix " data-percent="<?php echo $perc; ?>%">
                    <div class="skillbar-title2" ><span>free shipping</span></div>
					<div class="skillbar-bar2"></div>
				</div>
            </div>
            <script>
                jQuery('.skillbar2').each(function(){        
                        jQuery(this).find('.skillbar-bar2').animate({
                            width:jQuery(this).attr('data-percent')
                        },2000,'linear', function() {
                            if(jQuery('.skillbar2').attr('data-percent') == '100%') {
                                jQuery('.skillbar-title2').show();
                            } 
                        }); 
                }); 
            </script>
    <?php }	
}
add_action('free_shipping_bar', 'animated_bar');