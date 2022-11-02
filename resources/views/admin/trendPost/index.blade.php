@extends('admin.layouts.app')
@section('content')
 <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Trend Post Page</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap text-center">
                  <thead>
                    <tr>
                      <th> ID</th>
                      <th>Post Title</th>
                      <th>Post Image</th>
                      <th>View Count</th>

                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                  @foreach ($posts as $post)

                    <tr>
                      <td>{{$post->id}}</td>
                      <td>{{$post->title}}</td>
                      <td>
                          @if($post->image==null)
                                <img  class="rounded" width="100px" height="80px" src="{{asset('images/default.png')}}" alt="">
                                @else
                                   <img class="rounded" width="100px" height="80px" src="{{asset('storage/'.$post->image)}}" alt="">

                                @endif
                      </td>
                      <td>{{$post->post_count}}</td>

                      <td>
                        <a href="{{route('admin#trendPostDetails',$post->id)}}">
                             <button class="btn btn-sm bg-primary text-white"><i class="fa-solid fa-circle-info"></i></button>

                        </a>
                      </td>
                    </tr>


                  @endforeach

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>@endsection
