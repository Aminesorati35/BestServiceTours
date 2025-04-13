<style>

@import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap');

nav{
    display: flex;
    justify-content: space-around   ;
    align-items: center;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    padding: 15px 20px;
    height: 80px;
    position: relative;


}
nav .logo{
    display: flex;
    justify-content: center;
}

nav .logo img{
    width: 80%;

}

nav .links ul, nav .sessionLinks ul{
    display: flex;
    justify-content: center;
    align-items: center;
    list-style: none;
    gap: 30px;
}

nav .sessionLinks ul .registerButton{
    all: unset;
    font-weight: 600;
    font-family: 'Roboto', sans-serif;
    background-color: #dd9323;
    border-radius: 10px;
    padding: 10px;
    color: white;
    cursor: pointer;
    border: none;
}

nav .sessionLinks ul .registerButton:hover{
    background-color: red;
    transition: 0.6s;
}

a{
    font-family: 'Roboto', sans-serif;
    font-weight: 600;
    text-decoration: none;
    color: black;
}

nav a:hover{
    color: #dd9323;
    transition: 0.4s;
}

.nav-button {
    all: unset;
    font-weight: 600;
    font-family: 'Roboto', sans-serif;
    background-color: #007bff;
    border-radius: 10px;
    padding: 10px 15px;
    color: white;
    cursor: pointer;
    border: none;
    position: absolute;
    right: 20px;
}
nav .links{}

.nav-button:hover {
    background-color: #0056b3;
    transition: 0.4s;
}

/* Responsive Design */
@media (max-width: 1024px) {
    nav{
        gap: 50px;
        padding: 15px;
    }
}

@media (max-width: 768px) {
    nav {
        flex-direction: column;
        align-items: center;
        height: auto;
    }

    nav .links ul, nav .sessionLinks ul {
        flex-direction: column;
        text-align: center;
        gap: 15px;
    }

    .nav-button {
        position: static;
        margin-top: 10px;
    }
}

@media (max-width: 480px) {
    nav .logo img{
        width: 60%;
    }
}


</style>

<nav>
    <div class="logo" >
        <img src="/images/logo1.png" alt="">
    </div>
    <div class="links" >
        <ul>
            <li><a href="{{route('home')}}">Home</a></li>
            <li><a href="{{route('our-fleet')}}">Our Fleet</a></li>
            @auth
            @if(auth()->user()->role==='admin'||auth()->user()->role==='superAdmin')
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            @else
            <li><a href="{{ route('client.reservations.index') }}">Reservations</a></li>
            @endif
            @endauth
            <li><a href="{{ route('about') }}">About Us</a></li>
            <li><a href="{{ route('contact') }}">Contact Us</a></li>
        </ul>
    </div>
    @guest
    <div class="sessionLinks" >
        <ul>
            <li = ><a href="{{ route('login') }}">Sign in</a></li>
            <li><a href="{{ route('register') }}" class="registerButton" >Register</a></li>
        </ul>
    </div>
    @endguest
    @auth
    <div class="sessionLinks" >
        <ul>
            <li><a href="{{ route('profile.edit') }}">{{ Auth::user()->name }}</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST" style="all: unset;" >
                    @csrf
                    <button type="submit" class="registerButton">
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
    @endauth
</nav>
