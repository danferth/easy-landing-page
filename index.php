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

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $page_title; ?></title>
    <link type="text/plain" rel="author" href="humans.txt" />
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assets/style.css" type="text/css" />
    
</head>
<body>
    <div class="wrap">
    <div class="logo">
    
    <?php
    
        if($logo){
            echo "<img src='assets/images/" . $logo_file . "' alt='" . $logo_alt_text . "'>";
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
    
    
    if(isset($_GET['check'])){
        $check = $_GET['check'];
        if($check == 'error'){
            echo "<p class='error'>". $error_message . "</p>";
        }else if($check == 'success'){
            echo "<p class='success'>" . $success_message . "</p>";
        }
    }else if(!isset($_GET['check'])){
        echo    "<form id='landingpage' class='first_contact' action='submit.php' method='post'>
            <div class='form_wrap'>
                <input id='fname' type='text' name='fname' placeholder='". $first_name_placeholder ."' required/>
                <input id='lname' type='text' name='lname' placeholder='". $last_name_placeholder ."' required/>
                <input id='email' type='email' name='email' placeholder='". $email_placeholder ."' required/>
                <input type='text' name='your-name925htj' id='your-name925htj' autocomplete='". $rand_str1 ."'/>\n
                <input type='text' name='your-email247htj' id='your-email247htj' autocomplete='". $rand_str2 ."'/>
                <input type='submit' value='" . $submit . "'/>
            </div>
        </form>";
    }

    if($form_message != false){
        if(!isset($_GET['check'])){
            echo "<p class='form_message'>" . $form_message . "</p>";
        }
    }
    ?>
    <div class="push"></div>
    </div>    <!-- end .wrap -->
    <footer>
        <p class="copywrite"><?php echo "<a href='" . $company_URL . "'>" . $company . "</a> "; ?> &copy;<?php echo date(Y); ?></p>
    </footer>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="/assets/site.js"></script>
    <script type="text/javascript">
<?php
if($form_success == "true"){
	echo "
		window.onload = swal({
			title: 'Success',
			text: '".$success_message."',
			type: 'success',
			html: true,
			confirmButtonText: 'Thanks'
		});
	";
}elseif($form_success == "false"){
	echo "
		window.onload = swal({
			title: 'Whoops',
			text: '".$error_message."',
			type: 'error',
			html: true,
			confirmButtonText: 'OK'
		});
	";
}elseif($form_success == "email"){
	echo "
		window.onload = swal({
			title: 'Error',
			text: 'It seems there was an error with your email entry, please make sure it is a valid email and try to submit again.',
			type: 'error',
			html: true,
			confirmButtonText: 'OK'
		});
	";
}

?>

	<?php 
	echo 'onload=function(){document.forms["landingpage"].reset()};
		$(window).bind("load", function() {
		$("#landingpage").validate();
	});'; ?>
//}
</script>
</body>
</html>