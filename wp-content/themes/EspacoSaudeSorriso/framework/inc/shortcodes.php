<?php

/* ------------------------------------------------------------------------ */
/* Shortcode Formatter
/* ------------------------------------------------------------------------ */

function sd_shortcodes_formatter($content) {
	$shortcodes = join("|",array("one_third", "one_third_last", "two_third", "two_third_last", "one_half", "one_half_last", "one_fourth", "one_fourth_last", "three_fourth", "three_fourth_last", "one_fifth", "one_fifth_last", "two_fifth", "two_fifth_last", "three_fifth", "three_fifth_last", "four_fifth", "four_fifth_last", "one_sixth", "one_sixth_last", "five_sixth", "five_sixth_last", "divider", "video", "lightbox", "framed_image", "highlight", "tooltip", "actionbutton", "skill", "portfolio", "blog", "testimonial", "photo_testimonial", "googlemap", "chart", "toggle", "tabs", "tab", "accordions", "icon", "dropcaps", "framedbox", "button", "actionbox", "styledtable", "responsive", "styled_title", "carousel", "carousel_item", "widget", "coursebox"));

	// opening tag
	$replace = preg_replace("/(<p>)?\[($shortcodes)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);

	// closing tag
	$replace = preg_replace("/(<p>)?\[\/($shortcodes)](<\/p>|<br \/>)/","[/$2]",$replace);

	return $replace;
}


add_filter('the_content', 'sd_shortcodes_formatter');
add_filter('widget_text', 'sd_shortcodes_formatter');

/* ------------------------------------------------------------------------ */
/* Columns
/* ------------------------------------------------------------------------ */
function sd_one_third( $atts, $content = null ) {
   return '<div class="one-third">' . do_shortcode($content) . '</div>';
}

function sd_one_third_last( $atts, $content = null ) {
   return '<div class="one-third last">' . do_shortcode($content) . '</div><div class="clearfix"></div>';
}

function sd_two_third( $atts, $content = null ) {
   return '<div class="two-third">' . do_shortcode($content) . '</div>';
}

function sd_two_third_last( $atts, $content = null ) {
   return '<div class="two-third last">' . do_shortcode($content) . '</div><div class="clearfix"></div>';
}

function sd_one_half( $atts, $content = null ) {
   return '<div class="one-half">' . do_shortcode($content) . '</div>';
}

function sd_one_half_last( $atts, $content = null ) {
   return '<div class="one-half last">' . do_shortcode($content) . '</div><div class="clearfix"></div>';
}

function sd_one_fourth( $atts, $content = null ) {
   return '<div class="one-fourth">' . do_shortcode($content) . '</div>';
}

function sd_one_fourth_last( $atts, $content = null ) {
   return '<div class="one-fourth last">' . do_shortcode($content) . '</div><div class="clearfix"></div>';
}

function sd_three_fourth( $atts, $content = null ) {
   return '<div class="three-fourth">' . do_shortcode($content) . '</div>';
}

function sd_three_fourth_last( $atts, $content = null ) {
   return '<div class="three-fourth last">' . do_shortcode($content) . '</div><div class="clearfix"></div>';
}

function sd_one_fifth( $atts, $content = null ) {
   return '<div class="one-fifth">' . do_shortcode($content) . '</div>';
}

function sd_one_fifth_last( $atts, $content = null ) {
   return '<div class="one-fifth last">' . do_shortcode($content) . '</div><div class="clearfix"></div>';
}

function sd_two_fifth( $atts, $content = null ) {
   return '<div class="two-fifth">' . do_shortcode($content) . '</div>';
}

function sd_two_fifth_last( $atts, $content = null ) {
   return '<div class="two-fifth last">' . do_shortcode($content) . '</div><div class="clearfix"></div>';
}

function sd_three_fifth( $atts, $content = null ) {
   return '<div class="three-fifth">' . do_shortcode($content) . '</div>';
}

function sd_three_fifth_last( $atts, $content = null ) {
   return '<div class="three-fifth last">' . do_shortcode($content) . '</div><div class="clearfix"></div>';
}

function sd_four_fifth( $atts, $content = null ) {
   return '<div class="four-fifth">' . do_shortcode($content) . '</div>';
}

function sd_four_fifth_last( $atts, $content = null ) {
   return '<div class="four-fifth last">' . do_shortcode($content) . '</div><div class="clearfix"></div>';
}

function sd_one_sixth( $atts, $content = null ) {
   return '<div class="one-sixth">' . do_shortcode($content) . '</div>';
}

function sd_one_sixth_last( $atts, $content = null ) {
   return '<div class="one-sixth last">' . do_shortcode($content) . '</div><div class="clearfix"></div>';
}

function sd_five_sixth( $atts, $content = null ) {
   return '<div class="five-sixth">' . do_shortcode($content) . '</div>';
}

function sd_five_sixth_last( $atts, $content = null ) {
   return '<div class="five-sixth last">' . do_shortcode($content) . '</div><div class="clearfix"></div>';
}

/* ------------------------------------------------------------------------ */
/* Dividers
/* ------------------------------------------------------------------------ */

function sd_divider( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'type'    => 'image',
		'margintop'    => '15',
		'marginbottom'    => '30'
	    ), $atts));
	$out = '';
	if ($type == "image") {
		$out = '<div style="padding-bottom: ' . $marginbottom . 'px; margin-top: ' . $margintop . 'px;" class="image-divider"></div>';
		
	} elseif ($type == "space") {
		$out = '<div style="padding-bottom: ' . $marginbottom . 'px; margin-top: ' . $margintop . 'px;" class="space-divider"></div>';
	}

	return $out;
}

