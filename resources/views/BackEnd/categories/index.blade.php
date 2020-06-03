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
            <a href="{{ route('categories.create') }}">
                <div class="btn btn-info" style="
                    color: white;
                    background:linear-gradient(60deg, #373a6c, #373a6c)"><i class="fa fa-plus"></i> @lang('lang.Create Category')
                </div>
            </a>
        </div>
        <div class="col-lg-8">
            <div class="btn-group ">
                <form action="{{route('category.search')}}" method="post">
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
                    <li><a href="{{aurl('category/id-desc')}}">
                        @lang('lang.Finally added')
                    </a></li>
                    <li><a href="{{aurl('category/id-asc')}}">
                        @lang('lang.Added first')
                    </a></li>
                    <li><a href="{{aurl('category/created_at-asc')}}">
                        @lang('lang.Latest date')
                    </a></li>
                    <li><a href="{{aurl('category/created_at-desc')}}">
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
                    <i class="material-icons">folder</i>
                    </div>
                    <h4 class="card-title">@lang('lang.Categories')</h4>
                </div>
                <div class="card-body">
                    <div class="col-lg-12 table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-success">
                                <tr>
                                    <th>@lang('lang.ID')</th>
                                    <th>@lang('lang.Name')</th>
                                    <th>@lang('lang.Meta Keywords')</th>
                                    <th>@lang('lang.Meta Description')</th>
                                    <th>@lang('lang.Actions')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{Str::limit($category->meta_keywords , 20)}}</td>
                                        <td>{{Str::limit($category->meta_description , 20)}}</td>
                                        <td>
                                            <a href="{{route('categories.edit' , $category->id)}}" class="btn btn-primary btn-sm"><i class="material-icons">edit</i></a>
                                            {{-- <div class=""></div> --}}
                                            <form action="{{route('categories.destroy' , $category->id)}}" method="POST" style="display:inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" id="deleteButton" data-name="{{ $category->name }}"><i class="material-icons">close</i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            {{$categories->links()}}
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
