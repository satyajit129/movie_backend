<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>
            <li>
                <a href="{{ route('adminDashboard') }}" aria-expanded="false" class="{{ request()->routeIs('adminDashboard') ? 'active' : '' }}">
                    <i class="icon icon-app-store "></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ route('typeList') }}" aria-expanded="false"
                    class="{{ request()->routeIs('typeList', 'typeCreateorUpdate') ? 'active' : '' }}">
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