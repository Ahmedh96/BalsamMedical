@extends('BackEnd.layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-header card-header-primary text-right" style="background-color:#373a6c;">  <i class="fa fa-user-plus"></i> @lang('lang.Create User')</h3>
            </div>
            <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group bmd-form-group text-right">
                        <label class="bmd-label-floating">@lang('lang.Name')</label>
                        <input type="text" name="name" class="form-control"  value="{{ old('name') }}">
                    </div>

                    <div class="form-group bmd-form-group text-right">
                        <label class="bmd-label-floating">@lang('lang.Email')</label>
                        <input type="text" name="email" class="form-control"  value="{{ old('email') }}">
                    </div>

                    <div class="form-group bmd-form-group text-right">
                        <label class="bmd-label-floating">@lang('lang.Password')</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <div class="form-group bmd-form-group text-right">
                        <label class="bmd-label-floating">@lang('lang.Password Confirmation')</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>

                    <div>
                        <label class="bmd-label-floating">@lang('lang.Image')</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">الصلاحيات</label>
                        <select class="form-control" name="admin" id="exampleFormControlSelect1">
                            <option value="1">@lang('lang.Admin')</option>
                            <option value="0">@lang('lang.User')</option>
                            <option value="2">@lang('lang.Author')</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-user-plus"></i> @lang('lang.Create')</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
