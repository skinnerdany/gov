<?php

$ip = '127.0.0.1';
//$ip = '192.168.1.73';
$port = 38100;

$s = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

if (!socket_connect($s, $ip, $port)) {
	echo "Error: " . socket_strerror(socket_last_error()) . "\n";
}


$data = md5('test');
echo "KEY: {$data} \n";

// 	CODE	       SIZE			  DATA
$body = pack('n', 1) . pack('N', strlen($data)) . pack('a*', $data);

$sent = socket_write($s, $body);

if (strlen($body) != $sent) {
	 echo "Error: " . socket_strerror(socket_last_error()) . "\n";
} else {
	echo "Sent = {$sent} bytes\n";
}

$buf = '';

if (($bytes = socket_recv($s, $buf, 100, MSG_WAITALL)) !== false) {
	echo "READ {$bytes} bytes\n";
} else {
	echo "Error: " . socket_strerror(socket_last_error()) . "\n";
}

echo ">> {$buf} << \n";
socket_close($s);

