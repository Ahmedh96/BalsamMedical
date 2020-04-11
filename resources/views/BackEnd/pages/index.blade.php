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
        <div class="col-lg-2">
            <a href="{{ route('pages.create') }}">
                <div class="btn btn-info" style="
                    color: white;
                    background:linear-gradient(60deg, #373a6c, #373a6c)"><i class="fa fa-plus"></i> اضافة صفحة
                </div>
            </a>
        </div>
        <div class="col-lg-10">
            <div class="btn-group ">
                <form action="{{route('page.search')}}" method="post">
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
                <button class="btn btn-default bg-orang">ظهور على حسب</button>
                <button data-toggle="dropdown" class="btn dropdown-toggle" style="background:linear-gradient(60deg, #373a6c, #373a6c)"><span class="caret"></span></button>
                <ul class="dropdown-menu dropdown-warning">
                    <li><a href="{{aurl('page/id-desc')}}">
                        المضاف اخيرا
                    </a></li>
                    <li><a href="{{aurl('page/id-asc')}}">
                        المضاف اولا
                    </a></li>
                    <li><a href="{{aurl('page/created_at-asc')}}">
                        التاريخ الاحدث
                    </a></li>
                    <li><a href="{{aurl('page/created_at-desc')}}">
                        التاريخ الاقدم
                    </a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header card-header-primary text-right" style="background:linear-gradient(60deg, #373a6c, #373a6c)">
                    <div class="card-icon">
                    <i class="material-icons">assignment</i>
                    </div>
                    <h4 class="card-title">@lang('lang.Pages')</h4>
                </div>
                <div class="card-body">
                    <div class="col-lg-12 table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-success">
                                <tr>
                                    <th>@lang('lang.ID')</th>
                                    <th>الاسم</th>
                                    <th>الربط</th>
                                    <th>الكلمات الدليلية</th>
                                    <th>الكلمات الوصفية</th>
                                    <th>@lang('lang.Actions')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pages as $page)
                                    <tr>
                                        <td>{{$page->id}}</td>
                                        <td>{{$page->name}}</td>
                                        <td> <span class="label label-info">{{$page->slug}}</span></td>
                                        <td>{{$page->meta_keywords}}</td>
                                        <td>{{$page->meta_description}}</td>
                                        <td>
                                            <a href="{{route('pages.edit' , $page->id)}}" class="btn btn-primary btn-sm"><i class="material-icons">edit</i></a>
                                            {{-- <div class=""></div> --}}
                                            <form action="{{route('pages.destroy' , $page->id)}}" method="POST" style="display:inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"  id="deleteButton" data-name="{{ $page->name }}"><i class="material-icons">close</i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            {{$pages->links()}}
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
