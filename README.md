# MyCeidClass v1.0
Το παρών repository δημιουργήθηκε για την εργασία στο μάθημα της **Τεχνολογίας Λογισμικού 2018-2019**. Εδώ , περιέχεται όλος ο πηγαίος κώδικας που αναπτύχθηκε για το εικονικό site , MyCeidClass στα πλαίσια της εργασίας από τα μέλη της ομάδας.

Για να μπορέσετε να τρέξετε το project τοπικά θα πρέπει να κάνετε τα παρακάτω:

1. Δημιουργήστε μια βάση δεδομένων τοπικά.
2. Κατεβάστε το composer https://getcomposer.org/download/.
3. Μετανομάστε το αρχείο .env.example σε .env (βρίσκεται στον αρχικό φάκελο).
4. Μέσα στο .env αρχείο αλλάξτε τα στοιχεία για να μπορέσετε να συνδεθείτε στην βάση που δημιουργήσατε.
5. Μεταβείτε στον αρχικό φάκελο του project και τρέξτε την εντολή "composer install".
6. Έπειτα πληκτρολογίστε: "php artisan key:generate" .
7. Πληκτρολογήστε "php artisan migrate" ,"php artisan serve".
8. Κάντε import τον φάκελο "database_dump" στην βάση σας για να έχετε μια αρχική αρχικοποίηση του συστήματος με δεδομένα.

**Σημείωση1:** Για να συνδεθείτε ως φοιτητής στο σύστημα χρησιμοποιήστε τα στοιχεία email:"konst@ceid.upatras.gr" pass:"kodikos" και ως καθηγητής με τα στοιχεία email:"dim@ceid.upatras.gr" pass:"kodikos". Ως διαχειριστής μπορείτε να μπείτε με τα στοιχεία "admin@ceid.upatras.gr" pass:"kodikos". Γενικά μπορείτε να συνδεθείτε ως οποιοσδήποτε προκατασκευασμένος χρήστης με τον παραπάνω κωδικό.

**Σημείωση2:** Η διαχείριση των αρχείων έχει βασιστεί στο filesystem των Windows και δεν έχει δοκιμαστεί σε άλλο λειτουργικό σύστημα οπότε συστήνεται να δοκιμαστεί σε περιβάλλον των Windows για ορθή λειτουργία.

# Άντληση Βαθμολογίας από το Progress
Για την άντληση της βαθμολογίας από το progress γίνεται χρήση της γλώσσας Python και της βιβλιοθήκης Selenium. Επομένως προκειμένου να τρέξετε το πρόγραμμα πρέπει: 
1. Να έχετε την έκδοση 3 της γλώσσας Python. 
2. Nα εγκαταστήσετε τα requirements που θα βρείτε στον φάκελο "progress". 
3. Nα έχετε εγκατεστημένο το firefox στην συγκεκριμένη περίπτωση. 
4. Οδηγίες χρήσης του Selenium μπορείτε να βρείτε [εδώ](https://selenium-python.readthedocs.io/getting-started.html). 
5. **Τέλος , εάν κάποιος χρήστης έχει ήδη βαθμολογία τότε θα πρέπει να αδείασετε τον πίνακα "bathmologies" για να γίνει εκ νέου αρχικοποίηση από το σύστημα**.


