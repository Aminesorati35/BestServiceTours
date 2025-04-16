@section('title')
    Account Settings
@endsection
@extends('Users.base')

@section('content')
<style>
    :root {
        --primary: #dd9323;
        --primary-light: rgba(221, 147, 35, 0.1);
        --text: #2d3748;
        --text-light: #718096;
        --border: #e2e8f0;
        --bg: #f8fafc;
    }

    .profile-container {
        width: 900px;
        margin: 3rem auto;
        padding: 0 1.25rem;
    }

    .profile-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.02),
                    0 10px 10px -5px rgba(0, 0, 0, 0.01);
        border: 1px solid var(--border);
    }

    .profile-header {
        padding: 2rem;
        border-bottom: 1px solid var(--border);
    }

    .profile-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text);
        margin: 0;
        display: flex;
        align-items: center;
    }

    .profile-title svg {
        margin-right: 0.75rem;
        width: 1.5rem;
        height: 1.5rem;
    }

    .profile-body {
        padding: 0;
    }

    .profile-section {
        padding: 2rem;
        border-bottom: 1px solid var(--border);
    }

    .profile-section:last-child {
        border-bottom: none;
    }

    .section-title {
        font-size: 1.125rem;
        font-weight: 600;
        color: var(--text);
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
    }

    .section-title svg {
        margin-right: 0.75rem;
        width: 1.25rem;
        height: 1.25rem;
        color: var(--primary);
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        font-size: 0.875rem;
        font-weight: 500;
        color: var(--text-light);
        margin-bottom: 0.5rem;
    }

    .form-input {
        width: 100%;
        padding: 0.875rem 1rem;
        border: 1px solid var(--border);
        border-radius: 8px;
        font-size: 0.9375rem;
        transition: all 0.2s ease;
        background: white;
    }

    .form-input:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px var(--primary-light);
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        font-weight: 700;
        font-size: 0.9rem;
        cursor: pointer;
        transition: all 0.2s ease;
        border: none;
    }

    .btn-primary {
        background: var(--primary);
        color: white;
    }

    .btn-primary:hover {
        background: #c7821a;
        transform: translateY(-1px);
    }

    .btn-danger {
        background: white;
        color: #e53e3e;
        border: 1px solid #fed7d7;
    }

    .btn-danger:hover {
        background: #fff5f5;
    }

    @media (max-width: 640px) {
        .profile-container {
            padding: 0 1rem;
        }

        .profile-header,
        .profile-section {
            padding: 1.5rem;
        }
    }
</style>

<div class="profile-container">
    <div class="profile-card">
        <div class="profile-header">
            <h1 class="profile-title">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                Account Settings
            </h1>
        </div>

        <div class="profile-body">
            <!-- Profile Information -->
            <div class="profile-section">
                <h2 class="section-title">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Personal Information
                </h2>

                <form method="post" action="{{ route('profile.update') }}">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-input" name="name" required value="{{ old('name', $user->name) }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email Address</label>
                        <input type="email" class="form-input" name="email" required value="{{ old('email', $user->email) }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </form>
            </div>

            <!-- Password Update -->
            <div class="profile-section">
                <h2 class="section-title">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                    Password
                </h2>

                <form method="post" action="{{ route('password.update') }}">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label class="form-label">Current Password</label>
                        <input type="password" class="form-input" name="current_password">
                    </div>
                    <div class="form-group">
                        <label class="form-label">New Password</label>
                        <input type="password" class="form-input" name="password">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" class="form-input" name="password_confirmation">
                    </div>
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </form>
            </div>

            <!-- Account Deletion -->
            <div class="profile-section">
                <h2 class="section-title">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    Delete Account
                </h2>

                <p style="color: var(--text-light); margin-bottom: 1.5rem; font-size: 0.9375rem;">
                    Once your account is deleted, all of its resources and data will be permanently deleted.
                </p>

                <form action="{{ route('profile.destroy') }}" method="post">
                    @csrf
                    @method('DELETE')

                    <div class="form-group">
                        <label for="password">Confirm Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-danger">Delete Account</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection