@if (Auth::check())
<div class="columns " id="main-window">
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

                <hr> {{-- student sidebar --}}
                @if(Auth::user()->role =='student')
                <p class="menu-label">
                    <i class="fa fa-university" aria-hidden="true"></i> Επιλογές Μαθήματος
                </p>
                <ul class="menu-list">
                    <li><a href="/lessons/{{$data['lesson']->name}}/files"><i class="fa fa-folder-o"
                                aria-hidden="true"></i> Έγγραφα</a></li>
                    <li><a href="/lessons/{{$data['lesson']->name}}/announcements"><i class="fa fa-bullhorn"
                                aria-hidden="true"></i> Ανακοινώσεις</a></li>
                    <li><a href="/lessons/{{$data['lesson']->name}}/homework"><i class="fa fa-flask"
                                aria-hidden="true"></i> Εργασίες</a></li>
                    <li><a><i class="fa fa-users" aria-hidden="true"></i> Ομάδες Χρηστών</a></li>
                    {{-- <li><a><i class="fa fa-microchip" aria-hidden="true"></i> Εργαστήριο</a></li> --}}
                    <li><a href="/lessons/{{$data['lesson']->name}}/forum"><i class="fa fa-commenting-o"
                                aria-hidden="true"></i> Forum</a></li>
                    <li>
                        <hr>
                    </li>
                    <li><a class="button is-info is-outlined" href="/"><i class="fa fa-chevron-left"
                                aria-hidden="true"></i> Πίσω</a></li>
                </ul>

                {{-- profesor sidebar --}} @else
                <p class="menu-label">
                    <i class="fa fa-university" aria-hidden="true"></i> Επιλογές Μαθήματος
                </p>
                <ul class="menu-list">
                    <li><a href="/lessons/{{$data['lesson']->name}}/files"><i class="fa fa-folder-o"
                                aria-hidden="true"></i> Έγγραφα</a>
                    </li>
                    <li><a href="/lessons/{{$data['lesson']->name}}/announcements"><i class="fa fa-bullhorn"
                                aria-hidden="true"></i>
                            Ανακοινώσεις</a></li>
                    <li><a href="/lessons/{{$data['lesson']->name}}/homework"><i class="fa fa-flask"
                                aria-hidden="true"></i>
                            Εργασίες</a></li>
                    <li><a><i class="fa fa-users" aria-hidden="true"></i> Ομάδες Χρηστών</a></li>
                    {{-- <li><a><i class="fa fa-microchip" aria-hidden="true"></i> Εργαστήριο</a></li> --}}
                    <li><a href="/lessons/{{$data['lesson']->name}}/forum"><i class="fa fa-commenting-o"
                                aria-hidden="true"></i>
                            Forum</a></li>
                    <li>
                        <hr>
                    </li>
                    <li><a class="button is-info is-outlined" href="/"><i class="fa fa-chevron-left"
                                aria-hidden="true"></i> Πίσω</a>
                    </li>
                </ul>
                @endif

            </aside>
        </div>
    </div>
    <div class="column" id="main-content">
        @endif
