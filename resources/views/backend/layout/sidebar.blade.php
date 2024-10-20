<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>
            <!-- <li><a href="index.html"><i class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
            </li> -->
            <li><a href="{{ route('adminDashboard') }}" aria-expanded="false"><span
                        class="nav-text">Dashboard</span></a>
            </li>

            <li class="nav-label">Apps</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-app-store"></i><span class="nav-text">Apps</span></a>
                <ul aria-expanded="false">
                    <li><a href="/app-profile">Profile</a></li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Email</a>
                        <ul aria-expanded="false">
                            <li><a href="/email-compose">Compose</a></li>
                            <li><a href="/email-inbox">Inbox</a></li>
                            <li><a href="/email-read">Read</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li>
                <a href="{{ route('movieTypeList') }}" aria-expanded="false"
                    class="{{ request()->routeIs('movieTypeList', 'movieTypeCreateorUpdate') ? 'active' : '' }}">
                    <i class="icon icon-app-store "></i>
                    <span class="nav-text">Movie Types</span>
                </a>
            </li>

            <li>
                <a href="{{ route('movieList') }}" aria-expanded="false"
                    class="{{ request()->routeIs('movieList', 'movieCreateorUpdate') ? 'active' : '' }}">
                    <i class="icon icon-app-store "></i>
                    <span class="nav-text">Movies</span>
                </a>
            </li>
        </ul>
    </div>
</div>