# secure-eclass

### Team Members

- Giorgos Nikolaou
- Nefeli Tavoulari

## Description
This project was completed as part of YS13 "Protection and Security of Information Systems". The project was split in two phases, defence and attack. During the first phase, the teams were given an older version of the e-class platform, a platform that is used by most Greek Universities. The teams were to secure this version of e-class by removing various vulnerabilities, in preparation for the second stage. During the second stage, or the attack stage, each team was assigned a rival team, and had to attack their version of the eclass platform in order to "deface" it, by making some admin-level change to the platform.

## Docker Instructions

```
# create and start (the first run takes time to build the image)
docker-compose up -d

# stop/restart
docker-compose stop
docker-compose start

# stop and remove
docker-compose down -v
```

The website is available on http://localhost:8001/. When accessed for the first time, the website will ask to perform a first-time setup.

### First-Time Setup
Set the settings as follows:
- Select language from the drop-down menu
- MySQL database settings
  - Database Host: `db`
  - Database Username: `root`
  - Database Password: `1234`
- Config settings
  - Open eClass URL : `http://localhost:8001/`

To reset the platform and perform this setup again,delete  `openeclass/config` and the next time you access the site, the first-time setup will be available again.

## Report
#### Defense
- <ins>CSRF</ins>: We protected the website against CSRF attacks by adding a randomly generated token to every sensitive form as a hidden input. The same token is stored on the Session. When submitting the form, the two tokens are compared, thus preventing an attacker from creating a CSRF attack URL, since they cannot fill in this hidden input with the authorized user's token, inducing them to perform an action they did not mean to.
- <ins>XSS</ins>: Similarly, we performed URL encoding on any user input that may appear on the website. For this we employed the built-in PHP function "htmlspecialchars" and used it wherever POST, GET and REQUEST variables were used, as well as $_SERVER[PHP_SELF].
- <ins>SQL injection</ins>: We converted every single DB query into a prepared statement, separating the command from the user data, to prevent the attacker from inserting any possibly malicious input outside the parameters we expect. This way we can ensure that the database is protected.
- <ins>RFI</ins>: We carefully examined the application to determine that there are no page redirections based on data provided by the user using GET, POST or REQUEST. Thankfully we found no such cases. Our next step was to prevent the user from accessing the directory tree of the website, using an .htaccess configuration file for Apache2. This is of critical importance, since the user is able to upload files under the "assignments" and "dropbox" subsystems. These files are automatically renamed and stored in the folder of the respective course, and had the user the ability to browse through the directory tree, they could find, open, or even possibly execute malicious code stored in them.
- <ins>Session Hijacking</ins>: Similarly to the CSRF tokens, we stored the users IP in the Session, and on every form submission we compared the current IP to the one stored. If they differ, we immediately disconnect the user and destroy the Session.
- <ins>Extra Steps</ins>:
  - Removed the user password from the Session. 
  - Renamed important folders to obscure them.
  - Updated Xinha, the 3rd party editor used to create the description of courses and the main body of forums posts, among others.
  - To avoid enumeration of the directory tree, we redirect any 403 (Forbidden) errors to a custom 404 page, so the unauthorized user learns nothing about files he is not allowed to view. 
  - We configured certain options stored in php.ini, such as: 
    - adding system functions like "exec" to the disable-functions option
    - setting "allow_url_fopen" to off, to disable handling of external URLs as files.
    - setting "allow_url_include" to off
#### Attack
- <ins>RFI</ins>: The very first attack we performed was uploading a php file that imports the config.php file and prints the admin password. We were able to do this because the file id was displayed by accident on the screen, and so it was easy for us to track its path, since we already know the directory structure, but also find the relative path to the config.php. Other RFI attacks we performed (can be found in RFI_Attacks folder) include listing the files of a directory, seeing the /etc/passwd content and modifying a file, adding a url redirection to a disturbing website.
- <ins>XSS</ins>: Then, for academic reasons we tested the website for XSS vulnerabilities in the logged-in-user pages, logged-out-user pages and in the admin pages. We observed that the input of only a few forms was cleaned, e.g. profile.php. In the other forms, by injecting the classic "<script>alert('attack')</script>", we got plenty of alerts in the pages that this input was displayed. More precisely, some pages with XSS vulnerabilities, due to uncleaned data, are:
   - newuser.php, firstname and lastname are printed on top right in index.php, as a result, alerts are thrown on the screen.
   - lostpass.php, username is shown on the screen when a lost-password request is made
   - dropbox/index.php, file's description is displayed
   - create_course.php, title, description, professors are displayed in editcours.php
   - newuseradmin.php, professor's data is shown in listreq.php
   - work.php, data is shown when editing the assignment (comments, title)
   - addusertocours.php,  firstname, lastname of user are displayed
   - phpbb, message and description are displayed
- <ins>CSRF</ins>: Even though we already had access to the admin pages, we also experimented with CSRF. More specifically, we did the following (can be found in puppies folder):
   - We deleted eclass database, through the course deletion url (admin/delcours.php)
   - We edited course quota (admin/quotacours.php)
   - We modified admin's profile (profile.php)
- <ins>SQL injection</ins>: We executed some basic SQL Injections, like "' or 1=1" in SELECT statements and "');DROP TABLE x;--" in INSERT statements. However, we did not find any interesting vulnerability that could allow us to really hurt the website. Besides, the mysql_query function only accepts one query and thus, we could not inject another one. Then, some other forms were already secured e.g. login.
