<?php
$urlLogger = "http://hlog.local/log.php?facility=%s&machine_id=%s&line=%s";
$f = fopen('php://stdin', 'r');
while ($logLine = fgets($f)) {
	$facility = $_SERVER['argv'][1];
	$machine_id = $_SERVER['argv'][2];
	$line = urlencode($logLine);
	$ch = curl_init(sprintf($urlLogger, $facility, $machine_id, $line));

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_exec($ch);
	curl_close($ch);
}