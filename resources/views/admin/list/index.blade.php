@extends('admin.layouts.app')
@section('content')
 <div class="col-12">
                 <div class="row text-center">
                    <div class="col-lg-3">
                         @if (session('deleteSuccess'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{session('deleteSuccess')}}
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    </div>
                 </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Admin List Page</h3>

                <div class="card-tools">
                  <form action="{{route('admin#search')}}" method="post">
                    @csrf
                    <div class="input-group input-group-sm" style="width: 150px;">
                    <input value="{{request('searchKey')}}" type="text" name="searchKey" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                  </form>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap text-center">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Address</th>
                      <th>Gender</th>
                      <th></th>
                    </tr>
                  </thead>
                 @if(count($users)!=0)
                     <tbody>
                    @foreach ($users as $u)
                        <tr>
                            <td>{{$u->id}}</td>
                            <td>{{$u->name}}</td>
                            <td>{{$u->email}}</td>
                            <td>{{$u->phone}}</td>
                            <td>{{$u->address}}</td>
                            <td>{{$u->gender}}</td>
                            @if($u->id !=Auth::user()->id)
                                <td >
                                    <a href="{{route('admin#delete',$u->id)}}">
                                        <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>

                                    </a>
                                </td>
                            @endif

                        </tr>
                    @endforeach

                  </tbody>
                 @else
                    <h3 class="text-danger">There is no data...</h3>
                 @endif
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>@endsection
