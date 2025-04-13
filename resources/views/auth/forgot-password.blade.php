@extends('Users.base')

@section('title', 'Forgot Password')

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
    .description {
        margin-bottom: 20px;
        color: #666;
        font-size: 14px;
        line-height: 1.5;
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
    .form-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
    }
    .back-to-login {
        color: #DD9323;
        text-decoration: none;
        font-size: 0.9em;
    }
    .reset-button {
        background: #DD9323;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background 0.3s;
    }
    .reset-button:hover {
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
            <h2 class="login-title">Reset Password</h2>
            <p class="description">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </p>
            <form method="POST" action="{{ route('password.email') }}" class="login-form">
                @csrf

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" class="form-input" type="email" name="email" value="{{ old('email') }}"
                        required autofocus autocomplete="username" />
                </div>

                <div class="form-actions">
                    <a class="back-to-login" href="{{ route('login') }}">
                        Back to login
                    </a>
                    <button type="submit" class="reset-button">Email Password Reset Link</button>
                </div>
            </form>
        </div>
    </div>
@endsection