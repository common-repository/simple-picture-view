<?php
/*
Plugin Name: Simple-Picture-View
Plugin URI: 
Description: Shows pictures in the sidebar
Author: Georg Ruetsche
Version: 1.0.0
Author URI:

This program enables you to load pictures in a widget.
Copyright (C) 2014 Georg Ruetsche

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/
class picture_view extends WP_Widget {
	function picture_view() {
		// Konstruktor
		$wp_options = array('description'=>'Hier werden Bilder abgelegt, die nachher angezeigt werden können');
		parent::WP_Widget(false, $name = 'picture_view',$wp_options);
	}

	function widget($args, $instance) {
		// Ausgabefunktion
		extract( $args );
	$picture_1 = apply_filters('widget_picture_1', $instance['picture_1']);
	$picture_2 = apply_filters('widget_picture_2', $instance['picture_2']);
	$picture_3 = apply_filters('widget_picture_3', $instance['picture_3']);
	echo $before_widget;

	if ( $picture_1 )
		
		echo
    '<img class="alignnone size-medium wp-image-76" width="300" height="221" src="'.$picture_1.'" alt="'.$picture_1.'"></img><img class="alignnone size-medium wp-image-76" width="300" height="221" src="'.$picture_2.'" alt="'.$picture_2.'"></img>
	  <style>
{float: left; clear:left}
</style>'; 

	echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		// Speichern der Optionen
			$instance = $old_instance;

	$instance['picture_1'] = strip_tags( $new_instance['picture_1'] );
	$instance['picture_2'] = strip_tags( $new_instance['picture_2'] );
	//$instance['picture_3'] = $new_instance['picture_3'];

	return $instance;
	}

	function form($instance) {  

		$default_settings = array( 'picture_1' => 'first_picture', 'picture_2' => 'second_picture', 'picture_3' => 'third_picture' );
		$instance = wp_parse_args( (array) $instance, $default_settings ); 
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'picture_1' ); ?>">picture_1:</label>
			<input id="<?php echo $this->get_field_id( 'picture_1' ); ?>" name="<?php echo $this->get_field_name( 'picture_1' ); ?>" value="<?php echo $instance['picture_1']; ?>" style="width:100%;" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'picture_2' ); ?>">picture_2:</label>
			<input id="<?php echo $this->get_field_id( 'picture_2' ); ?>" name="<?php echo $this->get_field_name( 'picture_2' ); ?>" value="<?php echo $instance['picture_2']; ?>" style="width:100%;" />
		</p>
		<!--
		<p>
			<label for="<?php echo $this->get_field_id( 'picture_3' ); ?>">picture_3:</label>
			<input id="<?php echo $this->get_field_id( 'picture_3' ); ?>" name="<?php echo $this->get_field_name( 'picture_3' ); ?>" value="<?php echo $instance['picture_3']; ?>" style="width:100%;" />
		</p>
		-->
    <?php

	}
}

function register_view() {
	register_widget( 'picture_view' );
}

add_action( 'widgets_init', 'register_view' );
	?>