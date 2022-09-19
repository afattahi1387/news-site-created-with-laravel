<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">صفحات</div>
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    داشبورد
                </a>
                <a class="nav-link" href="{{ route('add.news.form') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                    افزودن خبر
                </a>
                <a class="nav-link" href="{{ route('dashboard.news') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-newspaper"></i></div>
                    اخبار
                </a>
                <a class="nav-link" href="{{ route('trash') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-trash"></i></div>
                    سطل زباله
                </a>
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout_form').submit();">
                    <div class="sb-nav-link-icon"><i class="fa fa-sign-out"></i></div>
                    خروج
                </a>
                <form action="{{ route('logout') }}" method="POST" id="logout_form">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </nav>
</div>
