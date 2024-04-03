@extends('welcome')
@section('title', 'Houses List')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold my-4">Houses List</h1>
    <div class="mb-4">
        <a href="{{ route('house.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Add New House
        </a>
    </div>
    <div class="mb-4">
        <a href="" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Add New Department
        </a>
    </div><div class="mb-4">
        <a href="" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Add New Field
        </a>
    </div>
    @foreach ($houses as $house)
    <div class="flex justify-between items-center bg-white px-4 py-2 border-b">
        <div>{{ $house->title }}</div>
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
