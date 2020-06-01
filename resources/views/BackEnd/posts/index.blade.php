@extends('BackEnd.layouts.master')

@push('js')
<script>

$('button#deleteButton').on('click', function(e){
var name = $(this).data('name');
e.preventDefault();
swal({
    title: "Careful!",
    text: "Are you sure you want to delete "+name+"?",
    icon: "warning",
    dangerMode: true,
    buttons: {
      cancel: "Exit",
      confirm: "Confirm",
    },
})
.then ((willDelete) => {
    if (willDelete) {
       $(this).closest("form").submit();
    }
});
});

</script>
@endpush

@section('content')
<div class="container py-3">
    <div class="row">
        <div class="col-lg-4">
            <a href="{{ route('posts.create') }}">
                <div class="btn btn-info" style="
                    color: white;
                    background:linear-gradient(60deg, #373a6c, #373a6c)"><i class="fa fa-plus"></i> @lang('lang.Create Post')
                </div>
            </a>
        </div>
        <div class="col-lg-8">
            <div class="btn-group ">
                <form action="{{route('post.search')}}" method="post">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" name="search" style="width: 11rem;" class="form-control" placeholder="@lang('lang.Search In Name Or Id')">
                        <button type="submit" class="btn btn-info bg-orang" style="display:inline; ">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="btn-group pull-left">
                <button class="btn btn-default bg-orang">@lang('lang.Appearance depending on')</button>
                <button data-toggle="dropdown" class="btn dropdown-toggle" style="background:linear-gradient(60deg, #373a6c, #373a6c)"><span class="caret"></span></button>
                <ul class="dropdown-menu dropdown-warning">
                    <li><a href="{{aurl('post/id-desc')}}">
                        @lang('lang.Finally added')
                    </a></li>
                    <li><a href="{{aurl('post/id-asc')}}">
                        @lang('lang.Added first')
                    </a></li>
                    <li><a href="{{aurl('post/created_at-asc')}}">
                        @lang('lang.Latest date')
                    </a></li>
                    <li><a href="{{aurl('post/created_at-desc')}}">
                        @lang('lang.Oldest History')
                    </a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header card-header-primary @if(app()->getLocale() == 'ar')  text-right @endif" style="background:linear-gradient(60deg, #373a6c, #373a6c)">
                    <div class="card-icon">
                    <i class="material-icons">assignment</i>
                    </div>
                    <h4 class="card-title">@lang('lang.Posts')</h4>
                </div>
                <div class="card-body">
                    <div class="col-lg-12 table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-success">
                                <tr>
                                    <th>@lang('lang.ID')</th>
                                    <th>@lang('lang.Name')</th>
                                    <th>@lang('lang.Image')</th>
                                    <th>@lang('lang.Meta Keywords')</th>
                                    <th>@lang('lang.Meta Description')</th>
                                    <th>@lang('lang.Section type')</th>
                                    <th>@lang('lang.Actions')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{$post->id}}</td>
                                        <td>{{$post->title}}</td>
                                        <td>
                                            <img src="{{url('uploads/Posts/'.$post->image)}}" alt="{{$post->image}}" height="100" width="100">
                                        </td>
                                        <td>{{$post->meta_keywords}}</td>
                                        <td>{{$post->meta_description}}</td>
                                        <td>{{$post->category->name}}</td>
                                        <td>
                                            {{-- <a href="{{route('posts.show' , $post->id)}}" class="btn btn-info btn-sm"><i class="material-icons">view_module</i></a> --}}
                                            <a href="{{route('posts.edit' , $post->id)}}" class="btn btn-primary btn-sm"><i class="material-icons">edit</i></a>
                                            {{-- <div class=""></div> --}}
                                            <form action="{{route('posts.destroy' , $post->id)}}" method="POST" style="display:inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" id="deleteButton" data-name="{{ $post->title }}"><i class="material-icons">close</i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            {{$posts->links()}}
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
