@section('title')
    Home
@endsection
@extends('Users.base')

@section('content')
    <style>
        /* Hero Section */
        .hero-section {
            padding: 60px 40px;
            display: flex;
            background-color: white;
            justify-content: center;
            gap: 40px;
            margin-top: 40px;
            max-width: 1400px;
            margin: 40px auto 0;
        }

        .hero-left {
            display: flex;
            flex-direction: column;
            width: 50%;
        }

        .hero-right {
            background-color: white;
            width: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-right img {
            width: 100%;
            scale: 1.5;
            max-width: 500px;
            height: auto;
            object-fit: contain;
        }

        .hero-title {
            font-size: 60px;
            font-weight: 900;
            line-height: 1.2;
            margin-bottom: 30px;
        }

        .accent-color {
            color: #dd9323;
        }

        .info-block {
            margin-bottom: 25px;
        }

        .info-block h3 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 10px;
            color: #222;
        }

        .info-block p {
            font-size: 18px;
            line-height: 1.6;
            color: #555;
            max-width: 90%;
        }

        .cta-buttons {
            display: flex;
            gap: 20px;
            margin-top: 30px;
        }

        .btn-primary {
            background-color: #dd9323;
            padding: 16px 32px;
            border-radius: 8px;
            color: white;
            font-weight: 600;
            font-size: 16px;
            text-decoration: none;
            text-align: center;
            transition: all 0.3s ease;
            display: inline-block;
            min-width: 180px;
        }

        .btn-secondary {
            background-color: #1C1C1C;
            padding: 16px 32px;
            border-radius: 8px;
            color: white;
            font-weight: 600;
            font-size: 16px;
            text-decoration: none;
            text-align: center;
            transition: all 0.3s ease;
            display: inline-block;
            min-width: 180px;
        }

        .btn-primary:hover {
            background-color: #c17d0e;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(221, 147, 35, 0.4);
        }

        .btn-secondary:hover {
            background-color: #333;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        /* Booking Form Section */
        .booking-section {
            display: flex;
            justify-content: center;
            padding: 60px 20px;
            background-color: #f8f8f8;
        }

        .booking-form {
            display: flex;
            flex-direction: column;
            padding: 40px;
            width: 90%;
            max-width: 1000px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-radius: 16px;
            background: white;
        }

        .form-title {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-title h3 {
            font-weight: 800;
            font-size: 28px;
            text-transform: uppercase;
            color: #333;
            position: relative;
            display: inline-block;
            padding-bottom: 10px;
        }

        .form-title h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background-color: #dd9323;
        }

        .form-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            margin-top: 20px;
        }

        .form-column {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .booking-form label {
            font-weight: 600;
            font-size: 15px;
            color: #444;
        }

        .booking-form input{
            width: 93%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 15px;
            transition: border-color 0.3s ease;
        }
        .booking-form select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 15px;
            transition: border-color 0.3s ease;
        }

        .booking-form input:focus,
        .booking-form select:focus {
            border-color: #dd9323;
            outline: none;
        }

        .error-message {
            color: #e74c3c;
            font-size: 13px;
            margin-top: 4px;
        }

        .submit-btn {
            background-color: #dd9323;
            color: white;
            font-size: 16px;
            font-weight: 700;
            width: 100%;
            padding: 14px;
            cursor: pointer;
            border: none;
            border-radius: 8px;
            text-align: center;
            transition: all 0.3s ease;
            margin-top: 30px;
        }

        .submit-btn:hover {
            background-color: #c17d0e;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(221, 147, 35, 0.4);
        }

        /* Section Divider */
        .section-divider {
            margin: 0;
            width: 100%;
            background-color: #1C1C1C;
            color: #dd9323;
            padding: 30px 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .section-divider h2 {
            font-size: 32px;
            font-weight: 700;
            text-align: center;
            margin: 0;
        }

        /* Features Section */
        .features-section {
            max-width: 1400px;
            margin: 80px auto;
            padding: 0 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-title h2 {
            font-size: 42px;
            font-weight: 800;
            color: #222;
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
            padding-bottom: 15px;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background-color: #dd9323;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 50px;
            width: 100%;
        }

        .feature-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 30px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-10px);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            margin-bottom: 20px;
        }

        .feature-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 15px;
            color: #333;
        }

        .feature-description {
            color: #666;
            line-height: 1.7;
            font-size: 16px;
        }

        /* Fleet Section */
        .fleet-section {
            margin: 80px auto;
            padding: 0 20px;
            width: 80%;
        }

        .fleet-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .fleet-header p {
            font-size: 18px;
            line-height: 1.7;
            color: #555;
            max-width: 900px;
            margin: 0 auto;
        }

        .fleet-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 40px;
            width: 100%;
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
            height: 100%;
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
            flex-grow: 1;
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
            width: 24px;
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
            margin-top: auto;
        }

        .view-button:hover {
            background-color: #c17d0e;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(221, 147, 35, 0.4);
        }

        /* About Section */
        .about-section {
            max-width: 1200px;
            margin: 80px auto;
            padding: 0 30px;
        }

        .about-content {
            background-color: #fff;
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            line-height: 1.8;
            font-size: 18px;
            color: #444;
            text-align: center;
        }

        /* Why Choose Us Section */
        .why-us-section {
            max-width: 1400px;
            margin: 80px auto;
            padding: 0 20px;
            display: flex;
            gap: 60px;
        }

        .why-us-left {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .why-us-title {
            font-size: 36px;
            font-weight: 800;
            line-height: 1.3;
            margin-bottom: 20px;
            color: #222;
        }

        .why-us-description {
            color: #666;
            font-size: 18px;
            line-height: 1.7;
        }

        .why-us-right {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .benefit-card {
            display: flex;
            gap: 20px;
            background-color: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }

        .benefit-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .benefit-icon {
            width: 60px;
            height: 60px;
            object-fit: contain;
        }

        .benefit-content h3 {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 10px;
            color: #333;
        }

        .benefit-content p {
            color: #666;
            font-size: 16px;
            line-height: 1.6;
        }

        /* Responsive Adjustments */
        @media (max-width: 1200px) {
            .hero-title {
                font-size: 48px;
            }

            .info-block h3 {
                font-size: 28px;
            }

            .why-us-title {
                font-size: 32px;
            }
        }

        @media (max-width: 992px) {
            .hero-section {
                flex-direction: column;
                padding: 40px 20px;
            }

            .hero-left, .hero-right {
                width: 100%;
            }

            .hero-right {
                order: -1;
                margin-bottom: 30px;
            }

            .cta-buttons {
                flex-direction: column;
                align-items: center;
                gap: 15px;
            }

            .btn-primary, .btn-secondary {
                width: 100%;
                max-width: 300px;
            }

            .form-layout {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            .why-us-section {
                flex-direction: column;
                gap: 40px;
            }
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 40px;
                text-align: center;
            }

            .info-block {
                text-align: center;
            }

            .info-block p {
                max-width: 100%;
            }

            .fleet-grid {
                grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            }

            .benefit-card {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .section-title h2 {
                font-size: 36px;
            }
            .hero-right img{
                    scale: 1;
            }
        }

        @media (max-width: 576px) {
            .hero-title {
                font-size: 32px;
            }

            .info-block h3 {
                font-size: 24px;
            }

            .section-title h2 {
                font-size: 30px;
            }

            .section-divider h2 {
                font-size: 28px;
            }

            .fleet-grid {
                grid-template-columns: 1fr;
            }

            .booking-form {
                padding: 30px 20px;
            }

            .about-content {
                padding: 30px 20px;
                font-size: 16px;
            }
        }
    </style>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-left">
            <h1 class="hero-title"><span class="accent-color">Best</span> Service <span class="accent-color">Tours</span></h1>

            <div class="info-block">
                <h3>Reliable Drivers</h3>
                <p>Choose from our <span class="accent-color">fleet</span> of high-spec vehicles for your next trip to the airport, wedding, or weekend getaway.</p>
            </div>

            <div class="info-block">
                <h3>Travel In Luxury</h3>
                <p>Expect only the best from our wide array of professionally trained <span class="accent-color">drivers</span> who will get you there on time, every time!</p>
            </div>

            <div class="cta-buttons">
                <a href="{{route('our-fleet')}}" class="btn-primary">View Our Fleet</a>
                <a href="{{ route('about') }}" class="btn-secondary">Learn More</a>
            </div>
        </div>

        <div class="hero-right">
            <img src="/images/sprinter.png" alt="Luxury Vehicle">
        </div>
    </section>

    <!-- Booking Form Section -->
    <section class="booking-section">
        <form action="{{ route('client.reservations.store') }}" method="POST" class="booking-form">
            @csrf
            <div class="form-title">
                <h3>Book a Car</h3>
            </div>

            <div class="form-layout">
                <div class="form-column">
                    <div class="form-group">
                        <label for="trajet_id">Trip</label>
                        <select name="trajet_id" id="trajet_id">
                            @foreach ($trajets as $trajet)
                                <option value="{{ $trajet->id }}" {{ $trajet->id==old('trajet_id') ? 'selected' : "" }}>{{ $trajet->name }}</option>
                            @endforeach
                        </select>
                        @error('trajet_id')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="voiture_id">Choose Car</label>
                        <select name="voiture_id" id="voiture_id">
                            @foreach ($selectVoiture as $voiture)
                                <option value="{{ $voiture->id }}" {{ $voiture->id==old('voiture_id')? "selected" : "" }}>{{ $voiture->modele }}</option>
                            @endforeach
                        </select>
                        @error('voiture_id')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="date_reservation">Pick Up Date</label>
                        <input type="date" id="date_reservation" name="date_reservation" value="{{ old('date_reservation') }}">
                        @error('date_reservation')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="time_reservation">Pick Up Time</label>
                        <input type="time" id="time_reservation" name="time_reservation" value="{{ old('time_reservation') }}">
                        @error('time_reservation')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-column">
                    <div class="form-group">
                        <label for="type_trajet">Return</label>
                        <select name="type_trajet" id="type_trajet">
                            <option value="round_trip">Round Trip</option>
                            <option value="one_way">One Way</option>
                        </select>
                        @error('type_trajet')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nombre_personnes">Number of People</label>
                        <input type="number" id="nombre_personnes" name="nombre_personnes" placeholder="Number of people" value="{{ old('nombre_personnes') }}">
                        @error('nombre_personnes')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nombre_bags">Number of Bags</label>
                        <input type="number" id="nombre_bags" name="nombre_bags" placeholder="Number of bags" value="{{ old('nombre_bags') }}">
                        @error('nombre_bags')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="submit-btn">Reserve Now</button>
                    </div>
                </div>
            </div>
        </form>
    </section>

    <!-- Section Divider -->
    <div class="section-divider">
        <h2>Plan Your Trip Now</h2>
    </div>

    <!-- Features Section -->
    <section class="features-section">
        <div class="section-title">
            <h2>Quick & Easy Car Rental</h2>
        </div>

        <div class="features-grid">
            <div class="feature-card">
                <img src="/images/info.png" alt="Online Booking" class="feature-icon">
                <h3 class="feature-title">Easy Online Booking</h3>
                <p class="feature-description">
                    Booking with Best Service Tours is a breeze! Our user-friendly website makes it easy to reserve your private group transfer to/from Marrakech airport. Accessible 24/7 from any device, you'll receive an instant confirmation for a stress-free booking experience.
                </p>
            </div>

            <div class="feature-card">
                <img src="/images/info.png" alt="Professional Drivers" class="feature-icon">
                <h3 class="feature-title">Professional Drivers</h3>
                <p class="feature-description">
                    At Best Service Tours, we only employ experienced, licensed, and insured drivers to ensure your safety, comfort, and satisfaction. Our drivers go above and beyond to meet your needs, making your transfer experience in Marrakech seamless and stress-free.
                </p>
            </div>

            <div class="feature-card">
                <img src="/images/info.png" alt="Fleet of Vehicles" class="feature-icon">
                <h3 class="feature-title">Big Fleet Of Vehicles</h3>
                <p class="feature-description">
                    At Best Service Tours, we have a large fleet of modern and comfortable vehicles to accommodate your private group transfer needs in Marrakech. From sedans to minibusses, we have vehicles of various sizes equipped with the latest technology and amenities.
                </p>
            </div>

            <div class="feature-card">
                <img src="/images/info.png" alt="Online Payment" class="feature-icon">
                <h3 class="feature-title">Online Payment</h3>
                <p class="feature-description">
                    Booking your transfer with Best Service Tours is hassle-free, thanks to our secure and convenient online payment options. Easily pay for your transfer in advance with major credit cards or PayPal and other secure payment methods.
                </p>
            </div>
        </div>
    </section>

    <!-- Section Divider -->
    <div class="section-divider">
        <h2>Our Fleet</h2>
    </div>

    <!-- Fleet Section -->
    <section class="fleet-section">
        <div class="fleet-header">
            <p>
                At Best Service Tours, we have a large fleet of modern vehicles to meet your private group transfer needs in Marrakech.
                Our vehicles are well-maintained, spacious, and comfortable, ensuring a smooth and relaxing ride to and from the airport.
                From sedans to vans and minibusses, we have a wide range of vehicles to accommodate groups of all sizes.
            </p>
        </div>

        <div class="fleet-grid">
            @foreach ($voitures as $voiture)
            <div class="car-card">
                <div class="image-container">
                    @if ($voiture->image)
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
    </section>

    <!-- Section Divider -->
    <div class="section-divider">
        <h2>About Us</h2>
    </div>

    <!-- About Section -->
    <section class="about-section">
        <div class="about-content">
            At Best Service Tours, we are passionate about providing our clients with the best airport transfer experience in Marrakech.
            We understand that travel can be stressful, which is why we go above and beyond to ensure your transfer is smooth, comfortable, and hassle-free.
            With our modern fleet of vehicles, experienced drivers, and easy online booking and payment options, we are committed to delivering the highest level of service to our clients.
            Whether you're traveling for business or leisure, you can trust Best Service Tours to provide you with a transfer experience that exceeds your expectations.
            Book your transfer now and experience the difference for yourself!
        </div>
    </section>

    <!-- Section Divider -->
    <div class="section-divider">
        <h2>Why Choose Us</h2>
    </div>

    <!-- Why Choose Us Section -->
    <section class="why-us-section">
        <div class="why-us-left">
            <h2 class="why-us-title">Best Valued Deals You Will Ever Find</h2>
            <p class="why-us-description">
                Discover the best deals you'll ever find with our unbeatable offers.
                We're dedicated to providing you with the best value for your money,
                so you can enjoy top-quality services and products without breaking the bank.
                Our deals are designed to give you the ultimate renting experience,
                so don't miss out on your chance to save big.
            </p>
        </div>

        <div class="why-us-right">
            <div class="benefit-card">
                <img src="/images/icon1.png" alt="Cross Country Drive" class="benefit-icon">
                <div class="benefit-content">
                    <h3>Cross Country Drive</h3>
                    <p>Take your driving experience to the next level with our top-notch vehicles for your cross-country adventures.</p>
                </div>
            </div>

            <div class="benefit-card">
                <img src="/images/icon2.png" alt="All Inclusive Pricing" class="benefit-icon">
                <div class="benefit-content">
                    <h3>All Inclusive Pricing</h3>
                    <p>Get everything you need in one convenient, transparent price with our all-inclusive pricing policy.</p>
                </div>
            </div>

            <div class="benefit-card">
                <img src="/images/icon3.png" alt="No Hidden Charges" class="benefit-icon">
                <div class="benefit-content">
                    <h3>No Hidden Charges</h3>
                    <p>Enjoy peace of mind with our no hidden charges policy. We believe in transparent and honest pricing.</p>
                </div>
            </div>
        </div>
    </section>
@endsection