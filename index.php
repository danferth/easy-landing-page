<?php
require 'config.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $page_title; ?></title>
    <link type="text/plain" rel="author" href="humans.txt" />
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assets/css/global.css" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>
<body>
    <div class="wrap">
    <div class="logo">
        <img src="assets/images/<?php echo $logo_file; ?>" alt="<?php echo $logo_alt_text; ?>">
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
        echo    "<form class='first_contact' action='submit.php' method='post'>
            <div class='form_wrap'>
                <input id='email' type='email' name='email' placeholder='". $placeholder ."'/>
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
    
    
</body>
</html>