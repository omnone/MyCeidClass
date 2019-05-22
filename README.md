# MyCeidClass v0.3
Το παρών repository δημιουργήθηκε για την εργασία στο μάθημα της **Τεχνολογίας Λογισμικού 2018-2019**. Εδώ , περιέχεται όλος ο πηγαίος κώδικας που αναπτύχθηκε για το εικονικό site , MyCeidClass στα πλαίσια της εργασίας από τα μέλη της ομάδας.

Για να μπορέσετε να τρέξετε το project τοπικά θα πρέπει να κάνετε τα παρακάτω:

1. Δημιουργήστε μια βάση δεδομένων τοπικά.
2. Κατεβάστε το composer https://getcomposer.org/download/.
3. Μετανομάστε το αρχείο .env.example σε .env (βρίσκεται στον αρχικό φάκελο).
4. Μέσα στο .env αρχείο αλλάξτε τα στοιχεία για να μπορέσετε να συνδεθείτε στην βάση που δημιουργήσατε.
5. Μεταβείτε στον αρχικό φάκελο του project και τρέξτε την εντολή "composer install".
6. Έπειτα πληκτρολογίστε: "php artisan key:generate"  
7. Πληκτρολογήστε "php artisan migrate" ,"php artisan serve".
8. Μπορείτε να κάνετε import τον φάκελο "database_dump" στην βάση σας για να έχετε μια αρχική αρχικοποίηση του συστήματος με δεδομένα.

**Σημείωση1:** Για να συνδεθείτε ως φοιτητής στο σύστημα χρησιμοποιήστε τα στοιχεία email:"konst@ceid.upatras.gr" pass:"kodikos" και ως καθηγητής με τα στοιχεία email:"dim@ceid.upatras.gr" pass:"kodikos". Ως διαχειριστής μπορείτε να μπείτε με τα στοιχεία "admin@ceid.upatras.gr" pass:"kodikos".

**Σημείωση2:** Για την άντληση της βαθμολογίας από το progress γίνεται χρήση της γλώσσας Python. Επομένως προκειμένου να τρέξετε το πρόγραμμα πρέπει 1)Να έχετε την έκδοση 3 της γλώσσας και 2)να εγκαταστήσετε τα requirements που θα βρείτε στον φάκελο "progress" 3)να έχετε εγκατεστημένο το firefox στην συγκεκριμένη περίπτωση. Τέλος θα πρέπει να καταβάσετε το πρόγραμμα [geckodriver.exe](https://github.com/mozilla/geckodriver/releases).

**Σημείωση3:** Στην τελική έκδοση , θα παραδοθεί και ένα dump όλοκληρης της βάσης δεδομένων για ευκολότερη δοκιμή της πλατφόρμας.
