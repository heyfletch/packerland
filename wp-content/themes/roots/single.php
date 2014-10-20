<?php 
	if(!get_post_format()) {
		get_template_part('templates/content', 'single'); 
	} else {
		get_template_part('templates/content-single', get_post_format());
	}
?>
