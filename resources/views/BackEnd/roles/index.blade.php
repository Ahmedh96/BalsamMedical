@extends('BackEnd.layouts.master')

@section('title')
Roles
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-2">
            <a href="{{ route('roles.create') }}">
                <div class="btn btn-info" style="
                    color: white;
                    background:linear-gradient(60deg, #373a6c, #373a6c)"><i class="fa fa-plus"></i> اضافة صلاحيه
                </div>
            </a>
        </div>
        <div class="col-12">
          <div class="card">
            <div class="card-header card-header-primary text-right" style="background:linear-gradient(60deg, #373a6c, #373a6c)">
                <div class="card-icon">
                    <i class="material-icons">security</i>
                </div>
                <h3 class="card-title"> @lang('lang.Roles Management') </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive table table-hover">
              <table class="table">
                <thead class=" table-success">
                  <tr>
                    <th>@lang('lang.ID')</th>
                    <th>@lang('lang.Name')</th>
                    <th>@lang('lang.Created_at')</th>
                    <th>@lang('lang.Actions')</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                    <tr>
                        <td>{{$role->id}}</td>
                        <td>{{$role->name}}</td>
                        <td>{{$role->created_at}}</td>
                        <td>
                            <a href="{{route('roles.edit' , $role->id)}}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                            <form class="delete" action="{{ route('roles.destroy' ,$role->id) }}" method="POST" style="display:inline-block" onsubmit ='return confirmDelete()'>
                                <input type="hidden" name="_method" value="DELETE">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
