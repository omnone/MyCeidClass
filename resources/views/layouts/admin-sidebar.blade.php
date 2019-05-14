@if (Auth::check())
<div class="columns" id="main-window">
    <div class="is-one-quarter" id="side-menu">
        <div class="container card">
            <aside class="menu">
                {{-- basikes plirofories xristi --}}
                <br>
                Πίνακας Ελέγχου
                <hr>

                <p class="menu-label">
                    <i class="fa fa-university" aria-hidden="true"></i> Μαθήματα
                </p>
                <ul class="menu-list">
                    <li><a href="/lessons">Όλα τα μαθήματα</a></li>
                    <li><a href="/lessons/subscriptions">Δημιουργία Μαθήματος</a></li>
                </ul>
                <p class="menu-label">
                    <i class="fa fa-comments-o" aria-hidden="true"></i> Μηνύματα
                </p>
                <ul class="menu-list">
                    <li><a href="/lessons">Όλα τα μηνύματα</a></li>
                    <li><a href="/lessons/subscriptions">Αποστολή Μηνύματος</a></li>
                </ul>
                <p class="menu-label">
                    <i class="fa fa-book" aria-hidden="true"></i> Εξεταστική
                </p>
                <ul class="menu-list">
                    <li><a href="/exams/program">Δημιουργία Εβδ. Προγράμματος</a></li>
                    <li><a href="/exams/program">Δημιουργία Προγράμματος Εξεταστικής</a></li>
                    <li><a href="/exams/participation">Δημιουργία Εξεταστικής</a></li>
                    <li><a href="/exams/participation">Διαχείριση Εξεταστικής</a></li>
                </ul>
                <p class="menu-label">
                    <i class="fa fa-user" aria-hidden="true"></i>Χρήστες
                </p>
                <ul class="menu-list">
                    <li><a href="/profile/settings">Προσθήκη Χρήστη</a></li>
                    <li><a href="/profile/statistics">Όλοι οι Χρήστες</a></li>
                    <li>
                        <hr>
                    </li>
                    <li>
                        <a class="button is-info is-outlined" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out" aria-hidden="true"></i> Αποσύνδεση
                        </a>
                    </li>
                </ul>

            </aside>
        </div>
    </div>
    <div class="column" id="main-content">
        @endif
