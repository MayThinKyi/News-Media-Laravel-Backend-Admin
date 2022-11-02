@extends('admin.layouts.app')
@section('content')
 <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Contact List Page</h3>


              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap text-center">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Message</th>

                    </tr>
                  </thead>

                 @if(count($contacts)!=0)
                     <tbody>
                    @foreach ($contacts as $c)
                        <tr>
                            <td>{{$c->id}}</td>
                            <td>{{$c->name}}</td>
                            <td>{{$c->email}}</td>
                            <td>{{$c->message}}</td>



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
