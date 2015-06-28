<?php

function generate_connections ($users, $nodes, $max_views_per_user, $conncections_file_path) {

	if (!$file = fopen($output_file_path, 'w')) {
		print_r('Unable to open file to create connections CSV.');
	}

	$i = 0;
	while ($i < $users) {
		$j = 1;
		$rand = rand(0, $max_views);
		while ($j <= $rand) {
                        $output = array();
			$output[] = $i;
			$output[] = rand(0, $nodes);
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
$pages = 100;

// Maximum unique page views per user.
// We don't count hitting the same page multiple times.
$max_views = 5;

// We will use this as a property value.
$base_url = 'sheldonkreger.com';

// Edit to fit your filesystem.
$connections_file_path = '~/connections.csv';

// Invoke the function.
generate_connections($users, $pages, $max_views_per_user, $connections_file_path);

