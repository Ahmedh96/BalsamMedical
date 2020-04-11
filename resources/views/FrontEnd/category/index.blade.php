@extends('layouts.style')

@section('content')
    <!--================Map Area =================-->
    <div class="section" style="background-image: url('{{url('design/FrontEnd')}}/assets/img/ill/1.svg');">
        <div class="container py-md">
            <h1 class="font-weight-light text-center">{{$category->name}}</h1>
            <br>
            <div class="row justify-content-between align-items-center">
                @foreach ($category->posts as $post)
                <div class="col-xs-12 col-lg-4">
                    <div class="rounded overflow-hidden ">
                        <div class="card" style="width: 20rem;">
                            <a href="{{route('front.post' , $post->slug)}}" title="{{$post->image}}">
                                <img class="card-img-top" src="{{url('uploads/Posts/'.$post->image)}}" alt="{{$post->title}}" style="max-height: 200px;">
                            </a>
                            <div class="card-body">
                                <a href="{{route('front.post' , $post->slug)}}">
                                    <h4 class="text-center">{{$post->title}}</h4>
                                </a>
                                <br>
                                <span class="text-center">{{$post->created_at}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--================End Map Area =================-->

@endsection
