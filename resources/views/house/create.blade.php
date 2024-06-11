@extends('welcome')
@section('title','House')
@section('content')
<div class="flex justify-center">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h2 class="mb-6 text-2xl font-bold text-gray-900">Add a New House</h2>
        <form action="{{ route('house.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="city_id" value="{{ request('city_id') }}">
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <ul class="list-disc list-inside text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                    Title
                </label>
                <input class="shadow appearance-none border {{ $errors->has('title') ? 'border-red-500' : '' }} rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" type="text" placeholder="Title" name="title">
                @error('title')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                    Description
                </label>
                <textarea class="shadow appearance-none border {{ $errors->has('description') ? 'border-red-500' : '' }} rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description" placeholder="Description" name="description"></textarea>
                @error('description')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="price">
                    Price
                </label>
                <input class="shadow appearance-none border {{ $errors->has('price') ? 'border-red-500' : '' }} rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="price" type="number" placeholder="Price" name="price">
                @error('price')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="total_area">
                    Total Area (sqm)
                </label>
                <input class="shadow appearance-none border {{ $errors->has('total_area') ? 'border-red-500' : '' }} rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="total_area" type="number" placeholder="Total Area" name="total_area">
                @error('total_area')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="covered_area">
                    Covered Area (sqm)
                </label>
                <input class="shadow appearance-none border {{ $errors->has('covered_area') ? 'border-red-500' : '' }} rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="covered_area" type="number" placeholder="Covered Area" name="covered_area">
                @error('covered_area')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="rooms_number">
                    Number of Rooms
                </label>
                <input class="shadow appearance-none border {{ $errors->has('rooms_number') ? 'border-red-500' : '' }} rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="rooms_number" type="number" placeholder="Number of Rooms" name="rooms_number">
                @error('rooms_number')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <h3 class="text-lg font-medium text-gray-900">
                    Features:
                </h3>
                <ul>
                    @foreach(['light', 'natural_gas', 'phone', 'water', 'sewers', 'internet', 'asphalt'] as $feature)
                    <li>
                        <label for="{{ $feature }}">{{ str_replace('_',' ',ucfirst($feature)) }}:</label>
                        <input type="hidden" name="{{ $feature }}" value="0">
                        <input type="checkbox" name="{{ $feature }}" value="1">
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="mb-6">
                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">
                    Choose images to upload:
                </label>
                <input type="file" name="images[]" multiple />
            </div>

            <div class="mb-4">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Submit
                </button>
            </div>
        </form>
    </div>
    </div>
@endsection
