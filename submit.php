<?php
require 'config.php';
require 'assets/lib/PHPMailer/PHPMailerAutoload.php';

$next_page = 'index.php';
$query_string = '?check=';
$server_dir = $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['PHP_SELF']), '/\\') . '/';

$body  = sprintf("<html>"); 
$body .= sprintf("<body>");
$body .= sprintf("<h2>Contact from " . $page . " Landing page</h2>\n");
$body .= sprintf("<hr />");
$body .= sprintf("\nEmail: <strong>%s</strong><br />\n",$_POST['email']);
$body .= sprintf("<br />");
$body .= sprintf("<br /><hr />");
$body .= sprintf("For internal use:<br />\n");
$body .= sprintf("<br />-----------------<br />\n");
$body .= sprintf("\nSender's IP: %s<br />\n", $_SERVER['REMOTE_ADDR']);
$body .= sprintf("\nReceived: %s<br />\n",date("Y-m-d H:i:s"));
$body .= sprintf("</body>");
$body .= sprintf("</html>");


$mail = new PHPMailer;

if($mail_method == "gmail"){
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

$mail->setFrom($_POST['email'], $page);
$mail->addReplyTo($_POST['email']);
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
	fwrite($fp,$error_date . "\n" . $mail_error . "\n\n");
	fclose($fp);
    header('Location: http://' . $server_dir . $next_page . $query_string . $status);
} else {
    $status = "success";
    header('Location: http://' . $server_dir . $next_page . $query_string . $status);
}




?>