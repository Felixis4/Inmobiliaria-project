
@extends('welcome')
@section('title','Add property')
@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-xl font-semibold mb-4">Add New Property</h1>
    <form action="{{ route('properties.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="type" class="block text-sm font-medium text-gray-700">Property Type</label>
            <select name="type" id="type" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Select the property type</option>
                @foreach($types as $key => $type)
                    <option value="{{ $key }}">{{ $type }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="city_id" class="block text-sm font-medium text-gray-700">City</label>
            <select name="city_id" id="city_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Select the city</option>
                @foreach($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add Property</button>
    </form>
</div>
@endsection

