@extends('admin.layouts.app')
@section('content')
<div class="col-4 ">
<div class="card rounded shadow-sm py-3 px-4">
    <form action="{{route('admin#createCategory')}}" method="post">
        @csrf
        <div class="my-2">
            <label >Category Name</label>
            <input type="text" value="{{old('categoryName')}}" name="categoryName" placeholder="Enter Category Name..." class="form-control @error('categoryName') is-invalid @enderror">
             @error('categoryName')
             <small class="text-danger">{{$message}}</small>
              @enderror
        </div>
        <div class="mt-3">
            <label >Category Description</label>

            <textarea  name="categoryDescription" placeholder="Enter Category Description..." cols="30" rows="10" class="form-control @error('categoryDescription') is-invalid @enderror">{{old('categoryDescription')}}</textarea>
              @error('categoryDescription')
             <small class="text-danger">{{$message}}</small>
              @enderror
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-dark text-white mt-4">Create Category</button>

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
                <h3 class="card-title">Category List Page</h3>

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
                 @if(count($categories)!=0)
                  <thead>
                    <tr>
                      <th>Category ID</th>
                      <th>Category Name</th>
                      <th>Category Description</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($categories as $c)
                          <tr >
                            <td>{{$c->id}}</td>
                            <td>{{$c->title}}</td>
                            <td>{{$c->description}}</td>
                            <td>
                                <a href="{{route('admin#editCategoryPage',$c->id)}}">
                                     <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>

                                </a>
                                <a href="{{route('admin#deleteCategory',$c->id)}}">
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
