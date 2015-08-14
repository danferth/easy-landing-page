Easy Landing Page
=================

---------------------
Has this ever happened to you?
> Hey I need you to get me mygreatidea.com like now

> *Sure can do*

> Awesome thanks

> *done you got it*

> Cool! hey I have a logo i just emailed you, can you get it up there like ASAP!

You upload the logo and a simple `HTML` page saying "under construction"

> *Got it up if I have time today I'll add a simple email form to gather interested people and whatnot*

**Don't you wish you had a simple straight forward way of throwing up a landing page with a logo maybe a descriptive paragraph and input to gather emails just to make a client happy? And don't you wish you could have it up as fast as it took you to buy his/her domain?**

--------------------

##Enter Easy Landing Page

Built in `PHP` with [PHPMailer](https://github.com/PHPMailer/PHPMailer) for the email `input`. All you have to do is drop the logo in `assets/images` and fill out a 14 line `config` file and your done!  You will have a happy client and you don't have to reinvent the wheel each and every time.  it doesn't use any fancy `grunt/gulp` or `sass/less` or any weird JavaScript stuff to make it complicated just vanilla `css` and `PHP`.  You don't even have to know `PHP` the `config` file has all the documentation needed.

You can customize the Title, intro paragraph, error messages nd everything if you like right from the `config` file. Look at it as a go too get it done kind of thing.

###Structure of the Page in a Nutshell
Logo

One(1) Header tag

Intro paragraph *(optional)*

One(1) input for email gathering

Simple message for the email field *(optional)*

Footer with company name and &copy; date *(date is dynamic)*

###A Little About the Email

I used [PHPMailer](https://github.com/PHPMailer/PHPMailer) to send the email and it will send you an `HTML` email with the users `IP` and date/time for reference.

In case of any errors it will notify the user *(so they at least know it didn't go through)* and log the error in `assets/logs/error.txt` with time stamp so you can debug yourself what went wrong.

###The Styling

Colors are all grey so it shouldn't conflict with any colors in the logo. The background is even white so when you get that `.jpeg` and think 'great now I have to clip the background in Photoshop`, you can sit back and say 'cool this is easy!

A dark theme is an idea and would be integrated in the `config` so it stays easy.

###So About That Config File

It's easy. Think of it as a questioner to what they want. You can even ask the basic questions and leave the rest default if you want.

####Here are the variables and descriptions

- **$page**           = in the incoming emails it will say "Contact from " . $page . " Landing - page" this is more important for those with lots of these floating around the intertubes.
- **$company**         = used in the footer again some people have pages for products in - development so it may be a page for a widget that was created by company x. you get the - idea
- **$title**           = this is the title attribute (aka tab title)
- **$logo**            = the logo file you will be dropping into assets/images
- **$logo_alt_text**   = the alt text for the logo.
- **$message**         = a paragraph that can be displayed under the logo. Set to false (no - quotes) if not in use.
- **$form_message**    = one liner under form to let them know what they are signing up for. - Mailing list, more info, sales calls... Again set to false if not wanted.
- **$placeholder**     = placeholder for input (what is displays when no email is entered)
- **$submit**          = Some people may want a custom message other than "submit".
- **$my_email**        = the email address the form sends to
- **$my_name**         = if you hit reply from the incoming email this is the name that displays - who sent it.
- **$email_subject**   = the subject line of the incoming email.
- **$error_message**   = the error message that is displayed if the email did not send.  A log - file is created as well.
- **$success_message** = on successful email completion this message is displayed instead of the form.

###On the Optional Stuff

A few(2) items are optional meaning some people may not what to use them.  If you set `$message` and or `$form_message` to `false` they will not render, meaning you don't have to worry about empty `<p></p>` roaming around the document. 

*I'm talking to you [Wordpress](https://www.google.com/search?q=wordpreess+adding+empty+p+tags&rlz=1C1GIWA_enUS634US634&oq=wordpreess+adding+empty+p+tags&aqs=chrome..69i57.398822j0j1&sourceid=chrome&es_sm=93&ie=UTF-8#q=wordpress+adding+empty+p+tags)*

###Things to get done on this repo
[ ] Dark Theme


**Thanks for viewing & hope you enjoy**