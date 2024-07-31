{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')
<!-- row -->
<div class="container">
  <div class="row">
    <div class="col-xl-9 col-xxl-12">
      <div class="row">
        <div class="col-xl-3 col-xxl-3 col-lg-6 col-sm-6">
          <a href="{{ route('clients') }}">
            <div class="card overflow-hidden">
              <div class="card-body pb-0 px-4 py-4">
                <div class="row">
                  <div class="col">
                    <h5 class="mb-1">Clients</h5>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-xxl-3 col-lg-6 col-sm-6">
          <a href="{{ route('properties') }}">
            <div class="card bg-success	overflow-hidden">
              <div class="card-body pb-0 px-4 py-4">
                <div class="row">
                  <div class="col">
                    <h5 class="text-white mb-1">Properties</h5>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-xxl-3 col-lg-6 col-sm-6">
          <a href="{{ route('queries') }}">
            <div class="card bg-primary overflow-hidden">
              <div class=" card-body pb-0 px-4 py-4">
                <div class="row">
                  <div class="col text-white">
                    <h5 class="text-white mb-1">Queries</h5>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
    <!-- <div class="col-xl-6 col-xxl-12 col-lg-12 col-md-12">
      <div id="user-activity" class="card">
        <div class="card-header border-0 pb-0 d-sm-flex d-block">
          <div>
            <h4 class="card-title">History 2013 - 2020</h4>
            <p class="mb-1">Lorem Ipsum is simply dummy text of the printing</p>
          </div>
          <div class="card-action">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#user" role="tab">
                  Day
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#session" role="tab">
                Week
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#bounce" role="tab">
                  Month
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#session-duration" role="tab">
                  Year
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="card-body">
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="user" role="tabpanel">
              <canvas id="activity" class="chartjs"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div> -->
  </div>
</div>

@endsection			