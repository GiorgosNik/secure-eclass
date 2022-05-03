## Open eClass 2.3

Το repository αυτό περιέχει μια **παλιά και μη ασφαλή** έκδοση του eclass.
Προορίζεται για χρήση στα πλαίσια του μαθήματος
[Προστασία & Ασφάλεια Υπολογιστικών Συστημάτων (ΥΣ13)](https://ys13.chatzi.org/), **μην τη
χρησιμοποιήσετε για κάνενα άλλο σκοπό**.

### Χρήση μέσω docker

```
# create and start (the first run takes time to build the image)
docker-compose up -d

# stop/restart
docker-compose stop
docker-compose start

# stop and remove
docker-compose down -v
```

To site είναι διαθέσιμο στο http://localhost:8001/. Την πρώτη φορά θα πρέπει να τρέξετε τον οδηγό εγκατάστασης.

### Ρυθμίσεις eclass

Στο οδηγό εγκατάστασης του eclass, χρησιμοποιήστε **οπωσδήποτε** τις παρακάτω ρυθμίσεις:

- Ρυθμίσεις της MySQL
  - Εξυπηρέτης Βάσης Δεδομένων: `db`
  - Όνομα Χρήστη για τη Βάση Δεδομένων: `root`
  - Συνθηματικό για τη Βάση Δεδομένων: `1234`
- Ρυθμίσεις συστήματος
  - URL του Open eClass : `http://localhost:8001/` (προσοχή στο τελικό `/`)
  - Όνομα Χρήστη του Διαχειριστή : `drunkadmin`

Αν κάνετε κάποιο λάθος στις ρυθμίσεις, ή για οποιοδήποτε λόγο θέλετε να ρυθμίσετε
το openeclass από την αρχή, διαγράψτε το directory, `openeclass/config` και ο
οδηγός εγκατάστασης θα τρέξει ξανά.

## 2022 Project 1

Εκφώνηση: https://ys13.chatzi.org/assets/projects/project1.pdf

### Μέλη ομάδας

- 1115201800134, Γιώργος Νικολάου
- 1115201800190, Νεφέλη Ταβουλάρη

### Report

#### Defence
- <ins>CSRF</ins>: We protected the website against CSRF attacks by adding a randomly generated token to every sensitive form as a hidden input. The same token is stored on the Session. When submitting the form, the two tokens are compared, thus preventing an attacker from creating a CSRF attack URL, since they cannot fill in this hidden input with the authorised user's token, inducing them to perform an action they did not mean to.
- <ins>XSS</ins>: Similarly, we performed URL encoding on any user input that may appear on the website. For this we employed the built-in PHP function "htmlspecialchars" and used it wherever POST, GET and REQUEST variables were used, as well as $_SERVER[PHP_SELF].
- <ins>SQL injection</ins>: We converted every single DB query into a prepared statement, separating the command from the user data, so as to prevent the attacker from inserting any possibly malicious input outside the parameters we expect. This way we can ensure that the database is protected.
- <ins>RFI</ins>: We carefully examined the application to determine that there are no page redirections based on data provided by the user using GET, POST or REQUEST. Thankfully we found no such cases. Our next step was to prevent the user from accessing the directory tree of the website, using an .htaccess configuration file for Apache2. This is of critical importance, since the user is able to upload files under the "assignments" and "dropbox" subsystems. These files are automatically renamed and stored in the folder of the respective course, and had the user the ability to browse through the directory tree, they could find, open, or even possibly execute malicious code stored in them.
- <ins>Session Hijacking</ins>: Similarly to the CSRF tokens, we stored the users IP in the Session, and on every form submission we compared the current IP to the one stored. If they differ, we immediately disconnect the user and destroy the Session.
- <ins>Extra Steps</ins>:
  - Removed the user password from the Session. 
  - Renamed important folders to obscure them.
  - Updated Xinha, the 3rd party editor used to create the description of courses and the main body of forums posts, among others.
  - To avoid enumeration of the directory tree, we redirect any 403 (Forbidden) errors to a custom 404 page, so the unauthorised user learns nothing about files he is not allowed to view. 
  - We configured certain options stored in php.ini, such as: 
    - adding system functions like "exec" to the disable-functions option
    - setting "allow_url_fopen" to off, to disable handling of external URLs as files.
    - setting "allow_url_include" to off
