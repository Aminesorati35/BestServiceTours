@extends('Users.base')

@section('title')
    Add Fleet
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
    .fleet-master-container {
        position: relative;
        background: linear-gradient(135deg, #f3f4f6 0%, #e9ecef 100%);
        padding: 50px 30px;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .fleet-card {
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
    .fleet-card::before {
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

    .fleet-card::after {
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
    .fleet-header {
        background: linear-gradient(120deg, var(--primary) 0%, var(--primary-dark) 100%);
        padding: 30px;
        position: relative;
        overflow: hidden;
    }

    .fleet-header::before {
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

    .fleet-title {
        color: var(--light);
        margin: 0;
        font-size: 2rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        position: relative;
        display: inline-block;
    }

    .fleet-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 60px;
        height: 4px;
        background: var(--light);
        border-radius: 2px;
    }

    .fleet-subtitle {
        color: rgba(255, 255, 255, 0.85);
        margin-top: 20px;
        font-size: 0.95rem;
        font-weight: 400;
    }

    /* Form container */
    .fleet-form-container {
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
        .fleet-master-container {
            padding: 20px 15px;
        }

        .fleet-card {
            border-radius: var(--radius-md);
        }

        .fleet-header {
            padding: 25px 20px;
        }

        .fleet-title {
            font-size: 1.5rem;
        }

        .fleet-form-container {
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
</style>

<div class="fleet-master-container">
    <div class="fleet-card">
        <div class="fleet-header">
            <div class="header-content">
                <h2 class="fleet-title">Add Fleet <span class="animated-icon">🚗</span></h2>
                <p class="fleet-subtitle">Add a new Fleet to your fleet in just a few clicks</p>
            </div>
        </div>

        <div class="fleet-form-container">
            <div class="form-progress">
                <div class="progress-step">
                    <div class="step-number">1</div>
                    <div class="step-text">Vehicle Registration</div>
                </div>
            </div>

            <form action="{{ route('admin.voitures.store') }}" method="POST" enctype="multipart/form-data" id="addFleetForm">
                @csrf

                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label" for="marque">
                            <i class="fas fa-trademark" style="margin-right: 5px; color: var(--primary);"></i>
                            Brand
                        </label>
                        <input type="text" class="form-control" id="marque" name="marque" value="{{ old('marque') }}" placeholder="Ex: Toyota">
                        <i class="fas fa-car field-icon"></i>
                        @error('marque')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="modele">
                            <i class="fas fa-car-side" style="margin-right: 5px; color: var(--primary);"></i>
                            Model
                        </label>
                        <input type="text" class="form-control" id="modele" name="modele" value="{{ old('modele') }}" placeholder="Ex: Corolla">
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
                        <input type="number" class="form-control" id="annee" name="annee" min="1900" value="{{ old('annee') }}" placeholder="Ex: 2023">
                        <i class="fas fa-calendar field-icon"></i>
                        @error('annee')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="nombre_places">
                            <i class="fas fa-users" style="margin-right: 5px; color: var(--primary);"></i>
                            Number of Seats
                        </label>
                        <input type="number" class="form-control" id="nombre_places" name="nombre_places" min="1" value="{{ old('nombre_places') }}" placeholder="Ex: 5">
                        <i class="fas fa-chair field-icon"></i>
                        @error('nombre_places')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="nombre_bags">
                            <i class="fas fa-suitcase" style="margin-right: 5px; color: var(--primary);"></i>
                            Number of Luggage
                        </label>
                        <input type="number" class="form-control" id="nombre_bags" name="nombre_bags" min="0" value="{{ old('nombre_bags') }}" placeholder="Ex: 3">
                        <i class="fas fa-luggage-cart field-icon"></i>
                        @error('nombre_bags')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="prix">
                            <i class="fas fa-tag" style="margin-right: 5px; color: var(--primary);"></i>
                            Price
                        </label>
                        <input type="number" class="form-control" id="prix" name="prix" step="0.01" min="0" value="{{ old('prix') }}" placeholder="Ex: 500.00">
                        <i class="fas fa-money-bill-wave field-icon"></i>
                        @error('prix')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="etat">
                            <i class="fas fa-check-circle" style="margin-right: 5px; color: var(--primary);"></i>
                            Status
                        </label>
                        <select class="form-control" id="etat" name="etat">
                            <option value="disponible" {{ old('etat')=='disponible' ? "selected" : "" }} >Available</option>
                            <option value="réservée" {{ old('etat')=='réservée' ? "selected" : "" }}>Reserved</option>
                            <option value="indisponible" {{ old('etat')=='indisponible' ? "selected" : "" }}>Unavailable</option>
                        </select>
                        <i class="fas fa-clipboard-check field-icon"></i>
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">
                            <i class="fas fa-image" style="margin-right: 5px; color: var(--primary);"></i>
                            Vehicle Image
                        </label>
                        <div class="custom-file-input">
                            <div class="custom-file-label">
                                <i class="fas fa-upload"></i>
                                <span>Choose an image</span>
                            </div>
                            <input type="file" id="imageInput" name="image" accept="image/*">
                        </div>
                        <div class="image-preview">
                            <img id="imagePreview" src="#" alt="Image preview" style="display: none;">
                        </div>
                    </div>

                    <div class="submit-wrapper">
                        <button type="submit" class="submit-button pulse-effect">
                            <i class="fas fa-plus-circle" style="margin-right: 10px;"></i>
                            Add Fleet
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

<script>
    // Image preview function
    document.getElementById('imageInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const preview = document.getElementById('imagePreview');
                preview.src = e.target.result;

                // Add animation for image preview
                preview.style.opacity = '0';
                preview.style.transform = 'scale(0.95)';
                preview.style.display = 'block';

                setTimeout(() => {
                    preview.style.transition = 'all 0.3s ease';
                    preview.style.opacity = '1';
                    preview.style.transform = 'scale(1)';
                }, 50);
            }

            reader.readAsDataURL(file);

            // Update file input label
            const fileName = file.name;
            const labelSpan = this.previousElementSibling.querySelector('span');
            labelSpan.textContent = fileName.length > 25 ? fileName.substring(0, 22) + '...' : fileName;
        }
    });

    // Add animation to form fields on page load
    document.addEventListener('DOMContentLoaded', function() {
        const formControls = document.querySelectorAll('.form-control, .custom-file-label');
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

        // Add floating animation to car icon
        const carIcon = document.querySelector('.animated-icon');
        if (carIcon) {
            carIcon.style.display = 'inline-block';
            carIcon.style.animation = 'float 3s ease-in-out infinite';
        }
    });
</script>
@endsection
