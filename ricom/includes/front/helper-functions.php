<?php

// General Functions

function get_attachment_src($att_id, $size = 'full') {
	if ( wp_attachment_is_image($att_id) ) {
		$att = wp_get_attachment_image_src($att_id, $size);

		return $att[0];
	}

	return wp_get_attachment_url($att_id);
}

// Car Functions

function get_car_brand($post_id = 0) {
	if ( !$post_id ) {
		$post_id = $GLOBALS['post']->ID;
	}

	return get_field('brand', $post_id);
}

function get_car_model($post_id = 0) {
	if ( !$post_id ) {
		$post_id = $GLOBALS['post']->ID;
	}

	return get_field('model', $post_id);
}

function get_car_fuel_type($post_id = 0) {
	if ( !$post_id ) {
		$post_id = $GLOBALS['post']->ID;
	}

	return get_field('fuel_type', $post_id);
}

function get_car_transmission_type($post_id = 0) {
	if ( !$post_id ) {
		$post_id = $GLOBALS['post']->ID;
	}

	return get_field('transmission_type', $post_id);
}

function get_car_year($post_id = 0) {
	if ( !$post_id ) {
		$post_id = $GLOBALS['post']->ID;
	}

	return get_field('year', $post_id);
}

function get_car_seats($post_id = 0) {
	if ( !$post_id ) {
		$post_id = $GLOBALS['post']->ID;
	}

	return get_field('seats', $post_id);
}

function get_car_fuel_consumption($post_id = 0) {
	if ( !$post_id ) {
		$post_id = $GLOBALS['post']->ID;
	}

	return get_field('fuel_consumption', $post_id);
}

function get_car_horse_powers($post_id = 0) {
	if ( !$post_id ) {
		$post_id = $GLOBALS['post']->ID;
	}

	return get_field('horse_powers', $post_id);
}

function get_car_engine_volume($post_id = 0) {
	if ( !$post_id ) {
		$post_id = $GLOBALS['post']->ID;
	}

	return get_field('engine_volume', $post_id);
}

function get_car_gallery($post_id = 0) {
	if ( !$post_id ) {
		$post_id = $GLOBALS['post']->ID;
	}

	return get_field('gallery', $post_id);
}

function get_car_prices($post_id = 0) {
	if ( !$post_id ) {
		$post_id = $GLOBALS['post']->ID;
	}

	return get_field('prices', $post_id);
}

function get_car_price_winter_1_7_days($post_id = 0) {
	if ( !$post_id ) {
		$post_id = $GLOBALS['post']->ID;
	}

	$prices = get_car_prices($post_id);

	return $prices['price_winter_1_7_days'];
}

function get_car_price_winter_8_27_days($post_id = 0) {
	if ( !$post_id ) {
		$post_id = $GLOBALS['post']->ID;
	}

	$prices = get_car_prices($post_id);

	return $prices['price_winter_8_27_days'];
}

function get_car_price_winter_27_plus_days($post_id = 0) {
	if ( !$post_id ) {
		$post_id = $GLOBALS['post']->ID;
	}

	$prices = get_car_prices($post_id);

	return $prices['price_winter_27_plus_days'];
}

function get_car_price_summer_1_7_days($post_id = 0) {
	if ( !$post_id ) {
		$post_id = $GLOBALS['post']->ID;
	}

	$prices = get_car_prices($post_id);

	return $prices['price_summer_1_7_days'];
}

function get_car_price_summer_8_27_days($post_id = 0) {
	if ( !$post_id ) {
		$post_id = $GLOBALS['post']->ID;
	}

	$prices = get_car_prices($post_id);

	return $prices['price_summer_8_27_days'];
}

function get_car_price_summer_27_plus_days($post_id = 0) {
	if ( !$post_id ) {
		$post_id = $GLOBALS['post']->ID;
	}

	$prices = get_car_prices($post_id);

	return $prices['price_summer_27_plus_days'];
}

function get_car_deposit($post_id = 0) {
	if ( !$post_id ) {
		$post_id = $GLOBALS['post']->ID;
	}

	$prices = get_car_prices($post_id);

	return $prices['deposit'];
}

function get_car_lowest_price_per_day($post_id = 0) {
	if ( !$post_id ) {
		$post_id = $GLOBALS['post']->ID;
	}

	return min( get_car_price_winter_27_plus_days($post_id), get_car_price_summer_27_plus_days($post_id) );
}

function get_season_for_date(DateTime $date = null) {
	if (  !$date ) {
		$date = new DateTime;
	}

	if ( $date >= new DateTime( $date->format('Y') . '-05-01' ) && $date <= new DateTime( $date->format('Y') . '-09-30' ) ) {
		return 'summer';
	}

	return 'winter';
}

