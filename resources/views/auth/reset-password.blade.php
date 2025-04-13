@extends('Users.base')

@section('title', 'Password Reset')

@section('content')
<style>
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
    }

    /* Form */
    .login-form {
        display: flex;
        flex-direction: column;
    }

    /* Form Groups */
    .form-group {
        margin-bottom: 15px;
    }

    label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
        color: #DD9323;
    }

    input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
    }

    /* Error Message */
    .error-message {
        color: red;
        font-size: 14px;
        margin-top: 5px;
    }

    /* Form Footer */
    .form-actions {
        margin-top: 20px;
        display: flex;
        justify-content: flex-end;
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

    /* Status Message */
    .status-message {
        background-color: #DD9323;
        color: white;
        padding: 10px;
        border-radius: 4px;
        margin-bottom: 15px;
        text-align: center;
    }
</style>

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
        <h2 class="login-title">Reset Password</h2>
        <form method="POST" action="{{ route('password.store') }}" class="login-form">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" class="form-input" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" class="form-input" type="password" name="password" required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" class="form-input" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="form-actions">
                <button type="submit" class="login-button">Reset Password</button>
            </div>
        </form>
    </div>
</div>
@endsection
