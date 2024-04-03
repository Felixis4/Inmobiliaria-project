@extends('welcome')
@section('title', 'Home')
@section('content')

<div class="text-center m-2">
    <h1 class="mb-6 text-4xl font-bold text-gray-800">Welcome to BlaBla</h1>
    <div class="space-x-4">

        <a href="house" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Create Publication
        </a>

        <a href="house" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            View Publications
        </a>
    </div>
</div>
@endsection
