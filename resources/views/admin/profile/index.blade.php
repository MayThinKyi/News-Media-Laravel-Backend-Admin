@extends('admin.layouts.app')
@section('content')
 <div class="col-10 offset-2 mt-5">
            <div class="col-md-9">
              <div class="card">
                <div class="card-header p-2">
                  <legend class="text-center">User Profile</legend>
                </div>
                <div class="card-body">
                     <!-- Alert Start -->
                    @if (session('updateSuccess'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{session('updateSuccess')}}
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    @endif
                     <!-- Alert End -->
                  <div class="tab-content">
                    <div class="active tab-pane" id="activity">

                      <form class="form-horizontal" method="POST" action="{{route('admin#update')}}">
                        @csrf
                        <div class="form-group row">
                          <label  class="col-sm-2 col-form-label">Name</label>
                          <div class="col-sm-10">
                            <input value="{{old('adminName',$user->name)}}" name="adminName" type="text" class="form-control @error('adminName') is-invalid @enderror"  placeholder="Enter Name...">
                             @error('adminName')
                             <small class="text-danger">{{$message}}</small>
                             @enderror
                        </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input value="{{old('adminEmail',$user->email)}}" name="adminEmail" type="email" class="form-control  @error('adminEmail') is-invalid @enderror" placeholder="Enter Email...">
                          @error('adminEmail')
                             <small class="text-danger">{{$message}}</small>
                             @enderror
                        </div>
                        </div>
                         <div class="form-group row">
                          <label for="" class="col-sm-2 col-form-label">Phone</label>
                          <div class="col-sm-10">
                            <input value="{{old('adminPhone',$user->phone)}}" type="number" name="adminPhone" class="form-control  @error('adminPhone') is-invalid @enderror"  placeholder="Enter Phone...">
                            @error('adminPhone')
                            <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        </div>
                         <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Address</label>
                          <div class="col-sm-10">
                            <textarea  placeholder="Enter Address..." name="adminAddress" cols="30" rows="10" class="form-control @error('adminAddress') is-invalid @enderror">{{old('adminAddress',$user->address)}}</textarea>
                             @error('adminAddress')
                             <small class="text-danger">{{$message}}</small>
                             @enderror
                        </div>
                        </div>
                         <div class="form-group row">
                          <label for="" class="col-sm-2 col-form-label">Gender</label>
                          <div class="col-sm-10">
                            <select name="adminGender" class="form-control">
                                <option value="">Choose One Option...</option>
                                <option value="male" @if($user->gender=='male') selected @endif>Male</option>
                                <option value="female" @if($user->gender=='female') selected @endif>Female</option>
                            </select>
                             @error('adminGender')
                             <small class="text-danger">{{$message}}</small>
                              @enderror
                          </div>
                        </div>

                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <a href="{{route('admin#changePasswordPage')}}">Change Password</a>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn bg-dark text-white">Submit</button>
                          </div>
                        </div>
                      </form>

                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
@endsection
