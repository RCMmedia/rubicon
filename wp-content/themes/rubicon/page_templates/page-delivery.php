<?php
/*
	Template Name: Delivery
*/


get_header(); ?>

	<div class="general-content">
		<div class="inner">
			<h1>Delivery by <img width="58" style="margin-left: 10px; margin-bottom: -5px;" src="http://rubicondeli.com/wp-content/themes/rubicon/images/postmates-delivery.png" alt="postmates"> PostMates<span></span></h1>
			<div class="content clearfix">
				
				<div class="vertical-align">
					<h2>Please choose a location</h2>
					
					<select name="myList" id="location-select">
    				<option value="https://postmates.com/sd/rubicon-deli-san-diego-2">Mission Hills</option>
    				<option value="https://postmates.com/sd/rubicon-deli-san-diego-2">Mission Bay</option>
					</select>

					<input class="location-selector" type="button" value="Go To Location!" onclick="NavigateToSite()" />

				</div><!-- .vertical-align -->
				
			</div><!-- .content -->
		</div><!-- .inner -->
	</div><!-- .jobs -->
	
	
	<script>
		function NavigateToSite(){
    	var ddl = document.getElementById("location-select");
			var selectedVal = ddl.options[ddl.selectedIndex].value;

			window.open(selectedVal)
		}
	</script>

<?php get_footer(); ?>
