@extends('welcome')
@section('title', 'Houses List')

@section('content')
<div class="container mx-auto px-4">
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    <h1 class="text-2xl font-bold my-4">Houses List</h1>
    <div class="mb-4">
        <a href="{{ route('properties.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Add New House
        </a>
    </div>
    @foreach ($houses as $house)
    <div class="flex justify-between m-2 rounded items-center bg-white px-4 py-2 border-b">
        <!-- Clickable title that redirects to the house's detail page -->
        <div>
            <a href="{{ url('/house/' . $house->id) }}" class="text-blue-600 hover:text-blue-800">{{ $house->title }}</a>
        </div>
        <div>
            <a href="{{ route('house.edit', $house) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded">Edit</a>
            <form action="{{ route('house.destroy', $house) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>
    @endforeach
</div>
@endsection
