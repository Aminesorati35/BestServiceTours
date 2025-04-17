@extends('Users.base')

@section('title')
    Modify Reservation
@endsection

@section('content')
<style>
    /* Modern CSS variables for easy theming */
    :root {
        --primary: #DD9323;
        --primary-dark: #b97e19;
        --primary-light: #f3c77f;
        --dark: #2d3436;
        --light: #ffffff;
        --accent: #6c5ce7;
        --danger: #e74c3c;
        --success: #00b894;
        --gray-100: #f8f9fa;
        --gray-200: #e9ecef;
        --gray-300: #dee2e6;
        --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.05);
        --shadow-md: 0 5px 15px rgba(0, 0, 0, 0.07);
        --shadow-lg: 0 10px 25px rgba(0, 0, 0, 0.1);
        --radius-sm: 4px;
        --radius-md: 8px;
        --radius-lg: 16px;
        --font-family: 'Poppins', sans-serif;
        --anim-duration: 0.3s;
    }

    /* Typography */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    /* Animation keyframes */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes pulse {
        0% { box-shadow: 0 0 0 0 rgba(221, 147, 35, 0.4); }
        70% { box-shadow: 0 0 0 15px rgba(221, 147, 35, 0); }
        100% { box-shadow: 0 0 0 0 rgba(221, 147, 35, 0); }
    }

    /* Base styles */
    body {
        font-family: var(--font-family);
        background-color: #f7f9fc;
        color: var(--dark);
    }

    /* Main container */
    .reservation-master-container {
        position: relative;
        background: linear-gradient(135deg, #f3f4f6 0%, #e9ecef 100%);
        padding: 50px 30px;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .reservation-card {
        width: 100%;
        max-width: 800px;
        margin: 0 auto;
        background: var(--light);
        border-radius: var(--radius-lg);
        overflow: hidden;
        box-shadow: var(--shadow-lg);
        position: relative;
        animation: fadeIn var(--anim-duration) ease-out;
    }

    /* Decorative elements */
    .reservation-card::before {
        content: '';
        position: absolute;
        top: -10px;
        right: -10px;
        width: 80px;
        height: 80px;
        background: var(--primary);
        border-radius: 50%;
        opacity: 0.3;
        z-index: 0;
    }

    .reservation-card::after {
        content: '';
        position: absolute;
        bottom: -20px;
        left: -20px;
        width: 120px;
        height: 120px;
        background: var(--accent);
        border-radius: 50%;
        opacity: 0.1;
        z-index: 0;
    }

    /* Header section */
    .reservation-header {
        background: linear-gradient(120deg, var(--primary) 0%, var(--primary-dark) 100%);
        padding: 30px;
        position: relative;
        overflow: hidden;
    }

    .reservation-header::before {
        content: '📅';
        position: absolute;
        font-size: 150px;
        color: rgba(255, 255, 255, 0.05);
        top: -20px;
        right: 10px;
        transform: rotate(10deg);
    }

    .header-content {
        position: relative;
        z-index: 2;
    }

    .reservation-title {
        color: var(--light);
        margin: 0;
        font-size: 2rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        position: relative;
        display: inline-block;
    }

    .reservation-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 60px;
        height: 4px;
        background: var(--light);
        border-radius: 2px;
    }

    .reservation-subtitle {
        color: rgba(255, 255, 255, 0.85);
        margin-top: 20px;
        font-size: 0.95rem;
        font-weight: 400;
    }

    /* Form container */
    .reservation-form-container {
        padding: 40px;
        position: relative;
        z-index: 2;
    }

    /* Form fields styling */
    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 30px;
    }

    .form-group {
        position: relative;
        margin-bottom: 10px;
    }

    .form-group.full-width {
        grid-column: span 2;
    }

    .form-label {
        display: block;
        font-size: 0.9rem;
        font-weight: 500;
        margin-bottom: 10px;
        color: #555;
        transition: all var(--anim-duration) ease;
    }

    .form-control {
        width: 100%;
        padding: 16px 20px;
        font-size: 1rem;
        background-color: var(--gray-100);
        border: 2px solid transparent;
        border-radius: var(--radius-md);
        transition: all var(--anim-duration) ease;
        box-shadow: var(--shadow-sm);
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary);
        background-color: var(--light);
        box-shadow: 0 0 0 4px rgba(221, 147, 35, 0.15);
    }

    .form-control::placeholder {
        color: #adb5bd;
    }

    /* Form field icons */
    .field-icon {
        position: absolute;
        top: 45px;
        right: 15px;
        color: #adb5bd;
        transition: all var(--anim-duration) ease;
        pointer-events: none;
    }

    .form-control:focus + .field-icon {
        color: var(--primary);
    }

    /* Error styling */
    .error-message {
        display: block;
        margin-top: 8px;
        font-size: 0.8rem;
        color: var(--danger);
        font-weight: 500;
        animation: fadeIn 0.2s ease-out;
    }

    /* Submit button */
    .submit-wrapper {
        margin-top: 40px;
        grid-column: span 2;
        display: flex;
        justify-content: space-around;
        align-items: center;
    }
    .submit-wrapper a{
        padding: 16px 30px;
        color: white;
        border-radius: 10px;
        background-color: #808080dc;
    }
    .submit-wrapper a:hover{
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(221, 147, 35, 0.4);
    box-shadow: 0 6px 20px rgba(221, 147, 35, 0.4);
    }

    .submit-button {
        display: block;
        width: 40%;
        padding: 16px 20px;
        background: linear-gradient(120deg, var(--primary) 0%, var(--primary-dark) 100%);
        color: var(--light);
        border: none;
        border-radius: var(--radius-md);
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all var(--anim-duration) ease;
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(221, 147, 35, 0.3);
        letter-spacing: 0.5px;
    }

    .submit-button::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: all 0.6s ease;
    }

    .submit-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(221, 147, 35, 0.4);
    }

    .submit-button:hover::before {
        left: 100%;
    }

    .submit-button:active {
        transform: translateY(0);
    }

    /* Progress indicator */
    .form-progress {
        display: flex;
        justify-content: center;
        margin-bottom: 30px;
    }

    .progress-step {
        display: flex;
        align-items: center;
    }

    .step-number {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background: var(--primary);
        color: var(--light);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        margin-right: 10px;
    }

    .step-text {
        font-size: 0.9rem;
        color: var(--primary);
        font-weight: 500;
    }

    /* Car image preview */
    .car-image-container {
        grid-column: span 2;
        text-align: center;
        margin-bottom: 20px;
    }

    .car-image-title {
        font-size: 1.1rem;
        color: var(--primary);
        margin-bottom: 15px;
        font-weight: 600;
    }

    .car-image-preview {
        max-width: 100%;
        height: auto;
        max-height: 200px;
        border-radius: var(--radius-md);
        border: 3px solid var(--primary-light);
        box-shadow: var(--shadow-md);
        transition: all 0.3s ease;
    }

    .car-image-preview:hover {
        transform: scale(1.02);
        box-shadow: var(--shadow-lg);
    }

    .no-car-image {
        font-style: italic;
        color: #666;
    }

    /* Responsive styles */
    @media (max-width: 768px) {
        .reservation-master-container {
            padding: 20px 15px;
        }

        .reservation-card {
            border-radius: var(--radius-md);
        }

        .reservation-header {
            padding: 25px 20px;
        }

        .reservation-title {
            font-size: 1.5rem;
        }

        .reservation-form-container {
            padding: 25px 20px;
        }

        .form-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .form-group.full-width,
        .car-image-container,
        .submit-wrapper {
            grid-column: span 1;
        }
    }

    /* SweetAlert custom classes */
    .btn-confirm {
        background-color: var(--primary) !important;
    }

    .btn-cancel {
        background-color: var(--danger) !important;
    }
