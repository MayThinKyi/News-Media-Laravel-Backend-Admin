@extends('admin.layouts.app')
@section('content')
 <div class="col-10 mx-auto">
            <div class="row d-flex bg-white rounded shadow-sm p-4">
                <div class="row">
                    <a href="javascript:history.back()" class="text-dark ms-3 fs-5 mb-3">
                   <i class="fa-solid fa-arrow-left"></i></a>
                </div>
             <div class="col-lg-5">
                 @if($post->image==null)
                <img  class="rounded img-thumbnail" width="100%"  src="{{asset('images/default.png')}}" alt="">
                @else
                    <img class="rounded img-thumbnail"  width="100%" src="{{asset('storage/'.$post->image)}}" alt="">

                 @endif
             </div>
             <div class="col-lg-7">
                <h3 class="text-dark">{{$post->title}}</h3>
                <p>{{$post->description}}</p>
             </div>
            </div>
            <!-- /.card -->
          </div>@endsection
