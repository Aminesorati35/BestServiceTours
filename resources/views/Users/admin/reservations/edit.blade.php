@extends('Users.base')
@section('title')
Gerer Reservation
@endsection
@section('content')
<style>
    .editReservationForm {
        width: 50%;
        margin: 30px auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    h2 {
        text-align: center;
        color: #DD9323; /* Your golden color */
        font-size: 1.8rem;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        font-size: 1.1rem;
        color: #333;
    }

    .form-group input, .form-group select {
        width: 100%;
        padding: 10px;
        font-size: 1rem;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-top: 5px;
    }

    .form-group select {
        background-color: #fff;
        color: #333;
    }

    .form-group select option {
        padding: 8px;
        background-color: #fff;
        color: #333;
    }

    .form-group button {
        width: 100%;
        padding: 12px;
        background-color: #DD9323; /* Your golden color */
        color: white;
        font-size: 1rem;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .form-group button:hover {
        background-color: #b97e19; /* Darker shade of your golden color */
    }

    @media (max-width: 768px) {
        .editReservationForm {
            width: 90%;
        }
    }
    .btn-confirm{
        background-color: rgb(72, 72, 243);
    }
    .btn-cancel{
        background-color: rgb(214, 43, 43);
    }
</style>

<div class="editReservationForm">
    <h2>Modifier la Réservation</h2>

    <form action="{{ route('admin.reservations.update',$reservation->id) }}" method="POST" id="modifierForm">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ $reservation->user->name }}" disabled />
        </div>

        <div class="form-group">
            <label for="trajet">Trajet</label>
            <input type="text" id="trajet" name="trajet" value="{{ $reservation->trajet->name }}" disabled />
        </div>

        <div class="form-group">
            <label for="car">Fleet</label>
            <input type="text" id="car" name="car" value="{{ $reservation->voiture->modele }}" disabled />
        </div>
        <div class="form-group">
            <img src="{{ asset('storage/' . $reservation->voiture->image) }}" width="30%"  alt="">
        </div>

        <div class="form-group">
            <label for="date_reservation">Pick Up Date</label>
            <input type="text" id="date_reservation" name="date_reservation" value="{{ \Carbon\Carbon::parse($reservation->date_reservation)->format('Y-m-d') }}" disabled />
        </div>
        <div class="form-group">
            <label for="time_reservation">Pick Up Time</label>
            <input type="text" id="time_reservation" name="time_reservation" value="{{ \Carbon\Carbon::parse($reservation->time_reservation)->format('H:i') }}" disabled />
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status">
                <option value="pending" {{ $reservation->status == 'pending' ? 'selected' : '' }}>Pending </option>
                <option value="confirmed" {{ $reservation->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                <option value="cancelled" {{ $reservation->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>

        <div class="form-group">
            <button type="button" onclick="confirmUpdate()" >Edit Reservation</button>
        </div>
    </form>
    <script>
        function confirmUpdate() {
            Swal.fire({
                title: 'Are you sure you want to edit this Reservation?',
                text: 'This action will update the trip information.',
                icon: 'warning',
                iconColor:'rgb(72, 72, 243)',
                showCancelButton: true,
                confirmButtonText: 'Modify!',
                cancelButtonText: 'Cancel',
                customClass: {
                    confirmButton: 'btn-confirm',
                    cancelButton: 'btn-cancel'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit the form if confirmed
                    document.getElementById('modifierForm').submit();
                }
            });
        }
    </script>

</div>
@endsection
