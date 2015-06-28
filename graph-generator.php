<?php

function generate_connections ($users, $nodes, $max_views_per_user, $connections_file_path) {

	if (!$file = fopen($connections_file_path, 'w')) {
		print_r('Unable to open file to create connections CSV.');
	}

	$i = 0;
	while ($i < $users) {
		$i++;
		$j = 1;
		$rand = rand(0, $max_views_per_user);
		while ($j <= $rand) {
                        $output = array();
			$output[] = $i;
			$output[] = rand(0, $nodes);
			fputcsv($file, $output);
			$j++;
		}
	}
	fclose($file);
}

function generate_users ($users, $users_file_path) {
	$i = 0;
	if (!$file = fopen($users_file_path, 'w')) {
               print_r('Unable to open file to create users CSV.');
	}
	while ($i < $users) {
		$i++;
		$output = array();
		$output[] = $i;
		fputcsv($file, $output);
	}
	fclose($file);
}

function generate_pages ($pages, $pages_file_path) {
	if (!$file = fopen($pages_file_path, 'w')) {
		print_r('Unable to open file to create pages CSV.');
	}
	$i = 0;
	while ($i < $pages) {
		$i++;
		$output = array();
		$output[] = $i;
		fputcsv($file, $output);
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
$max_views_per_user = 5;

// We will use this as a property value.
$base_url = 'sheldonkreger.com';

// This is where outpt CSV files will go. Edit to fit your filesystem.
$connections_file_path = '/home/sheldon/connections.csv';
$pages_file_path = '/home/sheldon/pages.csv';
$users_file_path= '/home/sheldon/users.csv';

// Invoke the functions.
generate_pages($pages, $pages_file_path);
generate_users($users, $users_file_path);
generate_connections($users, $pages, $max_views_per_user, $connections_file_path);


