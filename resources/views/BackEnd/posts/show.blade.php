@extends('BackEnd.layouts.master')

@push('js')
    <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>
@endpush

@section('content')

<div class="row">
    <div class="col-lg-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-header card-header-primary text-right" style="background-color:#373a6c;">  <i class="fa fa-display"></i> @lang('lang.Show Post')</h3>
            </div>
            <div class="card-body">
                <div class="span8">
                    <div class="row">
                        <div class="span8s">
                            <h2>{{$post->title}}</h2>
                            <p>
                                {!! $post->description !!}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="span2">
                            <img src="{{url('uploads/Posts/' . $post->image)}}" alt="{{$post->title}}" width="300" height="300">
                        </div>

                    </div>
                    <div class="row">
                        <div class="span8">
                            <p></p>
                            <p>
                                <i class="icon-user"></i> by <a href="#">{{$post->user->name}}</a>
                                | <i class="icon-calendar"></i> {{$post->created_at}}
                                | <i class="icon-comment"></i> <a href="#">{{count($post->comments)}} Comments</a>
                            </p>
                        </div>
                    </div>
                </div>
                <hr>

                <hr />
                <h4>Add comment</h4>
                <form method="post" action="{{ route('comments.store') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="comment" class="form-control" />
                        <input type="hidden" name="post_id" value="{{ $post->id }}" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-warning" value="Add Comment" />
                    </div>
                </form>

                <h1>Display Comments</h1>
                @include('BackEnd.posts.comment_replies', ['comments' => $post->comments, 'post_id' => $post->id])
            </div>
        </div>
    </div>

</div>
@endsection
