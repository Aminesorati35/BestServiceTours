@extends('Users.admin.dashboard')
@section('title')
    Users
@endsection
@section('dashboard-content')
    <style>
        /* Ultra Modern Dashboard Style with Dark Mode Elements */
        :root {
            --orange-primary: #DD9323;
            --orange-secondary: #F4B15F;
            --orange-light: #FFF5E6;
            --dark-primary: #1A202C;
            --dark-secondary: #2D3748;
            --gray-50: #F7FAFC;
            --gray-100: #EDF2F7;
            --gray-200: #E2E8F0;
            --gray-300: #CBD5E0;
            --gray-400: #A0AEC0;
            --gray-600: #718096;
            --gray-700: #4A5568;
            --white: #FFFFFF;
            --danger: #F56565;
            --success: #48BB78;
            --success-light: #C6F6D5;
            --font-sans: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        }



        .dashboard-wrapper {
            background-color: var(--gray-100);
            color: var(--gray-700);
            min-height: 100vh;
            padding: 2rem;
        }

        .dashboard-container {
            width: 90%;
            margin: 0 auto;
        }

        /* Header Section */
        .dashboard-header {
            margin-bottom: 1.5rem;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .header-title {
            font-size: 2rem;
            font-weight: 800;
            color: var(--dark-primary);
            letter-spacing: -0.025em;
            position: relative;
            padding-bottom: 0.5rem;
        }

        .header-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            height: 4px;
            width: 60px;
            background: linear-gradient(90deg, var(--orange-primary), var(--orange-secondary));
            border-radius: 2px;
        }

        .header-actions {
            display: flex;
            gap: 1rem;
        }

        .header-search {
            position: relative;
            width: 280px;
            margin-right: 50px;
        }

        .search-input {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 3rem;
            border-radius: 0.5rem;
            border: 1px solid var(--gray-300);
            background-color: var(--white);
            font-size: 0.875rem;
            transition: all 0.2s;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--orange-primary);
            box-shadow: 0 0 0 3px rgba(221, 147, 35, 0.2);
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-400);
        }

        .header-subtitle {
            color: var(--gray-600);
            font-size: 1rem;
            max-width: 700px;
        }

        /* Main Card */
        .main-card {
            background: var(--white);
            border-radius: 1rem;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem 2rem;
            background-color: var(--dark-primary);
            color: var(--white);
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
        }

        .add-user-btn {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background-color: var(--orange-primary);
            color: var(--white);
            padding: 0.625rem 1.25rem;
            border-radius: 0.5rem;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.2s;
        }

        .add-user-btn:hover {
            background-color: #c17e18;
            transform: translateY(-1px);
        }

        .add-user-btn .icon {
            width: 1.25rem;
            height: 1.25rem;
        }

        /* Table Design */
        .table-container {
            overflow-x: auto;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table th {
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            color: var(--gray-600);
            background-color: var(--gray-50);
            padding: 1rem 1.5rem;
            text-align: left;
            border-bottom: 1px solid var(--gray-200);
            letter-spacing: 0.05em;
        }

        .data-table td {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--gray-200);
            vertical-align: middle;
        }

        .data-table tr:last-child td {
            border-bottom: none;
        }

        .data-table tbody tr {
            transition: all 0.2s;
        }

        .data-table tbody tr:hover {
            background-color: var(--orange-light);
            transform: scale(1.005);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        /* User Cell */
        .user-profile {
            display: flex;
            align-items: center;
            gap: 0.875rem;
        }

        .avatar {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: var(--white);
            background: linear-gradient(135deg, var(--orange-primary), var(--orange-secondary));
        }

        .user-details {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            font-weight: 600;
            color: var(--dark-primary);
            margin-bottom: 0.25rem;
        }

        .user-email {
            font-size: 0.875rem;
            color: var(--gray-600);
        }

        /* Role Badge */
        .role-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.375rem 0.75rem;
            border-radius: 0.375rem;
            letter-spacing: 0.025em;
            text-transform: uppercase;
        }

        .badge-client {
            background-color: var(--orange-light);
            color: var(--orange-primary);
        }

        .badge-admin {
            background-color: rgba(66, 153, 225, 0.1);
            color: #3182CE;
        }

        .badge-superadmin {
            background-color: var(--success-light);
            color: var(--success);
        }

        /* Phone Number */
        .phone-number {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--gray-700);
        }

        .phone-icon {
            color: var(--gray-400);
        }

        /* Actions Column */
        .actions-cell {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        /* Select Control */
        .role-select {
            appearance: none;
            background-color: var(--white);
            border: 1px solid var(--gray-300);
            border-radius: 0.375rem;
            padding: 0.5rem 2.5rem 0.5rem 1rem;
            font-size: 0.875rem;
            color: var(--gray-700);
            width: 130px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%23A0AEC0'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 1rem;
            transition: all 0.2s;
        }

        .role-select:focus {
            outline: none;
            border-color: var(--orange-primary);
            box-shadow: 0 0 0 3px rgba(221, 147, 35, 0.2);
        }

        /* Action Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 0.375rem;
            padding: 0.625rem;
            transition: all 0.2s;
            cursor: pointer;
            border: none;
        }

        .btn-icon {
            width: 1.25rem;
            height: 1.25rem;
        }

        .btn-edit {
            background-color: var(--gray-100);
            color: var(--gray-700);
        }

        .btn-edit:hover {
            background-color: var(--gray-200);
        }

        .btn-delete {
            background-color: rgba(245, 101, 101, 0.1);
            color: var(--danger);
        }

        .btn-delete:hover {
            background-color: var(--danger);
            color: var(--white);
        }

        /* Pagination */
        .table-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.25rem 1.5rem;
            background-color: var(--gray-50);
            border-top: 1px solid var(--gray-200);
        }

        .page-info {
            font-size: 0.875rem;
            color: var(--gray-600);
        }

        .pagination {
            display: flex;
            list-style: none;
            gap: 0.375rem;
        }

        .page-item a,
        .page-item span {
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 2rem;
            height: 2rem;
            padding: 0 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--gray-700);
            background-color: var(--white);
            border: 1px solid var(--gray-300);
            border-radius: 0.375rem;
            transition: all 0.2s;
            text-decoration: none;
            box-sizing: border-box;
        }

        .page-item a:hover {
            background-color: var(--gray-100);
        }

        .page-item.active a {
            background-color: var(--orange-primary);
            color: var(--white);
            border-color: var(--orange-primary);
        }

        .page-item.disabled span {
            color: var(--gray-400);
            cursor: not-allowed;
        }

        /* Alert */
        .alert {
            border-radius: 0.5rem;
            padding: 1rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
        }

        .alert-success {
            background-color: var(--success-light);
        }

        .alert-icon {
            flex-shrink: 0;
            width: 1.25rem;
            height: 1.25rem;
            color: var(--success);
        }

        .alert-content {
            flex: 1;
        }

        .alert-title {
            font-weight: 600;
            color: var(--success);
            margin-bottom: 0.25rem;
        }

        .alert-message {
            color: var(--gray-700);
            font-size: 0.875rem;
        }

        /* SweetAlert Customization */
        .swal2-styled.btn-confirm {
            background-color: var(--danger) !important;
        }

        .swal2-styled.btn-ok {
            background-color: var(--orange-primary) !important;
        }

        /* Responsive Styles */
        @media (max-width: 1024px) {
            .dashboard-wrapper {
                padding: 1.5rem;
            }
        }

        @media (max-width: 768px) {
            .dashboard-wrapper {
                padding: 1rem;
            }

            .header-content {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .header-actions {
                width: 100%;
            }

            .header-search {
                width: 100%;
            }

            .card-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .add-user-btn {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 640px) {
            .table-footer {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }

            .pagination {
                align-self: center;
            }
        }
        .header-actions a {
        display: inline-block;
        padding: 0.625rem 1rem;
        background-color: var(--gray-200);
        color: var(--gray-700);
        border-radius: 0.375rem;
        font-weight: 500;
        font-size: 0.875rem;
        text-decoration: none;
        transition: all 0.2s ease;
        margin-left: 0.5rem;
    }

    .header-actions a:hover {
        background-color: var(--gray-300);
        transform: translateY(-1px);
    }

    @media (max-width: 768px) {
        .header-actions a {
            width: 100%;
            text-align: center;
            margin: 0.5rem 0;
        }
    }
    </style>

    <div class="dashboard-wrapper">
        <div class="dashboard-container">
            <!-- Header Section -->
            <div class="dashboard-header">
                <div class="header-content">
                    <h1 class="header-title">User Management</h1>
                    <div class="header-actions">
                        <div class="header-search">
                            <form action="{{ route('admin.voitures.index') }}" method="GET">
                                <svg class="search-icon" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                <input type="text" name="search" class="search-input" placeholder="Search fleets..." value="{{ request('search') }}">
                            </form>
                        </div>
                        <a href="{{ route('admin.users.index') }}" class="reset-link">Reset</a>
                    </div>
                </div>
                <p class="header-subtitle">View and manage system users, assign roles, and control user access.</p>
            </div>

            <!-- Alert Message -->
            @if (session('success'))
                <div class="alert alert-success">
                    <svg class="alert-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div class="alert-content">
                        <div class="alert-title">Success!</div>
                        <div class="alert-message">{{ session('success') }}</div>
                    </div>
                </div>
                <script>
                    Swal.fire({
                        title: 'Success!',
                        text: "{{ session('success') }}",
                        icon: 'success',
                        iconColor: '#48BB78',
                        confirmButtonText: 'OK',
                        customClass: {
                            confirmButton: 'btn-ok',
                        }
                    });
                </script>
            @endif

            <!-- Main Content Card -->
            <div class="main-card">
                <div class="card-header">
                    <div class="card-title">System Users</div>
                </div>

                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>ID</th>
                                <th>Role</th>
                                <th>Phone</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <div class="user-profile">
                                            <div class="avatar">
                                                {{ strtoupper(substr($user->name, 0, 2)) }}
                                            </div>
                                            <div class="user-details">
                                                <div class="user-name">{{ $user->name }}</div>
                                                <div class="user-email">{{ $user->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>#{{ $user->id }}</td>
                                    <td>
                                        <span class="role-badge {{ $user->role == 'client' ? 'badge-client' : ($user->role == 'admin' ? 'badge-admin' : 'badge-superadmin') }}">
                                            @if ($user->role == 'client')
                                                Client
                                            @elseif($user->role == 'admin')
                                                Admin
                                            @else
                                                Super Admin
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <div class="phone-number">
                                            <svg class="phone-icon" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                            </svg>
                                            {{ $user->telephone ? $user->telephone : '0638100939' }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="actions-cell">
                                            @if (Auth::user()->isSuperAdmin())
                                                <!-- Role Change Form -->
                                                <form action="{{ route('admin.users.updateRole', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <select name="role" onchange="this.form.submit()" class="role-select">
                                                        <option value="client" {{ $user->role == 'client' ? 'selected' : '' }}>Client</option>
                                                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                                    </select>
                                                </form>
                                            @endif

                                            <!-- Action Buttons -->


                                            <button type="button" class="btn btn-delete"
                                                onclick="confirmDelete('{{ route('admin.users.destroy', $user->id) }}')" title="Delete User">
                                                <svg class="btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="table-footer">
                    <div class="page-info">
                        Showing <span class="font-semibold">1</span> to <span class="font-semibold">{{ count($users) }}</span> of <span class="font-semibold">{{ count($users) }}</span> users
                    </div>
                    <ul class="pagination">
                        {{ $users->links('vendor.pagination.default') }}
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(deleteUrl) {
            Swal.fire({
                title: 'Delete User',
                text: 'Are you sure you want to delete this user? This action cannot be undone.',
                icon: 'warning',
                iconColor: '#F56565',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel',
                customClass: {
                    confirmButton: 'btn-confirm',
                    cancelButton: 'btn-cancel'
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, submit the form
                    const form = document.createElement('form');
                    form.action = deleteUrl;
                    form.method = 'POST';
                    form.innerHTML = '@csrf @method('DELETE')';
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        }
    </script>
@endsection