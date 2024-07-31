@extends('welcome')
@section('title','Query')
@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-semibold text-black">{{ $query->name }}</h1>
    <div class="mt-4 bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <h3 class="text-lg font-medium text-gray-900">Query Details</h3>
                <p class="mt-1 text-sm text-gray-600">Id: {{ $query->id }}</p>
                <p class="mt-1 text-sm text-gray-600">Name: {{ $query->name }}</p>
                <p class="mt-1 text-sm text-gray-600">Email: {{ $query->email }}</p>
                <p class="mt-1 text-sm text-gray-600">Subject: {{ $query->subject }}</p>
                <p class="mt-1 text-sm text-gray-600">
                <span class="block max-h-32 overflow-hidden overflow-ellipsis break-words">
                    Query:
                    {{ $query->query }}
                </span>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
