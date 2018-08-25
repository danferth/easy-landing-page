<?php
session_start();
require 'config.php';

if(isset($_SESSION['formLoadTime'])){
  unset($_SESSION['formLoadTime']);
  $_SESSION['formLoadTime'] = time();
}else{
  $_SESSION['formLoadTime'] = time();
};
//grab the get from parse file
$first_name = $_GET['first_name'];
//grab get and custom fields
if(isset($_GET['success'])){
	$form_success = $_GET['success'];
}

$rand_str1 = substr(md5(rand()), 0, 7);
$rand_str2 = substr(md5(rand()), 0, 7);
$ver       = "3.0"
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $page_title; ?></title>
    <link type="text/plain" rel="author" href="humans.txt" />
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.26.12/sweetalert2.min.css" />
    <link rel="stylesheet" href="assets/style.css" type="text/css?ver=<?php echo $ver; ?>" />
    
</head>
<body>
    <div class="wrap">
    <div class="logo">
    
    <?php
    
        if($logo){
            echo "<img class='header' src='assets/images/" . $logo_file . "' alt='" . $logo_alt_text . "'>";
        }else{
            echo "<h1 class='logo_text'>" . $logo_text . "</h1>";
        }
    
    ?>
        
    </div>
    
    <h1 class="title"><?php echo $title; ?></h1>
    <?php
    if($message != false){
    echo "<p class='message'>" . $message . "</p>";
    }
    ?>
    <form id='landingpage' class='first_contact' action='submit.php' method='post'>
          <input id='fname' type='text' name='fname' placeholder='<?php echo $first_name_placeholder; ?>' required/>
          <input id='lname' type='text' name='lname' placeholder='<?php echo $last_name_placeholder; ?>' required/>
          <input id='email' type='email' name='email' placeholder='<?php echo $email_placeholder; ?>' required/>
          <input type='text' name='your-name925htj' id='your-name925htj' autocomplete='". $rand_str1 ."'/>
          <input type='text' name='your-email247htj' id='your-email247htj' autocomplete='". $rand_str2 ."'/>
          <input type='submit' value='<?php echo $submit; ?>'/>
    </form>
        
    <?php    
    if($form_message != false){
        if(!isset($_GET['check'])){
            echo "<p class='form_message'>" . $form_message . "</p>";
        }
    }
    ?>
    <div class="push"></div>
    </div>    <!-- end .wrap -->
    <footer>
        <p class="copywrite"><?php echo "<a href='" . $company_URL . "'>" . $company . "</a> | "; ?> &copy; <?php echo date(Y); ?></p>
    </footer>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.26.12/sweetalert2.all.min.js"></script>
    <script src="/assets/site.js?ver=<?php echo $ver; ?>"></script>
    <script type="text/javascript">
    
    var form_success    = "<?php echo $form_success; ?>";
    var success_message = "<?php echo $success_message; ?>";
    var error_message   = "<?php echo $error_message; ?>";

if(form_success == "true"){
		window.onload = swal({
			title: 'Success',
			text: success_message,
			type: 'success',
			confirmButtonText: 'Thanks'
		});
}else if(form_success == "false"){
		window.onload = swal({
			title: 'Whoops',
			text: error_message,
			type: 'error',
			confirmButtonText: 'OK'
		});
}else if(form_success == "email"){
		window.onload = swal({
			title: 'Error',
			text: 'It seems there was an error with your email entry, please make sure it is a valid email and try to submit again.',
			type: 'error',
			confirmButtonText: 'OK'
		});
}

	onload=function(){document.forms["landingpage"].reset()};

</script>
</body>
</html>