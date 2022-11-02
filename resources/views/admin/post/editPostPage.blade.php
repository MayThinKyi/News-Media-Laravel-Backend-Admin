@extends('admin.layouts.app')
@section('content')
<div class="col-4 ">
<div class="card rounded shadow-sm py-3 px-4">
    <form action="{{route('admin#updatePost',$post->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="my-2">
            <label >Post Title</label>
            <input type="text" value="{{old('postName',$post->title)}}" name="postName" placeholder="Enter Post Title..." class="form-control @error('postName') is-invalid @enderror">
             @error('postName')
             <small class="text-danger">{{$message}}</small>
              @enderror
        </div>
        <div class="mt-3">
            <label >Post Description</label>

            <textarea  name="postDescription" placeholder="Enter Post Description..." cols="30" rows="10" class="form-control @error('postDescription') is-invalid @enderror">{{old('postDescription',$post->description)}}</textarea>
              @error('postDescription')
             <small class="text-danger">{{$message}}</small>
              @enderror
        </div>
        @if($post->image!=null)
        <div  class="my-2 mt-4">
            <img  class="rounded"  width="300px" height="220px" src="{{asset('storage/'.$post->image)}}">
        </div>
        @else
        <div class="my-2 mt-4">
            <img class="rounded"  width="300px" height="220px" src="{{asset('images/default.png')}}">
        </div>
        @endif
         <div class="my-2">
            <label >Post Image</label>
            <input type="file"  name="postImage" class="form-control @error('postImage') is-invalid @enderror">
             @error('postImage')
             <small class="text-danger">{{$message}}</small>
              @enderror
        </div>
         <div class="my-2">
            <label >Post Category</label>
            <select  name="postCategory" class="form-control @error('postCategory') is-invalid @enderror">
                <option value="">Choose One Category:</option>
                @if(count($categories)!=0)
                @foreach ($categories as $c)
                    <option value="{{$c->id}}" @if($post->category==$c->id) selected @endif>{{$c->title}}</option>
                @endforeach
                @endif
            </select>
             @error('postCategory')
             <small class="text-danger">{{$message}}</small>
              @enderror
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-dark text-white mt-4">Update Post</button>

        </div>
    </form>
</div>
</div>
 <div class="col-8">
    <div class="col-5 mx-auto">
         @if (session('deleteSuccess'))
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      {{session('deleteSuccess')}}
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
    </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Post List Page</h3>

                <div class="card-tools">
                 <form action="{{route('admin#searchCategory')}}" method="get">
                    @csrf
                     <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" value="{{request('searchKey')}}" name="searchKey" class="form-control float-right" placeholder="Search">

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
                 @if(count($posts)!=0)
                  <thead>
                    <tr>
                      <th>Post ID</th>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Image</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($posts as $p)
                          <tr style="align-content:center" >
                            <td>{{$p->id}}</td>
                            <td>{{$p->title}}</td>
                            <td>{{Str::limit($p->description, 10, '...')}}</td>
                             <td>
                                @if($p->image==null)
                                <img  class="rounded" width="100px" height="80px" src="{{asset('images/default.png')}}" alt="">
                                @else
                                   <img class="rounded" width="100px" height="80px" src="{{asset('storage/'.$p->image)}}" alt="">

                                @endif
                             </td>
                            <td>
                                <a href="{{route('admin#editPostPage',$p->id)}}">
                                     <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>

                                </a>
                                <a href="{{route('admin#deletePost',$p->id)}}">
                                    <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>

                                </a>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                   @else
                    <h3 class="m-3 text-danger">There is no data...</h3>
                  @endif
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

@endsection
