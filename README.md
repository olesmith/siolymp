# Sivent2
Sistema de Gerenciamento de Eventos


Installation:

1: Copy the files from the repository to the webserver directory, say /var/www/html.

2: Get the files: class.phpmailer.php, class.pop3.php, class.smtp.php from the link:

https://github.com/Synchro/PHPMailer

and place them in your webserver directory. These are used for the mail sending.

3: Locate the Siolymp.sql file in the repository and import it into the siolimp DB on the MySQL server, and adapt the data in Units to meet your needs. You may have to add credentials to your MySQL server mysql DB, the setup is specified in Siolymp/.DB.php.

4: For printing to work, you must have Latex installed - only tested on unix-like systems - however, on other platforms, it might work editing the pdflatex.sh script. Install texlive-full!

5: There's a mail setup for each entity using the system, found in the Units table. You may create a gmail account, using this to send the emails.
