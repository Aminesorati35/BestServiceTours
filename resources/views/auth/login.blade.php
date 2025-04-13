@extends('Users.base')

@section('title', 'Login')

@section('content')
<style>
    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background: #F5F5F5;
        font-family: Roboto;
    }
    .login-box {
        background: #fff;
        padding: 40px;
        border-radius: 8px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        text-align: center;
        width: 350px;
    }
    .alert {
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 15px;
        text-align: center;

    }
    .alert span {
        font-weight: 800;
    }
    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }
    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }
    .login-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
        color: #DD9323;
    }
    .form-group {
        margin-bottom: 15px;
        text-align: left;
    }
    .form-input {
        width: 100%;
        padding: 10px;
        border: 1px solid #DD9323;
        border-radius: 5px;
        font-size: 16px;
    }
    .remember-me {
        display: flex;
        align-items: center;
    }
    .checkbox {
        margin-right: 8px;
    }
    .form-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 10px;
    }
    .forgot-password {
        color: #DD9323;
        text-decoration: none;
        font-size: 0.9em;
    }
    .login-button {
        background: #DD9323;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background 0.3s;
    }
    .login-button:hover {
        background: #c87e1b;
    }
</style>
    <div class="login-container">
        <div class="login-box">
            @if (session('status'))
                <div class="alert alert-success">
                    <span>{{ session('status') }}</span>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    <span>{{ session('error') }}</span>
                </div>
            @endif
            @if ($errors->has('email'))
                <div class="alert alert-danger">
                    <span>{{ $errors->first('email') }}</span>
                </div>
            @endif
            <h2 class="login-title">Sign In</h2>
            <form method="POST" action="{{ route('login') }}" class="login-form">
                @csrf

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" class="form-input" type="email" name="email" value="{{ old('email') }}"
                        required autofocus autocomplete="username" />
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" class="form-input" type="password" name="password" required
                        autocomplete="current-password" />
                </div>

                <!-- Remember Me -->
                <div class="form-group remember-me">
                    <input id="remember_me" type="checkbox" class="checkbox" name="remember">
                    <label for="remember_me">Remember me</label>
                </div>

                <div class="form-actions">
                    @if (Route::has('password.request'))
                        <a class="forgot-password" href="{{ route('password.request') }}">
                            Forgot password?
                        </a>
                    @endif
                    <button type="submit" class="login-button">Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection
