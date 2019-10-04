<?php 

function mysticky_welcome_bar_backend() {
	$nonce = wp_create_nonce('mysticky_option_welcomebar_update');
	$nonce_reset = wp_create_nonce('mysticky_option_welcomebar_reset');
	
	$welcomebar = get_option( 'mysticky_option_welcomebar' );
	if ( $welcomebar == '' || empty($welcomebar)) {
		$welcomebar = mysticky_welcomebar_pro_widget_default_fields();
	}
	
	$mysticky_welcomebar_showx_desktop = $mysticky_welcomebar_showx_mobile = '';
	$mysticky_welcomebar_btn_desktop = $mysticky_welcomebar_btn_mobile = '';
	$mysticky_welcomebar_display_desktop = $mysticky_welcomebar_display_mobile = '';
	if( isset($welcomebar['mysticky_welcomebar_x_desktop']) ) {
		$mysticky_welcomebar_showx_desktop = ' mysticky-welcomebar-showx-desktop';
	}
	if( isset($welcomebar['mysticky_welcomebar_x_mobile']) ) {
		$mysticky_welcomebar_showx_mobile = ' mysticky-welcomebar-showx-mobile';
	}
	if( isset($welcomebar['mysticky_welcomebar_btn_desktop']) ) {
		$mysticky_welcomebar_btn_desktop = ' mysticky-welcomebar-btn-desktop';
	}
	if( isset($welcomebar['mysticky_welcomebar_btn_mobile']) ) {
		$mysticky_welcomebar_btn_mobile = ' mysticky-welcomebar-btn-mobile';
	}
	$display_main_class = "mysticky-welcomebar-position-" . $welcomebar['mysticky_welcomebar_position'] . $mysticky_welcomebar_showx_desktop . $mysticky_welcomebar_showx_mobile . $mysticky_welcomebar_btn_desktop . $mysticky_welcomebar_btn_mobile;
	?>
	<form class="mysticky-welcomebar-form" id="mysticky_welcomebar_form" method="post" action="#">
		<div class="mysticky-welcomebar-header-title">
			<h3><?php _e('Welcome Bar', 'myStickymenu'); ?></h3>
			<label for="mysticky-welcomebar-contact-form-enabled" class="mysticky-welcomebar-switch">
				<input type="checkbox" id="mysticky-welcomebar-contact-form-enabled" name="mysticky_option_welcomebar[mysticky_welcomebar_enable]" value="1" <?php checked( @$welcomebar['mysticky_welcomebar_enable'], '1' );?> />
				<span class="slider"></span>
			</label>
		</div>
		<div class="mysticky-welcomebar-setting-wrap">
			<div class="mysticky-welcomebar-setting-left">
				<div class="mysticky-welcomebar-setting-block">
					<div class="mysticky-welcomebar-subheader-title">
						<h4><?php _e('Design', 'myStickymenu'); ?></h4>
					</div>
					<div class="mysticky-welcomebar-setting-content mysticky-welcomebar-setting-position">
						<label><?php _e('Position', 'myStickymenu'); ?></label>
						<div class="mysticky-welcomebar-setting-content-right">
							<label>
								<input name="mysticky_option_welcomebar[mysticky_welcomebar_position]" value= "top" type="radio" <?php checked( @$welcomebar['mysticky_welcomebar_position'], 'top' );?> />
								<?php _e("Top", 'mystickymenu'); ?>
							</label>
							<label>
								<input name="mysticky_option_welcomebar[mysticky_welcomebar_position]" value="bottom" type="radio" disabled />
								<?php _e("Bottom", 'mystickymenu'); ?>
							</label>
							<span class="myStickymenu-upgrade"><a class="sticky-header-upgrade-now" href="#" target="_blank"><?php _e( 'Upgrade Now', 'mystickymenu' );?></a></span>
						</div>
					</div>
					<div class="mysticky-welcomebar-setting-content">
						<label><?php _e('Height', 'myStickymenu'); ?></label>
						<div class="mysticky-welcomebar-setting-content-right">
							<div class="px-wrap">
								<input type="number" class="" min="0" step="1" id="mysticky_welcomebar_height" name="mysticky_option_welcomebar[mysticky_welcomebar_height]" value="60" disabled />
								<span class="input-px">PX</span>
							</div>
							<span class="myStickymenu-upgrade"><a class="sticky-header-upgrade-now" href="#" target="_blank"><?php _e( 'Upgrade Now', 'mystickymenu' );?></a></span>
						</div>
					</div>
					<div class="mysticky-welcomebar-setting-content">
						<label><?php _e('Background Color', 'myStickymenu'); ?></label>
						<div class="mysticky-welcomebar-setting-content-right mysticky-welcomebar-colorpicker">
							<input type="text" id="mysticky_welcomebar_bgcolor" name="mysticky_option_welcomebar[mysticky_welcomebar_bgcolor]" class="my-color-field" value="<?php echo $welcomebar['mysticky_welcomebar_bgcolor'];?>" />
						</div>
					</div>
					<div class="mysticky-welcomebar-setting-content">
						<label><?php _e('Background Text Color', 'myStickymenu'); ?></label>
						<div class="mysticky-welcomebar-setting-content-right mysticky-welcomebar-colorpicker">
							<input type="text" id="mysticky_welcomebar_bgtxtcolor" name="mysticky_option_welcomebar[mysticky_welcomebar_bgtxtcolor]" class="my-color-field" value="<?php echo $welcomebar['mysticky_welcomebar_bgtxtcolor'];?>" />
						</div>
					</div>
					<div class="mysticky-welcomebar-setting-content">
						<label><?php _e('Font', 'myStickymenu'); ?></label>
						<div class="mysticky-welcomebar-setting-content-right">
							<select name="mysticky_option_welcomebar[mysticky_welcomebar_font]" class="form-fonts">
								<option value=""><?php _e( 'Select font family', 'myStickymenu' );?></option>
								<?php $group= ''; foreach( myStickymenu_fonts() as $key=>$value):
											if ($value != $group){
												echo '<optgroup label="' . $value . '">';
												$group = $value;
											}
										?>
									<option value="<?php echo esc_attr($key);?>" <?php selected( @$welcomebar['mysticky_welcomebar_font'], $key ); ?>><?php echo esc_html($key);?></option>
								<?php endforeach;?>
							</select>
						</div>
					</div>
					<div class="mysticky-welcomebar-setting-content">
						<label><?php _e('Font Size', 'myStickymenu'); ?></label>
						<div class="mysticky-welcomebar-setting-content-right">
							<div class="px-wrap">
								<input type="number" class="" min="0" step="1" id="mysticky_welcomebar_fontsize" name="mysticky_option_welcomebar[mysticky_welcomebar_fontsize]" value="<?php echo @$welcomebar['mysticky_welcomebar_fontsize'];?>" />
								<span class="input-px">PX</span>
							</div>
						</div>
					</div>
					<div class="mysticky-welcomebar-setting-content">
						<label><?php _e('Bar Text', 'myStickymenu'); ?></label>
						<div class="mysticky-welcomebar-setting-content-right">
							<input type="text" id="mysticky_bar_text" class="mystickyinput" name="mysticky_option_welcomebar[mysticky_welcomebar_bar_text]" value="<?php echo esc_attr( stripslashes($welcomebar['mysticky_welcomebar_bar_text']));?>"  />
						</div>
					</div>
					<div class="mysticky-welcomebar-setting-content">
						<label><?php _e('Show X', 'myStickymenu'); ?></label>
						<div class="mysticky-welcomebar-setting-content-right">
							<label>
								<input name="mysticky_option_welcomebar[mysticky_welcomebar_x_desktop]" value= "desktop" type="checkbox" <?php checked( @$welcomebar['mysticky_welcomebar_x_desktop'], 'desktop' );?> />
								<?php _e( 'Desktop', 'mystickymenu' );?>
							</label>
							<label>
								<input name="mysticky_option_welcomebar[mysticky_welcomebar_x_mobile]" value= "mobile" type="checkbox" <?php checked( @$welcomebar['mysticky_welcomebar_x_mobile'], 'mobile' );?> />
								<?php _e( 'Mobile', 'mystickymenu' );?>
							</label>
						</div>
					</div>
				</div>
				<div class="mysticky-welcomebar-setting-block">
					<div class="mysticky-welcomebar-subheader-title">
						<h4><?php _e('Button', 'myStickymenu'); ?></h4>
					</div>
					<div class="mysticky-welcomebar-setting-content">
						<label><?php _e('Button', 'myStickymenu'); ?></label>
						<div class="mysticky-welcomebar-setting-content-right">
							<label>
								<input name="mysticky_option_welcomebar[mysticky_welcomebar_btn_desktop]" value= "desktop" type="checkbox" <?php checked( @$welcomebar['mysticky_welcomebar_btn_desktop'], 'desktop' );?> />
								<?php _e( 'Desktop', 'mystickymenu' );?>
							</label>
							<label>
								<input name="mysticky_option_welcomebar[mysticky_welcomebar_btn_mobile]" value= "mobile" type="checkbox"<?php checked( @$welcomebar['mysticky_welcomebar_btn_mobile'], 'mobile' );?> />
								<?php _e( 'Mobile', 'mystickymenu' );?>
							</label>
						</div>
					</div>
					<div class="mysticky-welcomebar-setting-content">
						<label><?php _e('Button Color', 'myStickymenu'); ?></label>
						<div class="mysticky-welcomebar-setting-content-right mysticky-welcomebar-colorpicker">
							<input type="text" id="mysticky_welcomebar_btncolor" name="mysticky_option_welcomebar[mysticky_welcomebar_btncolor]" class="my-color-field" value="<?php echo esc_attr($welcomebar['mysticky_welcomebar_btncolor']);?>" />
						</div>
					</div>
					<div class="mysticky-welcomebar-setting-content">
						<label><?php _e('Button Text Color', 'myStickymenu'); ?></label>
						<div class="mysticky-welcomebar-setting-content-right mysticky-welcomebar-colorpicker">
							<input type="text" id="mysticky_welcomebar_btntxtcolor" name="mysticky_option_welcomebar[mysticky_welcomebar_btntxtcolor]" class="my-color-field" value="<?php echo $welcomebar['mysticky_welcomebar_btntxtcolor'];?>" />
						</div>
					</div>
					<div class="mysticky-welcomebar-setting-content">
						<label><?php _e('Button Text', 'myStickymenu'); ?></label>
						<div class="mysticky-welcomebar-setting-content-right">
							<input type="text" id="mysticky_welcomebar_btn_text" class="mystickyinput" name="mysticky_option_welcomebar[mysticky_welcomebar_btn_text]" value="<?php echo $welcomebar['mysticky_welcomebar_btn_text'];?>"  />
						</div>
					</div>
					<div class="mysticky-welcomebar-setting-content">
						<label><?php _e('Action', 'myStickymenu'); ?></label>
						<div class="mysticky-welcomebar-setting-content-right mysticky-welcomebar-setting-redirect-wrap">
							<div class="mysticky-welcomebar-setting-action">
								<select name="mysticky_option_welcomebar[mysticky_welcomebar_actionselect]" class="mysticky-welcomebar-action">
									<option value="redirect_to_url" <?php selected( @$welcomebar['mysticky_welcomebar_actionselect'], 'redirect_to_url' ); ?>><?php _e( 'Redirect to URL', 'myStickymenu' );?></option>
									<option value="close_bar" <?php selected( @$welcomebar['mysticky_welcomebar_actionselect'], 'close_bar' ); ?>><?php _e( 'Close bar', 'myStickymenu' );?></option>
								</select>
							</div>
							<div class="mysticky-welcomebar-setting-action mysticky-welcomebar-redirect" <?php if ( $welcomebar['mysticky_welcomebar_actionselect'] == 'close_bar' ) : ?> style="display:none;" <?php endif;?> >
								<input type="text" id="mysticky_welcomebar_redirect" class="mystickyinput" name="mysticky_option_welcomebar[mysticky_welcomebar_redirect]" value="<?php echo esc_url($welcomebar['mysticky_welcomebar_redirect']);?>" placeholder="<?php echo esc_url("https://www.yourdomain.com"); ?>"  />
							</div>
							<div class="mysticky-welcomebar-setting-newtab mysticky-welcomebar-redirect" <?php if ( $welcomebar['mysticky_welcomebar_actionselect'] == 'close_bar' ) : ?> style="display:none;" <?php endif;?> >
								<label>
									<input name="mysticky_option_welcomebar[mysticky_welcomebar_redirect_newtab]" value= "1" type="checkbox" disabled />
									<?php _e( 'Open in a new tab', 'mystickymenu' );?>
								</label>
								<span class="myStickymenu-upgrade"><a class="sticky-header-upgrade-now" href="#" target="_blank"><?php _e( 'Upgrade Now', 'mystickymenu' );?></a></span>
							</div>
						</div>
					</div>
					<div class="mysticky-welcomebar-setting-content mysticky-welcomebar-setting-remove-getbar">
						<label><?php _e('Remove Get Bar', 'myStickymenu'); ?></label>
						<div class="mysticky-welcomebar-setting-content-right">
							<div class="mysticky-welcomebar-switch">
								<input type="checkbox" id="mysticky-welcomebar-remove-getbar" name="mysticky_option_welcomebar[mysticky_welcomebar_remove_getbar]" value="1" disabled />
								<span class="slider"></span>
							</div>
							<span class="myStickymenu-upgrade"><a class="sticky-header-upgrade-now" href="#" target="_blank"><?php _e( 'Upgrade Now', 'mystickymenu' );?></a></span>
						</div>
					</div>
				</div>
				<div class="mysticky-welcomebar-setting-block">
					<div class="mysticky-welcomebar-subheader-title">
						<h4><?php _e('Display Rules', 'myStickymenu'); ?></h4>
					</div>
					<div class="mysticky-welcomebar-upgrade-main mysticky_device_upgrade">
						<span class="myStickymenu-upgrade">
							<a class="sticky-header-upgrade-now" href="#" target="_blank"><?php _e( ' Upgrade Now', 'mystickymenu' );?></a>
						</span>
						<div class="mysticky-welcomebar-setting-content">
							<label><?php _e('Devices', 'myStickymenu'); ?></label>
							<div class="mysticky-welcomebar-setting-content-right">
								<label>
									<input name="mysticky_option_welcomebar[mysticky_welcomebar_device_desktop]" value= "desktop" type="checkbox" checked disabled />
									<?php _e( 'Desktop', 'mystickymenu' );?>
								</label>
								<label>
									<input name="mysticky_option_welcomebar[mysticky_welcomebar_device_mobile]" value= "mobile" type="checkbox" checked disabled />
									<?php _e( 'Mobile', 'mystickymenu' );?>
								</label>
							</div>
						</div>
						<div class="mysticky-welcomebar-setting-content">
							<label><?php _e('Trigger', 'myStickymenu'); ?></label>
							<div class="mysticky-welcomebar-setting-content-right">
								<div class="mysticky-welcomebar-setting-action mysticky-welcomebar-trigger-wrap">
									<label>
										<input type="radio" name="mysticky_option_welcomebar[mysticky_welcomebar_trigger]" value="after_a_few_seconds" checked disabled />&nbsp;<?php _e( 'After a few seconds', 'myStickymenu' );?>
									</label>
									<label>
										<input type="radio" name="mysticky_option_welcomebar[mysticky_welcomebar_trigger]" value="after_scroll" disabled />&nbsp;<?php _e( 'After Scroll', 'myStickymenu' );?>
									</label>								
								</div>
								<div class="mysticky-welcomebar-setting-action mysticky-welcomebar-triggersec">
									<div class="px-wrap">
										<input type="number" class="" min="0" step="1" id="mysticky_welcomebar_triggersec" name="mysticky_option_welcomebar[mysticky_welcomebar_triggersec]" value="0" disabled />
										<span class="input-px"><?php echo ( isset($welcomebar['mysticky_welcomebar_trigger']) && $welcomebar['mysticky_welcomebar_trigger'] == 'after_scroll' ) ? '%' : 'Sec'; ?></span>
									</div>
								</div>
							</div>
						</div>
						<div class="mysticky-welcomebar-setting-content">
							<label><?php _e('Expiry date', 'myStickymenu'); ?></label>
							<div class="mysticky-welcomebar-setting-content-right">
								<div class="mysticky-welcomebar-expirydate">
									<input type="text" id="mysticky_welcomebar_expirydate" name="mysticky_option_welcomebar[mysticky_welcomebar_expirydate]" placeholder="<?php _e('No expiry date', 'myStickymenu'); ?>" value="" disabled />
									<span class="dashicons dashicons-calendar-alt"></span>
								</div>
							</div>
						</div>
						<div class="mysticky-welcomebar-setting-content show-on-apper">
						<label><?php _e('Page targeting', 'myStickymenu'); ?></label>
						<div class="mysticky-welcomebar-setting-content-right">
							<a href="javascript:void(0);" class="create-rule" id="create-rule"><?php esc_html_e( "Add Rule", "mystickyelements" );?></a>
						</div>
						<div class="mysticky-welcomebar-page-options-html" style="display: none">
							<div class="mysticky-welcomebar-page-option">
								<div class="url-content">
									<div class="mysticky-welcomebar-url-select">
										<select name="mysticky_option_welcomebar[page_settings][__count__][shown_on]" id="url_shown_on___count___option" disabled>
											<option value="show_on"><?php esc_html_e("Show on", "mysticky" );?></option>
											<option value="not_show_on"><?php esc_html_e("Don't show on", "mysticky" );?></option>
										</select>
									</div>
									<div class="mysticky-welcomebar-url-option">
										<select class="mysticky-welcomebar-url-options" name="mysticky_option_welcomebar[page_settings][__count__][option]" id="url_rules___count___option" disabled>
											<option selected="selected" disabled value=""><?php esc_html_e("Select Rule", "mysticky" );?></option>
										</select>
									</div>
									<div class="mysticky-welcomebar-url-box">
										<span class='mysticky-welcomebar-url'><?php echo site_url("/"); ?></span>
									</div>
									<div class="mysticky-welcomebar-url-values">
										<input type="text" value="" name="mysticky_option_welcomebar[page_settings][__count__][value]" id="url_rules___count___value" disabled />
									</div>
									<div class="clear"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="mysticky-welcomebar-page-options mysticky-welcomebar-setting-content-right" id="mysticky-welcomebar-page-options"></div>
					</div>
				</div>
			</div>
			<div class="mysticky-welcomebar-setting-right">
				<div class="mysticky-welcomebar-header-title">
					<h3><?php _e('Preview', 'mystickyelements'); ?></h3>
				</div>
				<div class="mysticky-welcomebar-preview-screen">
					<link href="https://fonts.googleapis.com/css?family=<?php echo $welcomebar['mysticky_welcomebar_font'] ?>:400,600,700|Lato:400,500,600,700" rel="stylesheet" type="text/css" class="sfba-google-font">
					<div class="mysticky-welcomebar-fixed mysticky-welcomebar-display-desktop <?php echo $display_main_class; ?>" >
						<div class="mysticky-welcomebar-content">
							<p><?php echo isset($welcomebar['mysticky_welcomebar_bar_text'])? stripslashes($welcomebar['mysticky_welcomebar_bar_text']) :"Get 30% off your first purchase";?></p>
						</div>
						<div class="mysticky-welcomebar-btn">
							<a href="#" ><?php echo isset($welcomebar['mysticky_welcomebar_btn_text']) ? $welcomebar['mysticky_welcomebar_btn_text'] : "Got it!";?></a>
						</div>
						<a href="javascript:void(0)" class="mysticky-welcomebar-close">X</a>
						<a href="#" class="mysticky-welcomebar-getbar"><?php _e( 'Get Bar', 'mystickymenu' );?></a>
					</div>
				</div>
			</div>
		</div>
		<div class="mysticky-welcomebar-submit">			
			<input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('Save', 'mystickymenu');?>">
		</div>
		<input type="hidden" name="nonce" value="<?php echo $nonce; ?>">
		<input type="hidden" name="active_tab_element" value="1">
		<input type="hidden" id="save_welcome_bar" name="save_welcome_bar" value="">
		
	</form>
	<form class="mysticky-welcomebar-form-reset" method="post" action="#">
		<div class="mysticky-welcomebar-submit">
			<input type="submit" name="mysticky_welcomebar_reset" id="reset" class="button button-secondary" value="<?php _e('Reset', 'mystickymenu');?>">
		</div>
		<input type="hidden" name="nonce_reset" value="<?php echo $nonce_reset; ?>">
		<input type="hidden" name="active_tab_element" value="1">
	</form>
	<div id="mysticky-welcomebar-save-confirm" style="display:none;" title="<?php esc_attr_e( 'Welcome Bar is currently off', 'mystickymenu' ); ?>">
		<p>
			<?php _e('Your Welcome Bar is currently turned off, would you like to save and show it on your site?', 'mystickymenu' ); ?>
		</p>
	</div>
	<style>
		.mysticky-welcomebar-fixed {
			height: 60px;
			background-color: <?php echo $welcomebar['mysticky_welcomebar_bgcolor'] ?>;
			font-family: <?php echo $welcomebar['mysticky_welcomebar_font'] ?>;
			position: absolute;
			left: 0;
			right: 0;
			display: none;
			align-items: center;
			justify-content: center;
			padding: 20px 30px 20px 10px;
			z-index: 9999999;
		}
		.mysticky-welcomebar-preview-mobile-screen .mysticky-welcomebar-fixed{
			padding: 0 25px;
		}
		.mysticky-welcomebar-display-desktop.mysticky-welcomebar-fixed {
			display: flex;
		}
		.mysticky-welcomebar-position-top {
			top:0;
		}
		.mysticky-welcomebar-position-bottom {
			bottom:0;
		}
		.mysticky-welcomebar-fixed .mysticky-welcomebar-content p {
			color: <?php echo $welcomebar['mysticky_welcomebar_bgtxtcolor'] ?>;
			font-size: <?php echo $welcomebar['mysticky_welcomebar_fontsize'] ?>px;
			font-family: inherit;
			margin: 0;
			padding: 0;
			line-height: 1.2;			
			font-weight: 400;
		}
		.mysticky-welcomebar-fixed .mysticky-welcomebar-btn {
			padding-left: 30px;
			display: none;
		}
		.mysticky-welcomebar-fixed.mysticky-welcomebar-btn-desktop .mysticky-welcomebar-btn {
			display: block;
		}
		.mysticky-welcomebar-fixed .mysticky-welcomebar-btn a {
			background-color: <?php echo $welcomebar['mysticky_welcomebar_btncolor'] ?>;
			font-family: inherit;
			color: <?php echo $welcomebar['mysticky_welcomebar_btntxtcolor'] ?>;
			border-radius: 4px;
			text-decoration: none;
			display: inline-block;
			vertical-align: top;
			line-height: 1.2;
			font-size: <?php echo $welcomebar['mysticky_welcomebar_fontsize'] ?>px;
			font-weight: 400;
			padding: 5px 20px;
			white-space: nowrap;
		}
		.mysticky-welcomebar-fixed .mysticky-welcomebar-btn a:hover {
			/*opacity: 0.7;*/
			-moz-box-shadow: 1px 2px 4px rgba(0, 0, 0,0.5);
			-webkit-box-shadow: 1px 2px 4px rgba(0, 0, 0, 0.5);
			box-shadow: 1px 2px 4px rgba(0, 0, 0, 0.5);
		}
		.mysticky-welcomebar-fixed .mysticky-welcomebar-close {
			display: none;
			vertical-align: top;
			width: 20px;
			height: 20px;
			text-align: center;
			text-decoration: none;
			line-height: 20px;
			border-radius: 5px;
			color: #000;
			position: absolute;
			font-family: Lato;
			top: 5px;
			right: 5px;
			-webkit-transition: all 0.5s ease 0s;
			-moz-transition: all 0.5s ease 0s;
			transition: all 0.5s ease 0s;
			-webkit-transform-origin: 50% 50%;
			-moz-transform-origin: 50% 50%;
			transform-origin: 50% 50%;
		}
		.mysticky-welcomebar-fixed .mysticky-welcomebar-close:hover {
			opacity: 0.5;
			-webkit-transform: rotate(180deg);
			-moz-transform: rotate(180deg);
			transform: rotate(180deg);
		}
		.mysticky-welcomebar-fixed.mysticky-welcomebar-showx-desktop .mysticky-welcomebar-close {
			display: inline-block;
		}
		.mysticky-welcomebar-getbar:focus,
		.mysticky-welcomebar-getbar:active,
		.mysticky-welcomebar-getbar {
			background-color: rgba(140,140,140,0.5) !important;
			border-radius: 8px !important;
			color: #FFFFFF !important;
			position: absolute !important;
			padding: 3px !important;
			bottom: 3px !important;
			left: 3px !important;
			font-size: 10px !important;
			line-height: 1.4 !important;
			margin: 0 !important;
			display: inline-block !important;
			vertical-align: top !important;
			font-family: Poppins !important;
			text-decoration: none !important;
			visibility: visible !important;
		}
		.mysticky-welcomebar-getbar:hover {
			color: #000000 !important;
			opacity: 0.5 !important;
		}	
		
		@media only screen and (max-width: 1024px) {
			.mysticky-welcomebar-fixed {
				padding: 0 20px 0 10px;
			}
			.mysticky-welcomebar-fixed .mysticky-welcomebar-close {
				width: 20px;
				height: 20px;
				line-height: 20px;
				right: 0px;
			}
		}
	</style>
	
	<?php
}

