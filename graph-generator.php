<?php

function generate_connections ($users, $nodes, $max_views, $base_url, $output_file_path) {

	if (!$file = fopen($output_file_path, 'w')) {
		print_r('Unable to open file.');
	}

	$i = 0;
	while ($i < $users) {
		$j = 1;
		$rand = rand(0, $max_views);
		while ($j <= $rand) {
                        $output = array();
			$output[] = $base_url;
			$output[] = $i;
			$output[] = rand(0, $nodes);
			print_r($output, true);
			fputcsv($file, $output);
			$j++;
		}
		$i++;
	}
	fclose($file);
}

// The number of users to be represented in your graph.
$users = 10;

// The number of pages your users could visit. On a Drupal site, each page is represented intenally as 'www.blah.com/node/int_value'.
// I follow this convention here. Drupal just happens to call them 'nodes'. :-)
$nodes = 100;

// Maximum unique page views per user.
// We don't count hitting the same page multiple times.
$max_views = 5;

// We will use this as a property value.
$base_url = 'sheldonkreger.com';

// Edit to fit your filesystem.
$output_file_path = '/home/sheldon/connections.csv';

// Invoke the function.
generate_connections($users, $nodes, $max_views, $base_url, $output_file_path);

