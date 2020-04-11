@extends('layouts.style')

@push('jss')
    <script>
    $(document).ready(function(){
        $(document).on('click' , 'button.rep' , function(){
            var closestDiv = $(this).closest('div'); // also you can use $(this).parent()
            //closestDiv.fadeOut();
            $('.comment_reply').not(closestDiv.next('.comment_reply')).hide();
            //$('.rep').closest('div').not(closestDiv).show()
            closestDiv.next('form.comment_reply').slideToggle(100);
        });
    });
    </script>
@endpush

@section('content')
    <!--================Map Area =================-->

    <section class="section bg-secondary">
        <div class="container">
            <div class="card card-profile shadow mt--300 ">
                <div>

                    <!-- Start Show Post -->
                    <div class="text-center mt-5 font-weight-bolder">
                        <img class="img-responsive img-circle img-thumbnail w-50" src="{{url('uploads/Posts/'.$post->image)}}" alt="{{$post->title}}">
                        <br><br>
                        <h1 class="text-center" style="font-size:50px">
                            <a href="{{route('front.category' , $post->category->slug)}}">
                                {{$post->category->name}}
                            </a>
                        </h1>
                        <hr>
                        <div class="h6"><i class="ni location_pin mr-2"></i>
                            <a href="{{route('front.post' , $post->slug)}}">
                                <h4 class="text-center">{{$post->title}}</h4>
                            </a>
                        </div>
                        <hr>
                        <div class="h6 mt-4"><i class="ni business_briefcase-24 mr-2"></i>
                            <p class="lead">{!! $post->description !!}</p>
                        </div>
                        <hr>
                        <div><i class="ni education_hat mr-2"></i>{{$post->created_at->diffForHumans()}}</div>
                    </div>
                    <!-- End Show Post -->



                    <div class="mt-5 py-5 border-top text-center">
                        <div class="row justify-content-center">
                            <div class="col-lg-9">




                                <hr>
                                <!-- Start Add Comment -->
                                @if (auth()->user())
                                <form action="{{route('front.addComment')}}" method="POST" class="border">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="post_id" hidden value="{{$post->id}}">
                                        <textarea name="comment" class="form-control" id="" cols="10" rows="2" placeholder="اضافة تعليق ......."></textarea>
                                        <br>
                                        <input type="submit" class="btn btn-primary" value="@lang('lang.Create')">
                                    </div>
                                </form>
                                @else
                                <p class="lead">@lang('lang.LoginComment')</p>
                                @endif
                                <!-- End Add Comment -->
                                <hr>



                                <!-- Start  Show Comment -->
                                <div class="row">
                                    <!-- Contenedor Principal -->
                                    <div class="comments-container">
                                        <h1>@lang('lang.Comments')</h1>

                                        <ul id="comments-list" class="comments-list">

                                            <!-- Show Comment -->
                                            @foreach ($post->comments as $comment)
                                            <li>
                                                <div class="comment-main-level">
                                                    <!-- Avatar -->
                                                    <div class="comment-avatar"><img src="{{url('uploads/Users/'.$comment->user->image)}}" alt=""></div>
                                                    <!-- Contenedor del Comentario -->
                                                    <div class="comment-box font-weight-bolder ">
                                                        <div class="comment-head bg-gradient-primary">
                                                            <h6 class="comment-name"><a class="text-white" href="{{route('front.profile' , $comment->user->id)}}">{{$comment->user->name}}</a></h6>
                                                            <span class="text-white">{{$comment->created_at->diffForHumans()}}</span>

                                                            <!-- Add Replay Comment and delete comment -->
                                                            @if (auth()->user())
                                                                {{-- @if (  Auth::user()->admin == 1 || Auth::user()->admin == 2 || App\Comment::where('post_id' , "=" , $post->id )->where('user_id' ,"=", $comment->user->id)->first() ) --}}
                                                                <div class="pull-right">
                                                                    @if (Auth::user()->admin == 1 || Auth::user()->admin == 2)
                                                                    <button type="button" class="btn btn-primary rep btn-sm" data-id="{{$comment->id}}"><i class="fa fa-reply text-white"></i></button>&nbsp;
                                                                    @endif
                                                                    @if (  Auth::user()->admin == 1 || Auth::user()->admin == 2 || $comment->user->id == Auth::user()->id )
                                                                    <form action="{{route('front.deleteComment' , $comment->id)}}" method="POST" style="display:inline-block">
                                                                        @csrf
                                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash text-white">close</i></button>
                                                                    </form>
                                                                    @endif
                                                                </div>
                                                                {{-- @endif --}}
                                                            @endif

                                                            @if (auth()->user())
                                                                @if (auth()->user()->admin == 1 || Auth()->user()->admin == 2 )
                                                                <form class="comment_reply bg-gradient-primary" data-id="{{$comment->id}}" method="post" action="{{route('front.replayComment')}}">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <input type="text" name="post_id" hidden value="{{$post->id}}">
                                                                        <input type="text" name="comment_id" hidden value="{{$comment->id}}">
                                                                        <textarea name="comment" class="form-control" id="" cols="10" rows="2" placeholder="الرد على تعليق ......."></textarea>
                                                                        <br>
                                                                        <input type="submit" class="btn btn-primary btn-sm pull-left" value="@lang('lang.Create')">
                                                                    </div>
                                                                </form>
                                                                @endif
                                                            @endif
                                                            <!-- Add Replay Comment and delete comment -->


                                                        </div>
                                                        <div class="comment-content text-white bg-gradient-primary">
                                                            {{$comment->comment}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Respuestas de los comentarios -->

                                                <!-- Start Show Replay Comment  -->

                                                    <ul class="comments-list reply-list">
                                                        @foreach ($comment->replies as $replay)
                                                            @if($comment->id === $replay->parent_id)
                                                            <li>
                                                                <!-- Avatar -->
                                                                <div class="comment-avatar"><img src="{{url('uploads/Users/'.$replay->user->image)}}" alt=""></div>
                                                                <!-- Contenedor del Comentario -->
                                                                <div class="comment-box font-weight-bolder ">
                                                                    <div class="comment-head bg-gradient-pink">
                                                                        <h6 class="comment-name text-white">{{$replay->user->name}}</h6>
                                                                        <span class="text-white">{{$replay->created_at->diffForHumans()}}</span>


                                                                        <!-- Delete Replay Comment -->
                                                                        @if (auth()->user())
                                                                            @if ( Auth::user()->admin == 1 || Auth::user()->admin == 2 )
                                                                            <div class="pull-right">
                                                                                <form action="{{route('front.deleteComment' , $replay->id)}}" method="POST" style="display:inline-block">
                                                                                    @csrf
                                                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash text-white">close</i></button>
                                                                                </form>
                                                                            </div>
                                                                            @endif
                                                                        @endif
                                                                        <!-- end of Delete Replay Comment -->
                                                                    </div>
                                                                    <div class="comment-content bg-gradient-pink text-white ">
                                                                        {{$replay->comment}}
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                 <!-- End Show Replay Comment  -->
                                            </li>
                                            @endforeach
                                            <!-- End Comment -->
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Show Comment -->
                                <br><br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Map Area =================-->

@endsection
