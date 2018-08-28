<?php
/*
Herein lies the 19 questions you will have to answer to get this thing off the ground.

A couple of things to consider:

- It is set up to accommodate a rectangular logo so if the logo supplied is a square box it may take up too much screen real estate and need to be dropped into a rectangular box in photoshop.  Best is to fire it up and see what the logo does and edit accordingly.

- setting $message and $form_message to false will keep them from rendering so there will not be empty <p> tags hanging around. Just thought you would like to know


That's it just fill in the blanks drop in the logo and upload!

##Brief description of variables
--------------------------------
$page                   = in the incoming emails it will say "Contact from $page Landing page" this is more important for those with lots of these floating around the intertubes.
$company                = used in the footer again some people have pages for products in development so it may be a page for a widget that was created by company x. you get the idea
$company_URL            = the footer has a link to company this is the URL
$page_title             = "tab title";
$title                  = this is the title attribute (aka tab title)
$logo                   = boolean do you have a logo file
$logo_text              = the text to display if no logo image file is availables
$logo_file              = the logo file you will be dropping into assets/images
$logo_alt_text          = the alt text for the logo.
$message                = a paragraph that can be displayed under the logo. Set to false (no quotes) if not in use.
$form_message           = one liner under form to let them know what they are signing up for. Mailing list, more info, sales calls... Again set to false if not wanted.
$first_name_placeholder = placeholder for first name input
$last_name_placeholder  = placeholder for last name input
$email_placeholder      = placeholder for email input
$submit                 = Some people may want a custom message other than "submit".
$my_name                = if you hit reply from the incoming email this is the name that displays who sent it.
$email_subject          = the subject line of the incoming email.
$error_message          = the error message that is displayed if the email did not send.  A log file is created as well.
$success_message        = on successfull email completion this message is displayed instead of the form.

*/

//Time zone set for SMTP & logs
//http://php.net/manual/en/function.date-default-timezone-set.php
date_default_timezone_set('America/Los_Angeles');

//the 19 variables
$page                   = "name your landing page";
$company                = "company name";
$company_URL            = "URL for footer";
$page_title             = "tab title";
$title                  = "Super Easy Landing Page!";
$logo                   = true;
$logo_text              = "An Awesome Logo";
$logo_file              = "logo.jpg";
$logo_alt_text          = "my logo";
$message                = "This is the main message of the page the shorter the better for a no scroll page. Also on mobile you don't want the email form at the bottom of the page!";
$form_message           = "For updates or more information on this product.";
$first_name_placeholder = "your John";
$last_name_placeholder  = "your Handcock";
$email_placeholder      = "your email";
$submit                 = "submit";
$my_email               = "your.email@example.con";
$email_subject          = "inquary from easy landing page";
$error_message          = "Opps! we had an error in sending the email, our applogies, we have logged this error and will have a fix soon.";
$success_message        = "Hurrah! email sent! sit back and wait for the unvailing of our awesome site!";

//to send the email through gmails servers set $mail_method to true
$mail_method     = false;
//make sure that $my_email above is set to your gmail account
$gmail_email     = "gmail acount to send mail";
$my_password     = "your gmail password";
?>