</style>

<div class="reservation-master-container">
    <div class="reservation-card">
        <div class="reservation-header">
            <div class="header-content">
                <h2 class="reservation-title">Modify My Reservation<span class="animated-icon">✏️</span></h2>
                <p class="reservation-subtitle">Update your reservation details with ease</p>
            </div>
        </div>

        <div class="reservation-form-container">
            <div class="form-progress">
                <div class="progress-step">
                    <div class="step-number">✓</div>
                    <div class="step-text">Reservation modification</div>
                </div>
            </div>

            <form action="{{ route('client.reservations.update',$reservation->id) }}" method="POST" id="modifierForm">
                @csrf
                @method('PUT')

                <div class="form-grid">
                    <!-- Car Image Preview -->
                    <div class="car-image-container">
                        <div class="car-image-title">Selected Vehicle</div>
                        @php
                            $selectedCar = $voitures->firstWhere('id', $reservation->voiture_id);
                        @endphp
                        @if($selectedCar && $selectedCar->image)
                            <img src="{{ asset('storage/' . $selectedCar->image) }}" alt="Selected Car Image" class="car-image-preview">
                        @else
                            <p class="no-car-image">No image available for selected vehicle</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="trajet">
                            <i class="fas fa-route" style="margin-right: 5px; color: var(--primary);"></i>
                            Route
                        </label>
                        <select class="form-control" id="trajet" name="trajet_id">
                            @foreach ($trajets as $trajet)
                            <option value="{{ $trajet->id }}" {{ old('trajet_id', $reservation->trajet_id)==$trajet->id ? "selected" : '' }}>
                                    {{ $trajet->name }}
                                </option>
                            @endforeach
                        </select>
                        <i class="fas fa-map-marked-alt field-icon"></i>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="car">
                            <i class="fas fa-car" style="margin-right: 5px; color: var(--primary);"></i>
                            Vehicle
                        </label>
                        <select class="form-control" id="car" name="voiture_id" onchange="updateCarImage(this)">
                            @foreach ($voitures as $voiture)
                                <option value="{{ $voiture->id }}"
                                    data-image="{{ $voiture->image ? asset('storage/' . $voiture->image) : '' }}"
                                    {{ old('voiture_id',$reservation->voiture_id)==$voiture->id ? 'selected' : '' }}>
                                    {{ $voiture->modele }}
                                </option>
                            @endforeach
                        </select>
                        <i class="fas fa-car-side field-icon"></i>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="date_reservation">
                            <i class="fas fa-calendar-day" style="margin-right: 5px; color: var(--primary);"></i>
                            Pick Up Date
                        </label>
                        <input type="date" class="form-control" id="date_reservation" name="date_reservation"
                        value="{{ old('date_reservation', isset($reservation) ? \Carbon\Carbon::parse($reservation->date_reservation)->format('Y-m-d') : '') }}" />
                        <i class="fas fa-calendar-alt field-icon"></i>
                        @error("date_reservation")
                        <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="time_reservation">
                            <i class="fas fa-clock" style="margin-right: 5px; color: var(--primary);"></i>
                            Pick Up Time
                        </label>
                        <input type="time" class="form-control" id="time_reservation" name="time_reservation"
                        value="{{ old('time_reservation', isset($reservation) ? \Carbon\Carbon::parse($reservation->time_reservation)->format('H:i') : '') }}" />
                        <i class="fas fa-hourglass-half field-icon"></i>
                        @error("time_reservation")
                        <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="nombre_personnes">
                            <i class="fas fa-users" style="margin-right: 5px; color: var(--primary);"></i>
                            Number of people
                        </label>
                        <input type="number" class="form-control" id="nombre_personnes" name="nombre_personnes" value="{{ old('nombre_personnes',$reservation->nombre_personnes) }}" />
                        <i class="fas fa-user-plus field-icon"></i>
                        @error("nombre_personnes")
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="nombre_bags">
                            <i class="fas fa-suitcase" style="margin-right: 5px; color: var(--primary);"></i>
                            Number of bags
                        </label>
                        <input type="number" class="form-control" id="nombre_bags" name="nombre_bags" value="{{ old('nombre_bags',$reservation->nombre_bags) }}" />
                        <i class="fas fa-luggage-cart field-icon"></i>
                        @error("nombre_bags")
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="type_trajet">
                            <i class="fas fa-exchange-alt" style="margin-right: 5px; color: var(--primary);"></i>
                            Trip Type
                        </label>
                        <select class="form-control" name="type_trajet" id="type_trajets">
                            <option value="round_trip" {{ old('type_trajet',$reservation->type_trajet)=="round_trip" ? 'selected' : "" }}>Round Trip</option>
                            <option value="one_way" {{ old('type_trajet',$reservation->type_trajet)=='one_way' ? 'selected' : '' }}>One Way</option>
                        </select>
                        <i class="fas fa-random field-icon"></i>
                    </div>

                    <div class="submit-wrapper">
                        <button type="button" class="submit-button pulse-effect" onclick="confirmUpdate()">
                            <i class="fas fa-save" style="margin-right: 10px;"></i>
                            Update Reservation
                        </button>
                        <a href="{{route('client.reservations.index')}}">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<!-- Make sure SweetAlert2 is properly included -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Function to update car image when vehicle selection changes
    function updateCarImage(selectElement) {
        const selectedOption = selectElement.options[selectElement.selectedIndex];
        const carImageUrl = selectedOption.getAttribute('data-image');
        const carImageContainer = document.querySelector('.car-image-container');

        if (carImageUrl) {
            carImageContainer.innerHTML = `
                <div class="car-image-title">Selected Vehicle</div>
                <img src="${carImageUrl}" alt="Selected Car Image" class="car-image-preview">
            `;
        } else {
            carImageContainer.innerHTML = `
                <div class="car-image-title">Selected Vehicle</div>
                <p class="no-car-image">No image available for selected vehicle</p>
            `;
        }
    }

    // Standard confirmation function compatible with most SweetAlert2 versions
    function confirmUpdate() {
        Swal.fire({
            title: 'Confirmation',
            text: 'Are you sure you want to modify this reservation?',
            icon: 'question',
            iconColor: '#DD9323',
            showCancelButton: true,
            confirmButtonText: 'Confirm',
            cancelButtonText: 'Cancel',
            confirmButtonColor: '#DD9323',
            cancelButtonColor: '#e74c3c',
            reverseButtons: true,
            focusConfirm: false,
            customClass: {
                confirmButton: 'btn-confirm',
                cancelButton: 'btn-cancel'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the form
                document.getElementById('modifierForm').submit();
            }
        });
    }

    // Add animation to form fields on page load
    document.addEventListener('DOMContentLoaded', function() {
        const formControls = document.querySelectorAll('.form-control');
        formControls.forEach((control, index) => {
            setTimeout(() => {
                control.style.opacity = '0';
                control.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    control.style.transition = 'all 0.3s ease';
                    control.style.opacity = '1';
                    control.style.transform = 'translateY(0)';
                }, 50);
            }, index * 80);
        });
    });
</script>
@endsection
