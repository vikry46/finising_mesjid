<nav class="navbar navbar-expand-lg" id="tm-main-nav">
    <button class="navbar-toggler toggler-example mr-0 ml-auto" type="button" 
        data-toggle="collapse" data-target="#navbar-nav" 
        aria-controls="navbar-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span><i class="fas fa-bars"></i></span>
    </button>
    <div class="collapse navbar-collapse tm-nav" id="navbar-nav">
        <ul class="navbar-nav text-uppercase">
            <li class="nav-item active">
                <a class="nav-link tm-nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link tm-nav-link" href="/about">Berita</a>
            </li>                           
            <li class="nav-item">
                <a class="nav-link tm-nav-link" href="contact.html">Kontak</a>
            </li>
            <li class="nav-item"> 
              @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="nav-link tm-nav-link">Dashboard</a>
                    @else
                        <a  href="{{ route('login') }}" class="nav-link tm-nav-link">Admin</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 nav-link tm-nav-link">Register</a>
                        @endif
                    @endauth
              @endif
            </li>
        </ul>                            
    </div>                        
</nav>