function get_car_price_includes($post_id = 0) {
	if ( !$post_id ) {
		$post_id = $GLOBALS['post']->ID;
	}

	return get_field('price_includes', $post_id);
}

function get_car_booked_dates($post_id = 0) {
	if ( !$post_id ) {
		$post_id = $GLOBALS['post']->ID;
	}

	return get_post_meta( $post_id, 'booked_dates' );
}

function is_car_available_for_period($post_id = 0, $pickup_date, $dropoff_date) {
	if ( !$post_id ) {
		$post_id = $GLOBALS['post']->ID;
	}

	$booked_dates = get_post_meta( $post_id, 'booked_dates' );

	return !array_intersect( $booked_dates, get_period_dates($pickup_date, $dropoff_date) );
}

function calculate_rent_total_price($post_id = 0, $pickup_date, $dropoff_date, $address_delivery = false, $gtrent_protect = false) {
	if ( !$post_id ) {
		$post_id = $GLOBALS['post']->ID;
	}

	$total = 0;

	$period_dates = get_period_dates( $pickup_date, $dropoff_date );
	$period_dates_per_season = array(
		'winter' => array(),
		'summer' => array()
	);

	foreach ( $period_dates as $date ) {
		$period_dates_per_season[ get_season_for_date( new DateTime($date) ) ][] = $date;
	}

	foreach ( $period_dates_per_season as $season => $dates ) {
		if ( count($dates) <= 7 ) {
			$price_functioon_to_call = 'get_car_price_' . $season . '_1_7_days';
		} elseif ( count($dates) >= 8 && count($dates) <= 27 ) {
			$price_functioon_to_call = 'get_car_price_' . $season . '_8_27_days';
		} else {
			$price_functioon_to_call = 'get_car_price_' . $season . '_27_plus_days';
		}
		
		$total += $price_functioon_to_call( $post_id ) * count( $dates );
	}

	if ( $address_delivery ) {
		$total += get_price_for_address_delivery();
	}

	if ( $gtrent_protect ) {
		$total += get_price_for_gtrent_protect() * count( $period_dates );
	}

	return $total;
}

// Pickup / Delivery Functions

function get_pickup_delivery_locations() {
	return get_field( 'pickup_delivery_locations', 'option' );
}

// Global Price Functions

function get_price_for_address_delivery() {
	return get_field('price_for_address_delivery', 'option');
}

function get_price_for_gtrent_protect() {
	return get_field('price_for_gtrent_protect', 'option');
}

function get_partial_payment_percent() {
	return get_field('partial_payment_percent', 'option');
}

// Helpers

function get_period_dates($pickup_date, $dropoff_date) {
	$period_dates = array();
	$_loop_date = new DateTime( $pickup_date );

	while ( $_loop_date <= new DateTime( $dropoff_date ) ) {
		$period_dates[] = $_loop_date->format('Y-m-d');

		$_loop_date->add( new DateInterval('P1D') );
	}

	return $period_dates;
}

// Property Functions

function get_property_region($property_id = 0) {
	$town = get_property_municipality( $property_id );
	if ( !$town ) {
		return;
	}
	
	$region = clone $town;

	while ( $region->parent ) {
		$region = get_term( $town->parent, 'region' );
	}

	return $region;
}

function get_property_municipality($property_id = 0) {
	if ( !$property_id ) {
		$property_id = $GLOBALS['post']->ID;
	}

	$region = wp_get_object_terms( $property_id, 'region' );

	if ( $region ) {
		return $region[0];
	}
}

function get_property_all_locations($property_id = 0) {
	if ( !$property_id ) {
		$property_id = $GLOBALS['post']->ID;
	}

	$locations = wp_get_object_terms( $property_id, 'region' );

	return $locations;
}

function get_property_id($property_id = 0) {
	if ( !$property_id ) {
		$property_id = $GLOBALS['post']->ID;
	}

	return get_field( 'property_id', $property_id ) . get_field( 'properties_user_id', 'user_' . get_post_field( 'post_author', $property_id ) );
}

function get_property_types() {
	return get_terms(
		array(
			'taxonomy' => 'type'
		)
	);
}

function get_regions() {
	return get_terms(
		array(
			'taxonomy' => 'region',
			'parent' => 0
		)
	);
}

function get_region_municipalities($region_id) {
	return get_terms(
		array(
			'taxonomy' => 'region',
			'parent' => $region_id
		)
	);
}