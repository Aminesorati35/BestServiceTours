@extends('Users.base')
@section('title')
    Admin Dahsboard
@endsection
@section('content')
    <style>
        .dashboard-section {
            display: flex;
            min-height: 80vh;
        }

        .dashboard-section .mainDashboardContent {
            width: 90%;
            height: 100%;
            display: flex;
            flex-direction: column;
            margin: 30px auto;
            background: #fff;
            padding: 30px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.05);
            border-radius: 16px;
        }

        .dashboard-section h2 {
            color: #DD9323;
            font-size: 32px;
            margin-bottom: 30px;
            text-transform: uppercase;
            font-weight: 700;
            position: relative;
            padding-bottom: 10px;
        }

        .dashboard-section h2:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 4px;
            background-color: #DD9323;
            border-radius: 2px;
        }

        .sidebar {
            width: 220px;
            background: #1C1C1C;
            padding: 25px 15px;
            color: white;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            font-size: 1.1rem;
            padding: 12px 15px;
            border-radius: 8px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #DD9323;
            transform: translateX(5px);
        }

        .dashboard-content {
            flex: 1;
            padding: 20px;
        }

        .dashboardCards {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
        }

        .dashboardCard {
            background-color: #ffffff;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
            padding: 24px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-left: 5px solid #DD9323;
        }

        .dashboardCard:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
        }

        .card-content {
            display: flex;
            flex-direction: column;
        }

        .dashboardCard h1 {
            font-size: 40px;
            font-weight: 700;
            color: #333;
            margin: 0 0 8px 0;
        }

        .dashboardCard p {
            font-size: 16px;
            color: #777;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }

        .dashboardCard img {
            width: 65px;
            height: 65px;
            object-fit: contain;
            padding: 10px;
            background-color: rgba(221, 147, 35, 0.1);
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .dashboardCard:hover img {
            transform: scale(1.1);
        }

        /* Color variations for different cards */
        .dashboardCard:nth-child(2) {
            border-left-color: #4CAF50;
        }
        .dashboardCard:nth-child(2) img {
            background-color: rgba(76, 175, 80, 0.1);
        }

        .dashboardCard:nth-child(3) {
            border-left-color: #2196F3;
        }
        .dashboardCard:nth-child(3) img {
            background-color: rgba(33, 150, 243, 0.1);
        }

        .dashboardCard:nth-child(4) {
            border-left-color: #9C27B0;
        }
        .dashboardCard:nth-child(4) img {
            background-color: rgba(156, 39, 176, 0.1);
        }

        .dashboardCard:nth-child(5) {
            border-left-color: #FF5722;
        }
        .dashboardCard:nth-child(5) img {
            background-color: rgba(255, 87, 34, 0.1);
        }

        .dashboardCard:nth-child(6) {
            border-left-color: #00BCD4;
        }
        .dashboardCard:nth-child(6) img {
            background-color: rgba(0, 188, 212, 0.1);
        }

        .dashboardCard:nth-child(7) {
            border-left-color: #F44336;
        }
        .dashboardCard:nth-child(7) img {
            background-color: rgba(244, 67, 54, 0.1);
        }

        @media (max-width: 1200px) {
            .dashboardCards {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .dashboard-section {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                flex-direction: row;
                overflow-x: auto;
                padding: 15px;
            }

            .dashboardCards {
                grid-template-columns: 1fr;
            }

            .dashboardCard {
                width: 100%;
            }
        }
    </style>

    <div class="dashboard-section">
        <div class="sidebar">
            <a href="{{ route('admin.dashboard') }}"
                class="{{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
            <a href="{{ route('admin.users.index') }}" class="{{ Request::routeIs('admin.users.index') ? 'active' : '' }}">Users</a>
            <a href="{{ route('admin.voitures.index') }}"
                class="{{ Request::routeIs('admin.voitures.index') ? 'active' : '' }}">Fleet</a>
            <a href="{{ route('admin.trajets.index') }}"
                class="{{ Request::routeIs('admin.trajets.index') ? 'active' : '' }}">Trips</a>
                <a href="{{ route('admin.reservations.index') }}"
                class="{{ Request::routeIs('admin.reservations.index') ? 'active' : '' }}">Reservation</a>
        </div>

        <div class="dashboard-content">
            @if (Request::routeIs('admin.dashboard'))
                <div class="mainDashboardContent">
                    <h2>Admin Dashboard</h2>
                    <div class="dashboardCards">
                        @if(auth()->user()->role==='superAdmin')
                        <div class="dashboardCard">
                            <div class="card-content">
                                <h1>{{ $TotalAdmins }}</h1>
                                <p>Total Admins</p>
                            </div>
                            <img src="/images/admin.png" alt="Admin icon">
                        </div>
                        @endif
                        <div class="dashboardCard">
                            <div class="card-content">
                                <h1>{{ $TotalUsers }}</h1>
                                <p>Total Users</p>
                            </div>
                            <img src="/images/user.png" alt="User icon">
                        </div>

                        <div class="dashboardCard">
                            <div class="card-content">
                                <h1>{{ $TotalReservation }}</h1>
                                <p>Total Reservation</p>
                            </div>
                            <img src="/images/reservation.png" alt="Reservation icon">
                        </div>
                        <div class="dashboardCard">
                            <div class="card-content">
                                <h1>{{ $TotalTrajets }}</h1>
                                <p>Total Trips</p>
                            </div>
                            <img src="/images/trajet.png" alt="Trajet icon">
                        </div>
                        <div class="dashboardCard">
                            <div class="card-content">
                                <h1>{{ $TotalFleets }}</h1>
                                <p>Total Fleets</p>
                            </div>
                            <img src="/images/fleet.png" alt="Fleet icon">
                        </div>
                        <div class="dashboardCard">
                            <div class="card-content">
                                <h1>{{ $NombreFleetAvailable }}</h1>
                                <p>Available Fleet</p>
                            </div>
                            <img src="/images/fleetAvailable.png" alt="Available Fleet icon">
                        </div>
                        <div class="dashboardCard">
                            <div class="card-content">
                                <h1>{{ $NombreFleetUnavailable }}</h1>
                                <p>Unavailable Fleet</p>
                            </div>
                            <img src="/images/fleetUnavailable.png" alt="Unavailable Fleet icon">
                        </div>
                    </div>
                </div>
            @else
                @yield('dashboard-content')
            @endif
        </div>
    </div>
@endsection
