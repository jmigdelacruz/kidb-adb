<?php
use Illuminate\Support\Facades\Crypt;
$notapass = Crypt::encryptString('osdbs');
$notapass2 = Crypt::encryptString('secret');
return [
	'default' => 'oracle',
	'connections' => [
		'oracle' => [
		    'driver' => 'oracle',
		    'host' => 'LDDB02',
		    'port' => '1527',
		    'database' => 'LDDB02',
		    'service_name' => 'OISTDEV',
		    'username' => 'OSDBS',
		    'password' => Crypt::decryptString($notapass),
		    'charset' => '',
		    'prefix' => '',
		],
		'mysql' => [
		    'driver' => 'mysql',
		    'host' => '127.0.0.1',
		    'port' => '3306',
		    'database' => 'kidb',
		    'username' => 'homestead',
		    'password' => Crypt::decryptString($notapass2),
		]
	]
];
?>
