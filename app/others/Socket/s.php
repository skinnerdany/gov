<?php

$ip = '127.0.0.1';
$port = 38100;

$s = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

socket_bind($s, $ip, $port);
socket_listen($s);
socket_set_nonblock($s);

for (;;) {
	if ($con = socket_accept($s)) {
		echo "Connected\n";
		$in = socket_read($con, 100);
		$res = unpack('ncode/Nsize/a*val', $in);
		print_r($res);

		$data = sha1('test');
		echo "\nData {$data} \n";
		$body = pack('a*', $data);
		$sent = socket_write($con, $body);
		echo "Sent = {$sent} \n";
	}
}

//echo "Error: " . socket_strerror(socket_last_error()) . "\n";