/* ------------------------------------------------------------------------ */
/* Video
/* ------------------------------------------------------------------------ */

function sd_video($atts) {
	extract(shortcode_atts(array(
		'type' 	=> '',
		'id' 	=> '',
		'align' 	=> '',
		'width' 	=> false,
		'height' 	=> false,
		'autoplay' 	=> ''
	), $atts));
	
	$video_align = '';
	
	if ( $align == 'left' ) {
		$video_align = 'alignleft';
	}
	else if ( $align == 'right' ) {
		$video_align = 'alignright';
	}
	else if ( $align =='center' ) {
		$video_align = 'aligncenter';
	}
	else {
	$video_algin = '';
	}

	if ($height && !$width) $width = intval($height * 16 / 9);
	if (!$height && $width) $height = intval($width * 9 / 16);
	if (!$height && !$width){
		$height = 281;
		$width = 500;
	}
	
	$autoplay = ($autoplay == 'yes' ? '1' : false);
		
	if($type == "vimeo") $return = "<div style='width: $width" . "px;" . "' class='video-embed $video_align'><iframe src='http://player.vimeo.com/video/$id?autoplay=$autoplay&amp;title=0&amp;byline=0&amp;portrait=0' width='$width' height='$height' class='iframe'></iframe></div>";
	
	else if($type == "youtube") $return = "<div style='width: $width" . "px;" . "' class='video-embed $video_align'><iframe src='http://www.youtube.com/embed/$id?HD=1;rel=0;showinfo=0&amp;autoplay=$autoplay' width='$width' height='$height' class='iframe'></iframe></div>";

	if (!empty($id)){
		return $return;
	}
}

/* ------------------------------------------------------------------------ */
/* Lightbox
/* ------------------------------------------------------------------------ */

function sd_lightbox( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'src'	=> '',
		'caption'	=> '',
		'group' => ''
	), $atts));
	
	if(empty($group)) { $img_group = ''; } else $img_group = '['.$group.']';
	
		$out = '<a href="' . $src . '" rel="lightbox' . $img_group . '" title="' . $caption . '">' . do_shortcode($content) . '</a>';

	return $out;
}

/* ------------------------------------------------------------------------ */
/* URL Shortner
/* ------------------------------------------------------------------------ */


function sd_short_url($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'url' => '',
		'target' => '',
		'rel' => ''
	), $atts));
	
	//This is the URL you want to shorten
	$longUrl = $url;
	$apiKey = '';
	//Get API key from : http://code.google.com/apis/console/
 
	$postData = array('longUrl' => $longUrl, 'key' => $apiKey);
	$jsonData = json_encode($postData);
 
	$curlObj = curl_init();
 
		curl_setopt($curlObj, CURLOPT_URL, 'https://www.googleapis.com/urlshortener/v1/url');
		curl_setopt($curlObj, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curlObj, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curlObj, CURLOPT_HEADER, 0);
		curl_setopt($curlObj, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
		curl_setopt($curlObj, CURLOPT_POST, 1);
		curl_setopt($curlObj, CURLOPT_POSTFIELDS, $jsonData);
 
	$response = curl_exec($curlObj);
 
	//change the response json string to object
	$json = json_decode($response);
 
		curl_close($curlObj);

	return '<a href="' . $json->id . '" target="' . $target . '" rel="' . $rel . '">' . $content . '</a>';
}

/* ------------------------------------------------------------------------ */
/* Framed Images
/* ------------------------------------------------------------------------ */

function sd_framed_image($atts, $content = null){
	extract(shortcode_atts(array(
		'align' => ''
	), $atts));
	
		$img_align = (!empty($align) ? 'align-' . $align : '');
		$out = '<span class="framed-img ' . $img_align . '">' . do_shortcode($content) . '</span>';

	return $out;
}
 
/* ------------------------------------------------------------------------ */
/* Highlights
/* ------------------------------------------------------------------------ */

function sd_highlight($atts, $content = null) {
	extract(shortcode_atts(array(
		'color' => ''
	), $atts));

		$out = '<span class="' . $color . '-highlight">' . $content . ' </span>';

	return $out;
}

/* ------------------------------------------------------------------------ */
/* Tooltip
/* ------------------------------------------------------------------------ */


function sd_tooltip($atts, $content = null) {
extract(shortcode_atts(array(
    'text' => ''
), $atts));

	$out = '<span class="tool-tip"><span class="tool-tip-content">' . $content . '</span><span class="tooltip">' . $text . '<span class="tooltip-arrow"></span></span></span>';

  return $out;
}
/* ------------------------------------------------------------------------ */
/* Styled Title
/* ------------------------------------------------------------------------ */

function sd_styled_title( $atts, $content = null ) {
	extract(shortcode_atts(array(
	'size' => '3',
	), $atts));
	
	$out = '<h'. $size .' class="styled-title">' . sd_half_title($content). '<span class="title-arrow"></span></h'. $size .'>';

	return $out;
}

/* ------------------------------------------------------------------------ */
/* Call to action button
/* ------------------------------------------------------------------------ */

function sd_action_button( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'link'	=> '',
		'target'	=> '',
		'rel'	=> '',
		'align'	=> '',
		'color'	=> '#ff855d'
		), $atts)
	);
	
	$button_color = (empty($color)) ? 'background-color: #fc8042' : 'style="background-color: '.$color.'"';
	$align = ($align) ? ' '.$align : '';
	$target = ($target == 'blank') ? ' target="_blank"' : '';

	$out = '<a ' . $button_color . '' . $target . ' class="action-button' . $align . '" href="' . $link . '" rel="' . $rel . '">' . $content . '</a>';

    return $out;
}

