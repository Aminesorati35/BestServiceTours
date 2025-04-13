@section('title')
    About Us
@endsection
@extends('Users.base')

@section('content')
    <style>
        /* About Us Page Styles */
        .about-hero {
            padding: 80px 40px;
            background-color: #f8f8f8;
            text-align: center;
            margin-top: 40px;
        }

        .about-hero h1 {
            font-size: 48px;
            font-weight: 900;
            color: #222;
            margin-bottom: 20px;
            position: relative;
            display: inline-block;
            padding-bottom: 15px;
        }

        .about-hero h1::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background-color: #dd9323;
        }

        .about-hero p {
            font-size: 18px;
            line-height: 1.7;
            color: #555;
            max-width: 800px;
            margin: 0 auto;
        }

        .accent-color {
            color: #dd9323;
        }

        .about-section {
            max-width: 1200px;
            margin: 80px auto;
            padding: 0 30px;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-title h2 {
            font-size: 36px;
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
            width: 60px;
            height: 3px;
            background-color: #dd9323;
        }

        .section-title p {
            font-size: 18px;
            color: #666;
            max-width: 700px;
            margin: 0 auto;
        }

        /* Our Story Section */
        .our-story {
            display: flex;
            gap: 60px;
            margin-bottom: 80px;
            align-items: center;
        }

        .story-content {
            flex: 1;
        }

        .story-image {
            flex: 1;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .story-image img {
            width: 100%;
            height: auto;
            display: block;
        }

        .story-content h3 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #333;
        }

        .story-content p {
            font-size: 17px;
            line-height: 1.8;
            color: #555;
            margin-bottom: 20px;
        }

        /* Mission & Values Section */
        .mission-values {
            background-color: #f8f8f8;
            padding: 80px 30px;
            margin: 80px 0;
        }

        .mission-values-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .values-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin-top: 50px;
        }

        .value-card {
            background-color: #fff;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            text-align: center;
            transition: transform 0.3s ease;
        }

        .value-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .value-icon {
            width: 70px;
            height: 70px;
            margin: 0 auto 20px;
        }

        .value-title {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 15px;
            color: #333;
        }

        .value-description {
            font-size: 16px;
            line-height: 1.7;
            color: #666;
        }

        /* Team Section */
        .team-section {
            max-width: 1200px;
            margin: 80px auto;
            padding: 0 30px;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 40px;
        }

        .team-member {
            background-color: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease;
        }

        .team-member:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .member-image {
            width: 100%;
            height: 320px;
            overflow: hidden;
        }

        .member-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .team-member:hover .member-image img {
            transform: scale(1.05);
        }

        .member-info {
            padding: 25px;
            text-align: center;
        }

        .member-name {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 10px;
            color: #333;
        }

        .member-position {
            font-size: 16px;
            color: #dd9323;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .member-bio {
            font-size: 15px;
            line-height: 1.7;
            color: #666;
        }

        /* Services Section */
        .services-section {
            background-color: #f8f8f8;
            padding: 80px 30px;
        }

        .services-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 40px;
            margin-top: 50px;
        }

        .service-card {
            background-color: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .service-image {
            width: 100%;
            height: 220px;
            overflow: hidden;
        }

        .service-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .service-card:hover .service-image img {
            transform: scale(1.05);
        }

        .service-content {
            padding: 30px;
        }

        .service-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 15px;
            color: #333;
        }

        .service-description {
            font-size: 16px;
            line-height: 1.7;
            color: #666;
            margin-bottom: 20px;
        }


        /* Stats Section */
        .stats-section {
            padding: 80px 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
            margin-top: 50px;
        }

        .stat-card {
            background-color: #fff;
            padding: 40px 20px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            text-align: center;
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .stat-number {
            font-size: 46px;
            font-weight: 800;
            color: #dd9323;
            margin-bottom: 10px;
        }

        .stat-title {
            font-size: 18px;
            font-weight: 600;
            color: #333;
        }

        /* CTA Section */
        .cta-section {
            background-color: #1C1C1C;
            padding: 80px 30px;
            text-align: center;
            color: white;
        }

        .cta-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .cta-title {
            font-size: 36px;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .cta-description {
            font-size: 18px;
            line-height: 1.7;
            color: #ccc;
            margin-bottom: 40px;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .cta-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
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
            background-color: transparent;
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
            border: 2px solid white;
        }

        .btn-primary:hover {
            background-color: #c17d0e;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(221, 147, 35, 0.4);
        }

        .btn-secondary:hover {
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(255, 255, 255, 0.2);
        }

        /* Testimonials Section */
        .testimonials-section {
            padding: 80px 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .testimonial-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 40px;
            margin-top: 50px;
        }

        .testimonial-card {
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
            position: relative;
        }

        .testimonial-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .testimonial-card::before {
            content: '"';
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 80px;
            font-family: Georgia, serif;
            color: rgba(221, 147, 35, 0.1);
            line-height: 1;
        }

        .testimonial-content {
            font-size: 16px;
            line-height: 1.8;
            color: #555;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .author-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            overflow: hidden;
        }

        .author-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .author-info h4 {
            font-size: 18px;
            font-weight: 700;
            color: #333;
            margin-bottom: 5px;
        }

        .author-info p {
            font-size: 14px;
            color: #888;
        }

        /* Responsive Adjustments */
        @media (max-width: 1200px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 992px) {
            .our-story {
                flex-direction: column;
                gap: 40px;
            }

            .story-image {
                order: -1;
            }

            .values-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .about-hero h1 {
                font-size: 40px;
            }

            .section-title h2 {
                font-size: 32px;
            }
        }

        @media (max-width: 768px) {
            .values-grid {
                grid-template-columns: 1fr;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }

            .btn-primary, .btn-secondary {
                width: 100%;
                max-width: 300px;
            }

            .about-hero h1 {
                font-size: 36px;
            }

            .section-title h2 {
                font-size: 28px;
            }

            .cta-title {
                font-size: 30px;
            }
        }

        @media (max-width: 576px) {
            .about-hero {
                padding: 60px 20px;
            }

            .about-hero h1 {
                font-size: 32px;
            }

            .about-hero p {
                font-size: 16px;
            }

            .section-title h2 {
                font-size: 26px;
            }

            .story-content h3 {
                font-size: 26px;
            }

            .cta-title {
                font-size: 26px;
            }

            .cta-description {
                font-size: 16px;
            }
        }
    </style>

    <!-- Hero Section -->
    <section class="about-hero">
        <h1>About <span class="accent-color">Best Service Tours</span></h1>
        <p>We are dedicated to providing exceptional transportation services in Marrakech with our premium fleet of vehicles and professional drivers, ensuring your journey is comfortable, safe, and memorable.</p>
    </section>

    <!-- Our Story Section -->
    <section class="about-section">
        <div class="our-story">
            <div class="story-content">
                <h3>Our Story</h3>
                <p>Best Service Tours was founded in 2015 with a simple mission: to provide visitors to Marrakech with reliable, comfortable, and luxurious transportation services. What began as a small operation with just two vehicles has now grown into one of the city's premier transportation companies.</p>
                <p>Our founder, Hassan Benali, noticed a gap in the market for high-quality transportation services that catered specifically to tourists looking for comfort, reliability, and local expertise. Having worked in the tourism industry for over a decade, Hassan understood the challenges travelers faced when navigating a new city and was determined to create a solution.</p>
                <p>Over the years, we've expanded our fleet, refined our services, and built a team of experienced professionals who share our passion for exceptional customer service. Today, Best Service Tours is proud to serve thousands of satisfied customers each year, from individual travelers to large groups and corporate clients.</p>
            </div>
            <div class="story-image">
                <img src="/images/aboutImg/story.png" alt="Our Company Story">
            </div>
        </div>
    </section>

    <!-- Mission & Values Section -->
    <section class="mission-values">
        <div class="mission-values-container">
            <div class="section-title">
                <h2>Our Mission & Values</h2>
                <p>At Best Service Tours, our mission is to provide the highest quality transportation services that exceed our customers' expectations while upholding our core values.</p>
            </div>

            <div class="values-grid">
                <div class="value-card">
                    <img src="/images/icon1.png" alt="Excellence" class="value-icon">
                    <h3 class="value-title">Excellence</h3>
                    <p class="value-description">We strive for excellence in everything we do, from the maintenance of our vehicles to the training of our drivers and the service we provide to our customers.</p>
                </div>

                <div class="value-card">
                    <img src="/images/icon2.png" alt="Reliability" class="value-icon">
                    <h3 class="value-title">Reliability</h3>
                    <p class="value-description">We understand the importance of punctuality and dependability. Our customers can count on us to be there when we say we will, every time.</p>
                </div>

                <div class="value-card">
                    <img src="/images/icon3.png" alt="Customer Focus" class="value-icon">
                    <h3 class="value-title">Customer Focus</h3>
                    <p class="value-description">Our customers are at the heart of everything we do. We listen to their needs and continuously improve our services to better serve them.</p>
                </div>

                <div class="value-card">
                    <img src="/images/info.png" alt="Safety" class="value-icon">
                    <h3 class="value-title">Safety</h3>
                    <p class="value-description">The safety of our customers is our top priority. Our vehicles are regularly maintained, and our drivers are trained to prioritize safety above all else.</p>
                </div>

                <div class="value-card">
                    <img src="/images/info.png" alt="Integrity" class="value-icon">
                    <h3 class="value-title">Integrity</h3>
                    <p class="value-description">We conduct our business with honesty, transparency, and ethical practices. What we promise is what we deliver, with no hidden charges or surprises.</p>
                </div>

                <div class="value-card">
                    <img src="/images/info.png" alt="Innovation" class="value-icon">
                    <h3 class="value-title">Innovation</h3>
                    <p class="value-description">We continuously seek new ways to improve our services, adopting the latest technology and best practices to enhance the customer experience.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section
    <section class="team-section">
        <div class="section-title">
            <h2>Meet Our Team</h2>
            <p>Our success is driven by our dedicated team of professionals who are committed to providing exceptional service to our customers.</p>
        </div>

        <div class="team-grid">
            <div class="team-member">
                <div class="member-image">
                    <img src="/images/team1.jpg" alt="Hassan Benali">
                </div>
                <div class="member-info">
                    <h3 class="member-name">Hassan Benali</h3>
                    <p class="member-position">Founder & CEO</p>
                    <p class="member-bio">With over 15 years of experience in the tourism and transportation industry, Hassan leads our company with vision and dedication to excellence.</p>
                </div>
            </div>

            <div class="team-member">
                <div class="member-image">
                    <img src="/images/team2.jpg" alt="Fatima Ouazzani">
                </div>
                <div class="member-info">
                    <h3 class="member-name">Fatima Ouazzani</h3>
                    <p class="member-position">Operations Manager</p>
                    <p class="member-bio">Fatima ensures that all our operations run smoothly and efficiently, coordinating our fleet and drivers to provide seamless service.</p>
                </div>
            </div>

            <div class="team-member">
                <div class="member-image">
                    <img src="/images/team3.jpg" alt="Karim Tazi">
                </div>
                <div class="member-info">
                    <h3 class="member-name">Karim Tazi</h3>
                    <p class="member-position">Fleet Manager</p>
                    <p class="member-bio">Responsible for maintaining our fleet in top condition, Karim ensures that all our vehicles meet our high standards of quality and safety.</p>
                </div>
            </div>

            <div class="team-member">
                <div class="member-image">
                    <img src="/images/team4.jpg" alt="Nadia El Mansouri">
                </div>
                <div class="member-info">
                    <h3 class="member-name">Nadia El Mansouri</h3>
                    <p class="member-position">Customer Relations</p>
                    <p class="member-bio">Nadia is dedicated to ensuring that our customers receive the best possible service, addressing their needs and concerns promptly and efficiently.</p>
                </div>
            </div>
        </div>
    </section>
    -->

    <!-- Services Section -->
    <section class="services-section">
        <div class="services-container">
            <div class="section-title">
                <h2>Our Services</h2>
                <p>We offer a comprehensive range of transportation services to meet all your needs in Marrakech and beyond.</p>
            </div>

            <div class="services-grid">
                <div class="service-card">
                    <div class="service-image">
                        <img src="/images/aboutImg/airport.jpg" alt="Airport Transfers">
                    </div>
                    <div class="service-content">
                        <h3 class="service-title">Airport Transfers</h3>
                        <p class="service-description">We provide reliable and comfortable airport transfers to and from Marrakech Menara Airport, ensuring a smooth start or end to your journey.</p>
                    </div>
                </div>

                <div class="service-card">
                    <div class="service-image">
                        <img src="/images/aboutImg/airport1.jpg" alt="City Tours">
                    </div>
                    <div class="service-content">
                        <h3 class="service-title">City Tours</h3>
                        <p class="service-description">Explore the vibrant city of Marrakech with our guided city tours, tailored to your interests and schedule.</p>
                    </div>
                </div>

                <div class="service-card">
                    <div class="service-image">
                        <img src="/images/aboutImg/agafay.jpg" alt="Day Trips">
                    </div>
                    <div class="service-content">
                        <h3 class="service-title">Day Trips</h3>
                        <p class="service-description">Discover the stunning landscapes and historical sites around Marrakech with our day trips to destinations like the Atlas Mountains and Essaouira.</p>
                    </div>
                </div>

                <div class="service-card">
                    <div class="service-image">
                        <img src="/images/aboutImg/quad.jpg" alt="Corporate Services">
                    </div>
                    <div class="service-content">
                        <h3 class="service-title">Corporate Services</h3>
                        <p class="service-description">We offer specialized transportation services for corporate clients, including event transportation, executive transfers, and more.</p>
                    </div>
                </div>

                <div class="service-card">
                    <div class="service-image">
                        <img src="/images/aboutImg/weeding.jpg" alt="Wedding Transportation">
                    </div>
                    <div class="service-content">
                        <h3 class="service-title">Wedding Transportation</h3>
                        <p class="service-description">Make your special day even more memorable with our luxury wedding transportation services, available for the bride, groom, and guests.</p>
                    </div>
                </div>

                <div class="service-card">
                    <div class="service-image">
                        <img src="/images/aboutImg/trip.jpg" alt="Custom Tours">
                    </div>
                    <div class="service-content">
                        <h3 class="service-title">Custom Tours</h3>
                        <p class="service-description">Let us create a personalized tour based on your interests, whether it's shopping, cuisine, history, or culture.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="section-title">
            <h2>Our Impact</h2>
            <p>Numbers that speak for our commitment to excellence and customer satisfaction.</p>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number">8+</div>
                <div class="stat-title">Years of Experience</div>
            </div>

            <div class="stat-card">
                <div class="stat-number">15,000+</div>
                <div class="stat-title">Happy Customers</div>
            </div>

            <div class="stat-card">
                <div class="stat-number">25+</div>
                <div class="stat-title">Luxury Vehicles</div>
            </div>

            <div class="stat-card">
                <div class="stat-number">30+</div>
                <div class="stat-title">Professional Drivers</div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->


    <!-- CTA Section -->
    <section class="cta-section">
        <div class="cta-container">
            <h2 class="cta-title">Ready to Experience Our Services?</h2>
            <p class="cta-description">Book your transportation with Best Service Tours today and discover why we're Marrakech's leading transportation company. Our team is ready to provide you with a comfortable, safe, and memorable journey.</p>
            <div<div class="cta-buttons">
                <a href="{{ route('our-fleet') }}" class="btn-primary">Book Now</a>
                <a href="{{ route('contact') }}" class="btn-secondary">Contact Us</a>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="about-section">
        <div class="section-title">
            <h2>Frequently Asked Questions</h2>
            <p>Find answers to common questions about our services.</p>
        </div>

        <div style="max-width: 900px; margin: 0 auto;">
            <div style="margin-bottom: 30px;">
                <h3 style="font-size: 22px; font-weight: 700; color: #333; margin-bottom: 15px;">What areas do you serve?</h3>
                <p style="font-size: 17px; line-height: 1.7; color: #555;">We primarily serve Marrakech and its surrounding areas, including transfers to and from Marrakech Menara Airport. We also offer day trips to popular destinations such as the Atlas Mountains, Essaouira, Ouarzazate, and Casablanca.</p>
            </div>

            <div style="margin-bottom: 30px;">
                <h3 style="font-size: 22px; font-weight: 700; color: #333; margin-bottom: 15px;">How do I book a service?</h3>
                <p style="font-size: 17px; line-height: 1.7; color: #555;">Booking with Best Service Tours is simple! You can book directly through our website using our online reservation form, call us, or send us an email. We recommend booking in advance to ensure availability, especially during peak tourist seasons.</p>
            </div>

            <div style="margin-bottom: 30px;">
                <h3 style="font-size: 22px; font-weight: 700; color: #333; margin-bottom: 15px;">What types of vehicles do you offer?</h3>
                <p style="font-size: 17px; line-height: 1.7; color: #555;">We offer a diverse fleet of vehicles to accommodate various group sizes and preferences. Our fleet includes luxury sedans, SUVs, minivans, and sprinter vans. All our vehicles are well-maintained, air-conditioned, and equipped with modern amenities for your comfort.</p>
            </div>

            <div style="margin-bottom: 30px;">
                <h3 style="font-size: 22px; font-weight: 700; color: #333; margin-bottom: 15px;">Are your drivers familiar with Marrakech?</h3>
                <p style="font-size: 17px; line-height: 1.7; color: #555;">Absolutely! All our drivers are local professionals with extensive knowledge of Marrakech and its surroundings. They speak multiple languages including English, French, and Arabic, and can provide valuable insights about local attractions, history, and culture.</p>
            </div>

            <div style="margin-bottom: 30px;">
                <h3 style="font-size: 22px; font-weight: 700; color: #333; margin-bottom: 15px;">What payment methods do you accept?</h3>
                <p style="font-size: 17px; line-height: 1.7; color: #555;">We accept various payment methods for your convenience, including credit cards, PayPal, bank transfers, and cash. For online bookings, payment is typically made in advance to secure your reservation.</p>
            </div>

            <div>
                <h3 style="font-size: 22px; font-weight: 700; color: #333; margin-bottom: 15px;">What is your cancellation policy?</h3>
                <p style="font-size: 17px; line-height: 1.7; color: #555;">We understand that plans can change. Cancellations made at least 48 hours before the scheduled service are eligible for a full refund. Cancellations made within 48 hours may be subject to a cancellation fee. Please refer to our Terms & Conditions for detailed information.</p>
            </div>
        </div>
    </section>

    <!-- Our Partners Section
    <section class="services-section">
        <div class="services-container">
            <div class="section-title">
                <h2>Our Partners</h2>
                <p>We're proud to collaborate with the finest hotels, travel agencies, and businesses in Marrakech.</p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 30px; margin-top: 50px; align-items: center; justify-items: center;">
                <div style="background-color: #f8f8f8; padding: 30px; border-radius: 8px; width: 100%; display: flex; align-items: center; justify-content: center; height: 100px;">
                    <img src="/images/partner1.png" alt="Partner Logo" style="max-width: 100%; max-height: 80px;">
                </div>
                <div style="background-color: #f8f8f8; padding: 30px; border-radius: 8px; width: 100%; display: flex; align-items: center; justify-content: center; height: 100px;">
                    <img src="/images/partner2.png" alt="Partner Logo" style="max-width: 100%; max-height: 80px;">
                </div>
                <div style="background-color: #f8f8f8; padding: 30px; border-radius: 8px; width: 100%; display: flex; align-items: center; justify-content: center; height: 100px;">
                    <img src="/images/partner3.png" alt="Partner Logo" style="max-width: 100%; max-height: 80px;">
                </div>
                <div style="background-color: #f8f8f8; padding: 30px; border-radius: 8px; width: 100%; display: flex; align-items: center; justify-content: center; height: 100px;">
                    <img src="/images/partner4.png" alt="Partner Logo" style="max-width: 100%; max-height: 80px;">
                </div>
                <div style="background-color: #f8f8f8; padding: 30px; border-radius: 8px; width: 100%; display: flex; align-items: center; justify-content: center; height: 100px;">
                    <img src="/images/partner5.png" alt="Partner Logo" style="max-width: 100%; max-height: 80px;">
                </div>
                <div style="background-color: #f8f8f8; padding: 30px; border-radius: 8px; width: 100%; display: flex; align-items: center; justify-content: center; height: 100px;">
                    <img src="/images/partner6.png" alt="Partner Logo" style="max-width: 100%; max-height: 80px;">
                </div>
            </div>
        </div>
    </section>

    <!-- Location Section -->
    <section class="about-section">
        <div class="section-title">
            <h2>Visit Us</h2>
            <p>Our office is conveniently located in the heart of Marrakech.</p>
        </div>

        <div style="display: flex; flex-direction: column; align-items: center; gap: 30px; max-width: 1000px; margin: 0 auto;">
            <div style="width: 100%; height: 400px; background-color: #f8f8f8; border-radius: 12px; overflow: hidden;">
                <!-- Replace with actual map or iframe -->
                <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; background-color: #eee; color: #777; font-size: 18px; font-weight: 600;">
                    Interactive Map Location
                </div>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; width: 100%;">
                <div style="background-color: white; padding: 30px; border-radius: 12px; box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);">
                    <h3 style="font-size: 22px; font-weight: 700; color: #333; margin-bottom: 20px;">Address</h3>
                    <p style="font-size: 16px; line-height: 1.7; color: #555; margin-bottom: 5px;">123 Avenue Mohammed V</p>
                    <p style="font-size: 16px; line-height: 1.7; color: #555; margin-bottom: 5px;">Gueliz, Marrakech 40000</p>
                    <p style="font-size: 16px; line-height: 1.7; color: #555;">Morocco</p>
                </div>

                <div style="background-color: white; padding: 30px; border-radius: 12px; box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);">
                    <h3 style="font-size: 22px; font-weight: 700; color: #333; margin-bottom: 20px;">Contact</h3>
                    <p style="font-size: 16px; line-height: 1.7; color: #555; margin-bottom: 5px;">Phone: +212 524 123 456</p>
                    <p style="font-size: 16px; line-height: 1.7; color: #555; margin-bottom: 5px;">Email: info@bestservicetours.com</p>
                    <p style="font-size: 16px; line-height: 1.7; color: #555;">WhatsApp: +212 661 123 456</p>
                </div>

                <div style="background-color: white; padding: 30px; border-radius: 12px; box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);">
                    <h3 style="font-size: 22px; font-weight: 700; color: #333; margin-bottom: 20px;">Hours</h3>
                    <p style="font-size: 16px; line-height: 1.7; color: #555; margin-bottom: 5px;">Monday - Friday: 8:00 AM - 8:00 PM</p>
                    <p style="font-size: 16px; line-height: 1.7; color: #555; margin-bottom: 5px;">Saturday: 9:00 AM - 6:00 PM</p>
                    <p style="font-size: 16px; line-height: 1.7; color: #555;">Sunday: 10:00 AM - 4:00 PM</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Career Section -->
    <section class="mission-values">
        <div class="mission-values-container">
            <div class="section-title">
                <h2>Join Our Team</h2>
                <p>We're always looking for talented individuals to join our growing team.</p>
            </div>

            <div style="text-align: center; max-width: 800px; margin: 40px auto 0;">
                <p style="font-size: 17px; line-height: 1.8; color: #555; margin-bottom: 30px;">
                    At Best Service Tours, we pride ourselves on our team of dedicated professionals who are passionate about providing exceptional service. If you're customer-focused, reliable, and enthusiastic about the tourism industry, we'd love to hear from you!
                </p>

                <p style="font-size: 17px; line-height: 1.8; color: #555; margin-bottom: 30px;">
                    We offer competitive salaries, comprehensive training, career advancement opportunities, and the chance to work with a dynamic team in one of Morocco's most vibrant cities.
                </p>
            </div>
        </div>
    </section>
@endsection