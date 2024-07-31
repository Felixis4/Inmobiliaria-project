{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
@if(session('success'))
  <div class="alert alert-success alert-dismissible fade show">
    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>	
    <strong>Success!</strong> {{session('success')}}
    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
    </button>
  </div>
@endif
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Properties</h3>
        </div>
        <div class="card-header">
          <h4 >Houses</h4>
        </div>
        <div class="mt-2 d-flex">
          <a href="{{ route('properties.create') }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-plus"></i></a>
          <a href="{{ route('properties.create') }}" class="btn btn-danger shadow btn-xs sharp mr-1"><i class="fa fa-trash"></i></a>
          <a href="{{ route('properties.create') }}" class="btn btn-info shadow btn-xs sharp mr-1"><i class="fa fa-circle"></i></a>

        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="example" class="display" style="width: 100%">
              <thead>
                <th>Date</th>
                <th>Title</th>
                <th>Price</th>
                <th>Total Area</th>
                <th>Covered Area</th>
                <th>Rooms Number</th>
                <th>Action</th>
                <th style="width:50px;">
                  <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                    <input type="checkbox" class="custom-control-input" id="checkAll" required="">
                    <label class="custom-control-label" for="checkAll"></label>
                  </div>
                </th>
              </thead>
              <tbody>
                @foreach ($houses as $house)
                  <tr>
                    <td>{{ $house->created_at }}</td>
                    <td><a href="{{ route('house.show',$house) }}">{{ $house->title }}</a></td>
                    <td>{{ $house->price }}</td>
                    <td>{{ $house->total_area }}</td>
                    <td>{{ $house->covered_area }}</td>
                    <td>{{ $house->rooms_number }}</td>
                    <td>
                      <div class="d-flex">
                        <a href="{{ route('house.edit', $house) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                        <form action="{{ route('house.destroy', $house) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                        </form> 
                      </div>
                    </td>
                    <td>
                      <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                        <input type="checkbox" class="custom-control-input" id="{{ 'customCheckBox'.$house->id }}" required="">
                        <label class="custom-control-label" for="{{ 'customCheckBox'.$house->id }}"></label>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-header">
          <h4 >Departments</h4>
        </div>
        <div class="mt-2 d-flex">
          <a href="{{ route('properties.create') }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-plus"></i></a>
          <a href="{{ route('properties.create') }}" class="btn btn-danger shadow btn-xs sharp mr-1"><i class="fa fa-trash"></i></a>
          <a href="{{ route('properties.create') }}" class="btn btn-info shadow btn-xs sharp mr-1"><i class="fa fa-circle"></i></a>

        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="example3" class="display" style="width: 100%">
              <thead>
                <th>Title</th>
                <th>Price</th>
                <th>Covered Area</th>
                <th>Rooms Number</th>
                <th>Action</th>
                <th style="width:50px;">
                  <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                    <input type="checkbox" class="custom-control-input" id="checkAll" required="">
                    <label class="custom-control-label" for="checkAll"></label>
                  </div>
                </th>
              </thead>
              <tbody>
                @foreach ($houses as $house)
                  <tr>
                    <td><a href="{{ route('house.show',$house) }}">{{ $house->title }}</a></td>
                    <td>{{ $house->price }}</td>
                    <td>{{ $house->covered_area }}</td>
                    <td>{{ $house->rooms_number }}</td>
                    <td>
                      <div class="d-flex">
                        <a href="{{ route('house.edit', $house) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                        <form action="{{ route('house.destroy', $house) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                        </form> 
                      </div>
                    </td>
                    <td>
                      <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                        <input type="checkbox" class="custom-control-input" id="{{ 'customCheckBox'.$house->id }}" required="">
                        <label class="custom-control-label" for="{{ 'customCheckBox'.$house->id }}"></label>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>        
      </div>
    </div>
    
  </div>


@endsection