/* ------------------------------------------------------------------------ */
/* Skill set
/* ------------------------------------------------------------------------ */

function sd_skill_set( $atts, $content = null ) {
	extract(shortcode_atts(array(
       	'percentage' => '0',
		'color' => '#8fd5e7',
       	'title'      => ''
    ), $atts));
	$out = '<div class="skill-title">' . $title . '</div>
			<div class="skill" data-perc="' . $percentage . '">
				<div class="skill-bar" style="background-color: ' . $color . ';"></div>
			</div>';
    return $out;
}

/*-----------------------------------------------------------------------------------*/
/*	Latest portfolio items
/*-----------------------------------------------------------------------------------*/

function sd_latest_portfolio_items($atts){
	extract(shortcode_atts(array(
       	'items'      => '4',
       	'title' => '',
		'subtitle' => '',
		'columns' => '',
       	'category' => 'all'
    ), $atts));
    
    global $post;

	$args = array(
		'post_type' => 'portfolio',
		'posts_per_page' => $items,
		'order'          => 'DESC',
		'orderby'        => 'date',
		'post_status'    => 'publish'
    );
    
    if($category != 'all'){
    	
    	// string to array
    	$str = $category;
    	$arr = explode(',', $str);
    	//var_dump($arr);
    	
		$args['tax_query'][] = array(
			'taxonomy' 	=> 'portfolio_filter',
			'field' 	=> 'slug',
			'terms' 	=> $arr
		);
	}
    
    
    $randomid = rand();

    query_posts( $args );
    $out = '';
	
	if( have_posts() ) :
	
	wp_enqueue_script('hoverdir');
		
		if($columns == '3'){
			$column = 'one-third column';
		}
		elseif($columns == '2'){
			$column = 'eight';
		}
		else{
			$column = 'four';
		}
		
		$out .= '<div class="featured-work clearfix">';
		if( !empty($title) ){
			$out .= '<h2 class="center">' . $title . '</h2>';
		}
		if( !empty($subtitle) ){
			$out .= '<h4 class="center">' . $subtitle . '</h4>';
		}
		while ( have_posts() ) : the_post();
		
		
		$thumb = get_the_post_thumbnail($post->ID, 'portfolio-two-columns');
				
		$out .= '<div class="portfolio-item ' . $column . ' columns">';

		$out .= '<figure><a href="' . get_permalink() . '" title="' . get_the_title() . '"> ' . $thumb . ' </a>';
		
		$out .= '<span><a class="link-icon" href="' . get_permalink() . '" title="'. get_the_title(). ' ">&nbsp;</a></span></figure>';
		$out .= '<div class="portfolio-details"><h4><a href="' . get_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a></h4>';
		$out .= '<p>' . get_the_term_list( get_the_ID(), 'portfolio_filter', '', ', ' ) . '</p></div>';
		$out .= '</div>';
		 
		endwhile;
		
		$out .='</div>';
		
		 wp_reset_query();
	
	endif;

	return $out;
}

/*-----------------------------------------------------------------------------------*/
/*	Latest blog items
/*-----------------------------------------------------------------------------------*/

function sd_latest_blog_items($atts){
	extract(shortcode_atts(array(
       	'items'      => '1',
       	'title' => ''
    ), $atts));
    
    global $post;

	$args = array(
		'post_type' => 'post',
		'posts_per_page' => $items,
		'order'          => 'DESC',
		'orderby'        => 'date',
		'post_status'    => 'publish'
    );

    query_posts( $args );
    $out = '';
	
	$out .= '<div class="recent-blog-main clearfix">';
	if( have_posts() ) :

		if( !empty($title) ){
			$out .= '<h2>' . $title . '</h2>';
		}
		
		while ( have_posts() ) : the_post();
		
		
		$out .= '<div class="recent-blog">';
		$out .= '<div class="recent-blog-meta">
				<ul>
					<li class="recent-post-day">' . get_the_time('d'). '</li>
					<li class="recent-post-month">' . get_the_time('M') . '</li>
					<li class="recent-post-year"><span>' . get_the_time('Y') . '</span></li>
				</ul>
				</div>';
		
		$out .= '<div class="recent-blog-content">';
		
		if ( has_post_thumbnail()) {
		$thumb = get_the_post_thumbnail($post->ID, 'recent-blog');
		$out .= '<div class="recent-blog-thumb">
				<figure>'.$thumb.'</figure>
				</div>';
		}
		
		$out .= '<h4><a href="' . get_permalink() . '" title="' . get_the_title() . '"> ' . get_the_title() . ' </a></h4>
					<p>' . substr(get_the_excerpt(), 0, 100) . '...</p>
				</div>';

		$out .= '</div>';
			
		endwhile;
		
		$out .= '</div>';
		
		wp_reset_query();
	
	endif;

	return $out;
}

/*-----------------------------------------------------------------------------------*/
/*	Testimonial
/*-----------------------------------------------------------------------------------*/

function sd_testimonial($atts, $content = null) {
	extract(shortcode_atts(array(
		'name' => '',
		'website' => ''
		), $atts));

	$out = '<div class="testimonial">
				<div class="testimonial-content">
				<p>' . $content . '</p>
				<span class="arrow-down"></span>
				</div>
			
				<div class="testimonial-meta">
				<span>' . $name . $website . '</span>
				</div>
			</div>';

  return $out;
}

