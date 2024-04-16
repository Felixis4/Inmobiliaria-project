@extends('welcome')
@section('title','House')
@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-semibold text-black">{{ $house->title }}</h1>
    <div class="mt-4 bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <h3 class="text-lg font-medium text-gray-900">House Details</h3>
                <p class="mt-1 text-sm text-gray-600">Id: {{ $house->id }}</p>
                <p class="mt-1 text-sm text-gray-600">Description: {{ $house->description }}</p>
                <p class="mt-1 text-sm text-gray-600">Price: ${{ number_format($house->price, 2) }}</p>
                <p class="mt-1 text-sm text-gray-600">Total Area: {{ $house->total_area }} sqm</p>
                <p class="mt-1 text-sm text-gray-600">Covered Area: {{ $house->covered_area }} sqm</p>
                <p class="mt-1 text-sm text-gray-600">Rooms: {{ $house->rooms_number }}</p>
            </div>
            <div>
                <h3 class="text-lg font-medium text-gray-900">Features</h3>
                <ul class="list-disc pl-5">
                    @foreach ($house->features as $feature)
                        <li class="text-sm text-gray-600">{{ $feature->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
