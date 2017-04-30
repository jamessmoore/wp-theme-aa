<?php

namespace Kirki\Controls;

class PromoControl extends \WP_Customize_Control {

	public $type = 'promo';

	/**
	 * Render the control's content.
	 */
	protected function render_content() { ?>
		<div class="promo-box">
        <div class="promo-2">
		    <h3><?php esc_attr_e( 'Upgrade to Pro version!', 'causes' ); ?></h3>
        	<div class="promo-wrap">
            	<a class="promoupgrade" href="<?php esc_attr_e( 'http://www.pwtthemes.com/theme/causes-responsive-wordpress-theme', 'causes' ); ?>" target="_blank"><?php esc_attr_e( 'Upgrade to Pro', 'causes' ); ?></a>
                <a class="promodemo" href="<?php esc_attr_e( 'http://pwtthemes.com/demo/causes/', 'causes' ); ?>" target="_blank"><?php esc_attr_e( 'View Demo', 'causes' ); ?></a>                                                                        
            </div>
			<p class="contactmess"><?php esc_attr_e( 'If you need assistance, please do not hesitate to contact the theme author', 'causes' ); ?></p>
        	<div class="promo-wrap">
            	<a class="promocontact" href="<?php esc_attr_e( 'http://www.pwtthemes.com/contact', 'causes' ); ?>" target="_blank"><?php esc_attr_e( 'Contact Us', 'causes' ); ?></a>                                                                      
            </div>			
        </div>
		</div>
		<?php
	}
}
