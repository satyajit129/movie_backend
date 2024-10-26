<div class="nav-header">
    <a href="{{ route('adminDashboard') }}" class="brand-logo">
        <img class="logo-compact" src="{{ asset('frontend/images/logo-text.png') }}" alt="">
        <h2 style="margin: 0; padding: 0; color: #fff;" class="brand-title">{{ \App\Utilities::getSettingsData()->website_name }}</h2>
    </a>

    <div class="nav-control">
        <div class="hamburger">
            <span class="line"></span><span class="line"></span><span class="line"></span>
        </div>
    </div>
</div>