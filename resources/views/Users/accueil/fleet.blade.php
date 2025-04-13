@section('title')
    Our Fleet
@endsection
@extends('Users.base')
@section('content')
    <style>
    .fleet-section {
        margin: 60px auto;
        display: flex;
        flex-direction: column;
        width: 100%;
        max-width: 1400px;
        align-items: center;
    }

    .fleet-header {
        align-self: flex-start;
        margin-left: 50px;
        margin-bottom: 30px;
        position: relative;
    }

    .fleet-header h1 {
        font-weight: 900;
        font-size: 50px;
        margin-bottom: 8px;
        color: #222;
        position: relative;
    }

    .fleet-header h1::after {
        content: '';
        position: absolute;
        bottom: -12px;
        left: 0;
        width: 80px;
        height: 4px;
        background-color: #dd9323;
    }

    .fleet-header h5 {
        font-weight: 500;
        font-size: 18px;
        color: #777;
        margin-top: 20px;
    }

    .fleet-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 40px;
        width: 90%;
        max-width: 1400px;
        padding: 20px 0;
    }

    .car-card {
        background-color: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        display: flex;
        flex-direction: column;
        transition: all 0.3s ease;
        position: relative;
        border: none;
    }

    .car-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }

    .image-container {
        width: 100%;
        height: 200px;
        overflow: hidden;
        position: relative;
        background-color: #f8f8f8;
    }

    .car-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .car-card:hover .car-img {
        transform: scale(1.05);
    }

    .price-tag {
        position: absolute;
        top: 15px;
        right: 15px;
        border-radius: 30px;
        background-color: #dd9323;
        text-align: center;
        padding: 8px 15px;
        color: white;
        font-weight: 600;
        font-size: 15px;
        box-shadow: 0 4px 10px rgba(221, 147, 35, 0.3);
    }

    .car-details {
        padding: 25px;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .car-model {
        font-weight: 700;
        font-size: 22px;
        color: #333;
        margin: 0;
    }

    .features-list {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .feature-item {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 15px;
        color: #555;
    }

    .feature-item img {
        width: 24px; /* Keeping your original icon size */
    }

    .view-button {
        background-color: #dd9323;
        border: none;
        height: 46px;
        width: 100%;
        color: white;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        border-radius: 8px;
        transition: all 0.3s ease;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
        text-decoration: none;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .view-button:hover {
        background-color: #c17d0e;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(221, 147, 35, 0.4);
    }

    /* Responsive adjustments */
    @media (max-width: 1200px) {
        .fleet-header {
            margin-left: 30px;
        }

        .fleet-grid {
            width: 90%;
            gap: 30px;
        }
    }

    @media (max-width: 900px) {
        .fleet-header {
            margin-left: 20px;
            align-self: center;
            text-align: center;
        }

        .fleet-header h1::after {
            left: 50%;
            transform: translateX(-50%);
        }

        .fleet-grid {
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 25px;
            width: 90%;
        }

        .image-container {
            height: 180px;
        }
    }

    @media (max-width: 600px) {
        .fleet-header h1 {
            font-size: 36px;
        }

        .fleet-header h5 {
            font-size: 16px;
        }

        .fleet-grid {
            grid-template-columns: 1fr;
            width: 85%;
            gap: 30px;
        }

        .image-container {
            height: 200px;
        }
    }
    </style>

    <div class="fleet-section">
        <div class="fleet-header">
            <h1>Our Fleet</h1>
            <h5>Home / Our Fleet</h5>
        </div>

        <div class="fleet-grid">
            @foreach ($voitures as $voiture)
            <div class="car-card">
                <div class="image-container">
                    @if($voiture->image)
                    <img class="car-img" src="{{ asset('storage/' . $voiture->image) }}" alt="{{ $voiture->modele }}">
                    @else
                    <img class="car-img" src="/images/sprinter.png" alt="Default vehicle">
                    @endif
                    <div class="price-tag">From ${{ $voiture->prix }}</div>
                </div>

                <div class="car-details">
                    <h2 class="car-model">{{ $voiture->modele }}</h2>
                    <ul class="features-list">
                        <li class="feature-item">
                            <img src="/images/done.png" alt="">
                            <span>{{ $voiture->nombre_places }} Passengers</span>
                        </li>
                        <li class="feature-item">
                            <img src="/images/done.png" alt="">
                            <span>{{ $voiture->nombre_bags }} Bags</span>
                        </li>
                    </ul>
                    <a href="{{ route('fleet.show', $voiture->id) }}" class="view-button">View Details</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection