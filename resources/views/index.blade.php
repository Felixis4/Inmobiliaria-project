@extends('welcome')
@section('title', 'Home')
@section('content')    
<div class="m-2">
    <a class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>

<div class="text-center m-2">    
    <h1 class="mb-6 text-4xl font-bold text-gray-800">Welcome to BlaBla</h1>


    <div class="space-x-4">

        <a href="properties/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Create Publication
        </a>

        <a href="house" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            View Publications
        </a>
    </div>

</div>
@endsection