// photo testimonials

function sd_photo_testimonial($atts, $content = null) {
	extract(shortcode_atts(array(
		'name' => '',
		'img' => ''
		), $atts));
		
	$testimonial_photo = (empty($img)) ? '<h4>' . $name . '</h4>' : '<div class="testimonial-photo"><img src="' . $img . '" alt=" ' . $name . ' " title=" ' . $name . ' " /><h5>' . $name . '</h5></div>';

	$out = '<div class="photo-testimonial">
				' . $testimonial_photo . '
				<div class="photo-testimonial-content">
				<p>' . $content . '</p>
				</div>
			</div>';

  return $out;
}


/*-----------------------------------------------------------------------------------*/
/*	Google Map
/*-----------------------------------------------------------------------------------*/

function sd_google_map($atts) {

	// default atts
	$atts = shortcode_atts(array(	
		'latitude'          => '0', 
		'longitude'         => '0',
		'id'                => 'map',
		'zoom'              => '10',
		'width'             => '400',
		'height'            => '300',
		'maptype'           => 'ROADMAP',
		'address'           => '',
		'kml'               => '',
		'kmlautofit'        => 'yes',
		'marker'            => '',
		'markerimage'       => '',
		'traffic'           => 'no',
		'bike'              => 'no',
		'fusion'            => '',
		'start'             => '',
		'end'               => '',
		'popup'             => '',
		'infowindowdefault' => 'yes',
		'directions'        => '',
		'hidecontrols'      => 'false',
		'scale'             => 'false',
		'scrollwheel'       => 'true',
		'style'             => ''		
	), $atts);
									
	$returnme = '<div id="' .$atts['id'] . '" style="width:' . $atts['width'] . 'px;height:' . $atts['height'] . 'px;" class="google_map ' . $atts['style'] . '"></div>';
	
	//directions panel
	if($atts['start'] != '' && $atts['end'] != '') 
	{
		$panelwidth = $atts['width']-20;
		$returnme .= '<div id="directionsPanel" style="width:' . $panelwidth . 'px;height:' . $atts['height'] . 'px;border:1px solid gray;padding:10px;overflow:auto;"></div><br>';
	}

	$returnme .= '
	</script><style type="text/css">.google_map img {max-width: 100000%; /* override */}</style>
	<script type="text/javascript">
		var latlng = new google.maps.LatLng(' . $atts['latitude'] . ', ' . $atts['longitude'] . ');
		var myOptions = {
			zoom: ' . $atts['zoom'] . ',
			center: latlng,
			scrollwheel: ' . $atts['scrollwheel'] .',
			scaleControl: ' . $atts['scale'] .',
			disableDefaultUI: ' . $atts['hidecontrols'] .',
			mapTypeId: google.maps.MapTypeId.' . $atts['maptype'] . '
		};
		var ' . $atts['id'] . ' = new google.maps.Map(document.getElementById("' . $atts['id'] . '"),
		myOptions);
		';
				
		//kml
		if($atts['kml'] != '') 
		{
			if($atts['kmlautofit'] == 'no') 
			{
				$returnme .= '
				var kmlLayerOptions = {preserveViewport:true};
				';
			}
			else
			{
				$returnme .= '
				var kmlLayerOptions = {preserveViewport:false};
				';
			}
			$returnme .= '
			var kmllayer = new google.maps.KmlLayer(\'' . html_entity_decode($atts['kml']) . '\',kmlLayerOptions);
			kmllayer.setMap(' . $atts['id'] . ');
			';
		}

		//directions
		if($atts['start'] != '' && $atts['end'] != '') 
		{
			$returnme .= '
			var directionDisplay;
			var directionsService = new google.maps.DirectionsService();
		    directionsDisplay = new google.maps.DirectionsRenderer();
		    directionsDisplay.setMap(' . $atts['id'] . ');
    		directionsDisplay.setPanel(document.getElementById("directionsPanel"));

				var start = \'' . $atts['start'] . '\';
				var end = \'' . $atts['end'] . '\';
				var request = {
					origin:start, 
					destination:end,
					travelMode: google.maps.DirectionsTravelMode.DRIVING
				};
				directionsService.route(request, function(response, status) {
					if (status == google.maps.DirectionsStatus.OK) {
						directionsDisplay.setDirections(response);
					}
				});


			';
		}
		
		//traffic
		if($atts['traffic'] == 'yes')
		{
			$returnme .= '
			var trafficLayer = new google.maps.TrafficLayer();
			trafficLayer.setMap(' . $atts['id'] . ');
			';
		}
	
		//bike
		if($atts['bike'] == 'yes')
		{
			$returnme .= '			
			var bikeLayer = new google.maps.BicyclingLayer();
			bikeLayer.setMap(' . $atts['id'] . ');
			';
		}
		
		//fusion tables
		if($atts['fusion'] != '')
		{
			$returnme .= '			
			var fusionLayer = new google.maps.FusionTablesLayer(' . $atts['fusion'] . ');
			fusionLayer.setMap(' . $atts['id'] . ');
			';
		}
	
		//address
		if($atts['address'] != '')
		{
			$returnme .= '
		    var geocoder_' . $atts['id'] . ' = new google.maps.Geocoder();
			var address = \'' . $atts['address'] . '\';
			geocoder_' . $atts['id'] . '.geocode( { \'address\': address}, function(results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					' . $atts['id'] . '.setCenter(results[0].geometry.location);
					';
					
					if ($atts['popup'] !='')
					{
						//add custom image
						if ($atts['markerimage'] !='')
						{
							$returnme .= 'var image = "'. $atts['markerimage'] .'";';
						}
						$returnme .= '
						var marker = new google.maps.Marker({
							map: ' . $atts['id'] . ', 
							';
							if ($atts['markerimage'] !='')
							{
								$returnme .= 'icon: image,';
							}
						$returnme .= '
							position: ' . $atts['id'] . '.getCenter()
						});
						';

						//infowindow
						if($atts['popup'] != '') 
						{
							//first convert and decode html chars
							$thiscontent = htmlspecialchars_decode($atts['popup']);
							$returnme .= '
							var contentString = \'' . $thiscontent . '\';
							var infowindow = new google.maps.InfoWindow({
								content: contentString
							});
										
							google.maps.event.addListener(marker, \'click\', function() {
							  infowindow.open(' . $atts['id'] . ',marker);
							});
							';

							//infowindow default
							if ($atts['infowindowdefault'] == 'yes')
							{
								$returnme .= '
									infowindow.open(' . $atts['id'] . ',marker);
								';
							}
						}
					}
			$returnme .= '
				} else {
				alert("Geocode was not successful for the following reason: " + status);
			}
			});
			';
		}

		//marker: show if address is not specified
		if ($atts['popup'] != '' && $atts['address'] == '')
		{
			//add custom image
			if ($atts['markerimage'] !='')
			{
				$returnme .= 'var image = "'. $atts['markerimage'] .'";';
			}

			$returnme .= '
				var marker = new google.maps.Marker({
				map: ' . $atts['id'] . ', 
				';
				if ($atts['markerimage'] !='')
				{
					$returnme .= 'icon: image,';
				}
			$returnme .= '
				position: ' . $atts['id'] . '.getCenter()
			});
			';

			//infowindow
			if($atts['popup'] != '') 
			{
				$returnme .= '
				var contentString = \'' . $atts['popup'] . '\';
				var infowindow = new google.maps.InfoWindow({
					content: contentString
				});
							
				google.maps.event.addListener(marker, \'click\', function() {
				  infowindow.open(' . $atts['id'] . ',marker);
				});
				';
				//infowindow default
				if ($atts['infowindowdefault'] == 'yes')
				{
					$returnme .= '
						infowindow.open(' . $atts['id'] . ',marker);
					';
				}				
			}
		}
		
		$returnme .= '</script>';
		
		
		return $returnme;
}

