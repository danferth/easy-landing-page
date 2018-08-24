<?php
//this up top
session_start();
require_once("mail-functions.php");
require 'config.php';
require 'assets/lib/PHPMailer/PHPMailerAutoload.php';

$server_dir = $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['PHP_SELF']), '/\\') . '/';
$next_page = 'index.php';
header('HTTP/1.1 303 See Other');
//trim post
array_walk($_POST, 'trim_value');

//Honeypot variables
$honeypotCSS = filter_var($_POST['your-name925htj'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_ENCODE_HIGH);
$honeypotJS = filter_var($_POST['your-email247htj'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_ENCODE_HIGH);
//Email variables
$fname   = filter_var($_POST['fname'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_ENCODE_HIGH);
$lname   = filter_var($_POST['lname'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_ENCODE_HIGH);
$email   = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

$query_string = '?first_name=' . $fname;
//==========================================================
//Let's check for a few things and then go forward shall we
//==========================================================

//CHECK form completion time=====================================
//first variable passed to function should be seconds for minimum completion
formTimeCheck(1, $server_dir, $next_page, $query_string);

//CHECK required inputs=====================================
//put required variables into array
$required = array($fname, $lname, $email);
checkRequired($required,  $server_dir, $next_page, $query_string);

//Validate email===========================================
//put any emails that need to be validated into an array
$checkTheseEmails = array($email);
checkEmailValid($checkTheseEmails,  $server_dir, $next_page, $query_string);
  
//check the honeypots======================================
//put honeypots into array
$honeypots = array($honeypotCSS, $honeypotJS);
checkHoneypot($honeypots,  $server_dir, $next_page, $query_string);

//all must be good, lets send a few emails==============================


$body  = sprintf("<html>"); 
$body .= sprintf("<body>");
$body .= sprintf("<h2>Contact from " . $page . " Landing page</h2>\n");
$body .= sprintf("<hr />");
$body .= sprintf("\nEmail: <strong>%s</strong><br />\n",$email);
$body .= sprintf("\nName: <strong>%s %s</strong><br />\n",$fname, $lname);
$body .= sprintf("<br />");
$body .= sprintf("<br /><hr />");
$body .= sprintf("For internal use:<br />\n");
$body .= sprintf("<br />-----------------<br />\n");
$body .= sprintf("\nSender's IP: %s<br />\n", $_SERVER['REMOTE_ADDR']);
$body .= sprintf("\nReceived: %s<br />\n",date("Y-m-d H:i:s"));
$body .= sprintf("</body>");
$body .= sprintf("</html>");


$mail = new PHPMailer;

if($mail_method == true){
  $mail->isSMTP();
  //Enable SMTP debugging
  // 0 = off (for production use)
  // 1 = client messages
  // 2 = client and server messages
  $mail->SMTPDebug = 2;
  $mail->Debugoutput = 'html';
  //after testing comment out the above two(2) lines
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 587;
  $mail->SMTPSecure = 'tls';
  $mail->SMTPAuth = true;
  $mail->Username = $gmail_email;
  $mail->Password = $my_password;
}

$mail->setFrom($email, $page);
$mail->addReplyTo($email, $fname." ".$lname);
$mail->addAddress($my_email);
$mail->Subject = $email_subject;
$mail->msgHTML($body);

if (!$mail->send()) {
    $status = "error";
    //log the error
    $mail_error = $mail->ErrorInfo;
		$error_date = date('m\-d\-Y\-h:iA');
		$log = "assets/logs/error.txt";
		$fp = fopen($log,"a+");
		fwrite($fp,$error_date . " | " . $mail_error . "\n");
		fclose($fp);
		$query_string = '?success=false';
		header('Location: https://' . $server_dir . $next_page . $query_string);
		exit();
} else {
    $success_ip = $_SERVER['REMOTE_ADDR'];
	$success_date = date('m\-d\-Y\-h:iA');
	$success_message = $success_date . " | " . $success_ip . " | " . $email;
	$log = "assets/logs/success.txt";
	$fp = fopen($log,"a+");
	fwrite($fp,$success_message . "\n");
	fclose($fp);
	$query_string .= '&success=true';
	header('Location: https://' . $server_dir . $next_page . $query_string);
}




?>