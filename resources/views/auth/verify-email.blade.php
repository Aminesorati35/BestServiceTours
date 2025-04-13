@extends('Users.base')

@section('title', 'Verify Email')

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
        width: 450px;
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
    .form-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 25px;
    }
    .verification-button {
        background: #DD9323;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background 0.3s;
    }
    .verification-button:hover {
        background: #c87e1b;
    }
    .logout-button {
        color: #DD9323;
        text-decoration: none;
        background: none;
        border: none;
        font-size: 0.9em;
        cursor: pointer;
        padding: 8px 15px;
        border-radius: 5px;
        transition: background 0.3s;
    }
    .logout-button:hover {
        text-decoration: underline;
        background: #f9f9f9;
    }
</style>
    <div class="login-container">
        <div class="login-box">
            <h2 class="login-title">Verify Email</h2>

            <p class="description">
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </p>

            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success">
                    <span>{{ __('A new verification link has been sent to the email address you provided during registration.') }}</span>
                </div>
            @endif

            <div class="form-actions">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-button">
                        {{ __('Log Out') }}
                    </button>
                </form>

                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="verification-button">
                        {{ __('Resend Verification Email') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection