@extends('BackEnd.layouts.master')

@section('title')
Permissions
@endsection

@section('content')
<div class="row">
        <div class="col-xs-2">
            <a href="{{ route('permissions.create') }}">
                <div class="btn btn-info" style="
                    color: white;
                    background:linear-gradient(60deg, #373a6c, #373a6c)"><i class="fa fa-plus"></i> اضافة اذن
                </div>
            </a>
        </div>
    <div class="col-12">
      <div class="card">
        <div class="card-header card-header-primary text-right" style="background:linear-gradient(60deg, #373a6c, #373a6c)">
            <div class="card-icon">
                <i class="material-icons">policy</i>
            </div>
            <h3 class="card-title"> @lang('lang.Permissions Management') </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-head-fixed">
            <thead class="table">
              <tr>
                <th>@lang('lang.ID')</th>
                <th>@lang('lang.Permission Name')</th>
                <th>@lang('lang.Permission For')</th>
                <th>@lang('lang.Created_at')</th>
                <th>@lang('lang.Actions')</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                <tr>
                    <td>{{$permission->id}}</td>
                    <td>{{$permission->name}}</td>
                    <td>{{$permission->for}}</td>
                    <td>{{$permission->created_at}}</td>
                    <td>
                        <a href="{{route('permissions.edit' , $permission->id)}}" class="btn btn-info"><i class="material-icons">edit</i></a>
                        <form class="delete" action="{{ route('permissions.destroy' ,$permission->id) }}" method="POST" style="display:inline-block" onsubmit ='return confirmDelete()'>
                            <input type="hidden" name="_method" value="DELETE">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger"><i class="material-icons">close</i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection
