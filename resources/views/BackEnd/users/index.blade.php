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

<div class="row">
    <div class="col-lg-2">
        <a href="{{ route('users.create') }}">
            <div class="btn btn-info" style="
                color: white;
                background:linear-gradient(60deg, #373a6c, #373a6c)"><i class="fa fa-user-plus"></i> @lang('lang.Create User')
            </div>
        </a>
    </div>
    <div class="col-lg-10">
        <div class="btn-group ">
            <form action="{{route('user.search')}}" method="post">
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
                <li><a href="{{aurl('user/1')}}">
                    المديرين
                </a></li>
                <li><a href="{{aurl('user/0')}}">
                    الاعضاء
                </a></li>
                <li><a href="{{aurl('user/id-desc')}}">
                    المضاف اخيرا
                </a></li>
                <li><a href="{{aurl('user/id-asc')}}">
                    المضاف اولا
                </a></li>
                <li><a href="{{aurl('user/created_at-asc')}}">
                    التاريخ الاحدث
                </a></li>
                <li><a href="{{aurl('user/created_at-desc')}}">
                    التاريخ الاقدم
                </a></li>
            </ul>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary text-right" style="background:linear-gradient(60deg, #373a6c, #373a6c)">
                <div class="card-icon">
                <i class="material-icons">person</i>
                </div>
                <h4 class="card-title">@lang('lang.Users Management')</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive table table-hover">
                    <table class="table">
                        <thead class="table-success">
                        <tr>
                            <th>@lang('lang.#ID')</th>
                            <th>@lang('lang.Name')</th>
                            <th>@lang('lang.Email')</th>
                            <th>@lang('lang.Image')</th>
                            {{-- <th>@lang('lang.Assigned Roles')</th> --}}
                            <th>@lang('lang.Status')</th>
                            <th>@lang('lang.Admin')</th>
                            <th>@lang('lang.Actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>

                                    <td>{{$user->email}}</td>
                                    <td>
                                        <img src="{{url('uploads/Users/'.$user->image)}}" alt="{{$user->image}}" width="100" height="100">
                                    </td>
                                    {{-- <td>
                                        @foreach ($user->roles as $role)
                                            {{$role->name}} ,
                                        @endforeach
                                    </td> --}}
                                    <td>
                                        @if ($user->email_verified_at)
                                            <span class="label label-success">@lang('lang.Active')</span>
                                        @else
                                            <span class="label label-danger">@lang('lang.Not Active')</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->admin == 1)
                                            <span class="label label-info">@lang('lang.Admin')</span>
                                        @elseif($user->admin == 2)
                                        <span class="label label-inverse">@lang('lang.Author')</span>
                                        @else
                                        <span class="label label-inverse">@lang('lang.User')</span>
                                        @endif
                                    </td>
                                    <td>
                                        @can('isAdmin')
                                        <a href="{{route('users.edit' , $user->id)}}" class="btn btn-primary"><i class="material-icons">edit</i></a>

                                        <form class="delete" action="{{route('users.destroy' , $user->id)}}" method="POST" style="display:inline-block">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger" id="deleteButton" data-name="{{ $user->name }}"><i class="material-icons">close</i></button>
                                        </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
