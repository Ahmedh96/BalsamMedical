@extends('BackEnd.layouts.master')

@section('title')
Permissions Edit
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-header card-header-primary text-right" style="background-color:#373a6c;">  <i class="material-icons">policy</i> @lang('lang.Edit Permission')</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('permissions.update' , $permission->id)}}" method="POST" role="form">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="card-body">
                        <div class="form-group bmd-form-group text-right">
                            <label class="bmd-label-floating">@lang('lang.Name')</label>
                            <input type="text" name="name" class="form-control"  value="{{ $permission->name }}">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-user-edit"></i>@lang('lang.Save')</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->

        </div>
    </div>
@endsection
