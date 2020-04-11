@extends('BackEnd.layouts.master')

@section('title')
Role Edit
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-header card-header-primary text-right" style="background-color:#373a6c;">  <i class="material-icons">security</i> @lang('lang.Edit Role')</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('roles.update' , $role->id)}}" method="POST" role="form">
                    @csrf
                    {{ method_field('PUT') }}
                <div class="card-body text-right">
                    <div class="form-group bmd-form-group text-right">
                        <label class="bmd-label-floating">@lang('lang.Name')</label>
                        <input type="text" name="name" class="form-control"  value="{{$role->name}}">
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="name">@lang('lang.Posts Permissions')</label>
                            @foreach ($permissions as $permission)
                                @if ($permission->for == 'post')
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="permission[]" value="{{ $permission->id }}"
                                            @foreach ($role->permissions as $permission_role)
                                            @if ($permission_role->id == $permission->id)
                                            checked
                                            @endif
                                            @endforeach    >{{ $permission->name }}</label>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-lg-4">
                            <label for="name">@lang('lang.User Permissions')</label>
                                @foreach ($permissions as $permission)
                                    @if ($permission->for == 'user')
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="permission[]" value="{{ $permission->id }}"
                                            @foreach ($role->permissions as $permission_role)
                                                @if ($permission_role->id == $permission->id)
                                                checked
                                                @endif
                                            @endforeach >{{ $permission->name }}</label>
                                        </div>
                                    @endif
                                @endforeach
                        </div>

                        <div class="col-lg-4">
                            <label for="name">@lang('lang.Other Permissions')</label>
                                @foreach ($permissions as $permission)
                                    @if ($permission->for == 'other')
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="permission[]" value="{{ $permission->id }}"
                                            @foreach ($role->permissions as $permission_role)
                                                @if($permission_role->id == $permission->id)
                                                checked
                                                @endif
                                            @endforeach
                                            >{{ $permission->name }}</label>
                                        </div>
                                    @endif
                                @endforeach
                        </div>
                    </div>
                </div>

                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> حفظ</button>
                </div>
                </form>
            </div>
            <!-- /.card -->

        </div>
    </div>
@endsection
