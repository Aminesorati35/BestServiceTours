@extends('Users.base')

@section('title', 'Register')

@section('content')
<style>
    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f4f4f4;
    }
    .login-box {
        background: #fff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 400px;
        font-family: Roboto;
    }
    .login-title {
        text-align: center;
        color: #DD9323;
        margin-bottom: 20px;
        font-size: 24px;
    }
    .form-group {
        margin-bottom: 15px;
        display: flex;
        flex-direction: column;
        gap: 5px;
    }
    label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
        color: #DD9323;
    }
    .form-input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
    }
    .form-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
    }
    .forgot-password {
        color: #DD9323;
        text-decoration: none;
        font-size: 14px;
    }
    .forgot-password:hover {
        text-decoration: underline;
    }
    .login-button {
        background-color: #DD9323;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }
    .login-button:hover {
        background-color: #b87c1e;
    }
    .alert {
        padding: 10px;
        border-radius: 4px;
        text-align: center;
        margin-bottom: 15px;
    }
    .alert-success {
        background-color: #28a745;
        color: white;
    }
    .alert-danger {
        background-color: #dc3545;
        color: white;
    }
    .form-group span{
        color: red;
    }
</style>
<div class="login-container">
    <div class="login-box">
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <h2 class="login-title">Register</h2>
        <form method="POST" action="{{ route('register') }}" class="login-form">
            @csrf

            <!-- Name -->
            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" class="form-input" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
                @error('name')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <!-- Email Address -->
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" class="form-input" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" />
                @error('email')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="telephone">Telephone</label>
                <input id="telephone" class="form-input" type="text" name="telephone" value="{{ old('telephone') }}" required autocomplete="username" />
                @error('telephone')
                    <span>{{ $message }}</span>
                @enderror
            </div>


            <!-- Password -->
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" class="form-input" type="password" name="password"  autocomplete="new-password" required />
                @error('password')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" class="form-input" type="password" name="password_confirmation"  autocomplete="new-password" required />
                @error('password_confirmation')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div class="form-actions">
                <a class="forgot-password" href="{{ route('login') }}">
                    Already registered?
                </a>
                <button type="submit" class="login-button">Register</button>
            </div>
        </form>
    </div>
</div>
@endsection
