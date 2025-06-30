<div class="menu">
    <div id="logo">AgroLink</div>
    
    <div class="navlinks">
        <p><a href="#">Home</a></p>
        <p><a href="#">About</a></p>
        <p><a href="#">Products</a></p>
        <p><a href="#">Contact Us</a></p>
        
    
    </div>

    @if (Route::has('login'))

    @auth
   <div style="display: flex; align-items: center;">
    <a href="{{ url('starred') }}" style="display: flex; align-items: center; text-decoration: none;">
        <i class="fas fa-star" style="color: gold; font-size: 24px; margin-right: 5px;"></i>
        <span style="font-size: 18px; color: #334;">{{ $count }}</span>
    </a>
</div>

   
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <input type="submit" value="logout">

    </form>

    @else

    <div class="auth-buttons">
        <a href="{{ route('login') }}" class="login-btn">Login</a>
        <a href="{{ route('register') }}" class="register-btn">Register</a>
    </div>
</div>

@endauth

@endif 