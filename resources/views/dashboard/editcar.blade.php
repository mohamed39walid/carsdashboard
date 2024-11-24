@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Edit Car</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('cars.update', $car->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Car Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Car Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $car->name }}" required>
                </div>

                <!-- Company Name -->
                <div class="mb-3">
                    <label for="company_name" class="form-label">Company Name</label>
                    <input type="text" class="form-control" id="company_name" name="company_name" value="{{ $car->company_name }}" required>
                </div>

                <!-- Price -->
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ $car->price }}" required>
                </div>

                <!-- Model Year -->
                <div class="mb-3">
                    <label for="model_year" class="form-label">Model Year</label>
                    <input type="number" class="form-control" id="model_year" name="model_year" value="{{ $car->model_year }}" required>
                </div>

                <!-- Max Speed -->
                <div class="mb-3">
                    <label for="max_speed" class="form-label">Max Speed (km/h)</label>
                    <input type="number" class="form-control" id="max_speed" name="max_speed" value="{{ $car->max_speed }}" required>
                </div>

                <!-- Torque -->
                <div class="mb-3">
                    <label for="torque" class="form-label">Torque (Nm)</label>
                    <input type="number" class="form-control" id="torque" name="torque" value="{{ $car->torque }}" required>
                </div>

                <!-- No. of Horses -->
                <div class="mb-3">
                    <label for="no_of_horses" class="form-label">No. of Horses</label>
                    <input type="number" class="form-control" id="no_of_horses" name="no_of_horses" value="{{ $car->no_of_horses }}" required>
                </div>

                <!-- Images (URLs) -->
                <div class="mb-3">
                    <label for="images" class="form-label">Car Image URLs (separated by commas)</label>
                    <textarea class="form-control" id="images" name="images" rows="4" placeholder="Enter image URLs separated by commas" required>{{ implode(',', json_decode($car->images)) }}</textarea>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
