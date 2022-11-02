@extends('admin.layouts.app')
@section('content')
 <div class="col-10 offset-2 mt-5">
            <div class="col-md-9">
              <div class="card">
                <div class="card-header p-2">
                  <legend class="text-center"> Change Passowrd</legend>
                </div>
                <div class="card-body">
                     <!-- Alert Start -->
                    @if (session('updateSuccess'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{session('updateSuccess')}}
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if (session('updateFailed'))
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      {{session('updateFailed')}}
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                     <!-- Alert End -->
                  <div class="tab-content">
                    <div class="active tab-pane" id="activity">

                      <form class="form-horizontal" method="POST" action="{{route('admin#updatePassword')}}">
                        @csrf
                        <div class="form-group row">
                          <label  class="col-sm-3 col-form-label">Old Password</label>
                          <div class="col-sm-9">
                            <input value="{{old('adminOldPassword')}}" name="adminOldPassword" type="password" class="form-control @error('adminOldPassword') is-invalid @enderror"  placeholder="Enter Old Password...">
                             @error('adminOldPassword')
                             <small class="text-danger">{{$message}}</small>
                             @enderror
                        </div>
                        </div>
                        <div class="form-group row">
                          <label  class="col-sm-3 col-form-label">New Password</label>
                          <div class="col-sm-9">
                            <input value="{{old('adminNewPassword')}}" name="adminNewPassword" type="password" class="form-control  @error('adminNewPassword') is-invalid @enderror" placeholder="Enter New Password...">
                          @error('adminNewPassword')
                             <small class="text-danger">{{$message}}</small>
                             @enderror
                        </div>
                        <div class="form-group row my-3">
                          <label for="inputEmail" class="col-sm-3 col-form-label">Confirm Password</label>
                          <div class="col-sm-9">
                            <input value="{{old('adminConfirmPassword')}}" name="adminConfirmPassword" type="password" class=" form-control  @error('adminConfirmPassword') is-invalid @enderror" placeholder="Enter Confirm Password...">
                          @error('adminConfirmPassword')
                             <small class="text-danger">{{$message}}</small>
                             @enderror
                        </div>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-dark text-white">Update Password</button>

                        </div>

                      </form>

                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
@endsection
