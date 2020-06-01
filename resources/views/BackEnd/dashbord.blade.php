@extends('BackEnd.layouts.master')

@section('content')
<div>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">person</i>
                </div>
                <h1 class="card-category" style="color:red">@lang('lang.Users')</h1>
                <h3 class="card-title">{{Auth::user()->count()}}</h3>
                </div>
                <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">view_module</i>
                    <a href="{{route('users.index')}}">
                        @lang('lang.Show')
                    </a>
                </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">folder</i>
                </div>
                <h1 class="card-category" style="color:red">@lang('lang.Categories')</h1>
                <h3 class="card-title">{{$category->count()}}</h3>
                </div>
                <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">view_module</i>
                    <a href="{{route('categories.index')}}">
                        @lang('lang.Show')
                    </a>
                </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">assignment</i>
                </div>
                <h1 class="card-category" style="color:red">@lang('lang.Pages')</h1>
                <h3 class="card-title">{{$page->count()}}</h3>
                </div>
                <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">view_module</i>
                    <a href="{{route('pages.index')}}">
                        @lang('lang.Show')
                    </a>
                </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">assignment</i>
                </div>
                <h1 class="card-category" style="color:red">@lang('lang.Posts')</h1>
                <h3 class="card-title">{{$post->count()}}</h3>
                </div>
                <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">view_module</i>
                    <a href="{{route('posts.index')}}">
                        @lang('lang.Show')
                    </a>
                </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
            <div class="card-header card-header-text card-header-warning">
                <div class="card-text">
                <h4 class="card-title">@lang('lang.Comments')</h4>
                <p class="card-category font-weight">{{$comments->count()}}</p>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-hover text-center">
                    <thead class="text-warning">
                        <th>اخر التعليقات</th>
                        <th>عنوان المنشور</th>
                        <th>الناشر</th>
                        <th>مشاهدة المنشور</th>
                    </thead>
                    <tbody>
                        @foreach ($comments as $comment)
                            <tr>
                                <td>{{$comment->comment}}</td>
                                <td>{{$comment->post->title}}</td>
                                <td>{{$comment->user->name}}</td>
                                <td>
                                    <a href="{{route('posts.show' ,$comment->post->id)}}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection
