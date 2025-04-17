@section('title')
    Modify Trip
@endsection
@extends('Users.base')
@section('content')
<style>
    /* Modern CSS variables for easy theming */
    :root {
        --primary: #F6B93B;
        --primary-dark: #e59b19;
        --primary-light: #fad484;
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
        0% { box-shadow: 0 0 0 0 rgba(246, 185, 59, 0.4); }
        70% { box-shadow: 0 0 0 15px rgba(246, 185, 59, 0); }
        100% { box-shadow: 0 0 0 0 rgba(246, 185, 59, 0); }
    }

    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-8px); }
        100% { transform: translateY(0px); }
    }

    /* Base styles */
    body {
        font-family: var(--font-family);
        background-color: #f7f9fc;
        color: var(--dark);
    }

    /* Main container */
    .trajet-master-container {
        position: relative;
        background: linear-gradient(135deg, #f3f4f6 0%, #e9ecef 100%);
        padding: 50px 30px;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .trajet-card {
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
    .trajet-card::before {
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

    .trajet-card::after {
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
    .trajet-header {
        background: linear-gradient(120deg, var(--primary) 0%, var(--primary-dark) 100%);
        padding: 30px;
        position: relative;
        overflow: hidden;
    }

    .trajet-header::before {
        content: '✈';
        position: absolute;
        font-size: 150px;
        color: rgba(255, 255, 255, 0.05);
        top: -20px;
        right: 10px;
        transform: rotate(20deg);
    }

    .header-content {
        position: relative;
        z-index: 2;
    }

    .trajet-title {
        color: var(--light);
        margin: 0;
        font-size: 2rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        position: relative;
        display: inline-block;
    }

    .trajet-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 60px;
        height: 4px;
        background: var(--light);
        border-radius: 2px;
    }

    .trajet-subtitle {
        color: rgba(255, 255, 255, 0.85);
        margin-top: 20px;
        font-size: 0.95rem;
        font-weight: 400;
    }

    /* Form container */
    .trajet-form-container {
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
        box-shadow: 0 0 0 4px rgba(246, 185, 59, 0.15);
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
        width: 100%;
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
        box-shadow: 0 4px 15px rgba(246, 185, 59, 0.3);
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
        box-shadow: 0 6px 20px rgba(246, 185, 59, 0.4);
    }

    .submit-button:hover::before {
        left: 100%;
    }

    .submit-button:active {
        transform: translateY(0);
    }

    /* Floating labels effect */
    .float-label {
        position: relative;
    }

    .float-label label {
        position: absolute;
        top: 50%;
        left: 20px;
        transform: translateY(-50%);
        background: transparent;
        transition: all 0.2s ease;
        font-size: 1rem;
        color: #adb5bd;
        padding: 0 5px;
        pointer-events: none;
    }

    .float-label input:focus + label,
    .float-label input:not(:placeholder-shown) + label {
        top: 0;
        left: 15px;
        font-size: 0.8rem;
        color: var(--primary);
        background: var(--light);
        padding: 0 5px;
    }

    /* Animation classes */
    .animated-icon {
        display: inline-block;
        animation: float 3s ease-in-out infinite;
    }

    .pulse-effect {
        animation: pulse 2s infinite;
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

    /* Responsive styles */
    @media (max-width: 768px) {
        .trajet-master-container {
            padding: 20px 15px;
        }

        .trajet-card {
            border-radius: var(--radius-md);
        }

        .trajet-header {
            padding: 25px 20px;
        }

        .trajet-title {
            font-size: 1.5rem;
        }

        .trajet-form-container {
            padding: 25px 20px;
        }

        .form-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .form-group.full-width,
        .submit-wrapper {
            grid-column: span 1;
        }
    }
</style>

<div class="trajet-master-container">
    <div class="trajet-card">
        <div class="trajet-header">
            <div class="header-content">
                <h2 class="trajet-title">Modify Trip <span class="animated-icon">✈</span></h2>
                <p class="trajet-subtitle">Update your trip information in just a few clicks</p>
            </div>
        </div>

        <div class="trajet-form-container">
            <div class="form-progress">
                <div class="progress-step">
                    <div class="step-number">✓</div>
                    <div class="step-text"> Trip Modification</div>
                </div>
            </div>

            <form action="{{ route('admin.trajets.update',$trajet->id) }}" method="POST" enctype="multipart/form-data" id="modifierForm">
                @csrf
                @method('PUT')

                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label" for="depart">
                            <i class="fas fa-map-marker-alt" style="margin-right: 5px; color: var(--primary);"></i>
                            Starting point
                        </label>
                        <input type="text" class="form-control" id="depart" name="depart" value="{{ old('depart',$trajet->depart) }}" placeholder="Ex: Casablanca">
                        <i class="fas fa-location-arrow field-icon"></i>
                        @error('depart')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="arrivee">
                            <i class="fas fa-flag-checkered" style="margin-right: 5px; color: var(--primary);"></i>
                            Destination
                        </label>
                        <input type="text" class="form-control" id="arrivee" name="arrivee" value="{{ old('arrivee',$trajet->arrivee) }}" placeholder="Ex: Marrakech">
                        <i class="fas fa-map-pin field-icon"></i>
                        @error('arrivee')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="duree_estimee">
                            <i class="fas fa-clock" style="margin-right: 5px; color: var(--primary);"></i>
                            Duration (minutes)
                        </label>
                        <input type="number" class="form-control" id="duree_estimee" name="duree_estimee" min="0" value="{{ old('duree_estimee',$trajet->duree_estimee) }}" placeholder="Ex: 120">
                        <i class="fas fa-hourglass-half field-icon"></i>
                        @error('duree_estimee')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="prix">
                            <i class="fas fa-tag" style="margin-right: 5px; color: var(--primary);"></i>
                            Price ($)
                        </label>
                        <input type="number" class="form-control" id="prix" name="prix" step="0.01" min="0" value="{{ old('prix',$trajet->prix) }}" placeholder="Ex: 150.00">
                        <i class="fas fa-money-bill-wave field-icon"></i>
                        @error('prix')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label" for="description">
                            <i class="fas fa-info-circle" style="margin-right: 5px; color: var(--primary);"></i>
                            Description
                        </label>
                        <input type="text" class="form-control" id="description" name="description" value="{{ old('description',$trajet->description) }}" placeholder="Décrivez votre trajet en quelques mots">
                        <i class="fas fa-edit field-icon"></i>
                        @error('description')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="submit-wrapper">
                        <button type="button" class="submit-button pulse-effect" onclick="confirmUpdate()">
                            <i class="fas fa-check-circle" style="margin-right: 10px;"></i>
                            Modify Trip
                        </button>
                        <a href="{{route('admin.trajets.index')}}">Back</a>
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
    // Standard confirmation function compatible with most SweetAlert2 versions
    function confirmUpdate() {
        Swal.fire({
            title: 'Confirmer la modification',
            text: "Do you really want to update this Trajet's information?",
            icon: 'question',
            iconColor: '#F6B93B',
            showCancelButton: true,
            confirmButtonText: 'Confirm',
            cancelButtonText: 'Cancel',
            confirmButtonColor: '#F6B93B',
            cancelButtonColor: '#6c757d',
            reverseButtons: true,
            focusConfirm: false
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
            }, index * 100);
        });
    });
</script>
@endsection
