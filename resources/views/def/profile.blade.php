{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')
<!-- row -->
<div class="container-fluid">

  <!-- row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="profile card card-body px-3 pt-3 pb-0">
        <div class="profile-head">
          <div class="photo-content">
            <div class="cover-photo"></div>
          </div>
          <div class="profile-info">
            <div class="profile-photo">
              <img src="{{ asset('images/avatar/empty-avatar.jpg') }}" class="img-fluid rounded-circle" alt="">
            </div>
            <div class="profile-details">
              <div class="profile-name px-3 pt-2">
                <h4 class="text-primary mb-0">Mitchell C. Shay</h4>
                <p>UX / UI Designer</p>
              </div>
              <div class="profile-email px-2 pt-2">
                <h4 class="text-muted mb-0">hello@email.com</h4>
                <p>Email</p>
              </div>
              <div class="dropdown ml-auto">
                <a href="#" class="btn btn-primary light sharp" data-toggle="dropdown" aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></a>
                <ul class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-169px, 30px, 0px);">
                  <li class="dropdown-item"><i class="fa fa-user-circle text-primary mr-2"></i> View profile</li>
                  <li class="dropdown-item"><i class="fa fa-users text-primary mr-2"></i> Add to close friends</li>
                  <li class="dropdown-item"><i class="fa fa-plus text-primary mr-2"></i> Add to group</li>
                  <li class="dropdown-item"><i class="fa fa-ban text-primary mr-2"></i> Block</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">

    <div class="col-xl-8">
      <div class="card">
        <div class="card-body">
          <div class="profile-tab">
            <div class="custom-tab-1">
              <ul class="nav nav-tabs">
                <li class="nav-item"><a href="#profile-settings" data-toggle="tab" class="nav-link">Setting</a>
                </li>
              </ul>
              <div class="tab-content">

                <div id="profile-settings" class="tab-pane fade active show">
                  <div class="pt-3">
                    <div class="settings-form">
                      <h4 class="text-primary">Account Setting</h4>
                      <form action="{{ route('profile-details') }}" method="post">
                        @csrf
                        <div class="form-group">
                          <p>Chage Profile Photo</p>
                          <i class="fa fa-plus"></i>
                          <input type="file">
                        </div>
                        <button class="btn btn-primary" type="submit">submit</button>
                      </form>

                      <form>
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="email" placeholder="Email" class="form-control">
                          </div>
                          <div class="form-group col-md-6">
                            <label>Password</label>
                            <input type="password" placeholder="Password" class="form-control">
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Address</label>
                          <input type="text" placeholder="1234 Main St" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Address 2</label>
                          <input type="text" placeholder="Apartment, studio, or floor" class="form-control">
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label>City</label>
                            <input type="text" class="form-control">
                          </div>
                          <div class="form-group col-md-4">
                            <label>State</label>
                            <select class="form-control" id="inputState">
                              <option selected="">Choose...</option>
                              <option>Option 1</option>
                              <option>Option 2</option>
                              <option>Option 3</option>
                            </select>
                          </div>
                          <div class="form-group col-md-2">
                            <label>Zip</label>
                            <input type="text" class="form-control">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="gridCheck">
                            <label class="custom-control-label" for="gridCheck"> Check me out</label>
                          </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Sign
                        in</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
               <!-- Modal -->
              <div class="modal fade" id="replyModal">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Post Reply</h5>
                      <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">
                      <form>
                        <textarea class="form-control" rows="4">Message</textarea>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Reply</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection			