@extends('Users.client.dashboard')
@section('title')
    My Reservations
@endsection

@section('dashboard-content')
<style>
    /* Premium Dashboard Design */
    :root {
        /* Primary Palette */
        --primary-900: #1e40af;
        --primary-800: #1e4ed8;
        --primary-700: #2563eb;
        --primary-600: #3b82f6;
        --primary-500: #60a5fa;
        --primary-400: #93c5fd;
        --primary-300: #bfdbfe;
        --primary-200: #dbeafe;
        --primary-100: #eff6ff;

        /* Neutrals */
        --neutral-900: #111827;
        --neutral-800: #1f2937;
        --neutral-700: #374151;
        --neutral-600: #4b5563;
        --neutral-500: #6b7280;
        --neutral-400: #9ca3af;
        --neutral-300: #d1d5db;
        --neutral-200: #e5e7eb;
        --neutral-100: #f3f4f6;
        --neutral-50: #f9fafb;

        /* Accents */
        --success: #10b981;
        --warning: #f59e0b;
        --danger: #ef4444;
        --info: #3b82f6;

        /* Sizing and Spacing */
        --radius-sm: 0.25rem;
        --radius-md: 0.5rem;
        --radius-lg: 0.75rem;
        --radius-xl: 1rem;
        --radius-2xl: 1.5rem;

        /* Shadows */
        --shadow-sm: 0 1px 2px rgba(0, 0, 0, 0.05);
        --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    /* Base Styles */
    body {
        font-family: 'Inter', sans-serif;
        background-color: var(--neutral-100);
        color: var(--neutral-800);
    }

    /* Dashboard Container */
    .dashboard {
        max-width: 1680px;
        margin: 0 auto;
        padding: 1.5rem;
    }

    /* Dashboard Header */
    .dashboard-header {
        margin-bottom: 2rem;
    }

    .dashboard-title-wrapper {
        display: flex;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .dashboard-icon {
        width: 48px;
        height: 48px;
        border-radius: var(--radius-md);
        background: var(--primary-600);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        box-shadow: var(--shadow-md);
    }

    .dashboard-icon i {
        color: white;
        font-size: 1.5rem;
    }

    .dashboard-title {
        font-size: 1.875rem;
        font-weight: 700;
        color: var(--neutral-800);
        letter-spacing: -0.025em;
        line-height: 1.2;
    }

    .dashboard-subtitle {
        color: var(--neutral-500);
        font-size: 1rem;
        max-width: 600px;
    }

    /* Stats Row */
    .stats-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2.5rem;
    }

    .stat-card {
        background: white;
        border-radius: var(--radius-lg);
        padding: 1.5rem;
        box-shadow: var(--shadow-md);
        display: flex;
        align-items: center;
    }

    .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: var(--radius-md);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
    }

    .stat-icon i {
        font-size: 1.25rem;
        color: white;
    }

    .stat-icon.primary {
        background: var(--primary-600);
    }

    .stat-icon.success {
        background: var(--success);
    }

    .stat-icon.warning {
        background: var(--warning);
    }

    .stat-icon.danger {
        background: var(--danger);
    }

    .stat-content {
        flex: 1;
    }

    .stat-label {
        color: var(--neutral-500);
        font-size: 0.875rem;
        margin-bottom: 0.25rem;
    }

    .stat-value {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--neutral-800);
    }

    /* Reservation Cards */
    .reservations-container {
        margin-bottom: 3rem;
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .section-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--neutral-800);
    }

    .section-action {
        color: var(--primary-600);
        font-weight: 500;
        font-size: 0.875rem;
        display: flex;
        align-items: center;
    }

    .section-action i {
        margin-left: 0.5rem;
    }

    .reservations-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
        gap: 1.5rem;
    }

    /* Single Reservation Card */
    .reservation-card {
        position: relative;
        border-radius: var(--radius-xl);
        background: white;
        box-shadow: var(--shadow-md);
        overflow: hidden;
        transition: all 0.2s ease;
    }

    .reservation-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-xl);
    }

    .card-header {
        position: relative;
        height: 180px;
        overflow: hidden;
    }

    .card-header img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .reservation-card:hover .card-header img {
        transform: scale(1.05);
    }

    .card-status {
        position: absolute;
        top: 1rem;
        right: 1rem;
        padding: 0.5rem 1rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: white;
        box-shadow: var(--shadow-md);
    }

    .status-confirmed {
        background: var(--success);
    }

    .status-pending {
        background: var(--warning);
    }

    .status-cancelled {
        background: var(--danger);
    }

    .card-journey {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(0deg, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0) 100%);
        padding: 1.5rem 1.5rem 1rem;
        color: white;
    }

    .journey-name {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .journey-route {
        display: flex;
        align-items: center;
        font-size: 0.875rem;
    }

    .journey-route i {
        margin: 0 0.5rem;
    }

    .card-body {
        padding: 1.5rem;
    }

    .vehicle-info {
        display: flex;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .vehicle-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: var(--primary-100);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
    }

    .vehicle-icon i {
        color: var(--primary-700);
        font-size: 1.125rem;
    }

    .vehicle-name {
        font-weight: 600;
        color: var(--neutral-800);
    }

    .reservation-details {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .detail-item {
        display: flex;
        flex-direction: column;
    }

    .detail-label {
        font-size: 0.75rem;
        color: var(--neutral-500);
        margin-bottom: 0.25rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .detail-value {
        font-size: 0.875rem;
        font-weight: 500;
        color: var(--neutral-800);
        display: flex;
        align-items: center;
    }

    .detail-value i {
        margin-right: 0.5rem;
        color: var(--primary-600);
        font-size: 1rem;
    }

    .price-section {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1rem 1.5rem;
        background: var(--primary-50);
        margin: 0 -1.5rem 1.5rem;
        border-top: 1px solid var(--primary-200);
        border-bottom: 1px solid var(--primary-200);
    }

    .price-label {
        font-size: 0.875rem;
        font-weight: 500;
        color: var(--neutral-600);
    }

    .price-value {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--primary-800);
    }

    .card-actions {
        display: flex;
        gap: 1rem;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.75rem 1rem;
        font-size: 0.875rem;
        font-weight: 500;
        border-radius: var(--radius-md);
        transition: all 0.2s ease;
        flex: 1;
        cursor: pointer;
        border: none;
        outline: none;
    }

    .btn i {
        margin-right: 0.5rem;
    }

    .btn-primary {
        background: var(--primary-600);
        color: white;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
    }

    .btn-primary:hover {
        background: var(--primary-700);
    }

    .btn-outline {
        background: white;
        color: var(--neutral-700);
        border: 1px solid var(--neutral-300);
    }

    .btn-outline:hover {
        border-color: var(--neutral-400);
        color: var(--neutral-900);
        background: var(--neutral-50);
    }

    .btn-danger {
        background: white;
        color: var(--danger);
        border: 1px solid var(--danger);
    }

    .btn-danger:hover {
        background: var(--danger);
        color: white;
    }

    /* Empty State */
    .empty-state {
        background: white;
        border-radius: var(--radius-xl);
        padding: 3rem;
        text-align: center;
        box-shadow: var(--shadow-md);
    }

    .empty-state-icon {
        width: 80px;
        height: 80px;
        background: var(--primary-100);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
    }

    .empty-state-icon i {
        font-size: 2rem;
        color: var(--primary-600);
    }

    .empty-state-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--neutral-800);
        margin-bottom: 0.75rem;
    }

    .empty-state-description {
        color: var(--neutral-500);
        max-width: 500px;
        margin: 0 auto 1.5rem;
    }

    .empty-state .btn {
        margin: 0 auto;
        width: auto;
        padding: 0.75rem 2rem;
    }

    /* Responsive Adjustments */
    @media (max-width: 1200px) {
        .reservations-grid {
            grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
        }
    }

    @media (max-width: 768px) {
        .stats-row {
            grid-template-columns: repeat(2, 1fr);
        }

        .reservations-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 640px) {
        .dashboard {
            padding: 1rem;
        }

        .dashboard-title {
            font-size: 1.5rem;
        }

        .stats-row {
            grid-template-columns: 1fr;
        }

        .empty-state {
            padding: 2rem 1rem;
        }
    }

    /* Glassmorphism effect for status badges */
    .status-badge-glass {
        background: rgba(255, 255, 255, 0.25);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    }

    /* SweetAlert Custom Styling */
    .swal2-popup {
        border-radius: var(--radius-lg) !important;
        padding: 2rem !important;
    }

    .swal2-title {
        font-size: 1.5rem !important;
        font-weight: 600 !important;
        color: var(--neutral-800) !important;
    }

    .swal2-html-container {
        font-size: 1rem !important;
        color: var(--neutral-600) !important;
    }

    .swal2-confirm {
        background-color: var(--primary-600) !important;
        border-radius: var(--radius-md) !important;
        font-weight: 500 !important;
        padding: 0.75rem 1.5rem !important;
    }

    .swal2-cancel {
        background-color: white !important;
        color: var(--neutral-700) !important;
        border: 1px solid var(--neutral-300) !important;
        border-radius: var(--radius-md) !important;
        font-weight: 500 !important;
        padding: 0.75rem 1.5rem !important;
    }
