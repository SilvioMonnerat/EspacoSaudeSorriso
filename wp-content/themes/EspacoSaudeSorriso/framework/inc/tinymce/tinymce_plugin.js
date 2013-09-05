// closure to avoid namespace collision
(function(){
	// creates the plugin
	tinymce.create('tinymce.plugins.columns', {
		// creates control instances based on the control's id.
		createControl : function(id, controlManager) {
        
			if (id == 'divider') {
				// creates the button
				
				var button = controlManager.createSplitButton('divider', {
					title : 'Divider Shortcode', // title of the button
					image : iconsPath+'divider_icon.png',  // path to the button's image
					onclick : function() {
					}
				});
				button.onRenderMenu.add(function(button, m) {
                    m.add({title : 'Dividers', 'class' : 'mceMenuItemTitle'}).setDisabled(1);

                    m.add({title : 'Line Divider', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[divider type="line"]');
                    }});
			
					m.add({title : 'Space Divider', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[divider type="space"]');
                    }});
					
                });

                // Return the new splitbutton instance
                return button;
  			}


		        
			if (id == 'columns') {
				// creates the button
				
				var button = controlManager.createSplitButton('columns', {
					title : 'Columns Shortcode', // title of the button
					image : iconsPath+'columns_icon.png',  // path to the button's image
					onclick : function() {
					}
				});
				button.onRenderMenu.add(function(button, m) {
                    m.add({title : 'Columns', 'class' : 'mceMenuItemTitle'}).setDisabled(1);

                    m.add({title : 'One Half', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[one_half]' + tinyMCE.activeEditor.selection.getContent() + '[/one_half]');
                    }});
					
					m.add({title : 'One Half Last', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[one_half_last]' + tinyMCE.activeEditor.selection.getContent() + '[/one_half_last]');
                    }});
					
					m.add({title : 'One Third', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[one_third]' + tinyMCE.activeEditor.selection.getContent() + '[/one_third]');
                    }});
					
					m.add({title : 'One Third Last', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[one_third_last]' + tinyMCE.activeEditor.selection.getContent() + '[/one_third_last]');
                    }});
					
					m.add({title : 'One Fourth', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[one_fourth]' + tinyMCE.activeEditor.selection.getContent() + '[/one_fourth]');
                    }});
					
					m.add({title : 'One Fourth Last', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[one_fourth_last]' + tinyMCE.activeEditor.selection.getContent() + '[/one_fourth_last]');
                    }});
					
					m.add({title : 'One Fifth', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[one_fifth]' + tinyMCE.activeEditor.selection.getContent() + '[/one_fifth]');
                    }});
					
					m.add({title : 'One Fifth Last', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[one_fifth_last]' + tinyMCE.activeEditor.selection.getContent() + '[/one_fifth_last]');
                    }});
					
					m.add({title : 'One Sixth', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[one_sixth]' + tinyMCE.activeEditor.selection.getContent() + '[/one_sixth]');
                    }});
					
					m.add({title : 'One Sixth Last', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[one_sixth_last]' + tinyMCE.activeEditor.selection.getContent() + '[/one_sixth_last]');
                    }});
					
					m.add({title : 'Two Third', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[two_third]' + tinyMCE.activeEditor.selection.getContent() + '[/two_third]');
                    }});
					
					m.add({title : 'Two Third Last', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[two_third_last]' + tinyMCE.activeEditor.selection.getContent() + '[/two_third_last]');
                    }});
					
					m.add({title : 'Two Fifth', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[two_fifth]' + tinyMCE.activeEditor.selection.getContent() + '[/two_fifth]');
                    }});
					
					m.add({title : 'Two Fifth Last', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[two_fifth_last]' + tinyMCE.activeEditor.selection.getContent() + '[/two_fifth_last]');
                    }});
					
					m.add({title : 'Three Fourth', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[three_fourth]' + tinyMCE.activeEditor.selection.getContent() + '[/three_fourth]');
                    }});
					
					m.add({title : 'Three Fourth Last', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[three_fourth_last]' + tinyMCE.activeEditor.selection.getContent() + '[/three_fourth_last]');
                    }});
					
					m.add({title : 'Three Fifth', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[three_fifth]' + tinyMCE.activeEditor.selection.getContent() + '[/three_fifth]');
                    }});
					
					m.add({title : 'Three Fifth Last', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[three_fifth_last]' + tinyMCE.activeEditor.selection.getContent() + '[/three_fifth_last]');
                    }});
					
					m.add({title : 'Four Fifth', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[four_fifth]' + tinyMCE.activeEditor.selection.getContent() + '[/four_fifth]');
                    }});
					
					m.add({title : 'Four Fifth Last', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[four_fifth_last]' + tinyMCE.activeEditor.selection.getContent() + '[/four_fifth_last]');
                    }});
					
					m.add({title : 'Five Sixth', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[five_sixth]' + tinyMCE.activeEditor.selection.getContent() + '[/five_sixth]');
                    }});
					
					m.add({title : 'Five Sixth Last', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[five_sixth_last]' + tinyMCE.activeEditor.selection.getContent() + '[/five_sixth_last]');
                    }});

                    
                });

                // Return the new splitbutton instance
                return button;
  			}
			
			
			if (id == 'button') {
				// creates the button
				
				var button = controlManager.createSplitButton('button', {
					title : 'Buttons Shortcode', // title of the button
					image : iconsPath+'buttons_icon.png',  // path to the button's image
					onclick : function() {
					}
				});
				button.onRenderMenu.add(function(button, m) {
                    m.add({title : 'Buttons', 'class' : 'mceMenuItemTitle'}).setDisabled(1);

                    m.add({title : 'Colored Buttons', onclick : function() {
                        // triggers the thickbox
						var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
						W = W - 80;
						H = H - 84;
						tb_show( 'Colored Buttons Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=buttons_form' );
                    }});
					
					m.add({title : 'Call to Action', onclick : function() {
                        // triggers the thickbox
						var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
						W = W - 80;
						H = H - 84;
						tb_show( 'Read More Button Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=readmore_form' );
                    }});

                });

                // Return the new splitbutton instance
                return button;
  			}
			
			if (id == 'styles_typography') {
				// creates the button
				
				var button = controlManager.createSplitButton('styles_typography', {
					title : 'Styling & Typography', // title of the button
					image : iconsPath+'styling_icon.png',  // path to the button's image
					onclick : function() {
					}
				});
				button.onRenderMenu.add(function(button, m) {
                    m.add({title : 'Drop Caps', 'class' : 'mceMenuItemTitle'}).setDisabled(1);

                    m.add({title : 'Normal', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[dropcaps]' + tinyMCE.activeEditor.selection.getContent() + '[/dropcaps]');
                    }});
					
					m.add({title : 'Circle', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[dropcaps style="circle"]' + tinyMCE.activeEditor.selection.getContent() + '[/dropcaps]');
                    }});
					
					m.add({title : 'Square', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[dropcaps style="square"]' + tinyMCE.activeEditor.selection.getContent() + '[/dropcaps]');
                    }});
					
					m.add({title : 'Icon Text', 'class' : 'mceMenuItemTitle'}).setDisabled(1);

                    m.add({title : 'Home', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[icon style="home"]' + tinyMCE.activeEditor.selection.getContent() + '[/icon]');
                    }});
					
					m.add({title : 'Email', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[icon style="email"]' + tinyMCE.activeEditor.selection.getContent() + '[/icon]');
                    }});
					
					m.add({title : 'Link', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[icon style="link"]' + tinyMCE.activeEditor.selection.getContent() + '[/icon]');
                    }});
					
					m.add({title : 'Phone', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[icon style="phone"]' + tinyMCE.activeEditor.selection.getContent() + '[/icon]');
                    }});
					
					m.add({title : 'Calendar', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[icon style="calendar"]' + tinyMCE.activeEditor.selection.getContent() + '[/icon]');
                    }});
					
					m.add({title : 'User', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[icon style="user"]' + tinyMCE.activeEditor.selection.getContent() + '[/icon]');
                    }});
					
					m.add({title : 'Save', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[icon style="save"]' + tinyMCE.activeEditor.selection.getContent() + '[/icon]');
                    }});
					
					m.add({title : 'Id', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[icon style="id"]' + tinyMCE.activeEditor.selection.getContent() + '[/icon]');
                    }});
					
					m.add({title : 'Notice', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[icon style="notice"]' + tinyMCE.activeEditor.selection.getContent() + '[/icon]');
                    }});
					
					m.add({title : 'Rss', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[icon style="rss"]' + tinyMCE.activeEditor.selection.getContent() + '[/icon]');
                    }});
					
					m.add({title : 'Checked', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[icon style="checked"]' + tinyMCE.activeEditor.selection.getContent() + '[/icon]');
                    }});
					
					m.add({title : 'Tag', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[icon style="tag"]' + tinyMCE.activeEditor.selection.getContent() + '[/icon]');
                    }});
					
					m.add({title : 'Framed Boxes', 'class' : 'mceMenuItemTitle'}).setDisabled(1);

					m.add({title : 'Highlight', 'class' : 'mceMenuItemTitle'}).setDisabled(1);

                    m.add({title : 'Red', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[highlight color="red"]' + tinyMCE.activeEditor.selection.getContent() + '[/highlight]');
                    }});
					
					m.add({title : 'Blue', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[highlight color="blue"]' + tinyMCE.activeEditor.selection.getContent() + '[/highlight]');
                    }});
					
					m.add({title : 'Green', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[highlight color="green"]' + tinyMCE.activeEditor.selection.getContent() + '[/highlight]');
                    }});

					m.add({title : 'Yellow', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[highlight color="yellow"]' + tinyMCE.activeEditor.selection.getContent() + '[/highlight]');
                    }});

					m.add({title : 'Black', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[highlight color="black"]' + tinyMCE.activeEditor.selection.getContent() + '[/highlight]');
                    }});
					
					m.add({title : 'Tooltips', 'class' : 'mceMenuItemTitle'}).setDisabled(1);

                    m.add({title : 'Tooltip', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[tooltip text\="Insert Tooltip Here"]' + tinyMCE.activeEditor.selection.getContent() + '[/tooltip]');
                    }});
					
					m.add({title : 'Styled Table', 'class' : 'mceMenuItemTitle'}).setDisabled(1);

                    m.add({title : 'Styled Table', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[styled_table]' + tinyMCE.activeEditor.selection.getContent() + '[/styled_table]');
                    }});
					
					m.add({title : 'Short Url', 'class' : 'mceMenuItemTitle'}).setDisabled(1);

                    m.add({title : 'Shorten Url', onclick : function() {
                       // triggers the thickbox
						var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
						W = W - 80;
						H = H - 84;
						tb_show( 'Url Shortening Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=short_form' );
                    }});
	
				  
                });

                // Return the new splitbutton instance
                return button;
  			}
			
			if (id == 'framed_box') {
					// creates the button
				
					var button = controlManager.createButton('framed_box', {
						title : 'Framed Box Shortcode', // title of the button
						image : iconsPath+'box_icon.png',  // path to the button's image
						onclick : function() {
							// triggers the thickbox
							var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
							W = W - 80;
							H = H - 84;
							tb_show( 'Framed Box Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=framed_box_form' );
							}
						});
					return button;
  					}
			
		
			if (id == 'gmap') {
				// creates the button
				
				var button = controlManager.createButton('gmap', {
					title : 'Google Map', // title of the button
					image : iconsPath+'gmap_icon.png',  // path to the button's image
					onclick : function() {
						// triggers the thickbox
						var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
						W = W - 80;
						H = H - 84;
						tb_show( 'Google Map Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=gmap_form' );
					}
				});
				return button;
  			}
			
			if (id == 'tabs') {
				// creates the button
				
				var button = controlManager.createSplitButton('tabs', {
					title : 'Tabs Shortcode', // title of the button
					image : iconsPath+'tabs_icon.png',  // path to the button's image
					onclick : function() {
					}
				});
				button.onRenderMenu.add(function(button, m) {
                    m.add({title : 'Tabs', 'class' : 'mceMenuItemTitle'}).setDisabled(1);

                    m.add({title : 'Horizontal', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[tabs type="horizontal"]' + tinyMCE.activeEditor.selection.getContent() + '<br/><br/>[/tabs]');
                    }});
					
					m.add({title : 'Vertical', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[tabs type="vertical"]' + tinyMCE.activeEditor.selection.getContent() + '<br/><br/>[/tabs]');
                    }});
					
					m.add({title : 'Tab Items', 'class' : 'mceMenuItemTitle'}).setDisabled(1);
					
					m.add({title : 'Tab Item', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[tab title="Insert Tab Title Here"]' + tinyMCE.activeEditor.selection.getContent() + '[/tab]<br/>');
                    }});
					
                });

                // Return the new splitbutton instance
                return button;
  			}
			
			if (id == 'accordions') {
				// creates the button
				
				var button = controlManager.createSplitButton('accordions', {
					title : 'Accordions Shortcode', // title of the button
					image : iconsPath+'accordions_icon.png',  // path to the button's image
					onclick : function() {
					}
				});
				button.onRenderMenu.add(function(button, m) {
                    m.add({title : 'Accordions', 'class' : 'mceMenuItemTitle'}).setDisabled(1);

                    m.add({title : 'Accordion', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[accordions]' + tinyMCE.activeEditor.selection.getContent() + '<br/><br/>[/accordions]');
                    }});
					
					m.add({title : 'Accordion Item', 'class' : 'mceMenuItemTitle'}).setDisabled(1);
					
					m.add({title : 'Accordion Item', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[accordion title="Insert Title Here"]' + tinyMCE.activeEditor.selection.getContent() + '[/accordion]<br/>');
                    }});
					
                });

                // Return the new splitbutton instance
                return button;
  			}
			
			if (id == 'toggle') {
				// creates the button
				
				var button = controlManager.createButton('toggle', {
					title : 'Toggle Shortcode', // title of the button
					image : iconsPath+'toggle_icon.png',  // path to the button's image
					onclick : function() {
						tinyMCE.activeEditor.selection.setContent('[toggle title="Insert Title Here"]' + tinyMCE.activeEditor.selection.getContent() + '[/toggle]');
						;
					}
				});
				return button;
  			}
			
			
			
			if (id == 'chart') {
				// creates the button
				
				var button = controlManager.createButton('chart', {
					title : 'Google Chart Shortcode', // title of the button
					image : iconsPath+'chart_icon.png',  // path to the button's image
					onclick : function() {
						// triggers the thickbox
						var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
						W = W - 80;
						H = H - 84;
						tb_show( 'Google Chart Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=chart_form' );
					}
				});
				return button;
  			}
			
			if (id == 'testimonial') {
				// creates the button
				
				var button = controlManager.createButton('testimonial', {
					title : 'Testimonial Shortcode', // title of the button
					image : iconsPath+'testimonial_icon.png',  // path to the button's image
					onclick : function() {
						// triggers the thickbox
						var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
						W = W - 80;
						H = H - 84;
						tb_show( 'Testimonial Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=testimonial_form' );
					}
				});
				return button;
  			}
			
			
			if (id == 'pricing_table') {
				// creates the button
				
				var button = controlManager.createSplitButton('pricing_table', {
					title : 'Corporate Pricing Table Shortcode', // title of the button
					image : iconsPath+'pricing_icon.png',  // path to the button's image
					onclick : function() {
					}
				});
				button.onRenderMenu.add(function(button, m) {
                    m.add({title : 'Pricing Table', 'class' : 'mceMenuItemTitle'}).setDisabled(1);

                    m.add({title : 'Pricing Table', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[pricing_table]<br/><br/>' + tinyMCE.activeEditor.selection.getContent() + '[/pricing_table]');
                    }});
					
					m.add({title : 'Column Header', onclick : function() {
                        // triggers the thickbox
						var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
						W = W - 80;
						H = H - 84;
						tb_show( 'Column Header Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=pricing_header_form' );
                    }});
					
					m.add({title : 'Column Options', onclick : function() {
                        // triggers the thickbox
						var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
						W = W - 80;
						H = H - 84;
						tb_show( 'Column Options Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=pricing_options_form' );
                    }});
					
					m.add({title : 'Column Item Checked', onclick : function() {
                        tinyMCE.activeEditor.selection.setContent('[pricing_item]' + tinyMCE.activeEditor.selection.getContent() + '[/pricing_item]<br/>');
                    }});
					
                });

                // Return the new splitbutton instance
                return button;
  			}
			
			if (id == 'video_shortcode') {
					// creates the button
				
					var button = controlManager.createButton('video_shortcode', {
						title : 'Video Shortcode', // title of the button
						image : iconsPath+'multimedia_icon.png',  // path to the button's image
						onclick : function() {
							// triggers the thickbox
							var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
							W = W - 80;
							H = H - 84;
							tb_show( 'Video Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=video_form' );
							}
						});
					return button;
  					}
			
			return null;
		
		}
	});
	
	// registers the plugin. DON'T MISS THIS STEP!!!
	tinymce.PluginManager.add('columns', tinymce.plugins.columns);
	
	
	
	// executes this when the DOM is ready
	jQuery(function(){
		// creates a form to be displayed everytime the button is clicked
		// you should achieve this using AJAX instead of direct html code like this
		var form = jQuery('<div id="buttons_form"><table id="button_table" class="form-table">\
			<tr>\
				<th><label for="button_text">Button Text</label></th>\
				<td><input type="text" id="button_text" name="text" value="Button Text" /><br />\
				<small>Insert the text of the button</small></td>\
			</tr>\
			<tr>\
				<th><label for="button_color">Style</label></th>\
				<td><select name="color" id="button_color">\
					<option value="black">Black</option>\
					<option value="white">White</option>\
					<option value="grey">Gray</option>\
					<option value="red">Red</option>\
					<option value="blue">Blue</option>\
					<option value="green">Green</option>\
					<option value="orange">Orange</option>\
					<option value="rosy">Rosy</option>\
					<option value="pink">Pink</option>\
				</select><br />\
				<small>Select the color of the button.</small></td>\
			</tr>\
			<tr>\
				<th><label for="button_size">Size</label></th>\
				<td><select name="size" id="button_size">\
					<option selected value="">-</option>\
					<option value="">Large</option>\
					<option value="medium">Medium</option>\
					<option value="small">Small</option>\
				</select><br />\
				<small>Select the size of the button. Large is default</small></td>\
			</tr>\
			<tr>\
				<th><label for="button_link">Button Link</label></th>\
				<td><input type="text" id="button_link" name="link" value="#" /><br />\
				<small>Insert the button link. ie. http://www.link.com</small></td>\
			</tr>\
			<tr>\
				<th><label for="button_target">Target</label></th>\
				<td><select name="target" id="button_target">\
					<option selected value="">-</option>\
					<option value="_self">Self</option>\
					<option value="_blank">Blank</option>\
				</select><br />\
				<small>Select where to target the button link.</small></td>\
			</tr>\
			<tr>\
				<th><label for="button_rel">Rel</label></th>\
				<td><input type="text" id="button_rel" name="rel" value="" /><br />\
				<small>Insert the button rel attribute. ie. nofollow. Can be left blank.</small></td>\
			</tr>\
			<tr>\
				<th><label for="button_align">Align</label></th>\
				<td><select name="align" id="button_align">\
					<option selected value="">-</option>\
					<option value="left">Left</option>\
					<option value="right">Right</option>\
				</select><br />\
				<small>Select the alignment of the button.</small></td>\
			</tr>\
		</table>\
		<p class="submit">\
			<input type="button" id="button_submit" class="button-primary" value="Insert Button" name="submit" />\
		</p>\
		</div>');
		
		var table = form.find('table');
		form.appendTo('body').hide();
		
		// handles the click event of the submit button
		form.find('#button_submit').click(function(){
			// defines the options and their default values
			// again, this is not the most elegant way to do this
			// but well, this gets the job done nonetheless
			var options = { 
				'color'    : '',
				'size'      : '',
				'link'       : '',
				'target'    : '',
				'rel'    : '',
				'align'    : ''
				};
			var shortcode = '[button';
			
			for( var index in options) {
				var value = table.find('#button_' + index).val();
				var button_text = table.find('#button_text').val();
				
				// attaches the attribute to the shortcode only if it's different from the default value
				if ( value !== options[index] )
					shortcode += '  ' + index + '="' + value + '"';
			}
			
			shortcode += ']'+ button_text +'[/button]';;
			
			// inserts the shortcode into the active editor
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
			
			// closes Thickbox
			tb_remove();
		});
	});
	
	
	// executes this when the DOM is ready
	jQuery(function(){
		// creates a form to be displayed everytime the button is clicked
		// you should achieve this using AJAX instead of direct html code like this
		var form = jQuery('<div id="readmore_form"><table id="readmore_table" class="form-table">\
			<tr>\
				<th><label for="readmore_text">Button Text</label></th>\
				<td><input type="text" id="readmore_text" name="text" value="Button Text" /><br />\
				<small>Insert text of the button.</small></td>\
			</tr>\
			<tr>\
				<th><label for="readmore_rel">Color</label></th>\
				<td><input type="text" id="readmore_color" name="color" value="#ff855d" /><br />\
				<small>Insert the hexcode of the buttons\'s color (Default: #ff855d).</small></td>\
			</tr>\
			<tr>\
				<th><label for="readmore_link">Call to Action Button Link</label></th>\
				<td><input type="text" id="readmore_link" name="link" value="#" /><br />\
				<small>Insert button link. ie. http://www.link.com</small></td>\
			</tr>\
			<tr>\
				<th><label for="readmore_target">Target</label></th>\
				<td><select name="target" id="readmore_target">\
					<option selected value="">-</option>\
					<option value="_self">Self</option>\
					<option value="_blank">Blank</option>\
				</select><br />\
				<small>Select where to target the button link.</small></td>\
			</tr>\
			<tr>\
				<th><label for="readmore_rel">Rel</label></th>\
				<td><input type="text" id="readmore_rel" name="rel" value="" /><br />\
				<small>Insert the button rel attribute. ie. nofollow (optional).</small></td>\
			</tr>\
			<tr>\
				<th><label for="readmore_align">Align</label></th>\
				<td><select name="align" id="readmore_align">\
					<option selected value="">-</option>\
					<option value="left">Left</option>\
					<option value="right">Right</option>\
				</select><br />\
				<small>Select the alignment of the button.</small></td>\
			</tr>\
		</table>\
		<p class="submit">\
			<input type="button" id="readmore_submit" class="button-primary" value="Insert Button" name="submit" />\
		</p>\
		</div>');
		
		var table = form.find('table');
		form.appendTo('body').hide();
		
		// handles the click event of the submit button
		form.find('#readmore_submit').click(function(){
			// defines the options and their default values
			// again, this is not the most elegant way to do this
			// but well, this gets the job done nonetheless
			var options = { 
				'link'       : '',
				'target'    : '',
				'rel'    : '',
				'color'    : '',
				'align'    : ''
				};
			var shortcode = '[actionbutton';
			
			for( var index in options) {
				var value = table.find('#readmore_' + index).val();
				var readmore_text = table.find('#readmore_text').val();
				// attaches the attribute to the shortcode only if it's different from the default value
				if ( value !== options[index] )
					shortcode += ' ' + index + '="' + value + '"';
			}
			
			shortcode += ']'+ readmore_text +'[/actionbutton] ';
			
			// inserts the shortcode into the active editor
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
			
			// closes Thickbox
			tb_remove();
		});
	});
	// executes this when the DOM is ready
	jQuery(function(){
		// creates a form to be displayed everytime the button is clicked
		// you should achieve this using AJAX instead of direct html code like this
		var form = jQuery('<div id="short_form"><table id="short_table" class="form-table">\
			<tr>\
				<th><label for="short_url">URL</label></th>\
				<td><input type="text" id="short_url" name="url" value="#" /><br />\
				<small>Insert the url you want to shorten.</small></td>\
			</tr>\
			<tr>\
				<th><label for="short_target">Target</label></th>\
				<td><select name="target" id="short_target">\
					<option selected value="">-</option>\
					<option value="_self">Self</option>\
					<option value="_blank">Blank</option>\
				</select><br />\
				<small>Select where to target the url link.</small></td>\
			</tr>\
			<tr>\
				<th><label for="short_rel">Rel</label></th>\
				<td><input type="text" id="short_rel" name="rel" value="" /><br />\
				<small>Insert the short url rel attribute. ie. nofollow (optional).</small></td>\
			</tr>\
		</table>\
		<p class="submit">\
			<input type="button" id="short_submit" class="button-primary" value="Insert Short Url" name="submit" />\
		</p>\
		</div>');
		
		var table = form.find('table');
		form.appendTo('body').hide();
		
		// handles the click event of the submit button
		form.find('#short_submit').click(function(){
			// defines the options and their default values
			// again, this is not the most elegant way to do this
			// but well, this gets the job done nonetheless
			var options = { 
				'url'       : '',
				'target'    : '',
				'rel'    : ''
				};
			var shortcode = '[short';
			
			for( var index in options) {
				var value = table.find('#short_' + index).val();
				
				// attaches the attribute to the shortcode only if it's different from the default value
				if ( value !== options[index] )
					shortcode += ' ' + index + '="' + value + '"';
			}
			
			shortcode += ']';
			
			// inserts the shortcode into the active editor
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
			
			// closes Thickbox
			tb_remove();
		});
	});

	// executes this when the DOM is ready
	jQuery(function(){
		// creates a form to be displayed everytime the button is clicked
		// you should achieve this using AJAX instead of direct html code like this
		var form = jQuery('<div id="gmap_form"><table id="gmap_table" class="form-table">\
			<tr>\
				<th><label for="gmap_id">Map ID</label></th>\
				<td><input type="text" id="gmap_id" name="id" value="map" /><br />\
				<small>Specify a different id for every map if you want to display multiple maps on same page.</small></td>\
			</tr>\
			<tr>\
				<th><label for="gmap_width">Map Width</label></th>\
				<td><input type="text" id="gmap_width" name="width" value="600" /><br />\
				<small>Specify map width (default is 600).</small></td>\
			</tr>\
			<tr>\
				<th><label for="gmap_height">Map Height</label></th>\
				<td><input type="text" id="gmap_height" name="height" value="370" /><br />\
				<small>Specify map height (default is 370).</small></td>\
			</tr>\
			<tr>\
				<th><label for="gmap_maptype">Map Type</label></th>\
				<td><select name="type" id="gmap_maptype">\
					<option selected value="ROADMAP">ROADMAP</option>\
					<option value="SATELLITE">SATELLITE</option>\
					<option value="HYBRID">HYBRID</option>\
					<option value="TERRAIN">TERRAIN</option>\
				</select><br />\
				<small>Select map type.</small></td>\
			</tr>\
			<tr>\
				<th><label for="gmap_address">Map Location Address</label></th>\
				<td><input type="text" id="gmap_address" name="address" value="" /><br />\
				<small>Specify map location address (optional). ie. Bla Street 3, Washington, Olympia, USA.</small></td>\
			</tr>\
			<tr>\
				<th><label for="gmap_latitude">Map Location Latitude</label></th>\
				<td><input type="text" id="gmap_latitude" name="latitude" value="" /><br />\
				<small>Specify map location latitude coordonate(optional). ie. 49.99</small></td>\
			</tr>\
			<tr>\
				<th><label for="gmap_longitude">Map Location Longitude</label></th>\
				<td><input type="text" id="gmap_longitude" name="longitude" value="" /><br />\
				<small>Specify map location longitude coordonate (optional). ie. 49.99</small></td>\
			</tr>\
			<tr>\
				<th><label for="gmap_zoom">Map Location Zoom</label></th>\
				<td><input type="text" id="gmap_zoom" name="zoom" value="10" /><br />\
				<small>Specify map location zoom (optional, default is 10).</small></td>\
			</tr>\
			<tr>\
				<th><label for="gmap_popup">Popup Text</label></th>\
				<td><textarea cols=35 rows=10 id="gmap_popup" name="popup" value="" /><br />\
				<small>Insert popup location text (optional).</small></td>\
			</tr>\
		</table>\
		<p class="submit">\
			<input type="button" id="gmap_submit" class="button-primary" value="Insert Google Map" name="submit" />\
		</p>\
		</div>');
		
		var table = form.find('table');
		form.appendTo('body').hide();
		
		// handles the click event of the submit button
		form.find('#gmap_submit').click(function(){
			// defines the options and their default values
			// again, this is not the most elegant way to do this
			// but well, this gets the job done nonetheless
			var options = { 
				'id'    : '',
				'width'    : '',
				'height'      : '',
				'address'       : '',
				'latitude'    : '',
				'longitude'    : '',
				'zoom'    : '',
				'maptype'    : '',
				'popup'    : ''
				};
			var shortcode = '[googlemap ';
			
			for( var index in options) {
				var value = table.find('#gmap_' + index).val();
				
				// attaches the attribute to the shortcode only if it's different from the default value
				if ( value !== options[index] )
					shortcode += ' ' + index + '="' + value + '"';
			}
			
			shortcode += ']';
			
			// inserts the shortcode into the active editor
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
			
			// closes Thickbox
			tb_remove();
		});
	});

	// executes this when the DOM is ready
	jQuery(function(){
		// creates a form to be displayed everytime the button is clicked
		// you should achieve this using AJAX instead of direct html code like this
		var form = jQuery('<div id="chart_form"><table id="chart_table" class="form-table">\
			<tr>\
				<th><label for="chart_type">Chart Type</label></th>\
				<td><select name="type" id="chart_type">\
					<option value="pie">Pie</option>\
					<option value="pie2d">Pie 2d</option>\
					<option value="xyline">XY Line</option>\
					<option value="sparkline">Spark Line</option>\
					<option value="meter">Meter</option>\
					<option value="scatter">Scatter</option>\
					<option value="venn">Venn</option>\
				</select><br />\
				<small>Select chart type.</small></td>\
			</tr>\
			<tr>\
				<th><label for="chart_size">Chart Size</label></th>\
				<td><input type="text" id="chart_size" name="size" value="400x200" /><br />\
				<small>Specify chart size (default is 400x200).</small></td>\
			</tr>\
			<tr>\
				<th><label for="chart_title">Chart Title</label></th>\
				<td><input type="text" id="chart_title" name="title" value="" /><br />\
				<small>Specify chart title.</small></td>\
			</tr>\
			<tr>\
				<th><label for="chart_data">Chart Data</label></th>\
				<td><input type="text" id="chart_data" name="data" value="" /><br />\
				<small>(Insert values separated by comma and make sure there is no space between entries. (ie. 41.52,37.79,20.67,0.03). Separate multiple data blocks by pipe sign (ie. 0,25,50|2,33,43).</small></td>\
			</tr>\
			<tr>\
				<th><label for="chart_labels">Chart Data Labels</label></th>\
				<td><input type="text" id="chart_labels" name="labels" value="" /><br />\
				<small>Insert chart data labels separated by pipe sign(|) and make sure there is no space between entries. ie. Reffering+sites|Search+Engines|Direct+traffic|Other</small></td>\
			</tr>\
			<tr>\
				<th><label for="chart_bg_color">Chart Background Color</label></th>\
				<td><input type="text" id="chart_bg" name="bg" value="ffffff" /><br />\
				<small>Specify chart background color in hexadecimal number format. (ie. transparent = 65432100, white = ffffff, black = 000000, More examples <a href="http://www.webmonkey.com/2010/02/color_charts/" target="_blank">here</a>)</small></td>\
			</tr>\
			<tr>\
				<th><label for="chart_colors">Chart Colors</label></th>\
				<td><input type="text" id="chart_colors" name="colors" value="" /><br />\
				<small>Specify chart colors in hexadecimal number format separated by comma and make sure there is no space between entries. (ie. 058DC7,50B432,ED561B,EDEF00)</small></td>\
			</tr>\
			<tr>\
				<th><label for="chart_advanced">Advanced Chart Options</label></th>\
				<td><input type="text" id="chart_advanced" name="advanced" value="" /><br />\
				<small>Insert chart advanced options (optional). (ie. &amp;chdl=A|B|C) See <a href="http://code.google.com/apis/chart/docs/chart_params.html" target="_blank">Google Chart Feature List</a> for more info</small></td>\
			</tr>\
			<tr>\
				<th><label for="chart_align">Chart Alignment</label></th>\
				<td><select name="align" id="chart_align">\
					<option selected value="">-</option>\
					<option value="alignleft">Left</option>\
					<option value="alignright">Right</option>\
					<option value="aligncenter">Center</option>\
					</select><br />\
				<small>Select chart alignment.</small></td>\
			</tr>\
		</table>\
		<p class="submit">\
			<input type="button" id="chart_submit" class="button-primary" value="Insert Google Chart" name="submit" />\
		</p>\
		</div>');
		
		var table = form.find('table');
		form.appendTo('body').hide();
		
		// handles the click event of the submit button
		form.find('#chart_submit').click(function(){
			// defines the options and their default values
			// again, this is not the most elegant way to do this
			// but well, this gets the job done nonetheless
			var options = { 
				'type'    : '',
				'size'      : '',
				'title'       : '',
				'data'    : '',
				'labels'    : '',
				'bg'    : '',
				'colors'    : '',
				'advanced'    : '',
				'align'    : ''
				};
			var shortcode = '[chart ';
			
			for( var index in options) {
				var value = table.find('#chart_' + index).val();
				
				// attaches the attribute to the shortcode only if it's different from the default value
				if ( value !== options[index] )
					shortcode += ' ' + index + '="' + value + '"';
			}
			
			shortcode += ']';
			
			// inserts the shortcode into the active editor
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
			
			// closes Thickbox
			tb_remove();
		});
	});


	// executes this when the DOM is ready
	jQuery(function(){
		// creates a form to be displayed everytime the button is clicked
		// you should achieve this using AJAX instead of direct html code like this
		var form = jQuery('<div id="testimonial_form"><table id="testimonial_table" class="form-table">\
			<tr>\
				<th><label for="testimonial_name">Person Name</label></th>\
				<td><input type="text" id="testimonial_name" name="name" value="" /><br />\
				<small>Insert person name.</small></td>\
			</tr>\
			<tr>\
				<th><label for="testimonial_website">Website</label></th>\
				<td><input type="text" id="testimonial_website" name="website" value="" /><br />\
				<small>Insert person website name (optional).</small></td>\
			</tr>\
		</table>\
		<p class="submit">\
			<input type="button" id="testimonial_submit" class="button-primary" value="Insert Testimonial" name="submit" />\
		</p>\
		</div>');
		
		var table = form.find('table');
		form.appendTo('body').hide();
		
		// handles the click event of the submit button
		form.find('#testimonial_submit').click(function(){
			// defines the options and their default values
			// again, this is not the most elegant way to do this
			// but well, this gets the job done nonetheless
			var options = { 
				'name'    : '',
				'website'    : ''
				};
			var shortcode = '[testimonial';
			
			for( var index in options) {
				var value = table.find('#testimonial_' + index).val();
				
				// attaches the attribute to the shortcode only if it's different from the default value
				if ( value !== options[index] )
					shortcode += ' ' + index + '="' + value + '"';
			}
			
			shortcode += ']'+ tinyMCE.activeEditor.selection.getContent({format : 'text'})
 +'[/testimonial]';;
			
			// inserts the shortcode into the active editor
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
			
			// closes Thickbox
			tb_remove();
		});
	});

	// executes this when the DOM is ready
	jQuery(function(){
		// creates a form to be displayed everytime the button is clicked
		// you should achieve this using AJAX instead of direct html code like this
		var form = jQuery('<div id="pricing_header_form"><table id="pricing_table" class="form-table">\
			<tr>\
				<th><label for="chart_type">Column Type</label></th>\
				<td><select name="type" id="pricing_type">\
					<option value="">Normal</option>\
					<option value="featured">Featured</option>\
				</select><br />\
				<small>Select column type (normal is default).</small></td>\
			</tr>\
			<tr>\
				<th><label for="pricing_title">Column Header Title</label></th>\
				<td><input type="text" id="pricing_title" name="title" value="" /><br />\
				<small>Insert column header title.</small></td>\
			</tr>\
			<tr>\
				<th><label for="pricing_desc">Colum Header Description</label></th>\
				<td><input type="text" id="pricing_desc" name="desc" value="" /><br />\
				<small>Insert column header description.</small></td>\
			</tr>\
		</table>\
		<p class="submit">\
			<input type="button" id="pricing_header_submit" class="button-primary" value="Insert Column Header" name="submit" />\
		</p>\
		</div>');
		
		var table = form.find('table');
		form.appendTo('body').hide();
		
		// handles the click event of the submit button
		form.find('#pricing_header_submit').click(function(){
			// defines the options and their default values
			// again, this is not the most elegant way to do this
			// but well, this gets the job done nonetheless
			var options = { 
				'title'    : '',
				'type'    : '',
				'desc'      : ''
				};
			var shortcode = '[pricing_header';
			
			for( var index in options) {
				var value = table.find('#pricing_' + index).val();
				
				// attaches the attribute to the shortcode only if it's different from the default value
				if ( value !== options[index] )
					shortcode += ' ' + index + '="' + value + '"';
			}
			
			shortcode += ']<br/>';
			
			// inserts the shortcode into the active editor
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
			
			// closes Thickbox
			tb_remove();
		});
	});

	// executes this when the DOM is ready
	jQuery(function(){
		// creates a form to be displayed everytime the button is clicked
		// you should achieve this using AJAX instead of direct html code like this
		var form = jQuery('<div id="pricing_options_form"><table id="pricing_table" class="form-table">\
			<tr>\
				<th><label for="pricing_price">Price</label></th>\
				<td><input type="text" id="pricing_price" name="price" value="" /><br />\
				<small>Insert price.</small></td>\
			</tr>\
			<tr>\
				<th><label for="pricing_decimals">Price decimals</label></th>\
				<td><input type="text" id="pricing_decimals" name="decimals" value="" /><br />\
				<small>Insert price decimals (optional).</small></td>\
			</tr>\
			<tr>\
				<th><label for="pricing_currency">Currency Sign</label></th>\
				<td><input type="text" id="pricing_currency" name="currency" value="$" /><br />\
				<small>Insert price currency sign (ie. $).</small></td>\
			</tr>\
			<tr>\
				<th><label for="pricing_button">Button Text</label></th>\
				<td><input type="text" id="pricing_button_text" name="text" value="Buy Now!" /><br />\
				<small>Insert button text (default is "Buy Now!").</small></td>\
			</tr>\
			<tr>\
				<th><label for="pricing_link">Button Link</label></th>\
				<td><input type="text" id="pricing_button_link" name="link" value="#" /><br />\
				<small>Insert button link (ie. http://www.youtsite.com/buy-now).</small></td>\
			</tr>\
		</table>\
		<p class="submit">\
			<input type="button" id="pricing_options_submit" class="button-primary" value="Insert Column Options" name="submit" />\
		</p>\
		</div>');
		
		var table = form.find('table');
		form.appendTo('body').hide();
		
		// handles the click event of the submit button
		form.find('#pricing_options_submit').click(function(){
			// defines the options and their default values
			// again, this is not the most elegant way to do this
			// but well, this gets the job done nonetheless
			var options = { 
				'price'    : '',
				'decimals'    : '',
				'currency'    : '',
				'button_text'    : '',
				'button_link'      : ''
				};
			var shortcode = '[pricing_content';
			
			for( var index in options) {
				var value = table.find('#pricing_' + index).val();
				
				// attaches the attribute to the shortcode only if it's different from the default value
				if ( value !== options[index] )
					shortcode += ' ' + index + '="' + value + '"';
			}
			
			shortcode += ']<br/><br/>[/pricing_content]';
			
			// inserts the shortcode into the active editor
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
			

			// closes Thickbox
			tb_remove();
		});
	});
	
		// executes this when the DOM is ready
	jQuery(function(){
		// creates a form to be displayed everytime the button is clicked
		// you should achieve this using AJAX instead of direct html code like this
		var form = jQuery('<div id="framed_box_form"><table id="framed_box_table" class="form-table">\
			<tr>\
				<th><label for="box_bg">Box Color</label></th>\
				<td><input type="text" id="box_bg" name="box_bg" value="#ffffff" /><br />\
				<small>Insert the hexcode of the color of the box (Default: #fffffff - white).</small></td>\
			</tr>\
			<tr>\
				<th><label for="box_text">Box Color</label></th>\
				<td><input type="text" id="box_text" name="box_text" value="#737373" /><br />\
				<small>Insert the hexcode of the color of the text (Default: #737373).</small></td>\
			</tr>\
		</table>\
		<p class="submit">\
			<input type="button" id="contact_submit" class="button-primary" value="Insert Framed Box" name="submit" />\
		</p>\
		</div>');
		
		var table = form.find('table');
		form.appendTo('body').hide();
		
		// handles the click event of the submit button
		form.find('#contact_submit').click(function(){
			// defines the options and their default values
			// again, this is not the most elegant way to do this
			// but well, this gets the job done nonetheless
			var options = { 
				'bg'    : '',
				'text'    : ''
				};
			var shortcode = '[framedbox ';
			
			for( var index in options) {
				var value = table.find('#box_' + index).val();
				
				// attaches the attribute to the shortcode only if it's different from the default value
				if ( value !== options[index] )
					shortcode += ' ' + index + '="' + value + '"';
			}
			
			shortcode += ']' + tinyMCE.activeEditor.selection.getContent() + '[/framedbox]';
			
			// inserts the shortcode into the active editor
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
			
			// closes Thickbox
			tb_remove();
		});
	});
	
		// executes this when the DOM is ready
	jQuery(function(){
		// creates a form to be displayed everytime the button is clicked
		// you should achieve this using AJAX instead of direct html code like this
		var form = jQuery('<div id="video_form"><table id="video_table" class="form-table">\
			<tr>\
				<th><label for="video_type">Video Type</label></th>\
				<td><select name="align" id="video_type">\
					<option selected value="">-</option>\
					<option value="youtube">Youtube</option>\
					<option value="vimeo">Vimeo</option>\
					</select><br />\
				<small>Select video type.</small></td>\
			</tr>\
			<tr>\
				<th><label for="video_id">Video Id</label></th>\
				<td><input type="text" id="video_id" name="id" value="" /><br />\
				<small>Insert the ID of the video (E.g. http://www.youtube.com/watch?v=<strong>1iIZeIy7TqM</strong>. <strong>1iIZeIy7TqM</strong> is the ID).</small></td>\
			</tr>\
			<tr>\
				<th><label for="video_width">Width</label></th>\
				<td><input type="text" id="video_width" name="width" value="500" /><br />\
				<small>Specify the width of the video (default is 500).</small></td>\
			</tr>\
			<tr>\
				<th><label for="video_height">Height</label></th>\
				<td><input type="text" id="video_height" name="height" value="281" /><br />\
				<small>Specify the height of the video (default is 281).</small></td>\
			</tr>\
			<tr>\
				<th><label for="video_autoplay">Autoplay</label></th>\
				<td><select name="align" id="video_autoplay">\
					<option selected value="">-</option>\
					<option value="no">No</option>\
					<option value="yes">Yes</option>\
					</select><br />\
				<small>Select video type.</small></td>\
			</tr>\
			<tr>\
				<th><label for="video_align">Video Alignment</label></th>\
				<td><select name="align" id="video_align">\
					<option selected value="">-</option>\
					<option value="left">Left</option>\
					<option value="right">Right</option>\
					<option value="center">Center</option>\
					</select><br />\
				<small>Select video alignment.</small></td>\
			</tr>\
		</table>\
		<p class="submit">\
			<input type="button" id="video_submit" class="button-primary" value="Insert Video Shortcode" name="submit" />\
		</p>\
		</div>');
		
		var table = form.find('table');
		form.appendTo('body').hide();
		
		// handles the click event of the submit button
		form.find('#video_submit').click(function(){
			// defines the options and their default values
			// again, this is not the most elegant way to do this
			// but well, this gets the job done nonetheless
			var options = { 
				'id'    : '',
				'type'    : '',
				'width'    : '',
				'height'    : '',
				'autoplay'    : '',
				'align'    : ''
				};
			var shortcode = '[video ';
			
			for( var index in options) {
				var value = table.find('#video_' + index).val();
				
				// attaches the attribute to the shortcode only if it's different from the default value
				if ( value !== options[index] )
					shortcode += ' ' + index + '="' + value + '"';
			}
			
			shortcode += ']<br/>';
			
			// inserts the shortcode into the active editor
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
			
			// closes Thickbox
			tb_remove();
		});
	});
	
})()