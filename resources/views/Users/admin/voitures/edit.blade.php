@extends('Users.base')

@section('title')
    Edit Fleet
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
    .voiture-master-container {
        position: relative;
        background: linear-gradient(135deg, #f3f4f6 0%, #e9ecef 100%);
        padding: 50px 30px;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .voiture-card {
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
    .voiture-card::before {
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

    .voiture-card::after {
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
    .voiture-header {
        background: linear-gradient(120deg, var(--primary) 0%, var(--primary-dark) 100%);
        padding: 30px;
        position: relative;
        overflow: hidden;
    }

    .voiture-header::before {
        content: '🚗';
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

    .voiture-title {
        color: var(--light);
        margin: 0;
        font-size: 2rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        position: relative;
        display: inline-block;
    }

    .voiture-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 60px;
        height: 4px;
        background: var(--light);
        border-radius: 2px;
    }

    .voiture-subtitle {
        color: rgba(255, 255, 255, 0.85);
        margin-top: 20px;
        font-size: 0.95rem;
        font-weight: 400;
    }

    /* Form container */
    .voiture-form-container {
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

    /* Image upload styling */
    .image-upload-container {
        grid-column: span 2;
        position: relative;
        margin-top: 10px;
        margin-bottom: 20px;
    }

    .image-preview {
        margin-top: 15px;
        border-radius: var(--radius-md);
        overflow: hidden;
        max-width: 100%;
        height: auto;
        box-shadow: var(--shadow-sm);
        transition: all var(--anim-duration) ease;
        display: flex;
        justify-content: center;
    }

    .image-preview img {
        max-height: 200px;
        object-fit: contain;
        border: 2px solid var(--gray-200);
        border-radius: var(--radius-md);
        transition: all var(--anim-duration) ease;
    }

    .image-preview img:hover {
        transform: scale(1.02);
        box-shadow: var(--shadow-md);
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
    }

    .submit-button {
        display: block;
        width: 50%;
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

    /* Custom file input */
    .custom-file-input {
        position: relative;
    }

    .custom-file-input input[type="file"] {
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
        width: 100%;
        height: 100%;
        cursor: pointer;
    }

    .custom-file-label {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 15px 20px;
        background: var(--gray-100);
        border: 2px dashed var(--primary-light);
        border-radius: var(--radius-md);
        color: #666;
        font-weight: 500;
        cursor: pointer;
        transition: all var(--anim-duration) ease;
    }

    .custom-file-label:hover {
        background: var(--primary-light);
        color: var(--dark);
    }

    .custom-file-label i {
        margin-right: 10px;
        font-size: 1.2rem;
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
        .voiture-master-container {
            padding: 20px 15px;
        }

        .voiture-card {
            border-radius: var(--radius-md);
        }

        .voiture-header {
            padding: 25px 20px;
        }

        .voiture-title {
            font-size: 1.5rem;
        }

        .voiture-form-container {
            padding: 25px 20px;
        }

        .form-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .form-group.full-width,
        .image-upload-container,
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

<div class="voiture-master-container">
    <div class="voiture-card">
        <div class="voiture-header">
            <div class="header-content">
                <h2 class="voiture-title">Modify the Fleet<span class="animated-icon">🚗</span></h2>
                <p class="voiture-subtitle">Update Your Fleet Information in just a few clicks</p>
            </div>
        </div>

        <div class="voiture-form-container">
            <div class="form-progress">
                <div class="progress-step">
                    <div class="step-number">✓</div>
                    <div class="step-text">Fleet modification</div>
                </div>
            </div>

            <form action="{{ route('admin.voitures.update',$voiture->id) }}" method="POST" enctype="multipart/form-data" id="modifierForm">
                @csrf
                @method('PUT')

                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label" for="marque">
                            <i class="fas fa-trademark" style="margin-right: 5px; color: var(--primary);"></i>
                            Marque
                        </label>
                        <input type="text" class="form-control" id="marque" name="marque" value="{{ old('marque', $voiture->marque) }}" placeholder="Ex: Toyota">
                        <i class="fas fa-car field-icon"></i>
                        @error('marque')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="modele">
                            <i class="fas fa-car-side" style="margin-right: 5px; color: var(--primary);"></i>
                            Modele
                        </label>
                        <input type="text" class="form-control" id="modele" name="modele" value="{{ old('modele', $voiture->modele) }}" placeholder="Ex: Corolla">
                        <i class="fas fa-info-circle field-icon"></i>
                        @error('modele')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="annee">
                            <i class="fas fa-calendar-alt" style="margin-right: 5px; color: var(--primary);"></i>
                            Year
                        </label>
                        <input type="number" class="form-control" id="annee" name="annee" min="1900" value="{{ old('annee', $voiture->annee) }}" placeholder="Ex: 2023">
                        <i class="fas fa-calendar field-icon"></i>
                        @error('annee')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="nombre_places">
                            <i class="fas fa-users" style="margin-right: 5px; color: var(--primary);"></i>
                            Number of Places
                        </label>
                        <input type="number" class="form-control" id="nombre_places" name="nombre_places" min="1" value="{{ old('nombre_places', $voiture->nombre_places) }}" placeholder="Ex: 5">
                        <i class="fas fa-chair field-icon"></i>
                        @error('nombre_places')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="nombre_bags">
                            <i class="fas fa-suitcase" style="margin-right: 5px; color: var(--primary);"></i>
                            Number of Baggage
                        </label>
                        <input type="number" class="form-control" id="nombre_bags" name="nombre_bags" min="0" value="{{ old('nombre_bags', $voiture->nombre_bags) }}" placeholder="Ex: 3">
                        <i class="fas fa-luggage-cart field-icon"></i>
                        @error('nombre_bags')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="prix">
                            <i class="fas fa-tag" style="margin-right: 5px; color: var(--primary);"></i>
                            Price ($)
                        </label>
                        <input type="number" class="form-control" id="prix" name="prix" step="0.01" min="0" value="{{ old('prix', $voiture->prix) }}" placeholder="Ex: 500.00">
                        <i class="fas fa-money-bill-wave field-icon"></i>
                        @error('prix')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="etat">
                            <i class="fas fa-check-circle" style="margin-right: 5px; color: var(--primary);"></i>
                            State
                        </label>
                        <select class="form-control" id="etat" name="etat">
                            <option value="disponible" {{old('etat',$voiture->etat)=="disponible"?"selected":""}}>Available</option>
                            <option value="réservée" {{old('etat',$voiture->etat)=="réservée"?"selected":""}}>Reserved</option>
                            <option value="indisponible" {{old('etat',$voiture->etat)=="indisponible"?"selected":""}}>Unavailabe</option>
                        </select>
                        <i class="fas fa-clipboard-check field-icon"></i>
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">
                            <i class="fas fa-image" style="margin-right: 5px; color: var(--primary);"></i>
                            Image du véhicule
                        </label>
                        <div class="custom-file-input">
                            <div class="custom-file-label">
                                <i class="fas fa-upload"></i>
                                <span>Choisir une image</span>
                            </div>
                            <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)">
                        </div>
                        <div class="image-preview">
                            @if ($voiture->image)
                                <img id="imagePreview" src="{{ asset('storage/' . $voiture->image) }}" alt="Image de la voiture">
                            @else
                                <p id="noImageText">Pas d'image disponible</p>
                                <img id="imagePreview" style="display: none;" alt="Image de la voiture">
                            @endif
                        </div>
                    </div>

                    <div class="submit-wrapper">
                        <button type="button" class="submit-button pulse-effect" onclick="confirmUpdate()">
                            <i class="fas fa-check-circle" style="margin-right: 10px;"></i>
                            Modify
                        </button>
                        <a href="{{route('admin.voitures.index')}}">Back</a>
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
    // Image preview function
    function previewImage(event) {
        const imagePreview = document.getElementById('imagePreview');
        const noImageText = document.getElementById('noImageText');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                if (noImageText) noImageText.style.display = 'none';
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';

                // Add a small animation for the preview
                imagePreview.style.opacity = '0';
                imagePreview.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    imagePreview.style.transition = 'all 0.3s ease';
                    imagePreview.style.opacity = '1';
                    imagePreview.style.transform = 'scale(1)';
                }, 50);
            };
            reader.readAsDataURL(file);
        }
    }

    // Update the file input label when a file is selected
    document.getElementById('image').addEventListener('change', function() {
        const fileName = this.files[0]?.name || 'Aucun fichier sélectionné';
        const label = this.previousElementSibling;
        const span = label.querySelector('span');
        span.textContent = fileName.length > 25 ? fileName.substring(0, 22) + '...' : fileName;
    });

    // Standard confirmation function compatible with most SweetAlert2 versions
    function confirmUpdate() {
        Swal.fire({
            title: 'Confirmation',
            text: 'Are you sure you want to modify this Fleet?',
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
        const formControls = document.querySelectorAll('.form-control, .custom-file-label, .image-preview');
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

    // Add floating animation to car icon
    const carIcon = document.querySelector('.animated-icon');
    if (carIcon) {
        carIcon.style.display = 'inline-block';
        carIcon.style.animation = 'float 3s ease-in-out infinite';
    }
</script>
@endsection