/*-----------------------------------------------------------------------------------*/
/*	Google Chart
/*-----------------------------------------------------------------------------------*/

function sd_google_chart( $atts ) {
	extract(shortcode_atts(array(
		'data'     => '',
		'colors'   => '',
		'size'     => '400x200',
		'bg'       => 'ffffff',
		'title'    => '',
		'labels'   => '',
		'advanced' => '',
		'type'     => 'pie',
		'align'    => ''
	), $atts));
 
	switch ($type) {
		case 'line' :
			$charttype = 'lc'; break;
		case 'xyline' :
			$charttype = 'lxy'; break;
		case 'sparkline' :
			$charttype = 'ls'; break;
		case 'meter' :
			$charttype = 'gom'; break;
		case 'scatter' :
			$charttype = 's'; break;
		case 'venn' :
			$charttype = 'v'; break;
		case 'pie' :
			$charttype = 'p3'; break;
		case 'pie2d' :
			$charttype = 'p'; break;
		default :
			$charttype = $type;
		break;
	}
	if (!isset($string)) $string = null;
	if ($title) $string .= '&chtt='.$title.'';
	if ($labels) $string .= '&chl='.$labels.'';
	if ($colors) $string .= '&chco='.$colors.'';
	
	$string .= '&chs='.$size.'';
	$string .= '&chd=t:'.$data.'';
	$string .= '&chf=bg,s,'.$bg.'';
 
	$out = '<img class="' . $align . ' google_chart" title="' . $title . '" src="http://chart.apis.google.com/chart?cht=' . $charttype . '' . $string . $advanced . '" alt="' . $title . '" />';
	
	return $out;
}

/*-----------------------------------------------------------------------------------*/
/*	Toggle
/*-----------------------------------------------------------------------------------*/

function sd_toggle($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'title' => false
	), $atts));
	
	$out = '<div class="toggle">
				<h4 class="toggle-title">' . $title . '<span></span></h4>
				<div class="toggle-content">' . do_shortcode(trim($content)) . '</div>
			</div>';
	
	return $out;
}

/*-----------------------------------------------------------------------------------*/
/*	Tabs
/*-----------------------------------------------------------------------------------*/

