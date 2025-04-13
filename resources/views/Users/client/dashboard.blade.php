@extends('Users.base')
@section('title')
    Gerer Reservation
@endsection
@section('content')
    <style>
        .dashboard-section {
            display: flex;





        }

        .dashboard-section .mainDashboardContent {
            width: 95%;
            max-width: 1400px;
            padding: 30px;
            display: flex;
            justify-content: flex-start;
            flex-direction: column;
            margin: 30px auto;
            background: #fff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;

        }

        .dashboard-section h2 {
            color: #DD9323;
            font-size: 45px;
            margin-bottom: 20px;
            text-transform: uppercase;
            font-weight: 900;
        }


        .sidebar {
            width: 200px;
            background: #1C1C1C;
            padding: 20px;
            color: white;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            font-size: 1.2rem;
            padding: 10px;
            border-radius: 5px;
            transition: 0.3s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #DD9323;
        }


        .dashboard-content {
            flex: 1;

        }
    </style>

    <div class="dashboard-section">
        <div class="sidebar">
            <a href="{{ route('client.reservations.index') }}"
                class="{{ Request::routeIs('client.reservations.index') ? 'active' : '' }}">Reservation</a>

        </div>

            <div class="dashboard-content">
                @yield('dashboard-content')
            </div>





    </div>
@endsection
