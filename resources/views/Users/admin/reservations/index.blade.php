@extends('Users.admin.dashboard')
@section('title')
     Reservation
@endsection

@section('dashboard-content')
    <style>
        :root {
            --primary: #4f46e5;
            --primary-light: #818cf8;
            --primary-dark: #4338ca;
            --secondary: #f9fafb;
            --success: #10b981;
            --info: #06b6d4;
            --warning: #f59e0b;
            --danger: #ef4444;
            --light: #f9fafb;
            --dark: #111827;
            --gray: #6b7280;
            --gray-light: #e5e7eb;
            --border-radius: 0.5rem;
            --box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            --transition: all 0.2s ease;
            --font-sans-serif: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }

        .dashboard-container {
            width: 98%;
            padding: 2rem;
            color: var(--dark);
            background-color: var(--secondary);
            min-height: 100vh;
            font-family: var(--font-sans-serif);
        }

        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .dashboard-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--dark);
            margin: 0;
        }

        .dashboard-subtitle {
            color: var(--gray);
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0;
            border-radius: var(--border-radius);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            margin-bottom: 1.5rem;
            transition: var(--transition);
            overflow: hidden;
        }

        .card-header {
            padding: 1.25rem 1.5rem;
            margin-bottom: 0;
            background-color: #fff;
            border-bottom: 1px solid var(--gray-light);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-title {
            margin-bottom: 0;
            color: var(--dark);
            font-size: 1.25rem;
            font-weight: 600;
        }

        .card-body {
            flex: 1 1 auto;
            padding: 0;
        }

        .table-responsive {
            display: block;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .table {
            width: 100%;
            margin-bottom: 0;
            color: var(--dark);
            border-collapse: separate;
            border-spacing: 0;
        }

        .table thead th {
            padding: 0.75rem 1rem;
            vertical-align: middle;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid var(--gray-light);
            background-color: #f8fafc;
            color: var(--gray);
            text-align: left;
            position: sticky;
            top: 0;
            z-index: 1;
        }

        .table tbody tr {
            transition: var(--transition);
        }

        .table tbody tr:hover {
            background-color: rgba(79, 70, 229, 0.05);
        }

        .table td {
            padding: 1rem;
            vertical-align: middle;
            font-size: 0.875rem;
            border-top: 1px solid var(--gray-light);
            color: var(--dark);
        }

        .table td:first-child {
            font-weight: 500;
        }

        .vehicle-img {
            width: 80px;
            height: 60px;
            object-fit: cover;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            transition: transform 0.3s ease;
        }

        .vehicle-img:hover {
            transform: scale(1.05);
        }

        .form-select {
            display: block;
            width: 100%;
            padding: 0.375rem 2.25rem 0.375rem 0.75rem;
            font-size: 0.875rem;
            font-weight: 400;
            line-height: 1.5;
            color: var(--dark);
            background-color: #fff;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 16px 12px;
            border: 1px solid var(--gray-light);
            border-radius: 0.375rem;
            appearance: none;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .form-select:focus {
            border-color: var(--primary-light);
            outline: 0;
            box-shadow: 0 0 0 0.25rem rgba(79, 70, 229, 0.25);
        }

        .badge {
            display: inline-block;
            padding: 0.35em 0.65em;
            font-size: 0.75em;
            font-weight: 600;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 50rem;
            text-transform: uppercase;
            letter-spacing: 0.025em;
        }

        .badge-pending {
            color: #fff;
            background-color: var(--info);
        }

        .badge-confirmed {
            color: #fff;
            background-color: var(--success);
        }

        .badge-cancelled {
            color: #fff;
            background-color: var(--danger);
        }

        .btn {
            display: inline-block;
            font-weight: 500;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            user-select: none;
            border: 1px solid transparent;
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
            line-height: 1.5;
            border-radius: 0.375rem;
            transition: all 0.2s ease-in-out;
            cursor: pointer;
        }

        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
            border-radius: 0.25rem;
        }

        .btn-primary {
            color: #fff;
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: 0 4px 6px -1px rgba(79, 70, 229, 0.1), 0 2px 4px -1px rgba(79, 70, 229, 0.06);
        }

        .btn-danger {
            color: #fff;
            background-color: var(--danger);
            border-color: var(--danger);
        }

        .btn-danger:hover {
            background-color: #dc2626;
            border-color: #dc2626;
            transform: translateY(-1px);
            box-shadow: 0 4px 6px -1px rgba(239, 68, 68, 0.1), 0 2px 4px -1px rgba(239, 68, 68, 0.06);
        }

        .pagination {
            display: flex;
            padding-left: 0;
            list-style: none;
            border-radius: 0.375rem;
            margin-top: 1.5rem;
            margin-bottom: 0;
            justify-content: flex-end;
        }

        .pagination .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .pagination .page-item .page-link {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0.5rem 0.75rem;
            margin-left: -1px;
            line-height: 1.25;
            color: var(--primary);
            background-color: #fff;
            border: 1px solid var(--gray-light);
            min-width: 2rem;
            font-size: 0.875rem;
            transition: all 0.2s ease-in-out;
        }

        .pagination .page-item .page-link:hover {
            z-index: 2;
            color: var(--primary-dark);
            text-decoration: none;
            background-color: #f8fafc;
            border-color: var(--gray-light);
        }

        .pagination .page-item:first-child .page-link {
            margin-left: 0;
            border-top-left-radius: 0.375rem;
            border-bottom-left-radius: 0.375rem;
        }

        .pagination .page-item:last-child .page-link {
            border-top-right-radius: 0.375rem;
            border-bottom-right-radius: 0.375rem;
        }

        .pagination .page-item.disabled .page-link {
            color: var(--gray);
            pointer-events: none;
            background-color: #fff;
            border-color: var(--gray-light);
        }

        /* Status pills */
        .status-pill {
            display: inline-flex;
            align-items: center;
            padding: 0.35em 0.75em;
            font-size: 0.75rem;
            font-weight: 500;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            border-radius: 50rem;
        }

        .status-pending {
            color: #7e3af2;
            background-color: rgba(126, 58, 242, 0.1);
        }

        .status-confirmed {
            color: #0e9f6e;
            background-color: rgba(14, 159, 110, 0.1);
        }

        .status-cancelled {
            color: #e02424;
            background-color: rgba(224, 36, 36, 0.1);
        }

        /* Action buttons */
        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 2rem;
            height: 2rem;
            border-radius: 0.375rem;
            transition: all 0.2s ease-in-out;
        }

        .action-btn-edit {
            color: var(--primary);
            background-color: rgba(79, 70, 229, 0.1);
            border: none;
        }

        .action-btn-edit:hover {
            background-color: rgba(79, 70, 229, 0.2);
        }

        .action-btn-delete {
            color: var(--danger);
            background-color: rgba(239, 68, 68, 0.1);
            border: none;
        }

        .action-btn-delete:hover {
            background-color: rgba(239, 68, 68, 0.2);
        }

        /* Client info */
        .client-info {
            display: flex;
            flex-direction: column;
        }

        .client-name {
            font-weight: 500;
            margin-bottom: 0.25rem;
        }

        .client-contact {
            font-size: 0.75rem;
            color: var(--gray);
        }

        /* Date and time */
        .datetime-info {
            display: flex;
            flex-direction: column;
        }

        .date {
            font-weight: 500;
            margin-bottom: 0.25rem;
        }

        .time {
            font-size: 0.75rem;
            color: var(--gray);
        }

        /* Sweet Alert Customization */
        .swal2-popup {
            border-radius: 0.75rem !important;
            padding: 1.5rem !important;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04) !important;
        }

        .swal2-title {
            font-size: 1.25rem !important;
            font-weight: 600 !important;
            color: var(--dark) !important;
        }

        .swal2-icon {
            margin: 1.5rem auto !important;
        }

        .swal2-actions {
            margin-top: 1.5rem !important;
        }

        /* Responsive styles */
        @media (max-width: 992px) {
            .dashboard-container {
                padding: 1.5rem;
            }

            .card-header {
                padding: 1rem;
            }

            .table td, .table th {
                padding: 0.75rem;
            }

            .vehicle-img {
                width: 70px;
                height: 50px;
            }
        }

        @media (max-width: 768px) {
            .dashboard-container {
                padding: 1rem;
            }

            .dashboard-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.75rem;
            }

            .card-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }

            .table td, .table th {
                padding: 0.5rem;
                font-size: 0.75rem;
            }

            .vehicle-img {
                width: 60px;
                height: 40px;
            }
        }
    </style>

    <div class="dashboard-container">
        <div class="dashboard-header">
            <div>
                <h1 class="dashboard-title">Reservation Management</h1>
                <p class="dashboard-subtitle">Track and manage all customer Reservation</p>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Active Reservations</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Client</th>
                                <th>Trajet</th>
                                <th>Vehicle</th>
                                <th>Scheduled</th>
                                <th>Details</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservations as $reservation)
                                <tr>
                                    <td>
                                        <div class="client-info">
                                            <span class="client-name">{{ $reservation->user->name }}</span>
                                            <span class="client-contact">{{ $reservation->user->telephone }}</span>
                                        </div>
                                    </td>
                                    <td>{{ $reservation->trajet->name }}</td>
                                    <td>
                                        <div style="text-align: center;">
                                            <img class="vehicle-img" src="{{ asset('storage/' . $reservation->voiture->image) }}" alt="Véhicule">
                                            <div style="margin-top: 0.5rem; font-size: 0.75rem; color: var(--gray);">{{ $reservation->voiture->modele }}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="datetime-info">
                                            <span class="date">{{ \Carbon\Carbon::parse($reservation->date_reservation)->format('d/m/Y') }}</span>
                                            <span class="time">{{ $reservation->time_reservation }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="font-size: 0.875rem;">
                                            <div style="display: flex; align-items: center; margin-bottom: 0.25rem;">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" style="width: 1rem; height: 1rem; margin-right: 0.25rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                                {{ $reservation->nombre_personnes }} passengers
                                            </div>
                                            <div style="display: flex; align-items: center;">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" style="width: 1rem; height: 1rem; margin-right: 0.25rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A11.634 11.634 0 0112.055 21H12a11.634 11.634 0 01-9.055-7.745M3 13a9 9 0 0119.418-3.899L20 12l-3-3h-2l3 3z" />
                                                </svg>
                                                {{ $reservation->type_trajet === 'one_way' ? 'One way' : 'Round trip' }}
                                            </div>
                                            <div style="display: flex; align-items: center; margin-top: 0.25rem;">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" style="width: 1rem; height: 1rem; margin-right: 0.25rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                                </svg>
                                                {{ $reservation->nombre_bags }} luggage
                                            </div>
                                        </div>
                                    </td>
                                    <td><span style="font-weight: 600; color: var(--dark);">{{ $reservation->prix_total }} €</span></td>
                                    <td>
                                        <form action="{{ route('reservations.updateStatus', $reservation->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" onchange="this.form.submit()" class="form-select" style="min-width: 120px;">
                                                <option value="pending" {{ $reservation->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="confirmed" {{ $reservation->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                                <option value="cancelled" {{ $reservation->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('{{ route('admin.reservations.destroy', $reservation->id) }}')">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" style="width: 1rem; height: 1rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
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
            </div>
        </div>

        <div style="display: flex; justify-content: flex-end;">
            {{ $reservations->links('vendor.pagination.default') }}
        </div>

        <script>
            function confirmDelete(deleteUrl) {
                Swal.fire({
                    title: 'Confirm Deletion',
                    text: 'Are you sure you want to delete this reservation? This action cannot be undone.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Delete',
                    cancelButtonText: 'Cancel',
                    reverseButtons: true,
                    buttonsStyling: true,
                    customClass: {
                        confirmButton: 'swal2-confirm',
                        cancelButton: 'swal2-cancel'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
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
    </div>
@endsection
