<!-- resources/views/cars/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Create a New Car</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('cars.store') }}" method="POST">
                @csrf

                <!-- Car Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Car Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <!-- Company Name -->
                <div class="mb-3">
                    <label for="company_name" class="form-label">Company Name</label>
                    <input type="text" class="form-control" id="company_name" name="company_name" required>
                </div>

                <!-- Price -->
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price" required>
                </div>

                <!-- Image URLs (multiple) -->
                <div class="mb-3">
                    <label for="images" class="form-label">Car Image URLs (separate with commas)</label>
                    <textarea class="form-control" id="images" name="images" placeholder="Enter image URLs separated by commas" required></textarea>
                </div>

                <!-- Model Year -->
                <div class="mb-3">
                    <label for="model_year" class="form-label">Model Year</label>
                    <input type="number" class="form-control" id="model_year" name="model_year" required>
                </div>

                <!-- Max Speed -->
                <div class="mb-3">
                    <label for="max_speed" class="form-label">Max Speed</label>
                    <input type="number" class="form-control" id="max_speed" name="max_speed" required>
                </div>

                <!-- Torque -->
                <div class="mb-3">
                    <label for="torque" class="form-label">Torque</label>
                    <input type="number" class="form-control" id="torque" name="torque" required>
                </div>

                <!-- No. of Horses -->
                <div class="mb-3">
                    <label for="no_of_horses" class="form-label">No. of Horses</label>
                    <input type="number" class="form-control" id="no_of_horses" name="no_of_horses" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