function sd_tabs( $atts, $content ){
	extract(shortcode_atts(array(
		'type' => '',
		'id'   => ''
		), $atts));
	
	$GLOBALS['tab_count'] = 0;

	do_shortcode( $content );

	if ($type == 'horizontal')

	if( is_array( $GLOBALS['tabs'] ) ){
	
		foreach( $GLOBALS['tabs'] as $tab ){
	
		$tabs[] = '<li><a class="" href="#"><span class="title-arrow"></span>'.$tab['title'].'</a></li>';
		$panes[] = '<div class="pane">'.do_shortcode($tab['content']).'</div>';
	}
	
	$out = '<!-- the tabs -->
	
	<div class="the-tabs"><ul class="tabs">'.implode( "\n", $tabs ).'</ul>'."\n".'<!-- tab "panes" --><div class="panes">'.implode( "\n", $panes ).'</div>';

	$out .= '</div>';
	}

	if ($type == 'vertical')

	if( is_array( $GLOBALS['tabs'] ) ){
	
	$i = 0;	
	
	foreach( $GLOBALS['tabs'] as $tab){
	
	$i++;	
	
	$tabs[]  = '<li><a class="" href="#tabs-'.$i.'">'.$tab['title'].'</a></li>';
	$panes[] = '<div id="tabs-'.$i.'">'.do_shortcode($tab['content']).'</div>';
	}
	
	$out ='<!-- the tabs -->
			<div id="vertical-tabs" class="tabs-vertical"><ul>'.implode( "\n", $tabs ).'</ul>'."\n".'<!-- tab "panes" -->'.implode( "\n", $panes ).''."\n";

	$out .= '</div><div class="clear"></div>';
}

	return $out;
}

// tab group

function sd_tab_group( $atts, $content ){
	extract(shortcode_atts(array(
		'title' => 'Tab %d'
		), $atts));

	$x = $GLOBALS['tab_count'];

	$GLOBALS['tabs'][$x] = array( 'title' => sprintf( $title, $GLOBALS['tab_count'] ), 'content' =>  $content );

	$GLOBALS['tab_count']++;
	}

/*-----------------------------------------------------------------------------------*/
/*	Accordion
/*-----------------------------------------------------------------------------------*/

function sd_accordion($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'style' => false,
		'icon'  => ''
	), $atts));

	if (!preg_match_all("/(.?)\[(accordion)\b(.*?)(?:(\/))?\](?:(.+?)\[\/accordion\])?(.?)/s", $content, $matches)) {
		return do_shortcode($content);
	} else {
		for($i = 0; $i < count($matches[0]); $i++) {
			$matches[3][$i] = shortcode_parse_atts($matches[3][$i]);
		}
		$output = '';
		for($i = 0; $i < count($matches[0]); $i++) {
			$output .= '<div class="accordion-wrap"><div class="tab">'. $matches[3][$i]['title'] .'<span></span></div>';
			$output .= '<div class="pane">' . do_shortcode(trim($matches[5][$i])) . '</div></div>';
		}

		return '<div class="accordion">' . $output . '</div>';
	}
}

/*-----------------------------------------------------------------------------------*/
/*	Icons
/*-----------------------------------------------------------------------------------*/

function sd_icons( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'style'	=> 'icon-home'
	), $atts));
	
	$out = '<i class="icon-text '.$style.'"></i> '.do_shortcode($content).'';

    return $out;
}

/*-----------------------------------------------------------------------------------*/
/*	Drop Caps
/*-----------------------------------------------------------------------------------*/

function sd_drop_caps( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'style'	=> 'normal',
	), $atts));

	$out = '<span class="dropcaps-'.$style.'">'.do_shortcode($content).'</span>';

    return $out;
}

/*-----------------------------------------------------------------------------------*/
/*	Framed Boxes
/*-----------------------------------------------------------------------------------*/

function sd_framed_box( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'bg'	    => '#ffffff',
		'text'	    => '#696969',
		'border'	=> '#e4e4e4'
	), $atts));

	$out = '<div class="framed-box" style="background-color: ' . $bg . '; color: ' . $text . '; border-color: '. $border .';">' . do_shortcode($content) . '</div>';

    return $out;
}

/*-----------------------------------------------------------------------------------*/
/*	Icon Box
/*-----------------------------------------------------------------------------------*/

function sd_icon_box( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'bg'	    => '#ffffff',
		'text'	    => '#696969',
		'border'	=> '#ffffff',
		'icon'	    => 'heart',
		'iconbg'	=> '#00ADEE',
		'title'	    => ''
	), $atts));
	
	$box_title = ( !empty($title) ? '<h3>' . $title . '</h3>' : '' );

	$out = '<div class="icon-box">
			<div class="icon-box-icon" style="background-color: '.$iconbg.';">
			<span class="icon-box-' . $icon . '"></span>
			</div>
			<div class="icon-box-content">
			' . $box_title . '
			' . do_shortcode($content) . 
			'</div>
			</div>';

    return $out;
}

/*-----------------------------------------------------------------------------------*/
/*	Colored Buttons
/*-----------------------------------------------------------------------------------*/

function sd_colored_buttons( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'link'	    => '#',
		'target'	=> '',
		'color'	    => 'white',
		'size'   	=> '',
		'align'	    => '',
		'rel'   	=> ''
	), $atts));

	$align = ($align) ? ' align'.$align : '';

	if(empty($rel))
	$nofollow = '';
	else
	$nofollow = 'rel="'.$rel.'"';

	if(empty($target))
	$button_target = '';
	else
	$button_target = 'target="'.$target.'"';

	
	$out = '<a ' . $button_target . ' class="button ' . $color . ' '. $size . ' ' . $align . '" href="' . $link . '" ' . $nofollow . '> ' . $content . '</a>';

    return $out;
}

/*-----------------------------------------------------------------------------------*/
/*	Action Box
/*-----------------------------------------------------------------------------------*/

function sd_action_box( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'title'  	 => 'Default Title',
		'link'   	 => '#',
		'button'     => 'white',
		'buttontext' => 'Sign Up!',
		'target'     => '_self',
	), $atts));
	
	$out = '<div class="action-box clearfix">
				<div class="action-box-content">
				<h2>' . $title . '</h2>
				<p>' . $content . '</p>
				</div>
			
				<div class="action-box-button">
				<a ' . $target . ' class="button ' . $button . '" href="' . $link . '"> ' . $buttontext . '</a>
				</div>
			
			</div>';
			
	return $out;

}