function mysticky_welcomebar_pro_widget_default_fields() {
	return array(
			'mysticky_welcomebar_position' 			=> 'top',
			'mysticky_welcomebar_height' 			=> '60',
			'mysticky_welcomebar_bgcolor' 			=> '#03ed96',
			'mysticky_welcomebar_bgtxtcolor' 		=> '#000000',
			'mysticky_welcomebar_font' 				=> 'Poppins',
			'mysticky_welcomebar_fontsize' 			=> '16',
			'mysticky_welcomebar_bar_text' 			=> 'Get 30% off your first purchase',
			'mysticky_welcomebar_x_desktop' 		=> 'desktop',
			'mysticky_welcomebar_x_mobile' 			=> 'mobile',
			'mysticky_welcomebar_btn_desktop' 		=> 'desktop',
			'mysticky_welcomebar_btn_mobile' 		=> 'mobile',
			'mysticky_welcomebar_btncolor' 			=> '#000000',
			'mysticky_welcomebar_btntxtcolor' 		=> '#ffffff',
			'mysticky_welcomebar_btn_text' 			=> 'Got it!',
			'mysticky_welcomebar_actionselect'		=> 'close_bar',
			'mysticky_welcomebar_redirect' 			=> 'https://www.yourdomain.com',
			'mysticky_welcomebar_redirect_newtab' 	=> '',
			'mysticky_welcomebar_device_desktop'	=> 'desktop',
			'mysticky_welcomebar_device_mobile' 	=> 'mobile',
			'mysticky_welcomebar_trigger' 			=> 'after_a_few_seconds',
			'mysticky_welcomebar_triggersec' 		=> '0',
			'mysticky_welcomebar_expirydate' 		=> '',
			'mysticky_welcomebar_page_settings' 	=> '',
	);
}

