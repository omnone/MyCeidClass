@if (Auth::check())
<div class="columns ">
    <div class="is-one-quarter" id="side-menu">
        <div class="container card">
            <aside class="menu">
                {{-- basikes plirofories xristi --}}
                <p class="menu-label">

                </p>
                <div class="container ">
                    <ul class="menu-list">
                        <div id='basic-user-info'>
                            <figure class="image is-128x128">
                                <img class="is-rounded" src="https://bulma.io/images/placeholders/128x128.png">
                            </figure>

                            <li><a>{{ Auth::user()->surname  }} {{ Auth::user()->name  }}</a></li>
                            <li><a>{{ Auth::user()->email }}</a></li>
                        </div>
                    </ul>
                </div>

                <hr> {{-- student sidebar --}} @if(Auth::user()->role =='student')
                <p class="menu-label">
                    <i class="fa fa-university" aria-hidden="true"></i> Μαθήματα
                </p>
                <ul class="menu-list">
                    <li><a href="/lessons">Όλα τα μαθήματα</a></li>
                    <li><a href="/lessons/subscriptions">Τα μαθήματά μου</a></li>
                    <li><a>Οι εργασίες μου</a></li>
                </ul>
                <p class="menu-label">
                    <i class="fa fa-book" aria-hidden="true"></i> Εξεταστική
                </p>
                <ul class="menu-list">
                    <li><a>Προβολή Προγράμματος</a></li>
                    <li><a>Δήλωση Συμμετοχής</a></li>
                </ul>
                <p class="menu-label">
                    <i class="fa fa-user" aria-hidden="true"></i> Προφίλ
                </p>
                <ul class="menu-list">
                    <li><a>Διαχείριση Προφίλ</a></li>
                    <li><a>Στατιστικά Στοιχεία</a></li>
                    <li>
                        <hr>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Αποσύνδεση
                        </a>
                    </li>
                </ul>
                {{-- profesor sidebar --}} @else
                <p class="menu-label">
                    <i class="fa fa-university" aria-hidden="true"></i> Μαθήματα
                </p>
                <ul class="menu-list">
                    <li><a href="lessons/subscriptions">Τα μαθήματά μου</a></li>
                    <li><a>Οι εργασίες μου</a></li>
                    <li><a>Τα εργαστηριά μου</a></li>
                </ul>
                <p class="menu-label">
                    <i class="fa fa-book" aria-hidden="true"></i> Εξεταστική
                </p>
                <ul class="menu-list">
                    <li><a>Προβολή Προγράμματος</a></li>
                    <li><a>Δήλωση Εξέτασης</a></li>
                </ul>
                <p class="menu-label">
                    <i class="fa fa-user" aria-hidden="true"></i> Προφίλ
                </p>
                <ul class="menu-list">
                    <li><a>Διαχείριση Προφίλ</a></li>
                    <li><a>Στατιστικά Στοιχεία</a></li>
                    <li>
                        <hr>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Αποσύνδεση
                        </a>
                    </li>
                </ul>
                @endif

            </aside>
        </div>
    </div>
    <div class="column" id="main-content">
        @endif