/*-----------------------------------------------------------------------------------*/
/*	Styled Table
/*-----------------------------------------------------------------------------------*/

function sd_styled_table( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));

	$out = '<div class="styled-table">'.do_shortcode($content).'</div>';

    return $out;
}

/*-----------------------------------------------------------------------------------*/
/*	Pricing Table
/*-----------------------------------------------------------------------------------*/

function sd_pricing_table($atts, $content = null) {
	extract(shortcode_atts(array(
	), $atts));

	$out = '<div class="pricing-table clearfix">' . do_shortcode($content) . '</div>';

  return $out;
}

// pricing table header

function sd_pricing_header($atts, $content = null) {
	extract(shortcode_atts(array(
		'title' => '',
		'desc'  => '',
		'type'  => ''
	), $atts));
	
	if (empty($desc))
		$desc_text = '';
	else
		$desc_text = '<p>'.$desc.'</p>';
		
	if(empty($type))
		$table_type = '';
	else
		$table_type = 'pricing-'.$type.'';

	$out = '<div class="pricing-column '.$table_type.'">
				<div class="pricing-header">
					<h4>'.$title.'</h4>
					'.$desc_text.'
				</div>
			<!-- end pricing_header -->
			';

	return $out;
}

// pricing table content

function sd_pricing_content($atts, $content = null) {
	extract(shortcode_atts(array(
		'price' => '',
		'decimals' => '',
		'currency' => '$',
		'button_text' => 'Sign Up!',
		'button_link' => '#',
		'pricedesc' => '',
		'target' => '_self'	
	
	), $atts));
	
	$price_style = (!empty($pricedesc) ? 'style="line-height: normal; height: 65px; padding-top: 25px;"' : '');
	
	if(empty($decimals))
		$price_dec = '';
	else 
		$price_dec = '<sup>'.$decimals.'</sup>';
		
	$price_desc = (!empty($pricedesc) ? $price_desc = '<span class="price-desc">' . $pricedesc . '</span>' : '');

	$out = '<div class="pricing-content">
				<div class="pricing-column-inside">
					<ul class="pricing">
						' . do_shortcode($content) . '
					</ul>
        			<span class="table-price" ' .$price_style. '>
					<span class="dollar-sign">' . $currency . '</span>' . $price . $price_dec . $price_desc . '</span> 
					<a class="pricing-table-button" href="' . $button_link . '" target="' . $target . '">' . $button_text . '</a> 
			</div>
			<!-- end pricing_column_inside --> 
			</div>
			<!-- end pricing_content --> 
			</div>
			<!-- pricing_column -->
			';

	return $out;
}

// pricing table item

function sd_pricing_item($atts, $content = null) {
	extract(shortcode_atts(array(
		'text' => '',
		'type' => ''
	), $atts));

	if(empty($type))
		$list_class = '';
	else
		$list_class = 'class="'.$type.'-mark"';
	
	$out = '<li ' . $list_class . '><span>' . do_shortcode($content) . '</span></li>';

	return $out;
}

/*-----------------------------------------------------------------------------------*/
/*	Responsive Image
/*-----------------------------------------------------------------------------------*/

function sd_responsive_content($atts, $content = null) {
	extract(shortcode_atts(array(
	), $atts));
	
	$out = '<span class="responsive-content">' . do_shortcode($content) . '</span>';

	return $out;
}

/*-----------------------------------------------------------------------------------*/
/*	Members
/*-----------------------------------------------------------------------------------*/

function sd_person_info($atts, $content = null) {
	extract(shortcode_atts(array(
	'photo' 	=> '',
	'name' 	=> '',
	'subtitle'	=> '',
	'skill1'	=> '',
	'skill2'	=> '',
	'skill3'	=> '',
	'skill4'	=> '',
	'skill5'	=> ''
	), $atts));
	
	$image = ( !empty($photo) ) ? '<img src="' . $photo . '" alt="' .$name. '" title="' .$name. '" />' : '';
	
	$skill1 = ( !empty($skill1)) ? '<li>'. $skill1 .'</li>' : '';
	$skill2 = ( !empty($skill2)) ? '<li>'. $skill2 .'</li>' : '';
	$skill3 = ( !empty($skill3)) ? '<li>'. $skill3 .'</li>' : '';
	$skill4 = ( !empty($skill4)) ? '<li>'. $skill4 .'</li>' : '';
	$skill5 = ( !empty($skill5)) ? '<li>'. $skill5 .'</li>' : '';
	
	$skill_list = ( !empty($skill1) || !empty($skill2) || !empty($skill3) || !empty($skill4) || !empty($skill5) ) ? '
	<ul>
	'. $skill1 . $skill2 . $skill3 . $skill4 . $skill5 .'
	</ul>
	' : '';
	
	$subtitle = ( !empty($subtitle) ) ? '<h5>' . $subtitle . '</h5>' : '';
	
	$out = '
		<div class="member-box">
		' . $image . '
			<div class="member-details">
				<h3>' . $name . '</h3>
				' . $subtitle . '
				<p>' . do_shortcode($content) . '</p>
				' . $skill_list . '
			</div>
		</div>
	';

	return $out;
}
/*-----------------------------------------------------------------------------------*/
/*	WPML FIX
/*-----------------------------------------------------------------------------------*/
function sd_wpml_fix( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'lang'      => '',
    ), $atts));
	
	$lang_active = ICL_LANGUAGE_CODE;
	
	if($lang == $lang_active){
		return do_shortcode($content);
	}
}

