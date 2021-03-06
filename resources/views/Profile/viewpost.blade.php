@extends('Layouts.Profile')

@section('Profile')
    id="active"
@endsection

@section('myPost')
    active
@endsection

@section('content')
<div class="">
    <h1 class="font-weight-light">Post Details</h1>
    <hr>


    @if($post->user_id == session('user')->id)
      <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Edit Post</button>
      <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal2" data-whatever="@getbootstrap">Delete Post</button>
    @endif


    <hr>
    @include('Include.error')
    <p id="custom_post_data">{{$post->post}}</p>
    <h5 class="font-weight-light">Date : {{$post->date}}</h5>


    <div class="row">
        <div class="col-4">
            <img class="img-thumbnail post-pic-show" src="/upload/user_post_picture/{{$post->img1}}" alt="">
        </div>
        <div class="col-4">
            <img class="img-thumbnail post-pic-show" src="/upload/user_post_picture/{{$post->img2}}" alt="">
        </div>
        <div class="col-4">
            <img class="img-thumbnail post-pic-show" src="/upload/user_post_picture/{{$post->img3}}" alt="">
        </div>
    </div>

    <!--Comments-->
    @include('Layouts.ViewComment')

    <form class="container-fluid" action="{{route('addComment_Userpost')}}" method="post">
        @include('Layouts.Comment')
    </form>

    <!-- Edit Post Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Are you sure want to Update ?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="{{route('updateUserPost')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <div class="row" id="margin-1">
                    <div class="form-group col-9">
                        <label id="post-head">Put Your Thoughts Here</label>
                        <textarea name="post_data" required class="form-control" rows="8" placeholder="Your Post">{{$post->post}}</textarea>
                    </div>
                    <div class="form-group col-3" id="post-image">
                        <input type="file" name="img1" class="form-control-file post-img" value="{{$post->img1}}"><img src="/upload/user_post_picture/{{$post->img1}}" width="100px" alt="">
                        <input type="file" name="img2" class="form-control-file post-img" value="{{$post->img2}}"><img src="/upload/user_post_picture/{{$post->img2}}" width="100px" alt="">
                        <input type="file" name="img3" class="form-control-file post-img" value="{{$post->img3}}"><img src="/upload/user_post_picture/{{$post->img3}}" width="100px" alt="">
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Delete Post Modal -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Are you sure want to Delete ?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="{{route('deleteUserPost')}}" enctype="multipart/form-data">
                <input type="hidden" name="user_post" value="{{$post->id}}">
                @csrf
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Delete</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>

</div>
@endsection
