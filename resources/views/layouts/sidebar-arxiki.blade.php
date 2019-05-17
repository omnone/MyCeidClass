@if (Auth::check())
<div class="columns" id="main-window">
    <div class="is-one-quarter" id="side-menu">
        <div class="container card">
            <aside class="menu">
                {{-- basikes plirofories xristi --}}
                <p class="menu-label">

                </p>
                {{-- <div class="container ">
                    <ul class="menu-list">
                        <div id='basic-user-info'>
                            <figure class="image is-128x128">
                                @if(Auth::user()->profile_photo!==null)
                                <img src={{url('/storage/profile_photos/'.Auth::user()->profile_photo->filepath) }}>
                                @else
                                <img src="https://bulma.io/images/placeholders/128x128.png">
                                @endif
                            </figure>

                            <li><a>{{ Auth::user()->surname  }} {{ Auth::user()->name  }}</a></li>
                            <li><a>{{ Auth::user()->email }}</a></li>
                        </div>
                    </ul>
                </div> --}}

                <hr> {{-- student sidebar --}} @if(Auth::user()->role =='student')
                <p class="menu-label">
                    <i class="fa fa-university" aria-hidden="true"></i> Μαθήματα
                </p>
                <ul class="menu-list">
                    <li><a href="/lessons">Όλα τα μαθήματα</a></li>
                    <li><a href="/lessons/subscriptions">Τα μαθήματά μου</a></li>
                    <li><a href="/lessons/all/homework">Οι εργασίες μου</a></li>
                </ul>
                <p class="menu-label">
                    <i class="fa fa-comments" aria-hidden="true"></i> Μηνύματα
                </p>
                <ul class="menu-list">
                    <li><a href="/messages/inbox">Εισερχόμενα Μηνύματα
                            @if($num_inbox>0)
                            ({{$num_inbox}})
                            @endif
                        </a></li>
                    <li><a href="/messages/send">Σταλμένα Μηνύματα</a></li>
                    {{-- <li><a href="/messages/create">Δημιουργία Μηνύματος</a></li> --}}
                </ul>
                <p class="menu-label">
                    <i class="fa fa-book" aria-hidden="true"></i> Εξεταστική
                </p>
                <ul class="menu-list">
                    <li><a href="/exams/program">Προβολή Προγράμματος</a></li>
                    <li><a href="/exams/participation">Δήλωση Συμμετοχής</a></li>
                </ul>
                <p class="menu-label">
                    <i class="fa fa-user" aria-hidden="true"></i> Προφίλ
                </p>
                <ul class="menu-list">
                    <li><a href="/profile/settings">Διαχείριση Προφίλ</a></li>
                    <li><a href="/profile/statistics/general">Στατιστικά Στοιχεία</a></li>
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
                {{-- profesor sidebar --}}
                @else
                <p class="menu-label">
                    <i class="fa fa-university" aria-hidden="true"></i> Μαθήματα
                </p>
                <ul class="menu-list">
                    <li><a href="/lessons/subscriptions">Τα μαθήματά μου</a></li>
                    <li><a href="/lessons/all/homework">Οι εργασίες μου</a></li>
                    <li><a>Τα εργαστηριά μου</a></li>
                </ul>
                <p class="menu-label">
                    <i class="fa fa-comments" aria-hidden="true"></i> Μηνύματα
                </p>
                <ul class="menu-list">
                    <li><a href="/messages/inbox">Εισερχόμενα Μηνύματα
                            @if($num_inbox>0)
                            ({{$num_inbox}})
                            @endif
                        </a></li>
                    <li><a href="/messages/send">Σταλμένα Μηνύματα</a></li>
                    {{-- <li><a href="/messages/create">Δημιουργία Μηνύματος</a></li> --}}
                </ul>
                <p class="menu-label">
                    <i class="fa fa-book" aria-hidden="true"></i> Εξεταστική
                </p>
                <ul class="menu-list">
                    <li><a>Προβολή Προγράμματος</a></li>
                    <li><a href="/exams">Διαχείριση Εξετάσεων</a></li>
                    <li><a href="/exams/create">Δήλωση Εξέτασης</a></li>
                </ul>
                <p class="menu-label">
                    <i class="fa fa-user" aria-hidden="true"></i> Προφίλ
                </p>
                <ul class="menu-list">
                    <li><a href="/profile/settings">Διαχείριση Προφίλ</a></li>
                    <li><a disabled>Στατιστικά Στοιχεία</a></li>
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
                @endif

            </aside>
        </div>
    </div>
    <div class="column" id="main-content">
        @endif
