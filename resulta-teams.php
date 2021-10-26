<?php
/**
* Plugin Name: Resulta NFL Team Sorter
* Plugin URI: https://www.andrewclough.com
* Description: This is a Resulta plugin using AlpineJS
* Version: 1.0
* Author: Andrew Clough
**/

function build_table() { ?>

<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<?php
$request = wp_remote_get( 'http://delivery.chalk247.com/team_list/NFL.JSON?api_key=74db8efa2a6db279393b433d97c2bc843f8e32b0' );

if( is_wp_error( $request ) ) {
	return false; 
}

$body = wp_remote_retrieve_body( $request );
$data = json_decode( $body );

if( ! empty( $data ) ) { 
?>

<div x-data="data()" class="resulta-teams">
<table>
	<thead>
		<th @click="sortByColumn">City</th>
		<th @click="sortByColumn">Name</th>
		<th @click="sortByColumn">Conference</th>
		<th @click="sortByColumn">Division</th>
	</thead>	
	<tbody x-ref="tbody">
<?php //Sort data to table columns.
	foreach( $data->results->data->team as $team ) {
		echo '<tr>';
			echo  '<td>'.$team->display_name.'</td>';
			echo  '<td>'.$team->nickname.'</td>';
			echo  '<td>'.$team->conference.'</td>';
			echo  '<td>'.$team->division.'</td>';
		echo '</tr>';
	}
	echo '</tbody></table>';
}
?>
</div>

<?php
}

function resulta_teams_function() {
    wp_enqueue_script( 'teamsort',plugin_dir_url( __FILE__ ) . 'team-sort.js' );
    
    //Add CSS for active column class and other styling. 
    //wp_enqueue_style( 'style',  plugin_dir_url( __FILE__ ) . '/assets/resulta-team.css');
    build_table();
}

add_shortcode('resulta-teams', 'resulta_teams_function');

?>