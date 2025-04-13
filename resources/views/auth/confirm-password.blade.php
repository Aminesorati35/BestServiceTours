@extends('Users.base')

@section('title', 'Confirm Password')

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
        justify-content: flex-end;
        margin-top: 20px;
    }
    .confirm-button {
        background: #DD9323;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background 0.3s;
    }
    .confirm-button:hover {
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

            <h2 class="login-title">Confirm Password</h2>
            <p class="description">
                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
            </p>

            <form method="POST" action="{{ route('password.confirm') }}" class="login-form">
                @csrf

                <!-- Password -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" class="form-input" type="password" name="password" required
                        autocomplete="current-password" />
                    @if ($errors->has('password'))
                        <div class="alert alert-danger">
                            <span>{{ $errors->first('password') }}</span>
                        </div>
                    @endif
                </div>

                <div class="form-actions">
                    <button type="submit" class="confirm-button">Confirm</button>
                </div>
            </form>
        </div>
    </div>
@endsection