<?php
/**
 * Theme Options Page
 */
add_action('admin_menu', 'mb_theme_page');

function mb_theme_page() {
	if (count($_POST) > 0 && isset($_POST['mb_settings'])) {
		$options = array(
			'base_width_setting',
			'logo_img',
			'logo_alt',
			'main_email',
			'main_email_subject',
			'facebook_link',
			'twitter_user',
			'youtube_link',
			'linkedin_link',
			'display_rss',
			'slider_enable',
			'slider_prevnext',
			'slider_dots',
			'home_box1',
			'home_box1_link',
			'home_box2',
			'home_box2_link',
			'home_box3',
			'home_box3_link',
			'home_box4',
			'home_box4_link',
			'hb_title_enable',
			'home_blurb',
			'blurb_enable',
			'blurb_title_enable',
			'copyright',
			'keywords',
			'description',
			'analytics'			
		);
	
		foreach ($options as $opt) {
			delete_option ( 'mb_'.$opt, $_POST[$opt] );
			add_option ( 'mb_'.$opt, $_POST[$opt] );  
		}
	}

	add_menu_page(__('Theme Options'), __('Theme Options'), 'edit_themes', basename(__FILE__), 'mb_settings');
	add_submenu_page(__('Theme Options'), __('Theme Options'), 'edit_themes', basename(__FILE__), 'mb_settings');
}

