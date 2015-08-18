<?php
/*
Herein lies the 14 questions you will have to answer to get this thing off the ground.
A couple of things to consider:
- It is set up to accommodate a rectangular logo so if the logo supplied is a square box it will render at 75% of screen width on larger screens and 100% on mobile so keep this in mind. On desktops the logo will probably take up the entire screen so use an image editor to drop it onto a white background or transparent (.png) preferably 1000px x 300px or play with the sizing to your liking this is the only design decision you will have to make unless you want to open the css file.
- the message under the logo ($message) should be kept somewhat short. Not necessarily a sentence but no Moby Dick novels should be used. The longer it is the further down the form will be pushed down the page so.... keep this in mind and redact a few lines after testing if the look does not appeal to you or the client.
- setting $message and $form_message to false will keep them from rendering so there will not be empty <p> tags hanging around. Just thought you would like to know

That's it just fill in the blanks drop in the logo and upload!

##Brief description of variables
--------------------------------
$page           = in the incoming emails it will say "Contact from " . $page . " Landing page" this is more important for those with lots of these floating around the intertubes.
$company         = used in the footer again some people have pages for products in development so it may be a page for a widget that was created by company x. you get the idea
$company_URL     = the footer has a link to company this is the URL
$title           = this is the title attribute (aka tab title)
$logo            = the logo file you will be dropping into assets/images
$logo_alt_text   = the alt text for the logo.
$message         = a paragraph that can be displayed under the logo. Set to false (no quotes) if not in use.
$form_message    = one liner under form to let them know what they are signing up for. Mailing list, more info, sales calls... Again set to false if not wanted.
$placeholder     = placeholder for input (what is displays when no email is entered)
$submit          = Some people may want a custom message other than "submit".
$my_name         = if you hit reply from the incoming email this is the name that displays who sent it.
$email_subject   = the subject line of the incoming email.
$error_message   = the error message that is displayed if the email did not send.  A log file is created as well.
$success_message = on successfull email completion this message is displayed instead of the form.

*/

//Time zone set for SMTP & logs
date_default_timezone_set('America/Los_Angeles');

//the 14 variables
$page            = "name your landing page";
$company         = "company name for footer";
$company_URL     = "URL for footer";
$page_title      = "tab title";
$title           = ".::UNDER CONSTRUCTION::.";
$logo_file       = "logo.jpg";
$logo_alt_text   = "my logo";
$message         = "This is the main message of the page the shorter the better for a no scroll page. Also on mobile you don't want the email form at the bottom of the page!";
$form_message    = "For updates or more information on this product.";
$placeholder     = "your email";
$submit          = "submit";
$my_email        = "your.email@example.con";
$email_subject   = "inquary from easy landing page";
$error_message   = "Opps! we had an error in sending the email, our applogies, we have logged this error and will have a fix soon.";
$success_message = "Hurrah! email sent! sit back and wait for the unvailing of our awesome site!";

//to send the email through gmails servers set the below
//uncomment to set submit.php to use gmail
//$mail_method     = "gmail";
//make sure that $my_email above is set to your gmail account
$gmail_email     = "gmail acount to send mail";
$my_password     = "your gmail password";
?>