@extends('BackEnd.layouts.master')

@section('title')
User Edit
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title card-header-primary text-right" style="background-color:#373a6c;"><i class="fa fa-edit"></i> @lang('lang.Edit User')</h3>
            </div>
            <form action="{{route('users.update' , $user->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">@lang('lang.Name')</label>
                        <input type="text" name="name" class="form-control" placeholder="@lang('lang.Type Name')" value="{{$user->name}}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="@lang('lang.Type Email')" value="{{$user->email}}">
                    </div>

                    <div class="form-group">
                        <label for="password">@lang('lang.Password')</label>
                        <input type="password" name="password" class="form-control" placeholder="@lang('lang.Type Password')">
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">@lang('lang.Password Confirmation')</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="@lang('lang.Type Password Confirmation')">
                    </div>

                    <div>
                        <label class="bmd-label-floating">@lang('lang.Image')</label>
                        <input type="file" name="image" class="form-control"  value="{{ $user->image }}">
                        <img src="{{url('uploads/Users/'.$user->image)}}" alt="{{$user->image}}" height="100" width="100">
                    </div>

                    <div class="form-group">
                        <label for="admin">@lang('lang.Admin')</label>
                        <select name="admin" class="form-control">
                            <option value="1" {{isset($user->admin) && $user->admin == 1 ? 'selected' : ''}}>@lang('lang.Admin')</option>
                            <option value="0" {{isset($user->admin) && $user->admin == 0 ? 'selected' : ''}}>@lang('lang.User')</option>
                            <option value="2" {{isset($user->admin) && $user->admin == 2 ? 'selected' : ''}}>@lang('lang.Author')</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-edit"></i>@lang('lang.Save')</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
