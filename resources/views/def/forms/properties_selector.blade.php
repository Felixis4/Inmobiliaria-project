
{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')

<div class="container-fluid">
  <div class="row page-titles mx-0">
  <div class="col-xl-6 col-lg-6">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Add Property</h4>
        </div>
        <div class="card-body">
          <div class="basic-form">
            <form action="{{ route('properties.redirector') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="type">Property Type</label>
                    <select class="form-control" name="type" id="type">
                        <option value="">Select the property type</option>
                        @foreach($types as $key => $type)
                            <option value="{{ $key }}">{{ $type }}</option>
                        @endforeach
                    </select>
                @error('type')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
                </div>

                <div class="form-group">
                    <label for="city_id">City</label>
                    <select name="city_id" id="city_id" class="form-control">
                    <option value="">Select the city</option>
                @foreach($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach
                    </select>
                @error('city_id')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
                </div>
                <button type="submit" class="btn btn-primary">Add Property</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection