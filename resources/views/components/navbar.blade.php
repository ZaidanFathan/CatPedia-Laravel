<nav class="navbar">
      <div class="container-nav">
        <span class="logo">CatPedia</span>

        <input type="checkbox" id="menu-toggle" />
        <label for="menu-toggle" class="burger">
          <span></span>
          <span></span>
          <span></span>
        </label>

        <ul class="menu">
        <li><a href="#beranda">Beranda</a></li>
        <li><a href="#informasi">Informasi</a></li>
        <li><a href="#form">Kontak Kami</a></li>

    @auth
        {{-- Dropdown user login --}}
        <li class="menu-user">
            <a href="#" class="user-name">{{ Auth::user()->name }} ▼</a>
            <ul class="dropdown-user">
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
            </ul>
        </li>
    @else
        <li><a href="{{ route('login') }}">Login</a></li>
    @endauth
</ul>

      </div>
    </nav>