/* ------------------------------------------------------------------------ */
/* Carousel
/* ------------------------------------------------------------------------ */

function sd_carousel($atts, $content = null){
	extract(shortcode_atts(array(
	'id' => 'default',
	'itemwidth' => ''
	), $atts));
 	
	$out = '
	<script type="text/javascript">
jQuery(window).load(function() {
			jQuery(\'.carousel'.$id.'\').flexslider({
				'.$item_width = (!empty($itemwidth) ? 'itemWidth:'.$itemwidth.',' : '').'
				animation: "fade",
				animationLoop: true,
				slideshow: true,
				smoothHeight: true,
				controlsContainer: ".thecarousel .arrows'.$id.'",
				keyboard: true,
				controlNav: false,
				video:true
			});
		});
</script>';
	$out .= '
			<div class="thecarousel flexslider">
				<div class="arrows arrows'. $id .'"></div>
				<div class="carousel'. $id .' carouselcontent clearfix">
					<ul class="slides">
						'. do_shortcode($content) .'
					</ul>
				</div>
			</div>
			';

	return $out;
}

// carousel item
function sd_carousel_item($atts, $content = null){
	extract(shortcode_atts(array(
	), $atts));
 	
	$out = '
			<li>' . do_shortcode($content) . '</li>
			';
	
	return $out;
}

// widget shortcode

function sd_widget_shortcode( $atts ) {

// Configure defaults and extract the attributes into variables
extract( shortcode_atts( 
	array( 
		'type'   => '',
		'title'  => ''
	), 
	$atts 
));

$args = array(
	'before_widget' => '<div class="box widget">',
	'after_widget'  => '</div>',
	'before_title'  => '<div class="widget-title">',
	'after_title'   => '</div>',
);

ob_start();
the_widget( $type, $atts, $args ); 
$output = ob_get_clean();

return $output;
}


add_shortcode('one_third', 'sd_one_third');
add_shortcode('one_third_last', 'sd_one_third_last');
add_shortcode('two_third', 'sd_two_third');
add_shortcode('two_third_last', 'sd_two_third_last');
add_shortcode('one_half', 'sd_one_half');
add_shortcode('one_half_last', 'sd_one_half_last');
add_shortcode('one_fourth', 'sd_one_fourth');
add_shortcode('one_fourth_last', 'sd_one_fourth_last');
add_shortcode('three_fourth', 'sd_three_fourth');
add_shortcode('three_fourth_last', 'sd_three_fourth_last');
add_shortcode('one_fifth', 'sd_one_fifth');
add_shortcode('one_fifth_last', 'sd_one_fifth_last');
add_shortcode('two_fifth', 'sd_two_fifth');
add_shortcode('two_fifth_last', 'sd_two_fifth_last');
add_shortcode('three_fifth', 'sd_three_fifth');
add_shortcode('three_fifth_last', 'sd_three_fifth_last');
add_shortcode('four_fifth', 'sd_four_fifth');
add_shortcode('four_fifth_last', 'sd_four_fifth_last');
add_shortcode('one_sixth', 'sd_one_sixth');
add_shortcode('one_sixth_last', 'sd_one_sixth_last');
add_shortcode('five_sixth', 'sd_five_sixth');
add_shortcode('five_sixth_last', 'sd_five_sixth_last');

add_shortcode('divider', 'sd_divider');

add_shortcode('video', 'sd_video');

add_shortcode('lightbox', 'sd_lightbox');

add_shortcode('short', 'sd_short_url');

add_shortcode('framed_image', 'sd_framed_image');

add_shortcode('highlight','sd_highlight');

add_shortcode('tooltip','sd_tooltip');

add_shortcode('styled_title','sd_styled_title');

add_shortcode('actionbutton', 'sd_action_button');

add_shortcode('skill', 'sd_skill_set');

add_shortcode('portfolio', 'sd_latest_portfolio_items');

add_shortcode('blog', 'sd_latest_blog_items');

add_shortcode('testimonial', 'sd_testimonial');
add_shortcode('photo_testimonial', 'sd_photo_testimonial');

add_shortcode('googlemap', 'sd_google_map');

add_shortcode('chart', 'sd_google_chart');

add_shortcode('toggle', 'sd_toggle');

add_shortcode( 'tabs', 'sd_tabs' );
add_shortcode( 'tab', 'sd_tab_group' );

add_shortcode('accordions', 'sd_accordion');

add_shortcode('icon', 'sd_icons');

add_shortcode('dropcaps', 'sd_drop_caps');

add_shortcode('framedbox', 'sd_framed_box');

add_shortcode('iconbox', 'sd_icon_box');

add_shortcode('button', 'sd_colored_buttons');

add_shortcode('actionbox', 'sd_action_box');

add_shortcode('styledtable', 'sd_styled_table');

add_shortcode('pricing_table','sd_pricing_table');
add_shortcode('pricing_header','sd_pricing_header');
add_shortcode('pricing_content','sd_pricing_content');
add_shortcode('pricing_item','sd_pricing_item');

add_shortcode('responsive','sd_responsive_content');

add_shortcode('member','sd_person_info');

add_shortcode('wpml_translate', 'sd_wpml_fix');

add_shortcode('carousel','sd_carousel');
add_shortcode('carousel_item','sd_carousel_item');

add_shortcode( 'widget', 'sd_widget_shortcode' );
?>