</style>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<!-- Inter Font -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<div class="dashboard">
    <div class="dashboard-header">
        <div class="dashboard-title-wrapper">
            <div class="dashboard-icon">
                <i class="fas fa-ticket-alt"></i>
            </div>
            <h1 class="dashboard-title">My Reservations</h1>
        </div>
        <p class="dashboard-subtitle">Manage your travel bookings, view details, and make changes to your upcoming trips.</p>
    </div>

    <!-- Stats Cards -->
    <div class="stats-row">
        @php
            $totalReservations = 0;
            $confirmedReservations = 0;
            $pendingReservations = 0;
            $totalSpent = 0;

            foreach ($reservations as $res) {
                if ($res->user_id == Auth::id()) {
                    $totalReservations++;
                    if ($res->status == 'confirmed') $confirmedReservations++;
                    if ($res->status == 'pending') $pendingReservations++;
                    $totalSpent += $res->prix_total;
                }
            }
        @endphp

        <div class="stat-card">
            <div class="stat-icon primary">
                <i class="fas fa-calendar-check"></i>
            </div>
            <div class="stat-content">
                <div class="stat-label">Total Reservations</div>
                <div class="stat-value">{{ $totalReservations }}</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon success">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-content">
                <div class="stat-label">Confirmed</div>
                <div class="stat-value">{{ $confirmedReservations }}</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon warning">
                <i class="fas fa-clock"></i>
            </div>
            <div class="stat-content">
                <div class="stat-label">Pending</div>
                <div class="stat-value">{{ $pendingReservations }}</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon danger">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="stat-content">
                <div class="stat-label">Total Spent</div>
                <div class="stat-value">${{ number_format($totalSpent, 2) }}</div>
            </div>
        </div>
    </div>

    @if (session('success'))
    <script>
        Swal.fire({
            title: 'Success!',
            text: "{{ session('success') }}",
            icon: 'success',
            iconColor: 'var(--success)',
            confirmButtonText: 'Great!',
            confirmButtonColor: 'var(--primary-600)'
        });
    </script>
    @endif

    <div class="reservations-container">
        <div class="section-header">
            <h2 class="section-title">Your Travel Bookings</h2>
            <a href="{{ route('our-fleet') }}" class="section-action">
                Book New Trip <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        @php $hasReservations = false; @endphp

        <div class="reservations-grid">
            @foreach ($reservations as $reservation)
                @if ($reservation->user_id == Auth::id())
                    @php $hasReservations = true; @endphp
                    <div class="reservation-card">
                        <div class="card-header">
                            <img src="{{ asset('storage/' . $reservation->voiture->image) }}" alt="{{ $reservation->voiture->modele }}">
                            <div class="card-status
                                @if($reservation->status == 'confirmed') status-confirmed
                                @elseif($reservation->status == 'pending') status-pending
                                @elseif($reservation->status == 'cancelled') status-cancelled
                                @endif">
                                {{ $reservation->status }}
                            </div>
                            <div class="card-journey">
                                <div class="journey-name">{{ $reservation->trajet->name }}</div>
                                <div class="journey-route">
                                    @php
                                        // Assuming trajet->name might contain origin-destination info like "Paris - London"
                                        $routeParts = explode(' - ', $reservation->trajet->name);
                                        $origin = isset($routeParts[0]) ? $routeParts[0] : '';
                                        $destination = isset($routeParts[1]) ? $routeParts[1] : '';
                                    @endphp
                                    <span>{{ $origin }}</span>
                                    <i class="fas fa-arrow-right"></i>
                                    <span>{{ $destination }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="vehicle-info">
                                <div class="vehicle-icon">
                                    <i class="fas fa-car"></i>
                                </div>
                                <div class="vehicle-name">{{ $reservation->voiture->modele }}</div>
                            </div>

                            <div class="reservation-details">
                                <div class="detail-item">
                                    <div class="detail-label">Pick-up Date</div>
                                    <div class="detail-value">
                                        <i class="far fa-calendar-alt"></i>
                                        {{ \Carbon\Carbon::parse($reservation->date_reservation)->format('M d, Y') }}
                                    </div>
                                </div>

                                <div class="detail-item">
                                    <div class="detail-label">Pick-up Time</div>
                                    <div class="detail-value">
                                        <i class="far fa-clock"></i>
                                        {{ \Carbon\Carbon::parse($reservation->time_reservation)->format('h:i A') }}
                                    </div>
                                </div>

                                <div class="detail-item">
                                    <div class="detail-label">Trip Type</div>
                                    <div class="detail-value">
                                        <i class="fas fa-exchange-alt"></i>
                                        {{ $reservation->type_trajet === 'round_trip' ? 'Round Trip' : 'One Way' }}
                                    </div>
                                </div>

                                <div class="detail-item">
                                    <div class="detail-label">Passengers</div>
                                    <div class="detail-value">
                                        <i class="fas fa-users"></i>
                                        {{ $reservation->nombre_personnes }} {{ $reservation->nombre_personnes > 1 ? 'people' : 'person' }}
                                    </div>
                                </div>

                                <div class="detail-item">
                                    <div class="detail-label">Contact</div>
                                    <div class="detail-value">
                                        <i class="fas fa-phone"></i>
                                        {{ $reservation->user->telephone }}
                                    </div>
                                </div>

                                <div class="detail-item">
                                    <div class="detail-label">Booking ID</div>
                                    <div class="detail-value">
                                        <i class="fas fa-hashtag"></i>
                                        #{{ str_pad($reservation->id, 5, '0', STR_PAD_LEFT) }}
                                    </div>
                                </div>
                            </div>

                            <div class="price-section">
                                <div class="price-label">Total Price</div>
                                <div class="price-value">${{ number_format($reservation->prix_total, 2) }}</div>
                            </div>

                            <div class="card-actions">
                                <a href="{{ route('client.reservations.edit', $reservation->id) }}" class="btn btn-primary">
                                    <i class="fas fa-pen"></i> Edit
                                </a>
                                <button class="btn btn-danger" onclick="confirmDelete('{{ route('client.reservations.destroy', $reservation->id) }}')">
                                    <i class="fas fa-trash"></i> Cancel
                                </button>
                            </div>
                        </div>
                    </div>

                @endif
            @endforeach

            @if (!$hasReservations)
                <div class="empty-state">
                    <div class="empty-state-icon">
                        <i class="fas fa-ticket-alt"></i>
                    </div>
                    <h3 class="empty-state-title">No Reservations Found</h3>
                    <p class="empty-state-description">You haven't made any travel reservations yet. Start planning your next trip today!</p>
                    <a href="" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Book New Trip
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

<script>
    function confirmDelete(deleteUrl) {
        Swal.fire({
            title: 'Cancel this reservation?',
            text: 'This action cannot be undone and may be subject to cancellation fees.',
            icon: 'warning',
            iconColor: 'var(--danger)',
            showCancelButton: true,
            confirmButtonText: 'Yes, cancel it',
            cancelButtonText: 'Keep reservation',
            confirmButtonColor: 'var(--danger)',
            cancelButtonColor: 'var(--neutral-500)',
            customClass: {
                confirmButton: 'swal-confirm-btn',
                cancelButton: 'swal-cancel-btn'
            },
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
@endsection