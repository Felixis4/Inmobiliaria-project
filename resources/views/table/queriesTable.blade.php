{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Queries</h3>
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
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th style="width:50px;">
                  <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                    <input type="checkbox" class="custom-control-input" id="checkAll" required="">
                    <label class="custom-control-label" for="checkAll"></label>
                  </div>
                </th>
              </thead>
              <tbody>
                @foreach ($queries as $query)
                  <tr>
                    <td><a href="{{ route('query.show',$query) }}">{{ $query->name }}</a></td>
                    <td>{{ $query->email }}</td>
                    <td>
                      {{ $query->subject }}
                    </td>
                    <td>
                      <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                        <input type="checkbox" class="custom-control-input" id="{{ 'customCheckBox'.$query->id }}" required="">
                        <label class="custom-control-label" for="{{ 'customCheckBox'.$query->id }}"></label>
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