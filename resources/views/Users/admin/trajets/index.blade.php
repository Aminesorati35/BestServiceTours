@section('title')
    Trajets
@endsection
@extends('Users.admin.dashboard')
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

    .add-trip-btn {
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
        text-decoration: none;
    }

    .add-trip-btn:hover {
        background-color: #c17e18;
        transform: translateY(-1px);
    }

    .add-trip-btn .icon {
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

    /* Price Badge */
    .price-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 0.875rem;
        font-weight: 600;
        padding: 0.5rem 0.75rem;
        border-radius: 0.375rem;
        background-color: var(--orange-light);
        color: var(--orange-primary);
    }

    /* Actions Column */
    .actions-cell {
        display: flex;
        align-items: center;
        gap: 0.75rem;
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
        background-color: var(--success-light);
        color: var(--success);
        padding: 0.5rem 1rem;
        font-weight: 500;
        font-size: 0.875rem;
    }

    .btn-edit:hover {
        background-color: var(--success);
        color: var(--white);
    }

    .btn-delete {
        background-color: rgba(245, 101, 101, 0.1);
        color: var(--danger);
        padding: 0.5rem 1rem;
        font-weight: 500;
        font-size: 0.875rem;
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

        .add-trip-btn {
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
</style>

<div class="dashboard-wrapper">
    <div class="dashboard-container">
        <!-- Header Section -->
        <div class="dashboard-header">
            <div class="header-content">
                <h1 class="header-title">Trip Management</h1>
                <div class="header-actions">
                    <div class="header-search">
                        <svg class="search-icon" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <input type="text" class="search-input" placeholder="Search trips...">
                    </div>
                </div>
            </div>
            <p class="header-subtitle">Manage all Trips, update routes, prices, and travel times.</p>
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
                <div class="card-title">All Trips</div>
                <a href="{{ route('admin.trajets.create') }}" class="add-trip-btn">
                    <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Add New Trajet
                </a>
            </div>

            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Departure</th>
                            <th>Arrival</th>
                            <th>Duration</th>
                            <th>Price (€)</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($trajets as $trajet)
                            <tr>
                                <td>#{{ $trajet->id }}</td>
                                <td>{{ $trajet->name }}</td>
                                <td>{{ $trajet->depart }}</td>
                                <td>{{ $trajet->arrivee }}</td>
                                <td>{{ $trajet->duree_estimee }}</td>
                                <td>
                                    <span class="price-badge">€{{ $trajet->prix }}</span>
                                </td>
                                <td>
                                    <div class="actions-cell">
                                        <a href="{{ route('admin.trajets.edit', $trajet->id) }}" class="btn btn-edit">
                                            <svg class="btn-icon" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                            Edit
                                        </a>
                                        <button type="button" class="btn btn-delete" onclick="confirmDelete('{{ route('admin.trajets.destroy', $trajet->id) }}')">
                                            <svg class="btn-icon" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                            Delete
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
                    Showing <span class="font-semibold">1</span> to <span class="font-semibold">{{ count($trajets) }}</span> of <span class="font-semibold">{{ $trajets->total() }}</span> trips
                </div>
                <ul class="pagination">
                    {{ $trajets->links('vendor.pagination.default') }}
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete(deleteUrl) {
        Swal.fire({
            title: 'Delete Trip',
            text: 'Are you sure you want to delete this trip? This action cannot be undone.',
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