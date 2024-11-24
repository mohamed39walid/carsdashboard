@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Cars List</h3>
        </div>
        <div class="card-body">
            <a href="{{ route('cars.create') }}" class="btn btn-success mb-3">Add New Car</a>

            <!-- Cars Table -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Car Name</th>
                        <th>Company Name</th>
                        <th>Price</th>
                        <th>Model Year</th>
                        <th>Max Speed</th>
                        <th>Torque</th>
                        <th>No. of Horses</th>
                        <th>Car Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if($cars && $cars->isNotEmpty())
                        @foreach($cars as $car)
                            <tr>
                                <td>{{ $car->name }}</td>
                                <td>{{ $car->company_name }}</td>
                                <td>${{ number_format($car->price, 2) }}</td>
                                <td>{{ $car->model_year }}</td>
                                <td>{{ $car->max_speed }} km/h</td>
                                <td>{{ $car->torque }} Nm</td>
                                <td>{{ $car->no_of_horses }} HP</td>
                                <td>
                                    @if($car->images)
                                    @php
                                        // Decode the JSON string into an array
                                        $images = json_decode($car->images); 
                                    @endphp
                                    @if(is_array($images))
                                        @foreach($images as $image)
                                            <img src="{{ $image }}" alt="{{ $car->name }}" width="100" class="mb-2">
                                        @endforeach
                                    @else
                                        <span>No valid image URLs found.</span>
                                    @endif
                                @else
                                    <span>No Image</span>
                                @endif
                                
                                </td>
                                <td>
                                    <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9" class="text-center">No cars available</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
