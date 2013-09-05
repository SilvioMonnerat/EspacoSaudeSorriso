<?php

$timebeforerevote = 1000;

function sd_post_like()
{
	$nonce = $_POST['nonce'];
 
    if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) )
        die ( 'Busted!');
		
	if(isset($_POST['post_like']))
	{
		$ip = $_SERVER['REMOTE_ADDR'];
		$post_id = $_POST['post_id'];
		
		$meta_IP = get_post_meta($post_id, "voted_IP");

		$voted_IP = ( !empty($meta_IP) ) ? $voted_IP = $meta_IP[0] : $voted_IP = 0 ;
		if(!is_array($voted_IP))
			$voted_IP = array();
		
		$meta_count = get_post_meta($post_id, "votes_count", true);

		if(!sd_already_voted($post_id))
		{
			$voted_IP[$ip] = time();

			update_post_meta($post_id, "voted_IP", $voted_IP);
			update_post_meta($post_id, "votes_count", ++$meta_count);
			
			echo $meta_count;
		}
		else
			echo "already";
	}
	exit;
}

function sd_already_voted($post_id)
{
	global $timebeforerevote;

	$meta_IP = get_post_meta($post_id, "voted_IP");
	$voted_IP = ( !empty($meta_IP) ) ? $voted_IP = $meta_IP[0] : $voted_IP = 0 ;
	
	if(!is_array($voted_IP))
		$voted_IP = array();
	$ip = $_SERVER['REMOTE_ADDR'];
	
	if(in_array($ip, array_keys($voted_IP)))
	{
		$time = $voted_IP[$ip];
		$now = time();
		
		if(round(($now - $time) / 60) > $timebeforerevote)
			return false;
			
		return true;
	}
	
	return false;
}

function sd_post_like_link($post_id)
{
	$first_vote_count = get_post_meta($post_id, "votes_count", true);
	
	$vote_count = ( ($first_vote_count != 0) ? get_post_meta($post_id, "votes_count", true) : 0);
	
	$output = '<span class="post-rating">';
	if(sd_already_voted($post_id))
		$output .= ' <span title="'.__('Already Liked', 'framework').'" class="already-voted"></span>';
	else
		$output .= '<a href="#" data-post_id="'.$post_id.'">
					<span class="not-voted" title="'.__('I like this article', 'framework').'"></span>
				</a>';
	$output .= '<span class="vote-count">'.$vote_count.'</span></span>';
	
	return $output;
}

add_action('wp_ajax_nopriv_post-like', 'sd_post_like');
add_action('wp_ajax_post-like', 'sd_post_like');