function mysticky_welcome_bar_frontend(){
	$welcomebar = get_option( 'mysticky_option_welcomebar' );
	
	if ( ( isset($welcomebar['mysticky_welcomebar_expirydate']) && $welcomebar['mysticky_welcomebar_expirydate'] !='' && strtotime( date('m/d/Y')) > strtotime($welcomebar['mysticky_welcomebar_expirydate']) ) || !isset($welcomebar['mysticky_welcomebar_enable'] ) ) {
		return;
	}
	$mysticky_welcomebar_showx_desktop = $mysticky_welcomebar_showx_mobile = '';
	$mysticky_welcomebar_btn_desktop = $mysticky_welcomebar_btn_mobile = '';
	$mysticky_welcomebar_display_desktop = $mysticky_welcomebar_display_mobile = '';
	if( isset($welcomebar['mysticky_welcomebar_x_desktop']) ) {
		$mysticky_welcomebar_showx_desktop = ' mysticky-welcomebar-showx-desktop';
	}
	if( isset($welcomebar['mysticky_welcomebar_x_mobile']) ) {
		$mysticky_welcomebar_showx_mobile = ' mysticky-welcomebar-showx-mobile';
	}
	if( isset($welcomebar['mysticky_welcomebar_btn_desktop']) ) {
		$mysticky_welcomebar_btn_desktop = ' mysticky-welcomebar-btn-desktop';
	}
	if( isset($welcomebar['mysticky_welcomebar_btn_mobile']) ) {
		$mysticky_welcomebar_btn_mobile = ' mysticky-welcomebar-btn-mobile';
	}
	
	$mysticky_welcomebar_display_desktop = ' mysticky-welcomebar-display-desktop';
	$mysticky_welcomebar_display_mobile = ' mysticky-welcomebar-display-mobile';
	
	$display_main_class = "mysticky-welcomebar-position-" . $welcomebar['mysticky_welcomebar_position'] . $mysticky_welcomebar_showx_desktop . $mysticky_welcomebar_showx_mobile . $mysticky_welcomebar_btn_desktop . $mysticky_welcomebar_btn_mobile . $mysticky_welcomebar_display_desktop . $mysticky_welcomebar_display_mobile;
	
	if( isset($welcomebar['mysticky_welcomebar_actionselect']) ) {
		if( $welcomebar['mysticky_welcomebar_actionselect'] == 'redirect_to_url' ) {
			$mysticky_welcomebar_actionselect_url = esc_url( $welcomebar['mysticky_welcomebar_redirect'] );
		} else {
			$mysticky_welcomebar_actionselect_url = 'javascript:void(0)';
		}
	}
	if( !isset($welcomebar['mysticky_welcomebar_enable']) ) {
		if ( $welcomebar['mysticky_welcomebar_position'] == 'top' ) {
			$welcomebar_enable_block = "top: -60px";
		} else {
			$welcomebar_enable_block = "bottom: -60px";
		}
	}
	
	?>
	<div class="mysticky-welcomebar-fixed <?php echo $display_main_class; ?>" style="<?php echo $welcomebar_enable_block; ?>" data-after-triger="after_a_few_seconds" data-triger-sec="0" data-position="<?php echo esc_attr($welcomebar['mysticky_welcomebar_position']);?>" data-height="<?php echo esc_attr($welcomebar['mysticky_welcomebar_height']);?>" data-rediect="<?php echo esc_attr($welcomebar['mysticky_welcomebar_actionselect']);?>">
		<div class="mysticky-welcomebar-content">
			<p><?php echo isset($welcomebar['mysticky_welcomebar_bar_text'])? stripslashes($welcomebar['mysticky_welcomebar_bar_text']) :"Get 30% off your first purchase";?></p>
		</div>
		<div class="mysticky-welcomebar-btn">
			<a href="<?php echo $mysticky_welcomebar_actionselect_url; ?>" <?php if( isset($welcomebar['mysticky_welcomebar_redirect_newtab']) && $welcomebar['mysticky_welcomebar_actionselect'] == 'redirect_to_url' && $welcomebar['mysticky_welcomebar_redirect_newtab']== 1):?> target="_blank" <?php endif;?>><?php echo isset($welcomebar['mysticky_welcomebar_btn_text'])?$welcomebar['mysticky_welcomebar_btn_text']:"Got it!";?></a>
		</div>
		<a href="javascript:void(0)" class="mysticky-welcomebar-close">X</a>
		<a href="https://premio.io/downloads/mystickymenu/?utm_source=credit&domain=<?php echo $_SERVER['HTTP_HOST']; ?>" class="mysticky-welcomebar-getbar" target="_blank"><?php _e( 'Get Bar', 'mystickymenu' );?></a>
	</div>
	<script>		
	
	jQuery(document).ready(function($){
		if( jQuery( '.mysticky-welcomebar-fixed' ).data('position') == 'top' ) {
			jQuery( '.mysticky-welcomebar-fixed' ).css( 'top', '-60px' );
		} else {
			jQuery( '.mysticky-welcomebar-fixed' ).css( 'bottom', '-60px' );
		}			
		if ( sessionStorage.getItem("welcomebar_close") === null ){
			
			var after_trigger = jQuery( '.mysticky-welcomebar-fixed' ).data('after-triger');
			
			if ( after_trigger == 'after_a_few_seconds' ) {				
				if ( $( '.mysticky-welcomebar-fixed' ).hasClass( 'mysticky-welcomebar-display-desktop' ) ) {
					if ( $( window ).width() > 767 ) {
						var trigger_sec = jQuery( '.mysticky-welcomebar-fixed' ).data('triger-sec') * 1000;						
						var welcombar_position = $( '.mysticky-welcomebar-fixed' ).data('position');
						var welcombar_height = $( '.mysticky-welcomebar-fixed' ).data('height');
						setTimeout(function(){
							jQuery( '.mysticky-welcomebar-fixed' ).addClass( 'mysticky-welcomebar-animation' );
							if ( welcombar_position == 'top' ) {
								jQuery( '.mysticky-welcomebar-fixed' ).addClass( 'mysticky-welcomebar-animation' );
								jQuery( '.mysticky-welcomebar-fixed' ).css( 'top', '0' );
								jQuery( '.mysticky-welcomebar-fixed' ).css( 'opacity', '1' );
								$( 'html' ).css( 'margin-bottom', '' );
								$( 'html' ).attr( 'style', 'margin-top: 60px !important' );
								$( '#mysticky-nav' ).css( 'top', '60px' );
							} else {
								jQuery( '.mysticky-welcomebar-fixed' ).css( 'bottom', '0' );
								jQuery( '.mysticky-welcomebar-fixed' ).css( 'opacity', '1' );
								$( 'html' ).css( 'margin-top', '' );
								$( 'html' ).attr( 'style', 'margin-bottom: 60px !important' );
							}
						}, trigger_sec );
					}
				}
			}
			if ( $( window ).width() < 767 ) {
				if ( after_trigger == 'after_a_few_seconds' ) {
					if ( $( '.mysticky-welcomebar-fixed' ).hasClass( 'mysticky-welcomebar-display-mobile' ) ) {
						var trigger_sec = jQuery( '.mysticky-welcomebar-fixed' ).data('triger-sec') * 1000;
						var welcombar_position = $( '.mysticky-welcomebar-fixed' ).data('position');
						var welcombar_height = $( '.mysticky-welcomebar-fixed' ).data('height');
						setTimeout(function(){
							jQuery( '.mysticky-welcomebar-fixed' ).addClass( 'mysticky-welcomebar-animation' );
							if ( welcombar_position == 'top' ) {
								jQuery( '.mysticky-welcomebar-fixed' ).css( 'top', '0' );
								jQuery( '.mysticky-welcomebar-fixed' ).css( 'opacity', '1' );
								$( 'html' ).css( 'margin-bottom', '' );
								$( 'html' ).attr( 'style', 'margin-top: 60px !important' );
								$( '#mysticky-nav' ).css( 'top', '60px' );
							} else {
								jQuery( '.mysticky-welcomebar-fixed' ).css( 'bottom', '0' );
								jQuery( '.mysticky-welcomebar-fixed' ).css( 'opacity', '1' );
								$( 'html' ).css( 'margin-top', '' );
								$( 'html' ).attr( 'style', 'margin-bottom: 60px !important' );
							}
						}, trigger_sec );
					}
				}
			}
		}
		$( window ).resize( function(){				
			if ( sessionStorage.getItem("welcomebar_close") === null ){
				var after_trigger = jQuery( '.mysticky-welcomebar-fixed' ).data('after-triger');
				if ( after_trigger == 'after_a_few_seconds' ) {
					var trigger_sec = jQuery( '.mysticky-welcomebar-fixed' ).data('triger-sec') * 1000;
					var welcombar_position = $( '.mysticky-welcomebar-fixed' ).data('position');
					var welcombar_height = $( '.mysticky-welcomebar-fixed' ).data('height');
					if ( $( window ).width() < 767 ) {
						if ( $( '.mysticky-welcomebar-fixed' ).hasClass( 'mysticky-welcomebar-display-mobile' ) ) {
							setTimeout(function(){
								jQuery( '.mysticky-welcomebar-fixed' ).addClass( 'mysticky-welcomebar-animation' );
								if ( welcombar_position == 'top' ) {
									jQuery( '.mysticky-welcomebar-fixed' ).css( 'top', '0' );
									jQuery( '.mysticky-welcomebar-fixed' ).css( 'opacity', '1' );
									$( 'html' ).css( 'margin-bottom', '' );
									$( 'html' ).attr( 'style', 'margin-top: 60px !important' );
									$( '#mysticky-nav' ).css( 'top', '60px' );
								} else {
									jQuery( '.mysticky-welcomebar-fixed' ).css( 'bottom', '0' );
									jQuery( '.mysticky-welcomebar-fixed' ).css( 'opacity', '1' );
									$( 'html' ).css( 'margin-top', '' );
									$( 'html' ).attr( 'style', 'margin-bottom: 60px !important' );
								}
							}, trigger_sec );
						}
					} else {
						if ( $( '.mysticky-welcomebar-fixed' ).hasClass( 'mysticky-welcomebar-display-desktop' ) ) {
							setTimeout(function(){
								jQuery( '.mysticky-welcomebar-fixed' ).addClass( 'mysticky-welcomebar-animation' );
								if ( welcombar_position == 'top' ) {
									jQuery( '.mysticky-welcomebar-fixed' ).css( 'top', '0' );
									jQuery( '.mysticky-welcomebar-fixed' ).css( 'opacity', '1' );
									$( 'html' ).css( 'margin-bottom', '' );
									$( 'html' ).attr( 'style', 'margin-top: 60px !important' );
									$( '#mysticky-nav' ).css( 'top', '60px' );
								} else {
									jQuery( '.mysticky-welcomebar-fixed' ).css( 'bottom', '0' );
									jQuery( '.mysticky-welcomebar-fixed' ).css( 'opacity', '1' );
									$( 'html' ).css( 'margin-top', '' );
									$( 'html' ).attr( 'style', 'margin-bottom: 60px !important' );
								}
							}, trigger_sec );
						}
					}
				}
			}				
		} );
		
		jQuery(window).scroll(function(){				
			if ( sessionStorage.getItem("welcomebar_close") === null ){
				var welcombar_height = $( '.mysticky-welcomebar-fixed' ).data('height');
				var welcombar_position = $( '.mysticky-welcomebar-fixed' ).data('position');
				if ( welcombar_position == 'top' ) {					
					$( '#mysticky-nav' ).css( 'top', welcombar_height + 'px' );
				}
				if ( after_trigger === 'after_scroll' ) {					
					var scroll = 100 * $(window).scrollTop() / ($(document).height() - $(window).height());  
					var after_scroll_val = jQuery( '.mysticky-welcomebar-fixed' ).data('triger-sec');
					var welcombar_position = $( '.mysticky-welcomebar-fixed' ).data('position');
					var welcombar_height = $( '.mysticky-welcomebar-fixed' ).data('height');
					if( scroll > after_scroll_val ) {
						if ( $( '.mysticky-welcomebar-fixed' ).hasClass( 'mysticky-welcomebar-display-desktop' ) ) {
							if ( $( window ).width() > 767 ) {
								jQuery( '.mysticky-welcomebar-fixed' ).addClass( 'mysticky-welcomebar-animation' );
								if ( welcombar_position == 'top' ) {
									jQuery( '.mysticky-welcomebar-fixed' ).css( 'top', '0' );
									jQuery( '.mysticky-welcomebar-fixed' ).css( 'opacity', '1' );
									$( 'html' ).css( 'margin-bottom', '' );
									$( 'html' ).attr( 'style', 'margin-top: 60px !important' );
									$( '#mysticky-nav' ).css( 'top', '60px' );
								} else {
									jQuery( '.mysticky-welcomebar-fixed' ).css( 'bottom', '0' );
									jQuery( '.mysticky-welcomebar-fixed' ).css( 'opacity', '1' );
									$( 'html' ).css( 'margin-top', '' );
									$( 'html' ).attr( 'style', 'margin-bottom: 60px !important' );
								}
							}
						}
						if ( $( '.mysticky-welcomebar-fixed' ).hasClass( 'mysticky-welcomebar-display-mobile' ) ) {
							if ( $( window ).width() < 767 ) {
								jQuery( '.mysticky-welcomebar-fixed' ).addClass( 'mysticky-welcomebar-animation' );
								if ( welcombar_position == 'top' ) {
									jQuery( '.mysticky-welcomebar-fixed' ).css( 'top', '0' );
									jQuery( '.mysticky-welcomebar-fixed' ).css( 'opacity', '1' );
									$( 'html' ).css( 'margin-bottom', '' );
									$( 'html' ).attr( 'style', 'margin-top: 60px !important' );
									$( '#mysticky-nav' ).css( 'top', '60px' );
								} else {
									jQuery( '.mysticky-welcomebar-fixed' ).css( 'bottom', '0' );
									jQuery( '.mysticky-welcomebar-fixed' ).css( 'opacity', '1' );
									$( 'html' ).css( 'margin-top', '' );
									$( 'html' ).attr( 'style', 'margin-bottom: 60px !important' );
								}
							}
						}
					}
				}
			}
			
		});
		jQuery( '.mysticky-welcomebar-close, .mysticky-welcomebar-btn a' ).on( 'click', function(){				
			sessionStorage.setItem('welcomebar_close', 'close');				
			var welcombar_position = $( '.mysticky-welcomebar-fixed' ).data('position');
			var welcombar_height = $( '.mysticky-welcomebar-fixed' ).data('height');				
			jQuery( '.mysticky-welcomebar-fixed' ).slideUp( 'slow' );
			if ( welcombar_position == 'top' ) {
				jQuery( '.mysticky-welcomebar-fixed' ).css( 'top', '-' + welcombar_height + 'px' );
			} else {
				jQuery( '.mysticky-welcomebar-fixed' ).css( 'bottom', '-' + welcombar_height + 'px' );
			}
			jQuery( 'html' ).css( 'margin-top', '' );
			jQuery( 'html' ).css( 'margin-bottom', '' );
			$( '#mysticky-nav' ).css( 'top', '0px' );
		} );
	});
	</script>
	<style>
	.mysticky-welcomebar-fixed {
		height: 60px;
		background-color: <?php echo $welcomebar['mysticky_welcomebar_bgcolor'] ?>;
		font-family: <?php echo $welcomebar['mysticky_welcomebar_font'] ?>;
		position: fixed;
		left: 0;
		right: 0;
		display: flex;
		align-items: center;
		justify-content: center;
		padding: 20px 50px;
		z-index: 9999999;
		opacity: 0;
	}
	.mysticky-welcomebar-animation {
		-webkit-transition: all 0.5s ease 0s;
		-moz-transition: all 0.5s ease 0s;
		transition: all 0.5s ease 0s;
	}
	.mysticky-welcomebar-position-top {
		top: -60px;
	}
	.mysticky-welcomebar-position-bottom {
		bottom: -60px;
	}
	.mysticky-welcomebar-display-desktop.mysticky-welcomebar-position-top.mysticky-welcomebar-fixed {
		top: 0;
	}
	.mysticky-welcomebar-display-desktop.mysticky-welcomebar-position-bottom.mysticky-welcomebar-fixed {
		bottom: 0;
	}
	.mysticky-welcomebar-fixed .mysticky-welcomebar-content p {
		color: <?php echo $welcomebar['mysticky_welcomebar_bgtxtcolor'] ?>;
		font-size: <?php echo $welcomebar['mysticky_welcomebar_fontsize'] ?>px;
		margin: 0;
		padding: 0;
		line-height: 1.2;
		font-family: inherit;
		font-weight: 400;
	}
	.mysticky-welcomebar-fixed .mysticky-welcomebar-btn {
		padding-left: 30px;
		display: none;
		line-height: 1;
	}
	.mysticky-welcomebar-fixed.mysticky-welcomebar-btn-desktop .mysticky-welcomebar-btn {
		display: block;
	}
	.mysticky-welcomebar-fixed .mysticky-welcomebar-btn a {
		background-color: <?php echo $welcomebar['mysticky_welcomebar_btncolor'] ?>;
		font-family: inherit;
		color: <?php echo $welcomebar['mysticky_welcomebar_btntxtcolor'] ?>;
		border-radius: 4px;
		text-decoration: none;
		display: inline-block;
		vertical-align: top;
		line-height: 1.2;
		font-size: <?php echo $welcomebar['mysticky_welcomebar_fontsize'] ?>px;
		font-weight: 400;
		padding: 5px 20px;
		white-space: nowrap;
	}
	.mysticky-welcomebar-fixed .mysticky-welcomebar-btn a:hover {
		/*opacity: 0.7;*/
		-moz-box-shadow: 1px 2px 4px rgba(0, 0, 0,0.5);
		-webkit-box-shadow: 1px 2px 4px rgba(0, 0, 0, 0.5);
		box-shadow: 1px 2px 4px rgba(0, 0, 0, 0.5);
	}
	.mysticky-welcomebar-fixed .mysticky-welcomebar-close {
		display: none;
		vertical-align: top;
		width: 30px;
		height: 30px;
		text-align: center;
		line-height: 30px;
		border-radius: 5px;
		color: #000;
		position: absolute;
		top: 5px;
		right: 10px;
		outline: none;
		font-family: Lato;
		text-decoration: none;
		-webkit-transition: all 0.5s ease 0s;
		-moz-transition: all 0.5s ease 0s;
		transition: all 0.5s ease 0s;
		-webkit-transform-origin: 50% 50%;
		-moz-transform-origin: 50% 50%;
		transform-origin: 50% 50%;
	}
	.mysticky-welcomebar-fixed .mysticky-welcomebar-close:hover {
		opacity: 0.5;
		-webkit-transform: rotate(180deg);
		-moz-transform: rotate(180deg);
		transform: rotate(180deg);
	}
	.mysticky-welcomebar-fixed .mysticky-welcomebar-close span.dashicons {
		font-size: 27px;
	}
	.mysticky-welcomebar-fixed.mysticky-welcomebar-showx-desktop .mysticky-welcomebar-close {
		display: inline-block;
	}
	.mysticky-welcomebar-getbar:focus,
	.mysticky-welcomebar-getbar:active,
	.mysticky-welcomebar-getbar {
		background-color: rgba(140,140,140,0.5) !important;
		border-radius: 8px !important;
		color: #FFFFFF !important;
		position: absolute !important;
		padding: 3px !important;
		bottom: 5px !important;
		left: 10px !important;
		font-size: 12px !important;
		line-height: 1.4 !important;
		margin: 0 !important;
		display: inline-block !important;
		vertical-align: top !important;
		font-family: Poppins !important;
		text-decoration: none !important;
		visibility: visible !important;
		outline: 0 !important;
	}
	.mysticky-welcomebar-getbar:hover {
		color: #000000 !important;
		opacity: 0.5 !important;
	}	
	@media only screen and (max-width: 767px) {			
		.mysticky-welcomebar-display-desktop.mysticky-welcomebar-position-top.mysticky-welcomebar-fixed {
			top: -60px;
		}
		.mysticky-welcomebar-display-desktop.mysticky-welcomebar-position-bottom.mysticky-welcomebar-fixed {
			bottom: -60px;
		}
		.mysticky-welcomebar-display-mobile.mysticky-welcomebar-position-top.mysticky-welcomebar-fixed {
			top: 0;
		}
		.mysticky-welcomebar-display-mobile.mysticky-welcomebar-position-bottom.mysticky-welcomebar-fixed {
			bottom: 0;
		}
		.mysticky-welcomebar-fixed.mysticky-welcomebar-showx-desktop .mysticky-welcomebar-close {
			display: none;
		}
		.mysticky-welcomebar-fixed.mysticky-welcomebar-showx-mobile .mysticky-welcomebar-close {
			display: inline-block;
		}
		.mysticky-welcomebar-fixed.mysticky-welcomebar-btn-desktop .mysticky-welcomebar-btn {
			display: none;
		}
		.mysticky-welcomebar-fixed.mysticky-welcomebar-btn-mobile .mysticky-welcomebar-btn {
			display: block;
		}
	}
	@media only screen and (max-width: 480px) {
		.mysticky-welcomebar-fixed {
			height: auto;
			min-height: 60px;
			padding: 15px 36px 35px 10px;
		}
		.mysticky-welcomebar-fixed .mysticky-welcomebar-btn {
			padding-left: 10px;
		}
		.mysticky-welcomebar-fixed .mysticky-welcomebar-close {
			right: 7px;
		}
	}
	</style>
	<?php
}
add_action( 'wp_footer', 'mysticky_welcome_bar_frontend' );