<style>
    .navigation{
    position: fixed;
    width: 100%;
    height: 70px;
    background-color: white;
    display: flex;
    padding: 0 30px;
    top: 0%;
    align-items:center;
    justify-content: space-between;
    box-sizing: border-box;
    z-index: 1000;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.nav-left{
    display: flex;
    align-items: center;
    margin-left: 40px;
}

.nav-left img{
    width: 45px;
    height: 45px;
    object-fit: cover;
    margin-right: 10px;
}

.nav-left p{
    color: black;
    font-weight: bold;
    margin: 0;
}

.nav-right{
    display: flex;
    align-items: center;
}

.nav-right a{
    color: black;
    text-decoration: none;
    margin: 0 15px;
    padding: 8px 12px;
    border-radius: 10px;
}

.nav-right a[href="#contact"]{
    background-color: green;
    color:white;
}

.nav-right a[href="#contact"]:hover{
    color: rgba(0, 100, 0, 0.311);
}

.nav-right a:hover{
    background-color: rgba(128, 128, 128, 0.151);
}

    
    .login-btn, .register-btn {
        padding: 8px 20px;
        border-radius: 4px;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.3s;
    }
    
    .login-btn {
        color: #2e7d32;
        border: 1px solid #2e7d32;
        background-color: transparent;
    }
    
    .login-btn:hover {
        background-color: #e8f5e9;
    }
    
    .register-btn {
        color: white;
        background-color: transparent;
        border: 1px solid #2e7d32;
    }
    
    .register-btn:hover {
        background-color: #1b5e20;
        border-color: #1b5e20;
    }
    
    input[type="submit"] {
        padding: 8px 20px;
        background-color: #f8faf7;
        color: #2e7d32;
        border: 1px solid #2e7d32;
        border-radius: 4px;
        cursor: pointer;
        font-weight: 500;
        transition: all 0.3s;
        margin-left: 15px;
    }
    
    input[type="submit"]:hover {
        background-color: #e8f5e9;
    }
    
    /* Star icon styling */
    .fa-star {
        text-shadow: 0 0 2px rgba(0, 0, 0, 0.2);
        margin-right: 10px;
    }
</style>


<div class="menu">






    
    
   <div class="navigation">
    <div class="nav-left">
        <img src="images/3.jpg" alt="">
        <p>AgroLink</p>
    </div>

    <div class="nav-right">
        <a href="#home">Home</a>
        <a href="#about">About</a>
        <a href="#products">Products</a>
        <a href="#contact">Contacts</a>

        @if (Route::has('login'))
            @auth
                <a href="{{ url('starred') }}" style="display: flex; align-items: center; text-decoration: none;">
                    <i class="fas fa-star" style="color: gold; font-size: 20px; margin-right: 5px;"></i>
                    <span style="font-size: 16px; color: #334;">{{ $count }}</span>
                </a>

                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <input type="submit" value="Logout">
                </form>
            @else
                <a href="{{ route('login') }}" class="login-btn">Login</a>
                <a href="{{ route('register') }}" class="register-btn">Register</a>
            @endauth
        @endif
    </div>
</div>
