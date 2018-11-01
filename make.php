<?php 

$file = $argv[1];
$tools = $argv[2];
touch($file);

$isi = '<?php 

/*

	IndoSec Framework @ 2018 { IndoSec Coder Team }

	Tools : '.$tools.'

*/

?>';

	$open = fopen('bin/'.$file, 'a');
	fwrite($open, $isi);
	fclose($open);

?>