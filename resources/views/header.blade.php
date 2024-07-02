<header class="header">
    <h2 class="header__title">
        <a class="header__link" href="{{ URL::route('index') }}">
            <span
                class="header__link__content header__title__content"
            >Center of support</span>
            <i class="settings-icon"></i>
        </a>
    </h2>
    <div class="header__auth">
        @if (Auth::check())
            <p class="header__hello">Здравствуйте, {{ Auth::user()->name }}!</p>
            <a class="header__link" href="{{ URL::route('logout') }}">
                <span class="header__link__content">Выйти</span>
                <i class="logout-icon"></i>
            </a>
        @else
            <a 
                class="header__link" 
                href="{{ route('login.form') }}">
                Войти
            </a>
            <a 
                class="header__link" 
                href="{{ route('register.form') }}">
                Зарегистрироваться
            </a>
        @endif
    </div>
</header>
