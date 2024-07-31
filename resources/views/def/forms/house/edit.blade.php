{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')

<div class="container-fluid">
  <div class="col-xl-6 col-lg-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Edit House</h4>
      </div>
      <div class="card-body">
        <div class="basic-form">
          <form action="{{ route('house.update', $house) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="form-group">
                <input type="text" class="form-control input-default" name="title" placeholder="Title" value="{{ old('title', $house->title ?? '') }}">
                @error('title')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
                </div>
                <div class="form-group">
                <textarea class="form-control" rows="4" id="comment" name="description" placeholder="Description">{{ old('description', $house->description ?? '') }}</textarea>
                @error('description')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Price</label>
                    <div class="input-group mb-3  input">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="number" name="price" class="form-control" value="{{ old('price', $house->price ?? '') }}">
                        @error('price')
                        <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label>Number of rooms</label>
                    <div class="input-group mb-3  input">
                        <input type="number" name="rooms_number" class="form-control" value="{{ old('rooms_number', $house->rooms_number ?? '') }}">
                        @error('rooms_number')
                        <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label>Total Area</label>
                    <div class="input-group mb-3  input">
                        <div class="input-group-prepend">
                            <span class="input-group-text">mts(2)</span>
                        </div>
                        <input type="number" name="total_area" class="form-control" value="{{ old('total_area', $house->total_area ?? '') }}">
                        @error('total_area')
                        <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label>Covered Area</label>
                    <div class="input-group mb-3  input">
                        <div class="input-group-prepend">
                            <span class="input-group-text">mts(2)</span>
                        </div>
                        <input type="number" name="covered_area" class="form-control" value="{{ old('covered_area', $house->covered_area ?? '') }}">
                        @error('covered_area')
                        <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-row">
              @foreach (['light', 'natural_gas', 'phone', 'water', 'sewers', 'internet', 'asphalt'] as $feature)
              <div class="custom-control custom-checkbox m-2 checkbox-success">
                <input type="hidden" name="{{ $feature }}" value="0">
                <input type="checkbox" class="custom-control-input" name="{{ $feature }}" value="1" id="{{ $feature }}" @checked(old($feature, $property->$feature))>
                <label class="custom-control-label" for="{{ $feature }}">{{ str_replace('_',' ',ucfirst($feature)) }}:</label>
              </div>
              @endforeach
            </div>
            <div class="input-group m-2">
              <div class="input-group-prepend">
                <span class="input-group-text">Property Images</span>
              </div>
              <div class="custom-file">
                <input type="file" name="images[]" multiple class="custom-file-input">
                <label class="custom-file-label">Choose file</label>
              </div>
            </div>
            <div class="form-row">
              <div>
                @foreach ($images as $image)
                  <div class="relative">
                    <img src="{{ Storage::url($image->path) }}" alt="House Image" class="rounded-lg m-2" style="width: 140px; height: 100px; object-fit: cover;">
                  </div>
                @endforeach
              </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection