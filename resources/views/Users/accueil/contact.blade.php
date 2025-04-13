@section('title')
    Contact Us
@endsection
@extends('Users.base')
@section('content')
    <style>
        .contact-section {
            margin: 80px auto;
            width: 50%;
            padding: 0 20px;
        }

        .contact-title {
            margin-bottom: 40px;
            text-align: center;
        }

        .contact-title h1 {
            font-size: 42px;
            font-weight: 800;
            color: #222;
            margin-bottom: 12px;
            letter-spacing: -0.5px;
            text-transform: uppercase;
        }

        .contact-title h5 {
            font-size: 16px;
            color: #555;
            font-weight: 500;
            letter-spacing: 1px;
        }

        .contact-form {
            background: #fff;
            padding: 50px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            border-top: 5px solid #dd9323;
        }

        .form-group {
            margin-bottom: 28px;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;
            font-size: 15px;
            color: #333;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 15px;
            border: 2px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            color: #333;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #dd9323;
            box-shadow: 0 0 0 3px rgba(0, 102, 204, 0.2);
            outline: none;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 150px;
        }

        .submit-button {
            background-color: #dd9323;
            color: white;
            border: none;
            padding: 16px 24px;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .submit-button:hover {
            background-color: #ff9900;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px #dd9323(0, 102, 204, 0.4);
        }

        .submit-button:active {
            transform: translateY(0);
            box-shadow: 0 2px 5px #dd9323(0, 102, 204, 0.4);
        }

        .contact-info {
            margin-top: 40px;
            text-align: center;
            background: #f8f9fa;
            padding: 30px;
            border-radius: 12px;
        }

        .contact-info-item {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .contact-info-item:last-child {
            margin-bottom: 0;
        }

        .contact-info-icon {
            margin-right: 12px;
            width: 40px;
            height: 40px;
            background: #0066CC;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 18px;
        }

        .contact-info-text {
            font-size: 17px;
            color: #333;
            font-weight: 600;
        }

        .contact-info-text a {
            color: #0066CC;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .contact-info-text a:hover {
            color: #004d99;
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .contact-form {
                padding: 30px;
            }

            .contact-title h1 {
                font-size: 32px;
            }
        }

        @media (max-width: 480px) {
            .contact-form {
                padding: 25px;
            }

            .form-group label {
                font-size: 14px;
            }

            .form-group input,
            .form-group textarea {
                padding: 12px;
            }

            .submit-button {
                padding: 14px 20px;
            }
        }
    </style>

    <div class="contact-section">
        <div class="contact-title">
            <h1>Get In Touch</h1>
            <h5>We're ready to help with your questions and needs</h5>
        </div>

        <div class="contact-form">
            <form action="">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" placeholder="Enter your full name">
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" placeholder="Enter your email address">
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" placeholder="What is this regarding?">
                </div>
                <div class="form-group">
                    <label for="message">Your Message</label>
                    <textarea id="message" placeholder="Please describe your message in detail..."></textarea>
                </div>
                <button type="submit" class="submit-button">Send Message</button>
            </form>
        </div>

        <div class="contact-info">
            <div class="contact-info-item">
                <div class="contact-info-icon">
                    ✉️
                </div>
                <div class="contact-info-text">
                    <a href="mailto:bestservicetrafic@gmail.com">bestservicetrafic@gmail.com</a>
                </div>
            </div>
            <div class="contact-info-item">
                <div class="contact-info-icon">
                    📞
                </div>
                <div class="contact-info-text">
                    <a href="tel:+212663337759">+212 663337759</a>
                </div>
            </div>
        </div>
    </div>
@endsection