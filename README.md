Easy Landing Page
=================

---------------------
Has this ever happened to you?
> Hey I need you to get *mygreatidea.com* like now

> *Sure can do*

> Awesome! thanks

> *done, you now own mygreatidea.com*

> Cool! hey I just emailed you a logo, can you get it up there like ASAP!

You upload the logo, fill out `config.php` and boom! they have a nice landing page to gather emails.

--------------------

## Easy Landing Page

Built in `PHP`, all you have to do is drop the logo in `assets/images` and fill out a  `config.php` file and your done!  You will have a happy client and you don't have to reinvent the wheel each and every time.

You can see it in action [here](http://easylandingpage.danferth.com).  All text, links, and messages are editable through the `config.php` file. The form requests first and last name along with a valid email.

### A Little About the Email

[PHPMailer](https://github.com/PHPMailer/PHPMailer) is used to send an `HTML` email with the visitors `IP` and date/time for reference. The form requires a first and last name along with a valid email address to send.  All inputs are sanitized and browser and server side validation is used.  You have the option to use gmail servers to send the email, just set `gmail` to `true` and fill in the acount `username` and `password` in the `config.php` file.

In case of any errors it will notify the user *(so they at least know it didn't go through)* and log the error in `assets/logs/error.txt` with time stamp so you can debug yourself what went wrong.

### The Styling

You can deviate from the colors used with the included `sass` file.  run `npm install` and then `gulp watch`.  Open `assets/css/style.scss` and edit the top two color variables to get a theme going.

**Thanks for viewing & hope you enjoy**