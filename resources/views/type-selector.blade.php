@extends('welcome')
@section('title','type Select')
@section('content')
@if (Session::get('success'))
    <div class="container  block w-1/3 rounded m-auto bg-white text-center">
        <strong>La Publicacion fue realizada con exito</strong>
    </div>        
@endif
@if ($errors->any())
    <div class="container  block w-1/3 rounded m-auto bg-white text-center">
        <div class="alert alert-danger">
            <strong>No se ah podido realizar la publicacion</strong><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif  

<div class="container mx-auto  p-6">
    <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden md:max-w-lg ">
        <div class="md:flex">
            <div class="w-full p-3">
                <div class="relative">
                    <h1 class="text-2xl font-bold text-center mb-4">Add Property</h1>
                    <form action="{{ route('type-selector.store') }}" method="POST">
                        @csrf
                        <div class="mb-6">
                            <label for="property_type" class="block mb-2 text-sm font-medium text-gray-900">Property Type</label>
                            <select id="property_type" name="property_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option selected>Choose a type</option>
                                <option value="house">House</option>
                                <option value="department">Department</option>
                                <option value="camp">Camp</option>
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="city" class="block mb-2 text-sm font-medium text-gray-900">City</label>
                            <select id="city" name="city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option selected>Choose a city</option>
                                <option value="vcp">VCP</option>
                                <option value="santa rosa">Santa Rosa</option>                            
                                <option value="vgb">Villa General Belgrano</option>                            
                            </select>
                        </div>
                        <button type="submit" class="text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Add Property</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
