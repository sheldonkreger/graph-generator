<?php

function generate_connections ($users, $nodes, $max_views, $base_url) {

	if (!$file = fopen('/home/sheldon/connections.txt', 'w')) {
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
	print_r('closed file.');
}

$users = 10;
$nodes = 100;
$max_views = 5;
$base_url = 'sheldonkreger.com';

generate_connections($users, $nodes, $max_views, $base_url);