function mb_settings() {?>
	<div class="wrap">
		<h2>Theme Options Panel</h2>
		<form method="post" action="">
			
			<fieldset style="border:1px solid #ddd; padding-bottom:20px; margin-top:20px;">
				<legend style="margin-left:5px; padding:0 5px;color:#2481C6; text-transform:uppercase;">
					<strong>General Settings</strong>
				</legend>
				<table class="form-table">
					<tr>
						<th colspan="2"><strong>Base Width Settings</strong></th>
					</tr>
					<tr>
						<th>
							<label for="base_width_setting">Base width (1000px or 1200px)</label>
						</th>
						<td>
							<select name="base_width_setting" id="base_width_setting">
								<option value="small" <?php if(get_option('mb_base_width_setting') == 'small'){?>selected="selected"<?php }?>>
									1000px
								</option>    
								<option value="large" <?php if(get_option('mb_base_width_setting') == 'large'){?>selected="selected"<?php }?>>
									1200px
								</option>
							</select>
						</td>
					</tr>
					<tr>
						<th colspan="2"><strong>Logo Settings</strong></th>
					</tr>
					<tr valign="top">
						<th scope="row">
							<label for="logo_img">Change logo (full path to logo image)</label>
						</th>
						<td>
							<input name="logo_img" type="text" id="logo_img" value="<?php echo get_option('mb_logo_img'); ?>" class="regular-text" /><br />
							<em>current logo:</em> <br />
							<img src="<?php echo get_option('mb_logo_img'); ?>" alt="<?php echo get_option('mb_logo_alt'); ?>" />
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">
							<label for="logo_alt">Logo ALT Text</label>
						</th>
						<td>
							<input name="logo_alt" type="text" id="logo_alt" value="<?php echo get_option('mb_logo_alt'); ?>" class="regular-text" />
						</td>
					</tr>
				</table>
			</fieldset>
			<p class="submit">
				<input type="submit" name="Submit" class="button-primary" value="Save Changes" />
				<input type="hidden" name="mb_settings" value="save" style="display:none;" />
			</p>
			
			<fieldset style="border:1px solid #ddd; padding-bottom:20px; margin-top:20px;">
				<legend style="margin-left:5px; padding:0 5px; color:#2481C6;text-transform:uppercase;">
					<strong>Social Links</strong>
				</legend>
				<table class="form-table">
					<tr valign="top">
						<th scope="row">
							<label for="main_email">Main Email Address</label>
						</th>
						<td>
							<input name="main_email" type="text" id="main_email" value="<?php echo get_option('mb_main_email'); ?>" class="regular-text" />
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">
							<label for="main_email_mailto_subject">Default Subject for Email</label>
						</th>
						<td>
							<input name="main_email_subject" type="text" id="main_email_subject" value="<?php echo get_option('mb_main_email_subject'); ?>" class="regular-text" />
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">
							<label for="twitter_user">Twitter Username (ex: @twitter)</label>
						</th>
						<td>
							<input name="twitter_user" type="text" id="twitter_user" value="<?php echo get_option('mb_twitter_user'); ?>" class="regular-text" />
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">
							<label for="facebook_link">Facebook link</label>
						</th>
						<td>
							<input name="facebook_link" type="text" id="facebook_link" value="<?php echo get_option('mb_facebook_link'); ?>" class="regular-text" />
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">
							<label for="youtube_link">YouTube Link</label>
						</th>
						<td>
							<input name="youtube_link" type="text" id="youtube_link" value="<?php echo get_option('mb_youtube_link'); ?>" class="regular-text" />
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">
							<label for="flickr_link">LinkedIn link</label>
						</th>
						<td>
							<input name="linkedin_link" type="text" id="linkedin_link" value="<?php echo get_option('mb_linkedin_link'); ?>" class="regular-text" />
						</td>
					</tr>
					<tr>
						<th>
							<label for="display_rss">Display RSS Link</label>
						</th>
						<td>
							<select name="display_rss" id="display_rss">
								<option value="no" <?php if(get_option('mb_display_rss') == 'no'){?>selected="selected"<?php }?>>
									No
								</option>
								<option value="yes" <?php if(get_option('mb_display_rss') == 'yes'){?>selected="selected"<?php }?>>
									Yes
								</option>
							</select>
						</td>
					</tr>
				</table>
			</fieldset>
			<p class="submit">
				<input type="submit" name="Submit" class="button-primary" value="Save Changes" />
				<input type="hidden" name="mb_settings" value="save" style="display:none;" />
			</p>

			<fieldset style="border:1px solid #ddd; padding-bottom:20px; margin-top:20px;">
				<legend style="margin-left:5px; padding:0 5px;color:#2481C6; text-transform:uppercase;">
					<strong>Slider Settings</strong>
				</legend>
				<table class="form-table">
					<tr>
						<th colspan="2"><strong>Homepage Slider</strong></th>
					</tr>
					<tr>
						<th>
							<label for="slider_enable">Display Slider on Homepage</label>
						</th>
						<td>
							<select name="slider_enable" id="slider_enable">
								<option value="yes" <?php if(get_option('mb_slider_enable') == 'yes'){?>selected="selected"<?php }?>>
									Yes
								</option>    
								<option value="no" <?php if(get_option('mb_slider_enable') == 'no'){?>selected="selected"<?php }?>>
									No
								</option>
							</select>
						</td>
					</tr>
					<tr>
						<th>
							<label for="slider_prevnext">Display Slider Previous/Next Buttons</label>
						</th>
						<td>
							<select name="slider_prevnext" id="slider_prevnext">
								<option value="yes" <?php if(get_option('mb_slider_prevnext') == 'yes'){?>selected="selected"<?php }?>>
									Yes
								</option>    
								<option value="no" <?php if(get_option('mb_slider_prevnext') == 'no'){?>selected="selected"<?php }?>>
									No
								</option>
							</select>
						</td>
					</tr>
					<tr>
						<th>
							<label for="slider_dots">Display Slider Index Controls</label>
						</th>
						<td>
							<select name="slider_dots" id="slider_dots">
								<option value="yes" <?php if(get_option('mb_slider_dots') == 'yes'){?>selected="selected"<?php }?>>
									Yes
								</option>    
								<option value="no" <?php if(get_option('mb_slider_dots') == 'no'){?>selected="selected"<?php }?>>
									No
								</option>
							</select>
						</td>
					</tr>
				</table>
			</fieldset>
			<p class="submit">
				<input type="submit" name="Submit" class="button-primary" value="Save Changes" />
				<input type="hidden" name="mb_settings" value="save" style="display:none;" />
			</p>
			
			<fieldset style="border:1px solid #ddd; padding-bottom:20px; margin-top:20px;">
				<legend style="margin-left:5px; padding:0 5px;color:#2481C6; text-transform:uppercase;">
					<strong>Homepage Settings</strong>
				</legend>
				<table class="form-table">
					<tr>
						<th colspan="2"><strong>Homepage Boxes </strong></th>
					</tr>
					<tr valign="top">
						<th scope="row">
							<label for="home_box1">Home Box1 Page</label>
						</th>
						<td>
							<?php wp_dropdown_pages("name=home_box1&show_option_none=".__('- Select -')."&selected=" .get_option('mb_home_box1')); ?>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">
							<label for="home_box1_link">Home Box1 "read more" link</label>
						</th>
						<td>
							<input name="home_box1_link" type="text" id="home_box1_link" value="<?php echo get_option('mb_home_box1_link'); ?>" class="regular-text" />
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">
							<label for="home_box2">Homepage Box2 Page</label>
						</th>
						<td>
							<?php wp_dropdown_pages("name=home_box2&show_option_none=".__('- Select -')."&selected=" .get_option('mb_home_box2')); ?>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">
							<label for="home_box2_link">Home Box2 "read more" link</label>
						</th>
						<td>
							<input name="home_box2_link" type="text" id="home_box2_link" value="<?php echo get_option('mb_home_box2_link'); ?>" class="regular-text" />
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">
							<label for="home_box3">Home Box3 Page</label>
						</th>
						<td>
							<?php wp_dropdown_pages("name=home_box3&show_option_none=".__('- Select -')."&selected=" .get_option('mb_home_box3')); ?>
						</td>
					</tr> 
					<tr valign="top">
						<th scope="row"><label for="home_box3_link">Home Box3 "read more" link</label></th>
						<td>
							<input name="home_box3_link" type="text" id="home_box3_link" value="<?php echo get_option('mb_home_box3_link'); ?>" class="regular-text" />
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">
							<label for="home_box4">Home Box4 Page</label>
						</th>
						<td>
							<?php wp_dropdown_pages("name=home_box4&show_option_none=".__('- Select -')."&selected=" .get_option('mb_home_box4')); ?>
						</td>
					</tr> 
					<tr valign="top">
						<th scope="row"><label for="home_box4_link">Home Box4 "read more" link</label></th>
						<td>
							<input name="home_box4_link" type="text" id="home_box4_link" value="<?php echo get_option('mb_home_box4_link'); ?>" class="regular-text" />
						</td>
					</tr>
					<tr>
						<th>
							<label for="hb_title_enable">Display Homebox Titles</label>
						</th>
						<td>
							<select name="hb_title_enable" id="hb_title_enable">
								<option value="yes" <?php if(get_option('mb_hb_title_enable') == 'yes'){?>selected="selected"<?php }?>>
									Yes
								</option>    
								<option value="no" <?php if(get_option('mb_hb_title_enable') == 'no'){?>selected="selected"<?php }?>>
									No
								</option>
							</select>
						</td>
					</tr>
					<tr>
						<th colspan="2"><strong>Homepage Blurb (Below Slider on Homepage only) </strong></th>
					</tr>
					<tr>
						<th>
							<label for="blurb_enable">Display Homepage Blurb</label>
						</th>
						<td>
							<select name="blurb_enable" id="blurb_enable">
								<option value="yes" <?php if(get_option('mb_blurb_enable') == 'yes'){?>selected="selected"<?php }?>>
									Yes
								</option>    
								<option value="no" <?php if(get_option('mb_blurb_enable') == 'no'){?>selected="selected"<?php }?>>
									No
								</option>
							</select>
						</td>
					</tr>
					<tr>
						<th>
							<label for="blurb_title_enable">Display Blurb Title</label>
						</th>
						<td>
							<select name="blurb_title_enable" id="blurb_title_enable">
								<option value="yes" <?php if(get_option('mb_blurb_title_enable') == 'yes'){?>selected="selected"<?php }?>>
									Yes
								</option>    
								<option value="no" <?php if(get_option('mb_blurb_title_enable') == 'no'){?>selected="selected"<?php }?>>
									No
								</option>
							</select>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">
							<label for="home_blurb">Blurb Content page</label>
						</th>
						<td>
							<?php wp_dropdown_pages("name=home_blurb&show_option_none=".__('- Select -')."&selected=" .get_option('mb_home_blurb')); ?>
						</td>
					</tr> 
				</table>
			</fieldset>
			<p class="submit">
				<input type="submit" name="Submit" class="button-primary" value="Save Changes" />
				<input type="hidden" name="mb_settings" value="save" style="display:none;" />
			</p>

			<fieldset style="border:1px solid #ddd; padding-bottom:20px; margin-top:20px;">
				<legend style="margin-left:5px; padding:0 5px; color:#2481C6;text-transform:uppercase;">
					<strong>Footer</strong>
				</legend>
				<table class="form-table">
					<tr>
						<th colspan="2">
							<strong>Copyright Info</strong>
						</th>
					</tr>
					<tr>
						<th>
							<label for="copyright">Copyright Text</label>
						</th>
						<td>
							<textarea name="copyright" id="copyright" rows="4" cols="70" style="font-size:11px;"><?php echo stripslashes(get_option('mb_copyright')); ?></textarea>
							<br />
							<em>You can use HTML for links etc.</em>
						</td>
					</tr>
				</table>
			</fieldset>
			<p class="submit">
				<input type="submit" name="Submit" class="button-primary" value="Save Changes" />
				<input type="hidden" name="mb_settings" value="save" style="display:none;" />
			</p>

			<fieldset style="border:1px solid #ddd; padding-bottom:20px; margin-top:20px;">
				<legend style="margin-left:5px; padding:0 5px; color:#2481C6;text-transform:uppercase;">
					<strong>Misc.</strong>
				</legend>
				<table class="form-table">
					<tr>
						<th>
							<label for="keywords">Meta Keywords</label>
						</th>
						<td>
							<textarea name="keywords" id="keywords" rows="7" cols="70" style="font-size:11px;"><?php echo get_option('mb_keywords'); ?></textarea>
							<br />
							<em>Keywords comma separated. DO NOT USE DOUBLE QOUTES (") ANYWHERE IN THIS BOX</em>
						</td>
					</tr>
					<tr>
						<th>
							<label for="description">Meta Description</label>
						</th>
						<td>
							<textarea name="description" id="description" rows="7" cols="70" style="font-size:11px;"><?php echo get_option('mb_description'); ?></textarea>
							<br />
							<em>DO NOT USE DOUBLE QOUTES (") ANYWHERE IN THIS BOX</em>
						</td>
					</tr>
					<tr>
						<th>
							<label for="analytics">Tracking code (include &lt;script&gt;&lt;script/&gt; tags):</label>
						</th>
						<td>
							<textarea name="analytics" id="analytics" rows="7" cols="70" style="font-size:11px;"><?php echo stripslashes(get_option('mb_analytics')); ?></textarea>
						</td>
					</tr>
				</table>
			</fieldset>
			<p class="submit">
				<input type="submit" name="Submit" class="button-primary" value="Save Changes" />
				<input type="hidden" name="mb_settings" value="save" style="display:none;" />
			</p>
		</form>
	</div>
<?php }