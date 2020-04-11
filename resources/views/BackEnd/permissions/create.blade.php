@extends('BackEnd.layouts.master')

@section('title')
Permissions Create
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-header card-header-primary text-right" style="background-color:#373a6c;">  <i class="material-icons">policy</i> @lang('lang.Create Permission')</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('permissions.store')}}" method="POST" role="form">
            @csrf
            <div class="card-body">
                <div class="form-group bmd-form-group text-right">
                    <label class="bmd-label-floating">@lang('lang.Name')</label>
                    <input type="text" name="name" class="form-control"  value="{{ old('name') }}">
                </div>
                <br><br>
                <div class="form-group">
                    <label for="for">@lang('lang.Permission for')</label>
                    <select name="for" id="for" class="form-control">
                        <option selected disable>@lang('lang.Select Permission for')</option>
                        <option value="user">@lang('lang.User')</option>
                        <option value="post">@lang('lang.Post')</option>
                        <option value="other">@lang('lang.Other')</option>
                    </select>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>@lang('lang.Create')</button>
            </div>
            </form>
        </div>
        <!-- /.card -->

    </div>
</div>
@endsection
