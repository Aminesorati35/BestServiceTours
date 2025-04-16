@section('title')
    Our Fleet
@endsection
@extends('Users.base')
@section('content')
<style>
    .showFleetSections {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
        font-family: 'Arial', sans-serif;
    }

    .showFleetSections h1 {
        color: #333;
        text-align: center;
        margin-bottom: 30px;
        font-size: 2.5rem;
        border-bottom: 3px solid #dd9323;
        padding-bottom: 10px;
    }

    .fleet {
        display: flex;
        gap: 30px;
        background-color: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 30px;
    }

    .carImg {
        flex: 1;
        max-width: 50%;
    }

    .carImg img {
        width: 100%;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        object-fit: cover;
        aspect-ratio: 4/3;
    }

    .reserveForm {
        flex: 1;
        background-color: #ffffff;
        border-radius: 10px;
        padding: 25px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    }

    .formTitle h3 {
        text-align: center;
        color: #dd9323;
        margin-bottom: 20px;
        font-size: 1.5rem;
    }

    .myForm {
        display: flex;
        gap: 20px;
    }

    .inputLeftSection, .inputRightSection {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .inputSection {
        display: flex;
        flex-direction: column;
    }

    .inputSection label {
        margin-bottom: 5px;
        color: #555;
        font-weight: 600;
    }

    .inputSection input,
    .inputSection select {
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        transition: border-color 0.3s ease;
    }

    .inputSection input:focus,
    .inputSection select:focus {
        outline: none;
        border-color: #dd9323;
    }

    .inputSection .submitButton {
        background-color: #dd9323;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 12px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        font-weight: bold;
        text-transform: uppercase;
    }

    .inputSection .submitButton:hover {
        background-color: #357abd;
    }

    .inputSection span {
        color: red;
        font-size: 0.8rem;
        margin-top: 5px;
    }

    .carInfo {
        margin-top: 30px;
        background-color: #f4f4f4;
        padding: 20px;
        border-radius: 8px;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
    }

    .carInfo p, .carInfo span {
        background-color: white;
        padding: 10px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .carInfo span {
        grid-column: span 3;
        text-align: center;
        font-weight: bold;
        color: #dd9323;
    }
        .carInfo p span{
        font-weight: bold;
    }

    @media (max-width: 768px) {
        .fleet {
            flex-direction: column;
        }

        .carImg, .reserveForm {
            max-width: 100%;
        }

        .myForm {
            flex-direction: column;
        }
    }
</style>
<div class="showFleetSections" >
<h1>Fleet {{ $voiture->modele }}</h1>
<div class="fleetSection" >
    <div class="fleet" >
        <div class="carImg" >
            <img src="{{ asset('storage/' . $voiture->image) }}" alt="">
        </div>
        <div class="reserveForm" >
            <form action="{{ route('client.reservations.store') }}" method="POST">
                <input type="hidden" name="voiture_id" value="{{ $voiture->id }}">
                @csrf
                <div class="formTitle">
                    <h3>Reserve Now</h3>
                </div>
                <div class="myForm">
                    <div class="inputLeftSection">
                        <div class="inputSection">
                            <label for="trajet_id">Trip</label>
                            <select name="trajet_id" id="">
                                @foreach ($trajets as $trajet )
                                    <option value="{{ $trajet->id }}" {{ $trajet->id==old('trajet_id') ? 'selected' : "" }} >{{ $trajet->name }}</option>
                                @endforeach
                            </select>
                            @error('trajet_id')
                            <span>{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="inputSection">
                            <label for="">Pick Up Date </label>
                            <input type="date" name="date_reservation" value="{{ old('date_reservation')}}">
                            @error('date_reservation')
                            <span>{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="inputSection">
                            <label for="time_reservation">Pick Up Time </label>
                            <input type="time" name="time_reservation" value="{{ old('time_reservation') }}">
                            @error('time_reservation')
                            <span>{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="inputRightSection">
                        <div class="inputSection">
                            <label for="">Return</label>
                           <select name="type_trajet" id="">
                            <option value="round_trip">Round Trip</option>
                            <option value="one_way">One Way</option>
                           </select>
                           @error('type_trajet')
                            <span>{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="inputSection">
                            <label for="">Number of people</label>
                            <input type="number" placeholder="Number of people" name="nombre_personnes" value="{{ old('nombre_personnes') }}" >
                            @error('nombre_personnes')
                            <span>{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="inputSection">
                            <label for="nombre_bags">Number of bags</label>
                            <input type="number" name="nombre_bags" placeholder="Number of bags" value="{{ old('nombre_bags') }}">
                            @error('nombre_bags')
                            <span>{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="inputSection">
                            <input type="Submit" value="Reserve Now" class="submitButton">
                        </div>

                    </div>

                </div>

            </form>
        </div>
    </div>
</div>
<div class="carInfo" >
    <p> <span>Marque :</span> {{ $voiture->marque }}</p>
    <p> <span>Modele :</span> {{ $voiture->modele }}</p>
    <p> <span>Year :</span> {{ $voiture->annee  }}</p>
    <p> <span>Places :</span> {{ $voiture->nombre_places }}</p>
    <p> <span>Bagages :</span> {{ $voiture->nombre_bags }}</p>
    <p> <span>Price :</span> {{ $voiture->prix }}</p>
    <span>Status : {{ $voiture->etat }}</span>
</div>
</div>




@endsection